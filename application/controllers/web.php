<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function page()
    {
        // Rules 
        // Di bagian Email
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        // Di Bagian Password 
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        // Validasi data
        if ($this->form_validation->run() == false) {
            $data['title'] = 'login page';
            $this->load->view('projekData/auth/header', $data);
            $this->load->view('projekData/login/login');
            $this->load->view('projekData/auth/footer');
        } else {
            // Ketika Validasinya berhasil dan cocok.
            //      Method
            $this->_login();
        }
    }

    // Fungsi Login ini berfungsi sbg pemisah saja agar supaya method login tidak terlalu panjang
    private function _login()
    {
        // Isinya kita akan ambil dulu email dan passowrd yang sudah lolos validasinya..jadi syntaxnya
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // post didapat dari method form pada 

        // Setelah itu tinggal kita query saja ke dalam database cari 'user' yang emailnya sesuai dengan yang di tulis di login system
        // Dengan cara :
        // Ambil data user lalu kita query.
        //                 cara membancanya select * from tabel user where email sama dengan email.
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        //  Di cek terlebih dahulu ke dalam var_dump jika seandainya email benar maka akan muncul isi row pada halaman next page
        // var_dump($user);
        // die;


        // Langkah selanjutnya cek dengan cara 
        // Usernya ada.
        if ($user != null) {
            // Jika User Aktif
            if ($user['is_active'] == 1) {
                // Cek password bener atau enggak dengan cara function di PHP password_verify untuk menyamakan password antara yang diketikan di login form dengan password yang sudah di hash nanti di cocokan denga fungsi ini..untuk parameter pertama di ambil dari kolom input dengan password yang ada di data [user] / di database..
                if (password_verify($password, $user['password'])) {
                    // jika benar siapkan data..
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    // setelah itu siapkan sesion
                    $this->session->set_userdata($data);
                    // kalau sudah kita arahkan ke view yang kita mau kalau admin kita arahkan ke view dan controller admin, dan jika user maka kita arahkan ke view dan conroller user
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                    // Disini kita membuat view yang bernaman admin.
                } else {
                    // Tapi kalau gagal artinya password yang di inputkan salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password yang anda input salah</div>');
                    redirect('web/page');
                }
            } else {
                // Jika email tidak aktif / berada di angka 0
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email yang anda masukan belum aktif!! coba lagi</div>');
                redirect('web/page');
            }
        } else {
            // Tidak ada user yang seperti itu..lalu kasih pesan eror
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email yang anda masukan salah coba diinget lagi!! Atau mungkin anda belum melakukan register.</div>');
            redirect('web/page');
        }
    }
    public function registrasi()
    {
        // Rules
        // 1. Bagian Nama
        //   set_rules(colum 1 name di dalam input / colum 2 Alias bebas diisi apa aja / colum 3 adalah rules)
        // required artinya harus di isi
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        // 2. Bagian Email
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            "is_unique" => "password sudah di gunakan,coba yang lain!",
        ]);
        //  3. Bagian Password1
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'The Password is too Short!'
        ]);
        // 4. Bagian Password 2
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');
        //  Bagian Place_birth
        $this->form_validation->set_rules('place_birth', 'Place Birth', 'required');
        //  Bagian Date
        $this->form_validation->set_rules('date', 'Date', 'required');
        // .Bagian City
        $this->form_validation->set_rules('city', 'City', 'required');
        //  .Bagian Address
        $this->form_validation->set_rules('adress', 'Address', 'required');



        if ($this->form_validation->run() == false) {
            $data['title'] = "User Registrasi";
            $this->load->view('projekData/auth/header', $data);
            $this->load->view('projekData/login/registrasi');
            $this->load->view('projekData/auth/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'city' => htmlspecialchars($this->input->post('city', true)),
                'place_birth' => htmlspecialchars($this->input->post('place_birth', true)),
                'date' => date_format(date_create($this->input->post('date', true)), 'Y-m-d'),
                'adress' => htmlspecialchars($this->input->post('adress', true)),
                'image' => 'default.jpg',
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            // pemberitahuan jika Akun sudah Berhasil terdaftar dan akan langsung di kembalikan ke dalam halaman page!!!
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! akun anda Sudah terdaftar!</div>');
            redirect('web/page');
        }
    }

    // membuat method logout
    public function logout()
    {
        // tugasnya logout ini membersihkan sambil mengembalikan ke halaman login
        // buat ngilangin emailnya
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        // Redirect di kasih alert seperti di atas
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah Berhasil Logged-out</div>');
        redirect('web/page');
    }
}
