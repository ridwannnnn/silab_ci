<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dataalat extends CI_Model
{

  function tampildata()
  {
     $this->db->select('alat.*,')
            ->from('alat')
            ->order_by('alat.id_alat', 'ASC'); //DESC 
    return $this->db->get();
   }

   function Tambah()
   {
       date_default_timezone_set("Asia/Bangkok");

       $nama_alat      = $this->input->post('nama_alat');
       $spesifikasi    = $this->input->post('spesifikasi');
       $tahun_alat     = $this->input->post('tahun_alat');
       $harga_alat     = $this->input->post('harga_alat');
       $status         = $this->input->post('status');
       $alat_image     = $this->input->post('alat_image');
       $kondisi_alat   = $this->input->post('kondisi_alat');
       $kalibrasi_alat = $this->input->post('kalibrasi_alat');
       $jumlah_alat    = $this->input->post('jumlah_alat'); 
       $tgl_masuk      = $this->input->post('tgl_masuk');

               $data = array (
           'nama_alat'      =>$nama_alat,
           'spesifikasi'    =>$spesifikasi,
           'tahun_alat'     =>$tahun_alat,
           'harga_alat'     =>$harga_alat,
           'status'         =>$status,
           'alat_image'     =>$alat_image,
           'kondisi_alat'   =>$kondisi_alat,
           'kalibrasi_alat' =>$kalibrasi_alat,
           'jumlah_alat'    =>$jumlah_alat,
           'tgl_masuk'      => date('Y-m-d h:i:s a'), 
               );
               $this->db->insert('alat', $data);
   }

   function Edit( )
   {
       date_default_timezone_set("Asia/Bangkok"); 
       $id_alat         = $this->input->post('id_alat');
       $nama_alat       = $this->input->post('nama_alat');
       $spesifikasi     = $this->input->post('spesifikasi');
       $tahun_alat      = $this->input->post('tahun_alat');
       $harga_alat      = $this->input->post('harga_alat');
       $status          = $this->input->post('status');
       $alat_image      = $this->input->post('alat_image');
       $kondisi_alat    = $this->input->post('kondisi_alat');
       $kalibrasi_alat  = $this->input->post('kalibrasi_alat');
       $jumlah_alat     = $this->input->post('jumlah_alat'); 
       $tgl_masuk       = $this->input->post('tgl_masuk');

               $data = array (
           'nama_alat'        =>$nama_alat,
           'spesifikasi'      =>$spesifikasi,
           'tahun_alat'       =>$tahun_alat, 
           'harga_alat '      =>$harga_alat,
           'status'           =>$status,
           'alat_image'       =>$alat_image,
           'kondisi_alat'     =>$kondisi_alat,
           'kalibrasi_alat'   =>$kalibrasi_alat,
           'jumlah_alat'      =>$jumlah_alat, 
               );

       $this->db->where('id_alat', $id_alat)->update('alat', $data);
   }

   function Hapus($id_alat) 
   {
    $this->db->where('id_alat', $id_alat)->delete('alat');
   }

}

