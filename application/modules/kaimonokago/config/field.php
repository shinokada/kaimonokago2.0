<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Store all the fields 
 *
 * @package 	Kaimonokago
 * @author      Shin Okada
 * @version     0.1
 * @copyright   2012
 * 
 */

// menus
$config['menufields'][] = array(
            'name'          => $this->input->post('name'),
            'shortdesc'     => $this->input->post('shortdesc'),
            'status'        => $this->input->post('status'),
            'parentid'      => $this->input->post('parentid'),
            'order'         => $this->input->post('order'),
            'page_uri_id'   => $this->input->post('page_uri_id'),
            'lang_id'       => $this->input->post('lang_id'),
            'menu_id'       => $this->input->post('menu_id')
        );


// for language menus
$config['menulangfields'][] = array(


		);