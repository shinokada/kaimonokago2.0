<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 *
 * @package         Codeingiter shopping cart v1.1
 * @author          Shin Okada
 * @copyright       Copyright (c) 2010
 * @license         http://www.gnu.org/licenses/lgpl.html
 * @link            http://www.okadadesign.no/blog
 * 
 */

// ---------------------------------------------------------------------------

/**
 * Shop_Controller
 *
 * Extends the Site_Controller class so I can declare special Shop controllers
 *
 * @package      
 * @subpackage     Controllers
 */
class Shop_Controller extends MY_Controller
{
    public $lang_id='';
    public $language='';
    public $mainmodule='';
    public $short_lang ='';
    public $site_lang = '';


    function __construct()
    {
        parent::__construct();

        // Loading config
        $this->load->config('kaimonokago');
       // Set container variable
        $this->_container = $this->config->item('backendpro_template_shop') . "container.php";

        // Set public meta tags
        //$this->bep_site->set_metatag('name','content',TRUE/FALSE);

        // Load the PUBLIC asset group in bep_assets.php
        $this->bep_assets->load_asset_group('SHOP');

        log_message('debug','BackendPro : Shop_Controller class loaded');

        // Loading language helper
        $this->load->helper('language');
        // $this->lang->load('webshop');

        // From CI shopping cart
        // Still using PHP session here.
        session_start();
        // loading Norwegian language files
        // $this->config->set_item('language', 'norwegian');
        // $this->lang->load('norwegian_general', 'norwegian');
        // Loading all the module models here instead of autoload.php
        $this->load->model('category/MCats');
        $this->load->model('menus/MMenus');
        $this->load->model('customer/MCustomers');
        $this->load->model('orders/MOrders');
        $this->load->model('pages/MPages');
        $this->load->model('products/MProducts');
        $this->load->model('subscribers/MSubscribers');
        $this->load->model('languages/MLangs');
        $this->load->model('slideshow/MSlideshow');

        // Loading libraries instead of autoload
        $this->load->library('form_validation');
        //$this->load->library('validation'); // for BEP 0.6

        // Loading helpers
        $this->load->helper( array('security', 'form', 'mytools') );
        $this->mainmodule = $this->preference->item('main_module_name');
        $this->data['mainmodule']= $this->mainmodule;

        // Total price will be displayed
        // handlekurv means shopping cart in Norwegian
        // sorry for this. I will use English in future.
        // It's too late and too much work to replace now.
        if(isset($_SESSION['totalprice']))
        {
            $this->data['handlekurv'] = $_SESSION['totalprice'];
        }
        else
        {
            $this->data['handlekurv'] =0;
        }
        // main nav
        // webshop config main_nav_parent_id
        $tree = array();
        // this will store value like english, norwegian etc. not an array
        //$this->language=$this->session->userdata('lang');
        $multilang = $this->preference->item('frontend_multi_language');// this will return 1 or 0
        // if preference is not set then use the $this->config->item('language'); from config.php
        $mylanguage = strtolower($this->preference->item('website_language'));// this will return norwegian etc
        if(!$mylanguage)
        {// this means it is not set in preference use config item
            $mylanguage = $this->config->item('language');// generally english
        }
        //Should we check if it exist in omc_languages?
        
        if(!$multilang)
        {// this means it is a single lang
            // use the $mylanguage as default
            $this->language=$mylanguage;
        }
        $this->data['multilang']=$multilang;
        $this->data['mylanguage']=$mylanguage;
        $sessionlang= $this->session->userdata('lang');
        //$this->data['sessionlang']= $sessionlang;
        if(empty($sessionlang))
        { // first load, it needs to set it as english
            $this->language='english';
        }
        else
        {// otherwise get it from session
            $this->language = $this->session->userdata('lang');
        }
 
        $this->data['language']=$this->language;
            // find lang id
        $this->site_lang = $this->MLangs->getId($this->language);
        $this->data['mylanguage1']=$this->site_lang;
             
        if(!$this->site_lang ==0)
        {
            $this->lang_id = $this->site_lang['id'];
            // find short_lang which is used in html lang="en" etc  
            $this->data['short_lang'] = $this->site_lang['short_lang'];
        }
        else
        {
            $this->lang_id = 0;
            // find short_lang which is used in html lang="en" etc  
            $this->data['short_lang'] = "en";
        }
        // load language depends on lang
        $this->load->language('welcome/webshop',$this->language);

        // This part is used in all the pages so load it here
        // For customer login status
        if(isset($_SESSION['customer_first_name']))
        {
            $this->data['customer_status']=1;
            $this->data['loginstatus']=lang('general_hello').$_SESSION['customer_first_name'].". ".lang('general_logged_in')."<br />
            <a href=\"index.php/".$this->data['mainmodule']."/logout \">Log out</a>";
        }
        else
        {
            $this->data['customer_status']=0;
            $this->data['loginstatus']="".$this->lang->line('general_not_logged_in')."<br /><a href=\"index.php/".$this->data['mainmodule']."/login \">".lang('general_login')."</a>
            <br /><a href=\"index.php/".$this->data['mainmodule']."/registration \">".lang('general_register')."</a>";
        }

        // $parentid is depends on lang_id
        // find parentid from menu.id where lang_id=$lang_id and where menu.parentid=0
        $menu_table="omc_menus";
        $parentid = $this->MMenus->getrootMenusByLang($this->lang_id,$menu_table); // this is for multi-lang
        //$parentid = $this->MMenus->getrootMenusByLang($this->lang_id);
        if($parentid)
        {
            $parentid = $parentid;
        }
        else
        {
            $parentid = 0;
        }
        $this->data['lang_id']=$this->lang_id;
        $this->MMenus->generateTreewithLang($tree,$parentid,$this->lang_id);
       // $this->MMenus->generateTree($tree,$parentid);
        $this->data['mainnav'] = $tree;

        // left category menu
        // webshop config categories_parent_id
        // it used to be like this $parentid=1;
        // need to find parentid by lang_id where lang_id is 0,1,2,3.. where cat_id is 1 or true
        $main_cat_id = $this->preference->item('categories_parent_id');
        $cat_parent = $this->MCats->getParentidbyLang($main_cat_id,$this->lang_id);
        $this->data['cat_parent']=$cat_parent;// delete me later
        if($cat_parent)
        {// in order to prevent an error after installtion
            $cat_parentid = array_keys($cat_parent);
            $cat_parentid = $cat_parentid[0];
        }
        else
        {
            $cat_parentid= $this->preference->item('categories_parent_id');
        }
       
        $this->data['parent']= $cat_parentid;
        //$parentid = $this->preference->item('categories_parent_id');
        //$this->data['navlist'] = $this->MCats->getCatNavbyLang($cat_parentid,$this->lang_id);
       // $this->data['navlisttest'] = $this->MCats->getCatNavbyLangtest($parentid,$this->lang_id);
        $mostsold= "most sold";
        //$mostsold = $this->MProducts ->getFeaturedProducts($mostsold);
        $mostsold = $this->MProducts ->getFeaturedProductsbyLang($mostsold,$this->lang_id);
        $this->data['mostsold']= $mostsold;

        $newproduct = "new product";
        $newproduct = $this->MProducts ->getFeaturedProducts($newproduct);
        $this->data['newproduct']= $newproduct;

        $order='order';
        $item="table_id";
        $this->data['navlist'] = $this->MCats->getCatItembyLang($cat_parentid,$order,$this->lang_id,$item);

        // load modules/languages/model/mlangs
        $this->load->model('languages/MLangs');
        // get all the languages
        $this->data['langs'] = $this->MLangs->getLangDropDown();
        // get the main module, this must be the same as $route['default_controller'] = "welcome"; in config/routes.php

    }
}

/* End of Shop_controller.php */
/* Location: ./system/application/libraries/Shop_controller.php */