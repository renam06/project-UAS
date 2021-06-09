<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Anggota</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include "navbar2.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 border rounded shadow-sm mt-4 mb-4">
				<h3 class="pt-4 pb-3 mermaid text-center">Data Anggota</h3>
				<table class="table" style="font-size:13px">
					<thead class="text-center">
						<th>No</th>
						<th>Id Anggota</th>
						<th>Nama Anggota</th>
						<th>Foto Anggota</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Pekerjaan</th>
						<th>Email</th>
						<th>No Telepon</th>
						<th>Aksi</th>
					</thead>
				
					<?php
						include "koneksi.php";
						$query = mysqli_query($conn,"SELECT * FROM anggota");
						$no = 1;
						while ($data = mysqli_fetch_array($query)) { 
					?>	

					<tbody>
						<tr class="text-center">
							<td><?php echo $no++;?></td>
							<td><?php echo $data['id_anggota']; ?></td>
							<td><?php echo $data['nama_lengkap']; ?></td>
							<td><?="<img src='Foto Penulis/$data[foto_anggota]' width='100px' height='100px'/>";?></td>
							<td><?php echo $data['tempat_lahir']; ?></td>
							<td><?php echo $data['tanggal_lahir']; ?></td>
							<td><?php echo $data['jenis_kelamin']; ?></td>
							<td><?php echo $data['pekerjaan']; ?></td>
							<td><?php echo $data['email']; ?></td>
							<td><?php echo $data['no_tlp']; ?></td>
							<td><a href="edit-anggota.php?username=<?php echo $data['username']; ?>" class="btn btn-light mr-2">Edit</a></td>
						</tr>
					</tbody>
				<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>