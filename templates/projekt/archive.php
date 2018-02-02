<?php 
/**
* Projekt/archive
* The archive page for Plats!
**/
?>
<?php 
$unlimited = array( 
	'post_type' => 'projekt',
	'posts_per_page' => -1,
);
$query = new WP_Query( $unlimited );
?>
<?php $projectsAll = get_the_post_thumbnail_url( 'plats-archive' ); ?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="orange-italic text-center project-header"><?php dynamic_sidebar('sidebar-primary'); ?></div>
		</div><!-- .col-12 -->
	</div><!-- .row -->

	<div class="row justify-content-center">
		<div class="col-12 col-sm-12 col-md-8 col-lg-8">
			<div class="row">
				<?php while ($query->have_posts()) : $query->the_post(); ?>
					<div class="col-12 col-sm-12 col-md-6 col-lg-6">
						<a class="projects" href="<?php the_permalink(); ?>">
							<div class="projects-all" style="background-image: url('<?php echo get_the_post_thumbnail_url() . $projectsAll; ?>')">
								<div class="layer"></div>
							</div><!-- .projects-all -->
							<!-- img element for pinterest -->
							<div style="display: none;">
								<img src="<?php echo get_the_post_thumbnail_url() . $projectsAll; ?>">
							</div>
							<h5 class="gray-regular"><?php the_title(); ?></h5>
							<p class="subheading gray-regular"><?php the_field('text'); ?></p>
						</a><!-- .projects -->
					</div><!-- .col-12 .col-sm-12 .col-md-6 .col-lg-6 -->
				<?php endwhile; ?>
			</div><!-- .row -->
		</div><!-- .col-12 .col-sm-12 .col-md-8 .col-lg-8 -->
	</div><!-- .row -->
</div><!-- .container -->