<?php
	$hidden_title = get_field('hidden_title');
?>
<?php if ( $hidden_title ) : ?>
<div class="header-page">
	<div class="grid-container">
		<div class="grid-x-grid-padding-x">
			<div class="small-12 cell">
				<h3 class="page_subtitle text-center"><span><?php echo __('Conócenos', 'biorga'); ?></span></h3>
				<h1 class="page_title text-center"><span><?php the_title(); ?></span></h1>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php if ( have_rows('tpl_what_we_do')) : ?>
<?php while ( have_rows('tpl_what_we_do')) : the_row(); ?>
<?php if ( get_row_layout() == 'what_we_do') :
		$pos_image = get_sub_field('pos_image');
		$what_we_do_image = get_sub_field('what_we_do_image');
		$what_we_do_contente = get_sub_field('what_we_do_content');

		if ( $pos_image != 'left' )
		{
			$pos_image = 'medium-order-2';
			$pos_content = 'medium-order-1';
		}
		else
		{
			$pos_imgage = null;
			$pos_content = null;
		}
?>
<div id="what_we_do">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="large-6 medium-6 small-12 cell <?php echo $pos_image ?>">
				<div class="what_we_do_image">
					<figure>
						<img src="<?php echo $what_we_do_image['url'] ?>" alt="<?php echo $what_we_do_image['title'] ?>">
					</figure>
				</div>
			</div>
			<div class="large-6 medium-6 small-12 cell <?php echo $pos_content ?>">
				<div class="what_we_do_content">
					<?php echo $what_we_do_contente; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<?php if ( get_row_layout() == 'environmental_commitment') : ?>
<div id="environmental_commitment" class="theme-sl">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="large-6 medium-6 small-12 cell">
				<div class="environmental_commitment_content">
					<?php the_sub_field('environmental_commitment_content'); ?>
				</div>
			</div>
			<div class="large-6 medium-6 small-12 cell">
				<?php 
					$counter;
					while (have_rows('environmental_commitment_icons')) : 
						the_row();
						$counter += 1;
						$envi_commi_icon = get_sub_field('icon');
						$envi_commi_text = get_sub_field('text');
				?>
				<div id="environmental-commitment-<?php echo $counter; ?>" class="environmental_commitment_section">
					<div class="grid-x">
						<div class="large-3 medium-3 small-12 cell">
							<figure class="envi_commi_icon">
								<img src="<?php echo $envi_commi_icon['url']; ?>" alt="<?php echo $envi_commi_icon['title']; ?>">
							</figure>
						</div>
						<div class="large-2 medium-3 small-12 cell">
							<div class="envi_commi_number">
								<h1><span><?php echo $counter; ?></span></h1>
							</div>
						</div>
						<div class="large-7 medium-67 small-12 cell">
							<div class="envi_commi_text">
								<p><?php echo $envi_commi_text; ?></p>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>