<?php
	$hidden_title = get_field('hidden_title');
?>
<?php if ( $hidden_title ) : ?>
<div class="header-page">
	<div class="grid-container">
		<div class="grid-x-grid-padding-x">
			<div class="small-12 cell">
				<h1 class="page_title text-center"><span><?php echo strtoupper(get_the_title()); ?></span></h1>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<div id="team">
	<?php if ( have_rows('tpl_team')) : ?>
	<?php while ( have_rows('tpl_team')) : the_row(); ?>
	<?php if ( get_row_layout() == 'team_content_top') : ?>
	<div class="team_intro">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="large-7 large-centered medium-7 medium-centered small-12 cell">
					<div class="team_intro_content text-center">
						<?php the_sub_field('team_content'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( get_row_layout() == 'team_content_person') : ?>
	<div class="team_person theme-sl">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="large-10 large-centered medium-10 medium-centered small-12 cell">
					<div class="team_person_col text-center">
						<div class="grid-x grid-padding-x grid-padding-y">
							<?php 
								while ( have_rows('team')) :
									the_row();
									$team_photo = get_sub_field('team_foto');
									$name_team = get_sub_field('nombre_team');
									$team_position = get_sub_field('team_cargo');
							?>
							<div class="large-4 medium-4 small-12 cell">
								<figure class="team_photo">
									<img src="<?php echo $team_photo['url'] ?>" alt="">
								</figure>
								<h3 class="name_team text-center"><span><?php echo $name_team ?></span></h3>
								<div class="team_position text-center">
									<p>
										<?php echo $team_position; ?>
									</p>
								</div>
							</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php endwhile; ?>
	<?php endif; ?>
</div>