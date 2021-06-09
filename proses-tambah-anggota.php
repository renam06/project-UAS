<?php
	include "koneksi.php";
	if(isset($_POST['submit'])){
		$username	   = $_POST['username'];
		$nama_lengkap  = $_POST['nama_lengkap'];
		$tempat_lahir  = $_POST['tempat_lahir'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$pekerjaan     = $_POST['pekerjaan'];
		$email         = $_POST['email'];
		$no_tlp        = $_POST['no_tlp'];

		$string  = 'MHSWA';
		$id_anggota = 'A-2021'.str_shuffle($string).mt_rand(1,100);

		$ekstensi_diperbolehkan = array('png','jpg');
  		$foto_anggota           = $_FILES['foto_anggota']['name'];
		$x                      = explode('.',$foto_anggota);
  		$ekstensi               = strtolower(end($x));
  		$file_tmp               = $_FILES['foto_anggota']['tmp_name'];

  		if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
  			move_uploaded_file($file_tmp, 'Foto Anggota/'.$foto_anggota);

			$query = "INSERT INTO anggota (username, id_anggota, nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, pekerjaan, email, no_tlp, foto_anggota) VALUES ('$username','$id_anggota','$nama_lengkap','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$pekerjaan','$email','$no_tlp','$foto_anggota')";
			$result = mysqli_query($conn,$query);

			if ($result) {
				header("Location:profil_saya.php?profile_pengguna=Profile+Detail");
			}
			else {
				echo "Gagal ditambahkan";
			}
		}	
	}
?>