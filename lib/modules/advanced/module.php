<?php

if ( !function_exists( 'shoestrap_module_advanced_options' ) ) :
/*
 * The advanced core options for the Shoestrap theme
 */
function shoestrap_module_advanced_options( $sections ) {
	// Advanced Settings
	$section = array( 
		'title'   => __( 'Advanced', 'shoestrap' ),
		'icon'    => 'el-icon-cogs icon-large'
	);  

	$fields[] = array( 
		'title'     => __( 'Enable Retina mode', 'shoestrap' ),
		'desc'      => __( 'By enabling your site\'s featured images will be retina ready. Requires images to be uploaded at 2x the typical size desired. Default: On', 'shoestrap' ),
		'id'        => 'retina_toggle',
		'default'   => 1,
		'type'      => 'switch',
		'customizer'=> array(),
	);

	$fields[] = array( 
		'title'     => __( 'Google Analytics ID', 'shoestrap' ),
		'desc'      => __( 'Paste your Google Analytics ID here to enable analytics tracking. Only Universal Analytics properties. Your user ID should be in the form of UA-XXXXX-Y.', 'shoestrap' ),
		'id'        => 'analytics_id',
		'default'   => '',
		'type'      => 'text',
	);

	$fields[] = array( 
		'title'     => 'Border-Radius and Padding Base',
		'id'        => 'help2',
		'desc'      => __( 'The following settings affect various areas of your site, most notably buttons.', 'shoestrap' ),
		'type'      => 'info',
	);

	$fields[] = array( 
		'title'     => __( 'Border-Radius', 'shoestrap' ),
		'desc'      => __( 'You can adjust the corner-radius of all elements in your site here. This will affect buttons, navbars, widgets and many more. Default: 4', 'shoestrap' ),
		'id'        => 'general_border_radius',
		'default'   => 4,
		'min'       => 0,
		'step'      => 1,
		'max'       => 50,
		'advanced'  => true,
		'compiler'  => true,
		'type'      => 'slider',
	);

	$fields[] = array( 
		'title'     => __( 'Padding Base', 'shoestrap' ),
		'desc'      => __( 'You can adjust the padding base. This affects buttons size and lots of other cool stuff too! Default: 8', 'shoestrap' ),
		'id'        => 'padding_base',
		'default'   => 6,
		'min'       => 0,
		'step'      => 1,
		'max'       => 20,
		'advanced'  => true,
		'compiler'  => true,
		'type'      => 'slider',
	);

	$fields[] = array( 
		'title'     => __( 'PJAX', 'shoestrap' ),
		'desc'      => __( 'Use <a href="https://github.com/defunkt/jquery-pjax" target="_blank">PJAX</a> in link tags inside NavBars, Sibebars & Breadcrumb. This cause a fast linear fadeToggle effect in main page. Default: OFF', 'shoestrap' ),
		'id'        => 'pjax',
		'default'   => 0,
		'type'      => 'switch',
	);

	$fields[] = array( 
		'title'     => __( 'Root Relative URLs', 'shoestrap' ),
		'desc'      => __( 'Return URLs such as <em>/assets/css/style.css</em> instead of <em>http://example.com/assets/css/style.css</em>. Default: ON', 'shoestrap' ),
		'id'        => 'root_relative_urls',
		'default'   => 0,
		'type'      => 'switch'
	);

	$fields[] = array( 
		'title'     => __( 'Enable Nice Search', 'shoestrap' ),
		'desc'      => __( 'Redirects /?s=query to /search/query/, convert %20 to +. Default: ON', 'shoestrap' ),
		'id'        => 'nice_search',
		'default'   => 1,
		'type'      => 'switch'
	);

	$fields[] = array( 
		'title'     => __( 'Custom CSS', 'shoestrap' ),
		'desc'      => __( 'You can write your custom CSS here. This code will appear in a script tag appended in the header section of the page.', 'shoestrap' ),
		'id'        => 'user_css',
		'default'   => '',
		'type'      => 'ace_editor',
		'mode'      => 'css',
		'theme'     => 'monokai',
	);

	$fields[] = array( 
		'title'     => __( 'Custom LESS', 'shoestrap' ),
		'desc'      => __( 'You can write your custom LESS here. This code will be compiled with the other LESS files of the theme and be appended to the header.', 'shoestrap' ),
		'id'        => 'user_less',
		'default'   => '',
		'type'      => 'ace_editor',
		'mode'      => 'less',
		'theme'     => 'monokai',
		'compiler'  => true,
	);  

	$fields[] = array( 
		'title'     => __( 'Custom JS', 'shoestrap' ),
		'desc'      => __( 'You can write your custom JavaScript/jQuery here. The code will be included in a script tag appended to the bottom of the page.', 'shoestrap' ),
		'id'        => 'user_js',
		'default'   => '',
		'type'      => 'ace_editor',
		'mode'      => 'javascript',
		'theme'     => 'monokai',
	);

	$fields[] = array( 
		'title'     => __( 'Minimize CSS', 'shoestrap' ),
		'desc'      => __( 'Minimize the genearated CSS. This should be ON for production sites. Default: OFF.', 'shoestrap' ),
		'id'        => 'minimize_css',
		'default'   => 1,
		'compiler'  => true,
		'customizer'=> array(),
		'type'      => 'switch',
	);

	$fields[] = array(
		'title'     => __( 'Toggle adminbar On/Off', 'shoestrap' ),
		'desc'      => __( 'Turn the admin bar On or Off on the frontend. Default: Off.', 'shoestrap' ),
		'id'        => 'advanced_wordpress_disable_admin_bar_toggle',
		'default'   => 0,
		'customizer'=> array(),
		'type'      => 'switch',
	);

	$section['fields'] = $fields;

	$section = apply_filters( 'shoestrap_module_advanced_options_modifier', $section );
	
	$sections[] = $section;
	
	return $sections;

}
endif;
add_filter( 'redux/options/' . SHOESTRAP_OPT_NAME . '/sections', 'shoestrap_module_advanced_options', 95 );

include_once( dirname( __FILE__ ) . '/includes/functions.advanced.php' );
include_once( dirname( __FILE__ ) . '/includes/variables.php' );
include_once( dirname( __FILE__ ) . '/includes/scripts.php' );

if ( shoestrap_getVariable( 'root_relative_urls' ) == 1  )
	include_once( dirname( __FILE__ ) . '/includes/relative-urls.php' );