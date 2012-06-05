<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*  application/modules/slideshow/controllers/admin.php  */
class Admin extends Shop_Admin_Controller 
{

    private $module;

    function __construct()
    {
        parent::__construct();
        // Check for access permission
        check('Slideshow');
        // load the MSlideshow model
        //$this->load->model('MSlideshow');
        $this->module=basename(dirname(dirname(__FILE__)));
        //$this->module='slideshow';
        // Set breadcrumb
        $this->bep_site->set_crumb($this->lang->line('backendpro_slideshow'),$this->module.'/admin');
    }
  
  	
    function index()
    {
        $data = $this->common_home();
        $data['page'] = $this->config->item('backendpro_template_admin') . "admin_slideshow_home";
        $this->load->view($this->_container,$data);
    }



    function _feild()
    {
        $str =$this->input->post('image');
        $m = array();
        
        if(preg_match('#"(.*?)"#',$str,$matches)) 
        {
            $path = $matches[1]; // extract the entire path.
            $name =  basename ($path); // extract file name from path.
        }

        $data = array(
            'name'          => $name,
            'shortdesc'     => db_clean($_POST['shortdesc']),
            'longdesc'      => db_clean($_POST['longdesc'],5000),
            'status'        => db_clean($_POST['status'],8),
            'slide_order'   => db_clean($_POST['slide_order']),
            'thumbnail'     => db_clean($_POST['thumbnail']),
            'image'         => db_clean($_POST['image']),
            'readmorelink'  => $this->input->post('readmorelink'),
        );
        return $data;
    }


    function common_home()
    {
        // Setting variables
        $data['title'] = "Manage Slideshow";
        $data['slideshow'] = $this->MKaimonokago->getAllSimple($this->module);
        //$data['slideshow'] = $this->MSlideshow->getAllslideshow();
        $field = 'name';
        $orderby = 'slide_order';
        $images = $this->MKaimonokago->getAllbyField($this->module, $field,$orderby);
        $data['test']= $images;    
        $data['header'] = $this->lang->line('backendpro_access_control');
        $data['module'] = $this->module;
        return $data;
    }


    /*
    * ajax functions
    */
    function Ajaxgetupdate()
    {
        $data = $this->common_home();
        $this->load->view('admin/admin_home_cont',$data);
    }



    function create()
    {
        // we are using TinyMCE in this page, so load it
        $this->bep_assets->load_asset_group('TINYMCE');
        if ($this->input->post('image'))
        {
            // fields are filled up so do the followings
            $data = $this->_feild();
            $this->MKaimonokago->addItem($this->module,$data);
            flashMsg('success','slideshow created');
            redirect($this->module.'/admin/index','refresh');
        }
        else
        {
            // this must be the first time, so set variables
            $data['title'] = "Create slideshow";
            $lang_id = '0';
            // Set breadcrumb
            $this->bep_site->set_crumb($this->lang->line('kago_create'),$this->module.'/admin/create');
            $data['header'] = $this->lang->line('backendpro_access_control');
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_slideshow_create";
            $data['cancel_link']= $this->module."/admin/index/";
            $data['module'] = $this->module;
            $this->load->view($this->_container,$data);
        }
}


    function edit($id=0)
    {
        // we are using TinyMCE in edit as well
        $this->bep_assets->load_asset_group('TINYMCE');
        if ($this->input->post('image'))
        {
            // fields filled up so,
            $data = $this->_feild();
            $this->MKaimonokago->updateItem($this->module,$data);
            flashMsg('success','slideshow updated');
            redirect($this->module.'/admin/index','refresh');
        }
        else
        {
            // similar to category
            //$id = $this->uri->segment(4);
            $data['title'] = $this->lang->line('kago_edit')." ".$this->lang->line('kago_slideshow');
            $data['module']=$this->module;
            $data['page'] = $this->config->item('backendpro_template_admin') . "admin_slideshow_edit";
            $slide = $this->MKaimonokago->getInfo($this->module, $id);
            //$slide = $this->MSlideshow->getslideshow($id);
            $data['slide'] = $slide;
            if (!count($data['slide']))
            {
                redirect($this->module.'/admin/index','refresh');
            }
            // 	Set breadcrumb
            $this->bep_site->set_crumb($this->lang->line('kago_edit'),$this->module.'/admin/edit');
            $data['header'] = $this->lang->line('backendpro_access_control');
            $data['cancel_link']= $this->module."/admin/index/";
            $data['module'] = $this->module;
            $this->load->view($this->_container,$data);
        }
    }
    

    
    function updatecu3erxml()
    {
        $this->load->helper('file');
        $filename= "assets/cu3er/config.xml";
        $data = $this->createxml();
        if ( ! write_file($filename, $data))
        {
             flashMsg('warning','Unable to write the file');
             redirect($this->module.'/admin/index','refresh');
        }
        else
        {
             flashMsg('success','File updated');
             redirect($this->module.'/admin/index','refresh');
        }   
    }



    function createxml()
    {
        $fields = 'name';
        $orderby = 'slide_order';
        $where = "status";
        $what = "active";
        //getAll($module,$fields,$orderby,$lang_id=NULL,$where=NULL,$what=NULL)
        $images = $this->MKaimonokago->getAll($this->module,$fields,$orderby,'',$where,$what);
        //$images = $images['name'];
        //sort($images);// sort alphabetically
        $str = <<<EOD
<?xml version="1.0" encoding="utf-8" ?>
    <cu3er>
	<settings>
            <auto_play>
                <defaults time="2" symbol="circular"/>
                <tweenIn x="395" y="45" width="30" height="30" tint="0xFFFFFF" alpha="0.5"/>
                <tweenOver alpha="1"/>
            </auto_play>
            
            <prev_button>
                <defaults round_corners="5,5,5,5"/>
                <tweenOver time="2" tint="0xFFFFFF" scaleX="1.1" scaleY="1.1"/>
                <tweenOut tint="0x000000" />
            </prev_button>

            <prev_symbol>
                <tweenOver tint="0x000000" />
            </prev_symbol>

            <next_button>
                <defaults round_corners="5,5,5,5"/>
                <tweenOver tint="0xFFFFFF"  scaleX="1.1" scaleY="1.1"/>
                <tweenOut tint="0x000000" />
            </next_button>

            <next_symbol>
                <tweenOver tint="0x000000" />
            </next_symbol>

	</settings>

	<slides>
EOD;
        $transitions = array(
            '<transition num="5" slicing="vertical" direction="down"/>',
            '<transition num="4" direction="right" shader="flat" />',
            '<transition num="5" slicing="horizontal" direction="left" delay="0.05"/>',
            '<transition num="6" slicing="vertical" direction="up" shader="flat" delay="0.05" z_multiplier="4" />',
            '<transition num="4" direction="left" shader="flat" />'
        );
        foreach($images as $id => $image){
           $str .= "\n<slide><url>assets/images/frontpage/".$image['name']."</url></slide>\n";
            $rand_keys= array_rand($transitions, 1);
            $str .= $transitions[$rand_keys];
        }
$str .= <<<EOD
        
    </slides>
</cu3er>

EOD;

return $str;

    }



}


?>