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

/**
 * According to
 *
 * http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 *
 * function to take care of all the logic related to these fonts, ... with the
 * basic outline ... it takes no parameters and returns a string, which starts
 * out empty.
 *
 */

sketch_fonts_url() {
     $fonts_url = '';

     return $fonts_url;
}

/**
 * Add fonts
 */

    /* Translators: If there are characters in your language that are not
     * supported by Lora, translate this to 'off'. Do not translate
     * into your own language.
     */
    $rosarivo = _x( 'on', 'Rosarivo font: on or off', 'theme-slug' );

    /* Translators: If there are characters in your language that are not
     * supported by Lora, translate this to 'off'. Do not translate
     * into your own language.
     */
    $inconsolata = _x( 'on', 'Inconsolata font: on or off', 'theme-slug' );

    /* Translators: If there are characters in your language that are not
     * supported by Lora, translate this to 'off'. Do not translate
     * into your own language.
     */
    $carme = _x( 'on', 'Carme font: on or off', 'theme-slug' );

    /**
    * Check if fonts have been deactivated by translators; no need to continue
    * in that case. Add font names and styles to array. Numbers after colon
    * represent different styles weights, cursive variants, small caps, etc.
    */

    /**
    * Generate fonts URL with $query_args = array
    */

    if ( 'off' !== $rosarivo || 'off' !== $inconsolata || 'off' !== $carme ) {
        $font_families = array();

    if ( 'off' !== $rosarivo ) {
        $font_families[] = 'Rosarivo:400,400italic';
    }

    if ( 'off' !== $inconsolata ) {
        $font_families[] = 'Inconsolata:400,700';

    if ( 'off' !== $carme ) {
        $font_families[] = 'Carme';

        $query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }

    return $fonts_url;
}

/**
* Enque Google fonts on front end and for custom headers
*/

function sketch_admin_scripts_styles() {

    wp_enqueue_style( 'sketch-rosarivo', 'sketch-inconsolata', 'sketch-carme', sketch_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'admin_print_styles-appearance_page_custom-header', 'sketch_admin_scripts_styles' );

function sketch_admin_scripts_styles() {

    wp_dequeue_style( 'sketch-lato' );

}

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
