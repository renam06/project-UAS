<?php
	include "koneksi.php";
	if(isset($_POST['submit'])){
		$id_kategori  = $_POST['id_kategori'];
		$judul		  = $_POST['judul'];
		$id_penulis   = $_POST['id_penulis'];
		$id_penerbit  = $_POST['id_penerbit'];
		$tahun_terbit = $_POST['tahun_terbit'];
		$halaman      = $_POST['halaman'];
		$stok		  = $_POST['stok'];
		$keterangan   = $_POST['keterangan'];

		$ekstensi_diperbolehkan = array('png','jpg');
  		$foto_buku              = $_FILES['foto_buku']['name'];
		$x                      = explode('.',$foto_buku);
  		$ekstensi               = strtolower(end($x));
  		$file_tmp               = $_FILES['foto_buku']['tmp_name'];

  		if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
  			move_uploaded_file($file_tmp, 'Foto Buku/'.$foto_buku);

			$query = "INSERT INTO buku (id_kategori,judul,id_penulis,id_penerbit,tahun_terbit,halaman,foto_buku,stok,keterangan) VALUES ('$id_kategori','$judul','$id_penulis','$id_penerbit','$tahun_terbit','$halaman','$foto_buku','$stok','$keterangan')";
			$result = mysqli_query($conn,$query);

			if ($result) {
				header("Location:profil_saya.php?buku=Buku");
			}
			else {
				echo "Gagal ditambahkan";
			}
		}	
	}
?>