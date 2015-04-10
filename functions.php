<?php
/** avada child ok **/
function avada_child_scripts() {
	if ( ! is_admin() && ! in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ) {
		$theme_info = wp_get_theme();
		wp_enqueue_style( 'avada-child-stylesheet', get_template_directory_uri() . '/style.css', array(), $theme_info->get( 'Version' ) );
	}
}
add_action('wp_enqueue_scripts', 'avada_child_scripts');

/** 
 * Display Posts Shortcode - Offset Posts
 * @author Bill Erickson
 * @link http://wordpress.org/extend/plugins/display-posts-shortcode/
 *
 * @param array $args
 * @param array $atts
 * @return array $args
 */

/* a custom action hook */

/*
 * 1. Create your own custom action hook named 'the_action_hook'
 *    with just a line of code. Yes, it's that simple.
 *    
 *    The first argument to add_action() is your action hook name
 *    and the second argument is the name of the function that actually gets
 *    executed (that's 'callback function' in geek).
 *
 *    In this case you create an action hook named 'the_action_hook'
 *    and the callback function is 'the_action_callback'.
 */

add_action('the_action_hook', 'the_action_callback');

/*
 * 2. Declare the callback function. It prints a sentence.
 *    Note that there is no return value.
 */

function the_action_callback()
{
echo '<p>WordPress is nice!</p>';
}

/*
 * 3. When you call do_action() with your action hook name
 *    as the argument, all functions hooked to it with add_action()
 *    (see step 1. above) get are executed - in this case there is
 *    only one, the_action_callback(), but you can attach as many functions
 *    to your hook as you like.
 *
 *    In this step we wrap our do_action() in yet another
 *    function, the_action(). You can actually skip this step and just
 *    call do_action() from your code.
 */

function the_action()
{
do_action('the_action_hook');
}

