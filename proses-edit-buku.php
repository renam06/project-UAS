<?php
	include "koneksi.php"; 
	if(isset($_POST['ubah_foto'])) {
		$id_buku      = $_POST['id_buku'];
		$id_kategori  = $_POST['id_kategori'];
		$judul		  = $_POST['judul'];
		$id_penulis   = $_POST['id_penulis'];
		$id_penerbit  = $_POST['id_penerbit'];
		$tahun_terbit = $_POST['tahun_terbit'];
		$halaman      = $_POST['halaman'];
		$stok		  = $_POST['stok'];
		$keterangan   = $_POST['keterangan'];

		$ekstensi_diperbolehkan = array('png','jpg');
  		$foto_buku_baru         = $_FILES['foto_buku_baru']['name'];
		$x                      = explode('.',$foto_buku_baru);
  		$ekstensi               = strtolower(end($x));
  		$file_tmp               = $_FILES['foto_buku_baru']['tmp_name']; 

  		if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
  			move_uploaded_file($file_tmp, 'Foto Buku/'.$foto_buku_baru);
  			
			$query = "UPDATE buku SET id_kategori='$id_kategori',judul='$judul',id_penulis='$id_penulis',id_penerbit='$id_penerbit',tahun_terbit='$tahun_terbit',halaman='$halaman',foto_buku='$foto_buku_baru',stok='$stok',keterangan='$keteranagn' WHERE id_buku='$id_buku'";
			$result = mysqli_query($conn,$query);

			if ($result) {
				header("Location:profil_saya.php?buku=Buku");
			}
			else {
				echo "Gagal ditambahkan";
			}
		}	

	} else {
		$id_buku      = $_POST['id_buku'];
		$id_kategori  = $_POST['id_kategori'];
		$judul		  = $_POST['judul'];
		$id_penulis   = $_POST['id_penulis'];
		$id_penerbit  = $_POST['id_penerbit'];
		$tahun_terbit = $_POST['tahun_terbit'];
		$halaman      = $_POST['halaman'];
		$stok		  = $_POST['stok'];
		$keterangan   = $_POST['keterangan'];
		
		echo $keterangan;
		$query = "UPDATE buku SET id_kategori='$id_kategori', judul='$judul', id_penulis='$id_penulis', id_penerbit='$id_penerbit', tahun_terbit='$tahun_terbit', halaman='$halaman', stok='$stok', keterangan='$keterangan' WHERE id_buku='$id_buku'";
		$result = mysqli_query($conn,$query);

		if ($result) {
				header("Location:profil_saya.php?buku=Buku");
		}
		else {
				echo "Gagal ditambahkan";
		}
	}
?>