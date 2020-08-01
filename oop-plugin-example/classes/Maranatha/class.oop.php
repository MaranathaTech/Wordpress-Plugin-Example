<?php

namespace Maranatha;


class Oop {
	

	var $initiated = false;

	public function __construct() {
		
		if(!$this->initiated){
			$this->init_hooks();
		}
		
	}


	//Initializes WordPress hooks here
	private function init_hooks() {
		
		$this->initiated = true;
		
		//remove default wordpress welcome panel
		remove_action( 'welcome_panel', 'wp_welcome_panel' );

		//add the custom welcome panel
		add_action( 'welcome_panel', array($this, 'welcome_panel') );


	}

	//custom welcome panel method
	public function welcome_panel() {
		
		echo'<div class="welcome-panel-content">'
			. '<h2>Your Custom Welcome Title</h2>'
			.'<p>Your Custom Text Here</p>'
			. '</div>';

	}


	//Add custom functionality when plugin is activated
	public static function plugin_activation() {
		
	}


	//Removes all cron jobs associated with plugin
	public static function plugin_deactivation( ) {

		// Remove any scheduled cron jobs.
		$oop_cron_events = array(
			'oop_scheduled_cron_name1',
			'oop_scheduled_cron_name2',			
		);
		
		foreach ( $oop_cron_events as $oop_cron_event ) {
			
			$timestamp = wp_next_scheduled( $oop_cron_event );
			
			if ( $timestamp ) {
				wp_unschedule_event( $timestamp, $oop_cron_event );
			}

		}

	}


}
