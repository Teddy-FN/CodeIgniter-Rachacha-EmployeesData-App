<?php

class M_karyawan extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_karyawan');
    }

    // Untuk menambahkan data 
    public function input_data($data)
    {
        $this->db->insert('tb_karyawan', $data);
    }

    // Untuk menghapus data karyawan yang sudah di input
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    // Edit data karyawan yang sudah di input
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    // update data yang sudah di edit
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // Detail karyawan
    public function detail_data($id_karyawan = NULL)
    {
        $query = $this->db->get_where('tb_karyawan', array('id_karyawan' => $id_karyawan))->row();
        return $query;
    }
}
