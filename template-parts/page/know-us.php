<?php
	$hidden_title = get_field('hidden_title');
?>
<?php if ( $hidden_title ) : ?>
<div class="header-page">
	<div class="grid-container">
		<div class="grid-x-grid-padding-x">
			<div class="small-12 cell">
				<h1 class="page_title text-center"><span><?php the_title(); ?></span></h1>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php if ( have_rows('tpl_history')) : ?>
<?php while ( have_rows('tpl_history')) : the_row(); ?>
<?php if ( get_row_layout() == 'our_experience') :
	  $our_experience_title = get_sub_field('our_experience_title');
	  $our_experience_timeline = get_sub_field('our_experience_timeline');
?>
<div id="our_experience">
	<div class="header-page">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="small-12 cell">
					<h3 class="page_subtitle text-center"><span><?php the_title(); ?></span></h3>
					<h1 class="page_title text-center"><span><?php echo $our_experience_title; ?></span></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="grid-container full">
		<div class="grid-x">
			<div class="small-12 cell">
				<div class="our_experience_timeline">
					<?php echo $our_experience_timeline; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<?php if ( get_row_layout() == 'success_stories' ) : ?>
<div id="success_stories" class="theme-sl">
	<div class="header-page">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="small-12 cell">
					<h3 class="page_subtitle text-center"><span><?php the_title(); ?></span></h3>
					<h1 class="page_title text-center"><span><?php the_sub_field('success_stories_titulo') ?></span></h1>
				</div>
			</div>
		</div>
	</div>
	<?php while ( have_rows('project') ) : 
		the_row();
		$project_name = get_sub_field('project_name');
		$image_before = get_sub_field('image_before');
		$image_after = get_sub_field('image_after');
	?>
	<div class="success_stories_main_content">
		<div class="header-page">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					<div class="small-12 cell">
						<h2 class="page_title text-center"><span><?php echo $project_name; ?></span></h2>
					</div>
				</div>
			</div>
		</div>
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="large-9 large-centered medium-9 medium-centered small-12 cell">
					<div class="grid-x grid-padding-x">
						<div class="large-6 medium-6 small-12 cell">
							<div class="success_stories_content">
								<h3 class="success_stories_title">
									<span><?php echo __('Antes'); ?></span>
								</h3>
								<figure>
									<img src="<?php echo $image_before['url'] ?>" altt="<?php echo $image_before['title'] ?>">
								</figure>
								<h3 class="page_title"><?php the_sub_field('titulo_before'); ?></h3>
								<h5 class="page_title"><?php the_sub_field('subtitulo_before'); ?></h5>
							</div>
						</div>
						<div class="large-6 medium-6 small-12 cell">
							<div class="success_stories_content">
								<h3 class="success_stories_title">
									<span><?php echo __('Despúes'); ?></span>
								</h3>
								<figure>
									<img src="<?php echo $image_after['url'] ?>" altt="<?php echo $image_after['title'] ?>">
								</figure>
								<h3 class="page_title"><?php the_sub_field('titulo_after'); ?></h3>
								<h5 class="page_title"><?php the_sub_field('subtitulo_after'); ?></h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
</div>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

