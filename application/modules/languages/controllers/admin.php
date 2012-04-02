<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* modules/languages/controllers/admin.php */

class Admin extends Shop_Admin_Controller 
{
    private $module;


    function __construct()
    {
        parent::__construct();
       	// Check for access permission
    	check('Multi languages');
       	// load modules/languages/model/mlangs
       	//$this->load->model('languages/MLangs');
        // Load needed files
        //$this->lang->load('multi');
        $this->module=basename(dirname(dirname(__FILE__)));
       	$this->load->model('menus/MMenus');
        //$this->config->load('kaimonokago/field');
    	// Set breadcrumb
    	$this->bep_site->set_crumb($this->lang->line('kago_languages'),$this->module.'/admin');
    }



    function index()
    {
        if ($this->input->post('langname'))
        {
            // check if the same language does not exist.
            $langname = $this->input->post('langname');
            // check if there is the same in omc_languages
            $check_lang = $this->MLangs->check_lang($langname);
            //var_dump($check_course);
            if($check_lang==TRUE)
            {
                // there is the same language name, warn it
                flashMsg('warning',"You can't add the same language");
            }
            else
            {
                // everything ok so insert
                $data = $this->_fields();
                $return_id=TRUE;
                $returned_id=$this->MKaimonokago->addItem($this->module,$data, $return_id);

                // also add to menu and lilly_fairies_menus
                $menufields = $this->_menufields();
                
                // add to menu db
                $this->MKaimonokago->addItem('menus', $menufields);
                // add to lilly_fairies_menus
                $this->MKaimonokago->addItem('lilly_fairies_menus', $menufields);
                //$this->MLangs->addnewlang();
                //$this->session->set_flashdata('message','Course Created');
                flashMsg('success',$this->lang->line('kago_language_added')."returned_id is: $returned_id");
            }
            redirect($this->module.'/admin/index/','refresh');
        }
        else
        {
            $data = $this->common_home();
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_lang_home";
            $this->load->view($this->_container,$data);
        }
    }



    function _fields()
    {
        $data = array (
            'langname'      =>  strtolower(db_clean($_POST['langname'])),
            'status'        =>  db_clean($_POST['status']),
        );
        return $data;
    }



    function common_home()
    {
        // there is no input, so let's display
            $data['title'] = "Manage Languages";
            // lagnage in session
            $session_lang = $this->session->userdata('lang');
            if ($session_lang)
            {
                $data['lang'] = $session_lang;
            }
            else
                {// if there is no lang in session then it must be english
                $data['lang'] = 'english';
            }
            // get all languages to display
            $langs = $this->MLangs->getalllang();
            if($langs)
            {
                $data['langs'] = $langs;
            }
            else
            {
                $data['langs'] = 'No other languages';
            }
           /* $tree = array();
            $parentid = 0;
            $this->MMenus->generateallTree($tree,$parentid);
            $data['navlist'] = $tree;
            * 
            */
            $data['header'] = $this->lang->line('backendpro_access_control');
            $data['module'] = $this->module;
            return $data;
    }



    function _menufields()
    {
        $menufields=array(
                            'name'          => $this->input->post('langname'),
                            //'shortdesc'     => $this->input->post('shortdesc'),
                            'status'        => 'active',
                            'parentid'      => '0',
                            //'order'         => $this->input->post('order'),
                            'page_uri_id'   => '0',
                            'lang_id'       => $returned_id,
                            'menu_id'       => '1'// this case id of English is 1
                    );
        return $menufields;
    }



    function edit()
    {
        if ($this->input->post('langname'))
        {
            $data = $this->_fields();
            $this->MKaimonokago->updateItem($this->module,$data);
            flashMsg('success',$this->lang->line('kago_updated'));
            redirect($this->module.'/admin/index','refresh');
        }
        else
        {
            $id = $this->uri->segment(4);
            $data['title'] = $this->lang->line('kago_edit');
            $data['info']= $this->MKaimonokago->getInfo($this->module, $id);
            $data['header'] = $this->lang->line('backendpro_access_control');
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_edit";
            $data['module'] = $this->module;
            $this->load->view($this->_container,$data);
        }
    }



    /*
    * this is used for ajax function
    */

    function Ajaxgetupdate()
    {
        $data = $this->common_home();
        $this->load->view('admin/admin_home_cont',$data);
    }




}//end class
/* Location: ./modules/languages/controllers/admin.php */
?>