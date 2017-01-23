<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {	

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index() 
	{				
		$this->load->view('form/login');
	}

	public function login() {		
		$is_user_pass_empty = false;
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$is_user_pass_empty = !empty($username) && !empty($password) ? true : false;

		if($is_user_pass_empty) {
			// check if username is registered
			$account = $this->check_account($username, $password);
			
			var_dump($account);
			die;
			// if($user) {
			// 	$this->check_password($password);
			// } else {
			// 	echo "username belum terdaftar";				
			// 	die;
			// }



		} else {
			echo "username dan password harus terisi";
		}

		redirect('auth');
	}

	public function check_account($username, $password) {		
		$this->load->model('auth_model');	

		$message_error = '';
		$is_account_registered = $this->auth_model->check_username($username);	
		
		if(!$is_account_registered) {
			$message_error = "Username belum terdaftar";
			return $message_error;
		}

		$account = $this->auth_model->check_password($username, $password);

		if(empty($account[0])) {
			$message_error = "Username atau password salah";
			return $message_error;
		}

		$account = "sukses login";

		return $account;
	}
	
}