

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model
{
  public $table = 'konfigurasi'; 
  public $id = 'id_konfigurasi'; 
  public $order = 'DESC';

  function __construct()
  {
    parent::__construct();
  }

  //Listing Konfigurasi
  public function listing() {
    $this->db->select('*'); 
    $this->db->from('konfigurasi'); 
    $query = $this->db->get();
    return $query->row_array();
  }

  public function listinguser() { 
    $this->db->select('*');
    $this->db->from('users'); 
    $query = $this->db->get(); 
    return $query->row_array();
  }

}

