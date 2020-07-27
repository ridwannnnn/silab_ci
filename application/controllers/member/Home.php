
<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
 public function __construct()
 {   parent::__construct();
   $this->check_login();
   if ($this->session->userdata('id_role') != "2") {
    redirect('', 'refresh');
  }
}

public function index()
{
 $site = $this->Konfigurasi_model->listing();
// $site = $this->Konfigurasi_model->listinguser();
 $data = array(
 'title'     => 'Dashboard | '.$site['nama_website'],
 'favicon'   => $site['favicon'], 
 'site'      => $site, 
 'id role'   => ['id_role'],

 );
 $this->template_library->load('layout/template', 'member/dashboard', $data);
}
}




