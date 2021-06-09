<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Buku</title>
</head>
<body>
	<?php include "navbar2.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 border rounded shadow-sm mt-4 mb-4">
				<h4 class="pt-4 pb-3 mermaid text-center">Edit Buku</h4>
				
				<?php
					include "koneksi.php";
					if(isset($_GET['id_buku'])) {
						$id_buku = $_GET['id_buku'];
					
						$query = mysqli_query($conn,"SELECT * FROM buku, penulis, kategori, penerbit WHERE buku.id_penulis=penulis.id_penulis AND buku.id_penerbit=penerbit.id_penerbit AND buku.id_kategori=kategori.id_kategori AND id_buku='$id_buku' ");
						if ($data = mysqli_fetch_array($query)) { 
				?>	
				<form action="proses-edit-buku.php" method="POST" enctype="multipart/form-data">
					<table class="table table-borderless" style="width:15cm">
						<tr>
							<td>Id Kategori</td>
							<td>:</td>
							<td><input type="text" name="id_kategori" class="form-control" value="<?php echo $data['id_kategori']; ?>"></td>
						</tr>
						<tr>
							<td>Judul</td>
							<td>:</td>
							<td><input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>"></td>
						</tr>
						<tr>
							<td>Id Penulis</td>
							<td>:</td>
							<td><input type="text" name="id_penulis" class="form-control" value="<?php echo $data['id_penulis']; ?>"></td>
						</tr>
						<tr>
							<td>Id Penerbit</td>
							<td>:</td>
							<td><input type="text" name="id_penerbit" class="form-control" value="<?php echo $data['id_penerbit']; ?>"></td>
						</tr>
						<tr>
							<td>Tahun Terbit</td>
							<td>:</td>
							<td><input type="text" name="tahun_terbit" class="form-control" value="<?php echo $data['tahun_terbit']; ?>"></td>
						</tr>
						<tr>
							<td>Halaman</td>
							<td>:</td>
							<td><input type="text" name="halaman" class="form-control" value="<?php echo $data['halaman']; ?>"></td>
						</tr>
						<tr>
							<td>Foto Buku</td>
							<td>:</td>
							<td><input type="file" name="foto_buku_baru"><br></td>
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
								<?="<img src='Foto Buku/$data[foto_buku]' width='120px' height='180px'/>";?>
							</td>
						</tr>
						<tr>
							<td>Stok</td>
							<td>:</td>
							<td><input type="text" name="stok" class="form-control" value="<?php echo $data['stok']; ?>"></td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td>:</td>
							<td><input type="text" name="keterangan" class="form-control" value="<?php echo $data['keterangan']; ?>"></td>
						</tr>
					</table>
					<input type="text" name="id_buku" value="<?php echo $id_buku; ?>" hidden>
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