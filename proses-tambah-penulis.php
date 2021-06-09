<?php
	include "koneksi.php";
	if(isset($_POST['submit'])){
		$nama_penulis  = $_POST['nama_penulis'];
		$tempat_lahir  = $_POST['tempat_lahir'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$pekerjaan     = $_POST['pekerjaan'];

		$ekstensi_diperbolehkan = array('png','jpg');
  		$foto_penulis           = $_FILES['foto_penulis']['name'];
		$x                      = explode('.',$foto_penulis);
  		$ekstensi               = strtolower(end($x));
  		$file_tmp               = $_FILES['foto_penulis']['tmp_name'];

  		if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
  			move_uploaded_file($file_tmp, 'Foto Penulis/'.$foto_penulis);

			$query = "INSERT INTO penulis (id_penulis, nama_penulis, foto_penulis, tempat_lahir, tanggal_lahir, pekerjaan) VALUES ('NULL','$nama_penulis','$foto_penulis','$tempat_lahir','$tanggal_lahir','$pekerjaan')";
			$result = mysqli_query($conn,$query);

			if ($result) {
				header("Location:profil_saya.php?penulis=Penulis");
			}
			else {
				echo "Gagal ditambahkan";
			}
		}	
	}
?>