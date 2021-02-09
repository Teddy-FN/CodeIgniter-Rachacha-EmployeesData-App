<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    // Menampilkan data member ke dalam menu bagian member
    public function member()
    {
        $member = $this->db->query("SELECT * FROM user");
        return $member;
    }

    // Detail Data Dari seluruh user
    public function detailUser($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    // ini adalah model dari menu
    public function getSubMenu()
    {
        // mari kita joinkan dari tabel user_sub_menu ke tabel menu,dengan cara seperti ini
        // cara membacanya seperti ini

        //  Select dari tabel user_sub_menu ke tabel menu
        $query = "SELECT `user_sub_menu`. * ,`user_menu`.`menu`
            -- dari  user_sub_menu join/ gabung ke tabel user_menu
                    FROM `user_sub_menu` JOIN `user_menu`
            -- lalu ON dari user _Sub_menu bagian menu_id = dari user_menu bagian primary keynya
                    ON `user_sub_menu`. `menu_id` = `user_menu` . `id`
                ";

        // setelah selesai tinggal kita query kan saja untuk menampilkan datanya
        return $this->db->query($query)->result_array();
    }


    // Delete di bagian Menu
    public function DeleteUserMenu($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    // Delete di bagian sub menu
    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
