<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Penerbit</title>
</head>
<body>
	<?php include "navbar2.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 border rounded shadow-sm mt-4 mb-4">
				<h4 class="pt-4 pb-3 mermaid text-center font-weight-bold">Tambah Penerbit</h4>
				<form action="proses-tambah-penerbit.php" method="POST" enctype="multipart/form-data">
					<table class="table table-borderless"  style="width:15cm">
						<tr>
							<td>Nama Penerbit</td>
							<td>:</td>
							<td><input type="text" name="nama_penerbit" class="form-control"</td>
						</tr>
						<tr>
							<td>Lokasi Penerbit</td>
							<td>:</td>
							<td><input type="text" name="lokasi_penerbit" class="form-control"></td>
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