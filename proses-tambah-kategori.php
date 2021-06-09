<?php
	include "koneksi.php";
	if(isset($_POST['submit'])){
		$nama_kategori  = $_POST['nama_kategori'];

		$query = "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";
		$result = mysqli_query($conn,$query);

		if ($result) {
			header("Location:profil_saya.php?kategori=Kategori");
		}
		else {
			echo "Gagal ditambahkan";
		}
	}	
?>