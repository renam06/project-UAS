<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Anggota</title>
</head>
<body>
	<?php include "navbar2.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 border rounded shadow-sm mt-4 mb-4">
				<h4 class="pt-4 pb-3 mermaid text-center">Edit Data Anggota</h4>
				
				<?php
					include "koneksi.php";
					if(isset($_GET['username'])) {
						$username = $_GET['username'];
					
						$query = mysqli_query($conn,"SELECT * FROM anggota WHERE username='$username'");
						if ($data = mysqli_fetch_array($query)) { 
				?>	
				<form action="proses-edit-anggota.php" method="POST" enctype="multipart/form-data">
					<table class="table table-borderless" style="width:15cm">
						<tr>
							<td>Nama Lengkap</td>
							<td>:</td>
							<td><input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap'];?>" class="form-control"</td>
						</tr>
						<tr>
							<td>Foto</td>
							<td>:</td>
							<td><input type="file" name="foto_anggota_baru"></td>
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
								<?="<img src='Foto Penulis/$data[foto_anggota]' width='100px' height='100px'/>";?>
							</td>
						</tr>
						<tr>
							<td>Tempat Lahir</td>
							<td>:</td>
							<td><input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir'];?>" class="form-control"></td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>:</td>
							<td><input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir'];?>" class="form-control"></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td>
								<select type="input" name="jenis_kelamin" class="form-control" value="<?php echo $data['jenis_kelamin'];?>" style="width:5cm">
							    	<option value="Perempuan">Perempuan</option>
									<option value="Laki-laki">Laki-laki</option>
								</select> 
							</td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><input type="text" name="pekerjaan" value="<?php echo $data['pekerjaan'];?>" class="form-control"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><input type="text" name="email" value="<?php echo $data['email'];?>" class="form-control"></td>
						</tr>
						<tr>
							<td>No Telepon</td>
							<td>:</td>
							<td><input type="text" name="no_tlp" value="<?php echo $data['no_tlp'];?>" class="form-control"></td>
						</tr>
					</table>
					<input type="text" name="username" value="<?php echo $username; ?>" hidden>
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