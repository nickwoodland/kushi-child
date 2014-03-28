<?php global $qode_options_elision;
$page_id = $wp_query->get_queried_object_id();
 ?>
<?php 
$content_bottom_area = "yes";
if(get_post_meta($page_id, "qode_enable_content_bottom_area", true) != ""){
	$content_bottom_area = get_post_meta($page_id, "qode_enable_content_bottom_area", true);
} else{
	if (isset($qode_options_elision['enable_content_bottom_area'])) { 
		$content_bottom_area = $qode_options_elision['enable_content_bottom_area'];
	}
}
$content_bottom_area_sidebar = "";
if(get_post_meta($page_id, 'qode_choose_content_bottom_sidebar', true) != ""){
	$content_bottom_area_sidebar = get_post_meta($page_id, 'qode_choose_content_bottom_sidebar', true);
} else {
	if(isset($qode_options_elision['content_bottom_sidebar_custom_display'])) {
		$content_bottom_area_sidebar = $qode_options_elision['content_bottom_sidebar_custom_display'];
	}
}
$content_bottom_area_in_grid = true;
if(get_post_meta($page_id, 'qode_content_bottom_sidebar_in_grid', true) != ""){
	if(get_post_meta($page_id, 'qode_content_bottom_sidebar_in_grid', true) == "yes") {
		$content_bottom_area_in_grid = true;
	} else {
		$content_bottom_area_in_grid = false;
	} 
}
else {
	if(isset($qode_options_elision['content_bottom_in_grid'])){if ($qode_options_elision['content_bottom_in_grid'] == "no") $content_bottom_area_in_grid = false;}
}
$content_bottom_background_color = '';
if(get_post_meta($page_id, "qode_content_bottom_background_color", true) != ""){
	$content_bottom_background_color = get_post_meta($page_id, "qode_content_bottom_background_color", true);
}
?>
	<?php if($content_bottom_area == "yes") { ?>
	<?php if($content_bottom_area_in_grid){ ?>
		<div class="container">
			<div class="container_inner clearfix">
	<?php } ?>
		<div class="content_bottom" <?php if($content_bottom_background_color != ''){ echo 'style="background-color:'.$content_bottom_background_color.';"'; } ?>>
			<?php dynamic_sidebar($content_bottom_area_sidebar); ?>
		</div>
		<?php if($content_bottom_area_in_grid){ ?>
					</div>
				</div>
			<?php } ?>
	<?php } ?>
	
	</div>
</div>
<?php 
$args = array( 
		'taxonomy' => 'product_cat',
		'parent' => 20
	 );
$brand_terms = get_terms('product_cat', $args);
?>

<footer>
	<?php if ("" != $brand_terms) : ?>

		<div class="full_width footer_parallax">
			<section class="parallax  not-column-inherit">
				<section class="footer_parallax_noscroll" style="background-image: url(http://demo.qodeinteractive.com/elision/wp-content/uploads/2013/12/893.jpg);">
					<div class="parallax_content center">
						<div class="wpb_content_element separator  transparent center  " style="margin-top:70px;margin-bottom:40px;"></div>	
						<div class="wpb_text_column wpb_content_element ">
							<div class="wpb_wrapper">
								<h2><span style="color: #ffffff;">Brands</span></h2>
							</div> 
						</div> 
					<div class="wpb_content_element separator  transparent center  " style="margin-top:7px;margin-bottom:10px;"></div>
					<div class="wpb_text_column wpb_content_element ">
						<div class="wpb_wrapper">
							<span style="color: #ffffff;">Ferri reque integre mea ut, eu eos vide errem</span>
						</div> 
					</div>
					<div class="wpb_content_element separator  transparent center  " style="margin-top:18px;margin-bottom:14px;"></div>
					<div class="qode_carousels_holder clearfix">
						<div class="qode_carousels control_style">
							<div class="flex-viewport" style="overflow: hidden; position: relative;">
								<ul class="slides">
									<?php foreach ($brand_terms as $term) : ?>

										<?php $thumbnail_id = get_woocommerce_term_meta( $term->term_taxonomy_id, 'thumbnail_id', true ); ?>
			   							<?php $image = wp_get_attachment_url( $thumbnail_id ); ?>

			   							<?php $brand_url = get_site_url()."/product-category/brands/".$term->slug; ?>

			   							<?php if ("" != $image) : ?>
				   							<li>
												<a href="<?php echo $brand_url; ?>" target="_self">
													<span class="first_image_holder">
														<div class="footer_parallax_image">
															<img src="<?php echo $image; ?>" alt="<?php echo $term->name; ?>" draggable="false">
														</div>
													</span>
												</a>
											</li>
										<?php endif; ?>

									<?php endforeach; ?>
								</ul>
							</div>
							<ul class="flex-direction-nav">
								<li>
									<a class="flex-prev" href="#">Previous</a>
								</li>
								<li>
									<a class="flex-next" href="#">Next</a>
								</li>
							</ul>
						</div>
					</div>
					</div>
				</section>
			</section>
		</div>

	<?php endif; ?>
		<?php
		$footer_in_grid = false;
		if(isset($qode_options_elision['footer_in_grid'])){if ($qode_options_elision['footer_in_grid'] == "yes") $footer_in_grid = true;}
		
		$display_footer_top = true;
		if (isset($qode_options_elision['show_footer_top'])) {
			if ($qode_options_elision['show_footer_top'] == "no") $display_footer_top = false;
		}
		
		$footer_top_columns = 4;
		if (isset($qode_options_elision['footer_top_columns'])) {
			$footer_top_columns = $qode_options_elision['footer_top_columns'];
		}
		
		if($display_footer_top) { ?>
		<div class="footer_top_holder">
			<div class="footer_top">
				<?php if($footer_in_grid){ ?>
				<div class="container">
					<div class="container_inner">
				<?php } ?>
						<?php switch ($footer_top_columns) { 
							case 4:
						?>
							<div class="four_columns clearfix">
								<div class="column1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="column2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
								<div class="column3">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_3' ); ?>
									</div>
								</div>
								<div class="column4">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_4' ); ?>
									</div>
								</div>
							</div>
						<?php
							break;
							case 3:
						?>
							<div class="three_columns clearfix">
								<div class="column1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="column2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
								<div class="column3">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_3' ); ?>
									</div>
								</div>
							</div>
						<?php
							break;
							case 2:
						?>
							<div class="two_columns_50_50 clearfix">
								<div class="column1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="column2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
							</div>
						<?php
							break;
							case 1:
								dynamic_sidebar( 'footer_column_1' );
							break;
						}
						?>
				<?php if($footer_in_grid){ ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
		<?php
		$display_footer_text = false;
		if (isset($qode_options_elision['footer_text'])) {
			if ($qode_options_elision['footer_text'] == "yes") $display_footer_text = true;
		}
		if($display_footer_text): ?>
		<div class="footer_bottom_holder">
			<div class="footer_bottom">
				<?php dynamic_sidebar( 'footer_text' ); ?>
			</div>
		</div>
		<?php endif; ?>
	</footer>
</div>
</div>
<?php
	global $qode_toolbar;
	if(isset($qode_toolbar)) include("toolbar.php")
?>
<?php wp_footer(); ?>
</body>
</html>