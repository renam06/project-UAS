<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Buku</title>
</head>
<body>
	<?php include "navbar2.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 border rounded shadow-sm mt-4 mb-4">
				<h4 class="pt-4 pb-3 mermaid text-center">Tambah Buku</h4>
				<form action="proses-tambah-buku.php" method="POST" enctype="multipart/form-data">
					<table class="table table-borderless"  style="width:17cm">
						<tr>
							<td>Id Kategori</td>
							<td>:</td>
							<td><input type="text" name="id_kategori" class="form-control"</td>
						</tr>
						<tr>
							<td>Judul</td>
							<td>:</td>
							<td><input type="text" name="judul" class="form-control"></td>
						</tr>
						<tr>
							<td>Id Penulis</td>
							<td>:</td>
							<td><input type="text" name="id_penulis" class="form-control"></td>
						</tr>
						<tr>
							<td>Id Penerbit</td>
							<td>:</td>
							<td><input type="text" name="id_penerbit" class="form-control"></td>
						</tr>
						<tr>
							<td>Tahun Terbit</td>
							<td>:</td>
							<td><input type="text" name="tahun_terbit" class="form-control"></td>
						</tr>
						<tr>
							<td>Halaman</td>
							<td>:</td>
							<td><input type="text" name="halaman" class="form-control"></td>
						</tr>
						<tr>
							<td>Foto Buku</td>
							<td>:</td>
							<td><input type="file" name="foto_buku"></td>
						</tr>
						<tr>
							<td>Stok</td>
							<td>:</td>
							<td><input type="text" name="stok" class="form-control"></td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td>:</td>
							<td><textarea name="keterangan" id="" cols="65" rows="5"></textarea></td>
						</tr>
					</table>
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