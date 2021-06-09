<?php 
	include "koneksi.php";
	$id_kategori = $_GET['id_kategori'];
	$result   = mysqli_query($conn,"DELETE FROM kategori WHERE id_kategori='$id_kategori'");
	
	if($result) {
    	header("location:profil_saya.php?kategori=Kategori");
    }
    else {
    	echo "<script>alert('Data gagal dihapus');window.location='profil_saya.php?kategori=Kategori";
    }
?>