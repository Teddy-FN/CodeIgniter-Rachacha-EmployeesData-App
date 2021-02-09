<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Semesta Play";
        // kita akan mencoba ambil data dari sessions karena sewaktu kita login kita simpen data di sessions
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        // Memanggil view 
        $this->load->view('projekData/template/header', $data);
        $this->load->view('projekData/template/sidebar', $data);
        $this->load->view('projekData/template/topbar', $data);
        $this->load->view('projekData/user/index', $data);
        $this->load->view('projekData/template/footer');
    }

    public function edit()
    {
        $data['title'] = "Edit My Profile";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // setelah set form validation jika salah dan benar maka selanjutnya set rules
        // untuk nama
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        // untuk photo


        // untuk Form Validation
        if ($this->form_validation->run() == false) {
            // jika salah / gagal maka akan menampilkan ini Memanggil view 
            $this->load->view('projekData/template/header', $data);
            $this->load->view('projekData/template/sidebar', $data);
            $this->load->view('projekData/template/topbar', $data);
            $this->load->view('projekData/user/edit', $data);
            $this->load->view('projekData/template/footer');
        } else {
            // Jika benar maka akan di insert kan ke dalam database
            $email = $this->input->post('email');
            $name = $this->input->post('name');
            $adress = $this->input->post('adress');
            $city = $this->input->post('city');



            // cek jika ada gambar yang akan di upload 
            $upload_gambar = $_FILES['image']['name'];

            if ($upload_gambar) {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             = 2000;
                $config['max_width']            = 200;
                $config['max_height']           = 200;

                $this->load->library('upload', $config);

                // Jika lolos maka kita akan upload dengan synxtax
                if (!$this->upload->do_upload('image')) {
                    //  kalau berhasil
                    // maka akan menampilkan pesan bahwa gambar telah di upload

                    $this->session->set_flashdata('message');
                } else {
                    // Kalau gagal
                }
            }

            $this->db->set('name', $name);
            $this->db->set('adress', $adress);
            $this->db->set('city', $city);

            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data sudah berhasil di <strong> Update </strong>
                <button type="button" class="close" data-dismiss="alert" arial-label="close">
                <span aria-hidden="true">&times;</span>
                </button></div>'
            );

            // jika sudah maka akan di kembalikan ke controller
            // ini arahnya ke dalam user/index.
            redirect('user');

            // setelah itu set ke alert atau pemberitahuan ke views
        }
    }
}
