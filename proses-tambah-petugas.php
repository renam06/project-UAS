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

		$string  = 'PTGAS';
		$id_petugas = 'A-2021'.str_shuffle($string).mt_rand(1,100);

		$ekstensi_diperbolehkan = array('png','jpg');
  		$foto_petugas           = $_FILES['foto_petugas']['name'];
		$x                      = explode('.',$foto_petugas);
  		$ekstensi               = strtolower(end($x));
  		$file_tmp               = $_FILES['foto_petugas']['tmp_name'];

  		if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
  			move_uploaded_file($file_tmp, 'Foto Petugas/'.$foto_petugas);

			$query = "INSERT INTO petugas (username, id_petugas, nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, email, no_tlp, foto_petugas) VALUES ('$username','$id_petugas','$nama_lengkap','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$email','$no_tlp','$foto_petugas')";
			$result = mysqli_query($conn,$query);

			if ($result) {
				header("Location:profil_saya.php?profile_petugas=Profile+Detail");
			}
			else {
				echo "Gagal ditambahkan";
			}
		}	
	}
?>