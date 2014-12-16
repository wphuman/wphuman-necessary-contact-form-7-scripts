<?php

/**
 * Plugin Name:         WP Human Necessary Contact Form 7 Scripts
 * Description:         Load Contact Form 7 JS and CSS only when it is necessary. Made by Tang Rufus from WP Human
 * Author:              Tang Rufus @ WP Human
 * Author URI:          http://wphuman.com
 * Author Twitter:      @tangrufus, @wphuman
 * Author Email:        rufus@wphuman.com
 * Version:             1.0.0
 * License:             GPL-2.0+
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: 	https://github.com/wphuman/wphuman-necessary-contact-form-7-scripts
 * GitHub Branch:       master
 *
 */

// Remove Contact Form 7 Scripts
add_action( 'wp_enqueue_scripts', 'wph_remove_wpcf7_scripts', 5 );
function wph_remove_wpcf7_scripts() {

	global $post;

	// Load CSS and JS when only when there is a [contact-form-7] shortcode
	if( ! is_a( $post, 'WP_Post' ) || ! has_shortcode( $post->post_content, 'contact-form-7') ) {
		add_filter( 'wpcf7_load_css', '__return_false' );
		add_filter( 'wpcf7_load_js', '__return_false' );
	}
}
