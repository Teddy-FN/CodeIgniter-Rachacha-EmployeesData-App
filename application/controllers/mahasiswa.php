<?php

class Mahasiswa extends CI_Controller {
    public function index()
    {                           //Model
        $data['mahasiswa'] =$this->m_mahasiswa->tampil_data()->result();
        $this->load->view('templates/V_header');
		$this->load->view('templates/V_sidebar');	
		$this->load->view('V_mahasiswa', $data);
		$this->load->view('templates/V_footer');
    }
    public function tambah_aksi()
    {
        $nama = $this->input->post('nama');
        $nim = $this->input->post('nim');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jurusan = $this->input->post('jurusan');

        $data = array(
            'nama'          => $nama,
            'nim'           => $nim,
            'tanggal_lahir' => $tanggal_lahir,
            'jurusan'       => $jurusan,

        );

        $this->m_mahasiswa->input_data($data, 'tb_mahasiswa');
        redirect('mahasiswa/index');
    }
}
?>