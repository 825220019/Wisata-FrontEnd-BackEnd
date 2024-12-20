<!doctype html>
<?php
	include "includes/config.php";
	$query = mysqli_query($connection, "SELECT * FROM area");
	$query1 = mysqli_query($connection, "SELECT * FROM destinasi");
	$query2 = mysqli_query($connection, "SELECT * FROM hotel");
	$destinasi = mysqli_query($connection, "SELECT * FROM kategori, destinasi, fotodestinasi
	WHERE kategori.kategoriID = destinasi.kategoriID
	AND destinasi.destinasiID = fotodestinasi.destinasiID");
	
	$datad = "SELECT * FROM destinasi DESC LIMIT 3";
	$video = '<iframe width="640" height="360" src="https://www.youtube.com/embed/kgI_9IaMCX8?si=hJ9c7hy5GyoWLibm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>;'
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
	<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color:#FFD0D0;">
		<a class="navbar-brand" href="index.php">Cindy's</a>
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

	<div class="card m-5" style="max-width: 1500px;">
	  <div class="row g-0">
		<div class="col-md-4">
		  <img src="img/1b.jpg" class="img-fluid rounded" alt="...">
		</div>
		<div class="col-md-8">
		  <div class="card-body">
			<h5 class="card-title">Cindy Angelline</h5>
			<p class="card-text">Cindy Angelline dengan NPM 825220019 melaksanakan Ulangan Akhir Semester yang berbentuk projek membuat Web menggunakan 
			bahasa PHP.</p>
			<p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
		  </div>
		</div>
	  </div>
	</div>


	<div class="container-fluid m-5">
	<div class="row">
		<div class="col-6">
		<h1 style= "text-align: center;">Tugas Video</h1><br>
		<h6 style= "text-align: justify;">Video ini dibuat pada tanggal 6 Desember dan diupload pada hari itu juga untuk 
		menyelesaikan deadline yang diberikan. Pada video ini dijelaskan frontend dan
		backend yang telah dibuat dalam 3 hari, tetapi ada kendala sehingga hanya selesai pada bagian backend
		dan pada bagian frontend baru selesai setengahnya.</h6><br>
		<h6>Pada tanggal 7 Desember, Cindy diharuskan menyelesaikan semuanya sesuai tenggat waktu yang diberikan.
		Ada juga perintah tambahan yang akan diberikan pada jam UAS dimulai.</h6><br>
		<h6>Pada video ini Cindy dalam keadaan demam dan flu yang mengakibatkan suara pada video tidak begitu jelas,
		Cindy minta maaf atas keadaan yang menyebabkan ketidaknyamanan tersebut.</h6>
		</div>
		<div class="col-sm-1">
			<?php echo $video; ?>
		</div>
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
		</footer>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>