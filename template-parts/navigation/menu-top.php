<nav id="navigation" role="navigation">
	<?php
	       wp_nav_menu( array(
                        'container' => false,
                        'menu' => __( 'Top Bar Menu', 'biorga' ),
                        'menu_class' => 'dropdown menu top-menu',
                        'theme_location' => 'topbar-menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
                        //Recommend setting this to false, but if you need a fallback...
                        'fallback_cb' => 'ThemeTopbarFallback',
                        'walker' => new ThemeTopbarWalker(),
        ));
	?>
</nav>
