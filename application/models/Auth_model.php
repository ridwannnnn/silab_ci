
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
  public $table = 'users';
  public $user_id    = 'users.user_id';

  public function __construct()
  {
     parent::__construct();
  }

  public function login($email, $password)
  {
     $query = $this->db->get_where('users', array('email'=>$email,
                          'password'=>$password));
     return $query->row_array();
  }

  public function check_account($email)
  {
     //cari email lalu lakukan validasi
     $this->db->where('email', $email);
     $query = $this->db->get($this->table)->row();

     //jika bernilai 1 maka user tidak ditemukan
     if (!$query) {
        return 1;
     }
     //jika bernilai 2 maka user tidak aktif
     if ($query->active == 0) {
        return 2;
     }
     //jika bernilai 3 maka password salah
     if (!hash_verified($this->input->post('password'), $query->password)) {
        return 3;
     }

     return $query;
  }

  public function logout($date, $user_id)
  {
     $this->db->where('users.user_id', $user_id);
     $this->db->update('users', $date);
  }
}

