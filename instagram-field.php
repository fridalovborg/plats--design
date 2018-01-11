<!-- OM PLATS - INSTAGRAM -->
<div class="container-box">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-1 col-lg-1"></div>
			<div class="col-12 col-sm-12 col-md-10 col-lg-10">
				<?php $link = get_field('link'); ?>
				<?php if( $link ): ?>
					<h2 class="orange-bold-italic om-extra-margin">
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
			<?php if( $link ): ?>
				<a href="<?php echo $link['url']; ?>" target="_blank">
					<div class="content-instagram">
						<?php $instagram = get_instagram_posts(); ?>
						<?php foreach (array_reverse($instagram) as $insta): ?>
							<?php $imageLink = $insta->link; ?>
							<div class="instagram-img" style="background-image: url('<?php echo $insta->images->standard_resolution->url; ?>');"></div>
						<?php endforeach; ?>
					</div><!-- .content-instagram -->
				</a>
			<?php endif; ?>
			</div><!-- .col-12 .col-sm-12 .col-md-10 .col-lg-10 -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .container-box -->