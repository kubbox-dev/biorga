<?php
global $blog_nov;
global $post;

$what_wedo        = get_field_object('lo_que_hacemos');
$blog_nov         = get_field('blog_novedades');
$ctl_banner       = get_field('opciones_del_header');
$video_home       = get_field('video_homepage');
$slideshow_homepage = get_field('slideshow_homepage');

$args = array(
	'post_type'      => 'multimedia',
	'order'          => 'DESC',
	'posts_per_page' => 2,
);

$args_testi = array(
	'post_type'      => 'testimonio',
	'order'          => 'DESC',
	'posts_per_page' => 10,
);

$args_casos = array(
	'post_type'      => 'caso_exito',
	'order'          => 'DESC',
	'posts_per_page' => -1,
);

$multimedia = new WP_Query($args);
$testimonio = new WP_Query($args_testi);
$casos      = new WP_Query($args_casos);
?>

<?php if (is_front_page()) : ?>
	<div class="grid-container full">
		<div class="grid-x">
			<div class="small-12 cell">
				<?php
				switch ($ctl_banner) {
					case 'only_video':
						$video_src = $video_home;
						$is_url    = (strpos($video_src, 'http') === 0);
						$poster    = 'https://img.youtube.com/vi/gekTU-wKTqU/maxresdefault.jpg';

						if ($is_url) {
							$video_url = esc_url($video_src);
							echo '<div class="hero-video-wrapper" style="background-image:url(' . $poster . ')">';
							echo '<video autoplay muted loop playsinline preload="auto" poster="' . $poster . '">';
							echo '<source src="' . $video_url . '" type="video/mp4">';
							echo '</video>';
							echo '</div>';
						} else {
							$video_id = esc_attr($video_src);
							$params   = 'autoplay=1&mute=1&loop=1&playlist=' . $video_id . '&rel=0&controls=0&modestbranding=1&playsinline=1';
							echo '<div class="hero-video-wrapper" style="background-image:url(' . $poster . ')">';
							echo '<iframe src="https://www.youtube.com/embed/' . $video_id . '?' . $params . '" allow="autoplay; encrypted-media" allowfullscreen title="Video Biorga"></iframe>';
							echo '</div>';
						}
						break;

					case 'slider':
						theRevolutionSlider($slideshow_homepage);
						break;

					default:
						echo get_banner_thumbnails(null);
						break;
				}
				?>
			</div>
		</div>
	</div>
<?php endif; ?>

<!-- ── Soluciones agrícolas ───────────────────────────────── -->
<div id="lo_que_hacemos">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="small-12 cell">
				<div class="header-page">
					<h3 class="subtitle text-center">Servicios en</h3>
					<h3 class="title section_title text-center">Soluciones agrícolas</h3>
				</div>
			</div>
		</div>
		<div class="grid-x grid-padding-x lqh-cards-row">

			<div class="large-4 medium-4 small-12 cell">
				<div class="lqh-card">
					<h4 class="lqh-card__title text-center">Acondicionadores para suelos</h4>
					<div class="lqh-card__inner" style="background-image: url('http://biorganicos.com.co/wp-content/uploads/2026/05/Acondicionadores-para-suelos.png')">
						<div class="lqh-card__overlay">
							<div class="lqh-card__text">
								<p>En Bio-orgánicos S.A. producimos abonos orgánicos, fertilizantes orgánico-minerales de línea con registro de venta ICA, y mezclas especiales únicas, formuladas a partir de las necesidades del terreno y los cultivos.</p>
							</div>
						</div>
						<div class="lqh-card__icon">
							<img src="http://biorganicos.com.co/wp-content/uploads/2026/05/Icono-acondicionadores-para-suelos.svg" alt="Acondicionadores para suelos">
						</div>
					</div>
					<div class="lqh-card__footer">
						<a class="more_link_a" href="/acondicionadores-para-suelos/">--- VER MÁS ---</a>
					</div>
				</div>
			</div>

			<div class="large-4 medium-4 small-12 cell">
				<div class="lqh-card">
					<h4 class="lqh-card__title text-center">Nutrición vegetal</h4>
					<div class="lqh-card__inner" style="background-image: url('http://biorganicos.com.co/wp-content/uploads/2026/05/Nutricion-vegetal.png')">
						<div class="lqh-card__overlay">
							<div class="lqh-card__text">
								<p>Desarrollamos alternativas orgánicas y orgánico-minerales para la nutrición de los cultivos, según su estado fenológico y el tipo de plantación, con el fin de suministrar los nutrientes necesarios para un óptimo desarrollo.</p>
							</div>
						</div>
						<div class="lqh-card__icon">
							<img src="http://biorganicos.com.co/wp-content/uploads/2026/05/Icono-nutricion-vegetal.svg" alt="Nutrición vegetal">
						</div>
					</div>
					<div class="lqh-card__footer">
						<a class="more_link_a" href="https://biorganicos.com.co/nutricion-vegetal/">--- VER MÁS ---</a>
					</div>
				</div>
			</div>

			<div class="large-4 medium-4 small-12 cell">
				<div class="lqh-card">
					<h4 class="lqh-card__title text-center">Vivero y forestal</h4>
					<div class="lqh-card__inner" style="background-image: url('http://biorganicos.com.co/wp-content/uploads/2026/05/Vivero-y-forestal.png')">
						<div class="lqh-card__overlay">
							<div class="lqh-card__text">
								<p>En nuestro vivero producimos plantas ornamentales: rastreras, arbustivas, palmas y árboles nativos e introducidos. Asesoramos a nuestros clientes teniendo en cuenta el clima, el suelo y el proyecto.</p>
							</div>
						</div>
						<div class="lqh-card__icon">
							<img src="http://biorganicos.com.co/wp-content/uploads/2026/05/Icono-vivero-y-forestal.svg" alt="Vivero y forestal">
						</div>
					</div>
					<div class="lqh-card__footer">
						<a class="more_link_a" href="https://biorganicos.com.co/vivero-y-forestal/">--- VER MÁS ---</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>



<!-- ── Nuestro vivero ──────────────────────────────────────── -->
<div id="nuestro_vivero">
	<div class="grid-container">

		<div class="grid-x grid-padding-x">
			<div class="small-12 cell text-center">
				<h2 class="vivero-main-title">Nuestro vivero</h2>
				<p class="vivero-description">Somos productores y comercializadores de plantas debidamente registrados ante el Instituto Colombiano Agropecuario (ICA), garantizando trazabilidad, calidad y cumplimiento de la normatividad vigente para la producción y distribución de material vegetal.</p>
				<p class="vivero-contamos">Contamos con:</p>
			</div>
		</div>

		<div class="grid-x grid-padding-x vivero-cards-row">

			<!-- Card izquierda: info arriba, imagen abajo -->
			<div class="large-6 medium-6 small-12 cell">
				<div class="vivero-card vivero-card--left">
					<div class="vivero-card__info">
						<div class="vivero-card__header">
							<div class="vivero-card__text-block">
								<h3 class="vivero-card__title">Registro ICA</h3>
								<p class="vivero-card__resolution">Resolución No. 00021485</p>
								<p class="vivero-card__desc">Como comercializadores de plantas ornamentales, forestales, frutales y aromáticas.</p>
							</div>
							<div class="vivero-card__icon">
								<img src="http://biorganicos.com.co/wp-content/uploads/2026/06/sello-2.svg" alt="Sello ICA ornamentales">
							</div>
						</div>
					</div>
					<div class="vivero-card__img-outer">
						<div class="vivero-card__accent"></div>
						<div class="vivero-card__img-wrap">
							<img src="http://biorganicos.com.co/wp-content/uploads/2026/06/plantas-ornamentales.jpg" alt="Plantas ornamentales">
						</div>
					</div>
				</div>
			</div>

			<!-- Card derecha: imagen arriba, info abajo -->
			<div class="large-6 medium-6 small-12 cell">
				<div class="vivero-card vivero-card--right">
					<div class="vivero-card__img-outer">
						<div class="vivero-card__accent"></div>
						<div class="vivero-card__img-wrap">
							<img src="http://biorganicos.com.co/wp-content/uploads/2026/06/Limones.jpg" alt="Limones cítricos">
						</div>
					</div>
					<div class="vivero-card__info">
						<div class="vivero-card__header">
							<div class="vivero-card__text-block">
								<h3 class="vivero-card__title">Registro ICA</h3>
								<p class="vivero-card__resolution">Resolución No. 00021485</p>
								<p class="vivero-card__desc">Para la producción y comercialización de cítricos.</p>
							</div>
							<div class="vivero-card__icon">
								<img src="http://biorganicos.com.co/wp-content/uploads/2026/06/sello-1.svg" alt="Sello ICA cítricos">
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>



<!-- ── Banner parallax vivero ────────────────────────────── -->
<div id="vivero_parallax">
	<div class="vivero-parallax__bg">
		<div class="vivero-parallax__overlay">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						<p class="vivero-parallax__text">Estos registros respaldan nuestro compromiso con la calidad, la sanidad vegetal y la sostenibilidad, brindando confianza a empresas, entidades gubernamentales, viveristas, constructores y productores agrícolas que requieren material vegetal certificado para sus proyectos.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="vivero-parallax__footer">
		<a href="/vivero-y-forestal/" class="vivero-parallax__link">--- VER MÁS ---</a>
	</div>
</div>

<!-- ── Blog destacado ─────────────────────────────────────── -->
<div id="blog_destacado">
	<div class="grid-container">

		<div class="blog-header text-center">
			<h2 class="blog-header__title">Blog</h2>
			<p class="blog-header__subtitle">Destacado</p>
		</div>

		<div class="blog-featured">

			<div class="blog-featured__content">
				<h3 class="blog-featured__post-title">Especial enmiendas orgánico-minerales</h3>
				<p class="blog-featured__excerpt">
					El uso de enmiendas orgánicas en suelos agrícolas es una práctica ancestral que ha ido
					evolucionando paralelamente a los avances tecnológicos en la producción agrícola. En los
					inicios de la agricultura, el estiércol de origen animal y otros residuos orgánicos, como el de
					los cultivos, eran utilizados como única fuente de nutrientes para el suelo.
				</p>

				<h4 class="blog-featured__benefits-title">Beneficios</h4>

				<ul class="blog-featured__benefits-list">
					<li>Mejora la dinámica de microorganismos</li>
					<li>Aumenta el pH del suelo, disminuyendo la acidez.</li>
					<li>Mejora la estructura del suelo, especialmente en suelos arcillosos.</li>
					<li>Disminuye o elimina la toxicidad del aluminio, el hierro y el manganeso.</li>
					<li>Promueve el crecimiento radical, mejorando el desarrollo productivo del cultivo.</li>
				</ul>

				<a class="blog-featured__link" href="/blog/">--- VISITAR BLOG ---</a>
			</div>

			<div class="blog-featured__gallery">
				<div class="blog-featured__gallery-left">
					<div class="blog-featured__img-wrap">
						<img src="http://biorganicos.com.co/wp-content/uploads/2026/05/imagen-color-1.png" alt="Blog imagen 1">
					</div>
					<div class="blog-featured__img-wrap">
						<img src="http://biorganicos.com.co/wp-content/uploads/2026/05/imagen-color-2.png" alt="Blog imagen 2">
					</div>
				</div>
				<div class="blog-featured__gallery-right">
					<div class="blog-featured__img-wrap blog-featured__img-wrap--tall">
						<img src="http://biorganicos.com.co/wp-content/uploads/2026/05/imagen-color-3.png" alt="Blog imagen 3">
					</div>
					<div class="blog-featured__accent"></div>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- ── Casos de éxito ─────────────────────────────────────── -->
<?php
$page_id_historia = 282;

if (have_rows('tpl_history', $page_id_historia)) :
	while (have_rows('tpl_history', $page_id_historia)) : the_row();
		if (get_row_layout() == 'success_stories') :
?>
			<div id="casos_de_exito">
				<div class="grid-container">
					<div class="grid-x grid-padding-x">
						<div class="small-12 cell">
							<h2 class="casos__main-title text-center">Casos de éxito</h2>
						</div>
					</div>
				</div>

				<div class="casos-slider-wrapper">

					<button class="casos-slider__arrow casos-slider__arrow--prev" aria-label="Anterior">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</button>

					<div class="casos-slider__track">
						<?php
						$index = 0;
						while (have_rows('project')) :
							the_row();
							$project_name     = get_sub_field('project_name');
							$image_before     = get_sub_field('image_before');
							$image_after      = get_sub_field('image_after');
							$titulo_before    = get_sub_field('titulo_before');
							$subtitulo_before = get_sub_field('subtitulo_before');
							$titulo_after     = get_sub_field('titulo_after');
							$subtitulo_after  = get_sub_field('subtitulo_after');
						?>
							<div class="casos-slide <?php echo $index === 0 ? 'is-active' : ''; ?>">

    <!-- Título visible solo en mobile -->
    <p class="casos-slide__mobile-title"><?php echo esc_html($project_name); ?></p>

    <!-- Imagen Antes -->
    <div class="casos-slide__img-wrap casos-slide__img-wrap--before">
        <?php if ($image_before) : ?>
            <img src="<?php echo esc_url($image_before['url']); ?>"
                 alt="<?php echo esc_attr($image_before['title']); ?>">
        <?php endif; ?>
    </div>

    <!-- Panel central verde (solo desktop/tablet) -->
    <div class="casos-slide__center">
        <p class="casos-slide__project-name"><?php echo esc_html($project_name); ?></p>
    </div>

    <!-- Imagen Después -->
    <div class="casos-slide__img-wrap casos-slide__img-wrap--after">
        <?php if ($image_after) : ?>
            <img src="<?php echo esc_url($image_after['url']); ?>"
                 alt="<?php echo esc_attr($image_after['title']); ?>">
        <?php endif; ?>
    </div>

    <!-- Caption Antes -->
    <div class="casos-slide__caption casos-slide__caption--before">
        <h3><?php echo esc_html($titulo_before); ?></h3>
        <p><?php echo esc_html($subtitulo_before); ?></p>
    </div>

    <!-- Caption Después -->
    <div class="casos-slide__caption casos-slide__caption--after">
        <h3><?php echo esc_html($titulo_after); ?></h3>
        <p><?php echo esc_html($subtitulo_after); ?></p>
    </div>

</div>
						<?php
							$index++;
						endwhile;
						?>
					</div>

					<button class="casos-slider__arrow casos-slider__arrow--next" aria-label="Siguiente">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</button>

				</div>
			</div>

		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>

<!-- ── Multimedia ─────────────────────────────────────────── -->
<?php if ($multimedia->have_posts()) : ?>
	<div id="multimedia" class="theme-sl">
		<div class="grid-container fluid">
			<div class="grid-x grid-padding-x align-center">
				<?php
				// Mostrar solo el primer video
				$i = 0;
				while ($multimedia->have_posts()) :
					$multimedia->the_post();
					if ($i === 0) :
				?>
					<div class="large-10 medium-10 small-12 cell video-wrapper">
						<div class="video-container">
							<iframe 
								src="https://www.youtube.com/embed/<?php echo get_field('upload_video'); ?>"
								frameborder="0"
								allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
								allowfullscreen
								title="Video destacado"
							></iframe>
						</div>
					</div>
				<?php 
					endif;
					$i++;
				endwhile; 
				?>
			</div>
		</div>
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="large-4 large-centered medium-4 medium-centered small-12 cell">
					<div class="more_link_multimedia">
						<?php echo biorgaMoreLink(get_bloginfo('url') . '/multimedia', 'Ver Multimedia'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<!-- ── Instagram ─────────────────────────────────────────── -->
<div id="instagram">
	<div class="grid-container full">
		<div class="grid-x auto cell">
			<?php biorgaShortCode('[widgetkit id="2"]'); ?>
		</div>
	</div>
</div>

<!-- ── JS Slider casos de éxito ──────────────────────────── -->
<script>
	(function($) {
		$(document).ready(function() {
			var $slides = $('.casos-slide');
			var total   = $slides.length;
			var current = 0;
			var busy    = false;

			if (total <= 1) {
				$('.casos-slider__arrow').hide();
				return;
			}

			function goTo(index) {
				if (busy || index === current) return;
				busy = true;
				$('.casos-slider__arrow').prop('disabled', true);

				var from = current;
				current  = index;

				var $out = $slides.eq(from);
				var $in  = $slides.eq(index);

				// Fade out: el slide activo (position:relative) desaparece
				$out.stop(true).animate({ opacity: 0 }, 300, function() {

					// Saca del flujo; quita estilo inline → CSS pone opacity:0
					$out.removeClass('is-active').css('opacity', '');

					// Mete el siguiente al flujo con opacity:0 inline,
					// luego anima a opacity:1 para el fade-in
					$in.css('opacity', 0).addClass('is-active')
						.stop(true).animate({ opacity: 1 }, 300, function() {
							$in.css('opacity', ''); // devuelve el control al CSS
							busy = false;
							$('.casos-slider__arrow').prop('disabled', false);
						});
				});
			}

			$('.casos-slider__arrow--next').on('click', function() {
				goTo((current + 1) % total);
			});
			$('.casos-slider__arrow--prev').on('click', function() {
				goTo((current - 1 + total) % total);
			});
		});
	})(jQuery);
</script>