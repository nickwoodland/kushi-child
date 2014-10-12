<?php
$brands = kushi_fp_brands_meta($post->ID); 
?>

<?php foreach ($brands as $brand) : ?>
	<?php $brand_link = $brand['strapline_brand_link']; ?>
	<?php $brand_img = wp_get_attachment_image_src($brand['strapline_brand_image'], 'full'); ?>

	<?php if (false != $brand_img) : ?>
		<div class="vc_span2 wpb_column column_container">
			<a href="<?php echo $brand_link; ?>">
				<img src="<?php echo $brand_img[0];  ?>">
				</img>
			</a>
		</div>
	<?php endif; ?>
<?php endforeach; ?>
