<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // View 
        $this->load->view('projekData/template/header', $data);
        $this->load->view('projekData/template/sidebar', $data);
        $this->load->view('projekData/template/topbar', $data);
        $this->load->view('projekData/admin/index', $data);
        $this->load->view('projekData/template/footer');
    }
}
