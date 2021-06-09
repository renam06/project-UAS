<?php 
	include "koneksi.php";
	$id_buku = $_GET['id_buku'];
	$result  = mysqli_query($conn,"DELETE FROM buku WHERE id_buku='$id_buku'");
	
	if($result) {
    	header("location:profil_saya.php?buku=Buku");
    }
    else {
    	echo "<script>alert('Data gagal dihapus');window.location='profil_saya.php?buku=Buku";
    }
?>