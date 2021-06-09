<?php
	include "koneksi.php";
	if(isset($_POST['submit'])){
		$username	   = $_POST['username'];
		$nama_lengkap  = $_POST['nama_lengkap'];
		$tempat_lahir  = $_POST['tempat_lahir'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$email         = $_POST['email'];
		$no_tlp        = $_POST['no_tlp'];

		$string  = 'ADMIN';
		$id_admin = 'A-2021'.str_shuffle($string).mt_rand(1,100);

		$ekstensi_diperbolehkan = array('png','jpg');
  		$foto_admin             = $_FILES['foto_admin']['name'];
		$x                      = explode('.',$foto_admin);
  		$ekstensi               = strtolower(end($x));
  		$file_tmp               = $_FILES['foto_admin']['tmp_name'];

  		if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
  			move_uploaded_file($file_tmp, 'Foto Admin/'.$foto_admin);

			$query = "INSERT INTO admin (username, id_admin, nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, email, no_tlp, foto_admin) VALUES ('$username','$id_admin','$nama_lengkap','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$email','$no_tlp','$foto_admin')";
			$result = mysqli_query($conn,$query);

			if ($result) {
				header("Location:profil_saya.php?profile_admin=Profile+Detail");
			}
			else {
				echo "Gagal ditambahkan";
			}
		}	
	}
?>