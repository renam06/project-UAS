<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<title>Halaman Login</title>
</head>
<body>
	<?php 
		session_start();
    	if(isset($_GET['pesan_error'])) {
      		$pesan_error = $_GET['pesan_error'];
    	}
    	else if (isset($_GET['pesan'])) {
      		$pesan = $_GET['pesan'];
    	}
	?>

	<nav class="navbar navbar-expand-lg navbar-light bg-default border-bottom" style="height:1.7cm;font-size:17px;">
		<div class="container">
		    <a class="navbar-brand mermaid mt-3 color1" href="main.php"><h3>E-Perpus</h3></a>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    	<ul class="navbar-nav ml-auto">
				    <li class="nav-item active">
			        	<a class="nav-link ml-3" href="Registrasi.php">Registrasi<span class="sr-only"></span></a>
		          	</li>
		        </ul>
		    </div>
  		</div>
	</nav>

	<div class="container">
    	<div class="row mt-4">
      		<div class="col-md-5 mx-auto mt-3">
        		<div class="card p-4 border shadow-sm" style="height:13cm">
        			<h3 class="mermaid text-center">E-perpus</h3>
		        	<?php 
		            	if (isset($pesan_error)) {
		              		echo "<div class=\"alert alert-danger\">$pesan_error</div>";
		            	}
		            	else if (isset($pesan)) {
		              		echo "<div class=\"alert alert-success\">$pesan</div>";
		            	}
		          	?>

			        <form action="login_proses.php" method="POST">
			            <div class="mb-2">
			        	    <label for="username" class="form-label">Username</label>
			              	<input type="text" name="username" id="username" class="form-control">
			            </div>
						<div class="mb-3">
			            	<label for="password" class="form-label">Password</label>
			            	<input type="password" name="password" id="password" class="form-control">
			            </div>
						<div class="mb-2 text-center">
			            	<input type="submit" name="masuk" value="LOGIN" class="btn btn-info mb-3" style="width:10.5cm">
			            </div>
			        </form>
			        <div>
			        	<p class="text-center mb-4 mt-3">Belum memiliki akun? Registrasi sekarang</p>
			        	<a href="registrasi.php" class="btn btn-dark text-white" style="width:10.5cm">REGISTRASI</a>
			        </div>
				</div>
			</div>
		</div>
	</div>

    <?php include "footer.php" ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>