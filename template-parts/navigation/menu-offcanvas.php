<nav id="navigation" role="navigation">
	<h1 class="menu_title_mobile text-center"><span><?php echo __('Menú', 'biorga'); ?></span></h1>
		<hr>
	<?php
		wp_nav_menu(array(
			'container' => false,
			'menu' => __( 'OffCanvas Menu', 'biorga' ),
			'menu_class' => 'menu offcanvas-menu vertical accordion-menu',
			'theme_location' => 'offcanvas-menu',
			'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion-menu>%3$s</ul>',
			//Recommend setting this to false, but if you need a fallback...
			'fallback_cb' => 'ThemeAcordeonFallback',
			'walker' => new ThemeAcordeonWalker(),
		));
	?>
</nav>