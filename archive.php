<?php
/**
* The template for displaying all blogs
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site may use a
* different template.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package WordPress
* @subpackage Bio-organicos
* @since Bio-organicos 1.0
* @version 1.0
*/
get_header(); 

$terms = wp_get_post_terms( $post->ID, $taxonomy = 'post_tag' );
foreach ($terms as $term) {
	$term->name;
}

?>
<div class="wrapper">
	<div id="blog">
		<div class="header-page theme-sl">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						<h1 class="page_title text-center">
							<?php if ( $term->name != 'blog' ) : ?>
							<span class="archive-title"><?php echo __('Blog', 'biorga'); ?></span>
							<?php endif; ?>
							<?php if ( $term->name != null ) : ?>
							<span class="archive-subtitle"> <?php echo ($term->name != 'blog') ? ' - ' : null; ?> <?php echo __(ucfirst($term->name), 'biorga'); ?></span>
							<?php endif; ?>
						</h1>
					</div>
				</div>
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						<?php breadcrumbs('ul','breadcrumbs','breadcrumbs','active', true); ?>
					</div>
				</div>
			</div>
		</div>
		<main id="main" role="main">
			<section id="entries-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="grid-container">
					<?php
						
						if ( have_posts() )
						{
							while ( have_posts() )
							{
								the_post();
								biorgaLoadTemplate( 'template-parts/blog/blog' );
							}
							biorgaLoadTemplate('template-parts/page/parts/pagination');
						}
						else
						{
							biorgaLoadTemplate( 'template-parts/blog/no', 'posts');
						}
					?>
				</div>
			</section>
		</main>
	</div>
</div>
<?php get_footer(); ?>