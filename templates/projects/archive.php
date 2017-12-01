<?php 
/**
* Archive for plats
* The archive page for Plats!
**/
?>
<div class="container">
	<div class="row">
		<?php while (have_posts()) : the_post(); ?>
			<div class="">
				<a class="artist-container" href="<?php the_permalink(); ?>">
					<h2 class=""><?php the_title(); ?></h2>
					<?php the_post_thumbnail( 'x-small', array('class' => 'img-fluid') ); ?>
				</a>
			</div>
		<?php endwhile; ?>
	</div>
</div>