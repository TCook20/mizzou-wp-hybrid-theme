# Changelog

> All notable changes to this project will be documented in this file.

## 0.3.0

### Adds

-   `@parent` twig loader path

### Removes

-   Comments removed from admin bar
-   Site Editor removed from admin bar

## 0.2.1

### Changes

-   `archive.twig` Archive filters moved to separate template and only displays with a theme setting (`option.include_archive_filters`)
-   Twig template content blocks cleaned up.

### Fixes

-   Events Layer (`layers/events.twig`) button fixed

### Removes

-   Unused Twig templates

## 0.2.0

### Adds

-   Add filter to restrict number of selections on Decoration Location field

### Changes

-   Design System ACF Layers completely reworked (`views/layers/`)
    -   Events layer now supports setting Localist query information (`events.twig`)
    -   Decoration support added to: Big Message, Call to Action, Events, Link List
    -   Layer Background support added to: Big Message, Call to Action, Split Layout
    -   Content Background support added to: Call to Action, Split Layout
-   `singular.php` events layer can now set query from layer fields

### Removes

-   Calendar theme settings. Events layer manages its own settings. Events collection block manages its own settings.

## 0.1.3

### Fixes

-   Class function call in `singular.php`
-   Background image inclusion for `miz-decoration__plus`

## 0.1.2

### Fixes

-   Displaying header/footer template parts when a child theme is used

### Updates

-   Footer template part updated to match updated block markup
-   Header template part updated to match updated block markup

## 0.1.1

### Fixes

-   Footer address fields
-   Footer social icons
-   Switches to pulling WP body classes instead of just using `miz-body`

## 0.1.0

-   Initial Release
