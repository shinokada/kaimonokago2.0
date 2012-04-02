<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Shop_Admin_Controller 
{

    private $moudle;


    function __construct()
    {
        parent::__construct();
        // Check for access permission
        check('Customers');
        // load MCustomers model
        $this->load->model('MCustomers');
        $this->module=basename(dirname(dirname(__FILE__)));
        // Set breadcrumb
        $this->bep_site->set_crumb($this->lang->line('backendpro_customers'),$this->module.'/admin');	
    }
  

    function index()
    {
        $data['title'] = "Manage customer";
        $data['customers'] = $this->MKaimonokago->getAllSimple($this->module);
        //$data['customers'] = $this->MCustomers->getAllCustomers();
        $data['header'] = $this->lang->line('backendpro_access_control');
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_customers_home";
        $data['module'] = $this->module;
        $this->load->view($this->_container,$data);
    }
  


    function _fields()
    {
        $data = array(
            'customer_first_name'   => $this->input->post('customer_first_name'),
            'customer_last_name'    => $this->input->post('customer_last_name'),
            'phone_number'          => $this->input->post('phone_number'),
            'email'                 => $this->input->post('email'),
            'address'               => $this->input->post('address'),
            'city'                  => $this->input->post('city'),
            'post_code'             => $this->input->post('post_code'),
            'password'              => do_hash($this->input->post('password'))
            );
        return $data;
    }



    function create()
    {
        if ($this->input->post('customer_first_name'))
        {
            $config[] = array(
                                    'field'=>'customer_first_name',
                                    'label'=>$this->lang->line('webshop_first_name'),
                                    'rules'=>"trim|required"
                                    );
                    $config[] = array(
                                    'field'=>'email',
                                    'label'=>$this->lang->line('userlib_email'),
                                    'rules'=>"trim|required|valid_email|callback_spare_edit_email"
                                    );
                    $config[] = array(
                                    'field'=>'password',
                                    'label'=>$this->lang->line('userlib_password'),
                                    'rules'=>"trim|required|min_length[".$this->preference->item('min_password_length')."]"
                                    );
            //$rules['customer_first_name'] = 'required';
            //$rules['password'] = 'required';
            //$rules['email'] = 'required|valid_email';
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE)
            {
                $this->form_validation->output_errors();
                //redirect($this->module.'/admin/create');
                $data['title'] = "Create Customer";
                // Set breadcrumb
                $this->bep_site->set_crumb($this->lang->line('kago_create')." ".$this->lang->line('kago_customer'),$this->module.'/admin/create');
                $data['header'] = $this->lang->line('backendpro_access_control');
                $data['page'] = $this->config->item('backendpro_template_admin') . "admin_customers_create";
                $data['cancel_link']= $this->module."/admin/index/";
                $data['module'] = $this->module;
                $this->load->view($this->_container,$data);
            }
            else
            {
                $data = $this->_fields();
                $this->MKaimonokago->addItem($this->module, $data);
                //$this->MCustomers->addCustomer();
                flashMsg('success','Customer created');
                redirect($this->module.'/admin/index','refresh');
            }
        }else{
            $data['title'] = "Create Customer";
            // Set breadcrumb
            $this->bep_site->set_crumb($this->lang->line('kago_create')." ".$this->lang->line('kago_customer'),$this->module.'/admin/create');
            $data['header'] = $this->lang->line('backendpro_access_control');
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_customers_create";
            $data['cancel_link']= $this->module."/admin/index/";
            $data['module'] = $this->module;
            $this->load->view($this->_container,$data);
        }
    }
  
  

    function edit($id=0)
    {
        if ($this->input->post('customer_first_name'))
        {
            $rules['customer_first_name'] = 'required';
            //$rules['passconf'] =  'required';
            $rules['email'] = 'required|valid_email';
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE)
            {
                $this->form_validation->output_errors();
                $customer_id = $this->input->post('customer_id');
                redirect($this->module.'/admin/edit/'.$customer_id,'refresh');
            }
            else
            {
                $data = $this->_fields();
                $this->MKaimonokago->updateItem($this->module, $data);
                //$this->MCustomers->updateCustomer();
                flashMsg('success','Customer editted');
                redirect($this->module.'/admin/index','refresh');
            }
        }
        else
        {
            $data['title'] = "Edit Customer";
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_customers_edit";
            $data['customer'] = $this->MKaimonokago->getInfo($this->module,$id);
            //$data['customer'] = $this->MCustomers->getCustomer($id);
            if (!count($data['customer']))
            {
                redirect($this->module.'/customer/index','refresh');
            }
            $data['header'] = $this->lang->line('backendpro_access_control');
            // Set breadcrumb
            $this->bep_site->set_crumb($this->lang->line('kago_edit')." ".$this->lang->line('kago_customer'),$this->module.'/admin/edit');
            $data['cancel_link']= $this->module."/admin/index/";
            $data['module'] = $this->module;
            $this->load->view($this->_container,$data);
        }
    }
  
  

    function delete($id)
    {
        /**
         * When you delete customer, it will affect on omc_order table and it will affect omc_order_table_items
         * Check if the customer has orders, if yes, then go back with warning to delete the order first.
         *
         */
        $order_orphans = $this->MCustomers->checkOrphans($id);
        if (count($order_orphans))
        {
            // $this->session->set_userdata($order_orphans);
            flashMsg('warning','Customer can\'t be deleted');
            flashMsg('warning',$order_orphans);
            redirect('orders/admin/index/','refresh');
        }
        else
        {
            $table = 'omc_'.$this->module;
            $this->MKaimonokago->deleteitem($table,$id);
            //$this->MCustomers->deleteCustomer($id);
            flashMsg('success','Customer deleted');
            redirect($this->module.'/admin/index','refresh');
        }
    }
}


?>