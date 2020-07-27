
 <section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="box">
     <div class="box-header">
      <h3 class="box-title">Data Alat</h3> 
     </div>
     <div style="margin-left:10px">
     <button type="button" class="btn btn-primary" data-toggle="modal" data-
target="#modal-default-tambah">
      Tambah Data
     </button> 
     </div>
     <div class="box-body">
      <table id="examplel" class="table table-bordered table-striped">
      <thead> 
      <tr>
       <th>Nama Alat</th>
       <th>Spesifikasi</th>
       <th>Tahun Alat</th>
       <th>Harga Alat</th>
       <th>Status</th>
       <th>Alat Image</th>
       <th>Kondisi Alat</th>
       <th>Kalibrasi Alat</th>
       <th>Jumlah Alat</th>
       <th>Tanggal Masuk</th>
       <th>Action</th> 
      </tr>
      </thead>
      <tbody>
       <?php
       foreach( $tampildata->result() as $alat ){ ?>
      <tr>
       <td><?php echo $alat->nama_alat ?></td>
       <td><?php echo $alat->spesifikasi ?></td>
       <td><?php echo $alat->tahun_alat ?></td>
       <td><?php echo $alat->harga_alat ?></td>
       <td><?php echo $alat->status ?></td>
       <td><?php echo $alat->alat_image ?></td>
       <td><?php echo $alat->kondisi_alat ?></td>
       <td><?php echo $alat->kalibrasi_alat ?></td>  
       <td><?php echo $alat->jumlah_alat ?></td> 
       <td><?php echo $alat->tgl_masuk ?></td>
       <td>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-
target="#modal-default-edit<?php echo $alat->id_alat ?>">
         Edit
        </button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-
target="#modal-default-hapus<?php echo $alat->id_alat ?>">
         Hapus
        </button>
       </td> 
      </tr>
      <?php } // end foreach ?>
      </tbody> 
      <tfoot> 
      <tr>
       <th>Nama Alat</th>
       <th>Spesifikasi</th>
       <th>Tahun Alat</th>
       <th>Harga Alat</th>
       <th>Status</th>
       <th>Alat Image</th>
       <th>Kondisi Alat</th>
       <th>Kalibrasi Alat</th>
       <th>Jumlah Alat</th>
       <th>Tanggal Masuk</th>
       <th>Action</th> 
      </tr>
      </tfoot>
      </table>
     </div>
    </div>
   </div>
 </div>
 </section>


<!-- Buat Modal Edit Dan Hapus -->
 <?php
 foreach( $tampildata->result() as $alat ){ ?>
  <!-- Modal Edit -->
  <?php echo form_open_multipart('admin/dataalat/Edit'); ?>
   <div class="modal fade" id="modal-default-edit<?php echo $alat->id_alat ?>">
       <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
           <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Data</h4>
         </div>
         <input type="text" name="id_alat" value="<?php echo $alat->id_alat; ?>" /> 
         <div class="modal-body">

         <div class="form-group">
          <label for="nama_alat">Nama Alat</label>
         <input type="text" class="form-control" value="<?php echo $alat->nama_alat ?>" 
          required="required" name="nama_alat" id="nama_alat" placeholder="Nama Alat"> 
         </div>

         <div class="form-group">
          <label for="spesifikasi">Spesifikasi</label>
      <input type="text" class="form-control" value="<?php echo $alat->spesifikasi ?>" 
        required="required" name="spesifikasi" id="spesifikasi" placeholder="Spesifikasi"> 
         </div>
          <div class="form-group">
          <label for="tahun_alat">Tahun Alat</label>
      <input type="number" class="form-control" value="<?php echo $alat->tahun_alat ?>" 
        required="required" name="tahun_alat" id="tahun_alat" placeholder="Tahun Alat"> 
         </div>
          <div class="form-group">
          <label for="harga_alat">Harga Alat</label>
      <input type="number" class="form-control" value="<?php echo $alat->harga_alat ?>" 
        required="required" name="harga_alat" id="harga_alat" placeholder="Harga Alat">
          <div class="form-group">
          <label for="status">Status</label>
      <input type="text" class="form-control" value="<?php echo $alat->status ?>" 
        required="required" name="status" id="status" placeholder="Status"> 
         </div>
          <div class="form-group">
          <label for="alat_image">Alat Image</label>
      <input type="text" class="form-control" value="<?php echo $alat->alat_image ?>" 
        required="required" name="alat_image" id="alat_image" placeholder="Alat Image"> 
         </div>
          <div class="form-group">
          <label for="kondisi_alat">Kondisi Alat</label>
      <input type="text" class="form-control" value="<?php echo $alat->kondisi_alat ?>" 
        required="required" name="kondisi_alat" id="kondisi_alat" placeholder="Kondisi Alat"> 
         </div>
          <div class="form-group">
          <label for="kalibrasi_alat">Kalibrasi Alat</label>
      <input type="text" class="form-control" value="<?php echo $alat->kalibrasi_alat ?>" 
        required="required" name="kalibrasi_alat" id="kalibrasi_alat" placeholder="Kalibrasi Alat">
         </div>
         <div class="form-group">
          <label for="jumlah_alat">Jumlah Alat</label>
       <input type="number" class="form-control" value="<?php echo $alat->jumlah_alat ?>" 
      required="required" name="jumlah_alat" id="jumlah_alat" placeholder="Jumlah Alat"> 
         </div>

         </div>
         <div class="modal-footer">
     <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>  
          <button type="submit" class="btn btn-primary">Save Changes</button>
         </div> 
        </div>
        <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php echo form_close(); ?>

      <!-- Start Modal Hapus -->
      <div id="modal-default-hapus<?php echo $alat->id_alat ?>" class="modal fade animated pulse"> 
             <div class="modal-dialog ">
              <div class="modal-content">
               <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                  <i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title">Hapus Alat <b>(<?php echo $alat->nama_alat ?>)</b></h4> 
               </div>
               <div class="modal-body">
    <p>Apakah anda yakin ingin menghapus Alat <b> <?php echo $alat->nama_alat; ?></b> ?</p> 
               </div>
               <div class="modal-footer">
   <button class="btn btn-default btn-rounded" data-dismiss="modal" type="button">Close</button>
   <a class="btn btn-danger btn-rounded"
          href="<?php echo base_url('admin/dataalat/Hapus/'. $alat->id_alat) ?>">
              Hapus Alat</a>
              </div>
              </div>
             </div>
             </div>
       <!-- End Modal Hapus --> 
 <?php } // end foreach ?>



<!-- Modal Tambah -->
<?php echo form_open_multipart('admin/dataalat/Tambah'); ?>
<div class="modal fade" id="modal-default-tambah">
     <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close> 
         <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data</h4>
       </div>
       <div class="modal-body">

       <div class="form-group">
        <label for="nama_alat">Nama Alat</label>
  <input type="text" class="form-control" required="required" name="nama_alat" id="nama_alat" 
     placeholder="Nama Alat">
       </div>

       <div class="form-group">
        <label for="spesifikasi">Spesifikasi</label>
  <input type="text" class="form-control" required="required" name="spesifikasi" id="spesifikasi" 
       placeholder="Spesifikasi">
       </div>

       <div class="form-group">
        <label for="tahun_alat">Tahun Alat</label>
  <input type="number" class="form-control" required="required" name="tahun_alat" id="tahun_alat" 
       placeholder="Tahun Alat">
       </div>

       <div class="form-group">
        <label for="harga_alat">Harga Alat</label>
  <input type="number" class="form-control" required="required" name="harga_alat" id="harga_alat" 
       placeholder="Harga Alat">
       </div>

       <div class="form-group">
        <label for="status">Status</label>
  <input type="text" class="form-control" required="required" name="status" id="status" 
       placeholder="Status">
       </div>

       <div class="form-group">
        <label for="alat_image">Alat Image</label>
  <input type="text" class="form-control" required="required" name="alat_image" id="alat_image" 
       placeholder="Alat Image">
       </div>

       <div class="form-group">
        <label for="kondisi_alat">Kondisi Alat</label>
  <input type="text" class="form-control" required="required" name="kondisi_alat" id="kondisi_alat" 
       placeholder="Kondisi Alat">
       </div>

       <div class="form-group">
        <label for="kalibrasi_alat">Kalibrasi Alat</label>
  <input type="text" class="form-control" required="required" name="kalibrasi_alat" id="kalibrasi_alat" 
       placeholder="Kalibrasi Alat">
       </div>
       
       <div class="form-group">
        <label for="jumlah_alat">Jumlah Alat</label>
  <input type="number" class="form-control" required="required" name="jumlah_alat" 
  id="jumlah_alat" placeholder="Jumlah Alat">
       </div>

       </div>
       <div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> 
        <button type="submit" class="btn btn-primary">Save </button>
       </div> 
      </div>
      <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <?php echo form_close(); ?>


