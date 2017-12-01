<?php 
/**
* Posts/single
* The single page for posts
**/
?>
<div class="container">
	<div class="row">
		<?php while (have_posts()): the_post(); ?>
			<div class=""></div>
			<div class="">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
			<div class=""></div>
		<?php endwhile; ?>
	</div>
</div>