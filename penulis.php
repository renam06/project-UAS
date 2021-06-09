<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Penulis</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include "navbar2.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 border rounded shadow-sm mt-4 mb-4">
				<h3 class="pt-4 pb-3 mermaid text-center">Data Penulis</h3>
				<table class="table">
					<thead class="text-center">
						<th>No</th>
						<th>Nama Penulis</th>
						<th>Foto Penulis</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Pekerjaan</th>
						<th>Detail</th>
					</thead>
				
					<?php
						include "koneksi.php";
						$query = mysqli_query($conn,"SELECT * FROM penulis");
						$no = 1;
						while ($data = mysqli_fetch_array($query)) { 
					?>	

					<tbody>
						<tr class="text-center">
							<td><?php echo $no++;?></td>
							<td><?php echo $data['nama_penulis']; ?></td>
							<td><?="<img src='Foto Penulis/$data[foto_penulis]' width='130px' height='180px'/>";?></td>
							<td><?php echo $data['tempat_lahir']; ?></td>
							<td><?php echo $data['tanggal_lahir']; ?></td>
							<td><?php echo $data['pekerjaan']; ?></td>
							<td>
								<a href="detail-penulis.php?id_penulis=<?php echo $data['id_penulis']; ?>" class="btn btn-in fo text-white mr-2">Detail</a>
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