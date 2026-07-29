<?php

return [
    'slug' => 'main',
    'menu' => 'main.menu',
    'title' => 'main.title',
    'description' => 'main.subtitle',
    'icon' => 'home',
    'order' => 10,
    'render' => static function (): void {
        ?>
        <section class="hero">
            <div class="container hero__grid">
                <div class="hero__content reveal">
                    <div class="eyebrow"><span></span><?= t('common.status_development') ?></div>
                    <h1><?= t('main.title') ?></h1>
                    <p class="hero__lead"><?= t('main.subtitle') ?></p>
                    <div class="hero__actions">
                        <a class="button button--primary" href="/tx">
                            <?= t('main.hero_primary') ?>
                            <span class="material-symbols-rounded">arrow_forward</span>
                        </a>
                        <a class="button button--outlined" href="/contact"><?= t('main.hero_secondary') ?></a>
                    </div>
                </div>
                <div class="hero-visual reveal" aria-hidden="true">
                    <div class="rf-orbit rf-orbit--one"></div>
                    <div class="rf-orbit rf-orbit--two"></div>
                    <div class="rf-node rf-node--tx">
                        <span class="material-symbols-rounded">cell_tower</span>
                        <strong>TX</strong>
                    </div>
                    <div class="rf-node rf-node--rx">
                        <span class="material-symbols-rounded">hub</span>
                        <strong>RX × 8</strong>
                    </div>
                    <div class="rf-signal"></div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container two-column">
                <?php renderInfoSection('radar', 'main.about_title', 'main.about_text'); ?>
                <?php renderInfoSection('cable', 'main.problem_title', 'main.problem_text'); ?>
            </div>
        </section>

        <section class="section section--muted" id="architecture">
            <div class="container">
                <div class="section-heading reveal">
                    <span class="section-heading__line"></span>
                    <h2><?= t('main.architecture_title') ?></h2>
                </div>
                <div class="card-grid card-grid--three">
                    <?php renderFeature('dashboard', 'main.base_title', 'main.base_text'); ?>                    
                    <?php renderFeature('cell_tower', 'main.tx_title', 'main.tx_text'); ?>
                    <?php renderFeature('account_tree', 'main.rx_title', 'main.rx_text'); ?>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section-heading reveal"><span class="section-heading__line"></span><h2><?= t('main.features_title') ?></h2></div>
                <div class="principles surface-card reveal">
                    <?php foreach (['main.feature_1', 'main.feature_2', 'main.feature_3', 'main.feature_4'] as $index => $key): ?>
                        <div class="principle">
                            <span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span>
                            <p><?= t($key) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    },
];
