<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function check_username($username) {		
		$query = $this->db->query('SELECT * FROM tbl_user WHERE username="'.$username.'"');		
		return $query->result_array();
	}

	public function check_password($username, $password) {		
		$query = $this->db->query('SELECT * FROM tbl_user WHERE username="'.$username.'" AND password="'.$password.'"');		
		return $query->result_array();
	}
}