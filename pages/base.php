<?php

return [
    'slug' => 'base',
    'menu' => 'base.menu',
    'title' => 'base.title',
    'description' => 'base.subtitle',
    'icon' => 'dashboard',
    'order' => 15,
    'render' => static function (): void {
        ?>
        <section class="page-hero">
            <div class="container page-hero__grid">
                <div class="reveal">
                    <div class="eyebrow"><span></span>MuraenaRF / WebUI</div>
                    <h1><?= t('base.title') ?></h1>
                    <p><?= t('base.subtitle') ?></p>
                </div>
                <div class="device-photo-3d reveal">
                    <div class="device-photo-3d__shadow"></div>
                    <img
                        src="/assets/images/muraenabase_main.jpg"
                        alt="<?= t('base.photo_alt') ?>"
                        width="900"
                        height="700"
                    >
                </div>
            </div>
        </section>
        <section class="section">
            <div class="container content-stack">
                <?php renderInfoSection('tune', 'base.purpose_title', 'base.purpose_text'); ?>
                <section class="surface-card function-list reveal">
                    <h2><?= t('base.functions_title') ?></h2>
                    <?php foreach (['base.function_1', 'base.function_2', 'base.function_3', 'base.function_4', 'base.function_5'] as $key): ?>
                        <div><span class="material-symbols-rounded">check_circle</span><p><?= t($key) ?></p></div>
                    <?php endforeach; ?>
                </section>
                <?php renderInfoSection('code', 'base.technology_title', 'base.technology_text'); ?>
            </div>
        </section>
        <?php
    },
];
