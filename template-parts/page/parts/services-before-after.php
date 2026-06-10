<?php
	
	$main_title       = get_sub_field('titulo');
	$main_subtitle    = get_sub_field('subtitulo');
	$imagen_before    = get_sub_field('imagen_before');
	$imagen_after     = get_sub_field('imagen_after');
	$titulo_before    = get_sub_field('titulo_before');
	$titulo_after     = get_sub_field('titulo_after');
	$subtitulo_before = get_sub_field('subtitulo_before');
	$subtitulo_after  = get_sub_field('subtitulo_after');

?>
<div id="services_before_after">
	<div class="header_title_before_after theme-sl">
		<div class="grid-x grid-padding-x">
			<div class="small-12 cell">
				<?php if ( $main_subtitle ) : ?>
				<h3 class="service_before_after_subtitle text-center"><span><?php echo $main_subtitle; ?></span></h3>
				<?php endif; ?>
				<h1 class="service_before_after_title page_title text-center"><span><?php echo $main_title; ?></span></h1>
			</div>
		</div>
	</div>
	<div class="content_main_before_after">
		<div class="grid-x grid-padding-x">
			<div class="large-6 medium-6 small-12 cell">
				<div class="content-services-before">
					<h3 class="content_title_before_after"><?php echo __('Antes', 'biorga'); ?></h3>
					<figure>
						<img src="<?php echo $imagen_before['url'] ?>">
					</figure>
					<h3 class="page_title"><?php echo $titulo_before; ?></h3>
					<h5 class="page_title"><?php echo $subtitulo_before; ?></h5>
				</div>
			</div>
			<div class="large-6 medium-6 small-12 cell">
				<div class="content-services-after">
					<h3 class="content_title_before_after"><?php echo __('Despúes', 'biorga'); ?></h3>
					<figure>
						<img src="<?php echo $imagen_after['url'] ?>">
					</figure>
					<h3 class="page_title"><?php echo $titulo_after; ?></h3>
					<h5 class="page_title"><?php echo $subtitulo_after; ?></h5>
				</div>
			</div>
		</div>
	</div>
</div>