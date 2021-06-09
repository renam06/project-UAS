<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detail Buku</title>
	<link rel="stylesheet" href="style-css.css">
</head>
<body>
	<?php 
		include "navbar2.php";
		include "koneksi.php";
		if(isset($_GET["id_buku"])) {
			$id_buku = $_GET["id_buku"];

			$query  = mysqli_query ($conn,"SELECT * FROM buku, penulis, penerbit, kategori WHERE buku.id_penulis=penulis.id_penulis AND buku.id_penerbit=penerbit.id_penerbit AND buku.id_kategori=kategori.id_kategori AND id_buku='$id_buku'");
		if ($data = mysqli_fetch_array($query)) {?>
		
	<div class="container text-dark">
		<div class="row">
			<div class="col-md-12 mt-3">
				<table cellpadding="6">
					<tr>
						<td>Buku</td>
						<td> / </td>
						<td><?php echo $data['nama_kategori'];?></td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="row mt-3">

			<!-- Foto buku, tombol pinjam buku, tombol tambah buku ke favorite -->
			<div class="col-md-4 text-center">
				<p><?="<img src='Foto Buku/$data[foto_buku]' width='264px' height='408px'/>";?></p>
				<table class="mt-4 mb-3 ml-4">
	    			<tr>
		   				<td>
		   					<form action="pinjam-buku.php" method="POST" enctype="multipart/form-data">
		   						<input type="text" name="username" value="<?php echo $_SESSION['username'];?>" hidden>
		   						<input type="text" name="id_buku" value="<?php echo $data['id_buku'];?>" hidden>
		   						<input type="date" name="tanggal_pinjam" value="<?php echo date("Y-m-d"); ?>" hidden>
		   					<button name="submit" type="submit" class="btn btn-info ml-3 p-2" style="width:3.4cm;">Pinjam Buku</a>
		   					</form>
		    			</td>
		    			<td>
		    				<form action="tambah-favorite.php" method="POST" enctype="multipart/form-data">
		    				<input type="text" name="username" value="<?php echo $_SESSION['username'];?>" hidden>
		   					<input type="text" name="id_buku" value="<?php echo $data['id_buku'];?>" hidden>
			    			<button type="submit" name="submit" class="btn btn-info p-2 ml-2" style="width:3.4cm;">Tambah ke <i class="bi bi-heart"></i></button>
			    			</form>
			    		</td>
	    			</tr>
	    		</table>
	    	</div>

	    	<!-- Keterangan Buku -->
	   		<div class="col-md-8 mt-3">
	   			<div class="border rounded shadow-sm p-3" style="margin-top:-0.5cm;height:12.7cm">
		    		<table class="table table-borderless">
		    			<tr>
		    				<td colspan="3" class=""><strong class="">KETERANGAN BUKU</strong></td>
		    			</tr>
		    			<tr class="border-top">
		    				<td style="width:4cm">Judul Buku</td>
		    				<td style="width:0.5cm">:</td>
		    				<td><?php echo $data['judul']; ?></td>
		    			</tr>
		    			<tr>
		    				<td>Penulis</td>
		    				<td>:</td>
		    				<td><?php echo $data['nama_penulis']; ?></td>
		    			</tr>
		    			<tr>
		    				<td>Tahun Terbit</td>
		    				<td>:</td>
		    				<td><?php echo $data['tahun_terbit']; ?></td>
		    			</tr>
		    			<tr>
		    				<td>Jumlah Halaman</td>
		    				<td>:</td>
		    				<td><?php echo $data['halaman']; ?> halaman</td>
		    			</tr>
		    			<tr>
		    				<td>Kategori</td>
		    				<td>:</td>
		    				<td><?php echo $data['nama_kategori']; ?></td>
		    			</tr>
		    			<tr>
		    				<td>Penerbit</td>
		    				<td>:</td>
		    				<td><?php echo $data['nama_penerbit']; ?></td>
		    			</tr>
		    			<tr>
		    				<td>Jumlah Buku</td>
		    				<td>:</td>
		    				<td><?php echo $data['stok']; ?></td>
		    			</tr>
		    			<tr>
		    				<td>Keterangan</td>
		    				<td>:</td>
		    				<td>Bisa dipinjam</td>
		    			</tr>
					</table>
				</div>
	    	</div>

	    	<!-- Tentang Buku / Deskripsi Buku -->
	    	<div class="col-md-12">
		    	<div class="border rounded shadow-sm mt-3 p-3">
		    		<strong>TENTANG BUKU</strong>
		   			<p class="border-top pt-3"><?php echo $data['keterangan'];?></p>
		   		</div>
		   	</div>
	   		<?php } } ?>
	   	</div></div>

	    <?php include "footer.php"; ?>
</body>
</html>