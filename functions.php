<?php
//Register menus
register_nav_menus( array(
		'mainmenu' => __( 'Primary Menu',      'mainmenu' ),
) );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Top sidebar',
		'id'            => 'header_top',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
    //Register social-icons sidebar

    register_sidebar(array(
        'name' => 'Social Icons',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<div class="title">',
        'after_title' => '</div>',
    ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

//Register custom NavWalker for boottrap
require_once('wp_bootstrap_navwalker.php');

?>