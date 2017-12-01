<?php 
/**
* Posts/archive
* The archive page for posts
**/
?>
<div class="container">
	<div class="row">
		<div class=""></div>
		<div class="">
			<h1 class="page-title"><?php wp_title(''); ?></h1>
			<?php while (have_posts()): the_post(); ?>
				<article <?php post_class(); ?>>
					<date><?php the_date(); ?></date>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
					<a class="" href="<?php the_permalink(); ?>">Läs mer</a>
				</article>
			<?php endwhile; ?>
		</div>
		<div class=""></div>
	</div>
</div>