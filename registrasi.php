<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<title>Halaman Registrasi</title>
</head>
<body>
	<?php include "koneksi.php"; 
		session_start();
    	if(isset($_GET['pesan_error'])) {
      		$pesan_error = $_GET['pesan_error'];
    	}
	?>

	<nav class="navbar navbar-expand-lg navbar-light bg-default border-bottom" style="height:1.7cm;font-size:17px;">
		<div class="container">
		    <a class="navbar-brand mermaid mt-3 color1" href="main.php"><h3>E-Perpus</h3></a>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    	<ul class="navbar-nav ml-auto">
				    <li class="nav-item active">
			        	<a class="nav-link ml-3" href="login.php">Login<span class="sr-only"></span></a>
		          	</li>
		        </ul>
		    </div>
  		</div>
	</nav>
  
	<div class="container" >
    	<div class="row mt-4">
      		<div class="col-md-5 mx-auto">
        		<div class="card p-4 border-0 shadow-sm">
					<h3 class="mermaid text-center">E-Perpus</h3>
		            <small class="text-center text-secondary mb-4">Registrasi sekarang!</small>

		            <?php 	if (isset($pesan_error)) {
		              		echo "<div class=\"alert alert-danger\">$pesan_error</div>";
		            	}
		            	else if (isset($pesan)) {
		              		echo "<div class=\"alert alert-success\">$pesan</div>";
		            	}
		          	?>
          			
          			<form action="registrasi_proses.php" method="POST">
            			<div class="mb-1">
              				<label class="form-label text-secondary">Nama Lengkap</label>
			              	<input type="text" name="nama" class="form-control">
			            </div>
			            <div class="mb-1">
			              	<label class="form-label text-secondary">Email</label>
			              	<input type="text" name="email" id="email" class="form-control">
			            </div>
			            <div class="mb-1">
			              	<label class="form-label text-secondary">Username</label>
			              	<input type="text" name="username" id="username" class="form-control">
			            </div>
			            <div class="mb-1">
			              	<label class="form-label text-secondary">Nomor Telepon</label>
			              	<input type="text" name="no_tlp" id="no_tlp" class="form-control">
			            </div>
			            <div class="mb-1">
			              	<label class="form-label text-secondary">Password</label>
			              	<input type="password" name="password" id="password" class="form-control">
			            </div>
			            <div class="mb-4">
			              	<label class="form-label text-secondary">Konfirmasi Password</label>
			              	<input type="password" name="password_confirm" id="password_confirm" class="form-control">
			            </div>
			            <div class="mb-4">
			              	<input type="submit" name="daftar" value="DAFTAR" class="btn btn-info text-white" style="width:10.5cm;">
			            </div>
			            	<input type="text" name="level" value="pelanggan" hidden>
			        </form>

			        <div>
			            <p class="text-secondary text-center">Sudah memiliki akun?</p>
			            <a class="btn btn-dark" href="login.php" style="width:10.5cm;">LOGIN</a>
			        </div>
				</div>
      		</div>
    	</div>
  	</div>

  	<?php include "footer.php"; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>