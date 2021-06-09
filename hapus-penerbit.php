<?php 
	include "koneksi.php";
	$id_penerbit = $_GET['id_penerbit'];
	$result   = mysqli_query($conn,"DELETE FROM penerbit WHERE id_penerbit='$id_penerbit'");
	
	if($result) {
    	header("location:profil_saya.php?penerbit=Penerbit");
    }
    else {
    	echo "<script>alert('Data gagal dihapus');window.location='profil_saya.php?penerbit=Penerbit";
    }
?>