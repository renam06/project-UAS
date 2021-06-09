<?php 
include "koneksi.php";

if (isset($_POST['masuk'])) {
 	$username = $_POST['username'];
  	$password = $_POST['password']; 
  	$password_hash = SHA1($password);
	$pesan_error = "";

	if (empty($username)) {
		$pesan_error = "Username harus diisi"; 
	} else if (empty($password)) {
		$pesan_error = "Password harus diisi";
	}

	if ($pesan_error == "") {
		$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password_hash'");
		$data = mysqli_fetch_assoc($query);

			if (mysqli_num_rows($query) == 1) {
				if ($data['level'] == "pengguna") {
					session_start();
					$_SESSION['nama'] = $data['nama'];
					$_SESSION['level'] = $data['level'];
					$_SESSION['username'] = $data['username'];
					header("Location:kategori.php?id_kategori=1.php");
				} 
				else	if ($data['level'] == "admin") {
					session_start();
					$_SESSION['nama'] = $data['nama'];
					$_SESSION['level'] = $data['level'];
					$_SESSION['username'] = $data['username'];
					header("Location:kategori.php?id_kategori=1");
				} 
				else	if ($data['level'] == "petugas") {
					session_start();
					$_SESSION['nama'] = $data['nama'];	
					$_SESSION['level'] = $data['level'];
					$_SESSION['username'] = $data['username'];
					header("Location:kategori.php?id_kategori=1");
				}
			}
	} else{
		header("Location: login.php?pesan_error={$pesan_error}");
	}

} else{
	$pesan_error = "";
}


 ?>