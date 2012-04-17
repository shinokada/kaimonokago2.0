<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MSubscribers extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getSubscriber($id)
    {
        $this->db->where('id',id_clean($id));
        $this->db->limit(1);
        $Q = $this->db->get_where('omc_subscribers');
        if ($Q->num_rows() > 0)
        {
            $data = $Q->row_array();
        }
        $Q->free_result();    
        return $data;    
     }
	


    function getAllSubscribers()
    {
        $data = array();
        $Q = $this->db->get('omc_subscribers');
        if ($Q->num_rows() > 0)
        {
            foreach ($Q->result_array() as $row)
            {
                $data[] = $row;
            }
        }
        $Q->free_result();  
        return $data; 
    }
 
 

    function createSubscriber($name,$email)
    {
    	$this->db->where('email', $email);
    	$this->db->from('omc_subscribers');
    	$ct = $this->db->count_all_results();
    	if ($ct == 0)
        {
    		$data = array( 
    			'name' => $name,
    			'email' => $email,	
    		);
            $this->db->insert('omc_subscribers', $data);	 
     	}
    }
 
 

    function updateSubscriber()
    {
    	$data = array( 
    		'name' => db_clean($_POST['name']),
    		'email' => db_clean($_POST['email'])
    	);
     	$this->db->where('id', id_clean($_POST['id']));
    	$this->db->update('omc_subscribers', $data);	

    }




    function removeSubscriber($email)
    {
	   $this->db->delete('omc_subscribers', array('email' => $email)); 
    } 
 



    function checkSubscriber($email)
    {
        $numrow = 0;
        $this->db->select('id');
        $this->db->where('email',$email);
        $this->db->limit(1);
        $Q = $this->db->get('omc_subscribers');
        if ($Q->num_rows() > 0)
        {
            $numrow = TRUE; 
        }
        else
        {
            $numrow = FALSE;
        }		
        return $numrow;
    }



    function updateitem($module, $tempid)
    {
        $module_table = 'omc_'.$module;
        $this->db->where('id',$tempid);
        $data = array(
                'default'      => '1',
            );
        $this->db->update($module_table, $data);

    }


    function find_default_temp()
    {
        $data=array();
        $table="omc_emailtemplate";
        $this->db->where('default','1');
        $Q = $this->db->get($table);
        if ($Q->num_rows() > 0)
        {
            $data = $Q->row_array();
        }
        $Q->free_result();    
        return $data;  
    }


    function delete_default($defaultid)
    {
        $table="omc_emailtemplate";
        $this->db->where('id',$defaultid);
        $data = array(
                'default'      => '0',
            );
        $this->db->update($table, $data);
    }


    

    function getdefaultview()
    {
        
    }
        
 
}//end class
?>