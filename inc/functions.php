<?php

declare(strict_types=1);


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

    return str_starts_with(getClientIp(), '10.8.0.') ? 'ru' : 'en';
}

function loadTranslations(string $language): array
{
    $file = __DIR__ . '/' . $language . '.php';

    if (!is_file($file)) {
        $file = __DIR__ . '/ru.php';
    }

    $translations = require $file;
    return is_array($translations) ? $translations : [];
}

function t(string $key, ?string $fallback = null): string
{
    global $translations;

    $value = $translations[$key] ?? $fallback ?? $key;
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
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
            <p><?= t($text) ?></p>
        </div>
    </section>
    <?php
}
