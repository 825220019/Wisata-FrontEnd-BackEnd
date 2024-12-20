<!DOCTYPE html>

<?php
	include "includes/config.php";
	ob_start();
	session_start();
	include "header.php";?>

	<div class="container-fluid">
	<div class="card shadow mb-4">

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Foto</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<div class="jumbotron jumbotron-fluid" style="background-color:#ACBCFF; color: white;">
				<div class="container">
					<h1 style="text-align: center;">Foto Destinasi</h1>
				</div>
			</div>		
			
	<form method= "POST">
		<div class="form-group row mb-2">
			<label for="search" class="col-sm-3">Nama Foto</label>
			<div class="col-sm-6">
				<input type="text" name="search" class="form-control" id="search"
				value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>"
				placeholder="Cari Nama Foto">
			</div>
				<input type="submit" name="kirim" class="col-sm-1 btn" style="background-color:#FBA1B7; color: white;"
				value="Search">
		</div>
	</form>
		
		<table class="table table-hover" style="background-color:#FFE5E5;">
			<thead class="thead-dark">
				<tr>
					<th>No</th>
					<th>ID Foto</th>
					<th>Nama Foto</th>
					<th>ID Destinasi</th>
					<th>File Foto</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if (isset($_POST["kirim"]))
					{
						$search = $_POST['search'];
						$query = mysqli_query($connection,"select * from fotodestinasi
						where fotonama like '%" .$search."%'");
					}else
					{
						$query = mysqli_query($connection,"select * from fotodestinasi");
					}

	
					$nomor = 1;
					while ($row = mysqli_fetch_array($query))
					{ ?>
						<tr>
							<td><?php echo $nomor;?></td>
							<td><?php echo $row['fotoID'];?></td>
							<td><?php echo $row['fotonama'];?></td>
							<td><?php echo $row['destinasiID'];?></td>
							<td><?php echo $row['fotofile'];?></td>
						</tr>
						<?php $nomor = $nomor + 1;?>
					<?php } ?>			
			</tbody>
		</table>
		
		</div>
		<div class="col-sm-1"></div>
	</div>
	
<script type="text/javascript" src="js/bootsrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/
jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</div>
</div>
<?php include "footer.php";?>
<?php
mysqli_close($connection);
ob_end_flush();
?>
</html>