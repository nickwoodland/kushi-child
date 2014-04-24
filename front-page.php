<?php get_header(); ?>
<?php include(locate_template('/inc/qode_options.php')); ?>

<div class="q_slider">
	<div class="q_slider_inner">
		<?php $revslider = get_post_meta($id, "qode_revolution-slider", true); ?>
		<?php echo do_shortcode($revslider); ?>
	</div>
</div>
<?php $box_slider_meta = get_post_meta( $post->ID, 'front_page_group', false ); ?>
<div class="container">
	<div class="strapline">
		<?php $strapline_heading = get_post_meta( $post->ID, 'strapline_heading', false); ?>
		<?php if ($strapline_heading) : ?>
			<h2><?php echo $strapline_heading[0];  ?></h2>
		<?php endif; ?>
		<div class="strapline_inner">
			<p> 
				<?php $strapline_content = get_post_meta( $post->ID, 'strapline_content', false); ?>
				<?php if ($strapline_content) : ?>
					<?php echo $strapline_content[0];  ?>
				<?php endif; ?>
			</p>
		</div>
	</div>
	<div class="container clearfix">
		<div class="projects_holder_outer v4">
			<div class="projects_holder clearfix v4 hover_text no_space">
				<?php //for ($i=1; $i<=4; $i++) { ?> 
				<?php foreach ($box_slider_meta as $box_meta) : ?>
					<?php $box_image = wp_get_attachment_image_src($box_meta['image'],'large',false); ?>
					<article class="mix street-art  mix_all">
						<div class="image_holder">
							<span class="image">
								<img src="<?php echo $box_image[0]; ?>" class="attachment-full wp-post-image" alt="5125680275_53c506c205_b">
							</span>
							<div class="hover_feature_holder">
								<span class="hover_feature_holder_icons">
									<span class="hover_feature_holder_icons_outer">
										<span class="hover_feature_holder_icons_inner">
											<a class="preview" href="<?php echo $box_meta['link'];?>" />
												<i class="fa fa-link fa-3x">
												</i>
											</a>
										</span>
									</span>
								</span>
								<div class="hover_feature_holder_title">
									<div class="hover_feature_holder_title_inner">
										<h4 class="portfolio_title">
											<a href="http://localhost/sites/kushi/portfolio_page/roshambo/"><?php echo $box_meta['heading'];?></a>
										</h4>
										<span class="project_category"><?php echo $box_meta['text'];?></span>
									</div>
								</div>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
				<div class="filler"></div>
				<div class="filler"></div>
				<div class="filler"></div>
				<div class="filler"></div>
			</div>
		</div>
	</div>
	<div class="container container_inner container_frontpage clearfix">
		<?php the_content(); ?>
	</div>
</div>

<?php get_footer(); ?>