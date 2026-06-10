<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Sweet Fair
 * @since sweet_fair 1.0
 */

get_header(); ?>
<div class="wrapper">
	<div id="page" class="main-page">
		<main id="main" class="pagee-main sidebar" role="main">
			<section id="page-only" class="page-main-only theme-sl">
				<div class="grid-container">
					<div class="grid-x grid-padding-x">
						<div class="large-12 medium-12 small-12 cell">
							<div class="page-number-error">
								<h1 class="error-page-number text-center"> <?php _e( '404', 'biorga' ); ?></h1>
							</div>
						</div>
					</div>
					<div class="grid-x grid-padding-x">
						<div class="large-12 medium-12 small-12 cell">
							<header class="page-header">
								<h1 class="error-page-title text-center"> <?php _e( 'Ooops!', 'biorga' ); ?></h1>
							</header>
						</div>
					</div>
					<div class="grid-x grid-padding-x">
						<div class="large-6 medium-6 large-centered medium-centered small-12 cell">
							<div class="page-content text-center">
								<h4><?php _e( 'Página no Encontrada', 'biorga' ); ?></h4>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
	</div>
</div>
<?php get_footer( 'none' ); ?>