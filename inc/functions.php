<?php

declare(strict_types=1);



function getCountryCode(string $ip): ?string
{
    if (
        !filter_var(
            $ip,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
        )
    ) {
        return null;
    }

    $databaseFile = __DIR__ . '/geoip.mmdb';

    if (!is_file($databaseFile) || !is_readable($databaseFile)) {
        return null;
    }

    try {
        $reader = new \MaxMind\Db\Reader($databaseFile);

        try {
            $record = $reader->get($ip);
        } finally {
            $reader->close();
        }

        if (!is_array($record)) {
            return null;
        }

        $countryCode =
            $record['country']['iso_code']
            ?? $record['registered_country']['iso_code']
            ?? null;

        if (!is_string($countryCode) || $countryCode === '') {
            return null;
        }

        return strtoupper($countryCode);
    } catch (\Throwable) {
        return null;
    }
}


function getClientIp(): string
{
    $forwardedFor = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? '';

    if ($forwardedFor !== '') {
        $addresses = explode(',', $forwardedFor);
        $address = trim($addresses[0]);

        if (filter_var($address, FILTER_VALIDATE_IP)) {
            return $address;
        }
    }

    $realIp = $_SERVER['HTTP_X_REAL_IP'] ?? '';

    if ($realIp !== '' && filter_var($realIp, FILTER_VALIDATE_IP)) {
        return $realIp;
    }

    return $_SERVER['REMOTE_ADDR'] ?? '';
}

function detectLanguage(): string
{
    $requested = strtolower((string) ($_GET['lang'] ?? ''));

    if (in_array($requested, ['ru', 'en'], true)) {
        setcookie('muraenarf_lang', $requested, [
            'expires' => time() + 31536000,
            'path' => '/',
            'secure' => !empty($_SERVER['HTTPS']),
            'httponly' => false,
            'samesite' => 'Lax',
        ]);

        return $requested;
    }

    $saved = strtolower((string) ($_COOKIE['muraenarf_lang'] ?? ''));

    if (in_array($saved, ['ru', 'en'], true)) {
        return $saved;
    }

    $russianLanguageCountries = [
        'AM', // Armenia
        'AZ', // Azerbaijan
        'BY', // Belarus
        'KZ', // Kazakhstan
        'KG', // Kyrgyzstan
        'MD', // Moldova
        'RU', // Russia
        'TJ', // Tajikistan
        'TM', // Turkmenistan
        'UA', // Ukraine
        'UZ', // Uzbekistan
    ];

    $countryCode = getCountryCode(getClientIp());

    if (
        $countryCode !== null
        && in_array($countryCode, $russianLanguageCountries, true)
    ) {
        return 'ru';
    }

    return 'en';
}


function diyLevel(int $level): string
{
    $level = max(0, min(10, $level));

    $segments = '';

    for ($i = 1; $i <= 10; $i++) {
        $class = 'diy-level__segment';

        if ($i <= $level) {
            $class .= ' diy-level__segment--active';
        }

        $segments .= sprintf(
            '<span class="%s" aria-hidden="true"></span>',
            $class
        );
    }

    return sprintf(
        '<div class="diy-level" role="meter" aria-valuemin="0" aria-valuemax="10" aria-valuenow="%1$d">'
        . '<div class="diy-level__header">'
        . '<span class="diy-level__title">%2$s</span>'
        . '<span class="diy-level__value">%1$d/10</span>'
        . '</div>'
        . '<div class="diy-level__scale">%3$s</div>'
        . '</div>',
        $level,
        t('common.diy_level'),
        $segments
    );
}


function minifyHtml(string $html): string
{
    if ($html === '') {
        return $html;
    }

    $protectedBlocks = [];

    $html = preg_replace_callback(
        '~<(pre|textarea|script|style)\b[^>]*>.*?</\1>~is',
        static function (array $matches) use (&$protectedBlocks): string {
            $key = '___HTML_BLOCK_' . count($protectedBlocks) . '___';

            $protectedBlocks[$key] = $matches[0];

            return $key;
        },
        $html
    );

    if ($html === null) {
        return '';
    }

    // Remove HTML comments, excluding conditional comments.
    $html = preg_replace(
        '/<!--(?!\[if).*?-->/s',
        '',
        $html
    );

    if ($html === null) {
        return '';
    }

    // Remove tabs and line breaks.
    $html = str_replace(
        ["\r", "\n", "\t"],
        '',
        $html
    );

    // Collapse repeated spaces.
    $html = preg_replace('/ {2,}/', ' ', $html);

    if ($html === null) {
        return '';
    }

    // Remove whitespace between HTML tags.
    $html = preg_replace('/>\s+</', '><', $html);

    if ($html === null) {
        return '';
    }

    // Restore protected blocks unchanged.
    if ($protectedBlocks !== []) {
        $html = strtr($html, $protectedBlocks);
    }

    return trim($html);
}

function loadTranslations(string $language): array
{
    $file = __DIR__ . '/i18n.php';

    if (!is_file($file)) {
        return [];
    }

    $catalog = require $file;

    if (!is_array($catalog)) {
        return [];
    }

    // 0 — Russian, 1 — English.
    $languageIndex = $language === 'en' ? 1 : 0;
    $translations = [];

    foreach ($catalog as $key => $value) {
        if (is_string($value) || is_numeric($value)) {
            // A scalar value is used for every language.
            $translations[$key] = (string) $value;
            continue;
        }

        if (!is_array($value)) {
            continue;
        }

        // Use the selected language when available.
        if (array_key_exists($languageIndex, $value)) {
            $translations[$key] = (string) $value[$languageIndex];
            continue;
        }

        // Fall back to the first element.
        if (array_key_exists(0, $value)) {
            $translations[$key] = (string) $value[0];
        }
    }

    return $translations;
}

function t(string $key, ?string $fallback = null): string
{
    global $translations;

    $value = $translations[$key] ?? $fallback ?? $key;

    return renderTranslatedText((string) $value);
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function pageUrl(string $slug, ?string $language = null): string
{
    $path = $slug === 'main' ? '/' : '/' . rawurlencode($slug);

    if ($language !== null) {
        $path .= '?lang=' . rawurlencode($language);
    }

    return $path;
}

function currentUrlWithLanguage(string $language): string
{
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    return $path . '?lang=' . rawurlencode($language);
}

function discoverPages(string $directory): array
{
    $pages = [];

    foreach (glob(rtrim($directory, '/') . '/*.php') ?: [] as $file) {
        $page = require $file;

        if (!is_array($page)) {
            continue;
        }

        $slug = strtolower((string) ($page['slug'] ?? ''));
        $render = $page['render'] ?? null;

        if (!preg_match('/^[a-z0-9-]+$/', $slug) || !is_callable($render)) {
            continue;
        }

        $pages[$slug] = [
            'slug' => $slug,
            'menu' => (string) ($page['menu'] ?? $slug . '.menu'),
            'title' => (string) ($page['title'] ?? $slug . '.title'),
            'description' => (string) ($page['description'] ?? ''),
            'icon' => (string) ($page['icon'] ?? 'article'),
            'order' => (int) ($page['order'] ?? 100),
            'showInMenu' => (bool) ($page['showInMenu'] ?? true),
            'render' => $render,
        ];
    }

    uasort($pages, static fn(array $a, array $b): int =>
        [$a['order'], $a['slug']] <=> [$b['order'], $b['slug']]
    );

    return $pages;
}

function requestSlug(): string
{
    $slug = (string) ($_GET['page'] ?? '');

    if ($slug === '') {
        $path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
        $slug = $path === '' ? 'main' : $path;
    }

    $slug = strtolower($slug);
    return preg_match('/^[a-z0-9-]+$/', $slug) ? $slug : 'main';
}

function renderFeature(string $icon, string $title, string $text): void
{
    ?>
    <article class="feature-card surface-card reveal">
        <span class="material-symbols-rounded feature-card__icon"><?= e($icon) ?></span>
        <h3><?= t($title) ?></h3>
        <p><?= t($text) ?></p>
    </article>
    <?php
}

function renderInfoSection(string $icon, string $title, string $text): void
{
    ?>
    <section class="content-section surface-card reveal">
        <div class="content-section__icon">
            <span class="material-symbols-rounded"><?= e($icon) ?></span>
        </div>

        <div>
            <h2><?= t($title) ?></h2>

            <div class="content-section__text">
                <?= t($text) ?>
            </div>
        </div>
    </section>
    <?php
}





function normalizeCustomUrl(string $url): ?string
{
    $url = trim($url);

    if ($url === '' || preg_match('/[\x00-\x1F\x7F]/', $url)) {
        return null;
    }

    // Internal absolute path.
    if (str_starts_with($url, '/') && !str_starts_with($url, '//')) {
        return $url;
    }

    // External or absolute same-site URL.
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        return null;
    }

    $scheme = strtolower((string) parse_url($url, PHP_URL_SCHEME));

    if (!in_array($scheme, ['http', 'https'], true)) {
        return null;
    }

    return $url;
}

function isExternalUrl(string $url): bool
{
    if (str_starts_with($url, '/')) {
        return false;
    }

    $urlHost = strtolower((string) parse_url($url, PHP_URL_HOST));

    if ($urlHost === '') {
        return false;
    }

    $currentHost = strtolower((string) ($_SERVER['HTTP_HOST'] ?? ''));

    // Remove the port from the current host.
    $currentHost = preg_replace('/:\d+$/', '', $currentHost) ?? $currentHost;

    return $currentHost === '' || $urlHost !== $currentHost;
}


function renderPlainTranslatedText(
    string $text,
    bool $allowLinks = true
): string {
    $patterns = [
        '\[code\].*?\[/code\]',
        '\[br\]',
    ];

    if ($allowLinks) {
        array_unshift(
            $patterns,
            '\[url=[^\]]+\].*?\[/url\]'
        );
    }

    $parts = preg_split(
        '~(' . implode('|', $patterns) . ')~isu',
        $text,
        -1,
        PREG_SPLIT_DELIM_CAPTURE
    );

    if ($parts === false) {
        return htmlspecialchars(
            $text,
            ENT_QUOTES | ENT_SUBSTITUTE,
            'UTF-8'
        );
    }

    $result = '';

    foreach ($parts as $part) {
        if ($part === '') {
            continue;
        }

        if (strcasecmp($part, '[br]') === 0) {
            $result .= '<br>';
            continue;
        }

        if (
            preg_match(
                '~^\[code\](.*?)\[/code\]$~isu',
                $part,
                $matches
            )
        ) {
            $code = $matches[1];

            $escapedCode = htmlspecialchars(
                $code,
                ENT_QUOTES | ENT_SUBSTITUTE,
                'UTF-8'
            );

            if (
                str_contains($code, "\n")
                || str_contains($code, "\r")
            ) {
                global $translations;

                $copyLabel = htmlspecialchars(
                    (string) (
                        $translations['common.copy_code']
                        ?? 'Copy code'
                    ),
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                );

                $copiedLabel = htmlspecialchars(
                    (string) (
                        $translations['common.code_copied']
                        ?? 'Copied'
                    ),
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                );

                $result .= '<div class="code-block-wrapper">'
                    . '<button'
                    . ' class="code-block__copy"'
                    . ' type="button"'
                    . ' aria-label="' . $copyLabel . '"'
                    . ' title="' . $copyLabel . '"'
                    . ' data-copy-code'
                    . ' data-copy-label="' . $copyLabel . '"'
                    . ' data-copied-label="' . $copiedLabel . '"'
                    . '>'
                    . '<span class="material-symbols-rounded" aria-hidden="true">'
                    . 'content_copy'
                    . '</span>'
                    . '</button>'
                    . '<pre class="code-block"><code>'
                    . $escapedCode
                    . '</code></pre>'
                    . '</div>';
            } else {
                $result .= '<code class="inline-code">'
                    . $escapedCode
                    . '</code>';
            }

            continue;
        }

        if (
            $allowLinks
            && preg_match(
                '~^\[url=([^\]]+)\](.*?)\[/url\]$~isu',
                $part,
                $matches
            )
        ) {
            $url = normalizeCustomUrl($matches[1]);
            $label = $matches[2];

            if ($url === null) {
                $result .= renderPlainTranslatedText(
                    $label,
                    false
                );

                continue;
            }

            $attributes = '';

            if (isExternalUrl($url)) {
                $attributes = ' target="_blank"'
                    . ' rel="noopener noreferrer"';
            }

            $result .= sprintf(
                '<a class="inline-url" href="%s"%s>%s</a>',
                htmlspecialchars(
                    $url,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                ),
                $attributes,
                renderPlainTranslatedText($label, false)
            );

            continue;
        }

        $result .= htmlspecialchars(
            $part,
            ENT_QUOTES | ENT_SUBSTITUTE,
            'UTF-8'
        );
    }

    return $result;
}

function renderTranslatedText(string $text): string
{
    $parts = preg_split(
        '~(\[img=[^\]]+\].*?\[/img\])~isu',
        $text,
        -1,
        PREG_SPLIT_DELIM_CAPTURE
    );

    if ($parts === false) {
        return renderPlainTranslatedText($text);
    }

    $result = '';

    foreach ($parts as $part) {
        if ($part === '') {
            continue;
        }

        if (
            preg_match(
                '~^\[img=([^\]]+)\](.*?)\[/img\]$~isu',
                $part,
                $matches
            )
        ) {
            $filename = basename(trim($matches[1]));
            $caption = trim($matches[2]);

            if (
                $filename === ''
                || !preg_match(
                    '~^[a-zA-Z0-9._-]+\.(?:png|jpe?g|gif|webp|svg)$~i',
                    $filename
                )
            ) {
                $result .= renderPlainTranslatedText($caption);
                continue;
            }

            $imageUrl = '/assets/images/' . rawurlencode($filename);

            $result .= sprintf(
                '<button class="inline-image-link" type="button" data-image-modal-open data-image-src="%s" data-image-alt="%s">%s</button>',
                htmlspecialchars(
                    $imageUrl,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                ),
                htmlspecialchars(
                    trim(
                        preg_replace(
                            [
                                '~\[br\]~i',
                                '~\[/?code\]~i',
                            ],
                            [
                                ' ',
                                '',
                            ],
                            $caption
                        ) ?? $caption
                    ),
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                ),
                renderPlainTranslatedText($caption)
            );

            continue;
        }

        $result .= renderPlainTranslatedText($part);
    }

    return $result;
}