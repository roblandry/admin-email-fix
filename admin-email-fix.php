<?php
/*
Plugin Name: Admin Email Fix
Plugin URI: http://www.landry.me/extend/plugins/admin-email-fix/
Description: This plugin fixes the wordpress@domain.com emails and sets it to the Admin email found under General > Settings.
Version: 1.0
Author: Rob Landry
Author URI: http://www.landry.me/author/rob/
Author Email: rob@landry.me
License:

  Copyright 2012 Rob Landry (rob@landry.me)

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

class AdminEmailFix {
	 
	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/
	
	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {
	
	
	    /*
	     * TODO:
	     * Define the custom functionality for your plugin. The first parameter of the
	     * add_action/add_filter calls are the hooks into which your code should fire.
	     *
	     * The second parameter is the function name located within this class. See the stubs
	     * later in the file.
	     *
	     * For more information: 
	     * http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters
	     */
	    add_filter( 'wp_mail_from', array( $this, 'admin_email_fix_from' ) );
	    add_filter( 'wp_mail_from_name', array( $this, 'admin_email_fix_from_name' ) );

	} // end constructor
	
	
	/*--------------------------------------------*
	 * Core Functions
	 *---------------------------------------------*/
	
	/**
 	 * Note:  Actions are points in the execution of a page or process
	 *        lifecycle that WordPress fires.
	 *
	 *		  WordPress Actions: http://codex.wordpress.org/Plugin_API#Actions
	 *		  Action Reference:  http://codex.wordpress.org/Plugin_API/Action_Reference
	 *
	 */
	function admin_email_fix_from() {
           $from_email = get_bloginfo('admin_email');
           return $from_email;
	} // end admin_email_fix_from
	
	/**
	 * Note:  Filters are points of execution in which WordPress modifies data
	 *        before saving it or sending it to the browser.
	 *
	 *		  WordPress Filters: http://codex.wordpress.org/Plugin_API#Filters
	 *		  Filter Reference:  http://codex.wordpress.org/Plugin_API/Filter_Reference
	 *
	 */
	function admin_email_fix_from_name() {
           $from_email = get_bloginfo('admin_email');
           list($from_email_name, $from_email_domain) = explode('@',$from_email);
           $from_email_name = ucfirst ( $from_email_name );
           return $from_email_name;
	} // end admin_email_fix_from_name
  
} // end class

new AdminEmailFix();
