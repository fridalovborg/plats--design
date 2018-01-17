<?php 
/**
* Single for plats
* The single page for Plats!
*/
?>
<?php while (have_posts()) : the_post(); ?>
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-1 col-lg-2"></div>
			<div class="col-12 col-sm-12 col-md-10 col-lg-8">
			
				<!-- FEATURE IMAGE -->
				<div class="project-img zoom" data-zoomview-caption="" data-zoomview-src="<?php echo get_the_post_thumbnail_url( null, 'plats-single' ); ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url( null, 'plats-single' ); ?>')">
				</div><!-- END: FEATURE IMAGE .project-img -->
			</div><!-- .col-12 .col-sm-12 .col-md-10 .col-lg-8 -->
		</div><!-- .row -->
	</div><!-- .container -->
	
	<div class="container-box">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-2 col-lg-2"></div>
				<div class="col-12 col-sm-12 col-md-8 col-lg-8">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-8">
							<h4 class="gray-italic"><?php the_title(); ?></h4>
							<?php the_content(); ?>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-4">
							<!-- ADVANCED CUSTOM FIELDS - UPPDRAG -->
							<h5 class="gray-regular"><?php the_field('header'); ?></h5>
							<ul>
								<li class="gray-regular"><span class="gray-italic"><?php the_field('header_vem'); ?></span> <?php the_field('vem'); ?></li>
								<li class="gray-regular"><span class="gray-italic"><?php the_field('header_var'); ?></span> <?php the_field('var'); ?></li>
								<li class="gray-regular"><span class="gray-italic"><?php the_field('header_nar'); ?></span> <?php the_field('nar'); ?></li>
								<li class="gray-regular"><span class="gray-italic"><?php the_field('header_vad'); ?></span> <?php the_field('vad'); ?></li>
								<li class="gray-regular"><span class="gray-italic"><?php the_field('header_foto'); ?></span> <?php the_field('foto'); ?></li>
								<li>
									<?php $caseLink = get_field('link'); ?>
									<?php if( $caseLink ): ?>
									<?php the_field('rubrik'); ?>
									<a class="gray-regular underline" href="<?php echo $caseLink['url']; ?>" target="_blank"><?php echo $caseLink['title']; ?></a>
									<?php endif; ?>
								</li>
							</ul>
						</div><!--.col-12 .col-sm-12 .col-md-12 .col-lg-4 -->
					</div> <!--.row -->
				</div><!--.col-12 .col-sm-12 .col-md-8 .col-lg-8 -->
			</div><!--.row -->
		</div><!--.container -->
	</div><!--.container-box -->

	<?php if( have_rows('media') ): ?>
		<!-- ADVANCED CUSTOM FIELDS - GRIDLAYOUT -->
		<?php while ( have_rows('media') ) : the_row(); ?>
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-1 col-lg-2"></div>
					
					<?php if( get_row_layout() == '1_x_landscape' ): ?>
						<!-- 1 x Landscape -->
						<div class="col-12 col-sm-12 col-md-10 col-lg-8">
							<?php $image = get_sub_field('image'); ?>
							<div class="grid-landscape extra-margin zoom" data-zoomview-src="<?php echo $image["url"]; ?>" style="background-image: url('<?php echo $image["url"]; ?>')"></div>
						</div><!-- .col-12 .col-sm-12 .col-md-10 .col-lg-8 -->
						<!-- END: 1 x Landscape -->
					<?php endif; ?>

					<?php if( get_row_layout() == '2_x_landscape' ): ?>
						<!-- 2 x Landscape -->
						<div class="col-12 col-sm-12 col-md-5 col-lg-4">
        					<?php $image1 = get_sub_field('image_1'); ?>
        					<div class="grid-landscape extra-margin zoom" data-zoomview-src="<?php echo $image1["url"]; ?>" style="background-image: url('<?php echo $image1["url"]; ?>')"></div>	
						</div><!-- .col-12 .col-sm-12 .col-md-5 .col-lg-4 -->
						<div class="col-12 col-sm-12 col-md-5 col-lg-4">
        					<?php $image2 = get_sub_field('image_2'); ?>
        					<div class="grid-landscape extra-margin zoom" data-zoomview-src="<?php echo $image2["url"]; ?>" style="background-image: url('<?php echo $image2["url"]; ?>')"></div>		
						</div><!-- .col-12 .col-sm-12 .col-md-5 .col-lg-4 -->
						<!-- END: 2 x Landscape -->
					<?php endif; ?>

					<?php if( get_row_layout() == '1_x_portrait' ): ?>
						<!-- 1 x Portrait -->
						<div class="col-12 col-sm-12 col-md-10 col-lg-8">
							<?php $image = get_sub_field('image'); ?>
							<div class="grid-1-x-portrait extra-margin zoom" data-zoomview-src="<?php echo $image["url"]; ?>" style="background-image: url('<?php echo $image["url"]; ?>')"></div>
						</div><!-- .col-12 .col-sm-12 .col-md-10 .col-lg-8 -->
						<!-- END: 1 x Portrait -->
					<?php endif; ?>

					<?php if( get_row_layout() == '2_x_portrait' ): ?>
						<!-- 2 x Portrait -->
						<div class="col-6 col-sm-6 col-md-5 col-lg-4">
        					<?php $image1 = get_sub_field('image_1'); ?>
        					<div class="grid-portrait extra-margin zoom" data-zoomview-src="<?php echo $image1["url"]; ?>" style="background-image: url('<?php echo $image1["url"]; ?>')"></div>
						</div><!-- .col-6 .col-sm-6 .col-md-5 .col-lg-4 -->
						<div class="col-6 col-sm-6 col-md-5 col-lg-4">
        					<?php $image2 = get_sub_field('image_2'); ?>
        					<div class="grid-portrait extra-margin zoom" data-zoomview-src="<?php echo $image2["url"]; ?>" style="background-image: url('<?php echo $image2["url"]; ?>')"></div>
						</div><!-- .col-6 .col-sm-6 .col-md-5 .col-lg-4 -->
						<!-- END: 2 x Portrait -->
					<?php endif; ?>

					<?php if( get_row_layout() == '1_x_square' ): ?>
						<!-- 1 x Square -->
						<div class="col-12 col-sm-12 col-md-10 col-lg-8">
							<?php $image = get_sub_field('image'); ?>
							<div class="grid-square-one extra-margin zoom" data-zoomview-src="<?php echo $image["url"]; ?>" style="background-image: url('<?php echo $image["url"]; ?>')"></div>
						</div><!-- .col-12 .col-sm-12 .col-md-10 .col-lg-8 -->
						<!-- END: 1 x Square -->
					<?php endif; ?>

					<?php if( get_row_layout() == '2_x_square' ): ?>
						<!-- 2 x Square -->
						<div class="col-12 col-sm-12 col-md-5 col-lg-4">
        					<?php $image1 = get_sub_field('image_1'); ?>
        					<div class="grid-square extra-margin zoom" data-zoomview-src="<?php echo $image1["url"]; ?>" style="background-image: url('<?php echo $image1["url"]; ?>')"></div>
						</div><!-- .col-12 .col-sm-12 .col-md-5 .col-lg-4 -->
						<div class="col-12 col-sm-12 col-md-5 col-lg-4">
        					<?php $image2 = get_sub_field('image_2'); ?>
        					<div class="grid-square extra-margin zoom" data-zoomview-src="<?php echo $image2["url"]; ?>" style="background-image: url('<?php echo $image2["url"]; ?>')"></div>
						</div><!-- .col-12 .col-sm-12 .col-md-5 .col-lg-4 -->
						<!-- END: 2 x Square -->
					<?php endif; ?>

					<?php if( get_row_layout() == '3_x_square' ): ?>
						<!-- 3 x Square -->
						<div class="col-12 col-sm-12 col-md-10 col-lg-8">
							<div class="content-square">
	        					<?php $image1 = get_sub_field('image_1'); ?>
	        					<div class="grid-square-triple extra-margin zoom" data-zoomview-src="<?php echo $image1["url"]; ?>" style="background-image: url('<?php echo $image1["url"]; ?>')"></div>

	        					<?php $image2 = get_sub_field('image_2'); ?>
	        					<div class="grid-square-triple extra-margin zoom" data-zoomview-src="<?php echo $image2["url"]; ?>" style="background-image: url('<?php echo $image2["url"]; ?>')"></div>

	        					<?php $image3 = get_sub_field('image_3'); ?>
	        					<div class="grid-square-triple extra-margin zoom" data-zoomview-src="<?php echo $image3["url"]; ?>" style="background-image: url('<?php echo $image3["url"]; ?>')"></div>
							</div><!-- .content-square -->
						</div><!-- .col-12 .col-sm-12 .col-md-10 .col-lg-8 -->
						<!-- END: 3 x Square -->
					<?php endif; ?>
				</div><!--.row -->
			</div><!--.container -->
		<?php endwhile; ?>
	<?php endif; ?>
<?php endwhile; ?>