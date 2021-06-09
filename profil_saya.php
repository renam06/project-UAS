<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profil Saya</title>
</head>
<body>
	<?php include "navbar2.php";?>

	<div class="container">
		<div class="row mb-5">
			<div class="col-md-12 rounded shadow-sm ml-0 mt-3 mb-3 border">
				<?php 
					include "koneksi.php";
					$username = $_SESSION['username'];
					$query    = mysqli_query ($conn,"SELECT * FROM user WHERE user.username='$username'");

					if ($data = mysqli_fetch_array($query)) {
				?>
						<img src="bg_image1.jpg" style="width:30.11cm;height:3cm;margin-left:-0.39cm"><br>
						<div class="text-left mt-2" style="height:3cm;margin-left:5cm">
							<h5 class="color1"><?php echo $data['nama'];?></h5>
							<h6>@<?php echo $data['username'];?></h6>
						</div>

						<?php }
						include "koneksi.php";
						$username = $_SESSION['username'];
						$query    = mysqli_query ($conn,"SELECT * FROM user, anggota, admin, petugas WHERE user.username='$username' AND  anggota.username='$username' OR user.username='$username' AND  admin.username='$username' OR user.username='$username' AND  petugas.username='$username'");
						if ($data = mysqli_fetch_array($query)) {

						if($_SESSION['level']=="admin") { ?>
							<div class="ml-5 mb-3" style="margin-top:-4.5cm;">
								<?="<img src='Foto Admin/$data[foto_admin]' width='120px' height='120x'/>";?>
							</div>
						<?php } else if($_SESSION['level']=="pengguna") { ?>
							<div class="ml-5 mb-3" style="margin-top:-4.5cm;">
								<?="<img src='Foto Anggota/$data[foto_anggota]' width='120px' height='120x'/>";?>
							</div>
						<?php } else if($_SESSION['level']=="petugas") { ?>
							<div class="ml-5 mb-3" style="margin-top:-4.5cm;">
								<?="<img src='Foto Petugas/$data[foto_petugas]' width='120px' height='120x'/>";?>
							</div>
						<?php }}
 

					else { 
					
						include "koneksi.php";
						$username = $_SESSION['username'];
						$query    = mysqli_query ($conn,"SELECT * FROM user WHERE user.username='$username'");

					if ($data = mysqli_fetch_array($query)) {
				?>
						<img src="bg_image1.jpg" style="width:30.11cm;height:3cm;margin-left:-0.39cm"><br>

						<div class="ml-5" style="margin-top:-2cm;">
							<img src="foto.png" style="width:120px;height:120px">
						</div>

						<div class="text-left" style="height:3cm;margin-top:-0.8cm;margin-left:5cm">
							<h5 class="color1"><?php echo $data['nama'];?></h5>
							<h6>@<?php echo $data['username'];?></h6>
						</div>
				
				<?php } } ?>

				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
					<table>
						<?php	
			        		if ($_SESSION['level'] == "pengguna") { ?>

						<tr>
							<td class="pt-2 pb-2"><input type="submit" name="profile_pengguna" value="Profile Detail" class="btn btn-default"></td>
							<td class="pt-2 pb-2"><input type="submit" name="peminjaman_buku" value="Peminjaman Buku" class="btn btn-default"></td>
							<td class="pt-2 pb-2"><input type="submit" name="pengembalian_buku" value="Pengembalian Buku" class="btn btn-default"></td>
							<td class="pt-2 pb-2"><input type="submit" name="favorite" value="Buku Favorite" class="btn btn-default"></td>
						</tr>
					
					<?php } else if ($_SESSION['level'] == "admin") { ?>
						<tr>
							<td class="pt-2 pb-2"><input type="submit" name="profile_admin" value="Profile Detail" class="btn btn-default"></td>
							<td class="pt-2 pb-2"><input type="submit" name="peminjaman_buku" value="Peminjaman Buku" class="btn btn-default"></td>
							<td class="pt-2 pb-2"><input type="submit" name="pengembalian_buku" value="Pengembalian Buku" class="btn btn-default"></td>
							<td class="pt-2 pb-2"><input type="submit" name="anggota" value="Anggota" class="btn btn-default"></td>
						</tr>
						
					<?php } else if ($_SESSION['level'] == "petugas") { ?>
						<tr>
							<td class="pt-2 pb-2"><input type="submit" name="profile_petugas" value="Profile Detail" class="btn btn-default"></td>
							<td class="pt-2 pb-2"><input type="submit" name="dashboard" value="Dashboard" class="btn btn-default"></td>
							<td class="pt-2 pb-2"><input type="submit" name="buku" value="Buku" class="btn btn-default"></td>
							<td class="pt-2 pb-2"><input type="submit" name="kategori" value="Kategori" class="btn btn-default"></td>
							<td class="pt-2 pb-2"><input type="submit" name="penulis" value="Penulis" class="btn btn-default"></td>
							<td class="pt-2 pb-2"><input type="submit" name="penerbit" value="Penerbit" class="btn btn-default"></td>
						</tr>
						
					<?php } ?>

					</table>
				</form>
			</div>
	
			<!-- Dashboard -->	
			<div class="col-md-12 rounded shadow-sm border">
				<?php 
					include "koneksi.php";
					if (isset($_GET['dashboard'])) { ?>
					<h4 class="pt-4 pb-3 mermaid text-center">Dashboard</h4>

					<?php
						$data_buku     = mysqli_query($conn, "SELECT * FROM buku");
						$data_kategori = mysqli_query($conn, "SELECT * FROM kategori");
						$data_penulis  = mysqli_query($conn, "SELECT * FROM penulis");
						$data_penerbit = mysqli_query($conn, "SELECT * FROM penerbit");

						$jumlah_buku     = mysqli_num_rows($data_buku);
						$jumlah_kategori = mysqli_num_rows($data_kategori);
						$jumlah_penulis  = mysqli_num_rows($data_penulis);
						$jumlah_penerbit = mysqli_num_rows($data_penerbit);
					?>
					<table class="table table-borderless">
						<tr>
							<td>
								<div class="border rounded shadow-sm text-center p-3" style="width:6.4cm">
									<h5 class="color1">Buku</h5>
									<?php echo $jumlah_buku; ?> buku
								</div>
							</td>
							<td>
								<div class="border rounded shadow-sm text-center p-3" style="width:6.4cm">
									<h5 class="color1">Kategori</h5>
									<?php echo $jumlah_kategori; ?> kategori
								</div>
							</td>
							<td>
								<div class="border rounded shadow-sm text-center p-3" style="width:6.4cm">
									<h5 class="color1">Penulis</h5>
									<?php echo $jumlah_penulis; ?> penulis
								</div>
							</td>
							<td>
								<div class="border rounded shadow-sm text-center p-3" style="width:6.4cm">
									<h5 class="color1">Penerbit</h5>
									<?php echo $jumlah_penerbit; ?> penerbit
								</div>
							</td>
						</tr>
					</table>
				<?php } ?>
			
			<!-- Favorite -->	
			<?php 
				include "koneksi.php";
				if (isset($_GET['favorite'])) { ?>
				<h4 class="pt-4 pb-3 mermaid text-center">Favorite</h4>

				<table>
				<tr>
				<?php
					$username = $_SESSION['username'];
					$query = mysqli_query ($conn,"SELECT * FROM favorite WHERE username='$username'");
					if ($data = mysqli_fetch_array($query)) {
					$kolom = 4;
					$i     = 0;
                    $query = mysqli_query ($conn,"SELECT * FROM favorite, buku, penulis, kategori WHERE buku.id_kategori=kategori.id_kategori AND buku.id_penulis=penulis.id_penulis AND favorite.id_buku=buku.id_buku and favorite.username='$username' ");
				        
				    while ($data = mysqli_fetch_array($query)) {
				        if(($i) >= $kolom){
				 			echo "<tr></tr>";
			       			$i=0;
		        		}
			        	$i++;
			        ?>
			         <td>
			        	<div class="col-md-3 mb-2 mt-2">
	    				<div class="border-1 text-center" style="width:5cm;height:11cm;">
	    					
	    					<p class="ml-3">
	    						<input type="text" name="id_buku" value="<?php echo $data['id_buku'];?>" hidden>
	    							<?="<img src='Foto Buku/$data[foto_buku]' width='152px' height='234px'/>";?>
	    					</p>
	   						<div class="text-center">
	   							<?php echo $data['judul'];?><br>
	   							
	  							<?php echo $data['nama_penulis'];?><br>
	  							Kategori : <?php echo $data['nama_kategori'];?> <br>
	  						
	  						<a href="detail-buku.php?id_buku=<?php echo $data['id_buku'];?>">Lihat Detail</a>
	  						<a href="hapus-favorite.php?id_favorite=<?php echo $data['id_favorite'];?>" class="text-danger">Hapus</a>
	    					</div>
	    				</div>
	    			</td>
				<?php }} else { ?>
					<div class="text-center text-secondary m-5">Anda belum menambahkan buku favorite</div>
			<?php }} ?>
				</tr>
			</table>
			
			<!-- Anggota -->	
			<?php 
				include "koneksi.php";
				if (isset($_GET['anggota'])) { ?>
				<h4 class="pt-4 pb-3 mermaid text-center">Anggota</h4>

				<table class="table mr-auto ml-auto">
					<thead class="text-center">
						<th>No</th>
						<th>Foto Anggota</th>
						<th>Id Anggota</th>
						<th>Nama Anggota</th>
						<th>Tempat Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Pekerjaan</th>
					</thead>

					<tbody>
				<?php
					$query = mysqli_query ($conn,"SELECT * FROM anggota");
                    $no = 1;
				    while ($data = mysqli_fetch_array($query)) { ?>
				    	<tr class="text-center">
							<td><?php echo $no++;?></td>
							<td><?="<img src='Foto Anggota/$data[foto_anggota]' width='100px' height='100px'/>";?></td>
							<td><?php echo $data['id_anggota'];?></td>
							<td><?php echo $data['nama_lengkap'];?></td>
							<td><?php echo $data['tempat_lahir'];?>, <?php echo $data['tanggal_lahir'];?></td>
							<td><?php echo $data['jenis_kelamin'];?></td>
							<td><?php echo $data['pekerjaan'];?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php }?>

			<!-- Profile Pengguna -->	
			<?php 
				include "koneksi.php";
				if (isset($_GET['profile_pengguna'])) { ?>
				<h4 class="pt-4 pb-3 mermaid text-center">Profile Detail</h4>

				<?php
					$username = $_SESSION['username'];
					$query = mysqli_query ($conn,"SELECT * FROM anggota WHERE username='$username'");

					if ($data = mysqli_fetch_array($query)) { ?>

					<table class="table table-borderless" style="width:15cm">
						<tr>
							<td>Id Anggota</td>
							<td>:</td>
							<td><?php echo $data['id_anggota'];?></td>
						</tr>
						<tr>
							<td>Nama Lengkap</td>
							<td>:</td>
							<td><?php echo $data['nama_lengkap'];?></td>
						</tr>
						<tr>
							<td>Tempat Lahir</td>
							<td>:</td>
							<td><?php echo $data['tempat_lahir'];?></td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>:</td>
							<td><?php echo $data['tanggal_lahir'];?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?php echo $data['jenis_kelamin'];?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><?php echo $data['email'];?></td>
						</tr>
						<tr>
							<td>No Telepon</td>
							<td>:</td>
							<td><?php echo $data['no_tlp'];?></td>
						</tr>
					</table>
						
				<?php } else { ?>
					<div class="text-right p-3">
						<a href="tambah-anggota.php" class="btn btn-info text-white">Tambah Profile Detail</a>
					</div>
				<?php } }
				?>

			<!-- Profile Admin -->	
			<?php 
				include "koneksi.php";
				if (isset($_GET['profile_admin'])) { ?>
				<h4 class="pt-4 pb-3 mermaid text-center">Profile Detail</h4>

				<?php
					$username = $_SESSION['username'];
					$query = mysqli_query ($conn,"SELECT * FROM admin WHERE username='$username'");

					if ($data = mysqli_fetch_array($query)) { ?>

					<table class="table table-borderless" style="width:15cm">
						<tr>
							<td>Id Admin</td>
							<td>:</td>
							<td><?php echo $data['id_admin'];?></td>
						</tr>
						<tr>
							<td>Nama Lengkap</td>
							<td>:</td>
							<td><?php echo $data['nama_lengkap'];?></td>
						</tr>
						<tr>
							<td>Tempat Lahir</td>
							<td>:</td>
							<td><?php echo $data['tempat_lahir'];?></td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>:</td>
							<td><?php echo $data['tanggal_lahir'];?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?php echo $data['jenis_kelamin'];?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><?php echo $data['email'];?></td>
						</tr>
						<tr>
							<td>No Telepon</td>
							<td>:</td>
							<td><?php echo $data['no_tlp'];?></td>
						</tr>
					</table>
						
				<?php } else { ?>
					<div class="text-right p-3">
						<a href="tambah-admin.php" class="btn btn-info text-white">Tambah Profile Detail</a>
					</div>
				<?php } }
				?>

			<!-- Profile Petugas -->	
			<?php 
				include "koneksi.php";
				if (isset($_GET['profile_petugas'])) { ?>
				<h4 class="pt-4 pb-3 mermaid text-center">Profile Petugas</h4>

				<?php
					$username = $_SESSION['username'];
					$query = mysqli_query ($conn,"SELECT * FROM petugas WHERE username='$username'");

					if ($data = mysqli_fetch_array($query)) { ?>

					<table class="table table-borderless" style="width:15cm">
						<tr>
							<td>Id Petugas</td>
							<td>:</td>
							<td><?php echo $data['id_petugas'];?></td>
						</tr>
						<tr>
							<td>Nama Lengkap</td>
							<td>:</td>
							<td><?php echo $data['nama_lengkap'];?></td>
						</tr>
						<tr>
							<td>Tempat Lahir</td>
							<td>:</td>
							<td><?php echo $data['tempat_lahir'];?></td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>:</td>
							<td><?php echo $data['tanggal_lahir'];?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?php echo $data['jenis_kelamin'];?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><?php echo $data['email'];?></td>
						</tr>
						<tr>
							<td>No Telepon</td>
							<td>:</td>
							<td><?php echo $data['no_tlp'];?></td>
						</tr>
					</table>
						
				<?php } else { ?>
					<div class="text-right p-3">
						<a href="tambah-petugas.php" class="btn btn-info text-white">Tambah Profile Detail</a>
					</div>
				<?php } } 
				?>

			<!-- BUKU -->	
			<?php 
			if (isset($_GET['buku'])) { ?>
			<h4 class="pt-4 pb-4 mermaid text-center">Data Buku</h4>
			<div class="text-right m-3">
				<a href="tambah-buku.php" class="btn bg text-white">Tambah data buku</a>
			</div>
				<table class="table mr-auto ml-auto">
					<thead class="text-center">
						<th>No</th>
						<th>Foto Buku</th>
						<th>Judul Buku</th>
						<th>Kategori</th>
						<th>Penulis</th>
						<th>Penerbit</th>
						<th>Tahun Terbit</th>
						<th>Aksi</th>
						<th>Detail</th>
					</thead>

					<tbody class="text-center">
						<tr><?php
							$query = mysqli_query ($conn,"SELECT * FROM buku, penulis, kategori, penerbit WHERE buku.id_penulis=penulis.id_penulis AND buku.id_kategori=kategori.id_kategori AND buku.id_penerbit=penerbit.id_penerbit");
							$no = 1; ?>
						
						<?php 
							while ($data = mysqli_fetch_array($query)) { ?>

								<td><?php echo $no++;?></td>
								<td><?="<img src='Foto Buku/$data[foto_buku]' width='80px' height='120px'/>";?></td>
								<td><?php echo $data['judul'];?></td>
								<td><?php echo $data['nama_kategori'];?></td>
								<td><?php echo $data['nama_penulis'];?></td>
								<td><?php echo $data['nama_penerbit'];?></td>
								<td><?php echo $data['tahun_terbit'];?></td>
								<td>
									<a href="edit-buku.php?id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-light mr-2">Edit</a>
									<a href="hapus-buku.php?id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-info text-white" >Hapus</a>
								</td>
								<td><a href="detail-buku.php?id_buku=<?php echo $data['id_buku'];?>" class="btn btn-link">Detail buku</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php }?>

			<!-- KATEGORI -->	
			<?php 
			if (isset($_GET['kategori'])) { ?>
			<h4 class="pt-4 pb-4 mermaid text-center">Data Kategori (inner join buku)</h4>
			<div class="text-right m-3">
				<a href="tambah-kategori.php" class="btn bg text-white">Tambah data kategori</a>
			</div>
				<table class="table mr-auto ml-auto">
					<thead class="text-center">
						<th>No</th>
						<th>Judul</th>
						<th>Nama Kategori</th>
						<th>Aksi</th>
					</thead>

					<tbody class="text-center">
						<tr><?php
							$query = mysqli_query ($conn,"SELECT * FROM buku INNER JOIN kategori ON buku.id_kategori=kategori.id_kategori");
							$no = 1; ?>
						
						<?php 
							while ($data = mysqli_fetch_array($query)) { ?>

								<td><?php echo $no++;?></td>
								<td class="text-left"l><?php echo $data['judul'];?></td>
								<td><?php echo $data['nama_kategori'];?></td>
								<td>
									<a href="edit-kategori.php?id_kategori=<?php echo $data['id_kategori']; ?>" class="btn btn-light mr-2">Edit</a>
									<a href="hapus-kategori.php?id_kategori=<?php echo $data['id_kategori']; ?>" class="btn btn-info text-white" >Hapus</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php }?>
			
			<!-- PENULIS -->	
			<?php 
			if (isset($_GET['penulis'])) { ?>
			<h4 class="pt-4 pb-4 mermaid text-center">Data Penulis</h4>
			<div class="text-right m-3">
				<a href="tambah-penulis.php" class="btn bg text-white">Tambah data penulis</a>
			</div>
				<table class="table mr-auto ml-auto">
					<thead class="text-center">
						<th>No</th>
						<th>Foto Penulis</th>
						<th>Nama Penulis</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Pekerjaan</th>
						<th>Aksi</th>
						<th>Detail</th>
					</thead>

					<tbody class="text-center">
						<tr><?php
							$query = mysqli_query ($conn,"SELECT * FROM penulis");
							$no = 1; ?>
						
						<?php 
							while ($data = mysqli_fetch_array($query)) { ?>

								<td><?php echo $no++;?></td>
								<td><?="<img src='Foto Penulis/$data[foto_penulis]' width='90px' height='120px'/>";?></td>
								<td><?php echo $data['nama_penulis'];?></td>
								<td><?php echo $data['tempat_lahir'];?></td>
								<td><?php echo $data['tanggal_lahir'];?></td>
								<td><?php echo $data['pekerjaan'];?></td>
								<td>
									<a href="edit-penulis.php?id_penulis=<?php echo $data['id_penulis']; ?>" class="btn btn-light mr-2">Edit</a>
									<a href="hapus-penulis.php?id_penulis=<?php echo $data['id_penulis']; ?>" class="btn btn-info text-white" >Hapus</a>
								</td>
								<td><a href="detail-penulis.php?id_penulis=<?php echo $data['id_penulis'];?>" class="btn btn-link">Detail penulis</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php }?>

			<!-- PENERBIT -->	
			<?php 
			if (isset($_GET['penerbit'])) { ?>
			<h4 class="pt-4 pb-4 mermaid text-center">Data Penerbit</h4>
			<div class="text-right m-3">
				<a href="tambah-penerbit.php" class="btn bg text-white">Tambah data penerbit</a>
			</div>
				<table class="table mr-auto ml-auto">
					<thead class="text-center">
						<th>No</th>
						<th>Nama Penerbit</th>
						<th>Lokasi Penerbit</th>
						<th>Aksi</th>
						<th>Detail</th>
					</thead>

					<tbody class="text-center">
						<tr><?php
							$query = mysqli_query ($conn,"SELECT * FROM penerbit");
							$no = 1; ?>
						
						<?php 
							while ($data = mysqli_fetch_array($query)) { ?>

								<td><?php echo $no++;?></td>
								<td><?php echo $data['nama_penerbit'];?></td>
								<td><?php echo $data['lokasi_penerbit'];?></td>
								<td>
									<a href="edit-penerbit.php?id_penerbit=<?php echo $data['id_penerbit']; ?>" class="btn btn-light mr-2">Edit</a>
									<a href="hapus-penerbit.php?id_penerbit=<?php echo $data['id_penerbit']; ?>" class="btn btn-info text-white" >Hapus</a>
								</td>
								<td><a href="detail-penerbit.php?id_penerbit=<?php echo $data['id_penerbit'];?>" class="btn btn-link">Detail penerbit</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php } ?>

			<!-- Peminjaman Buku -->	
			<?php 
				include "koneksi.php";
				if (isset($_GET['peminjaman_buku'])) { ?>
				<h4 class="pt-4 pb-4 mermaid text-center">Peminjaman Buku</h4>
				<table class="table mr-auto ml-auto">
					<thead class="text-center">
						<th>No</th>
						<th>Id Anggota</th>
						<th>Nama</th>
						<th>Judul Buku</th>
						<th>Tanggal Pinjam</th>
						<th>Tanggal Kembali</th>
						<th>Id Admin</th>
					</thead>

					<tbody>
						<tr>		
						<?php
							if ($_SESSION['level'] == "pengguna") {

							$username = $_SESSION['username'];
							$query = mysqli_query ($conn,"SELECT * FROM peminjaman, anggota, buku WHERE peminjaman.username='$username' AND anggota.username='$username' AND peminjaman.id_buku=buku.id_buku");
							$no = 1; ?>
						
						<?php 
							while ($data = mysqli_fetch_array($query)) { ?>

								<td><?php echo $no++;?></td>
								<td><?php echo $data['id_anggota'];?></td>
								<td><?php echo $data['nama_lengkap'];?></td>
								<td><?php echo $data['judul'];?></td>
								<td><?php echo $data['tanggal_pinjam'];?></td>
								<td><?php echo $data['tanggal_kembali'];?></td>
								<td><?php echo $data['id_admin'];?></td>
							</tr>

						<?php }
						} else if ($_SESSION['level'] == "admin") { 

							$username = $_SESSION['username'];
							$query = mysqli_query ($conn,"SELECT * FROM peminjaman, anggota, buku WHERE peminjaman.username=anggota.username AND peminjaman.id_buku=buku.id_buku");
							$no = 1;
							while ($data = mysqli_fetch_array($query)) { ?>

								<td><?php echo $no++;?></td>
								<td><?php echo $data['id_anggota'];?></td>
								<td><?php echo $data['nama_lengkap'];?></td>
								<td><?php echo $data['judul'];?></td>
								<td><?php echo $data['tanggal_pinjam'];?></td>
								<td>
									<?php
										$tanggal_kembali = $data['tanggal_kembali'];
										if ($tanggal_kembali==NULL) { ?>
											<a href="input-tanggal-pengembalian.php?id_pinjam=<?php echo $data['id_pinjam'];?>" class="btn btn-info text-white">Input tanggal</a>
									<?php
										} else {
											echo $data['tanggal_kembali'];
										}
									 ?>
								</td>
								<td><?php echo $data['id_admin'];?></td>
							</tr>
							<?php } } ?>
					</tbody>
				</table>
				<?php } ?>

				<!-- Pengembalian Buku -->	
				<?php 
					include "koneksi.php";
					if (isset($_GET['pengembalian_buku'])) { ?>
					<h4 class="pt-4 pb-4 mermaid text-center">Pengembalian Buku</h4>
					<table class="table ml-auto mr-auto">
						<thead class="text-center">
							<th>No</th>
							<th>Id Anggota</th>
							<th>Nama</th>
							<th>Judul Buku</th>
							<th>Tanggal Kembali</th>
							<th>Telat</th>
							<th>Denda</th>
							<th>Id Admin</th>
						</thead>
						
						<tbody>
							<tr>
						<?php
							if ($_SESSION['level'] == "pengguna") {

							$username = $_SESSION['username'];
							$query = mysqli_query ($conn,"SELECT * FROM peminjaman, pengembalian, anggota, buku WHERE buku.id_buku=peminjaman.id_buku AND peminjaman.id_pinjam=pengembalian.id_pinjam AND peminjaman.username='$username' AND pengembalian.username='$username' AND anggota.username='$username'");
							$no = 1; ?>
						
						<?php 
							while ($data = mysqli_fetch_array($query)) { ?>

								<td><?php echo $no++;?></td>
								<td><?php echo $data['id_anggota'];?></td>
								<td><?php echo $data['nama_lengkap'];?></td>
								<td><?php echo $data['judul'];?></td>
								<td><?php echo $data['tanggal_kembali'];?></td>
								<td><?php
										$telat = $data['telat'];
										if ($telat==NULL) { ?>
									<?php
										} else {
											echo $data['telat']; echo " hari";
										}
									?>
								</td>
								<td><?php 
										$denda = $data['denda'];
										if ($denda==NULL){

										} else {
											echo "Rp "; echo $data['denda'];
										}
									?>
								</td>
								<td><?php echo $data['id_admin'];?></td>
							</tr>
						<?php }
						} else if ($_SESSION['level'] == "admin") {
						$query = mysqli_query ($conn,"SELECT * FROM peminjaman, pengembalian, anggota, buku WHERE peminjaman.id_pinjam=pengembalian.id_pinjam AND peminjaman.id_buku=buku.id_buku AND peminjaman.username=pengembalian.username AND pengembalian.username=anggota.username");
						$no = 1;
						while ($data = mysqli_fetch_array($query)) { ?>


								<td><?php echo $no++;?></td>
								<td><?php echo $data['id_anggota'];?></td>
								<td><?php echo $data['nama_lengkap'];?></td>
								<td><?php echo $data['judul'];?></td>
								<td><?php echo $data['tanggal_kembali'];?></td>
								<td><?php
										$telat = $data['telat'];
										if ($telat==NULL) { ?>
											<a href="input-telat-pengembalian.php?id_kembali=<?php echo $data['id_kembali'];?>" class="btn btn-info text-white">Input telat</a>
									<?php
										} else {
											echo $data['telat']; echo " hari";
										}
									?>
								</td>
								<td><?php 
										$denda = $data['denda'];
										if ($denda==NULL){

										} else {
											echo "Rp "; echo $data['denda'];
										}
									?>
								</td>
								<td><?php echo $data['id_admin'];?></td>
							</tr>
						<?php } }}?>
						</tbody>
					</table>
			</div>
		</div>	
	</div>
	<?php include "footer.php"; ?>
</body>
</html>