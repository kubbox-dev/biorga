<?php
/**
* The template for displaying single blogs
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
get_header(); ?>

<div class="wrapper">
	<div id="blog">
		<div class="header-page">
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
		<main id="main" role="main" class="theme-sl">
			<section id="entries-<?php the_ID(); ?>" <?php post_class(); ?>>
				<article class="entri-<?php the_ID(); ?>">
					<div class="grid-container">
						<div class="grid-x grid-padding-x">
							<div class="large-8 medium-8 small-12 cell">
								<?php
									while ( have_posts() )
									{
										the_post();
										biorgaLoadTemplate('template-parts/blog/entry', get_post_format() );
									}
								?>
							</div>
							<div class="large-4 medium-4 small-12 cell">
								<?php get_sidebar() ?>
							</div>
						</div>
					</div>
				</article>
			</section>
		</main>
	</div>
</div>
<?php get_footer(); ?>