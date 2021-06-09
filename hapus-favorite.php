<?php 
	include "koneksi.php";
	
	$id_favorite = $_GET['id_favorite'];

	$result   = mysqli_query($conn,"DELETE FROM favorite WHERE id_favorite='$id_favorite'");
	
	
	if($result) {
    	header("location:profil_saya.php?favorite=Favorite");
    }
    else {
    	echo "<script>alert('Data gagal dihapus');window.location='profil_saya.php?favorite=Favorite';</script>";
    }
?>