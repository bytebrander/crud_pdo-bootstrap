<?php 
include "db.php";

$result ="SELECT * FROM datasiswa";
$data = $link->query($result);
$data->execute();
// ambil data
$result = $data->fetchAll();

 ?>

 <html>
	 <head>
	 	<title>crud pdo</title>
	 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	 </head>
	 <body>
	 	<div class="row">
	 		<div class="col-md-12">
	 			<h2><b>DATA SISWA</b></h2>	
			 	<h4>Tahun Ajaran 2010/2011</h4>
			 	<a href="tambah.php" class="btn btn-info" role="button">Tambah Data</a>
			 	<table class="table table-hover" border="1" style="margin-top: 10px;">
			 		<tr class="success"">
			 			<td>input</td>
			 			<td>Nama</td>
			 			<td>Kelas</td>
			 			<td>Jurusan</td>
			 			<td>Jenis Kelamin</td>
			 			<td>Alamat</td>
			 			<td>Opsi</td>
			 		</tr>

			 		<?php 
			 		foreach ($result as $key => $value) {
			 		 ?>
					<tr>
						<td><?php echo $value['id']; ?></td>
						<td><?php echo $value['nama']; ?></td>
						<td><?php echo $value['kelas']; ?></td>
						<td><?php echo $value['jurusan']; ?></td>
						<td><?php echo $value['jenis_kelamin']; ?></td>
						<td><?php echo $value['alamat']; ?></td>
						<td>
							<a href="edit.php?idTest=<?php echo $value['id']?>" class="btn btn-primary" role="button">Edit</a>
							<a href="hapus.php?idTest=<?php echo $value['id']?>" class="btn btn-danger" role="button">Hapus</a>
						</td>
					</tr>
			 		 <?php } ?>
			 	</table>
	 		</div>
	 	</div>
	 </body>
	 <script src="js/bootstrap.min.js"></script>
	 <script src="js/jquery-2.2.3.min.js"></script>
 </html>