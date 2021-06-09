<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Input Tanggal Pengembalian Buku</title>
</head>
<body>
	<?php include "navbar2.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 border rounded shadow-sm mt-4 mb-4">
				<h4 class="pt-4 pb-3 mermaid text-center">Input Tanggal Pengembalian Buku</h4>
				<form action="proses-input-tanggal-pengembalian.php" method="POST" enctype="multipart/form-data">
					<?php
						$username = $_SESSION['username'];
						$query = mysqli_query($conn,"SELECT * FROM admin WHERE admin.username='$username'");
							
						if ($data = mysqli_fetch_array($query)) {
							$id_admin = $data['id_admin']; ?>

							<input type="text" name="id_admin" value="<?php echo $id_admin;?>" hidden>
					<?php } ?>
					<?php 
						include "koneksi.php";
						$id_pinjam = $_GET['id_pinjam'];
						$query = mysqli_query($conn,"SELECT * FROM peminjaman, anggota, buku WHERE peminjaman.username=anggota.username AND peminjaman.id_buku=buku.id_buku AND id_pinjam='$id_pinjam'");
						if ($data = mysqli_fetch_array($query)) {
					?>
					<table class="table table-borderless"  style="width:15cm">
						<input type="text" name="id_pinjam" value="<?php echo $id_pinjam;?>" hidden>
						<input type="text" name="username" value="<?php echo $data['username'];?>" hidden>
						<tr>
							<td>Id Anggota</td>
							<td>:</td>
							<td><input type="text" name="id_anggota" value="<?php echo $data['id_anggota'];?>" class="form-control" disabled></td>
						</tr>
						<tr>
							<td>Nama Anggota</td>
							<td>:</td>
							<td><input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap'];?>" class="form-control" disabled></td>
						</tr>
						<tr>
							<td>Judul Buku</td>
							<td>:</td>
							<td><input type="text" name="judul" value="<?php echo $data['judul'];?>" class="form-control" disabled></td>
						</tr>
						<tr>
							<td>Tanggal Pinjam</td>
							<td>:</td>
							<td><input type="text" name="tanggal_pinjam" value="<?php echo $data['tanggal_pinjam'];?>" class="form-control" disabled></td>
						</tr>
						<tr>
							<td>Tanggal Kembali</td>
							<td>:</td>
							<td><input type="date" name="tanggal_kembali" value="<?php echo $data['tanggal_kembali'];?>" class="form-control"></td>
						</tr>
					</table>
					<div class="text-right p-3">
						<button class="btn btn-info text-white" type="submit" name="submit">Input</button>
					</div>
				<?php } ?>
				</form>
			</div>
</body>
</html>