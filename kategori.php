<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kategori</title>
</head>
<body>
	<?php include "navbar2.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-2 mt-4">
				<h5 class="mb-3 color1">Kategori</h5>
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
				    <?php
				        include "koneksi.php";
				        $query = mysqli_query ($conn,"SELECT * FROM kategori");
				 
				        while ($data = mysqli_fetch_array($query)) { ?>
                        <button  name="id_kategori" value="<?php echo $data['id_kategori'];?>" class="btn btn-default" ><?php echo $data['nama_kategori'];?></button><br>
                    <?php }?>
                </form>
			</div>

			<div class="col-md-10 mt-4 mb-4">
				<table>
				<tr>
				<?php
					if(isset($_GET['id_kategori'])){
					$id_kategori = $_GET['id_kategori'];
					$kolom = 4;
					$i     = 0;
                    $query = mysqli_query ($conn,"SELECT * FROM buku, penulis, penerbit, kategori WHERE buku.id_kategori='$id_kategori' AND kategori.id_kategori='$id_kategori' AND buku.id_penulis=penulis.id_penulis AND buku.id_penerbit=penerbit.id_penerbit ");
				        
				    while ($data = mysqli_fetch_array($query)) {
				        if(($i) >= $kolom){
				 			echo "<tr></tr>";
			       			$i=0;
		        		}
			        	$i++;
			        ?>
			         <td>
			        	<div class="col-md-3 mb-2 border-left mt-2">
	    				<div class="border-1 text-center" style="width:5cm;height:11cm;">
	    					
	    					<p class="ml-3">
	    						<input type="text" name="id_buku" value="<?php echo $data['id_buku'];?>" hidden>
	    							<?="<img src='Foto Buku/$data[foto_buku]' width='152px' height='234px'/>";?>
	    					</p>
	   						<div class="text-center">
	   							<?php echo $data['judul'];?><br>
	   							
	  							<?php echo $data['nama_penulis'];?><br>
	  							Kategori : <?php echo $data['nama_kategori'];?> <br>
	  						
	  						<a href="detail-buku.php?id_buku=<?php echo $data['id_buku'];?>">Lihat Detail</a>
	    					</div>
	    				</div>
	    			</td>
				<?php }} ?>
				</tr>
			</table>

			<!-- PENCARIAN -->
			<table>
				<tr>
			<?php 
				include "koneksi.php";
				if (isset($_GET['search'])) {
					$search = $_GET['search']; ?>

					<div class="mb-4">
						Berikut merupakan hasil pencarian untuk<a href="#" class="color1"> "<?php echo $search ?>"</a>
					</div>
			<?php 

					$kolom  = 4;
					$i      = 0;
					$query  = "SELECT * FROM buku, penulis, kategori WHERE buku.id_kategori=kategori.id_kategori AND buku.id_penulis=penulis.id_penulis AND judul LIKE '%$search%' OR buku.id_kategori=kategori.id_kategori AND buku.id_penulis=penulis.id_penulis AND nama_penulis LIKE '%$search%'";
						
	                $result = mysqli_query($conn,$query);
					        
					while ($data = mysqli_fetch_array($result)) {
					if(($i) >= $kolom){
				 			echo "<tr></tr>";
			       			$i=0;
		        		}
			        	$i++;
			        ?>
			         <td>
			        	<div class="col-md-3 mb-2 border-left mt-2">
	    				<div class="border-1 text-center" style="width:5cm;height:11cm;">
	    					
	    					<p class="ml-3">
	    						<input type="text" name="id_buku" value="<?php echo $data['id_buku'];?>" hidden>
	    							<?="<img src='Foto Buku/$data[foto_buku]' width='152px' height='234px'/>";?>
	    					</p>
	   						<div class="text-center">
	   							<?php echo $data['judul'];?><br>
	   							
	  							<?php echo $data['nama_penulis'];?><br>
	  							Kategori : <?php echo $data['nama_kategori'];?> <br>
	  						
	  						<a href="detail-buku.php?id_buku=<?php echo $data['id_buku'];?>">Lihat Detail</a>
	    					</div>
	    				</div>
	    			</td>
	    		<?php }} ?>
				</tr>
			</table>
			</div>
		</div>
	</div>
	<?php include "footer.php"; ?>
</body>
</html>