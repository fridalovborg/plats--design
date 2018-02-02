<?php
/**
* Template Name: Plats! Kontakt
*/
?>
<?php $platsImage = get_the_post_thumbnail_url( 'large' ); ?>
<?php while (have_posts()) : the_post(); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-sm-12 col-md-5 col-lg-5">
				<h1 class="orange-italic om-extra-margin"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div><!-- .col-12 .col-sm-12 .col-md-5 .col-lg-5 -->
			<div class="col-12 col-sm-12 col-md-5 col-lg-5">
				<div class="contact-fom">
					<?php $contactForm = get_field('form'); ?>
					<?php echo do_shortcode($contactForm); ?>
				</div><!-- .contact-fom -->
			</div><!-- .col-12 .col-sm-12 .col-md-5 .col-lg-5 -->
		</div><!-- .row -->

		<?php if ( has_post_thumbnail() ): ?>
			<div class="row justify-content-center">
				<div class="col-12 col-sm-12 col-md-10 col-lg-8">
					<div class="project-img kontakt-extra-margin" style="background-image: url('<?php echo get_the_post_thumbnail_url( null, 'large' ); ?>')"></div>
					<!-- img element for pinterest -->
					<div style="display: none;">
					    <img src="<?php echo get_the_post_thumbnail_url( null, 'large' ); ?>">
					</div>
				</div><!-- .col-12 .col-sm-12 .col-md-10 .col-lg-8 -->
			</div><!-- .row -->
		<?php endif; ?>
	</div><!-- .container -->
<?php endwhile; ?>