<?php
/**
 * @package OOP Plugin Example
 */
/*
Plugin Name: OOP Plugin Example
Plugin URI: https://maranathatechnologies.com/
Description: This is just an example plugin that uses object oriented design.
Version: 1.0.0
Author: Maranatha Technologies
Author URI: https://maranathatechnologies.com/
License: GPLv2 or later
Text Domain: maranatha
*/
include 'vendor/autoload.php';

use Maranatha\Oop;

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

//set up constants
define( 'OOP_EXAMPLE_PLUGIN__VERSION', '1.0.0' );
define( 'OOP_EXAMPLE_PLUGIN__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

$oopInit = new Oop();
