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
global $blog;
?>
<div class="wrapper">
	<div id="blog">
		<div class="header-page theme-sl">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						<h1 class="page_title text-center"><?php echo __('Blog', 'biorga'); ?></h1>
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
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						$args = array(
							'cat' => 1,
							'post_type' => 'post',
							'paged' => $paged,
						);
						$blog = new WP_Query($args);

						if ( $blog->have_posts() )
						{
							while ( $blog->have_posts() )
							{
								$blog->the_post();
								biorgaLoadTemplate( 'template-parts/blog/blog' );
							}
							biorgaLoadTemplate('template-parts/page/parts/pagination');
							wp_reset_postdata();
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