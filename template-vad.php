<?php
/**
* Template Name: Plats! Vad?
*/
?>
<?php $platsImage = get_the_post_thumbnail_url( 'large' ); ?>

<?php while (have_posts()) : the_post(); ?>
	<div class="container-plats-vad">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-sm-12 col-md-8 col-lg-8">
					<h1 class="orange-italic all-header"><?php the_title(); ?></h1>
					<p class="gray-regular"><?php the_content(); ?></p>
				</div><!-- .col-12 .col-sm-12 .col-md-8 .col-lg-8 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .container-plats-vad -->

	<?php if( have_rows('add_piktogram') ): ?>
		<!-- advanced custom fields - piktogram -->
		<div class="container-plats-piktogram">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-sm-12 col-md-10 col-lg-10">
						<div class="content-piktogram">
							<?php while ( have_rows('add_piktogram') ) : the_row(); ?>
								<div class="items-piktogram">
									<?php $image = get_sub_field('image'); ?>
									<div class="piktogram-img" style="background-image: url('<?php echo $image["url"] ?>')">
									</div><!-- .piktogram-img -->

					        		<!-- img element for pinterest -->
									<div style="display: none;">
									    <img src="<?php echo $image["url"] ?>">
									</div>
									
									<h5 class="gray-regular"><?php the_sub_field('header') ?></h5>
									<p class="gray-regular"><?php the_sub_field('paragraph') ?></p>
								</div><!-- .items-piktogram -->
							<?php endwhile; ?>
						</div><!-- .content-piktogram -->
					</div><!-- .col-12 col-sm-12 col-md-10 col-lg-10 -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .container-plats-piktogram -->
	<?php endif; ?>
<?php endwhile; ?>