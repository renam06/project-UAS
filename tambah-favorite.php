<?php
	include "koneksi.php";
	if (isset($_POST['submit'])){
		$id_buku   = $_POST['id_buku'];
		$username  = $_POST['username'];
		
		$mysqli = "INSERT INTO favorite (id_buku, username) VALUES ('$id_buku','$username')";
    	$result   = mysqli_query($conn, $mysqli);

  		if ($result) {
  			header("Location:detail-buku.php?id_buku=$id_buku");
  		}
  		else {
  			echo "Gagal ditambahkan ke favorite";
 		}
  	}
?>