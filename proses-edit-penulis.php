<?php
	include "koneksi.php"; 
	if(isset($_POST['ubah_foto'])) {
		$id_penulis    = $_POST['id_penulis'];
		$nama_penulis  = $_POST['nama_penulis'];
		$tempat_lahir  = $_POST['tempat_lahir'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$pekerjaan     = $_POST['pekerjaan'];

		$ekstensi_diperbolehkan = array('png','jpg');
  		$foto_penulis_baru      = $_FILES['foto_penulis_baru']['name'];
		$x                      = explode('.',$foto_penulis_baru);
  		$ekstensi               = strtolower(end($x));
  		$file_tmp               = $_FILES['foto_penulis_baru']['tmp_name']; 

  		if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
  			move_uploaded_file($file_tmp, 'Foto Penulis/'.$foto_penulis_baru);
  			
			$query = "UPDATE penulis SET nama_penulis='$nama_penulis', foto_penulis='$foto_penulis_baru', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', pekerjaan='$pekerjaan' WHERE id_penulis='$id_penulis'";
			$result = mysqli_query($conn,$query);

			if ($result) {
				header("Location:profil_saya.php?penulis=Penulis");
			}
			else {
				echo "Gagal ditambahkan";
			}
		}	

	} else {
		$id_penulis    = $_POST['id_penulis'];
		$nama_penulis  = $_POST['nama_penulis'];
		$tempat_lahir  = $_POST['tempat_lahir'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$pekerjaan     = $_POST['pekerjaan'];
		
		$query = "UPDATE penulis SET nama_penulis='$nama_penulis', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', pekerjaan='$pekerjaan' WHERE id_penulis='$id_penulis'";
		$result = mysqli_query($conn,$query);

		if ($result) {
			header("Location:profil_saya.php?penulis=Penulis");
		}
		else {
			echo "Gagal ditambahkan";
		}
	}
?>