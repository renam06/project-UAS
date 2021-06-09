<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Penerbit</title>
</head>
<body>
	<?php include "navbar2.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 border rounded shadow-sm mt-4 mb-4">
				<h4 class="pt-4 pb-3 mermaid text-center">Edit Penerbit</h4>
				
				<?php
					include "koneksi.php";
					if(isset($_GET['id_penerbit'])) {
						$id_penerbit = $_GET['id_penerbit'];
					
						$query = mysqli_query($conn,"SELECT * FROM penerbit WHERE id_penerbit='$id_penerbit'");
						if ($data = mysqli_fetch_array($query)) { 
				?>	
				<form action="proses-edit-penerbit.php" method="POST" enctype="multipart/form-data">
					<table class="table table-borderless" style="width:15cm">
						<tr>
							<td>Nama Penerbit</td>
							<td>:</td>
							<td><input type="text" name="nama_penerbit" class="form-control" value="<?php echo $data['nama_penerbit']; ?>"></td>
						</tr>
						<tr>
							<td>Lokasi Penerbit</td>
							<td>:</td>
							<td><input type="text" name="lokasi_penerbit" class="form-control" value="<?php echo $data['lokasi_penerbit']; ?>"></td>
						</tr>
					</table>
					<input type="text" name="id_penerbit" value="<?php echo $id_penerbit; ?>" hidden>
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