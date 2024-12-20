<!DOCTYPE html>

<?php
	include "includes/config.php";
	ob_start();
	session_start();
	include "header.php";
	
	if (isset($_POST['Edit']))
	{
		if (isset($_REQUEST['kodearea']))
		{
			$kodearea = $_REQUEST['kodearea'];
		}
		
		if (!empty($kodearea))
		{
			$kodearea = $_POST['kodearea'];
		}
		else {
			die ("Anda harus memasukkan kodenya");
		}

		$areanama = $_POST['areanama'];
		$areawilayah = $_POST['areawilayah'];
		$areaketerangan = $_POST['areaketerangan'];
		$kabupatenKODE = $_POST['kabupatenKODE'];
		
		mysqli_query($connection, "update area set areanama='$areanama', areawilayah='$areawilayah',
		areaketerangan='$areaketerangan', kabupatenKODE='$kabupatenKODE'
		WHERE areaID = '$kodearea'");
		header ("location:areainput.php");
	}
	$datakabupaten = mysqli_query($connection, "select * from kabupaten");
	
	$kodearea = $_GET["ubah"];
	$editarea = mysqli_query($connection, "select * from area
	where areaID= '$kodearea'");
	$rowedit = mysqli_fetch_array($editarea);
	
	$editkabupaten = mysqli_query($connection, "select * from area, kabupaten
	where areaID = '$kodearea'and area.areaID = kabupaten.kabupatenKODE");
	
	$rowedit2 = mysqli_fetch_array($editkabupaten);
	?>

	<div class="container-fluid">
	<div class="card shadow mb-4">

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Area</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="row">
<div class="col-sm-1">
	</div>
	
	<div class="col-sm-10">
	
	<div class="jumbotron jumbotron-fluid" style="background-color:#ACBCFF; color: white;">
				<div class="container">
					<h1 class="display-4">Input Area</h1>
				</div>
			</div>	
	
      <form method="POST">
		<div class="form-group row">
			<label for="kodearea" class="col-sm-2 col-form-label">ID Area</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="kodearea" name="kodearea"
				value="<?php echo $rowedit["areaID"]?>">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="areanama" class="col-sm-2 col-form-label">Nama Area</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="areanama" name="areanama"
				value="<?php echo $rowedit["areanama"]?>">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="areawilayah" class="col-sm-2 col-form-label">Wilayah Area</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="areawilayah" name="areawilayah"
				value="<?php echo $rowedit["areawilayah"]?>">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="areaketerangan" class="col-sm-2 col-form-label">Keterangan Area</label>
			<div class="col-sm-10">
			<input type="text" class="form-control" id="areaketerangan" name="areaketerangan"
				value="<?php echo $rowedit["areaketerangan"]?>">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="kabupatenKODE" class="col-sm-2 col-form-label">Kode Kabupaten</label>
			<div class="col-sm-10">
			<select class="form-control" id="kabupatenKODE" name="kabupatenKODE">
				<?php while ($row = mysqli_fetch_array($datakabupaten))
				{ ?>
					<option value="<?php echo $row["kabupatenKODE"]?>">
						<?php echo $row["kabupatenKODE"]?>
						<?php echo $row["kabupatenNAMA"]?>
					</option>
				<?php } ?>
			</select>
			</div>
		</div>
		
		<div class="form-group row">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-10">
				<input type="submit" class="btn btn-primary" value="Edit" name="Edit">
				<input type="reset" class="btn btn-secondary" value="Batal" name="Batal">
			</div>
		</div>
		</form>
	  </div>
	  
		<div class="col-sm-1">
		</div>
		</div>

	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<div class="jumbotron jumbotron-fluid" style="background-color:#ACBCFF; color: white;">
				<div class="container">
					<h1 class="display-4">Daftar Area</h1>
				</div>
			</div>		
			
		<form method= "POST">
			<div class="form-group row mb-2">
				<label for="search" class="col-sm-3">Nama Area</label>
				<div class="col-sm-6">
					<input type="text" name="search" class="form-control" id="search"
					value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>"
					placeholder="Cari Nama Area">
				</div>
					<input type="submit" name="kirim" class="col-sm-1 btn btn-primary"
					value="Search">
			</div>
		</form>
			
		<table class="table table-hover" style="background-color:#FFE5E5;">
			<thead class="thead-dark">
				<tr>
					<th>No</th>
					<th>ID Area</th>
					<th>Nama Area</th>
					<th>Wilayah Area</th>
					<th>Keterangan Area</th>
					<th>Kode Kabupaten</th>
					<th colspan="2" style="text-align: center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if (isset($_POST["kirim"]))
					{
						$search = $_POST['search'];
						$query = mysqli_query($connection,"select * from area
						where areanama like '%" .$search."%'");
					}else
					{
						$query = mysqli_query($connection,"select * from area");
					}
				
					$nomor = 1;
					while ($row = mysqli_fetch_array($query))
					{ ?>
						<tr>
							<td><?php echo $nomor;?></td>
							<td><?php echo $row['areaID'];?></td>
							<td><?php echo $row['areanama'];?></td>
							<td><?php echo $row['areawilayah'];?></td>
							<td><?php echo $row['areaketerangan'];?></td>
							<td><?php echo $row['kabupatenKODE'];?></td>
							<td><a href="areaedit.php?ubah=<?php echo $row["areaID"]?>" 
							class="btn btn-success btn-sm" title="EDIT">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
							  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
							  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
							</svg></td></a>
							<td><a href="areahapus.php?hapus=<?php echo $row["areaID"]?>" 
							class="btn btn-danger btn-sm" title="DELETE">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
							  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
							  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
							</svg></a></td>
							
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
<script type="text/javascript"> 
	$(document).ready(function() {
		$('#kodekategori').select2({
		allowClear : true,
		placeholder: "Pilih Kategori Wisata"
		});
	});
</script>
</div>
</div>
<?php include "footer.php";?>
<?php
mysqli_close($connection);
ob_end_flush();
?>
</body>
</html>
