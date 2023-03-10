
# Mizzou Font base

The Joint Office of Strategic Communications & Marketing has purchased a limited quantity of font licenses for both Graphik Condensed Black and Clarendon URW. If you're _only_ using Open Sans you don't need to ask permission, but we'd still like to know you're making use of our font standards.

For that reason, if you're developing for a university website please [complete the font request form](https://identity.missouri.edu/typography/index.php#form) before continuing unless you already have.

## How to use the fonts

First, [download this `.zip` file](http://digitalservice.missouri.edu/pattern-library/downloads/miz-fonts.zip) and insert the contents into your web root or assets directory. If you'd like to use [this repo directly](https://vcs.missouri.edu/mizzou-digital/miz-ds/assets/miz-fonts), you may do that as well.

Next, include a link to the `miz-fonts.css` file in the `<head>` of your page, typically after your site-specific CSS:

``` html
<head>

  <!-- Site stylesheet -->
  <link rel="stylesheet" type="text/css" href="your-css.css" />

  <!-- miz-fonts.css -->
  <link rel="stylesheet" type="text/css" href="css/miz-fonts.css" />

</head>
```

To apply the fonts, you'll need to apply the `font-family` CSS descriptor in your site's CSS. For example:

``` css
  h1,h2,h3,h4,h5,h6 {
    font-family: 'Open Sans';
    font-weight: bold;
  }

  .display-1 {
    font-family: 'Open Sans';
    font-weight: bold;
  }
```

You may need to alter the paths found in the `miz-fonts.css` file if there are issues with the fonts resolving.

More specific CSS styling will be provided in the future.

## What's included?

### CSS

A basic `.css` file is provided that uses the `@font-face` rule, declaring it for each font and the versions provided.

### Folder structure

**Note:** Font files are organized into respective folders and are provided in `.eot`, `.woff`, `.woff2` and `.ttf` formats, except for Graphik which does not provide a Truetype version.

``` text
miz-fonts/
|_ css/
|  |_ miz-fonts.css
|_ fonts/
   |_ clarendon-urw/
   |_ graphik-condensed-black/
   |_ open-sans/
```
