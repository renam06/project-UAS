<?php
	include "koneksi.php";
	if(isset($_POST['submit'])){
		$id_buku        = $_POST['id_buku'];
		$username       = $_POST['username'];
		$tanggal_pinjam = $_POST['tanggal_pinjam'];

		$query = mysqli_query ($conn,"SELECT * FROM buku WHERE buku.id_buku='$id_buku'");
		if($data = mysqli_fetch_array($query)) {
			$stok = $data['stok'];
			// apabila ada peminjaman buku maka stok buku akan berkurang
			$stok_baru = $stok - 1;
			// mengupdate stok buku baru
			mysqli_query ($conn,"UPDATE buku SET stok='$stok_baru' WHERE id_buku='$id_buku'");
		}

		$query = "INSERT INTO peminjaman (id_pinjam, username, id_buku, tanggal_pinjam) VALUES ('NULL','$username','$id_buku','$tanggal_pinjam')";
		$result = mysqli_query($conn,$query);

		if ($result) {
			header("Location:detail-buku.php?id_buku=$id_buku");
		}
		else {
			echo "Gagal ditambahkan";
		}
	}
?>