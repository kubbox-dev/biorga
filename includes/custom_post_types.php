<?php

// Register Custom Post Type
// -----------------------------------

// Register Custom Post Type
function biorgaProducts() {

	$labels = array(
		'name'                  => _x( 'Productos', 'Post Type General Name', 'biorga' ),
		'singular_name'         => _x( 'Producto', 'Post Type Singular Name', 'biorga' ),
		'menu_name'             => __( 'Productos', 'biorga' ),
		'name_admin_bar'        => __( 'Producto', 'biorga' ),
		'archives'              => __( 'Productos archivados', 'biorga' ),
		'attributes'            => __( 'Atributos del producto', 'biorga' ),
		'parent_item_colon'     => __( 'Producto principal:', 'biorga' ),
		'all_items'             => __( 'Todos los productos', 'biorga' ),
		'add_new_item'          => __( 'Añadir nuevo productoAdd New Product', 'biorga' ),
		'add_new'               => __( 'Nuevo Producto', 'biorga' ),
		'new_item'              => __( 'Nuevo', 'biorga' ),
		'edit_item'             => __( 'Editar Producto', 'biorga' ),
		'update_item'           => __( 'Actualizar Producto', 'biorga' ),
		'view_item'             => __( 'Ver producto', 'biorga' ),
		'view_items'            => __( 'View productos', 'biorga' ),
		'search_items'          => __( 'Buscar Productos', 'biorga' ),
		'not_found'             => __( 'No se encontraron productos', 'biorga' ),
		'not_found_in_trash'    => __( 'No se encontraron productos en la basura', 'biorga' ),
		'featured_image'        => __( 'Foto principal del producto', 'biorga' ),
		'set_featured_image'    => __( 'Establecer imagen destacada', 'biorga' ),
		'remove_featured_image' => __( 'Eliminar imagen destacadaRemove featured image', 'biorga' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'biorga' ),
		'insert_into_item'      => __( 'Insertar en el elemento', 'biorga' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'biorga' ),
		'items_list'            => __( 'Lista de productos', 'biorga' ),
		'items_list_navigation' => __( 'Lista de elementos de navegación', 'biorga' ),
		'filter_items_list'     => __( 'Lista de elementos de filtro', 'biorga' ),
	);
	$rewrite = array(
		'slug'                  => 'productos',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Producto', 'biorga' ),
		'description'           => __( 'Páginas de información del producto.', 'biorga' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'product_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-cart',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'product', $args );

}
add_action( 'init', 'biorgaProducts', 0 );

function biorgaMultimedia() {

	$labels = array(
		'name'                  => _x( 'video', 'Post Type General Name', 'biorga' ),
		'singular_name'         => _x( 'Videos', 'Post Type Singular Name', 'biorga' ),
		'menu_name'             => __( 'Multimedia', 'biorga' ),
		'name_admin_bar'        => __( 'Multimedia', 'biorga' ),
		'archives'              => __( 'Archivos de los videos', 'biorga' ),
		'attributes'            => __( 'Atributos de los videos', 'biorga' ),
		'parent_item_colon'     => __( 'Video principal:', 'biorga' ),
		'all_items'             => __( 'Todos los videos', 'biorga' ),
		'add_new_item'          => __( 'Agregar nuevo video', 'biorga' ),
		'add_new'               => __( 'Agregar Nuevo', 'biorga' ),
		'new_item'              => __( 'Nuevo video', 'biorga' ),
		'edit_item'             => __( 'Edit Item', 'biorga' ),
		'update_item'           => __( 'Actualizar video', 'biorga' ),
		'view_item'             => __( 'Ver pvideo', 'biorga' ),
		'view_items'            => __( 'Ver videos', 'biorga' ),
		'search_items'          => __( 'Buscar video', 'biorga' ),
		'not_found'             => __( 'No se encontro el video', 'biorga' ),
		'not_found_in_trash'    => __( 'No se encuentra en la papelera', 'biorga' ),
		'featured_image'        => __( 'Imagen Destacada', 'biorga' ),
		'set_featured_image'    => __( 'Establecer imagen destacada', 'biorga' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'biorga' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'biorga' ),
		'insert_into_item'      => __( 'Insertar en el elemento', 'biorga' ),
		'uploaded_to_this_item' => __( 'Subido a Multimedia', 'biorga' ),
		'items_list'            => __( 'Lista de videos', 'biorga' ),
		'items_list_navigation' => __( 'Lista de elementos de navegación', 'biorga' ),
		'filter_items_list'     => __( 'Filtrar elementos', 'biorga' ),
	);
	$args = array(
		'label'                 => __( 'Videos', 'biorga' ),
		'description'           => __( 'Multimedia Descripción', 'biorga' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'custom-fields' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-video',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'multimedia', $args );

}
add_action( 'init', 'biorgaMultimedia', 0 );


function biorgaTestimonios() {

	$labels = array(
		'name'                  => _x( 'testimonio', 'Post Type General Name', 'biorga' ),
		'singular_name'         => _x( 'Testimonios', 'Post Type Singular Name', 'biorga' ),
		'menu_name'             => __( 'Testimonios', 'biorga' ),
		'name_admin_bar'        => __( 'Testimonios', 'biorga' ),
		'archives'              => __( 'Archivos de los testimonios', 'biorga' ),
		'attributes'            => __( 'Atributos de los testimonios', 'biorga' ),
		'parent_item_colon'     => __( 'Testimonio principal:', 'biorga' ),
		'all_items'             => __( 'Todos los testimonios', 'biorga' ),
		'add_new_item'          => __( 'Agregar nuevo testimonio', 'biorga' ),
		'add_new'               => __( 'Agregar Nuevo', 'biorga' ),
		'new_item'              => __( 'Nuevo testimonio', 'biorga' ),
		'edit_item'             => __( 'Edit Item', 'biorga' ),
		'update_item'           => __( 'Actualizar testimonio', 'biorga' ),
		'view_item'             => __( 'Ver ptestimonio', 'biorga' ),
		'view_items'            => __( 'Ver testimonios', 'biorga' ),
		'search_items'          => __( 'Buscar testimonio', 'biorga' ),
		'not_found'             => __( 'No se encontro el testimonio', 'biorga' ),
		'not_found_in_trash'    => __( 'No se encuentra en la papelera', 'biorga' ),
		'featured_image'        => __( 'Imagen Destacada', 'biorga' ),
		'set_featured_image'    => __( 'Establecer imagen destacada', 'biorga' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'biorga' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'biorga' ),
		'insert_into_item'      => __( 'Insertar en el elemento', 'biorga' ),
		'uploaded_to_this_item' => __( 'Subido a Testimonios', 'biorga' ),
		'items_list'            => __( 'Lista de testimonios', 'biorga' ),
		'items_list_navigation' => __( 'Lista de elementos de navegación', 'biorga' ),
		'filter_items_list'     => __( 'Filtrar elementos', 'biorga' ),
	);
	$args = array(
		'label'                 => __( 'Testimonios', 'biorga' ),
		'description'           => __( 'Testimonios Descripción', 'biorga' ),
		'labels'                => $labels,
		'supports'              => array( 'title','custom-fields', 'page-attributes' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-write-blog',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonio', $args );

}
add_action( 'init', 'biorgaTestimonios', 0 );


// Register Custom Taxonomy
// ---------------------------------------

function taxonomyTestimonios() {

	$labels = array(
		'name'                       => _x( 'Categorias', 'Taxonomy General Name', 'biorga' ),
		'singular_name'              => _x( 'Categoria', 'Taxonomy Singular Name', 'biorga' ),
		'menu_name'                  => __( 'Categoria', 'biorga' ),
		'all_items'                  => __( 'Todas las Categorias', 'biorga' ),
		'parent_item'                => __( 'Categoria principal', 'biorga' ),
		'parent_item_colon'          => __( 'Categoria principal:', 'biorga' ),
		'new_item_name'              => __( 'Nuevo nombre de la categoría', 'biorga' ),
		'add_new_item'               => __( 'Agregar nueva Categoría', 'biorga' ),
		'edit_item'                  => __( 'Editar Categoría', 'biorga' ),
		'update_item'                => __( 'Actualizar Categoría', 'biorga' ),
		'view_item'                  => __( 'Ver Categoría', 'biorga' ),
		'separate_items_with_commas' => __( 'Categorias separadas con comas', 'biorga' ),
		'add_or_remove_items'        => __( 'Añadir o eliminar elementos', 'biorga' ),
		'choose_from_most_used'      => __( 'Elige entre los más utilizados', 'biorga' ),
		'popular_items'              => __( 'Caterigorias Populares', 'biorga' ),
		'search_items'               => __( 'Buscar Categorias', 'biorga' ),
		'not_found'                  => __( 'No se encontro la categoria', 'biorga' ),
		'no_terms'                   => __( 'No se encontraron las categorias', 'biorga' ),
		'items_list'                 => __( 'Lista de Categorias', 'biorga' ),
		'items_list_navigation'      => __( 'Lista de elementos de navegación', 'biorga' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'tax_category', array( 'testimonio' ), $args );

}
add_action( 'init', 'taxonomyTestimonios', 0 );

function biorgaTaxonomyProductosCategory() {

	$labels = array(
		'name'                       => _x( 'Categorias', 'Taxonomy General Name', 'biorga' ),
		'singular_name'              => _x( 'Categoria', 'Taxonomy Singular Name', 'biorga' ),
		'menu_name'                  => __( 'Categorias', 'biorga' ),
		'all_items'                  => __( 'Todas las Categorias', 'biorga' ),
		'parent_item'                => __( 'Categoria principal', 'biorga' ),
		'parent_item_colon'          => __( 'Categoria principal:', 'biorga' ),
		'new_item_name'              => __( 'Nuevo nombre de la categoría', 'biorga' ),
		'add_new_item'               => __( 'Agregar nueva Categoría', 'biorga' ),
		'edit_item'                  => __( 'Editar Categoría', 'biorga' ),
		'update_item'                => __( 'Actualizar Categoría', 'biorga' ),
		'view_item'                  => __( 'Ver Categoría', 'biorga' ),
		'separate_items_with_commas' => __( 'Categorias separadas con comas', 'biorga' ),
		'add_or_remove_items'        => __( 'Añadir o eliminar elementos', 'biorga' ),
		'choose_from_most_used'      => __( 'Elige entre los más utilizados', 'biorga' ),
		'popular_items'              => __( 'Caterigorias Populares', 'biorga' ),
		'search_items'               => __( 'Buscar Categorias', 'biorga' ),
		'not_found'                  => __( 'No se encontro la categoria', 'biorga' ),
		'no_terms'                   => __( 'No se encontraron las categorias', 'biorga' ),
		'items_list'                 => __( 'Lista de Categorias', 'biorga' ),
		'items_list_navigation'      => __( 'Lista de elementos de navegación', 'biorga' ),
	);
	$rewrite = array(
		'slug'						 => 'categoria',
		'with_front'				 => true,
		'hierarchical'				 => false
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'					 => $rewrite,

	);
	register_taxonomy( 'product_category', array( 'product' ), $args );

}
add_action( 'init', 'biorgaTaxonomyProductosCategory', 0 );
