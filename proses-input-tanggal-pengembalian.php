<?php
	include "koneksi.php";
	if(isset($_POST['submit'])){
		$id_pinjam       = $_POST['id_pinjam'];
		$tanggal_kembali = $_POST['tanggal_kembali'];
		$username        = $_POST['username'];
		$id_admin        = $_POST['id_admin'];

		$query1  = "UPDATE peminjaman SET tanggal_kembali='$tanggal_kembali', id_admin='$id_admin' WHERE id_pinjam='$id_pinjam'";
		$result1 = mysqli_query($conn,$query1);

		$query2  = "INSERT INTO pengembalian (id_pinjam, username, tanggal_kembali) VALUES ('$id_pinjam','$username','$tanggal_kembali')";
		$result2 = mysqli_query($conn,$query2);
		
		if ($result1.$result2) {
			header("Location:profil_saya.php?peminjaman_buku=Peminjaman+Buku");
		}
		else {
			echo "Gagal ditambahkan";
		}
	}
?>