<?php
/**
 * The template for displaying all pages
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
 * @since Bio-organicos
 * @version 1.0
 */

get_header();

?>

<div class="wrapper">
	<div id="homepage">
		<main id="main" role="main">
			<section id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php 
					if (is_front_page()){ 
						biorgaLoadTemplate( 'template-parts/page/page', 'frontend' );
					}
				?>
			</section>
		</main>
	</div>
</div>
<?php get_footer(); ?>