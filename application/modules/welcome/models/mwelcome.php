<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * modules/welcome/models/mwelcome.php
 *
 */
class MWelcome extends Base_model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }



    function google_connect($me,$table)
    {
        $data = array();
        $options = array($me->id =>$id);
        $Q = $this->db->get_where($table,$options,1);
        if ($Q->num_rows() > 0)
        {
            $user = $Q->row_array();
        }
        
        if (empty($user)) {

            $data = array( 
                        'google_user_id'      => $me->id,
                        'google_email'        => $me->email,
                        'google_name'         => $me->name,
                        'google_picture'      => $me->picture,
                        'google_access_token' => $me->access_token),
                        'created'             => now(),
                        'modified'            => now(),
                        
                    );
            $this->db->insert($table, $data);
            $user_id = = $this->db->insert_id();
            $options = array("id" =>$user_id);
            $Q = $this->db->get_where($table,$options,1);
            if ($Q->num_rows() > 0)
            {
                $data = $Q->row_array();
            }
        }
        $Q->free_result();
        return $data;
    }

}
