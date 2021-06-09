<?php 
	include "koneksi.php";
	$id_penulis = $_GET['id_penulis'];
	$result   = mysqli_query($conn,"DELETE FROM penulis WHERE id_penulis='$id_penulis'");
	
	if($result) {
    	header("location:profil_saya.php?penulis=Penulis");
    }
    else {
    	echo "<script>alert('Data gagal dihapus');window.location='profil_saya.php?penulis=Penulis";
    }
?>