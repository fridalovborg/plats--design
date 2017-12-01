<?php 
/**
* Single for plats
* The single page for Plats!
**/
?>
<div class="container">
	<div class="row">
		<?php while (have_posts()) : the_post(); ?>
			<div class=""></div>
			<div class="">
	    		<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>
			<div class="">
				<!-- FEATURE IMAGE -->
				<div class="">
					<?php the_post_thumbnail('small'); ?>
				</div>
			</div>
			<div class=""></div>
		<?php endwhile; ?>
	</div>
</div>