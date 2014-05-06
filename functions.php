<?php

// enqueue the child theme stylesheet

Function wp_schools_enqueue_scripts() {
wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
wp_enqueue_style( 'childstyle' );
}
add_action( 'wp_enqueue_scripts', 'wp_schools_enqueue_scripts', 11);

function remove_some_widgets(){

	// Unregister some of the TwentyTen sidebars
	unregister_sidebar( 'fourth-footer-widget-area' );
}
add_action( 'widgets_init', 'remove_some_widgets', 11 );


require_once(dirname(__FILE__).'/inc/Custom-Meta-Boxes/custom-meta-boxes.php' );


require( get_stylesheet_directory() . '/inc/front-page-meta.php' );

// Transients

Function kushi_fp_box_meta($fpid) {

	if ( false === ( $fp_box_meta = get_transient( 'kushi_fp_box_meta' ) ) ) {

		$fp_box_meta = get_post_meta( $fpid, 'front_page_group', false );
    	set_transient('kushi_fp_box_meta', $fp_box_meta, 60 * 60 * 1); // Stored for one hour

    	return $fp_box_meta;
	}

	else
	{

    	return $fp_box_meta;   	
	}
}

Function kushi_footer_logo_meta($counter, $term) {

	$transient_name = "kushi_footer_logo_meta".$counter;

	if ( false === ( $fp_box_meta = get_transient( $transient_name ) ) ) {

		$thumbnail_id = get_woocommerce_term_meta( $term->term_taxonomy_id, 'thumbnail_id', true ); 
		$image = wp_get_attachment_url( $thumbnail_id );

    	set_transient($transient_name, $image, 60 * 60 * 1); // Stored for one hour

    	return $image;
	}

	else
	{

    	return $image;   	
	}
}