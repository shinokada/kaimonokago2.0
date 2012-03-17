<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MPages extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}


	function getPage($id, $table=NULL){
	    $data = array();
	    $this->db->where('id',id_clean($id));
	    $this->db->limit(1);
            if(!empty($table)){
                $Q = $this->db->get($table);
            }  else {
                $Q = $this->db->get('omc_pages');
            }
	    
	    if ($Q->num_rows() > 0){
	      	$data = $Q->row_array();
	    }
	    $Q->free_result();    
	    return $data;    
	}
	
	function getPagePath($path,$table=NULL){
	    $data = array();
	    $this->db->where('path',db_clean($path));
	    $this->db->where('status', 'active');
	    $this->db->limit(1);
            if($table !==NULL){
                $Q = $this->db->get($table);
            }  else {
                $Q = $this->db->get('omc_pages');
            }
	    
	    if ($Q->num_rows() > 0){
	      	$data = $Q->row_array();
	    }else{
			$data = array();// this prevent visiting unexistent page  
		}
	    $Q->free_result();    
	    return $data;    
	}


    function getPagePathLang($path,$lang_id=NULL,$table=NULL)
    {
        $data = array();
        if (!$lang_id == NULL )
        {// this must not be english
            $this->db->where('lang_id',$lang_id);
        }
	    $this->db->where('path',db_clean($path));
	    $this->db->where('status', 'active');
	    $this->db->limit(1);
        if(!empty($table))
        {
            $Q = $this->db->get($table);
        }  else {
            $Q = $this->db->get('omc_pages');
        }
	    if ($Q->num_rows() > 0)
	    {
	      	$data = $Q->row_array();
	    }
	    else
	    {
			$data = array();// this prevent visiting unexistent page
		}
	    $Q->free_result();
	    return $data;

	}

	 
	function getAllPages()
	{
	     $data = array();
	     $Q = $this->db->get('omc_pages');
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



     function getAllPagesbyName()
     {
	 	$data = array();
         $this->db->select('omc_pages.id, omc_pages.name,omc_pages.path,omc_pages.status,omc_pages.lang_id
         ,omc_languages.langname');
         $this->db->order_by('path asc');
         $this->db->join('omc_languages', 'omc_pages.lang_id = omc_languages.id','left');
	     $Q = $this->db->get('omc_pages');
	     if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	         	$data[] = $row;
	       	}
	    }
	    $Q->free_result();
	    return $data;
	}

/*
 * Not used
 *
     function getAllPagesby($where, $bywhat){
	     $data = array();
         $this->db->select('omc_pages.id, omc_pages.name,omc_pages.path,omc_pages.status,omc_pages.lang_id
         ,omc_languages.langname');
         $this->db->order_by('path asc');
         $this->db->join('omc_languages', 'omc_pages.lang_id = omc_languages.id','left');
	     $Q = $this->db->get_where('omc_pages',array($what=>$what));
	     if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	         	$data[] = $row;
	       	}
	    }
	    $Q->free_result();
	    return $data;
	}

     function getAllPagesbyLang($lang_id){
	     $data = array();
         $this->db->select('omc_pages.id, omc_pages.name,omc_pages.path,omc_pages.status,omc_pages.lang_id
         ,omc_languages.langname');
         $this->db->order_by('path asc');
         $this->db->join('omc_languages', 'omc_pages.lang_id = omc_languages.id','left');
	     $Q = $this->db->get_where('omc_pages',array('lang_id'=>$lang_id));
	     if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	         	$data[] = $row;
	       	}
	    }
	    $Q->free_result();
	    return $data;
	}
 *
 *
 */
	 
	function getAllPageswithnone(){
		$data[0] = 'none';
		$Q = $this->db->get('omc_pages');
		if ($Q->num_rows() > 0)
		{
			foreach ($Q->result_array() as $row)
			{
		 	$data[$row['id']] = $row['name'];
			}
	    }
	    $Q->free_result();  
	    return $data; 
	}
	 
	function getAllPathwithnone()
	{
		$data[0] = 'none';
		$Q = $this->db->get('omc_pages');
		if ($Q->num_rows() > 0)
		{
	       	foreach ($Q->result_array() as $row)
	       	{
	        	$data[$row['path']] = $row['path'];
	       	}
	    }
	    $Q->free_result();  
	    return $data; 
	 }

		/**
         * same as getAllPathwithnone except it will return id instead of path in the key
         * plus this one must show only english or lang_id = 0
         * @return array
         */
	function getIdwithnone($table=NULL){
	    $data[0] = 'none';
            if(isset($table)){
                $Q = $this->db->get_where($table, array('lang_id'=>0));
            }else{
                 $Q = $this->db->get_where('omc_pages', array('lang_id'=>0));
            }
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        	$data[$row['id']] = $row['path'];
	       	}
	    }
	    $Q->free_result();
	    return $data;
	 }


     
    function getIdwithnoneLang($lang_id, $table=NULL)
    {
	    $data[0] = 'none';
            if(!empty($table))
            {
                $Q = $this->db->get_where($table, array('lang_id'=>$lang_id));
            }  else {
                $Q = $this->db->get_where('omc_pages', array('lang_id'=>$lang_id));
            }
	     
	    if ($Q->num_rows() > 0){
	       	foreach ($Q->result_array() as $row){
	        	$data[$row['id']] = $row['path'];
	       	}
	    }
	    $Q->free_result();
	    return $data;
	}


    function getIdwithnoneAll($table=NULL)
    {
	    $data[0] = 'none';
            if(!empty($table))
            {
                $Q = $this->db->get($table);
            }
            else
            {
                $Q = $this->db->get('omc_pages');
            }
	     
	    if ($Q->num_rows() > 0)
	    {
	       	foreach ($Q->result_array() as $row)
	       	{
	        	$data[$row['id']] = $row['path'];
	       	}
	    }
	    $Q->free_result();
	    return $data;
	}


	 function addPage()
	 {
		/*
		if($this->input->post('lang_id')){
		 $lang_id = $this->MPages->addPage();
		}else{
		 $lang_id = '';
		}
		*/
		// need to check if there is no same language even english
       
		$data = array( 
			'name' => db_clean($_POST['name']),
			'metakeyword' => db_clean($_POST['metakeyword']),
			'metadesc' => db_clean($_POST['metadescr']),
			
			'path' => db_clean($_POST['path']),
			'content' => $_POST['content'],
                    'status' => db_clean($_POST['status'],8),
            'lang_id' =>$this->input->post('lang_id'),
		);
		$this->db->insert('omc_pages', $data);
	}
	 
	 
	function updatePage()
	{
		$data = array( 
			'name' => db_clean($_POST['name']),
			'metakeyword' => db_clean($_POST['metakeyword']),
			'metadesc' => db_clean($_POST['metadesc']),
			'status' => db_clean($_POST['status'],8),
			'path' => db_clean($_POST['path']),
			'content' => $_POST['content'],
		);
	 	$this->db->where('id', id_clean($_POST['id']));
		$this->db->update('omc_pages', $data);
	}
     
}

?>