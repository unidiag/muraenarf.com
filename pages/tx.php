<?php

return [
    'slug' => 'tx',
    'menu' => 'tx.menu',
    'title' => 'tx.title',
    'description' => 'tx.subtitle',
    'icon' => 'cell_tower',
    'order' => 20,
    'render' => static function (): void {
        ?>
        <section class="page-hero">
            <div class="container page-hero__grid">
                <div class="reveal">
                    <div class="eyebrow"><span></span>MuraenaRF / TX</div>
                    <h1><?= t('tx.title') ?></h1>
                    <p><?= t('tx.subtitle') ?></p>
                </div>
                <div class="hero__visual">
                    <div class="hero__diy-level">
                        <?= diyLevel(2) ?>
                    </div>

                    <div class="device-photo reveal">
                        <img
                            src="/assets/images/muraenatx_main.jpg"
                            alt="<?= t('base.photo_alt') ?>"
                            width="720"
                            height="520"
                            loading="eager"
                            decoding="async"
                        >
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="container content-stack">
                <?php renderInfoSection('target', 'tx.purpose_title', 'tx.purpose_text'); ?>
                <?php renderInfoSection('developer_board', 'tx.device_title', 'tx.device_text'); ?>
                <?php renderInfoSection('settings_input_antenna', 'tx.operation_title', 'tx.operation_text'); ?>
                <section class="protocol-card surface-card reveal">
                    <div><span class="material-symbols-rounded">terminal</span><h2><?= t('tx.protocol_title') ?></h2></div>
                    <code><?= t('tx.protocol_example') ?></code>
                </section>
            </div>
        </section>
        <?php
    },
];
