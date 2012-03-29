<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * BackendPro
 *
 * A website backend system for developers for PHP 4.3.2 or newer
 *
 * @package         BackendPro
 * @author          Adam Price
 * @copyright       Copyright (c) 2008
 * @license         http://www.gnu.org/licenses/lgpl.html
 * @link            http://www.kaydoo.co.uk/projects/backendpro
 * @filesource
 */

// ---------------------------------------------------------------------------

/**
 * Site_Controller
 *
 * Extends the default CI Controller class so I can declare special site controllers.
 * Also loads the BackendPro library since if this class is part of the BackendPro system
 *
 * @package         BackendPro
 * @subpackage      Controllers
 */
class MY_Controller extends CI_Controller
{
	private $_container;
	function __construct()
	{
		parent::__construct();

		// Load Base CodeIgniter files
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('status/status');

		// Load Base BackendPro files
		$this->load->config('backendpro');
		$this->load->config('kaimonokago');
		$this->lang->load('backendpro');
		$this->load->model('base_model');

		//Get Current Module, Controller or Method
		//$this->module = $this->router->fetch_module();
		//$this->controller = $this->router->fetch_class();
		// $this->method = $this->router->fetch_method();

		// Load site wide modules
        $this->load->library('status/status');
        $this->load->model('preferences/preference_model','preference');
		$this->load->library('site/bep_site');
		$this->load->library('site/bep_assets');
		$this->load->library('page/Page');

		$this->load->library('auth/userlib');

		// Loading kaimonokago model
        $this->load->model('kaimonokago/MKaimonokago');
		// Display page debug messages if needed
		if ($this->preference->item('page_debug'))
		{
			$this->output->enable_profiler(TRUE);
		}

		// Set site meta tags
		//$this->bep_site->set_metatag('name','content',TRUE/FALSE);
		$this->output->set_header('Content-Type: text/html; charset='.config_item('charset'));
		$this->bep_site->set_metatag('content-type','text/html; charset='.config_item('charset'),TRUE);
		$this->bep_site->set_metatag('robots','all');
		$this->bep_site->set_metatag('pragma','cache',TRUE);

		// Load the SITE asset group
		$this->bep_assets->load_asset_group('SITE');
		$this->load->helper('gravatar');// needs to load here since using in members.php

		log_message('debug','BackendPro : Site_Controller class loaded');
	}
}

//include_once("Admin_controller.php");
//include_once("Public_controller.php");

/* End of file MY_Controller.php */
/* Location: ./system/application/libraries/MY_Controller.php */