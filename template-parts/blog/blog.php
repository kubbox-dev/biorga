<div class="item-list item-blog-<?php echo $post->ID; ?>">
	<div class="grid-x grid-padding-x grid-padding-y">
		<div class="large-4 medium-4 small-12 cell">
			<figure class="screen_blog">
				<?php the_post_thumbnail( 'biorga-featured-image' ) ?>
			</figure>
		</div>
		<div class="large-7 medium-7 small-12 cell">
			<div class="date-blog text-left"><span><?php echo get_the_date( 'F j, Y' ); ?></span></div>
			<h2 class="blog-title text-left"><a href="<?php the_permalink( $post->ID ) ?>"><?php the_title() ?></a></h2>
			<div class="blog-content">
				<?php the_excerpt(); ?>
			</div>
			<div class="more_link">
				<?php echo biorgaMoreLink(get_the_permalink( $post->ID )); ?>
			</div>
		</div>
	</div>
</div>