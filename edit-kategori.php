<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Kategori</title>
</head>
<body>
	<?php include "navbar2.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 border rounded shadow-sm mt-4 mb-4">
				<h4 class="pt-4 pb-3 mermaid text-center">Edit Kategori</h4>
				
				<?php
					include "koneksi.php";
					if(isset($_GET['id_kategori'])) {
						$id_kategori = $_GET['id_kategori'];
					
						$query = mysqli_query($conn,"SELECT * FROM kategori WHERE id_kategori='$id_kategori'");
						if ($data = mysqli_fetch_array($query)) { 
				?>	
				<form action="proses-edit-kategori.php" method="POST" enctype="multipart/form-data">
					<table class="table table-borderless" style="width:15cm">
						<tr>
							<td>Id Kategori</td>
							<td>:</td>
							<td><input type="text" name="id_kategori" class="form-control" value="<?php echo $data['id_kategori']; ?>" dissabled></td>
						</tr>
						<tr>
							<td>Nama Kategori</td>
							<td>:</td>
							<td><input type="text" name="nama_kategori" class="form-control" value="<?php echo $data['nama_kategori']; ?>"></td>
						</tr>
					</table>
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