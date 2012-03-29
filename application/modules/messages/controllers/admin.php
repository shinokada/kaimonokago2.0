<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Shop_Admin_Controller 
{
	
	private $module;

	function __construct()
	{
		parent::__construct();
	   	// Check for access permission
		check('Messages');
		// Load model MMessages
		$this->load->model('MMessages');
		$this->module=basename(dirname(dirname(__FILE__)));
		// Set breadcrumb
		$this->bep_site->set_crumb($this->lang->line('backendpro_messages'),$this->module.'/admin');	
    }



	function index()
	{
	  	$data['title'] = "Manage Messages";
		$data['user_id'] =$this->session->userdata('id');
		$data['username'] =$this->session->userdata('username');
		//$data['todos'] = $this->MMessages->getToDoMessages();
		//$data['completed'] = $this->MMessages->getCompletedMessages();
		$data['header'] = $this->lang->line('backendpro_access_control');
		$data['page'] = $this->config->item('backendpro_template_admin') . "admin_messages_home";
		$data['module'] = $this->module;
		$this->load->view($this->_container,$data);
  	}


		
	function getCompletedBox()
	{  	
  		$messages = $this->MMessages->getCompletedMessages();
		//flashMsg('success','Status changed');
		//redirect ($this->module.'/admin/'); 		
	}


		
	// Instead of using AjaxinserShoutBox we use IS_AJAX here	
	function insertShoutBox()
	{
		$this->MMessages->updateMessage();
	}


		
	function changestatus()
	{
		$id=$this->uri->segment(4);
		if($id)
		{
			$this->MMessages->changeMessageStatus($id);
			//return TRUE;
			//$this->getCompletedBox();
			//flashMsg('success','Status changed');
			//redirect ($this->module.'/admin/','refresh');
		}
			//flashMsg('warning','Status not changed');
			//redirect($this->module.'/admin/','refresh');		
	}
	 

	 
	function delete($id)
	{
		if($id)
		{	
			$this->MMessages->delete($id);
		}
	}


	  
	function AjaxinsertShoutBox()
	{
		$this->MMessages->updateMessage();
	}
	  


	function AjaxgetShoutBox()
	{
		$data['todos'] = $this->MMessages->getToDoMessages();
		$data['module'] = $this->module;
		$this->load->view('admin/shoutbox',$data);
	}
		


	function AjaxgetCompletedBox()
	{  	
		$data['completed'] = $this->MMessages->getCompletedMessages();
		$data['module'] = $this->module;
		$this->load->view('admin/completedbox',$data);
	}		
}