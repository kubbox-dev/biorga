<div class="grid-container">
	<div class="header-page">
		<h1 class="page_title"><span><?php the_title(); ?></span></h1>
	</div>
	<?php  if ( have_rows('ubicacion') ) : ?>
	<div id="contact-maps" class="theme-sl">
		<?php while (have_rows('ubicacion')) : the_row(); ?>
		<div class="grid-x grid-padding-x grid-padding-y">
			<div class="large-8 medium-8 small-12 cell">
				<div class="contact_maps">
					<?php the_sub_field('mapa'); ?>
				</div>
			</div>
			<div class="large-4 medium-4 small-12 cell">
				<div class="contact_info">
					<?php the_sub_field('contenido'); ?>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
	<div id="contact-form">
		<div class="grid-x grid-padding-x">
			<div class="large-10 medium-10 small-12 cell">
				<?php biorgaShortCode('[ninja_form id=1]'); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>