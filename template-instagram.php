<?php
/**
 * Template Name: Plats! Instagram
 */
?>
<?php $platsImage = get_the_post_thumbnail_url( 'large' ); ?>
<?php while (have_posts()) : the_post(); ?>
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-1 col-lg-1"></div>
			<div class="col-12 col-sm-12 col-md-5 col-lg-5">
				<h1 class="orange-italic om-extra-margin"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div><!-- .col-12 .col-sm-12 .col-md-5 .col-lg-5 -->
			<div class="col-12 col-sm-12 col-md-5 col-lg-5">
				<div class="plats-img" style="background-image: url('<?php echo get_the_post_thumbnail_url() . $platsImage; ?>');"></div>
				
				<!-- img element for pinterest -->
				<div style="display: none;">
				    <img src="<?php echo get_the_post_thumbnail_url() . $platsImage; ?>">
				</div>
			</div><!-- .col-12 .col-sm-12 .col-md-5 .col-lg-5 -->
		</div><!-- .row -->
	</div><!-- .container -->

	<?php get_template_part( 'instagram', 'field' ); ?>
<?php endwhile; ?>