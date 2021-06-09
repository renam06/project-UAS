<?php
	include "koneksi.php"; 
	if(isset($_POST['id_kategori'])) {
		$id_kategori    = $_POST['id_kategori'];
		$nama_kategori  = $_POST['nama_kategori'];
  			
		$query = "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'";
		$result = mysqli_query($conn,$query);

		if ($result) {
			header("Location:profil_saya.php?kategori=Kategori");
		}
		else {
			echo "Gagal ditambahkan";
		}
	}	
?>

