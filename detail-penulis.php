<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detail Penulis</title>
</head>
<body>
	<?php 
		include "navbar2.php";
		include "koneksi.php";
		if(isset($_GET["id_penulis"])) {
			$id_penulis = $_GET["id_penulis"];

			$query  = mysqli_query ($conn,"SELECT * FROM penulis WHERE id_penulis='$id_penulis'");
			if ($data = mysqli_fetch_array($query)) {?>
		
	<div class="container text-dark">
		<div class="row mt-3">
			<div class="col-md-3 p-3 text-center">
				<p><?="<img src='Foto Penulis/$data[foto_penulis]' width='220px' height='290px'/>";?></p>
	    	</div>

	    	<!-- Keterangan Buku -->
	   		<div class="col-md-9 mt-3">
	   			<div class="border rounded shadow-sm p-3">
		    		<table class="table table-borderless">
		    			<tr>
		    				<td colspan="3" class=""><strong class="">BIODATA PENULIS</strong></td>
		    			</tr>
		    			<tr class="border-top">
		    				<td style="width:4cm">Nama Penulis</td>
		    				<td style="width:0.5cm">:</td>
		    				<td><?php echo $data['nama_penulis']; ?></td>
		    			</tr>
		    			<tr>
		    				<td>Tempat Lahir</td>
		    				<td>:</td>
		    				<td><?php echo $data['tempat_lahir']; ?></td>
		    			</tr>
		    			<tr>
		    				<td>Tanggal Lahir</td>
		    				<td>:</td>
		    				<td><?php echo $data['tanggal_lahir']; ?></td>
		    			</tr>
		    			<tr>
		    				<td>Pekerjaan</td>
		    				<td>:</td>
		    				<td><?php echo $data['pekerjaan']; ?></td>
		    			</tr>
					</table>
				</div>
	    	</div>

	    	<!-- Tentang Buku / Deskripsi Buku -->
	    	<div class="col-md-12">
		    	<div class="border rounded shadow-sm mt-3 p-3">
		    		<h4 class="text-center mermaid p-4">Karya Penulis</h4>
		    			
		    		<table class="table">
		    			<thead class="text-center">
		    				<th>No</th>
		    				<th>Foto Buku</th>
		    				<th>Judul Buku</th>
		    				<th>Kategori</th>
		    				<th>Penerbit</th>
		    				<th>Tahun Terbit</th>
		    				<th>Halaman</th>
		    			</thead>
		    			<tbody>
		    				<?php 
		    				    $query = mysqli_query ($conn,"SELECT * FROM buku, penulis, penerbit, kategori WHERE buku.id_kategori=kategori.id_kategori AND buku.id_penulis='$id_penulis' AND penulis.id_penulis='$id_penulis' AND buku.id_penerbit=penerbit.id_penerbit ");
				                $no = 1;
				                while ($data = mysqli_fetch_array($query)) { ?>
				                <tr class="text-center">
				                	<td><?php echo $no++;?></td>
				                	<td><?="<img src='Foto Buku/$data[foto_buku]' width='130px' height='180px'/>";?></td>
				                	<td><?php echo $data['judul'];?></td>
				                	<td><?php echo $data['nama_kategori'];?></td>
				                	<td><?php echo $data['nama_penerbit'];?></td>
				                	<td><?php echo $data['tahun_terbit'];?></td>
				                	<td><?php echo $data['halaman'];?> halaman</td>
				                </tr>
				            <?php } ?>
		    			</tbody>
		    		</table>
		   		</div>
		   	</div>
	   		<?php } } ?>
	   	</div></div>

	    <?php include "footer.php"; ?>
</body>
</html>