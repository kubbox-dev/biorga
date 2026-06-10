<?php
?>
<!doctype html>
<html class="no-js initial-no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		wp_head();
		$pageClass = sanear_string(strtolower(get_the_title()));
		$pageClass = str_replace(' ', '-', $pageClass);
	?>
</head>
<body <?php body_class( $pageClass ); ?>>
		<div class="off-canvas-wrapper">
			<div class="off-canvas position-right" id="offCanvas" data-off-canvas>
				<button class="close-button" aria-label="Close menu" type="button" data-close>
					<span aria-hidden="true"><ion-icon name="close-circle"></ion-icon></span>
				</button>
				<?php get_template_part( 'template-parts/navigation/menu', 'offcanvas' ); ?>
			</div>
			<div class="off-canvas-content" data-off-canvas-content>
				<div class="top-header"></div>
				<header id="main-header">
					<div class="grid-container">
						<div class="grid-x grid-padding-x">
							<div class="large-3 medium-3 small-6 cell">
								<div class="logo">
									<?php (function_exists('the_custom_logo')) ? the_custom_logo() : null?>
								</div>
							</div>
							<div class="small-offset-3 small-3 cell show-for-small-only">
								<button type="button" class="button off-canvas-menu expand-button-mobile" data-toggle="offCanvas"><i class="fas fa-bars"></i></button>
							</div>
							<div class="large-9 medium-9 small-12 cell hide-for-small-only">
								<?php get_template_part( 'template-parts/navigation/menu', 'top' ); ?>
							</div>
						</div>
					</div>
				</header>