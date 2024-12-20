<!doctype html>
<?php
	include "includes/config.php";
	$query = mysqli_query($connection, "SELECT * FROM area");
	$query1 = mysqli_query($connection, "SELECT * FROM destinasi");
	$query2 = mysqli_query($connection, "SELECT * FROM hotel");
	$destinasi = mysqli_query($connection, "SELECT * FROM kategori, destinasi, fotodestinasi
	WHERE kategori.kategoriID = destinasi.kategoriID
	AND destinasi.destinasiID = fotodestinasi.destinasiID");
	
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