<?php

defined('BASEPATH') or exit('No direct script access allowed'); 

class Dataalat extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_dataalat');
    $this->check_login();
    if ($this->session->userdata('id_role') != "1") { 
      redirect('', 'refresh');
    }
  }

  public function index()
  {
    $site = $this->Konfigurasi_model->listing(); 
    $data = array(
      'title'    => 'Dashboard | '.$site['nama_website'],
      'favicon'  => $site['favicon'],
      'site'     => $site,
      'tampildata' => $this->M_dataalat->tampildata(),
    );
    $this->template_library->load('layout/template', 'admin/dataalat', $data);
  }

  function Tambah()
    {
      $this->M_dataalat->Tambah(); 
      redirect('admin/dataalat');
    }

  function Edit( )
    {
      $this->M_dataalat->Edit(); 
      redirect('admin/dataalat');
    }

  function Hapus($id_alat)
    {
      $this->M_dataalat->Hapus($id_alat); 
      redirect('admin/dataalat');
    }
}

