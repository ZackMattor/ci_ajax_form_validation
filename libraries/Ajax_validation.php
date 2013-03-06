<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**     -- Ajax_validation.php --
 **
 ** This library generates a JSON response based on your validate method.
 **
 ** Author: Zachary Mattor (Criten)
 **/

class Ajax_validation
{
	var $response = array
					(
						'error' => false,
						'error_message' => '',
						'problem_fields'=>array(),
						'success_message' => ''
					);
	
	/****
	 * set_error(string, array(string, ...))
	 *
	 * Sets an error. The problem_inputs array should contain an array of names
	 * that corrisponds to the fields that you want to mark on the client side.
	 */
	function set_error($message, $problem_inputs = array(''))
	{
		$this->response['error'] = true;
		$this->response['error_message'] = $message;
		
		$this->response['problem_fields'] = array_merge($this->response['problem_fields'], $problem_inputs);
	}
	
	/****
	 * add_problem_fields(array(string, ...))
	 *
	 * Merges the problem fields with more that you want to add
	 */
	function add_problem_fields($problem_inputs = array(''))
	{
		$this->response['error'] = true;
		
		$this->response['problem_fields'] = array_merge($this->response['problem_fields'], $problem_inputs);
	}
	
	/****
	 * set_error_message(string)
	 *
	 * Sets an error message. 
	 */
	function set_error_message($message)
	{
		$this->response['error'] = true;
		$this->response['error_message'] = $message;
	}
	
	/****
	 * set_success_message(string)
	 *
	 * If desired.. the error response can return a sucess message.
	 */
	function set_success_message($message)
	{
		$this->response['success_message'] = $message;
	}
	
	/****
	 * clear_error()
	 *
	 * Clears the error in the response.
	 */
	function clear_error()
	{
		$this->response['error'] = false;
		$this->response['problem_fields'] = array();
		$this->response['error_message'] = '';
	}
	
	/****
	 * has_error()
	 *
	 * Returns wether or not the validation contains an error.
	 */
	function has_error()
	{
		return $this->response['error'];
	}
	
	/****
	 * generate_json()
	 *
	 * Generates the json string based on user data.
	 */
	function generate_json()
	{
		return json_encode($this->response);
	}
}
/* End of file Ajax_validation.php */