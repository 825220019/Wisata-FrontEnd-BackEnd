<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
  </head>
  <body>
	<?php include "header.php";?>
		<div class="jumbotron jumbotron-fluid" style= "background-color:#BEADFA; color: white;">
		<div class="container">
			<h1 class="display-4">DASHBOARD ADMIN</h1>
		</div>
		</div>
	
	<div class="container">
	<div class="row">
	<div class="col-sm-6">
	<div class="card" style="width: 30rem;">
	  <img src="img/u1.jpg" class="card-img-top" alt="...">
	  <div class="card-body">
		<h5 class="card-title">FrontEnd</h5>
		<p class="card-text">Berikut tampilan frontend yang dibuat</p>
		<a href="frontend.php" class="btn"  style= "background-color:#BEFFF7;">Front-End</a>
	  </div>
	  </div>
	</div>
	
	<div class="col-sm-6">
	<div class="card" style="width: 30rem;">
	  <img src="img/u4.png" class="card-img-top" alt="...">
	  <div class="card-body">
		<h5 class="card-title">BackEnd</h5>
		<p class="card-text">Berikut tampilan backend yang dibuat</p>
		<a href="index.php" class="btn" style= "background-color:#BEFFF7;">Back-End</a>
	  </div>
	</div>
	</div>
	</div>
	</div>
	
	<?php include "footer.php";?>
  </body>
  </html>