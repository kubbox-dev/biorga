<?php

/**
 * Shortcode for Theme
 * @package Bio-organicos
 */

function social_network( $atts )
{
	$atts = shortcode_atts(
		array(
			'facebook' => '#',
			'instagram' => '#',
			'title' => false,
			), $atts
		);

	extract($atts);

		$render  = '<div class="social-network">';
		$render .= ($title) ? '<h3 class="social-title">' . __('Síguenos', 'biorga') . '</h3>' : null;
		$render .= '<ul class="menu social-links">';
		$render .= '<li><a href="' . esc_html($facebook) . '" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
		$render .= '<li><a href="' . esc_html($instagram) . '" target="_blank"><i class="fab fa-instagram"></i></i></a></li>';
		$render .= '</ul>';
		$render .= '</div>';

		return $render;

}
add_shortcode('social', 'social_network');

if ( !function_exists('whatsapp_sending'))
{
	function whatsapp_sending( $atts )
	{
		$atts = shortcode_atts(
			array(
				'wp' => '#',
				), $atts
			);

		extract($atts);

			$render  = '<div class="whatsapp_sending">';
			$render .= '<ul class="menu whatsapp_footer">';
			$render .= '<li><a href="' . esc_html($wp) . '" target="_blank"><i class="fab fa-whatsapp"></i></a></li>';
			$render .= '</ul>';
			$render .= '</div>';

			return $render;

	}
	add_shortcode('whatsapp', 'whatsapp_sending');
	
}

if ( !function_exists('sale_fertilizers'))
{
	function sale_fertilizers( $atts )
	{
		$atts = shortcode_atts(
			array(
				'url' => 'http://marketingmovile.com/biorganicos/files/bono-carbono.pdf',
				), $atts
			);

		extract($atts);

			$render  = '<div class="sale_fertilizers">';
			$render .= '<a href="' . esc_html($url) . '" target="_blank">';
			$render .= '<h4>' . __('VENTA DE BONOS') . '</h4>';
			$render .= '<h2>' . __('DE CARBONO') . '</h2>';
			$render .= '<h4>' . __('Y CAPTACIÓN DE CO2') . '</h4>';
			$render .= '</a>';
			$render .= '</div>';

			return $render;

	}
	add_shortcode('sale', 'sale_fertilizers');
	
}