<?php
	include "koneksi.php";
	if(isset($_POST['submit'])){
		$nama_penerbit   = $_POST['nama_penerbit'];
		$lokasi_penerbit = $_POST['lokasi_penerbit'];

		$query = "INSERT INTO penerbit (id_penerbit, nama_penerbit, lokasi_penerbit) VALUES ('NULL','$nama_penerbit','$lokasi_penerbit')";
		$result = mysqli_query($conn,$query);

		if ($result) {
			header("Location:profil_saya.php?penerbit=Penerbit");
		}
		else {
			echo "Gagal ditambahkan";
		}
	}	
?>