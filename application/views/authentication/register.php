
<div class="login-box">
	<div class="login-logo">
		<a href="<?php echo base_url(); ?>"><b><?php echo $site['nama_website']; ?></b></a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg text-bold"> Lengkapi Data Registrasi Dengan Benar</p>
		<form method="post" action="<?php echo base_url('auth/register'); ?>" role="login">
			<div class="form-group has-feedback">
				<input type="text" name="username" class="form-control" required minlength="5" value="<?= set_value('username'); ?>" placeholder="Username" />
				<span class="glyphicon  glyphicon-user form-control-feedback"></span>
				<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
			<div class="form-group has-feedback">
				<input type="text" name="first_name" class="form-control" required minlength="5" value="<?= set_value('first_name'); ?>" placeholder="Nama Depan" />
				<span class="glyphicon  glyphicon-user form-control-feedback"></span>
				<?= form_error('first_name', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
			<div class="form-group has-feedback">
				<input type="text" name="last_name" class="form-control" required minlength="5" value="<?= set_value('last_name'); ?>" placeholder="Nama Belakang" />
				<span class="glyphicon  glyphicon-user form-control-feedback"></span>
				<?= form_error('last_name', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
			<div class="form-group has-feedback">
				<input type="number" name="phone" class="form-control" required minlength="5" value="<?= set_value('phone'); ?>" placeholder="No Telp" />
				<span class="glyphicon  glyphicon-phone form-control-feedback"></span>
				<?= form_error('pnohe', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
			<div class="form-group has-feedback">
				<input type="email" name="email" class="form-control" required minlength="5" value="<?= set_value('email'); ?>" placeholder="Email" />
				<span class="glyphicon  glyphicon-envelope form-control-feedback"></span>
				<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="password" class="form-control" required minlength="5" placeholder="Password" />
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="passwordkonfirmasi" class="form-control" required minlength="5" placeholder="Konfirmasi Password" />
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6" style="padding-bottom: 5px">
					<button type="submit" name="submit" value="register" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Register</button>
				</div>
			</div>
			<a href="<?php echo base_url('auth/login'); ?>"> Sudah Punya Akun (LOGIN)</a>

		</form>

	</div>
	<div id="myalert">
		<?php echo $this->session->flashdata('alert', true); ?>
	</div>
	<br>


<script>
	$(function() {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
	$('#myalert').delay('slow').slideDown('slow').delay(4100).slideUp(600);
</script>
