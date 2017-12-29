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
				<h1 class="orange-bold-italic"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div><!-- .col-12 .col-sm-12 .col-md-5 .col-lg-5 -->
			<div class="col-12 col-sm-12 col-md-5 col-lg-5">
				<div class="plats-img" style="background-image: url('<?php echo get_the_post_thumbnail_url() . $platsImage; ?>');"></div>
			</div><!-- .col-12 .col-sm-12 .col-md-5 .col-lg-5 -->
		</div><!-- .row -->
	</div><!-- .container -->

	<!-- OM PLATS - INSTAGRAM -->
	<div class="container-box">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-1 col-lg-1"></div>
				<div class="col-12 col-sm-12 col-md-10 col-lg-10">
					<?php $link = get_field('link'); ?>
					<?php if( $link ): ?>
						<h2 class="orange-bold-italic">
							<?php the_field('rubrik'); ?>
							<a class="orange-bold-italic" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
						</h2>
					<?php endif; ?>
				</div><!-- .col-12 .col-sm-12 .col-md-10 .col-lg-10 -->
			</div><!-- .row -->
		</div><!-- .container -->
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-1 col-lg-1"></div>
				<div class="col-12 col-sm-12 col-md-10 col-lg-10">
					<div class="content-instagram">
						<?php $instagram = get_instagram_posts(); ?>
						<?php foreach (array_reverse($instagram) as $insta): ?>
							<div class="instagram-img" style="background-image: url('<?php echo $insta->images->low_resolution->url; ?>');"></div>
						<?php endforeach; ?>
					</div><!-- .content-instagram -->
				</div><!-- .col-12 .col-sm-12 .col-md-10 .col-lg-10 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .container-box -->
<?php endwhile; ?>