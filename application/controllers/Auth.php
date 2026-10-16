<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library('session');
    }

    public function index() {
        if ($this->session->userdata('logged_in') === TRUE) {
            redirect('admin');
        }
        $this->load->view('admin/login_view');
    }

    public function process_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Auth_model->login_check($username, $password);

        if ($user) {
            $session_data = array(
                'user_id'   => $user->id,
                'username'  => $user->username,
                'full_name' => $user->full_name,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);
            redirect('admin');
        } else {
            $this->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
