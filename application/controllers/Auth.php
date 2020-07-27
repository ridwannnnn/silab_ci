<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
 public function __construct()
 {
  parent::__construct();
  $this->load->database();
  $this->load->model('Auth_model');
}

public function check_account()
{
  //validasi login
  $email          = $this->input->post('email');
  $password       = $this->input->post('password');

  //ambil data dari database untuk validasi login
  $query = $this->Auth_model->check_account($email, $password); 

  if ($query === 1) {
   $this->session->set_flashdata('alert', '<p class="box-msg">
    <div class="info-box alert-danger">
    <div class="info-box-icon">
    <i class="fa fa-warning"></i>
    </div>
    <div class="info-box-content" style="font-size:14">
    <b style="font-size: 20px">GAGAL</b><br>Email yang Anda masukkan tidak
    terdaftar.</div>
    </div>
    </p>
    '); 
  } elseif ($query === 2) {
   $this->session->set_flashdata('alert', '<p class="box-msg">
    <div class="info-box alert-info"›
    <div class="info-box-icon">
    <i class="fa fa-info-circle"></i>
    </div>
    <div class="info-box-content" style="font-size:14">
    <b style="font-size: 20px">GAGAL</b><br>Akun yang Anda masukkan tidak aktif, silakan hubungi Administrator.</div>
    </div>
    </p>'
  );
  } elseif ($query === 3) {
     $this->session->set_flashdata('alert', '<p class="box-msg">
     <div class="info-box alert-danger">
     <div class="info-box-icon">
     <i class="fa fa-warning"></i>
     </div>
     <div class="info-box-content" style="font-size:14">
     <b style="font-size: 20px">GAGAL</b><br>Password yang Anda masukkan salah.
     </div>
     </div>
     </p>
     ');
  } else {
       //membuat session nama userData yang artinya nanti data ini bisa diambil sesuai dengan data yang login
       $userdata = array(
       'is_login'        => true,
       'user_id'         => $query->user_id,
       'password'        => $query->password,
       'id_role'         => $query->id_role,
       'username'        => $query->username,
       'first_name'      => $query->first_name,
       'last_name'       => $query->last_name,
       'email'           => $query->email,
       'phone'           => $query->phone,
       'photo'           => $query->photo,
       'created_on'      => $query->created_on,
       'last_login'      => $query->last_login
       );
       $this->session->set_userdata($userdata);
       return true;
     }
   }
   public function login()
   {
    $site = $this->Konfigurasi_model->listing();
    $data = array(
    'title'         => 'Login | '.$site['nama_website'],
    'favicon'       => $site['favicon'],
    'site'          => $site
    );
    
    //melakukan pengalihan halaman sesuai dengan levelnya
    if ($this->session->userdata('id_role') == "1") {
     redirect('admin/home');
   }
   if ($this->session->userdata('id_role') == "2") {
     redirect('member/home');
   }
   
   //proses login dan validasinya
   if ($this->input->post('submit')) {
     $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]');
     $this->form_validation->set_rules('password','Password', 'Password', 'trim|required|min_length[5]|max_length[22]');
     $error = $this->check_account();

     if ($this->form_validation->run() && $error === true) {
       $data = $this->Auth_model->check_account($this->input->post('email'), $this->input->post('password'));

       //jika bernilai TRUE maka alihkan halaman sesuai dengan levelnya
       if ($data->id_role == '1') {
          redirect('admin/home');
        } elseif ($data->id_role == '2') {
          redirect('member/home');
        }
        } else {
         $this->template_library->load('authentication/layout/template', 'authentication/login', $data);
        }
        } else {
         $this->template_library->load('authentication/layout/template', 'authentication/login', $data);
        }
     }
     public function logout()
     {
      $this->session->sess_destroy();
      redirect('auth/login');
    }

    public function register()
    {
     date_default_timezone_set("Asia/Bangkok");

     $this->form_validation->set_rules('username', 'Username', 'required|trim');
     $this->form_validation->set_rules('first_name', 'Username', 'required|trim');
     $this->form_validation->set_rules('last_name', 'Username', 'required|trim');
     $this->form_validation->set_rules('email', 'Email',
     'required|trim|valid_email|is_unique[users.email]', [
     'is_unique' => 'This email has already registered!'
     ]);
     $this->form_validation->set_rules('password', 'Password',
     'required|trim|min_length[5]|max_length[22]|matches[passwordkonfirmasi]', [
     'matches' => 'Password dont match!',
     'min_length' => 'Password too short!'
     ]);
     $this->form_validation->set_rules('passwordkonfirmasi', 'Password',
     'required|trim|matches[password]');

     if ($this->form_validation->run() == false) {
      $site = $this->Konfigurasi_model->listing();
      $data = array(
      'title'        => 'Register | '.$site['nama_website'],
      'favicon'      => $site['favicon'],
      'site'         => $site
      );
      $this->template_library->load('authentication/layout/template', 'authentication/register', $data);
      } else {
        $email = $this->input->post('email', true);
        $user = $this->input->post('username');
        $awal = $this->input->post('first_name');
        $akhir = $this->input->post('last_name');
        $phone = $this->input->post('phone'); 

        $data = [
        'username' => $user,
        'first_name' => $awal,
        'last_name' => $akhir,
        'phone' => $phone,
        'photo' => 'default.jpg',
        'email' => htmlspecialchars($email),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), 
        'id_role' => 2,
        'active' => 1,
        'created_on' => date('Y-m-d h:i:s a'),
        ];
        $this->db->insert('users', $data);
        redirect('auth/login');
      }

    }

  }

