<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Data Admin</title>
</head>
<body>
	<?php include "navbar2.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 border rounded shadow-sm mt-4 mb-4">
				<h4 class="pt-4 pb-3 mermaid text-center">Tambah Data Admin</h4>
				<form action="proses-tambah-admin.php" method="POST" enctype="multipart/form-data">
					<?php 
						include "koneksi.php";
						$username = $_SESSION['username'];
						$query = mysqli_query($conn,"SELECT * FROM user WHERE username='$username'");
						if ($data = mysqli_fetch_array($query)) {
					?>
					<table class="table table-borderless"  style="width:15cm">
						<tr>
							<td>Nama Lengkap</td>
							<td>:</td>
							<td><input type="text" name="nama_lengkap" value="<?php echo $data['nama'];?>" class="form-control"</td>
						</tr>
						<tr>
							<td>Foto</td>
							<td>:</td>
							<td><input type="file" name="foto_admin"></td>
						</tr>
						<tr>
							<td>Tempat Lahir</td>
							<td>:</td>
							<td><input type="text" name="tempat_lahir" class="form-control"></td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>:</td>
							<td><input type="date" name="tanggal_lahir" class="form-control"></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td>
								<select type="input" name="jenis_kelamin" class="form-control" style="width:5cm">
							    	<option value="Perempuan">Perempuan</option>
									<option value="Laki-laki">Laki-laki</option>
								</select> 
							</td>
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
					<?php } ?>
					<input type="text" name='username' value="<?php echo $data['username'];?>" hidden>
					<div class="text-right m-3">
						<button class="btn btn-info text-white" type="submit" name="submit">
						Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>