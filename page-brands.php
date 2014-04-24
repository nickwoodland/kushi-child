<?php 
get_header();

include(locate_template('/inc/qode_options.php'));
?>
<div class="brands_wrapper">
			<?php if(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)) { ?>
				<script>
				var page_scroll_amount_for_sticky = <?php echo get_post_meta($id, "qode_page_scroll_amount_for_sticky", true); ?>;
				</script>
			<?php } ?>
			<?php if(!get_post_meta($id, "qode_show-page-title", true)) { ?>
				<div class="title<?php echo $height_class; ?> <?php if($responsive_title_image == 'no' && $title_image != "" && ($fixed_title_image == "yes" || $fixed_title_image == "yes_zoom") && $show_title_image == true){ echo 'has_fixed_background '; if($fixed_title_image == "yes_zoom"){ echo 'zoom_out '; } } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no" && $show_title_image == true){ echo 'has_background'; } if($responsive_title_image == 'yes' && $show_title_image == true){ echo 'with_image'; } ?>" style="<?php if($responsive_title_image == 'no' && $title_image != "" && $show_title_image == true){ if($title_image_width != ''){ echo 'background-size:'.$title_image_width.'px auto;'; } echo 'background-image:url('.$title_image.');';  } if($title_height != ''){ echo 'height:'.$title_height.'px;'; } if($title_background_color != ''){ echo 'background-color:'.$title_background_color.';'; } ?>">
					<div class="image <?php if($responsive_title_image == 'yes' && $title_image != "" && $show_title_image == true){ echo "responive"; }else{ echo "not_responsive"; } ?>"><?php if($title_image != ""){ ?><img src="<?php echo $title_image; ?>" alt="&nbsp;" /> <?php } ?></div>
					<?php if(!get_post_meta($id, "qode_show-page-title-text", true)) { ?>
						<div class="title_holder">
							<div class="container">
								<div class="container_inner clearfix">
									<?php if($qode_page_title_style == "title_on_bottom") {  ?>
										<div class="title_on_bottom_wrap">
											<div class="title_on_bottom_holder">
												<div class="title_on_bottom_holder_inner" <?php if(get_post_meta($id, "qode_page_title_holder_color", true)) { ?> style="background-color:<?php echo get_post_meta($id, "qode_page_title_holder_color", true) ?>" <?php } ?>>
													<h1<?php if(get_post_meta($id, "qode_page-title-color", true)) { ?> style="color:<?php echo get_post_meta($id, "qode_page-title-color", true) ?>" <?php } ?>><span><?php the_title(); ?></span></h1>
												</div>
											</div>
										</div>
									<?php } else { ?>
										<h1<?php if(get_post_meta($id, "qode_page-title-color", true)) { ?> style="color:<?php echo get_post_meta($id, "qode_page-title-color", true) ?>" <?php } ?>><span><?php the_title(); ?></span></h1>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
	<div class="container brands">
		<div class="container clearfix">
			<div class="container container_inner clearfix ">
				<?php the_content(); ?>
				<?php echo do_shortcode('[product_categories parent=20]'); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>