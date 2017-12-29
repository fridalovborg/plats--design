<?php 
/**
* Project/archive
* The archive page for Plats!
**/
?>
<?php $projectsAll = get_the_post_thumbnail_url( 'plats-project' ); ?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1 class="orange-bold-italic text-center project-header"><?php dynamic_sidebar('sidebar-primary'); ?></h1>
		</div><!-- .col-12 -->
	</div><!-- .row -->

	<div class="row">
		<div class="col-12 col-sm-12 col-md-2 col-lg-2"></div>
		<div class="col-12 col-sm-12 col-md-8 col-lg-8">
			<div class="row">
				<?php while (have_posts()) : the_post(); ?>
					<div class="col-12 col-sm-12 col-md-6 col-lg-6">
						<a class="projects" href="<?php the_permalink(); ?>">
							<div class="projects-all" style="background-image: url('<?php echo get_the_post_thumbnail_url() . $projectsAll; ?>')">
								<div class="layer"></div>
							</div><!-- .projects-all -->
							<h3 class="project-title gray-bold"><?php the_title(); ?></h3>
							<p class="subheading gray-italic"><?php the_field('text'); ?></p>
						</a><!-- .projects -->
					</div><!-- .col-12 .col-sm-12 .col-md-6 .col-lg-6 -->
				<?php endwhile; ?>
			</div><!-- .row -->
		</div><!-- .col-12 .col-sm-12 .col-md-8 .col-lg-8 -->
	</div><!-- .row -->
</div><!-- .container -->