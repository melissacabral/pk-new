<?php
/*
Plugin Name: FancyBox2
Plugin URI: http://wordpress.org/extend/plugins/fancybox2/
Description: Enables <a href="http://fancybox.net/">fancybox 2.0.3</a> on all image links including BMP, GIF, JPG, JPEG, and PNG links. Modified version of Fancybox plugin by Kevin Sylvestre to use the new fancybox2.
Version: 2.0.3
Author: Span
Author URI: http://www.seanrick.com/
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function fancybox() {
?>
<script type="text/javascript">
	jQuery(document).ready(function($){
		var select = $('a[href$=".bmp"],a[href$=".gif"],a[href$=".jpg"],a[href$=".jpeg"],a[href$=".png"],a[href$=".BMP"],a[href$=".GIF"],a[href$=".JPG"],a[href$=".JPEG"],a[href$=".PNG"]');
		select.attr('rel', 'fancybox');
		select.fancybox({
    			helpers : {
       				 title: {
         			   type: 'outside'
       				 }
    			}
		});
	});
</script>
<?php
}

if (!is_admin()) {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery.fancybox', WP_PLUGIN_URL.'/fancybox2/jquery.fancybox.js', array('jquery'), '2.0.3');
	wp_enqueue_script('jquery.easing', WP_PLUGIN_URL.'/fancybox2/jquery.easing.js', array('jquery'), '1.6');
	wp_enqueue_style('jquery.fancybox', WP_PLUGIN_URL.'/fancybox2/jquery.fancybox.css', false, '2.0.3');
	add_action('wp_head', 'fancybox');
}
?>