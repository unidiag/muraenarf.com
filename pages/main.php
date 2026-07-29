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
                        <button
                            class="button button--primary"
                            type="button"
                            data-video-modal-open
                        >
                            <?= t('main.video_title') ?>
                        </button>
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
                    <h2><?= t('main.architecture_alt') ?></h2>
                </div>

                <div class="architecture-diagram reveal">
                    <img
                        src="/assets/images/muraenarf-architecture.svg"
                        alt="<?= t('main.architecture_alt') ?>"
                        loading="lazy"
                        decoding="async"
                    >
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


        <div
            class="video-modal"
            data-video-modal
            aria-hidden="true"
        >
            <div
                class="video-modal__overlay"
                data-video-modal-close
            ></div>

            <div
                class="video-modal__dialog"
                role="dialog"
                aria-modal="true"
                aria-labelledby="project-video-title"
            >
                <div class="video-modal__header">
                    <h2
                        class="video-modal__title"
                        id="project-video-title"
                    >
                        <?= t('main.video_title') ?>
                    </h2>

                    <button
                        class="video-modal__close"
                        type="button"
                        aria-label="<?= t('common.close') ?>"
                        data-video-modal-close
                    >
                        <span class="material-symbols-outlined">
                            X
                        </span>
                    </button>
                </div>

                <div
                    class="video-modal__player"
                    data-video-player
                    data-video-url='https://www.youtube-nocookie.com/embed/<?= t('main.video_url') ?>?autoplay=1&rel=0'
                ></div>
            </div>
        </div>

        <?php
    },
];
