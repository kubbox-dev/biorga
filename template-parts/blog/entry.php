<?php $video_entrada = get_field('video_entrada'); ?>
<?php if ( $video_entrada ) : ?>
<div class="entry-media-thumbnail entry-media-thumbnail--video">
	<video autoplay muted loop playsinline>
		<source src="<?php echo esc_url($video_entrada); ?>" type="video/webm">
	</video>
</div>
<?php elseif ( has_post_thumbnail() ) : ?>
<div class="entry-media-thumbnail">
	<figure>
		<?php the_post_thumbnail( 'post-thumbnail' ); ?>
	</figure>
</div>
<?php endif; ?>
<div class="meta-entries"><span><?php echo get_the_date( 'F j, Y' ); ?></span></div>
<div class="entry-name"><?php the_title('<h2>', '</h2>'); ?></div>
<div class="entry-content">
	<?php the_content(); ?>
</div>
<?php if ( have_rows('galeria_de_imagenes')) : ?>
	<div id="gallery-entries">
		<?php
			while ( have_rows('galeria_de_imagenes') ) {
				the_row();
				(get_sub_field('opciones') == 'desc_image') ? $collapse = 'grid-padding-x' : $collapse = null;
			}
		?>
		<div class="grid-x <?php echo $collapse ?>">
			<?php
				$count_images = 0;
				while ( have_rows('galeria_de_imagenes') ) :
					the_row();
					$options = get_sub_field('opciones');
					$image = get_sub_field('imagen');
					$desc_images = get_sub_field('desc');
					$count_images += 1;
			?>
			<div class="large-6 medium-6 small-12 cell">
				<figure>
					<img class="post-entry post-entry-<?php echo $count_images; ?>" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
				</figure>
				<?php if ( $options == 'desc_image' ) : ?>
					<div class="post-entry-desc">
						<p><?php echo $desc_images; ?></p>
					</div>
				<?php endif; ?>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>