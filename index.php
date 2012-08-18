<?php

/*
Plugin Name: The Buffer Button
Plugin URI: http://bufferapp.com/extras/button
Description: Add the buffer button to your blog to let people share your content on Twitter and Facebook seamlessly. They can share right away or at a better time using Buffer.
Version: 1.0
Author: Igloo
Author URI: http://www.igloolab.com
License: GPL2
*/

add_filter("the_content", "the_buffer_button_the_content_filter");

function the_buffer_button_the_content_filter($the_content) {
	
	if (is_single()) {
		
		$post = $GLOBALS["post"];
		$the_title = $post->post_title;
		$the_permalink = get_permalink($post->ID);
		
		$display = get_option("the_buffer_button_display") != null ? get_option("the_buffer_button_display") : "before";
		$style = get_option("the_buffer_button_style") != null ? get_option("the_buffer_button_style") : "vertical";
		$twitter_username_to_mention = get_option("the_buffer_button_twitter_username_to_mention");
		
		$the_buffer_button = sprintf(
			"<a href=\"http://bufferapp.com/add\" class=\"buffer-add-button\" data-text=\"%s\" data-url=\"%s\" data-count=\"%s\" data-via=\"%s\">Buffer</a><script type=\"text/javascript\" src=\"http://static.bufferapp.com/js/button.js\"></script>",
			$the_title,
			$the_permalink,
			$style,
			$twitter_username_to_mention
		);
	
		return $display == "before" ? $the_buffer_button . $the_content : $the_content . $the_buffer_button;
	
	}
	
	return $the_content;
}

add_filter("admin_menu", "the_buffer_button_admin_menu_filter");

function the_buffer_button_admin_menu_filter() {
	
	add_options_page("The Buffer Button", "The Buffer Button", "manage_options", "the-buffer-button-admin", "the_buffer_button_options");

}

function the_buffer_button_options() {
	
	require_once("the-buffer-button-admin.php");

}

?>