<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    // Bikin method awal
    public function index()
    {
        $data['title'] = "Menu";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // kita query data menu 
        $data['menu'] = $this->db->get('user_menu')->result_array();

        // setelah selesai dengan membuat validasi form maka kita akan membuat rulesnya maka syntaxnya seperti ini
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        // untuk menampilkan bagian error kita akan menampilkan di view menu di bawah title

        // kita bikin validasi untuk bagian form yang sudah kita buat
        if ($this->form_validation->run() == false) {
            // cara membacanya di saat masuk ke menu form pasti posisi false
            $this->load->view('projekData/template/header', $data);
            $this->load->view('projekData/template/sidebar', $data);
            $this->load->view('projekData/template/topbar', $data);
            $this->load->view('projekData/menu/index', $data);
            $this->load->view('projekData/template/footer');
        } else {
            // dan kalau berhasil menambahkan menu dari form tadi maka syntaxnya
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            // lalu tampilkan alert jika suksess menambahkan data yang sudah kita input tadi
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data sudah berhasil di tambahkan
                <button type="button" class="close" data-dismiss="alert" arial-label="close">
                <span aria-hidden="true">&times;</span>
                </button></div>'
            );
            // arahain ke controller
            redirect('menu');
            // setelah itu kita tampilkan pesan jika berhasil di tambahkan
        }
    }

    // Delete di bagian Menu dan di database di bagian user menu
    public function deleteUserMenu($id)
    {
        $where = array('id' => $id);
        $this->Menu_model->DeleteUserMenu($where, 'user_menu');

        // pesan yang akan muncul jika data berhasil di hapus
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Menu baru berhasil di hapus
            <button type="button" class="close" data-dismiss="alert" arial-label="close">
            <span aria-hidden="true">&times;</span>
            </button></div>'
        );

        redirect('menu');
    }


    // pengelolaan sub menu
    public function subMenu()
    {
        $data['title'] = "Sub Menu";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        /*setelah form sudah di sesuaikan maka selanjutnya Query dari form yang sudah kita buat tadi
        $data['subMenu'] = $this->db->get('user_sub_menu')->result_array();

        jika seperti ini maka yang akan keluar hanya angka karena di dalam di database maka kita harus membutuhkan model,dan codinganya bukan seperti yang diatas..

        jadi nama menu adalah alias dari Menu_model agar penulisanya singkat
        */
        $this->load->model('Menu_model', 'menu');

        // dan codingan model ada di atasanya ini.
        $data['subMenu'] = $this->menu->getSubMenu();

        // tabel menu untuk di bagian selcet dari form.
        $data['menu'] = $this->db->get('user_menu')->result_array();

        // Form Validation.
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('projekData/template/header', $data);
            $this->load->view('projekData/template/sidebar', $data);
            $this->load->view('projekData/template/topbar', $data);
            $this->load->view('projekData/menu/subMenu', $data);
            $this->load->view('projekData/template/footer');
        } else {
            // kalau berhasil maka kita insert
            $data = [
                'title'      => $this->input->post('title'),
                'menu_id'    => $this->input->post('menu_id'),
                'url'        => $this->input->post('url'),
                'icon'       => $this->input->post('icon'),
                'is_active'  => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            // jika berhasil maka akan muncul notifikasi
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Sub Menu baru berhasil di tambahkan
                <button type="button" class="close" data-dismiss="alert" arial-label="close">
                    <span aria-hidden="true">&times;</span>
                </button></div>'
            );
            // Hasil ini akan kita arahkan ke mana
            redirect('menu/subMenu');
        }
    }


    // Function Delete di bagian sub menu

    // nama id di ambil dari parameter di dalam method atau di dalam link contoh : http://localhost/codeigniter/menu/delete/10 nah angka 10 itulah yang di namakan paramater
    public function delete($id)
    {
        // langkah pertama panggil di bagian model sesuai dengan nama model dan parameternya di ambil dari function
        $where = array('id' => $id);
        $this->Menu_model->delete($where, 'user_sub_menu');


        // dan kalau berhasil menghapus data maka akan memunculkan pesan atau alert
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data sudah berhasil di <strong> Hapus </strong>
            <button type="button" class="close" data-dismiss="alert" arial-label="close">
            <span aria-hidden="true">&times;</span>
            </button></div>'
        );

        // Setelah berhasil di hapus maka akan di kembalikan ke bagian...
        redirect('menu/submenu');
    }

    // Edit bagian sub menu
    public function editSubMenu()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'editSubMenu');

        // dan codingan model ada di atasanya ini.
        $data['subMenu'] = $this->editSubMenu->editSubMenu();

        // tabel menu untuk di bagian selcet dari form.
        $data['menu'] = $this->db->get('user_menu')->result_array();

        // Form Validation.
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('projekData/template/header', $data);
            $this->load->view('projekData/template/sidebar', $data);
            $this->load->view('projekData/template/topbar', $data);
            $this->load->view('projekData/menu/editSubmenu', $data);
            $this->load->view('projekData/template/footer');
        } else {
            $data = [
                'title'      => $this->input->post('title'),
                'menu_id'    => $this->input->post('menu_id'),
                'url'        => $this->input->post('url'),
                'icon'       => $this->input->post('icon'),
                'is_active'  => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Sub Menu baru berhasil di Edit
                <button type="button" class="close" data-dismiss="alert" arial-label="close">
                    <span aria-hidden="true">&times;</span>
                </button></div>'
            );
            // Hasil ini akan kita arahkan ke mana
            redirect('menu/subMenu');
        }
    }
}
