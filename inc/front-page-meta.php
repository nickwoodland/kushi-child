<?php
function cmb_slidng_box_metaboxes( array $meta_boxes ) {

		$fields =   array(

						array(
		    				'name' => 'Box Image',
		    				'id' => $prefix . 'image',
		    				'type' => 'image',
	    				),

	    				array( 
	    					'name' => 'Box Link',
		    				'id' => $prefix . 'link',
		    				'type' => 'url',
		    			),

                        array( 
                            'name' => 'Box Heading',
                            'id' => $prefix . 'heading',
                            'type' => 'text',
                        ),

                        array( 
                            'name' => 'Box Text',
                            'id' => $prefix . 'text',
                            'type' => 'text',
                        ),
	   				);

		$prefix = "front_page_";
	    $meta_boxes[] = array(
    		'id' => $prefix.'sliding_boxes', //used just for storage
    		'title' => 'Sliding Boxes',
			'pages'      => array( 'page' ), // Post type
    		'context' => 'normal',
    		'priority' => 'high',
    		'show_names' => true, // show field names on the left
    		'show_on'    => array( 'key' => 'id', 'value' => '83' ), // Specific post IDs to display this metabox
    		'fields' => array(

    			array(
    				'id' => $prefix.'group',
    				'name' => 'Configure Front Page Boxes',
    				'type' => 'group',
    				'fields' => $fields,
    				'repeatable' => true,
    				'repeatable_max' => 4
    			),
    			
    		),
    	);

	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'cmb_slidng_box_metaboxes' );


function cmb_strapline_metaboxes( array $meta_boxes ) {

    $prefix = "strapline_";

    $fields =   array(

                array(
                    'name' => 'Strapline Heading',
                    'id' => $prefix . 'heading_1',
                    'type' => 'text',
                ),

                array( 
                    'name' => 'Strapline Content',
                    'id' => $prefix . 'content_1',
                    'type' => 'textarea',
                ),
                array( 
                    'name' => 'Strapline Image',
                    'id' => $prefix . 'image_1',
                    'type' => 'image',
                ),
            );

    $meta_boxes[] = array(
        'id' => $prefix.'group_1', //used just for storage
        'title' => 'Strapline 1',
        'pages'      => array( 'page' ), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // show field names on the left
        'show_on'    => array( 'key' => 'id', 'value' => '83' ), // Specific post IDs to display this metabox
        'fields' => $fields
    );


    $fields =   array(

                array(
                    'name' => 'Strapline Heading',
                    'id' => $prefix . 'heading_2',
                    'type' => 'text',
                ),

                array( 
                    'name' => 'Strapline Content',
                    'id' => $prefix . 'content_2',
                    'type' => 'textarea',
                ),
                array( 
                    'name' => 'Strapline Image',
                    'id' => $prefix . 'image_2',
                    'type' => 'image',
                ),
            );

    $meta_boxes[] = array(
        'id' => $prefix.'group_2', //used just for storage
        'title' => 'Strapline 2',
        'pages'      => array( 'page' ), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // show field names on the left
        'show_on'    => array( 'key' => 'id', 'value' => '83' ), // Specific post IDs to display this metabox
        'fields' => $fields
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'cmb_strapline_metaboxes' );
?>