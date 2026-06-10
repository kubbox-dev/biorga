<?php
/**
* The template for displaying all Products List
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
get_header(); ?>
<div class="wrapper">
	<div id="products">
		<div class="header-page theme-sl">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						<h3 class="page_subtitle text-center"><?php echo __('PAISAJISMO - REFORESTACIÓN', 'biorga'); ?></h3>
						<h1 class="page_title text-center"><?php echo __('Plantas ornamentales', 'biorga'); ?></h1>
						<div class="page_desc text-center">
							<p>
								Las plantas ornamentales se cultivan y se comercializan con propósitos decorativos,<br>
								con la intención de adornar o embellecer un espacio. Son plantas que se cultivan con<br>
								una finalidad estética
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<main id="main" role="main">
			<section class="products_list">
				<div class="grid-container">
					<div class="product_item">
						<?php
							$args_cat = array(
								'orderby'       => 'term_id', 
								'order'         => 'ASC',
								'hide_empty'    => true,
							);

							$terms = get_terms( 'product_category', $args_cat );
							foreach ( $terms as $taxonomy)
							{
								$term_slug = $taxonomy->slug;
								$term_name = $taxonomy->name;
								$tax_post_args = array(
									'post_type' => 'product',
									'posts_per_page' => 999,
									'order' => 'ASC',
									'tax_query' => array(
										array(
											'taxonomy' => 'product_category',
											'field' => 'slug',
											'terms' => "{$term_slug}"
									)));
								$tax_post_query = new WP_Query($tax_post_args);
								if ($tax_post_query->have_posts()) :
									echo '<div class="grid-x grid-padding-x grid-padding-y">';
									echo '<div class="small-12 cell"><h1 class="cat_name text-center">' . $term_name . '</h1></div>';
									while( $tax_post_query->have_posts() ) : $tax_post_query->the_post();
										biorgaLoadTemplate( 'template-parts/products/list', 'products' );
									endwhile;
									wp_reset_postdata();
									echo '</div>';
								endif;
							}
							?>
					</div>
				</div>
			</section>
		</main>
	</div>
</div>
<?php get_footer(); ?>