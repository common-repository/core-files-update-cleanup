<?php
/*
Plugin Name: Core Files Update Cleanup
Description: Delete the unnecessary license.txt, readme.html and wp-config-sample.php files after a core update.
Version: 1.1.0
Author: Lawrie Malen
Author URI: https://www.verynewmedia.com
License: GPL

Copyright (C) 2024 Lawrie Malen // Very New Media
Released 14-01-2024
Updated: 19-01-2024
*/

if (!defined('ABSPATH')) {
	exit;	//	Exit if accessed directly
}

///
//	Initialise plugin
///

function vnm_core_files_cleanup_activate() {
	do_action('vnm_core_files_cleanup_activated');
}

register_activation_hook( __FILE__, 'vnm_core_files_cleanup_activate');

function vnm_core_files_cleanup_deactivate() {
	do_action('vnm_core_files_cleanup_deactivated');
}

register_deactivation_hook( __FILE__, 'vnm_core_files_cleanup_deactivate');

///
//	Run the core files cleanup upon plugin activation
///

add_action('vnm_core_files_cleanup_activated', 'vnm_core_files_cleanup_delete_files');

///
//	Hook into the upgrader_process_complete action to remove those pesky files
///

function vnm_core_files_cleanup($upgrader_object, $options) {
	//	Check if the update was for WordPress core

	if ($options['action'] == 'update' && $options['type'] == 'core') {
		vnm_core_files_cleanup_delete_files();
	}
}

add_action('upgrader_process_complete', 'vnm_core_files_cleanup', 10, 2);

///
//	Actually delete the files
///

function vnm_core_files_cleanup_delete_files() {
	//	List of files to delete after core update

	$files_to_delete = array('license.txt', 'readme.html', 'wp-config-sample.php');

	//	Get the WordPress root directory

	$wp_root = ABSPATH;

	//	Delete the specified files

	foreach ($files_to_delete as $file) {
		$file_path = $wp_root . $file;

		//	Check if the file actually exists before attempting to delete it

		if (file_exists($file_path)) {
			unlink($file_path);
		}
	}
}