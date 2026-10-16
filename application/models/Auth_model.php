<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login_check($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        return $this->db->get('users')->row();
    }
}
