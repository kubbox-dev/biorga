<?php

function viewObject($obj)
{
	echo '<pre>';
	print_r( $obj );
	echo '</pre>';
}

function getTitleParts($string, $separator = '-')
{
	$title = $string;
	$title = explode($separator, $title);

	return $title;
}


function get_banner_thumbnails( $title )
{
	if (has_post_thumbnail()) {
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'ing_electricos-featured-image' );
		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
		$thumbnail_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'ing_electricos-featured-image' );
		$width = $thumbnail_attributes[1];
		$height = $thumbnail_attributes[2];
		$url = esc_url( $thumbnail[0] ) ;

			$render  = '<div class="banner">';
			$render .= '<div class="single-banner">';
			$render .= '<img src="'. $url . '" width="100%" />';
			$render .= '<div class="grid-container">';
			$render .= '<div class="grid-x grid-padding-x">';
			$render .= '<div class="small-12 cell">';
			( $title != null) ? $render .= '<div class="content-title"><h1 class="page-title">' . $title . '</h1></div>' : '';
			$render .= '</div>';
			$render .= '</div>';
			$render .= '</div>';
			$render .= '</div>';
			$render .= '</div>';
	}

		return $render;
}

function theRevolutionSlider($slide)
{
	echo do_shortcode( '[rev_slider alias="' . $slide . '"]', false );
}

/**
 * Reemplaza todos los acentos por sus equivalentes sin ellos
 *
 * @param $string
 *  string la cadena a sanear
 *
 * @return $string
 *  string saneada
 */
function sanear_string($string)
{
 
	$string = trim($string);
 
	$string = str_replace(
		array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
		array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
		$string
	);
 
	$string = str_replace(
		array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
		array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
		$string
	);
 
	$string = str_replace(
		array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
		array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
		$string
	);
 
	$string = str_replace(
		array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
		array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
		$string
	);
 
	$string = str_replace(
		array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
		array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
		$string
	);
 
	$string = str_replace(
		array('ñ', 'Ñ', 'ç', 'Ç'),
		array('n', 'N', 'c', 'C',),
		$string
	);
 
	//Esta parte se encarga de eliminar cualquier caracter extraño
	$string = str_replace(
		array("'\'", "¨", "º", "~",
			 "#", "@", "|", "!",
			 "·", "$", "%", "&", "/",
			 "(", ")", "?", "'", "¡",
			 "¿", "[", "^", "<code>", "]",
			 "+", "}", "{", "¨", "´",
			 ">", "< ", ";", ",", ":",
			 "."),
		'',
		$string
	);
 
 
	return $string;
}

function getGoogleApisFonts()
{
	define('APIKEY', 'AIzaSyBt1Sw6fgllAYFvLDQkAmtuSMMoKcpPNvw');
	$api_sort = 'trending';
	$api_url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=' . urlencode(APIKEY) . '&sort='.$api_sort;

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_URL, $api_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

	$response_encode = curl_exec($ch);
	curl_close($ch);
	$fonts_all = json_decode($response_encode);

	//echo 'API URL :: ' .  $api_url . '<br>';
	//echo 'FONTS';
	//print_r($fonts_all);

	return $fonts_all->items;

}

if ( ! function_exists( 'biorgaPostThumbnail' ) ) :
function biorgaPostThumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
			the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
		?>
	</a>

	<?php endif; // End is_singular()
}
endif;

if ( ! function_exists( 'biorgaShortCode' ))
{
	function biorgaShortCode($string, $ignore_html = false)
	{
		echo do_shortcode( $string, $ignore_html );
	}
}


if ( ! function_exists( 'biorgaLoadTemplate'))
{
	function biorgaLoadTemplate($part, $slug = null)
	{
		$tpl = get_template_part( $part, $slug);
		
		return $tpl;
	}
}

if ( ! function_exists( 'biorgaLoadYoutube'))
{
	function biorgaLoadYoutube( $code_video )
	{
		echo do_shortcode( '[video-youtube code="' . $code_video . '"]', false );
	}
}

if ( ! function_exists( 'biorgaMoreLink' ))
{
	function biorgaMoreLink( $url, $name = 'Ver Más' )
	{
		$render = "<a id='more_url' href='{$url}'>" . __( $name, 'biorga') . "</a>";
		return $render;
	}
}

if ( ! function_exists( 'biorgaPaginationBar' ))
{
	function biorgaPaginationBar( $args = '' ) 
	{
		global $wp_query, $wp_rewrite;
 
    // Setting up default values based on the current URL.
    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $url_parts    = explode( '?', $pagenum_link );
 
    // Get max pages and current page out of the current query, if available.
    $total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
    $current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
 
    // Append the format placeholder to the base URL.
    $pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';
 
    // URL base depends on permalink settings.
    $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
 
    $defaults = array(
        'base'               => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
        'format'             => $format, // ?page=%#% : %#% is replaced by the page number
        'total'              => $total,
        'current'            => $current,
        'aria_current'       => 'page',
        'show_all'           => false,
        'prev_next'          => true,
        'prev_text'          => __( '&laquo; Previous' ),
        'next_text'          => __( 'Next &raquo;' ),
        'end_size'           => 1,
        'mid_size'           => 2,
        'type'               => 'plain',
        'add_args'           => array(), // array of query args to add
        'add_fragment'       => '',
        'before_page_number' => '',
        'after_page_number'  => '',
    );
 
    $args = wp_parse_args( $args, $defaults );
 
    if ( ! is_array( $args['add_args'] ) ) {
        $args['add_args'] = array();
    }
 
    // Merge additional query vars found in the original URL into 'add_args' array.
    if ( isset( $url_parts[1] ) ) {
        // Find the format argument.
        $format       = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
        $format_query = isset( $format[1] ) ? $format[1] : '';
        wp_parse_str( $format_query, $format_args );
 
        // Find the query args of the requested URL.
        wp_parse_str( $url_parts[1], $url_query_args );
 
        // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
        foreach ( $format_args as $format_arg => $format_arg_value ) {
            unset( $url_query_args[ $format_arg ] );
        }
 
        $args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
    }
 
    // Who knows what else people pass in $args
    $total = (int) $args['total'];
    if ( $total < 2 ) {
        return;
    }
    $current  = (int) $args['current'];
    $end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
    if ( $end_size < 1 ) {
        $end_size = 1;
    }
    $mid_size = (int) $args['mid_size'];
    if ( $mid_size < 0 ) {
        $mid_size = 2;
    }
    $add_args   = $args['add_args'];
    $r          = '';
    $page_links = array();
    $dots       = false;
 
    if ( $args['prev_next'] && $current && 1 < $current ) :
        $link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current - 1, $link );
        if ( $add_args ) {
            $link = add_query_arg( $add_args, $link );
        }
        $link .= $args['add_fragment'];
 
        /**
         * Filters the paginated links for the given archive pages.
         *
         * @since 3.0.0
         *
         * @param string $link The paginated link URL.
         */
        $page_links[] = '<li class="pagination-previous disabled"><a class="prev page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['prev_text'] . '</a></li>';
    endif;
    for ( $n = 1; $n <= $total; $n++ ) :
        if ( $n == $current ) :
        	$get_active = 'current';
            $page_links[] = "<li class='" . $get_active . "'><span aria-current='" . esc_attr( $args['aria_current'] ) . "' class='page-numbers'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . '</span></li>';
            $dots         = true;
        else :
        	$get_active = 'null';
            if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
                $link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
                $link = str_replace( '%#%', $n, $link );
                if ( $add_args ) {
                    $link = add_query_arg( $add_args, $link );
                }
                $link .= $args['add_fragment'];
 
                /** This filter is documented in wp-includes/general-template.php */
                $page_links[] = "<li><a class='page-numbers' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "' aria-label='Page " . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . '</a></li>';
                $dots         = true;
            elseif ( $dots && ! $args['show_all'] ) :
                $page_links[] = '<span class="page-numbers dots">' . __( '&hellip;' ) . '</span>';
                $dots         = false;
            endif;
        endif;
    endfor;
    if ( $args['prev_next'] && $current && $current < $total ) :
        $link = str_replace( '%_%', $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current + 1, $link );
        if ( $add_args ) {
            $link = add_query_arg( $add_args, $link );
        }
        $link .= $args['add_fragment'];
 
        /** This filter is documented in wp-includes/general-template.php */
        $page_links[] = '<li class="pagination-next"><a class="next page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '" aria-label="Next page">' . $args['next_text'] . '</a></li>';
    endif;
    switch ( $args['type'] ) {
        case 'array':
            return $page_links;
 
        case 'list':
            $r .= "<ul class='pagination text-center'>\n\t<li>";
            $r .= join( " ", $page_links );
            $r .= "</ul>\n";
            break;
 
        default:
            $r = join( "\n", $page_links );
            break;
    }
    return $r;
	}	
}