# Changelog

> All notable changes to this project will be documented in this file.

## 0.4.6

### Changes

-   `layers/big-message`:
    -   Corner decoration is optional
    -   Button style options (primary and secondary)

## 0.4.5

### Changes

-   Layer Plus Decoration: Limit to one location

### Fixes

-   `layers/call-to-action`: Set text color for black-100 content background
-   `layers/split-layout`: Text color for transparent content background

## 0.4.4

### Fixes

-   `call-to-action`: Fixes frame classes
-   `split-layout`: Syntax error

## 0.4.3

### Adds

-   `split-layout`: Adds support for media type (image/video)

### Changes

-   Updates ACF definitions

## 0.4.2

### Adds

-   Post article header styling

### Changes

-   `functions`: Add GCSE script to page titled `Search`
-   `search.twig`: queryParameter updated
-   GCSE styling updated
-   `post.twig`: Clean up template

### Fixes

-   `split-layout`: Background image fixed. Temporarily adding dark gel overlay.

## 0.4.1

### Changes

-   DS Layer Definitions: Button in repeater field is now required
-   DS Layer Definitions: Max number of buttons set

## 0.4.0

### Adds

-   `editor.css` Add overrides to block editor

### Changes

-   `navigation-pagination.twig` renamed to `pagination.twig`
-   `baseView.twig` aside blocks restructured

### Fixes

-   Setting main class modifier for selected aside side
-   Breadcrumbs hidden on homepage
-   `layers/big-message.twig` Layer background setting
-   `layers/split-layout.twig` Ignore content background when level variant is selected

## 0.3.1

### Changes

-   Social Media SVG updated based on WP icons

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
