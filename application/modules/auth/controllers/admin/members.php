<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * BackendPro
 *
 * A website backend system for developers for PHP 4.3.2 or newer
 *
 * @package         BackendPro
 * @author          Adam Price
 * @copyright       Copyright (c) 2008
 * @license         http://www.gnu.org/licenses/lgpl.html
 * @link            http://www.kaydoo.co.uk/projects/backendpro
 * @filesource
 */

// ---------------------------------------------------------------------------

/**
 * Members
 *
 * Allow the user to manage website users
 *
 * @package         BackendPro
 * @subpackage      Controllers
 */
class Members extends Admin_Controller
{
  function __construct()
  {
    parent::__construct();

    $this->load->helper('form');

    // Load userlib language
    $this->lang->load('userlib');

    // Set breadcrumb
    $this->bep_site->set_crumb($this->lang->line('backendpro_members'),'auth/admin/members');

    // Check for access permission
    check('Members');

    // Load the validation library
    $this->load->library('form_validation');
    $this->load->model('user_model');

    log_message('debug','BackendPro : Members class loaded');
  }

  /**
   * View Members
   *
   * @access public
   */
  function index()
  {
    // Get Member Infomation
    $data['members'] = $this->user_model->getUsers();

    // Display Page
    $data['header'] = $this->lang->line('backendpro_members');
    $data['page'] = $this->config->item('backendpro_template_admin') . "members/view";
    $data['module'] = 'auth';
    $this->load->view($this->_container,$data);
  }

  /**
   * Set Profile Defaults
   *
   * Specify what values should be shown in the profile fields when creating
   * a new user by default
   *
   * @access private
   */
  function _set_profile_defaults()
  {
    $this->form_validation->set_default_value('company_name','Company Name');
    $this->form_validation->set_default_value('full_name','Full Name');
    $this->form_validation->set_default_value('web_address','Web Address');
    $this->form_validation->set_default_value('phone_number','Phone Number');
    $this->form_validation->set_default_value('address','Address');
    $this->form_validation->set_default_value('city','City');
    $this->form_validation->set_default_value('post_code','Post Code');

  }

  /**
   * Get User Details
   *
   * Load user detail values from the submited form
   *
   * @access private
   * @return array
   */
  function _get_user_details()
  {
    if($this->input->post('id'))
    {
      $data['id'] = $this->input->post('id');
    }
    $data['username'] = $this->input->post('username');
    $data['email'] = $this->input->post('email');
    $data['group'] = $this->input->post('group');
    $data['active'] = $this->input->post('active');

    // Only if password is set encode it
    if($this->input->post('password') != '')
    {
      $data['password'] = $this->userlib->encode_password($this->input->post('password'));
    }

    return $data;
  }

  /**
   * Get Profile Details
   *
   * Load user profile detail values from the submited form
   *
   * @access private
   * @return array
   */
  function _get_profile_details()
  {
    $data = array();
    $data['company_name'] = $this->input->post('company_name');
    $data['full_name'] = $this->input->post('full_name');
    $data['web_address'] = $this->input->post('web_address');
    $data['phone_number'] = $this->input->post('phone_number');
    $data['address'] = $this->input->post('address');
    $data['city'] = $this->input->post('city');
    $data['post_code'] = $this->input->post('post_code');
    return $data;
  }


  function _pull_profile_details($id)
  {
    $row = array();
    $query=$this->user_model->fetch('UserProfiles','*','',array('user_id'=>$id));
    $row = $query->row_array();
    return $row;
  }

  /**
   * Display Member Form
   *
   * @access public
   * @param integer $id Member ID
   */
  function form($id = NULL)
  {
    // VALIDATION FIELDS
    $fields['id'] = "ID";
    $fields['username'] = $this->lang->line('userlib_username');
    $fields['email'] = $this->lang->line('userlib_email');
    $fields['password'] = $this->lang->line('userlib_password');
    $fields['confirm_password'] = $this->lang->line('userlib_confirm_password');
    $fields['group'] = $this->lang->line('userlib_group');
    $fields['active'] = $this->lang->line('userlib_active');
    $fields = array_merge($fields, $this->config->item('userlib_profile_fields'));
    $config;
    $this->form_validation->set_fields($fields);

    // Setup validation rules
    if( is_null($id))
    {
      // Use create user rules (make sure no-one has the same email)
      $config[] = array(
        'field'=>'username',
        'label'=>$this->lang->line('userlib_username'),
        'rules'=>"trim|required|callback_spare_username"
      );
      $config[] = array(
        'field'=>'email',
        'label'=>$this->lang->line('userlib_email'),
        'rules'=>"trim|required|valid_email|callback_spare_email"
      );
      $config[] = array(
        'field'=>'password',
        'label'=>$this->lang->line('userlib_password'),
        'rules'=>"trim|required|min_length[".$this->preference->item('min_password_length')."]|matches[confirm_password]"
      );

    }
    else
    {
      $config[] = array(
        'field'=>'username',
        'label'=>$this->lang->line('userlib_username'),
        'rules'=>"trim|required|callback_spare_edit_username"
      );
      $config[] = array(
        'field'=>'email',
        'label'=>$this->lang->line('userlib_email'),
        'rules'=>"trim|required|valid_email|callback_spare_edit_email"
      );
      $config[] = array(
        'field'=>'password',
        'label'=>$this->lang->line('userlib_password'),
        'rules'=>"trim|required|min_length[".$this->preference->item('min_password_length')."]|matches[confirm_password]"
      );
      // Use edit user rules (make sure no-one other than the current user has the same email)
    }
    //$config = array_merge($config,$this->config->item('userlib_profile_rules'));

    // Setup form default values
    if( ! is_null($id) AND ! $this->input->post('submit'))
    {
      // Modify form, first load
      $user = $this->user_model->getUsers(array('users.id'=>$id));
      $user = $user->row_array();

      $this->form_validation->set_default_value('group',$user['group_id']);
      unset($user['group']);
      unset($user['group_id']);
      $this->form_validation->set_default_value($user);
    }
    elseif( is_null($id) AND ! $this->input->post('submit'))
    {
      // Create form, first load
      $this->form_validation->set_value('group',$this->preference->item('default_user_group'));
      $this->form_validation->set_value('active','1');

      // Setup profile defaults
      $this->_set_profile_defaults();
    }
    elseif( $this->input->post('submit'))
    {
      // Form submited, check rules
      $this->form_validation->set_rules($config);
    }

    // RUN
    if ($this->form_validation->run() == FALSE)
    {
      // Load Generate Password Assets
      $this->bep_assets->load_asset_group('GENERATE_PASSWORD');

      // Construct Groups dropdown
      $this->load->model('access_control_model');
      $data['groups'] = $this->access_control_model->buildAClDropdown('group','id');

      // get profile details
      $data['profiles']= $this->_pull_profile_details($id);

      // Display form
      $this->form_validation->output_errors();
      $data['header'] = ( is_null($id)?$this->lang->line('userlib_create_user'):$this->lang->line('userlib_edit_user'));
      $this->bep_site->set_crumb($data['header'],'auth/admin/members/form/'.$id);
      $data['page'] = $this->config->item('backendpro_template_admin') . "members/form_member";
      $data['module'] = 'auth';
      $this->load->view($this->_container,$data);
    }
    else
    {
      // Save form
      if( is_null($id))
      {
        // CREATE
        // Fetch form values
        $user = $this->_get_user_details();
        $user['created'] = date('Y-m-d H:i:s');
        $profile = $this->_get_profile_details();

        $this->db->trans_begin();
        $this->user_model->insert('Users',$user);
        $profile['user_id'] = $this->db->insert_id();
        $this->user_model->insert('UserProfiles',$profile);

        if($this->db->trans_status() === TRUE)
        {
          $this->db->trans_commit();
          flashMsg('success',sprintf($this->lang->line('userlib_user_saved'),$user['username']));
        }
        else
        {
          $this->db->trans_rollback();
          flashMsg('error',sprintf($this->lang->line('backendpro_action_failed'),$this->lang->line('userlib_create_user')));
        }
        redirect('auth/admin/members');
      }
      else
      {
        // SAVE
        $user = $this->_get_user_details();
        $user['modified'] = date('Y-m-d H:i:s');
        $profile = $this->_get_profile_details();

        $this->db->trans_begin();
        $this->user_model->update('Users',$user,array('id'=>$user['id']));

        // The && count($profile) > 0 has been added here since if no update keys=>values
        // are passed to the update method it errors saying the set method must be set
        // See bug #51
        if($this->preference->item('allow_user_profiles') && count($profile) > 0)
        {
          $this->user_model->update('UserProfiles',$profile,array('user_id'=>$user['id']));
        }

        if($this->db->trans_status() === TRUE)
        {
          $this->db->trans_commit();
          flashMsg('success',sprintf($this->lang->line('userlib_user_saved'),$user['username']));
        }
        else
        {
          $this->db->trans_rollback();
          flashMsg('error',sprintf($this->lang->line('backendpro_action_failed'),$this->lang->line('userlib_edit_user')));
        }
        redirect('auth/admin/members');
      }
    }
  }

  /**
   * Delete
   *
   * Delete the selected users from the system
   *
   * @access public
   */
  function delete()
  {
    if(FALSE === ($selected = $this->input->post('select')))
    {
      redirect('auth/admin/members','location');
    }

    foreach($selected as $user)
    {
      if($user != 1)
      {	// Delete as long as its not the Administrator account
        $this->user_model->delete('Users',array('id'=>$user));
      }
      else
      {
        flashMsg('error',$this->lang->line('userlib_administrator_delete'));
      }
    }

    flashMsg('success',$this->lang->line('userlib_user_deleted'));
    redirect('auth/admin/members','location');
  }

  function spare_username()
  {
    $query = $this->user_model->fetch('Users',NULL,NULL,array('username'=>$this->input->post('username')));
    // Set the error message
    $this->form_validation->set_message('spare_username', $this->lang->line('userlib_validation_username'));
    return ($query->num_rows() == 0) ? TRUE : FALSE;
  }

  function spare_edit_username()
  { 
    $query = $this->user_model->fetch('Users',NULL,NULL,array('username'=>$this->input->post('username'),'id !='=>$this->input->post('id')));
    // Set the error message
    $this->form_validation->set_message('spare_edit_username', $this->lang->line('userlib_validation_username'));
    return ($query->num_rows() == 0) ? TRUE : FALSE;
  }

  function spare_email()
  {
    $query = $this->user_model->fetch('Users',NULL,NULL,array('email'=>$this->input->post('email')));

    // Set the error message
    $this->form_validation->set_message('spare_email', $this->lang->line('userlib_validation_email'));

    return ($query->num_rows() == 0) ? TRUE : FALSE;
  }

  function spare_edit_email()
  {
    $query = $this->user_model->fetch('Users',NULL,NULL,array('email'=>$this->input->post('email'),'id !='=>$this->input->post('id')));

    // Set the error message
    $this->form_validation->set_message('spare_edit_email', $this->lang->line('userlib_validation_email'));

    return ($query->num_rows() == 0) ? TRUE : FALSE;
  }
}
/* End of file members.php */
/* Location: ./modules/auth/controllers/admin/members.php */
