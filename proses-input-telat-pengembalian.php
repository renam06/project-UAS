<?php
	include "koneksi.php";
	if(isset($_POST['submit'])){
		$id_kembali = $_POST['id_kembali'];
		$username   = $_POST['username'];
		$telat      = $_POST['telat'];
		$id_admin   = $_POST['id_admin'];
		$stok       = $_POST['stok'];
		$id_buku    = $_POST['id_buku'];

		$denda = 5000;
		$jumlah_denda = $telat * $denda;

		$query1  = "UPDATE pengembalian SET telat='$telat', denda='$jumlah_denda', id_admin='$id_admin' WHERE id_kembali='$id_kembali'";
		$result1 = mysqli_query($conn,$query1);

		$stok_baru = $stok + 1;
		$query2    = "UPDATE buku SET stok='$stok_baru' WHERE id_buku='$id_buku'";
		$result2   = mysqli_query($conn,$query2);
		
		if ($result1.$result2) {
			header("Location:profil_saya.php?pengembalian_buku=Pengembalian+Buku");
		}
		else {
			echo "Gagal ditambahkan";
		}
	}
?>