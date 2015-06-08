<?php

/**
* According to
*
* https://codex.wordpress.org/Child_Themes
*
* The following seems to work for a child theme...
*
*/

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}

/**
* According to
*
* https://developer.wordpress.org/themes/basics/theme-functions/
*
* A child theme can have its own functions.php file. Adding a function to the
* child functions file is a risk-free way to modify a parent theme. That way,
* when the parent theme is updated, you don’t have to worry about your newly
* added function disappearing.
*
* Note: Although the child theme’s functions.php is loaded by WordPress right
* before the parent theme’s functions.php, it does not override it. The child
* theme’s functions.php can be used to augment or replace the parent theme’s
* functions. Similarly, functions.php is loaded after any plugin files have
* loaded.
*
* According to
*
* https://developer.wordpress.org/themes/advanced-topics/child-themes/
*
* Most files in [in a] child theme overwrite the parent theme’s file. That is,
* [the] style.css file overwrites the parent theme’s style.css file. However,
* the functions.php file in [the] child theme is different: instead of
* overwriting the parent theme’s functions.php file, it is loaded in addition to
* it. Specifically, [the] child theme’s functions.php file is loaded right before
* the parent theme’s functions.php file.
*
* Creating a functions.php file is optional.
*
*/

/**
 * Register Google Fonts
 */
function sketch_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
	 * supported by Lato, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$lato = _x( 'on', 'Lato font: on or off', 'sketch' );

	if ( 'off' !== $lato ) {
		$font_families = array();
		$font_families[] = 'Lato:300,400,700,300italic,400italic,700italic';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;

}

/**
 * Enqueue Google Fonts for custom headers
 */
function sketch_admin_scripts() {

	wp_enqueue_style( 'sketch-lato', sketch_fonts_url(), array(), null );

}
add_action( 'admin_print_styles-appearance_page_custom-header', 'sketch_admin_scripts' );

/**
 * Use a pipe for Eventbrite meta separators.
 */

 /**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
* According to
*
* https://codex.wordpress.org/Child_Themes
*
* A child theme inherits post formats as defined by the parent theme. When
* creating child themes, be aware that using add_theme_support('post-formats')
* will override the formats defined by the parent theme, not add to it.
*/

?>
