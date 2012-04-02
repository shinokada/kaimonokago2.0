<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * New Twitter Widget for BackendPro
 *
 *
 * @author          Shin Okada
 * @copyright       Copyright (c) 2010
 * @license         http://www.gnu.org/licenses/lgpl.html
 * @link            http://www.okadadesign.no
 *
 */

// ---------------------------------------------------------------------------

/**
 * neworder_widget Class
 *
 * This class contains the code to create the statistic widget.
 */
class Twitter_widget
{
    function __construct()
    {
        
        $this->CI =& get_instance();
        // Load the dashboard library
       // $this->CI->load->module_library('dashboard','Analytics');
    }

    function create()
    {
    // Dashboard twitter
        $this->CI->bep_assets->load_asset_group('twitter');
        $data['twittername']=$this->CI->preference->item('twittername');
        $data['twittercount']=$this->CI->preference->item('twittercount');

        // Store the feed items
        //$data['twitter_items'] = $this->CI->simplepie->get_items(0, $this->CI->preference->item('dashboard_rss_count'));
      //  $data['rss_items'] = $this->CI->simplepie;

     return $this->CI->load->view('dashboard/'.$this->CI->config->item('backendpro_template_admin') . 'dashboard/twitter',$data,TRUE);  
    }
}

/* End of file Statistic_Widget.php */
/* Location: ./modules/dashboard/libraries/Statistic_Widget.php */