<?php

/*
 * Plugin Name:       Custom Post Grid
 * Plugin URI:        https://github.com/kedmar20/custom-plugin-wp-shortcode-mysql-filtering
 * Description:       This is custom post grid for wordpress posts and fetching from MySQL database.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            kedmar20
 * Author URI:        https://github.com/kedmar20
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       custom-post-grid
 */


 // shortcode to take the data from database and display as a table
function wpdb_mysql_show(){
	global $wpdb;
	$results = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type='post' ORDER BY post_date ASC LIMIT 0,14");

	ob_start();
?>
	<div style="color:red; font-weight:700">sdfsdfsd</div>
	<div style="color:green; font-weight:700"><?php echo $results; ?></div>
	<?php
		foreach ($results as $title) { ?>
		<table>
		<tr>
			<td style="color:blue; font-weight:700"><?php echo $title->post_title; ?></td>
		</tr>
		</table>
		<?php }

	return  ob_get_clean();
}

add_shortcode('posts_titles','wpdb_mysql_show');