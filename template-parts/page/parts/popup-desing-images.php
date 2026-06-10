<?php if ( have_rows('column_galeria') ) : ?>
	<?php 
		$images_count = 0;
		while ( have_rows('column_galeria') ) : 
			the_row();
			$images = get_sub_field('column_imagen');
			$images_count += 1;
			($images_count > 1) ? $class_image = 'img_spaced_bottom' : $class_image = null;
	?>
	<div id="desing_popup_image-<?php echo $images_count ?>"class="popup_desing_content_images <?php echo $class_image; ?>">
		<figure>
			<img src="<?php echo $images['url'] ?>">
		</figure>
	</div>
	<?php endwhile; ?>
<?php endif; ?>