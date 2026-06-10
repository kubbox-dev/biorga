<?php
/**
 * Template Name: Contacto
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
$template = get_field( 'template' );
?>
<div class="wrapper">
	<div id="page-<?php the_ID(); ?>">
		<main id="main" role="main" class="theme-sl">
			<section id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
				<article id="contact_main">
					<?php biorgaLoadTemplate('template-parts/page/contact', 'default'); ?>
				</article>
			</section>
		</main>
	</div>
</div>
<?php get_footer(); ?>