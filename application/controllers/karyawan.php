<?php
// karaywan sendiri merupakan nama kelas
class Karyawan extends CI_Controller
{               // projek merupakan nama method
    public function projek()
    {
        $data['karyawan'] = $this->m_karyawan->tampil_data()->result();
        $this->load->view('admin/header');
        $this->load->view('admin/karyawan', $data);
        $this->load->view('admin/js');
        $this->load->view('admin/footer');
        $this->load->view('admin/sidebar');
    }

    // Input Data dari web yang sudah di buat
    public function tambah_aksi()
    {
        $nama       = $this->input->post('nama');
        $nip        = $this->input->post('nip');
        $posisi     = $this->input->post('posisi');
        $alamat     = $this->input->post('alamat');
        $email      = $this->input->post('email');
        $no_telp    = $this->input->post('no_telp');
        // Upload Foto / Gambar 
        $foto       = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path']      = './foto';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo $this->upload->display_errors();
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama'         => $nama,
            'nip'          => $nip,
            'posisi'       => $posisi,
            'alamat'       => $alamat,
            'email'        => $email,
            'no_telp'      => $no_telp,
            'foto'         => $foto,
        );

        $this->m_karyawan->input_data($data, 'tb_karyawan');
        // Akan di kembalikan ke nama class dan method
        redirect('karyawan/projek');
    }

    //  Delete data dari web yang telah di buat
    public function hapus($id_karyawan)
    {
        // menjadikan id database ke array
        $where = array('id_karyawan' => $id_karyawan);

        // hapus data di buat di dalam file Model karena waktu pemanggilan memanggil M_karyawan
        $this->m_karyawan->hapus_data($where, 'tb_karyawan');

        // Akan di kembalikan ke nama class(karyawan) dan method (projek)
        redirect('karyawan/projek');
    }

    // Edit data dari web yang telah dibuat 
    public function edit($id_karyawan)
    {
        // menjadikan id database ke array
        $where = array('id_karyawan' => $id_karyawan);
        $data["karyawan"] = $this->m_karyawan->edit_data($where, 'tb_karyawan')->result();

        $this->load->view('admin/header');
        // untuk menedit nanti kita tambahkan edit di bagian view
        $this->load->view('admin/edit', $data);
        $this->load->view('admin/js');
        $this->load->view('admin/footer');
        $this->load->view('admin/sidebar');
    }

    // Update
    public function update()
    {
        $id_karyawan    = $this->input->post('id_karyawan');
        $nama           = $this->input->post('nama');
        $nip            = $this->input->post('nip');
        $posisi         = $this->input->post('posisi');
        $alamat         = $this->input->post('alamat');
        $email          = $this->input->post('email');
        $no_telp        = $this->input->post('no_telp');
        $foto           = $this->input->post('foto');

        // kemudian masukan ke dalam array
        $data = array(
            'nama'     => $nama,
            'nip'      => $nip,
            'posisi'   => $posisi,
            'alamat'   => $alamat,
            'email'    => $email,
            'no_telp'  => $no_telp,
            'foto'     => $foto,
        );

        $where = array(
            'id_karyawan' => $id_karyawan,
        );

        // membuat method pada bagian model
        $this->m_karyawan->update_data($where, $data, 'tb_karyawan');
        redirect('karyawan/projek');
    }

    // detail data
    public function detail($id_karyawan)
    {
        $this->load->model('m_karyawan');
        $detail = $this->m_karyawan->detail_data($id_karyawan);
        $data['detail'] = $detail;

        $this->load->view('admin/header');
        $this->load->view('admin/detail', $data);
        $this->load->view('admin/js');
        $this->load->view('admin/footer');
        $this->load->view('admin/sidebar');
    }

    // untuk bagian memunculkan Print
    public function print()
    {
        $data['karyawan'] = $this->m_karyawan->tampil_data("tb_karyawan")->result();
        // Mmebuat di bagian view
        $this->load->view('admin/print_karyawan', $data);
    }

    // Untuk Bagian Export 
    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['karyawan'] = $this->m_karyawan->tampil_data('tb_karyawan')->result();
        // Mmebuat di bagian view
        $this->load->view('admin/laporan_pdf', $data);

        $paper_size = " A4,A3,A5";
        $orientation = "landscape";
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        // Convert ke dalam pdf 
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_karyawan.pdf", array('Attachemnt' => 0));
    }
}
