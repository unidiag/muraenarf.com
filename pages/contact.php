<?php

return [
    'slug' => 'contact',
    'menu' => 'contact.menu',
    'title' => 'contact.title',
    'description' => 'contact.subtitle',
    'icon' => 'mail',
    'order' => 50,
    'render' => static function (): void {
        ?>
        <section class="page-hero page-hero--compact">
            <div class="container reveal">
                <div class="eyebrow"><span></span>MuraenaRF / Contact</div>
                <h1><?= t('contact.title') ?></h1>
                <p><?= t('contact.subtitle') ?></p>
            </div>
        </section>
        <section class="section">
            <div class="container card-grid card-grid--three">
                <article class="contact-card surface-card reveal">
                    <span class="material-symbols-rounded">person</span>
                    <small><?= t('contact.author_title') ?></small>
                    <strong><?= t('contact.author_name') ?></strong>
                </article>
                <a class="contact-card surface-card reveal" href="mailto:<?= t('contact.email') ?>">
                    <span class="material-symbols-rounded">mail</span>
                    <small><?= t('contact.email_title') ?></small>
                    <strong><?= t('contact.email') ?></strong>
                </a>
                <a class="contact-card surface-card reveal" href="https://github.com/unidiag" target="_blank" rel="noopener noreferrer">
                    <span class="material-symbols-rounded">code</span>
                    <small><?= t('contact.github_title') ?></small>
                    <strong><?= t('contact.github_text') ?></strong>
                </a>
            </div>
        </section>
        <?php
    },
];
