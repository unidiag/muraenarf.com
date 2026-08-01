<?php

declare(strict_types=1);

function renderTemplate(array $context): void
{
    $page = $context['page'];
    $pages = $context['pages'];
    $language = $context['language'];
    $content = $context['content'];
    $statusCode = $context['statusCode'] ?? 200;

    http_response_code($statusCode);
    ?>
<!doctype html>
<html lang="<?= e($language) ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#071019">
    <meta name="description" content="<?= e((string) ($page['description'] ?: t('site.tagline'))) ?>">
    <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
    <link rel="shortcut icon" href="/assets/images/favicon.svg">
    <title><?= t($page['title']) ?> — <?= t('site.name') ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,300..700,0..1,-50..200" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/site.css<?= '?' . filemtime(PROJECT_ROOT . '/assets/css/site.css') ?>">

    <script src="https://code.jquery.com/jquery-4.0.0.min.js" defer></script>
    <script src="/assets/js/site.js<?= '?' . filemtime(PROJECT_ROOT . '/assets/js/site.js') ?>" defer></script>
</head>
<body>
<div class="page-background" aria-hidden="true"></div>
<header class="app-header">
    <div class="container app-header__inner">


        <a class="brand" href="/" aria-label="MuraenaRF">
            <img
                class="brand__mark"
                src="/assets/images/favicon.svg"
                alt=""
                width="42"
                height="42"
            >

            <span class="brand__text">
                <strong><?= t('site.name') ?></strong>
                <small><?= t('site.tagline') ?></small>
            </span>
        </a>


        <nav class="desktop-nav" aria-label="<?= t('nav.menu') ?>">
            <?php foreach ($pages as $menuPage): ?>
                <?php if (!$menuPage['showInMenu']) continue; ?>
                <a class="nav-link<?= $menuPage['slug'] === $page['slug'] ? ' is-active' : '' ?>"
                   href="<?= e(pageUrl($menuPage['slug'])) ?>">
                    <?= t($menuPage['menu']) ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <div class="header-actions">
            <div class="language-switch" aria-label="<?= t('nav.language') ?>">
                <a class="<?= $language === 'en' ? 'is-active' : '' ?>" href="<?= e(currentUrlWithLanguage('en')) ?>">EN</a>
                <a class="<?= $language === 'ru' ? 'is-active' : '' ?>" href="<?= e(currentUrlWithLanguage('ru')) ?>">RU</a>
            </div>
            <button class="icon-button mobile-menu-button" type="button" aria-label="<?= t('nav.menu') ?>" aria-expanded="false">
                <span class="material-symbols-rounded">menu</span>
            </button>
        </div>
    </div>

    <nav class="mobile-nav" aria-label="<?= t('nav.menu') ?>">
        <div class="container mobile-nav__inner">
            <?php foreach ($pages as $menuPage): ?>
                <?php if (!$menuPage['showInMenu']) continue; ?>
                <a class="mobile-nav__link<?= $menuPage['slug'] === $page['slug'] ? ' is-active' : '' ?>"
                   href="<?= e(pageUrl($menuPage['slug'])) ?>">
                    <span class="material-symbols-rounded"><?= e($menuPage['icon']) ?></span>
                    <?= t($menuPage['menu']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </nav>
</header>

<main>
    <?= $content ?>
</main>

<footer class="site-footer">
    <div class="container site-footer__grid">
        <div>
            <a class="brand brand--footer" href="/">
                <span class="brand__mark"><span class="material-symbols-rounded">settings_input_antenna</span></span>
                <span class="brand__text"><strong><?= t('site.name') ?></strong></span>
            </a>
            <p><?= t('footer.description') ?></p>
        </div>
        <div>
            <h3><?= t('footer.navigation') ?></h3>
            <?php foreach ($pages as $menuPage): ?>
                <?php if (!$menuPage['showInMenu']) continue; ?>
                <a href="<?= e(pageUrl($menuPage['slug'])) ?>"><?= t($menuPage['menu']) ?></a>
            <?php endforeach; ?>
        </div>
        <div>
            <h3><?= t('footer.project') ?></h3>
            <a href="https://github.com/unidiag" target="_blank" rel="noopener noreferrer"><?= t('nav.github') ?></a>
            <a href="mailto:info@muraenarf.com">info@muraenarf.com</a>
        </div>
    </div>
    <div class="container site-footer__bottom">
        <span>© <?= date('Y') ?> MuraenaRF. <?= t('footer.rights') ?></span>
        <span class="status-chip"><span></span><?= t('common.status_development') ?></span>
    </div>
</footer>

<div
    class="image-modal"
    data-image-modal
    aria-hidden="true"
>
    <div
        class="image-modal__overlay"
        data-image-modal-close
    ></div>

    <div
        class="image-modal__dialog"
        role="dialog"
        aria-modal="true"
        aria-labelledby="image-modal-title"
    >
        <div class="image-modal__header">
            <div
                class="image-modal__title"
                id="image-modal-title"
                data-image-modal-title
            ></div>

            <button
                class="image-modal__close"
                type="button"
                aria-label="<?= t('common.close') ?>"
                data-image-modal-close
            >
                <span class="material-symbols-outlined">
                    X
                </span>
            </button>
        </div>

        <div class="image-modal__content">
            <img
                class="image-modal__image"
                data-image-modal-image
                src=""
                alt=""
            >
        </div>
    </div>
</div>


</body>
</html>
    <?php
}
