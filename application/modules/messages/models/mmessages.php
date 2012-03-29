<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MMessages extends CI_Model
{



    function __construct()
    {
        parent::__construct();
    }



    function updateMessage()
    {
        $data = array( 
            'message'=>$this->input->post('message'),
            'user_id'=>$this->input->post('user_id'), 
            'user'=>$this->input->post('user'),  
        );
        $this->db->insert('shoutbox', $data);
    }



    function getToDoMessages()
    {
        // $this->db->limit(10);
        $this->db->order_by("date", "desc");
        $this->db->where('status','to do');
        $Q = $this->db->get('shoutbox');
        if ($Q->num_rows() > 0)
        {
            foreach ($Q->result_array() as $row)
            {
                $data[] = $row;
            }
        }
        else
        {
            $data = "no to do messages";
        }
        $Q->free_result();  
        return $data; 
    }



    function getCompletedMessages()
    {
        $this->db->order_by("date", "desc");
        $this->db->where('status','completed');
        $Q = $this->db->get('shoutbox');
        if ($Q->num_rows() > 0)
        {
            foreach ($Q->result_array() as $row)
            {
                $data[] = $row;
                // $data[$row['id']] = $row;
            }
        }
        else
        {
            $data ="No completed tasks.";
        }
            $Q->free_result();  
            return $data; 
    }



    function delete($id)
    {
        $this->db->delete('shoutbox', array('id' => $id)); 
    }



    function changeMessageStatus($id)
    {
        $messageinfo = array();
        $messageinfo = $this->getMessage($id);
        $status = $messageinfo['status'];
        if($status =='to do')
        {
            $data = array('status' => 'completed');
            $this->db->where('id', $id);
            $this->db->update('shoutbox', $data);	
        }
        else
        {
            $data = array('status' => 'to do');
            $this->db->where('id', $id);
            $this->db->update('shoutbox', $data);	
        }	
    }



    function getMessage($id)
    {
        $data = array();
        $options = array('id' =>$id);
        $Q = $this->db->get_where('shoutbox',$options,1);
        if ($Q->num_rows() > 0)
        {
            $data = $Q->row_array();
        }
        $Q->free_result();    
        return $data;    
    }
}

