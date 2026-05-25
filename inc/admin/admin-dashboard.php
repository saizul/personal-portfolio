<?php
/**
* The Foliohub_Admin_Dashboard base class
*/

if( !defined( 'ABSPATH' ) )
	exit; 

class Foliohub_Admin_Dashboard extends Foliohub_Admin_Page {
	protected $id = null;
	protected $page_title = null;
	protected $menu_title = null;
	public $position = null;
	public function __construct() {
		$this->id = 'pxlart';
		$this->page_title = foliohub()->get_name();
		$this->menu_title = foliohub()->get_name();
		$this->position = '50';

		parent::__construct();
	}

	public function display() {
		include_once( get_template_directory() . '/inc/admin/views/admin-dashboard.php' );
	}
	
	public function save() {

	}
}
new Foliohub_Admin_Dashboard;
