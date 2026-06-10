<div class="popup_desing_title">
	<div class="grid-container full">
		<div class="grid-x">
			<div class="small-12 cell">
				<?php the_sub_field('titulo_planta_ornamental'); ?>
			</div>
		</div>
	</div>
</div>
<?php if ( have_rows('desing_especies_naltivas') ) : ?>
<div class="desing_especies_naltivas">
	<?php while ( have_rows('desing_especies_naltivas') ) : the_row(); ?>
	<?php if ( get_row_layout() == 'desing_especies_naltivas_column') : ?>
	<?php
		$popup_content = get_sub_field('column_content');
		$popup_gallery = get_sub_field('column_galeria');
	?>
	<div class="grid-container">
		<?php if ( $popup_content && $popup_gallery) : ?>
		<div class="grid-x grid-padding-x grid-padding-y">
			<div class="large-6 medium-6 small-12 cell">
				<div class="popup_desing_content">
					<?php echo $popup_content; ?>
				</div>
			</div>
			<div class="large-6 medium-6 small-12 cell">
				<?php biorgaLoadTemplate('template-parts/page/parts/popup', 'desing-images'); ?>
			</div>
		</div>
		<?php endif; ?>
		<?php if ( $popup_gallery && !$popup_content) : ?>
		<div class="grid-x grid-padding-x">
			<div class="small-12 cell">
				<?php biorgaLoadTemplate('template-parts/page/parts/popup', 'desing-images'); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	<?php endwhile; ?>
</div>
<?php endif; ?>