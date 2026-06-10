<?php
	global $blog_nov;
	global $post;
?>

<?php
	if ( $blog_nov != 'blog-novedades')
	{
		$args= array(
			'order'          => 'DESC',
			'tag'            => $blog_nov,
			'posts_per_page' => 10,
		);

		$blogger = new WP_Query( $args );
	}
	else
	{
		$parts = list($blog, $nove) = explode('-', $blog_nov);

		$args_blog = array(
			'order'          => 'ASC',
			'tag'            => $blog,
			'posts_per_page' => 1,
		);

		$args_nove = array(
			'order'          => 'DESC',
			'tag'            => $nove,
			'posts_per_page' => 1,
		);

		$query_blog = new WP_Query( $args_blog );
		$query_nove = new WP_Query( $args_nove );
	}
	
?>
<?php if ( $blog_nov != 'blog-novedades' ) : ?>
<div class="<?php echo $blog_nov ?>">
	<?php if( $blogger->have_posts() ) : ?>
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<?php 
					while ( $blogger->have_posts() ) : $blogger->the_post(); 
					$blog_tag = get_the_tags( $post->ID );
				?>
				<div class="large-4 medium-4 small-12 cell">
					<div class="item item-<?php echo $post->ID; ?>"></div>
					<h4 class="subtitle"><?php echo $blog_tag[0]->name; ?></h4>
					<h3 class="section_title"><?php the_title() ?></h3>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	<?php endif; ?>
</div>
<?php else : ?>
<div class="blog_novedades">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="large-6 medium-6 small-12 cell">
				<?php 
					while ( $query_blog->have_posts() ) : $query_blog->the_post(); 
						$blog_tag = get_the_tags( $post->ID );
				?>
					<div class="item <?php echo $blog . ' item-' . $post->ID; ?>">
						<div class="item_header">
							<div class="grid-x grid-padding-x">
								<div class="large-10 medium-10 small-12 cell">
									<h4 class="subtitle"><?php echo $blog_tag[0]->name; ?></h4>
									<h3 class="section_title"><?php the_title() ?></h3>
								</div>
							</div>
						</div>
						<div class="item_image">
							<?php the_excerpt(); ?>
						</div>
						<div class="more_link">
							<?php echo biorgaMoreLink(get_bloginfo( 'url' ) . '/blog', 'Visitar Blog'); ?>
				</div>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
			<div class="large-6 medium-6 small-12 cell">
				<?php 
					while ( $query_nove->have_posts() ) : $query_nove->the_post(); 
						$blog_tag = get_the_tags( $post->ID );
				?>
					<div class="item <?php echo $nove . ' item-' . $post->ID; ?>">
						<div class="item_header">
							<h4 class="subtitle"><?php echo $blog_tag[0]->name; ?></h4>
							<h3 class="section_title"><?php the_title() ?></h3>
						</div>
						<div class="item_image">
							<?php the_post_thumbnail( 'biorga-featured-image-nov' ); ?>
						</div>
						<div class="item_text">
							<?php the_content(); ?>
						</div>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>