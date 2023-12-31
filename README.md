# Mizzou Hybrid Base Theme

> This is the base theme used by University of Missouri sites. The theme has support for WordPress Full Site Editing (FSE) features as well as PHP templating via Timber.

Table of Contents

-   [Features](#features)
-   [Notes](#notes)
-   [Theme Structure](#theme-structure)
-   [Dependencies](#dependencies)
-   [Roadmap](#roadmap)
-   [Development](#development)
    -   [Tasks & Scripts](#tasks-scripts)
-   [Recent Updates](#recent-updates)
-   [Versioning](#versioning)
-   [Authors](#authors)

## Features

-   Light/Dark Mode Support: utilizes prefers-color-scheme (available in theme settings)
-   Link to Web Request Form in WordPress Admin bar
-   Ability to use header and footer template parts from WordPress Editor

## Notes

-   The theme uses the Wordpress composer package Timber to allow us to use the templating engine Twig, found in the Mizzou Blocks plugin. The site _will not_ work without this plugin.
-   Post Types
    -   Posts: Used to populate news stories
    -   Pages
-   ACF Options Pages
    -   Themes Settings: Restricted to Site Admins
    -   Footer: Contact information, footer theme
-   Navigation Locations
    -   Primary
    -   Tactical: Header ribbon
    -   Footer (limited support)

## Theme Structure

```
├── assets/
│   └── css/ <-- For compiled styles other than style.css
│   └── images/
│   └── js/ <-- For compiled js
├── inc/
│   └── acf/
|	    └── definitions/ <-- Auto-imported definitions
|	    └── fields/ <-- Custom ACF fields
├── parts/ <-- For WordPress Full Site Editing Template Parts
├── patterns/ <-- For WordPress Block Patterns
├── src/ <-- Main source files
│   └── images/
│   └── js/
│   └── scss/
│   └── gulp.config.json
│   └── gulpfile.js
├── templates/ <-- For WordPress Full Site Editing Templates
├── views/
├── .editorconfig
├── .gitignore
├── .nvmrc
├── 404.php
├── archive.php
├── CHANGELOG.md
├── composer.json
├── functions.php
├── index.php
├── package.json
├── phpcs.xml
├── README.md
├── search.php
├── singular.php
├── style.css
├── theme.json
└── yarn.lock
```

## Dependencies

-   [Mizzou WordPress Blocks plugin][miz-wordpress-blocks]
-   [Timber][timber]
-   [Advanced Custom Fields Pro][acf-pro]
-   [Mizzou Design System][miz-ds]

## Development

### Tasks & Scripts

-   `yarn styles`
-   `yarn build`
-   `yarn watch`
-   `yarn lint:js`
-   `yarn lint:style`
-   `yarn lint:pkg-json`
-   `yarn format:js`

## Recent updates

-   [Releases][hybrid-base-theme-releases]
-   [Changelog][hybrid-base-theme-changelog]

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository][hybrid-base-theme-tags].

## Authors

-   **Travis Cook** - [cooktw](https://gitlab.com/cooktw)

See also the list of [contributors][hybrid-base-theme-contributors] who participated in this project.

[hybrid-base-theme-releases]: https://gitlab.com/university-of-missouri/mizzou-digital/wordpress/miz-hybrid-base/-/releases
[hybrid-base-theme-tags]: (https://gitlab.com/university-of-missouri/mizzou-digital/wordpress/miz-hybrid-base/-/tags
[hybrid-base-theme-changelog]: https://gitlab.com/university-of-missouri/mizzou-digital/wordpress/miz-hybrid-base/-/blob/main/CHANGELOG.md
[hybrid-base-theme-contributors]: https://gitlab.com/university-of-missouri/mizzou-digital/wordpress/miz-hybrid-base/-/graphs/main
[miz-wordpress-blocks]: https://gitlab.com/university-of-missouri/mizzou-digital/wordpress/wp-plugins/miz-wordpress-blocks
[miz-ds]: https://gitlab.com/university-of-missouri/mizzou-digital/miz-ds/mizzou-design-system
[acf-pro]: https://www.advancedcustomfields.com/pro/
[timber]: https://timber.github.io/docs/
