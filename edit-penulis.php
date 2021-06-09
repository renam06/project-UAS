<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Penulis</title>
</head>
<body>
	<?php include "navbar2.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 border rounded shadow-sm mt-4 mb-4">
				<h4 class="pt-4 pb-3 mermaid text-center">Edit Penulis</h4>
				
				<?php
					include "koneksi.php";
					if(isset($_GET['id_penulis'])) {
						$id_penulis = $_GET['id_penulis'];
					
						$query = mysqli_query($conn,"SELECT * FROM penulis WHERE id_penulis='$id_penulis'");
						if ($data = mysqli_fetch_array($query)) { 
				?>	
				<form action="proses-edit-penulis.php" method="POST" enctype="multipart/form-data">
					<table class="table table-borderless" style="width:15cm">
						<tr>
							<td>Nama Penulis</td>
							<td>:</td>
							<td><input type="text" name="nama_penulis" class="form-control" value="<?php echo $data['nama_penulis']; ?>"></td>
						</tr>
						<tr>
							<td>Foto Penulis</td>
							<td>:</td>
							<td><input type="file" name="foto_penulis_baru"><br></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<input type="checkbox" name="ubah_foto"> Ceklis jika anda ingin mengubah foto <br>
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<?="<img src='Foto Penulis/$data[foto_penulis]' width='100px' height='100px'/>";?>
							</td>
						</tr>
						<tr>
							<td>Tempat Lahir</td>
							<td>:</td>
							<td><input type="text" name="tempat_lahir" class="form-control" value="<?php echo $data['tempat_lahir']; ?>"></td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>:</td>
							<td><input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>"></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><input type="text" name="pekerjaan" class="form-control" value="<?php echo $data['pekerjaan']; ?>"></td>
						</tr>
					</table>
					<input type="text" name="id_penulis" value="<?php echo $id_penulis; ?>" hidden>
					<div class="text-right p-3">
						<button type="submit" name="submit" class="btn btn-info text-white">Simpan</button>
					</div>
				</form>
			<?php } } ?>
			</div>
		</div>
	</div>
</body>
</html>