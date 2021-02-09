<?php 

class ProjekData extends CI_Controller{
    public function home()
    {
        $this->load->view('projekData/home');
        $this->load->view('projekData/header');
        $this->load->view('projekData/js');
        $this->load->view('projekData/sidebar');
        $this->load->view('projekData/footer');
        $this->load->view('projekData/navbar');
    }
    public function team()
    {
        $data['team'] = $this->m_projekData->tampil_data()->result();

        $this->load->view('projekData/page/crew', $data);
        $this->load->view('projekData/header');
        $this->load->view('projekData/js');
        $this->load->view('projekData/sidebar');
        $this->load->view('projekData/footer');
        $this->load->view('projekData/navbar');
    }

}