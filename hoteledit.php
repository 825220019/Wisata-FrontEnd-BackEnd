<!DOCTYPE html>

<?php 
	include "includes/config.php";
	ob_start();
	session_start();
	include "header.php";
	if(isset($_POST['Ubah']))
	{
		$kodehotel = $_POST['kodehotel'];
		$namahotel = $_POST['namahotel'];
		$alamathotel = $_POST['alamathotel'];
		$keteranganhotel = $_POST['keteranganhotel'];
		$kodearea = $_POST['kodearea'];
		
		$nama = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];
		
		if(empty($nama))
		{
			mysqli_query($connection, "UPDATE hotel SET hotelnama = '$namahotel',
				areaID = '$kodearea'
				where hotelID = '$kodehotel'");
			header("location:hotelinput.php");
		}
		else
		$ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);
		
		if(($ekstensifile == "jpg") or ($ekstensifile == "JPG") or ($ekstensifile == "JEPG") or ($ekstensifile == "jpeg"))
		{
			move_uploaded_file($file_tmp, 'img/' .$nama);
			mysqli_query ($connection, "UPDATE hotel SET hotelnama ='$namahotel',
			hotelalamat = '$alamathotel',  hotelketerangan = '$keteranganhotel', 
			areaID = '$kodearea', hotelfoto = '$nama'
            WHERE hotelID = '$kodehotel' ");
			header("location:hotelinput.php");
		}
	}
	
	$dataarea = mysqli_query($connection, "select * from area");
	
	$kodehotel = $_GET["ubah"];
	
	$edithotel = mysqli_query($connection, "select * from hotel
		where hotelID = '$kodehotel'");
	$rowedit = mysqli_fetch_array($edithotel);
	
	$editarea= mysqli_query($connection, "select * from area, hotel
	where area.areaID = hotel.areaID");
	
	$rowedit2 = mysqli_fetch_array($editarea);
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hotel</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
</head>
<div class="container-fluid">
<div class="card shadow mb-4">
<body>

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid" style="background-color:#ACBCFF; color: white;">
		<div class="container">
			<h1 class="display-4">Input Hotel</h1>
		</div>
	</div>
	
	<form method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="kodehotel" class="col-sm-2 col-form-label">ID Hotel</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="kodehotel" name="kodehotel"
				value="<?php echo $rowedit["hotelID"]?>">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="namahotel" class="col-sm-2 col-form-label">Nama Hotel</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="namahotel" name="namahotel"
				value="<?php echo $rowedit["hotelnama"]?>">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="alamathotel" class="col-sm-2 col-form-label">Alamat Hotel</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="alamathotel" name="alamathotel"
				value="<?php echo $rowedit["hotelalamat"]?>">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="keteranganhotel" class="col-sm-2 col-form-label">Keterangan Hotel</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="keteranganhotel" name="keteranganhotel"
				value="<?php echo $rowedit["hotelketerangan"]?>">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="file" class="col-sm-2 col-form-label">File Foto</label>
			<div class="col-sm-10">
				<input type="file" id="file" name="file">
				<img src="img/<?php echo $rowedit['hotelfoto']?>" style="width: 200px; height:100px;">
				<p class="help-block">Field ini digunakan untuk unggah file</p>
			</div>
		</div>
		
		<div class="form-group row">
			<label for="kodearea" class="col-sm-2 col-form-label">ID Area</label>
			<div class="col-sm-10">
			<select class="form-control" id="areanama" name="kodearea">
				<option value="<?php echo $rowedit["areaID"]?>"><?php echo $rowedit['areaID']?>
				<?php echo $rowedit2['areanama']?></option>
				<?php while ($row = mysqli_fetch_array($dataarea))
				{ ?>
					<option value="<?php echo $row["areaID"]?>">
						<?php echo $row["areaID"]?>
						<?php echo $row["areanama"]?>
					</option>
				<?php } ?>
			</select>
			</div>
		</div>
		
		<div class="form-group row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<input type="submit" name="Ubah" class="btn btn-primary" value="Ubah">
				<input type="submit" name="Batal" class="btn btn-secondary" value="Batal">
			</div>
		</div>
	</form>
</div>
<div class="col-sm-1"></div>
</div>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="jumbotron jumbotron-fluid" style="background-color:#ACBCFF; color: white;">
			<div class="container">
				<h1 class="display-4">Daftar Hotel</h1>
			</div>
		</div>
		
	<form method= "POST">
		<div class="form-group row mb-2">
			<label for="search" class="col-sm-3">Nama Hotel</label>
			<div class="col-sm-6">
				<input type="text" name="search" class="form-control" id="search"
				value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>"
				placeholder="Cari Nama Hotel">
			</div>
				<input type="submit" name="kirim" class="col-sm-1 btn btn-primary"
				value="Search">
		</div>
	</form>

	<table class="table table-hover" style="background-color:#FFE5E5;">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>ID Hotel</th>
				<th>Nama Hotel</th>
				<th>Alamat Hotel</th>
				<th>Keterangan Hotel</th>
				<th>Foto Hotel</th>
				<th>ID Area</th>
				<th colspan="2" style="text-align: center">Action</th>
			</tr>
		</thead>
		
		<tbody>
			<?php
			if (isset($_POST["kirim"]))
					{
						$search = $_POST['search'];
						$query = mysqli_query($connection,"select * from hotel
						where hotelnama like '%" .$search."%'");
					}else
					{
						$query = mysqli_query($connection,"select * from hotel");
					}
					$nomor = 1;
			while ($row = mysqli_fetch_array($query))
			{ ?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $row['hotelID'];?></td>
					<td><?php echo $row['hotelnama'];?></td>
					<td><?php echo $row['hotelalamat'];?></td>
					<td><?php echo $row['hotelketerangan'];?></td>
					<td>
						<?php if(is_file("img/".$row['hotelfoto']))
						{ ?>
							<img src="img/<?php echo $row['hotelfoto']?>" width="80">
						<?php } else
							echo "<img src='img/noimage.jpg' width='80'>"
						?>
					</td>
					<td><?php echo $row['areaID'];?></td>
					<td><a href="hoteledit.php?ubah=<?php echo $row["hotelID"]?>" 
						class="btn btn-success btn-sm" title="EDIT">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
							<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>							  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
						</svg></td></a>
						<td><a href="hotelhapus.php?hapus=<?php echo $row["hotelID"]?>" 
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
</div>
</div>
<?php include "footer.php";?>
<?php
mysqli_close($connection);
ob_end_flush();
?>
</body>
</html>	