<!-- JavaScript -->
<script src="<?php echo base_url('assets');?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/AdminLTE-2.4.3/js/adminlte.min.js"></script>


<!--Data Tabel -->
<script src="<?php echo base_url('assets');?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets');?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
	$(function () {
		$('#example1').DataTable()
		$('#example2').DataTable({
			'paging'       :true,
			'lengthChange' :false,
			'searching'    :false,
			'ordering'     :true,
			'info'         :true,
			'autoWidth'    :false,
	    })
	})
</script>