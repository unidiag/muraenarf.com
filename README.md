# MuraenaRF website

A database-free PHP website with jQuery, Material Design styling, automatic page discovery and RU/EN localization.

## Requirements

- PHP 8.0+
- Apache with `mod_rewrite`
- `AllowOverride All` for `.htaccess`

## Adding a page

1. Create `pages/example.php`.
2. Return a metadata array with `slug`, translation keys, icon, order and `render` callback.
3. Add corresponding strings to `inc/ru.php` and `inc/en.php`.

The page will automatically appear in routing and the menu.

```php
<?php

return [
    'slug' => 'example',
    'menu' => 'example.menu',
    'title' => 'example.title',
    'description' => 'example.subtitle',
    'icon' => 'article',
    'order' => 60,
    'render' => static function (): void {
        ?>
        <section class="page-hero page-hero--compact">
            <div class="container">
                <h1><?= t('example.title') ?></h1>
                <p><?= t('example.subtitle') ?></p>
            </div>
        </section>
        <?php
    },
];
```

Set `showInMenu` to `false` for a routable page that should not be shown in navigation.

## Language selection

- `?lang=ru` or `?lang=en` overrides auto-detection and stores the choice in a cookie.
- Without a cookie, `10.8.0.*` receives Russian; other IP addresses receive English.
# muraenarf.com
