<!doctype html>
<?php
	include "includes/config.php";
	$query = mysqli_query($connection, "SELECT * FROM area");
	$query1 = mysqli_query($connection, "SELECT * FROM destinasi");
	$query2 = mysqli_query($connection, "SELECT * FROM hotel");
	$query3 = mysqli_query($connection, "SELECT * FROM cindy");
	$destinasi = mysqli_query($connection, "SELECT * FROM kategori, destinasi, fotodestinasi,
	area 
	WHERE kategori.kategoriID = destinasi.kategoriID
	AND destinasi.destinasiID = fotodestinasi.destinasiID
	And destinasi.areaID = area.areaID");
	
	$jumlah = mysqli_num_rows($query);
	$jumlah1 = mysqli_num_rows($query1);
	$jumlah2 = mysqli_num_rows($query2);
	$jumlah3 = mysqli_num_rows($query3);
	$foto = mysqli_query($connection, "SELECT * FROM fotodestinasi");
	
?>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<title>FrontEnd</title>
	</head>
	<body>
			<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color:#FFCACC;">
			  <a class="navbar-brand" href="index.php" >Cindy's</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				  <li class="nav-item active">
					<a class="nav-link" href="frontend.php">Home <span class="sr-only">(current)</span></a>
				  </li>
				  <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Area
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					
					<?php if(mysqli_num_rows($query) > 0) {
						while ($row = mysqli_fetch_array($query))
						
						{ ?>
					  <a class="dropdown-item" href="#"><?php echo $row["areanama"]?></a>
					<?php } } ?>

					</div>
				  </li>
				  <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Destinasi
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					
					<?php if(mysqli_num_rows($query1) > 0) {
						while ($row = mysqli_fetch_array($query1))
						{ ?>
					  <a class="dropdown-item" href="#"><?php echo $row["destinasinama"]?></a>
					<?php } } ?>

					</div>
				  </li>
				  <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Hotel
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					
					<?php if(mysqli_num_rows($query2) > 0) {
						while ($row = mysqli_fetch_array($query2))
						{ ?>
					  <a class="dropdown-item" href="#"><?php echo $row["hotelnama"]?></a>
					<?php } } ?>

					</div>
				  </li>
				  <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Cindy
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					
					<?php if(mysqli_num_rows($query3) > 0) {
						while ($row = mysqli_fetch_array($query3))
						{ ?>
					  <a class="dropdown-item" href="#"><?php echo $row["cindyNEGARA"]?></a>
					<?php } } ?>

					</div>
				  </li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
				  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				  <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
				</form>
			  </div>
			  
			  <nav class="navbar">
				<a  href="aboutcindy.php">
				  <img src="img/me.jpg" alt="Cindy" width="38" height="38" class="rounded">
				</a>
			</nav>
			</nav>

		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <img class="d-block w-100" src="img/u1.jpg" alt="Second slide">
			</div>
			<div class="carousel-item">
			  <img class="d-block w-100" src="img/u2.jpg" alt="Second slide">
			</div>
			<div class="carousel-item">
			  <img class="d-block w-100" src="img/u3.jpg" alt="Third slide">
			</div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
		</div><br>

		<div class="container"> 
			<div class="row">
				<div class="col-sm-8">
				<?php if(mysqli_num_rows($destinasi) > 0) {
				while ($row2 = mysqli_fetch_array($destinasi))
					{ ?>
					<div class="media">
					  <div class="media-body">
						<h3 class="mt-0 mb-1"><?php echo $row2["destinasinama"]?></h3>
						<h4><?php echo $row2["areanama"]?></h4>
						<p><?php echo $row2["kategoriketerangan"]?></p>
					  </div>
					  <img class="ml-3 mb-4" style="width:30%" src="img/<?php echo $row2["fotofile"]?>" alt="Gambar Tidak Ada">
					</div>
				<?php } }?>
				</div>
				<div class="col-sm-4">
				<ul class="list-group">
				  <li class="list-group-item d-flex justify-content-between align-items-center">
					Area
					<span class="badge badge-primary badge-pill"><?php echo $jumlah?></span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
					Destinasi
					<span class="badge badge-primary badge-pill"><?php echo $jumlah1?></span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
					Hotel
					<span class="badge badge-primary badge-pill"><?php echo $jumlah2?></span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
					Cindy
					<span class="badge badge-primary badge-pill"><?php echo $jumlah3?></span>
				  </li>
				</ul>
				</div>
			</div>
		</div>

		<div class="container">
		<div class="row">
		<?php while ($row3 = mysqli_fetch_array($foto))
		{?>
		<div class="col-sm-4">
		<figure class="figure">
		  <img src="img/<?php echo $row3["fotofile"]?>" class="figure-img img-fluid rounded" alt="Foto Tidak Ada">
		  <figcaption class="figure-caption text-right"><?php echo $row3["fotonama"]?></figcaption>
		</figure>
		</div>
		<?php } ?>
		</div>
		</div>
	<footer>
		<div class="container-fluid p-5" style="background-color:#D2E0FB;"> 
			<div class="row">
			<div class="col-sm-4">
				<h3>About Me</h3><hr style="height:4px;border-width:0;color:black;background-color:darkblue">
				<p style= "text-align: justify;">Tujuan pembuatan web ini untuk mengukur seberapa dalam pengetahuan Cindy dalam membuat web dengan bahasa PHP.</p><br>
				<p style= "text-align: justify;">Memiliki kesulitan dalam manajemen waktu karena bertabrakan dengan jadwal bekerja, tetapi Cindy mengerjakan semampunya untuk memenuhi syarat menyelesaikan UAS dengan baik.</p><br>
				<a href="https://api.whatsapp.com/send/?phone=6283125415846&text&type=phone_number&app_absent=0" target="_blank"><img src="img/Wa.png" width="38"></a>
				<a href="https://www.instagram.com/cindy.angelline/" target="_blank"><img src="img/Ig.png" width="38"></a>
				<a href="https://www.tiktok.com/@cangelline?lang=en" target="_blank"><img src="img/Tiktok.png" width="36"></a>
			</div>
			<div class="col-sm-4">
				<h3>Info</h3><hr style="height:4px;border-width:0;color:black;background-color:darkblue">
				<div class="info">
				<div class="media">
					<div class="media-body">
						<h5 class="mt-0 mb-5 ml-5">Area</h5>
					</div>
						<img class="ml-3 mb-4 mr-5" style="width:50px" src="img/ic1.png">
				</div>
				<div class="media">
					<div class="media-body">
						<h5 class="mt-0 mb-5 ml-5">Destinasi</h5>
					</div>
						<img class="ml-3 mb-4 mr-5" style="height:70px" src="img/ft3.jpg">
				</div>
				<div class="media">
					<div class="media-body">
						<h5 class="mt-0 mb-5 ml-5">Area</h5>
					</div>
						<img class="ml-3 mb-4 mr-5" style="height:70px" src="img/h1.jpg">
				</div>
				</div>	
			</div>
			<div class="col-sm-4">
				<h3>Join Our Newsletter</h3><hr style="height:4px;border-width:0;color:black;background-color:darkblue">
				<div class="row">
					<div class="col-sm-8  mb-4">
					<input class="form-control form-control-sm-2 type="text" placeholder="E.g. cindy.825220019@stu.untar.ac.id" 
					aria-label=".form-control-sm example">
					</div>
					<div class="col-sm-1  mb-4">
					<button type="button button-hover" class="btn btn-secondary col-m-1">Subcribe</button>
					</div>
					<p>We only send newsletters out a few times a year, we won't ever spam you.</p>
				</div>
			</div>
			</div>
			</div>
			
			<div class="container-fluid" style= "text-align: center; background-color:#D2E0FB;">
				<p style="border-top: 4px solid black;">&copy;2023 UAS Web Development | Web by Cindy Angelline</p>
			</div>
		</div>
		</footer>


		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>