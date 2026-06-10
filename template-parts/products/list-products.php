<?php
	$scientific_name = get_field_object('nombre_cientifico');
	$common_name = get_field_object('nombre_comun');
	$weather = get_field_object('clima');
?>
	<div class="large-3 medium-3 small-12 cell">
		<div class="item_only_product">
			<div class="product_image">
				<figure>
					<?php the_post_thumbnail( 'post-thumbnail' ); ?>
				</figure>
			</div>
			<div class="product_title"><h3><span><?php the_title() ?></span></h3></div>
			<div class="scientific_name">
				<h3 class="scientific_name_title"><?php echo $scientific_name['label']; ?></h3>
				<p><?php echo $scientific_name['value']; ?></p>
			</div>
			<div class="common_name">
				<h3 class="common_name_title"><?php echo $common_name['label']; ?></h3>
				<p><?php echo $common_name['value']; ?></p>
			</div>
			<div class="weather">
				<h3 class="weather_title"><?php echo $weather['label']; ?></h3>
				<p><?php echo $weather['value']; ?></p>
			</div>
		</div>
	</div>