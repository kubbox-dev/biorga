<?php
/**
 * Template Name: Conocenos
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
$template = get_field( 'select_template' );
?>
<div class="wrapper">
	<div id="page-<?php the_ID(); ?>">
		<main id="main" role="main" class="theme-sl">
			<section id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
				<article id="know_us_main">
					<?php 
						while ( have_posts() )
						{
							the_post();
							switch ( $template )
							{
								case 'history' :
									biorgaLoadTemplate('template-parts/page/know', 'us');
								break;

								case 'what_we_do' :
									biorgaLoadTemplate('template-parts/page/what', 'wedo');
								break;

								case 'team' :
									biorgaLoadTemplate('template-parts/page/our', 'team');
								break;

								default : 
									biorgaLoadTemplate('template-parts/page/page', 'default');
								break;
							}
						}
					?>
				</article>
			</section>
		</main>
	</div>
</div>
<?php get_footer(); ?>