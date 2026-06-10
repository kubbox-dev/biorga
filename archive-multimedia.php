<?php
ini_set('display_errors', 1);
/**
* Multimedia Template archive
* If the user has selected a static page for their homepage, this is what will
* appear.
* Learn more: https://codex.wordpress.org/Template_Hierarchy
*
* @package WordPress
* @subpackage Idata
* @since 1.0
* @version 1.0
*/
get_header();
global $post;
$post_type = get_queried_object();
$post_type_name = esc_html( $post_type->labels->menu_name );
		$args = array(
	'post_type'      => 'multimedia',
	'order'          => 'DESC',
	'posts_per_page' => 10,
);
$query = new WP_Query( $args );
?>
<div class="wrapper">
	<div id="multimedia">
		<main id="main" role="main">
			<section id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="grid-container">
					<div class="grid-x grid-padding-x">
						<div class="small-12 cell">
							<div class="header-page">
								<h1 class="page_title text-center"><?php echo $post_type_name; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="grid-container">
					<?php if ( $query->have_posts() ) : ?>
					<?php 
						$count_video = 0;
						while ( $query->have_posts() ) : $query->the_post();
							$count_video += 1;
					?>
					<div class="item-list item-video-<?php echo $post->ID; ?>">
						<div class="grid-x grid-padding-x grid-padding-y">
							<div class="large-4 medium-4 small-12 cell">
								<div class="responsive-embed widescreen">
									<img src="https://img.youtube.com/vi/<?php echo get_field( 'upload_video' ) ?>/hqdefault.jpg" alt="">
								</div>
							</div>
							<div class="large-8 medium-8 small-12 cell">
								<h4 class="date-video text-left"><?php echo get_the_date( 'F j, Y' ); ?></h4>
								<h1 class="video-title text-left"><?php the_title() ?></h1>
								<a class="button button-multimedia" href="#" data-open="video-<?php echo $count_video; ?>"><?php echo __('Ver Video', 'biorga'); ?></a>
							</div>
						</div>
					</div>
					<div class="reveal" id="video-<?php echo $count_video; ?>" data-reveal>
						<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo get_field( 'upload_video' ) ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						<button class="close-button" data-close aria-label="Close modal" type="button">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php endwhile; wp_reset_postdata(); ?>
					<?php endif; ?>
				</div>
			</section>
		</main>
	</div>
</div>
<?php get_footer(); ?>