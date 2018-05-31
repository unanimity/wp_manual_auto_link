<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
	    
	    
	    
    $getMDoc=" DROP VIEW  `getMDoc`;";
    $clean_pagination="DROP PROCEDURE  `clean_pagination`;";
    $get_docs="DROP PROCEDURE  `get_docs`;";
    $get_post_docs="DROP VIEW  `get_post_doc`;";
    $insert_mistape="DROP PROCEDURE `insert_mistape`;";
    $get_post_0_lvl="DROP VIEW  `get_post_0_lvl`;";
    $get_post_n_lvl="DROP PROCEDURE  `get_post_n_lvl`;";
    $insert_link_to_article="DROP PROCEDURE  `insert_link_to_article`;";
    
    
    
    
    global $wpdb;
 
     $wpdb->get_results($getMDoc);
     $wpdb->get_results($clean_pagination);
     $wpdb->get_results($get_docs);
     $wpdb->get_results($get_post_docs);
     $wpdb->get_results($insert_mistape);
     $wpdb->get_results($get_post_0_lvl);
     $wpdb->get_results($get_post_n_lvl);
     $wpdb->get_results($insert_link_to_article);
	}

}
