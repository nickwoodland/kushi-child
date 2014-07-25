<?php get_header(); ?>
<?php include(locate_template('/inc/qode_options.php')); ?>

<?php if( !wp_is_mobile() ): ?>
	<div class="q_slider">
		<div class="q_slider_inner">
			<?php $revslider = get_post_meta($id, "qode_revolution-slider", true); ?>
			<?php echo do_shortcode($revslider); ?>
		</div>
	</div>
	<div class="main_cta">
		<a href="#strapline">
			Find Out More About Kushi...		
		</a>
	</div>
<?php endif; ?>
<?php // $box_slider_meta = get_post_meta( $post->ID, 'front_page_group', false ); ?>
<?php $box_slider_meta = kushi_fp_box_meta($post->ID); ?>

<div class="container">
	<div class="strapline" id="strapline">
		<?php $strapline_heading_1 = get_post_meta( $post->ID, 'strapline_heading_1', false); ?>
		<?php if ($strapline_heading_1) : ?>
			<h2><?php echo $strapline_heading_1[0];  ?></h2>
		<?php endif; ?>
		<div class="strapline_inner">
			<p> 
				<?php $strapline_content = get_post_meta( $post->ID, 'strapline_content_1', false); ?>
				<?php if ($strapline_content) : ?>
					<?php echo $strapline_content[0];  ?>
				<?php endif; ?>
			</p>
		</div>
	</div>
	<div class="container clearfix" id="boxes" name="boxes">
		<div class="projects_holder_outer v4" >
			<div class="projects_holder clearfix v4 hover_text no_space">
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
											<a href="<?php echo $box_meta['link'];?>"><?php echo $box_meta['heading'];?></a>
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
	<!--<div class="container container_inner container_frontpage clearfix">
		<div class="wpb_row vc_row-fluid" style="text-align:left;">
			<div class="vc_span6 wpb_column column_container">
				<div class="wpb_wrapper">
					<?php //the_content(); ?>
				</div> 
			</div> 
			<div class="vc_span6 wpb_column column_container">
				<div class="wpb_wrapper">
					<?php// the_post_thumbnail(); ?>
				</div> 
			</div> 
		</div>	
	</div>-->
	<div class="strapline">
		<?php $strapline_image = get_post_meta( $post->ID, 'strapline_image_2', false); ?>
		<?php $strapline_heading = get_post_meta( $post->ID, 'strapline_heading_2', false); ?>
		<?php $strapline_content = get_post_meta( $post->ID, 'strapline_content_2', false); ?>
		<?php if( isset($strapline_image) && !empty($strapline_image ) ) : ?>
			<div class="wpb_row vc_row-fluid" style="text-align:left;">
				<div class="vc_span4 wpb_column column_container">
					<div class="strapline_inner">
					<div class="wpb_wrapper">
						<?php echo wp_get_attachment_image( $strapline_image[0], 'large' ); ?>
					</div> 
					</div>
				</div> 
				<div class="vc_span8 wpb_column column_container">
					<div class="wpb_wrapper">
						<div class="strapline_inner">
							<?php if ($strapline_heading) : ?>
								<h2><?php echo $strapline_heading[0];  ?></h2>
							<?php endif; ?>
												
							<?php if ($strapline_content) : ?>
								<p> 	
									<?php echo $strapline_content[0];  ?>
								</p>
							<?php endif; ?>
						</div>
					</div> 
				</div> 
			</div>	
		<?php else: ?>
			<?php if ($strapline_heading) : ?>
				<h2><?php echo $strapline_heading[0];  ?></h2>
			<?php endif; ?>
			<div class="strapline_inner">
				<p> 		
					<?php if ($strapline_content) : ?>
						<?php echo $strapline_content[0];  ?>
					<?php endif; ?>
				</p>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>