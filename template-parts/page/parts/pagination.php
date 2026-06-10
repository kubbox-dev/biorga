<nav aria-label="Pagination">
  <ul class="pagination text-center">
	<?php 
	global $blog;
	$total_pages = $blog->max_num_pages;
	if ($total_pages > 1)
	{
		$current_page = max(1, get_query_var('paged'));
		$args = array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => '/page/%#%',
			'current' => $current_page,
			'total' => $total_pages,
			'type' => 'list',
			'prev_text'          => __( 'Anterior', 'biorga' ),
        	'next_text'          => __( 'Siguiente', 'biorga' ),
		);
	echo biorgaPaginationBar($args); 
	}
?>
  </ul>
</nav>