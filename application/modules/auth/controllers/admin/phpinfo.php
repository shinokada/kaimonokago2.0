<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * application/modules/auth/controllers/admin/phpinfo.php 
 * Kaimonokago
 *
 * An open source development control panel written in PHP
 *
 * @package		Kaimonokago
 * @author		Shin Okada
 * @copyright	Copyright (c) 2012, Shin Okada
 * @license		http://www.gnu.org/licenses/lgpl.html
 * @link		http://www.kaydoo.co.uk/projects/backendpro
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Phpinfo Controller
 *
 * Display phpinfo
 *
 * @package         Kaimonokago
 * @subpackage      Controllers
 */
class Phpinfo extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();

		// Load needed files
		$this->lang->load('access_control');

		// Check for access permission
		check('Access Control');

		// Set breadcrumb
		$this->bep_site->set_crumb($this->lang->line('backendpro_access_control'),'auth/admin/access_control');

		log_message('debug','BackendPro : Access_control class loaded');
	}

	function index()
	{
		// Display Page
		$data['header'] = $this->lang->line('backendpro_access_control');
		$data['page'] = $this->config->item('backendpro_template_admin') . "access_control/phpinfo";
		$data['module'] = 'auth';
		$data['return_link'] = "admin/";
		$this->load->view($this->_phpinfocontainer,$data);
		//return;
	}
}

/* End of file access_control.php */
/* Location: application/modules/auth/controllers/admin/phpinfo.php  */