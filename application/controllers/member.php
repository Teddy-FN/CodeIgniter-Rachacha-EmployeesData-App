<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function index()
    {
        $data['title'] = "All Member";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Menampilkan data yang sudah melakukan registrasi
        $member['data'] = $this->Menu_model->member();
        // Memanggil view 
        $this->load->view('projekData/template/header', $data);
        $this->load->view('projekData/template/sidebar', $data);
        $this->load->view('projekData/template/topbar', $data);
        $this->load->view('projekData/member/index', $member);
        $this->load->view('projekData/template/footer');
    }

    public function detail($id)
    {

        $data['title'] = "Detail Member";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // mendapatkan / mengambil detail data dari user yang kita pilih dari database menggunakan model dan parameternya ID
        $data['user'] = $this->Menu_model->detailUser($id);

        // panggil view
        $this->load->view('projekData/template/header', $data);
        $this->load->view('projekData/template/sidebar', $data);
        $this->load->view('projekData/template/topbar', $data);
        $this->load->view('projekData/member/detail', $data);
        $this->load->view('projekData/template/footer');
    }

    public function editData()
    {
    }
}
