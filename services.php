<?php
/**
 * Template Name: Servicios
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
				<article id="services_main">
					<?php 
						while ( have_posts() )
						{
							the_post();
							switch ( $template)
							{
								case 'tabs' :
									biorgaLoadTemplate('template-parts/page/services', 'tabs');
								break;
								default :
									biorgaLoadTemplate('template-parts/page/services', 'default');
								break;
							}
						}
					?>
				</article>
			</section>
			<section id="formActionServices">
				<div class="grid-container">
					<div class="header-page">
						<div class="grid-x grid-padding-x">
							<div class="small-12 cell">
								<h1 class="page_title text-center">
									<?php echo __( 'Nuestro equipo de trabajo lo asesorará' ); ?>
								</h1>
								<h3 class="page_subtitle text-center">
									<?php echo __( 'Análisis de suelos y creación de soluciones a la medida', 'biorga' ); ?>
								</h3>
							</div>
						</div>
					</div>
					<div class="content_form">
						<div class="grid-x grid-padding-x">
							<div class="large-8 large-centered medium-8 medium-centered small-12 cell">
								<div class="form-container">
									<?php biorgaShortCode('[ninja_form id=2]'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
	</div>
</div>
<?php get_footer(); ?>