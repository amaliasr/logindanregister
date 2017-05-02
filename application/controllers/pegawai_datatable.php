<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="page-header" class="y" >
			  <font face="Hirakatana" align="center"><h1>Nakame Site</h1></font>
			  </div>
			  <ul class="nav nav-tabs" align="center">
			    <li role="presentation"  ><a href="<?php echo site_url()?>/home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
			    <li role="presentation" class="active"><a href="<?php echo site_url()?>/pegawai"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Daftar Pegawai</a></li>
			        <form class="navbar-form navbar-right" >
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search">
			        </div>
			        <button type="submit" class="btn btn-default">Submit</button>
			        </form>
			  </ul><!-- /.navbar-collapse --></div>


					</div>
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
							
						</div>	
					<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10" align="center">
						<h1>Daftar Pegawai	<a href="<?php echo site_url('pegawai/create') ?>" type="button" class="btn btn-danger">Daftar</a></h1>
						<div class="table-responsive" align="center">
							<table class="table table-hover" align="center">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Nip</th>
										<th>Tanggal Lahir</th>
										<th>Link</th>
										<th>Gambar</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($pegawai_list as $key) { ?>
									<tr>
										<td><?php echo $key->nama ?></td>
										<td><?php echo $key->nip ?></td>
										<td><?php echo $key->tanggalLahir ?></td>
										<td><img src="<?php echo base_url('/assets/uploads/').$key->foto ?>" width="50" height="50" ></td>
										<td>
											<a href="<?php echo site_url('jabatan/index/').$key->id ?>" type="button" class="btn btn-info">Jabatan</a>
											<a href="<?php echo site_url('anak/index/').$key->id ?>" type="button" class="btn btn-success">Anak</a>
										</td>
										<td>
											<a href="<?php echo site_url('pegawai/update/').$key->id ?>" type="button" class="btn btn-info">Edit</a>
											<a href="<?php echo site_url('pegawai/delete/').$key->id ?>" onclick="return confirm('Hapus Data?')" type="button" class="btn btn-success">Delete</a>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>