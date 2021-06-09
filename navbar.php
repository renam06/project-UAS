<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"> <!-- Link icon -->
	<title>Document</title>
	<link rel="stylesheet" href="style-css.css">
	<style>
		@font-face{
			font-family : "Font Mermaid";
	    	src         : url('Mermaid.TTF');
	    }
	    .mermaid {
	      font-family   : "Font Mermaid";
	    }
	</style>
</head>
<body>
	<?php include "koneksi.php";
	session_start();
	if (isset($_SESSION['nama'])) {
  	?>

	<nav class="navbar navbar-expand-lg navbar-light bg-default border-bottom" style="height:1.7cm;font-size:17px;">
		<div class="container">
		    <a class="navbar-brand mermaid mt-3 color1" href="#"><h3>E-Perpus</h3></a>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		        <ul class="navbar-nav ml-auto">
				    <li class="nav-item active mr-4 mt-1">
				    	<form action="kategori.php" class="form-inline" method="GET">
				    		<input type="text" name="search" class="form-control mr-sm-2" placeholder="Search" style="height:0.9cm;width:10cm">
				    		<button type="submit" class="btn btn-info pt-1" style="height:0.9cm"><i class="bi bi-search"></i></button>
				    	</form>
				    </li>
			        <li class="nav-item active">
			        <?php	
			        	if ($_SESSION['level'] == "pengguna") { ?>
				        	<a class="nav-link ml-3" href="profil_saya.php?profile_pengguna=Profile+Detail"><?php echo $_SESSION['nama']; ?><span class="sr-only"></span></a>
				     <?php	}
			        	if ($_SESSION['level'] == "admin") { ?>   
			        	<a class="nav-link ml-3" href="profil_saya.php?profile_admin=Profile+Detail"><?php echo $_SESSION['nama']; ?><span class="sr-only"></span></a>
			        <?php	}
			        	if ($_SESSION['level'] == "petugas") { ?>   
			        	<a class="nav-link ml-3" href="profil_saya.php?profile_petugas=Profile+Detail"><?php echo $_SESSION['nama']; ?><span class="sr-only"></span></a>
			        <?php	} }?>

				    </li>
				   
		          	<li>
				        <a class="btn btn-default ml-3" href="logout.php" style="font-size:17px">Logout</a>
				    </li>
		       </ul> 
    		</div>
  		</div>
	</nav>
</body>
</html>