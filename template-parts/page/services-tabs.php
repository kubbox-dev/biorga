<?php if (have_rows('design_with_tabs')) : ?>
	<?php while (have_rows('design_with_tabs')) : the_row(); ?>
		<?php if (get_row_layout() == 'block_one') : ?>
			<div id="nutricion_vegetal_block">
				<div class="grid-container">
					<div class="grid-x grid-padding-x">
						<div class="large-6 medium-6 small-12 cell">
							<figure class="nutricion_vegetal_img">
								<img src="<?php echo get_sub_field('imagen')['url']; ?>" alt="<?php echo get_sub_field('imagen')['title']; ?>">
							</figure>
						</div>
						<div class="large-6 medium-6 small-12 cell">
							<div class="content_services">
								<h3 class="page_subtitle"><?php the_sub_field('subtitulo'); ?></h3>
								<h1 class="page_title">
									<?php
									$title = str_replace(' ', '<br>', get_sub_field('titulo'));
									echo $title;
									?>
								</h1>
								<div class="content">
									<?php the_sub_field('contenido'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if (get_row_layout() == 'block_tabs' && have_rows('content_repeater')) : ?>
			<div id="service_tabs" class="theme-sl">
				<div class="grid-container">
					<div class="grid-x grid-margin-x">
						<div class="cell small-12">
							<ul class="tabs" data-tabs id="service_tabs_content_main">
								<?php
								$tab_count;
								while (have_rows('content_repeater')) : the_row();
									// Vars
									$tab_title = get_sub_field('tab_name');
									$tab_count += 1;
									if ($tab_count == 1) {
										$active = 'is-active';
									} else {
										$active = null;
									}
								?>
									<li class="tabs-title <?php echo $active ?>"><a href="#panel<?php echo $tab_count; ?>s" aria-selected="true"><?php echo $tab_title; ?></a></li>
								<?php endwhile; ?>
							</ul>
						</div>
						<div class="cell small-12">
							<div class="tabs-content" data-tabs-content="service_tabs_content_main">
								<?php
								$tab_content_count;
								while (have_rows('content_repeater')) : the_row();
									// Vars
									$tab_content_count += 1;
									if ($tab_content_count == 1) {
										$active = 'is-active';
									} else {
										$active = null;
									}
								?>
									<div class="tabs-panel <?php echo $active ?>" id="panel<?php echo $tab_content_count; ?>s">
										<?php while (have_rows('content_tabs')) : the_row(); ?>
											<?php
											if (get_row_layout() == 'bloque_arriba') :
												$block_top_titulo = get_sub_field('titulo');
												$posicion_imagen = get_sub_field('posicion_imagen');
												$block_top_contenido = get_sub_field('contenido');
												$block_top_ficha_tecnica = get_sub_field('ficha_tecnica');
												$block_top_imagen = get_sub_field('imagen');

												if ($posicion_imagen == 'right') {
													$content_left = 'medium-order-1';
													$image_right = 'medium-order-2';
													$fimage = 'text-right';
												} else {
													$content_left = null;
													$image_right = null;
													$fimage = 'text-left';
												}
											?>
												<div id="block_top" class="theme-sl">
													<div class="grid-x grid-padding-x">
														<div class="large-6 medium-6 small-12 <?php echo $image_right; ?> cell">
															<figure class="<?php echo $fimage ?>">
																<img src="<?php echo $block_top_imagen['url'] ?>" alt="<?php echo $block_top_imagen['title'] ?>">
															</figure>
														</div>
														<div class="large-6 medium-6 small-12 <?php echo $content_left; ?> cell">
															<div class="block_title">
																<h1><?php echo $block_top_titulo; ?></h1>
															</div>
															<div class="block_content text-justify">
																<?php echo $block_top_contenido; ?>
																<?php if ($block_top_ficha_tecnica) : ?>
																	<div class="ficha-tecnica-button">
																		<a href="<?php echo esc_url($block_top_ficha_tecnica); ?>" target="_blank" class="btn-descargar">
																			<svg class="btn-descargar__icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
																				<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
																				<polyline points="7 10 12 15 17 10" />
																				<line x1="12" y1="15" x2="12" y2="3" />
																			</svg>
																			<span class="btn-descargar__text">Descargar Ficha T&eacute;cnica</span>
																		</a>
																	</div>
																<?php endif; ?>
															</div>
														</div>
													</div>
												</div>
											<?php endif; ?>
											<?php
											if (get_row_layout() == 'datos_servicios') :
												$pos_table = get_sub_field('alineacion_tabla');
											?>
												<div id="data_services">
													<div class="grid-x grid-padding-x">
														<?php
														if (get_sub_field('alineacion_tabla') == 'right') {
															$table_pos = [
																'right'              => 'medium-order-2',
																'left'               => 'medium-order-1',
																'spaced_table_right' => 'large-offset-1',
																'spaced_table_left'  => null
															];
														} else {
															$table_pos = [
																'spaced_table_right' => null,
																'spaced_table_left'  => 'large-offset-1',
															];
														}
														?>
														<div class="large-5 <?php echo $table_pos['spaced_table_right'] ?> medium-6 small-12 cell <?php echo $table_pos['right'] ?>">
															<?php if (get_sub_field('composiciones')) : ?>
																<table class="unstriped">
																	<thead>
																		<tr>
																			<th colspan="2">
																				<div class="table_title text-center"><?php echo __('Composición', 'biorga'); ?></div>
																			</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																		while (have_rows('composiciones')) :
																			the_row();
																			$comp_name = get_sub_field('nombre_componente');
																			$value = get_sub_field('valor');
																		?>
																			<tr>
																				<td>
																					<div><?php echo $comp_name ?></div>
																				</td>
																				<td>
																					<div class="text-right"><?php echo $value; ?></div>
																				</td>
																			</tr>
																		<?php endwhile ?>
																	</tbody>
																</table>
															<?php endif; ?>
															<div class="unidad-medida">
																<small><?php echo get_sub_field('unidad_de_medida'); ?></small>
															</div>

														</div>
														<div class="large-6 <?php echo $table_pos['spaced_table_left'] ?> medium-6 small-12 cell<?php echo $table_pos['left'] ?>">
															<?php if (get_sub_field('contenido_superio_beneficio')) : ?>
																<div class="tabs_data_intro">
																	<?php the_sub_field('contenido_superio_beneficio'); ?>
																</div>
															<?php endif; ?>
															<div class="tabs_data_content">
																<?php
																while (have_rows('beneficios')) : the_row();
																	$bene_icon = get_sub_field('icono');
																	$bene_content = get_sub_field('contenido');
																?>
																	<div class="grid-x grid-padding-x grid-padding-y">
																		<div class="large-3 medium-3 small-12 cell">
																			<figure class="text-center">
																				<img src="<?php echo $bene_icon['url'] ?>" alt="<?php echo $bene_icon['title'] ?>">
																			</figure>
																		</div>
																		<div class="large-9 medium-9 small-12 cell">
																			<p> <?php echo $bene_content ?></p>
																		</div>
																	</div>
																<?php endwhile ?>
															</div>
														</div>
													</div>
												</div>
											<?php endif; ?>
											<?php if (get_row_layout() == 'banner_bottom') : ?>
												<div id="banner_data_bottom">
													<div class="grid-x grid-padding-x">
														<div class="large-6 medium-6 small-12 cell">
															<div class="grid-x grid-padding-x">
																<div class="large-4 medium-4 small-12 cell">
																	<div class="banner_data_image">
																		<figure>
																			<img src="<?php echo get_sub_field('icono_left')['url'] ?>" alt="<?php echo get_sub_field('icono_left'); ?>">
																		</figure>
																	</div>
																</div>
																<div class="large-8 medium-8 small-12 cell">
																	<div class="banner_data_content">
																		<?php the_sub_field('contenido_left') ?>
																	</div>
																</div>
															</div>
														</div>
														<div class="large-6 medium-6 small-12 cell">
															<div class="grid-x grid-padding-x">
																<div class="large-4 medium-4 small-12 cell">
																	<div class="banner_data_image">
																		<figure>
																			<img src="<?php echo get_sub_field('icono_derecha')['url'] ?>" alt="<?php echo get_sub_field('icono_derecha')['title']; ?>">
																		</figure>
																	</div>
																</div>
																<div class="large-8 medium-8 small-12 cell">
																	<div class="banner_data_content">
																		<?php the_sub_field('contenido_right') ?>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											<?php endif; ?>
											<?php if (get_row_layout() == 'Servicios slider') : ?>
												<div id="services_data_slider">
													<div class="grid-x grid-padding-x">
														<div class="large-10 large-centered medium-10 medium-centered small-12 cell">
															<?php biorgaShortCode(get_sub_field('content_slide')); ?>
														</div>
													</div>
												</div>
											<?php endif; ?>
											<?php if (get_row_layout() == 'before_after') : ?>
												<?php biorgaLoadTemplate('template-parts/page/parts/services', 'before-after'); ?>
											<?php endif; ?>
										<?php endwhile; ?>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>

	<?php endwhile; ?>
<?php endif; ?>