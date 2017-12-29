<?php
/**
 * Template Name: Plats! Vad?
 */
?>
<?php $platsImage = get_the_post_thumbnail_url( 'large' ); ?>

<?php while (have_posts()) : the_post(); ?>
	<div class="container-plats-vad">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-2 col-lg-2"></div>
				<div class="col-12 col-sm-12 col-md-8 col-lg-8">
					<h1 class="orange-bold-italic"><?php the_title(); ?></h1>
					<div class="pink-regular"><?php the_content(); ?></div>
				</div><!-- .col-12 .col-sm-12 .col-md-8 .col-lg-8 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .container-plats-vad -->

	<?php if( have_rows('add_piktogram') ): ?>
		<!-- ADVANCED CUSTOM FIELDS - PIKTOGRAM -->
		<div class="container-plats-piktogram">
			<div class="container-box">
				<div class="container">
					<div class="row">
						<div class="col-2 col-sm-2 col-md-1 col-lg-1"></div>
						<div class="col-12 col-sm-12 col-md-10 col-lg-10">
							<div class="content-piktogram">
								<?php while ( have_rows('add_piktogram') ) : the_row(); ?>
									<div class="items-piktogram">
										<?php $image = get_sub_field('image'); ?>
										<div class="piktogram-img" style="background-image: url('<?php echo $image["url"] ?>')">
										</div><!-- .piktogram-img -->
										
										<h5 class="gray-regular"><?php the_sub_field('header') ?></h5>
										<p class="gray-regular"><?php the_sub_field('paragraph') ?></p>
									</div><!-- .items-piktogram -->
								<?php endwhile; ?>
							</div><!-- .content-piktogram -->
						</div><!-- .col-12 col-sm-12 col-md-10 col-lg-10 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .container-box -->
		</div><!-- .container-plats-piktogram -->
	<?php endif; ?>
<?php endwhile; ?>