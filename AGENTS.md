# AGENTS.md — Biorga WordPress Theme

Guía de referencia para agentes de IA que trabajen sobre este repositorio.

---

## Resumen del proyecto

Tema WordPress personalizado para **Biorgánicos S.A.** (`biorganicos.com.co`), empresa colombiana de soluciones agrícolas orgánicas. El tema se llama `biorga`.

---

## Stack tecnológico

| Capa | Tecnología |
|---|---|
| CMS | WordPress (PHP) |
| CSS framework | Foundation for Sites 6.5.1 |
| CSS fuente | SCSS → compilado a `assets/css/theme.css` |
| Build | Gulp 4 + Dart Sass (`sass@1.69.7`, `gulp-sass@5`) |
| JS | jQuery 3.2.1 (vendor local) + GSAP TweenMax 2.0.2 (CDN) |
| Campos personalizados | ACF (Advanced Custom Fields) |
| Slider de banner | Revolution Slider 5.4.6.4 (plugin WP) |
| Node.js requerido | v14.x (limitación del proyecto — no actualizar) |

---

## Comandos

```bash
# Compilar SCSS → assets/css/theme.css
npm run build

# El build siempre termina con exit code 1 por deprecation warnings de Dart Sass
# Ignorar ese código — si dice "Finished 'sass'" el CSS fue generado correctamente
```

---

## Estructura de archivos clave

```
biorga/
├── functions.php              # Enqueue de scripts/estilos, helpers PHP
├── header.php                 # Header del tema — sticky navbar
├── footer.php                 # Footer
├── front-page.php             # Entry point de la homepage (carga page-frontend.php)
├── style.css                  # Metadatos del tema WordPress (no editar para estilos)
├── gulpfile.js                # Pipeline de build (SCSS → CSS)
├── assets/
│   ├── css/theme.css          # ← CSS COMPILADO (subir al servidor después de build)
│   ├── js/theme.js            # JS principal: sticky header, navegación, WhatsApp
│   ├── scss/
│   │   ├── theme.scss         # Punto de entrada SCSS (importa todo)
│   │   ├── _style.scss        # Estilos custom principales ← la mayoría de cambios va aquí
│   │   ├── _page.scss         # Estilos de páginas internas
│   │   ├── _blog.scss         # Estilos del blog
│   │   ├── _settings.scss     # Variables SCSS: paleta de colores, tipografía, breakpoints
│   │   ├── _functions.scss    # Funciones SCSS: getColor(), headerSizes()
│   │   └── _css3-mixins.scss  # Mixins: transition, border-radius, etc.
│   └── icomoon/               # Fuente de iconos custom (arrow, facebook, instagram, whatsapp)
├── includes/
│   ├── custom_post_types.php  # Registro de CPTs: multimedia, testimonio, caso_exito, producto
│   └── theme_helper.php       # Helpers: biorgaMoreLink(), get_banner_thumbnails(), etc.
└── template-parts/
    └── page/
        ├── page-frontend.php  # ← HOMEPAGE PRINCIPAL (todas las secciones)
        ├── blog-novedades.php
        ├── services-default.php
        ├── services-tabs.php
        └── know-us.php
```

---

## Paleta de colores

Definida en `assets/scss/_settings.scss` bajo `$theme-palette`:

| Nombre | Hex | Uso |
|---|---|---|
| `DarkGreen` | `#4f5c52` | Verde oscuro principal |
| `MediumGreen` | `#5b9351` | Verde medio (iconos, botones, panel casos de éxito) |
| `LightGreen` | `#9cc24f` | Verde claro (links, acentos) |
| `LigthGray` | `#707070` | Gris texto secundario (ojo: typo intencional en el nombre) |
| `DarkGray` | `#333` | Texto oscuro |
| `LightenGray` | `#f0f0f0` | Fondos claros |

Uso: `getColor(NombreColor)` en SCSS.

---

## Secciones de la homepage (`page-frontend.php`)

1. **Banner/Hero** — controlado por ACF `opciones_del_header`:
   - `only_video`: video mp4 self-hosted (o YouTube embed como fallback). Poster fijo: thumbnail de YouTube ID `gekTU-wKTqU`
   - `slider`: Revolution Slider (ID del slider en `slideshow_homepage`)
   - default: banner de imagen con `get_banner_thumbnails()`

2. **Soluciones agrícolas** (`#lo_que_hacemos`) — **HARDCODEADO** (no usa ACF):
   - 3 cards con imagen de fondo, overlay de texto en hover, ícono circular verde
   - Imágenes en `https://biorganicos.com.co/wp-content/uploads/2026/05/`
   - Links: `/acondicionadores-para-suelos/`, `/nutricion-vegetal/`, `/vivero-y-forestal/`

3. **Servicios** (`#services`) — ACF repeater `services` → sub-repeater `services_biorga`

4. **Blog novedades** — incluye `template-parts/page/blog-novedades.php`

5. **Casos de éxito** (`#casos_de_exito`) — ACF flexible content en página ID 282 (`tpl_history`):
   - Layout `success_stories` → sub-repeater `project`
   - Cada proyecto: `project_name`, `image_before`, `image_after`, `titulo_before`, `subtitulo_before`, `titulo_after`, `subtitulo_after`
   - Carrusel JS custom (fade crossfade con jQuery)

6. **Multimedia** (`#mutimedia`) — CPT `multimedia`, ACF field `upload_video` (YouTube ID)

7. **Instagram** — shortcode Widgetkit ID 2

8. **Testimonios** — CPT `testimonio`, slider JS propio (slide horizontal con jQuery animate)

---

## Custom Post Types

Registrados en `includes/custom_post_types.php`:

| CPT slug | Descripción |
|---|---|
| `multimedia` | Videos de YouTube embebidos |
| `testimonio` | Testimonios de clientes |
| `caso_exito` | Casos de éxito (antes/después) — *registrado pero no usado directamente; los casos se guardan en ACF flexible content de página ID 282* |
| `producto` | Productos del catálogo |

---

## ACF: campos importantes

| Página / contexto | Campo | Tipo | Descripción |
|---|---|---|---|
| Homepage | `opciones_del_header` | Select | `only_video` / `slider` / default |
| Homepage | `video_homepage` | Text/URL | URL del mp4 o YouTube ID |
| Homepage | `slideshow_homepage` | Text | Alias del Revolution Slider |
| Homepage | `lo_que_hacemos` | Repeater | *Ya no se usa (sección hardcodeada)* |
| Homepage | `services` | Repeater | Servicios con sub-repeater `services_biorga` |
| Página ID 282 | `tpl_history` | Flexible content | Layout `success_stories` → repeater `project` |
| CPT multimedia | `upload_video` | Text | YouTube ID del video |
| CPT testimonio | `author` | Text | Autor del testimonio |

---

## Flujo de build y deploy

```
SCSS (_style.scss, _page.scss, etc.)
  ↓ npm run build (Gulp + Dart Sass)
assets/css/theme.css   ← subir al servidor
```

**Archivos a subir al servidor tras cambios:**

| Tipo de cambio | Archivos a subir |
|---|---|
| SCSS / estilos | `assets/css/theme.css` |
| JS | `assets/js/theme.js` |
| PHP (templates) | El `.php` modificado |
| Enqueue / versiones | `functions.php` |

> **Nota de caché:** Cuando se cambia `theme.css`, actualizar la versión en `functions.php`:
> `wp_enqueue_style('framework-style', ..., '6.X')` — incrementar la X para forzar descarga del browser.

---

## Bugs conocidos y resoluciones históricas

| Bug | Causa | Solución |
|---|---|---|
| Build SCSS fallido (node-sass) | node-sass@4 no tiene binario para Node 14 | Migrado a `sass@1.69.7` + `gulp-sass@5` |
| `getColor(lightGreen)` sin efecto | SCSS map-get es case-sensitive | Corregido a `getColor(LightGreen)` |
| Video hero negro al cargar | Sin poster mientras carga mp4 | Poster fijo = thumbnail YouTube `gekTU-wKTqU` |
| Video hero con barras negras | Altura fija conflictua con Foundation | `display:block; width:100%; height:auto` |
| Carrusel casos de éxito "rebota" | JS ponía `opacity:1` en el slide saliente tras el fade-out | Reescrito: usar `$out.css('opacity','')` para devolver control al CSS |
| Título centro carrusel no aparece | `align-self:flex-start` + JS calculaba altura incorrecta en slides no activos | Removido `align-self`; flexbox `stretch` maneja la altura automáticamente |

---

## Notas de seguridad

- `ini_set('display_errors', 1)` **removido** de `header.php` (exponía errores PHP en producción)
- Las salidas de ACF siempre escapar con `esc_html()`, `esc_url()`, `esc_attr()` según el contexto
- URLs hardcodeadas usan `https://` (no `http://`)

---

## Convenciones del proyecto

- SCSS: BEM para componentes nuevos (`bloque__elemento--modificador`)
- Foundation grid: clases `large-X medium-X small-X cell` con `grid-x grid-padding-x`
- PHP templates: incluir con `biorgaLoadTemplate('template-parts/...')` (función en theme_helper.php)
- JS: todo en IIFE `(function($){ ... })(jQuery)` para compatibilidad con WordPress noConflict
