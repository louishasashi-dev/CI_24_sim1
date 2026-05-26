<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('session');
        $this->load->helper('url');
    }
    
    public function index()
    {
        // Jika sudah login, redirect ke dashboard sesuai role
        if ($this->session->userdata('login')) {
            $this->redirect_by_role();
        }
        
        $this->load->view('auth/login');
    }
    
    public function login()
{
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    if (empty($username) || empty($password)) {
        $this->session->set_flashdata('error', 'Username dan password harus diisi');
        redirect('login');
    }

    $user = $this->Auth_model->cek_login($username, $password);

    if ($user) {
        // Simpan last_login LAMA ke session dulu (sebelum diupdate)
        $session_data = [
            'id_user'    => $user->id,
            'username'   => $user->username,
            'role'       => $user->rule,
            'login'      => TRUE,
            'last_login' => $user->last_login ?? 'Belum pernah login'
        ];

        $this->session->set_userdata($session_data);

        // Baru update last_login di database
        $this->Auth_model->update_last_login($user->id);

        $this->redirect_by_role();

    } else {
        $this->session->set_flashdata('error', 'Username atau password salah');
        redirect('login');
    }
}
    
    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Berhasil logout');
        redirect('login');
    }
    
    private function redirect_by_role()
    {
        $role = $this->session->userdata('role');
        
        if ($role == 'admin') {
            redirect('dashboard');
        } elseif ($role == 'petugas') {
            redirect('dashboard');
        } else {
            redirect('auth');
        }
    }
}