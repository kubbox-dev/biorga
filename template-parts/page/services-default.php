<?php if ( have_rows('default') ) : ?>
<div class="grid-container">
	<?php while ( have_rows('default') ) : the_row(); ?>
		<?php if ( get_row_layout() == 'default_services') : ?>
			<div id="service_first_l" class="theme-sl">
				<div class="grid-x grid-padding-x">
					<?php
						$position_media = get_sub_field('position_media');
						$type = get_sub_field('type');

						if ( $type == 'video')
						{
							//$media = '<div class="responsive-embed widescreen">' . get_sub_field('video') . '</div>';
							$media_bottom = '<div class="responsive-embed widescreen">' . get_sub_field('video') . '</div>';
						}
						else
						{
							$media = '<img src="' . get_sub_field('image')['url'] . '" />';
						}

						if ( $position_media == 'left')
						{
							$pos_left = 'medium-order-2';
							$pos_right = 'medium-order-1';
						}
						else
						{
							$pos_left = null;
							$pos_right = null;
						}

						if ( $position_media == 'middle' )
						{
							$fclass = 'large-3 medium-3';
							$sclass = 'large-7 medium-7';
						}
						else
						{
							$fclass = 'large-6 medium-6';
							$sclass = 'large-6 medium-6';
						}
					?>
					<div class="<?php echo $fclass ?> small-12 cell <?php echo $pos_left; ?>">
						<div class="header-page">
							<h3 class="page_subtitle"><?php the_sub_field('subtitulo'); ?></h3>
							<h1 class="page_title"><?php the_sub_field('titulo'); ?></h1>
							<?php if ( $position_media == 'right' ||  $position_media == 'left') : ?>
							<div class="content-services">
								<?php the_sub_field('contenido'); ?>
							</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="<?php echo $sclass; ?> small-12 cell <?php echo $pos_right; ?>">
						<?php if ( $position_media == 'middle' ) : ?>
						    <div class="content-services">
								<?php the_sub_field('contenido'); ?>
							</div>
							<div class="content-services-media">
								<?php echo $media; ?>
							</div>
						<?php endif; ?>
						<?php if ( $position_media == 'right' || $position_media == 'left') : ?>
							<div class="content-services-media">
								<?php echo $media; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( get_row_layout() == 'services_slide') : ?>
			<div id="services_data_slider">
				<div class="grid-x grid-padding-x">
					<div class="large-10 large-centered medium-10 medium-centered small-12 cell">
						<?php biorgaShortCode(get_sub_field('slider_content')); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( get_row_layout() == 'paisa_refor') : ?>
			<div id="paisajismo_reforestacion" class="theme-sl">
				<div class="content_top">
					<div class="grid-x grid-padding-x">
						<div class="large-10 large-centered medium-10 medium-centered small-12 cell">
							<div class="header-page">
								<h3 class="page_subtitle text-center"><span><?php the_sub_field('paisa_refor_subtitle') ?></span></h3>
								<h1 class="page_title text-center"><span><?php the_sub_field('paisa_refor_title') ?></span></h1>
							</div>
							<div class="paisa_refor_content text-center">
								<?php the_sub_field('paisa_refor_content'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="content_bottom theme-sl">
					<div class="grid-x grid-padding-x">
						<?php
							$grid = 0;
							while ( have_rows('plantas_ornamentales') )
							{
								the_row();
								$grid += 1;
							}

							($grid > 0) ? $grid = 12 / $grid : $grid = 1;
						?>

						<?php
							while ( have_rows('plantas_ornamentales') ) :
								the_row();
								$plant_picture = get_sub_field('imagen_planta_ornamental');
								$plant_title = get_sub_field('titulo_planta_ornamental');
								$plant_type = get_sub_field('tipo_planta_ornamental');
								$plant_desc = get_sub_field('descripcion_planta_ornamental');
						?>

						<div class="large-<?php echo $grid; ?> medium-<?php echo $grid; ?> small-12 cell">
							<?php if ( $plant_picture ) : ?>
							<div class="content_bottom_picture <?php echo ($grid == 6) ? 'text-right' : null ?>">
								<figure>
									<img src="<?php echo $plant_picture['url'] ?>" alt="<?php echo $plant_picture['title']; ?>">
								</figure>
							</div>
							<?php endif; ?>
							<?php if ( $plant_title ) : ?>
							<div class="content_bottom_title">
								<h4><span><?php echo $plant_title; ?></span></h4>
							</div>
							<?php endif; ?>
							<?php if ( $plant_type ) : ?>
							<div class="content_bottom_type">
								<p><?php echo $plant_type; ?></p>
							</div>
							<?php endif; ?>
							<?php if ( $plant_desc ) : ?>
							<div class="content_bottom_desc">
								<p><?php echo $plant_desc; ?></p>
							</div>
							<?php endif; ?>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( get_row_layout() == 'especie_nativa') : ?>
			<div id="especies_nativas">
				<div class="content_top">
					<div class="grid-x grid-padding-x">
						<div class="large-10 large-centered medium-10 medium-centered small-12 cell">
							<div class="header-page">
								<h3 class="page_subtitle text-center"><span><?php the_sub_field('paisa_refor_subtitle') ?></span></h3>
								<h1 class="page_title text-center"><span><?php the_sub_field('paisa_refor_title') ?></span></h1>
							</div>
							<div class="paisa_refor_content text-center">
								<?php the_sub_field('paisa_refor_content'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="content_bottom">
					<div class="grid-x grid-padding-x">
						<?php
							$grid = 0;
							while ( have_rows('plantas_nativas') )
							{
								the_row();
								$grid += 1;
							}

							($grid > 0) ? $grid = 12 / $grid : $grid = 1;
						?>

						<?php
							$popup_control = 0;
							while ( have_rows('plantas_nativas') ) :
								the_row();

								$speci_popup = get_sub_field('popup');
								$speci_picture = get_sub_field('imagen_planta_ornamental');
								$speci_title = get_sub_field('titulo_planta_ornamental');
								$speci_desc = get_sub_field('descripcion_planta_ornamental');

								($speci_popup) ? $popup_control += 1 : null;
						?>

						<div class="large-<?php echo $grid; ?> medium-<?php echo $grid; ?> small-12 cell">
							<?php if ( $speci_picture ) : ?>
							<div class="content_bottom_picture <?php echo ($grid == 6) ? 'text-right' : null ?>">
								<figure>
									<img src="<?php echo $speci_picture['url'] ?>" alt="<?php echo $speci_picture['title']; ?>">
								</figure>
							</div>
							<?php endif; ?>
							<?php if ( $speci_title ) : ?>
							<div class="content_bottom_title">
								<h4><span><?php echo $speci_title; ?></span></h4>
							</div>
							<?php endif; ?>
							<?php if ( $speci_desc ) : ?>
							<div class="content_bottom_desc">
								<p><?php echo $speci_desc; ?></p>
							</div>
							<?php endif; ?>
							<?php if ( $speci_popup ) : ?>
								<div class="more_link">
									<button data-open="popup-<?php echo $popup_control ?>"><?php echo __('Ver más', 'biorga'); ?></button>
								</div>
								<div class="tiny reveal" id="popup-<?php echo $popup_control ?>" data-reveal>
									<?php
										switch( get_sub_field('tipo_de_contenido') )
										{
											case 'desing' :
												biorgaLoadTemplate('template-parts/page/parts/popup', 'desing');
											break;
											default:
												biorgaLoadTemplate('template-parts/page/parts/popup', 'table');
											break;
										}
									?>
									<button class="close-button" data-close aria-label="Close modal" type="button">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php endif; ?>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( get_row_layout() == 'before_after') : ?>
			<div class="media_bottom">
				<?php echo $media_bottom; ?>
			</div>
			<?php biorgaLoadTemplate('template-parts/page/parts/services', 'before-after'); ?>
		<?php endif; ?>
	<?php endwhile; ?>
</div>
<?php endif; ?>