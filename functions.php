<?php

// enqueue the child theme stylesheet

Function wp_schools_enqueue_scripts() {
wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
wp_enqueue_style( 'childstyle' );
}
add_action( 'wp_enqueue_scripts', 'wpse61738_non_cached_stylesheet', 10 );
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



	if ( false === ( $image = get_transient( $transient_name ) ) ) {

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


function wpse61738_non_cached_stylesheet()
{
    wp_enqueue_style( 
        'childstyle',
        get_stylesheet_directory_uri().'/style.css',
        array(),
        filemtime( get_stylesheet_directory().'/style.css' )
    );
}

function epos_csv_parse( $csv ) {
		//global $post;

	   $products = $fields = array(); $i = 0;

	   $handle = @fopen($csv, "r");

	   if ($handle) {
	       while (($row = fgetcsv($handle, 4096)) !== false) {
	           if (empty($fields)) {
	               $fields = $row;
	               continue;
	           }
	           foreach ($row as $k=>$value) {
	               $products[$i][$k] = $value;
	           }
	           $i++;
	       }
	       if (!feof($handle)) {
	           echo "Error: unexpected fgets() fail\n";
	       }
	       fclose($handle);

	       epos_csv_update($products);
	   }
	   else {
	   		echo "unable to open CSV file";
	   }
}


function epos_csv_update( $products ) {

  global $post;

  $logname = "log-".date('Y-m-d-G-i');

  //$updatelog = fopen($logname.".txt", "w");

  foreach ($products as $product):

    $args = array(
             'post_type' => array('product', 'product_variation'),
             'posts_per_page' => -1,
             'meta_key' => '_sku',
             'meta_value' => str_replace('"', '', stripslashes($product[3])),
         );

    $prodq = new WP_Query($args);

    if ($prodq->have_posts() ) : 
      while ($prodq->have_posts()): $prodq->the_post();

        $quantity = str_replace('"', '', stripslashes($product[8]));
        settype($quantity, "integer");


        if( "" != $product[3]) :
          update_post_meta($post->ID, '_stock', $quantity);
        endif; 

             //fwrite($updatelog, print_r($post, true));
             //fwrite($updatelog, "Quantity:".$quantity." ");
             //fwrite($updatelog, "Line: ".$product[0].", SKU: ".$product[3]. " updated.".PHP_EOL);
      endwhile;
      wp_reset_postdata(); 
    else : 
      
        // echo "Line: ".$product[0].", SKU: ".$product[3]." not found.<br  />";
        // fwrite($updatelog, "Line: ".$product[0].", SKU: ".$product[3]." not found.".PHP_EOL);
    endif;
   wp_reset_query();                      
              
endforeach;
// fclose($updatelog);
}

function return_latest_orders( $id ) {

}