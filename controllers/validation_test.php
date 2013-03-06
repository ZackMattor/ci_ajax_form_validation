<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**     -- validation_test.js (CONTROLLER)--
 **
 ** This acts as a test controller to showcase a simple example of the ajax_validation
 **  JSON generation class. This controller is split up into pages, actions, and validators.
 **
 ** Author: Zachary Mattor (Criten)
 **/

class Validation_test extends CI_Controller {
	
	var $is_ajax = false;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->is_ajax = $this->input->is_ajax_request();
		
		$this->load->library('ajax_validation');
		$this->load->helper(array('form', 'url'));
	}
	
	///////////////
	//   Pages   //
	///////////////
	public function index()
	{
		$this->load->view('test_form');
	}
	
	public function success()
	{
		show_error("GOOD JOB!");
	}
	
	///////////////
	//  Actions  //
	///////////////
	public function test_form_action()
	{
		$form_data = $this->input->post();
		
		$this->_validate_form_data($form_data);
		
		if($this->is_ajax) die($this->ajax_validation->generate_json());
		
		redirect('validation_test');
	}
	
	//Some people might want to put this part in a model... it's your preference
	///////////////
	//Validations//
	///////////////
	private function _validate_form_data($form_data)
	{
		if($form_data['name'] == '')
		{
			$this->ajax_validation->set_error('Please enter a name', array('name'));
		}
		
		if(strlen($form_data['password']) < 4)
		{
			$this->ajax_validation->set_error('Your password should contain more than 4 characters.', array('password'));
		}
		else if($form_data['password'] != $form_data['repassword'])
		{
			$this->ajax_validation->set_error('Passwords Don\'t match', array('password', 'repassword'));
		}
	}
}