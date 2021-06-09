<?php
	include "koneksi.php"; 
	if(isset($_POST['id_penerbit'])) {
		$id_penerbit      = $_POST['id_penerbit'];
		$nama_penerbit    = $_POST['nama_penerbit'];
		$lokasi_penerbit  = $_POST['lokasi_penerbit'];
  			
		$query = "UPDATE penerbit SET nama_penerbit='$nama_penerbit', lokasi_penerbit='$lokasi_penerbit' WHERE id_penerbit='$id_penerbit'";
		$result = mysqli_query($conn,$query);

		if ($result) {
			header("Location:profil_saya.php?penerbit=Penerbit");
		}
		else {
			echo "Gagal ditambahkan";
		}
	}	
?>

