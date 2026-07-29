<?php

declare(strict_types=1);

const PROJECT_ROOT = __DIR__;
const PAGES_DIR = PROJECT_ROOT . '/pages';

require PROJECT_ROOT . '/vendor/autoload.php';
require PROJECT_ROOT . '/inc/functions.php';
require PROJECT_ROOT . '/inc/template.php';


$language = detectLanguage();
$translations = loadTranslations($language);
$pages = discoverPages(PAGES_DIR);
$slug = requestSlug();
$statusCode = 200;

if (!isset($pages[$slug])) {
    $statusCode = 404;
    $page = [
        'slug' => '404',
        'menu' => '404',
        'title' => '404',
        'description' => '',
        'icon' => 'error',
        'order' => 999,
        'showInMenu' => false,
        'render' => static function (): void {
            ?>
            <section class="page-hero page-hero--compact">
                <div class="container empty-state">
                    <span class="material-symbols-rounded">signal_disconnected</span>
                    <h1>404</h1>
                    <p>Page not found</p>
                    <a class="button button--primary" href="/">MuraenaRF</a>
                </div>
            </section>
            <?php
        },
    ];
} else {
    $page = $pages[$slug];
}

ob_start();
($page['render'])();
$content = (string) ob_get_clean();

renderTemplate([
    'page' => $page,
    'pages' => $pages,
    'language' => $language,
    'content' => $content,
    'statusCode' => $statusCode,
]);
