<?php

class User_model extends CI_Model
{
    private $_table = 'user';

    public function doLogin()
    {
        $post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('email', $post['email'])
            ->or_where('username', $post["email"]);
        $user = $this->db->get($this->_table)->row();

        if ($user) {
            // periksa passwordnya
            $isPasswordTrue = password_verify($post["password"], $user->password);
            // periksa rolenya
            $isAdmin = $user->role == "admin";

            // jika password benar dan dia admin
            if ($isPasswordTrue && $isAdmin) {
                // login suksess
                $this->session->set_userdata(['user_logged' => $user]);
                $this->_updateLastLogin($user->user_id);
                return true;
            }
        }
        // Login gagal
        return false;
    }
}
