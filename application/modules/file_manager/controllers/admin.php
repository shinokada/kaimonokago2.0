<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Shop_Admin_Controller 
{

  function __construct()
    {
        parent::__construct();
   	// Check for access permission
	check('Filemanager');
	
    }
  

  function index()
  {
		redirect(base_url().'assets/js/plugins/ajaxfilemanager/ajaxfilemanager.php');
  }
  

	
}//end class
?>