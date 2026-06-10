<div class="popup-content-table">
	<table class="unstriped">
		<thead>
			<tr class="table_title_container">
				<th colspan="2">
					<div class="table_title text-center"><span><?php the_sub_field('titulo_planta_ornamental'); ?></span></div>
				</th>
			</tr>
			<tr>
				<th><span>Nombre Común</span></th>
				<th><span>Nombre científico</span></th>
			</tr>
			<tbody>
				<?php while ( have_rows('tabla_especies_nativas') ) : the_row(); ?>
				<tr>
					<td><?php the_sub_field('nombre_comun') ?></td>
					<td><?php the_sub_field('nombre_cientifico'); ?></td>
				</tr>
			<?php endwhile; ?>
			</tbody>
		</thead>
	</table>
</div>