<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//application/modules/subscribers/controllers/admin.php

class Admin extends Shop_Admin_Controller 
{

    private $module;

    function __construct()
    {
        parent::__construct();
        // Check for access permission
        check('Subscribers');
        // load model subscribers
        $this->load->model('MSubscribers');
        $this->load->helper('date');
        $this->load->helper('file');
        $this->module='subscribers';
        $this->lang->load('subscribers', 'english');
        // Set breadcrumb
        $this->bep_site->set_crumb($this->lang->line('backendpro_subscribers'),'subscribers/admin');
        // Loading Bep validation
        // $this->load->library('validation');
    }
  

    function index()
    {
        $data['title'] = "Manage Subscribers";
        $data['subscribers'] = $this->MSubscribers->getAllSubscribers();
        $data['header'] = $this->lang->line('backendpro_access_control');
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_subs_home";
        $data['module'] = $this->module;
        $this->load->view($this->_container,$data);
    }

  

    function _emailfields()
    {
        $data = array(
        'subject'      => $this->input->post('subject'),
        'msg' =>  $this->input->post('message'),
        'sendto' =>   implode(',', $this->input->post('sendto')),
        );
        // $this->MKaimonokago->addItem($this->module, $data);
        return $data;
    }

/*
    function createemail(){
        //$this->bep_assets->load_asset_group('TINYMCE');
        $data['title'] = "Send Email";
        $data['subscribers'] = $this->MSubscribers->getAllSubscribers();
        // Set breadcrumb
        $this->bep_site->set_crumb($this->lang->line('kago_sendemail'),'subscribers/admin/sendemail');
        $data['header'] = $this->lang->line('backendpro_access_control');
        $data['cancel_link']= $this->module."/admin/index/";
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_subs_mail";
        $data['module'] = $this->module;
        $this->load->view($this->_container,$data); 
    }
*/



    function sendemail()
    {
        $this->bep_assets->load_asset_group('TINYMCE');
        $this->load->library('email');	 
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        //$test = $this->input->post('test');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $test_email = $this->input->post('test_email');
        $company=$this->preference->item('site_name');
        //$data['test_email']=$test_email;
        $automated_from_email=$this->preference->item('automated_from_email');
        //$this->form_validation->set_rules('email', 'Email', 'required');     
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            //flashMsg('error','Please try it again.');
            //redirect($this->module.'/admin/index','refresh');
            $data['title'] = "Send Email";
            $data['subscribers'] = $this->MSubscribers->getAllSubscribers();
            // Set breadcrumb
            $this->bep_site->set_crumb($this->lang->line('kago_email_home'),'subscribers/admin/email_home');
            $this->bep_site->set_crumb($this->lang->line('kago_sendemail'),'subscribers/admin/sendemail');
            $data['header'] = $this->lang->line('backendpro_access_control');
            $data['cancel_link']= $this->module."/admin/index/";
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_subs_mail";
            $data['module'] = $this->module;
            $this->load->view($this->_container,$data);
        }
        else
        {
            if ($test_email)
            {
                $config['mailtype'] = 'html';
                $this->email->initialize($config); 
                //$this->email->clear();
                $this->email->from($automated_from_email, $company);
                // Replace with your other email for testing
                // get it from preference
                $this->email->to($test_email);
                $this->email->subject($subject);
                //$this->email->message($message);
                // you need to change this link to your unsubscribe link
                $data['unsub'] = "<p><a href='". site_url()."/welcome/unsubscribe/'>Unsubscribe</a></p>";
                $data['subject']=$subject;
                $data['message']=$message;
                //$this->email->message($msg . $unsub);
                // get default template
                $default_temp=$this->MSubscribers->find_default_temp();
                $defaultview="templates/".$default_temp['name']."/index";
                $content= $this->load->view($defaultview, $data, TRUE); 
                $this->email->message($content);
                $this->email->send();
                // refilling each field 
                //$data['subject']=$subject;
                //$data['msg']=$msg;
                //$data['test_email']=$test_email;
                //$this->session->set_flashdata('message', "Test email sent");
                //write_file('/tmp/email.log', $subject ."|||".$msg);
                // redirect wherever you want, it can be index page
                flashMsg('success','Test email has been sent.');
                //redirect('subscribers/admin/sendemail');
                $data['title'] = "Send Email";
                $data['subscribers'] = $this->MSubscribers->getAllSubscribers();
                // Set breadcrumb
                $this->bep_site->set_crumb($this->lang->line('kago_email_home'),'subscribers/admin/email_home');
                $this->bep_site->set_crumb($this->lang->line('kago_sendemail'),'subscribers/admin/sendemail');
                $data['header'] = $this->lang->line('backendpro_access_control');
                $data['cancel_link']= $this->module."/admin/index/";
                $data['page'] = $this->config->item('backendpro_template_admin') . "admin_subs_mail";
                $data['module'] = $this->module;
                $this->load->view($this->_container,$data);
            }            
             elseif($this->input->post('sendto'))
            {
                //$subs = $this->MSubscribers->getAllSubscribers();
                $subs=$this->input->post('sendto');
                // subs is an array
                foreach ($subs as $list)
                {
                    $config['mailtype'] = 'html';
                    $this->email->initialize($config);  
                    //get id and email for each $list
                    $pieces = explode("_", $list);
                    $id=$pieces[0]; 
                    $email= $pieces[1]; 
                    $this->email->clear();
                    // Replace with your email and company name
                    $this->email->from($automated_from_email, $company);
                    $this->email->to($email);
                    // Replace with your other email for checking or blank
                    //$this->email->bcc('otheremail@gmail.com');
                    $this->email->subject($subject);
                    // you need to change this link to your unsubscribe link
                    $data['unsub'] = "<p><a href='". site_url()."/welcome/unsubscribe/".$id. "'>Unsubscribe</a></p>";
                    $data['subject']=$subject;
                    $data['message']=$message;
                    //$this->email->message($msg . $unsub);
                    // get default template
                    $default_temp=$this->MSubscribers->find_default_temp();
                    $defaultview="templates/".$default_temp['name']."/index";
                    $content= $this->load->view($defaultview, $data, TRUE); 
                    $this->email->message($content);
                    $this->email->send();       
                }
                // record email to database
                $table='email';
                $data = $this-> _emailfields();
                $this->MKaimonokago->addItem($table,$data,$return_id=FALSE);
                // You can use Bep's flashMsg('type','message')
                flashMsg('success',"Email has been sent.");
                //$this->session->set_flashdata('message', count($subs) . " emails sent");
                redirect('subscribers/admin/sendemail','refresh');
            }
            else
            {
                $data['title'] = "Send Email";
                $data['subscribers'] = $this->MSubscribers->getAllSubscribers();
                // Set breadcrumb
                $this->bep_site->set_crumb($this->lang->line('kago_email_home'),'subscribers/admin/email_home');
                $this->bep_site->set_crumb($this->lang->line('kago_sendemail'),'subscribers/admin/sendemail');
                $data['header'] = $this->lang->line('backendpro_access_control');
                $data['cancel_link']= $this->module."/admin/index/";
                $data['page'] = $this->config->item('backendpro_template_admin') . "admin_subs_mail";
                $data['module'] = $this->module;
                $this->load->view($this->_container,$data); 
            }
        }
    }


	/*
    * create a new subscriber
    *
    */
	function create_sub_home()
    {
		$data['title'] = "Create Subscribers";
		// Set breadcrumb
		$this->bep_site->set_crumb($this->lang->line('kago_create_subscriber'),'subscribers/admin/create_home');
		$data['header'] = $this->lang->line('backendpro_access_control');
		$data['page'] = $this->config->item('backendpro_template_admin') . "admin_subs_create";
        $data['cancel_link']= $this->module."/admin/index/";
		$data['module'] = $this->module;
		$this->load->view($this->_container,$data);	
	}
	



    function create_sub()
    {
		$rules['name'] = 'trim|required';
		$rules['email'] = 'trim|required|valid_email';
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE)
		{
			$this->form_validation->output_errors();
			redirect('subscribers/admin/');
		}
		else
		{
            $this->MSubscribers->createSubscriber();
            flashMsg('success',$this->lang->line('userlib_sub_added'));
            redirect('subscribers/admin/','refresh');
		}
    }

    /*
    * Email home
    *
    *
    */

    function email_home()
    {
        $data['title'] = "Email Home";
        $table="email";
        $data['emails'] = $this->MKaimonokago->getAllSimple($table);
        // Set breadcrumb
        $this->bep_site->set_crumb($this->lang->line('kago_email_home'),'subscribers/admin/email_home');
        $data['header'] = $this->lang->line('backendpro_access_control');
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_email_home";
        $data['cancel_link']= $this->module."/admin/index/";
        $data['module'] = $this->module;
        $this->load->view($this->_container,$data); 
    }


    function email_details()
    {
        $id=$this->uri->segment(4);
        $data['title'] = "Email Details";
        $table="email";
        $data['emaildetails'] = $this->MKaimonokago->getInfo($table, $id);
        // Set breadcrumb
        $this->bep_site->set_crumb($this->lang->line('kago_email_home'),'subscribers/admin/email_home');
        $this->bep_site->set_crumb($this->lang->line('subscribers_email_details'),'subscribers/admin/email_details');
        $data['header'] = $this->lang->line('backendpro_access_control');
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_email_details";
        $data['cancel_link']= $this->module."/admin/index/";
        $data['module'] = $this->module;
        $this->load->view($this->_container,$data); 
    }



    function template_home()
    {
        $data['title'] = "Template Home";
        $table="emailtemplate";
        $data['templates'] = $this->MKaimonokago->getAllSimple($table);
        $temppath="application/modules/subscribers/views/templates/";
        $data['dir_info']=get_dir_file_info($temppath);
        // Set breadcrumb
        $this->bep_site->set_crumb($this->lang->line('kago_email_home'),'subscribers/admin/email_home');
        $this->bep_site->set_crumb($this->lang->line('kago_template_home'),'subscribers/admin/template_home');
        $data['header'] = $this->lang->line('backendpro_access_control');
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_template_home";
        $data['cancel_link']= $this->module."/admin/index/";
        $data['module'] = $this->module;
        $this->load->view($this->_container,$data); 
    }
	



    function addtemplate()
    {
        $temp = $this->uri->segment(4);
        if ($temp)
        {
            $table="emailtemplate";
            $data = array(
            'name'          => $temp,
            'default'      => '0',
            );
            $this->MKaimonokago->addItem($table,$data);
            flashMsg('success',$this->lang->line('kago_temp_added'));
            redirect('subscribers/admin/template_home','refresh');
        }
        else
        {
            flashMsg('error',$this->lang->line('kago_temp_added'));
            redirect('subscribers/admin/template_home','refresh');
        }
        
    }



    function tempdefault()
    {
        $tempid = $this->uri->segment(4);
        if ($tempid)
        {
            $table="emailtemplate";
            // find default temp id
            $default_temp=$this->MSubscribers->find_default_temp();
            $data['default_temp']=$default_temp;
            // change defaul to 0
            $this->MSubscribers->delete_default($default_temp['id']);
            // update new temp default
            
            $this->MSubscribers->updateItem($table,$tempid);
            flashMsg('success',$this->lang->line('kago_temp_default_changed'));
            redirect('subscribers/admin/template_home','refresh');
           
            /*
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_template_home";
            
            $data['module'] = $this->module;
            $this->load->view($this->_container,$data); 
             */
        }
        else
        {
            flashMsg('error',$this->lang->line('kago_temp_added'));
            redirect('subscribers/admin/template_home','refresh');
        }

    }
	
}//end class
?>