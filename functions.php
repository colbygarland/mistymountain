<?php
/*
Custom WordPress Functions
*/
include_once('idp-funktions/idp-funktions.php');
include_once('layout.php');

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

add_theme_support( 'title-tag' );
add_editor_style( 'css/editor-style.css' );

//ACF Yoast exclude these fields
add_filter('ysacf_exclude_fields', function(){
    return array(
        'acf_fc_layout',
		'list_layout',
    );
});

//Bootstrap Image Sizes
add_image_size( '1c_xl2x', 3840, 3840 );
add_image_size( '1c_lg2x', 2880, 2880 );
add_image_size( '1c_xl_md2.2c_xl2x', 1920, 1920 );
add_image_size( '1c_lg_sm2x-2c_lg2x.3c_xl2x', 1440, 1440 );
add_image_size( '1c_md.2c_xl_md2x.3c_lg2x', 960, 960 );
add_image_size( '1c_sm.2c_lg_sm2x.3c_xl_md2x', 720, 720 );
add_image_size( '2c_md.3c_lg_sm2x', 480, 480 );
add_image_size( '2c_sm.2c_md', 360, 360 );
add_image_size( '3c_sm', 240, 240 );

/*
add_image_size( 'Mobile', 768, 1024 );
add_image_size( 'Tablet', 992, 1200 );
add_image_size( 'Desktop', 1280, 1080 );
add_image_size( 'Widescreen', 2000, 1280 );

add_image_size( 'SlidePreview', 500, 500 );
*/

//Match Bootstrap to Insertion Sizes
if( get_option('idp_img_defaults', 0) != 1 ):
	update_option( 'thumbnail_size_w', 360 );
	update_option( 'thumbnail_size_h', 360 );
	update_option( 'thumbnail_crop', 1 );
	update_option( 'medium_size_w', 720 );
	update_option( 'medium_size_h', 1200 );
	update_option( 'medium_crop', 0 );
	update_option( 'large_size_w', 1440 );
	update_option( 'large_size_h', 1080 );
	update_option( 'large_crop', 0 );
	
	//Set Default Max Image Upload Resize
	update_option('jr_resizeupload_width', 4000);
	
	update_option('idp_img_defaults', 1);
endif;


add_action('wp_enqueue_scripts', 'idp_theme_scripts_styles');
//Enqueue static scripts and styles for faster processing and portability
function idp_theme_scripts_styles(){
	//CSS Styles
	wp_enqueue_style( 'Main', get_template_directory_uri().'/css/main.css', 'all' );
	
	//Scripts
	wp_enqueue_script( 'jquery', '/wp-includes/js/jquery/jquery.js','','',false);
	
	#MAIN - Custom javascript file
	wp_enqueue_script(	'Lightbox', 	get_template_directory_uri() . '/js/lightbox.js', array('jquery'), '', true);
	wp_enqueue_script(	'Main', 	get_template_directory_uri() . '/js/main.js', array('jquery'), '', true);
}

/**
* Hide the 'attachment page' option from media and gallery settings.
*/
add_action( 'print_media_templates', function(){
    echo '
        <style>      
            .media-frame-content select.link-to option[value="post"],
                                                .post-php select.link-to option[value="post"],
            .post-php select[data-setting="link"] option[value="post"]
            { display: none; }
        </style>';
});
function idp_default_linkto( $settings ) {
    $settings['galleryDefaults']['link'] = 'file';
    return $settings;
}
add_filter( 'media_view_settings', 'idp_default_linkto');

function my_mce_before_init_insert_formats( $init_array ) {
  // Define the style_formats array
  $style_formats = array(
    // Each array child is a format with it's own settings
    array(
      'title' => 'Script Font',
      'selector' => 'h1,h2,h3,h4,h5,h6',
      'classes' => 'script',
      'wrapper' => true,

    ),

  );
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );

  return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );
