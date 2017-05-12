<?php
/**
 * Plugin Name: Silktide Cookie Consent
 * Plugin URI: https://silktide.com/tools/cookie-consent/
 * Description: Cookie Consent Plugin based on Silktide Cookie Consent JavaScript Plugin
 * Author: Diane Wallace
 * Author URI: http://dianewallace.co.uk/
 * Version: 2.0.0
 */
function silktide_cookies_scripts() {
	// Queue JS and CSS.
	wp_register_script(
		'cookieconsent',
		'https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js',
		null,
		null,
		false
	);
	wp_enqueue_script( 'cookieconsent' );
	wp_enqueue_style(
		'cookieconsent',
		plugin_dir_url( __FILE__ ) . 'css/cookieconsent.css',
		false,
		false,
		'all'
	);
	wp_add_inline_script(
		'cookieconsent',
		'<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
		window.cookieconsent_options = {
			"message":"We use cookies to ensure we can provide you with the best experience on our website. To find out more about the cookies we use and how to change your settings please view our ",
			"dismiss":"<strong>X</strong>",
			"learnMore":"Privacy Policy",
			"link":"/privacy-policy/",
			"theme":"light-bottom"
		};
		<!-- End Cookie Consent plugin -->',
		'after'
	);
}
add_action( 'wp_enqueue_scripts', 'silktide_cookies_scripts' );
