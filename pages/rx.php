<?php

return [
    'slug' => 'rx',
    'menu' => 'rx.menu',
    'title' => 'rx.title',
    'description' => 'rx.subtitle',
    'icon' => 'account_tree',
    'order' => 30,
    'render' => static function (): void {
        ?>
        <section class="page-hero">
            <div class="container page-hero__grid">
                <div class="reveal">
                    <div class="eyebrow"><span></span>MuraenaRF / RX</div>
                    <h1><?= t('rx.title') ?></h1>
                    <p><?= t('rx.subtitle') ?></p>
                </div>
                <div class="device-icon reveal"><span class="material-symbols-rounded">account_tree</span></div>
            </div>
        </section>
        <section class="section">
            <div class="container content-stack">
                <?php renderInfoSection('target', 'rx.purpose_title', 'rx.purpose_text'); ?>
                <?php renderInfoSection('memory', 'rx.device_title', 'rx.device_text'); ?>
                <?php renderInfoSection('dynamic_form', 'rx.operation_title', 'rx.operation_text'); ?>
                <?php renderInfoSection('lan', 'rx.outputs_title', 'rx.outputs_text'); ?>
            </div>
        </section>
        <?php
    },
];
