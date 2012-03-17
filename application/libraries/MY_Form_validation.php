<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * BackendPro Modified
 * Author:Orlu Weli Augustine
 */
class MY_Form_validation extends CI_Form_validation
{
	public $CI;
    private $_fields			= array();
    public function  __construct($rules = array())
    {
        parent::__construct($rules);
        $this->CI = &get_instance();
        log_message('debug','BackendPro : MY_Form_validation class loaded');
        
    }

        /**
	 * Set Default Value
	 *
	 * Assigns a default value to a form field
	 *
	 * @access public
	 * @param mixed $data Field name OR Array
	 * @param mixed $value Field value
	 */
	function set_default_value($data=NULL, $value=NULL)
	{
		if (is_array($data))
		{
			foreach($data as $field => $value)
			{
				$this->set_default_value($field,$value);
			}
			return;
		}

		$this->$data    = $value;
		$_POST[$data]   = $value;
	}

	/**
	 * Output Validation Errors
	 *
	 * Using the Status class move all errors into an error
	 * message
	 *
	 * @access public
	 */
        
	function output_errors()
	{
		// Make sure the status module is
               $this->CI->load->library('status/status/status');
               $error = $this->error_string(' ',' ');
		flashMsg('warning',$error);
	}

        function set_fields($data = '', $field = '')
	{
		if ($data == '')
		{
			if (count($this->_fields) == 0)
			{
				return FALSE;
			}
		}
		else
		{
			if ( ! is_array($data))
			{
				$data = array($data => $field);
			}

			if (count($data) > 0)
			{
				$this->_fields = $data;
			}
		}

		foreach($this->_fields as $key => $val)
		{
			$this->$key = ( ! isset($_POST[$key])) ? '' : $this->prep_for_form($_POST[$key]);

			$error = $key.'_error';
			if ( ! isset($this->$error))
			{
				$this->$error = '';
			}
		}
	}
        

	/**
	 * Check for valid captcha
	 *
	 * Contact the ReCaptcha server and check the input is valid
	 *
	 * @access public
	 * @return boolean
	 */
	function valid_captcha()
	{
		// Make sure the captcha library is loaded
		$this->CI->load->module_library('recaptcha','Recaptcha');

		// Set the error message
		$this->CI->form_validation->set_message('valid_captcha', $this->CI->lang->line('userlib_validation_captcha'));

		// Perform check
		$this->CI->recaptcha->recaptcha_check_answer($this->CI->input->server('REMOTE_ADDR'), $this->CI->input->post('recaptcha_challenge_field'), $this->CI->input->post('recaptcha_response_field'));

		return $this->CI->recaptcha->is_valid;
	}

	/**
	 * Check that the username is spare
	 *
	 * Check that the username given is not in use
	 *
	 * @access public
	 * @param string $username Username
	 * @return boolean
	 */
      
	function spare_username($username)
	{
		$query = $this->CI->user_model->fetch('Users',NULL,NULL,array('username'=>$username));

		// Set the error message
		$this->CI->form_validation->set_message('spare_username', $this->CI->lang->line('userlib_validation_username'));

		return ($query->num_rows() == 0) ? TRUE : FALSE;
	}
        



	/**
	 * Check that the email is spare
	 *
	 * Check that the username given is not in use by another user
	 *
	 * @access public
	 * @param string $email Email
	 * @retrun boolean
	 */
     
	function spare_email($email)
	{
		$query = $this->CI->user_model->fetch('Users',NULL,NULL,array('email'=>$email));

		// Set the error message
		$this->CI->form_validation->set_message('spare_email', $this->CI->lang->line('userlib_validation_email'));

		return ($query->num_rows() == 0) ? TRUE : FALSE;
	}
        



	/**
	 * Check Spare Username
	 *
	 * When modifying a user check the username is spare
	 *
	 * @access public
	 * @param string $username Username
	 * @return boolean
	 */
   
	function spare_edit_username($username)
	{
		$query = $this->CI->user_model->fetch('Users',NULL,NULL,array('username'=>$username,'id !='=>$this->CI->input->post('id')));

		// Set the error message
		$this->CI->form_validation->set_message('spare_edit_username', $this->CI->lang->line('userlib_validation_username'));

		return ($query->num_rows() == 0) ? TRUE : FALSE;
	}
         



	/**
	 * Check Spare Email
	 *
	 * When modifying a user check the email is spare
	 *
	 * @access public
	 * @param string $email Email
	 * @retrun boolean
	 */
     
	function spare_edit_email($email)
	{
		$query = $this->CI->user_model->fetch('Users',NULL,NULL,array('email'=>$email,'id !='=>$this->CI->input->post('id')));

		// Set the error message
		$this->CI->form_validation->set_message('spare_edit_email', $this->CI->lang->line('userlib_validation_email'));

		return ($query->num_rows() == 0) ? TRUE : FALSE;
	}
}

/* End of file MY_Form_validation.php */
/* Location: ./application/libraries/MY_Validation.php */

