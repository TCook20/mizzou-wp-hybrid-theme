# Changelog

> All notable changes to this project will be documented in this file.

## 0.5.8

### Removes

-   `functions`: Removes disallowing of documents mime types

## 0.5.7

### Removes

-   `page`: Conditional to check for setting `$ary_content['page']->sub_navigation`

## 0.5.6

### Adds

-   `site-header--compact`: Site header using mega menu
-   JSON backups of theme settings fields

### Changes

-   Theme Settings PHP files renamed for consistency

## 0.5.5

### Changes

-   `inc/acf/acf-settings`: Adds conditional to check base and child themes for definitions
-   `inc/acf/group-definitions` renamed to `inc/acf/definitions`
-   `inc/acf/definitions/acf-miz-wp-base-settings`: Legacy search settings moved to group
-   `parts/`:
    -   `footer`: Updated to use block patterns (defaults to light theme)
    -   `header`: Updated to use block patterns

### Removes

-   `inc/acf/bidirectional-relationship`: No longer needed. Can be setup within ACF with v6.2

## 0.5.4

### Adds

-   `@layers/card-deck`: Card Deck Layer. Supports Title, Content, Card Deck and Button

### Changes

-   `src/acf`: Layer Definitions split out to separate files
-   `page`: Add conditional for sub navigation field

## 0.5.3

### Changes

-   `functions`: Add conditional to check for directory on Twig namespace

## 0.5.2

### Adds

-   `@components` twig namespace (`views/components`)
-   `@layers` twig namespace (`views/layers`)

### Fixes

-   `get_field` changed to `meta` in Twig

### Removes

-   (Style) Mobile sub navigation position reverted

## 0.5.1

### Adds

-   Block Patterns (`patterns/`):
    -   Big Message (Default)
    -   Big Message (Dark Variant)
    -   By the Numbers (Default)
    -   Call to Action (Black Variant)
    -   Call to Action (Gold Variant)
    -   Call to Action (Image Variant)
    -   Card Deck
    -   Featured Events (Dynamic)
    -   Featured News (Dynamic)
    -   Gallery (2 Columns)
    -   Gallery (2 Columns with Caption)
    -   Gallery (2 Columns with Title & Caption)
    -   Hero (Default)
    -   Hero (Page Header Variant)
    -   Page Header (Default)
    -   Page Header (Branded Variant)
    -   Page Header (Dark Branded Variant)
    -   Page Header (Dark Variant)
    -   Site Footer (Default)
    -   Site Footer (Dark Variant)
    -   Site Header (Default)
    -   Site Header (Dark Variant)
    -   Social (Black Variant)
    -   Social (Gold Variant)
    -   Stats (Black Variant)
    -   Stats (Image Variant)

### Changes

-   `functions.php`: Allow Details (`core/details`) and Footnotes (`core/footnotes`) blocks
-   `theme.json`: Remove color restrictions from blocks
-   `page` and `single`: Template fallbacks modified

### Removes

-   `singular`: No longer used
-   `single-post`: Preview removed from header

## 0.5.0

### Adds

-   `page`: Pulled from `singular` for Page post type
-   `single`: Pulled from `singular` for Post (News) post type
-   Nav Menu: Custom Field for ACF

### Changes

-   `functions`:
    -   Refactor metadata in wp_head to use `Timber\Helper` and `Timber\URLHelper` methods
    -   Theme supports pulled from `inc/theme-supports.php`
-   `singular`: Simplified for use with custom post types

## 0.4.17

### Adds

-   Sub Navigation: Styling added for drawer on mobile

### Changes

-   Patterns: Updated for changes to custom blocks
-   Breadcrumbs: Add padding

### Removes

-   `getMenu` function removed in favor of `Timber\Menu`

## 0.4.16

### Fixes

-   `single-page`: Path to sub navigation template

## 0.4.15

### Changes

-   `layers/big-message`: Don't render `<header>` if no title is entered
-   `layers/link-list`: Add aria-hidden to chevron icon

### Fixes

-   `layers/split-layout`: Content background no longer restricted to offset variant (defaults to light)

## 0.4.14

### Changes

-   `assets/css/brand.css`: Height of plus decoration changed to 5rem

## 0.4.13

### Changes

-   Event: Set min-width and word-spacing
-   Move editor styles to editor.scss

## 0.4.12

### Changes

-   `layers/split-layout`: Add recommendation text to Image field

### Fixes

-   Plus decoration setting on layers

### Removes

-   `layers/hero`: Tear is removed

## 0.4.11

### Adds

-   RSS Block: Added bottom margin to list
-   Event card: Updated styling

## Changes

-   Decoration Location: Field changed to radio from checkbox

### Fixes

-   `layers/split-layout`: Image container won't display if no image source is available

## 0.4.10

### Changes

-   `layers/big-message`: Button group changed to flexbox
-   `layers/split-layout`: Button group changed to flexbox

## 0.4.9

### Changes

-   `layers/big-message`: Margin added to buttons on mobile
-   `layers/split-layout`: Margin added to buttons on mobile

## 0.4.8

### Adds

-   `layers/big-message`: Overlay options for image background (dark overlay or no overlay)

### Changes

-   `layers/big-message`: Buttons moved into button group container
-   `layers/link-list`: Left align text
-   `layers/split-layout`:
    -   Move buttons into button group container
    -   Add z-index to figure

### Fixes

-   `layers/split-layout`: Missing offset class

## 0.4.7

### Changes

-   `archive`: Card Deck class changed
-   `layers/big-message`: Conditionally setting frame background color
-   Single Twig templates updated to use `single-[post_type]` naming convention

## 0.4.6

### Adds

-   `layers/quote`: Quote body adds background options

### Changes

-   ACF:
    -   Reusable fields adds conditional field for background overlay
    -   PHP import rewritten
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
