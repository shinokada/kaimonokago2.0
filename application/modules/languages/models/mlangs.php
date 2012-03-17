<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MLangs extends Base_model
{

    function __construct()
    {
        parent::__construct();
        $table = 'omc_languages';
        $this->_TABLES = array(    'Langs' => 'omc_languages',
                            );
    }

    function getalllang()
    {
      // getting all the products of the same categroy.
        $data = array();
        $Q = $this->db->get($this->_TABLES['Langs']);
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

    

    function check_lang($langname=NULL)
    {
        $Q = $this->db->get_where($this->_TABLES['Langs'],array('langname' => $langname));
        if ($Q->num_rows() > 0)
        {
            $data = TRUE;
        }
        else
        {
            $data = FALSE;
        }
        $Q->free_result();
        return $data;
    }


    function addnewlang()
    {
        // save it in lower case in db
        $langname = strtolower($this->input->post('langname'));
        $this->insert('Langs',array('langname'=>$langname));
    }


    function getLangDropDown()
    {
        $data = array();
        $data[''] = 'Select Language';
        $data['english'] = ucwords('english');
        $Q = $this->db->get_where($this->_TABLES['Langs'], array('status'=>'active'));
            if ($Q->num_rows() > 0)
            {
                foreach ($Q->result_array() as $row)
                {
                    $data[$row['langname']] = ucwords($row['langname']);
                }
            }
        $Q->free_result();
        return $data; 
    }


    function getLangDropDownWithId()
    {
        $data = array();
        $data[0] = ucwords('english');
        $Q = $this->db->get_where($this->_TABLES['Langs'], array('status'=>'active'));
            if ($Q->num_rows() > 0)
            {
                foreach ($Q->result_array() as $row)
                {
                    $data[$row['id']] = ucwords($row['langname']);
                }
            }
        $Q->free_result();
        return $data;
    }
/**
 * This will return translated language 
 * @param string $path
 * @return array
 */
    function getTransLang($module, $path)
    {
        $data = array();
        $table = 'omc_'.$module;
        $this->db->join($table, "$table.lang_id = omc_languages.id", 'left');
        if ($module=='pages' OR $module =='lilly_fairies_pages')
        {
            $table_field = $table.".path";
        }  elseif ($module=='menus' OR $module =='lilly_fairies_menus') 
        {
             $table_field = $table.".menu_id";
        }elseif ($module == 'category')
        {
            $table_field = $table.".table_id";
        }elseif ($module == 'products')
        {
             $table_field = $table.".table_id";
        }elseif($module == 'playroom')
        {
             $table_field = $table.".table_id";
        }
        $Q = $this->db->get_where('omc_languages', array($table_field => $path));
        if ($Q->num_rows() > 0)
        {
            foreach ($Q->result_array() as $row)
            {
                $data[$row['id']] = ucwords($row['langname']);
            }
        }
        $Q->free_result();
        return $data;
    }
    

    function getId($language)
    {
        $data = array();
        $Q = $this->db->get_where($this->_TABLES['Langs'],array('langname'=>$language));
            if ($Q->num_rows() > 0)
            {
                foreach ($Q->result_array() as $row)
                {
                    $data = $row;
                }
            }
        $Q->free_result();
        return $data;
    }

}
