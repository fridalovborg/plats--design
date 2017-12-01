<?php 
/**
* Page/single
* The content for default template
**/
?>
<div class="container">
	<div class="row">
		<?php while (have_posts()) : the_post(); ?>
			<div class=""></div>
			<div class="">
				<h1 class="page-title"><?php //the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
			<div class=""></div>
		<?php endwhile; ?>
	</div>
</div>