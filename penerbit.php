<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Penerbit</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include "navbar2.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 border rounded shadow-sm mt-4 mb-4">
				<h3 class="pt-4 pb-3 mermaid text-center">Data Penerbit</h3>
				<table class="table">
					<thead class="text-center">
						<th>No</th>
						<th>Nama Penerbit</th>
						<th>Lokasi Penerbit</th>
						<th>Detail</th>
					</thead>
				
					<?php
						include "koneksi.php";
						$query = mysqli_query($conn,"SELECT * FROM penerbit");
						$no = 1;
						while ($data = mysqli_fetch_array($query)) { 
					?>	

					<tbody>
						<tr class="text-center">
							<td><?php echo $no++;?></td>
							<td><?php echo $data['nama_penerbit']; ?></td>
							<td><?php echo $data['lokasi_penerbit']; ?></td>
							<td>
								<a href="detail-penerbit.php?id_penerbit=<?php echo $data['id_penerbit']; ?>" class="btn btn-info text-white mr-2">Detail</a>
							</td>
						</tr>
					</tbody>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
	<?php include "footer.php"; ?>
</body>
</html>