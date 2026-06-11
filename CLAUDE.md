# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

WordPress custom theme (`biorga`) for Biorgánicos S.A. — a Colombian organic-agriculture company. The live site is `biorganicos.com.co`. Full project context is in `AGENTS.md`.

## Commands

```bash
# Compile SCSS → assets/css/theme.css
npm run build

# Watch + auto-deploy via SFTP (requires SSH key ~/.ssh/testserver.pem)
npm start
```

> `npm run build` always exits with code 1 due to Dart Sass deprecation warnings — this is expected. If the output includes `"Finished 'sass'"`, the CSS was generated correctly.

**Node.js v14.x is required.** Do not upgrade; newer versions break `gulp-sftp` and the build chain.

## Architecture

This is a PHP WordPress theme — no React, no build-time bundling for PHP/JS.

| Concern | Files |
|---|---|
| Styles (source) | `assets/scss/` — entry point `theme.scss`, main custom styles in `_style.scss` |
| Styles (output) | `assets/css/theme.css` — compiled artifact, upload to server after build |
| JS | `assets/js/theme.js` — sticky header, carousels, WhatsApp float button |
| Homepage sections | `template-parts/page/page-frontend.php` — all homepage sections live here |
| PHP helpers | `includes/theme_helper.php` — `biorgaLoadTemplate()`, `get_banner_thumbnails()` |
| Custom Post Types | `includes/custom_post_types.php` — `multimedia`, `testimonio`, `caso_exito`, `producto` |
| Theme entry | `functions.php` — script/style enqueue, version strings for cache busting |

## Key conventions

- **SCSS colors**: defined as a map in `assets/scss/_settings.scss` under `$theme-palette`. Access via `getColor(ColorName)` — map keys are case-sensitive (`LightGreen`, not `lightGreen`).
- **PHP templates**: always include with `biorgaLoadTemplate('template-parts/...')`, not `get_template_part()`.
- **JS**: all code wrapped in `(function($){ ... })(jQuery)` — WordPress runs jQuery in noConflict mode.
- **Cache busting**: after changing `theme.css`, increment the version string in `functions.php` (`wp_enqueue_style('framework-style', ..., '6.X')`).
- **ACF outputs**: always escape with `esc_html()`, `esc_url()`, or `esc_attr()` depending on context.

## Deploy

After making changes, upload to the server via SFTP (host `34.198.69.163`, path `/opt/bitnami/apps/joomla/htdocs/biorganicos/wp-content/themes/biorga/`):

| Change type | Files to upload |
|---|---|
| SCSS / styles | `assets/css/theme.css` |
| JS | `assets/js/theme.js` |
| PHP templates | The modified `.php` file |
| Enqueue / versions | `functions.php` |
