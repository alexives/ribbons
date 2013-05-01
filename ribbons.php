<?php
/*
Plugin Name: Ribbons Support Group Finder
Plugin URI: https://github.com/alexives/ribbons
Description: Stores and locates support groups in the database for easy retrival.
Version: 0.1
Author: Alex Ives
Author URI: http://alex.ives.mn
License: GPL2

Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : PLUGIN AUTHOR EMAIL)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
$pluginName = plugin_basename( __FILE__ );


add_action( 'init', 'create_ribbons_type' );
function create_ribbons_type() {
	register_post_type( 'support_group',
		array(
			'labels' => array(
				'name' => __( 'Support Groups' ),
				'singular_name' => __( 'Group' ),
				'add_new' => __( 'Add Group'),
				'add_new_item' => __( 'Add New Group'),
				'edit_item' => __( 'Edit Group'),
				'new_item' => __( 'New Group'),
				'view_item' => __( 'View Group Page'),
				'search_items' => __( 'Search Groups')
			),
		'supports' => array('title','editor','thumbnail', 'comments'),
		'taxonomies' => array('post_tag','category'),
		'public' => true,
		'has_archive' => true,
		)
	);
}

function remove_support_group_disscusion_option_box() {
	remove_meta_box( 'pageparentdiv', 'support_group','normal' );
}
add_action( 'admin_menu', 'remove_support_group_disscusion_option_box');

include('admin/group_location_pane.php');
include('admin/search.php');

?>