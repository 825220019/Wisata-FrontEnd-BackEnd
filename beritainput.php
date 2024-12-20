<!DOCTYPE html>

<?php
	include "includes/config.php";
	ob_start();
	session_start();
	include "header.php";
	
	if (isset($_POST['Simpan']))
	{
		if (isset($_REQUEST['kodeberita']))
		{
			$kodeberita = $_REQUEST['kodeberita'];
		}
		
		if (!empty($kodeberita))
		{
			$kodeberita = $_POST['kodeberita'];
		}
		else {
			die ("Anda harus memasukkan kodenya");
		}

		$beritanama = $_POST['beritanama'];
		$beritainti = $_POST['beritainti'];
		$beritapenulis = $_POST['beritapenulis'];
		$beritapenerbit = $_POST['beritapenerbit'];
		$beritatanggal = $_POST['beritatanggal'];
		$kodedestinasi = $_POST['kodedestinasi'];
		
		mysqli_query($connection, "insert into berita values ('$kodeberita', '$beritanama', 
		'$beritainti', '$beritapenulis', '$beritapenerbit', '$beritatanggal', '$kodedestinasi')");
		header("location:beritainput.php");
	}
	$datadestinasi = mysqli_query($connection, "select * from destinasi");
	
	?>

	<div class="container-fluid">
	<div class="card shadow mb-4">

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Berita</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="row">
<div class="col-sm-1">
	</div>
	
	<div class="col-sm-10">
	
	<div class="jumbotron jumbotron-fluid" style="background-color:#ACBCFF; color: white;">
				<div class="container">
					<h1 class="display-4">Input Berita</h1>
				</div>
			</div>	
	
      <form method="POST">
		<div class="form-group row">
			<label for="kodeberita" class="col-sm-2 col-form-label">ID Berita</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="kodeberita" name="kodeberita"
				placeholder="ID Berita">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="beritanama" class="col-sm-2 col-form-label">Judul Berita</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="beritanama" name="beritanama"
				placeholder="Judul Berita">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="beritainti" class="col-sm-2 col-form-label">Inti Berita</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="beritainti" name="beritainti"
				placeholder="Inti Berita">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="beritapenulis" class="col-sm-2 col-form-label">Penulis Berita</label>
			<div class="col-sm-10">
			<input type="text" class="form-control" id="beritapenulis" name="beritapenulis"
				placeholder="Penulis Berita">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="beritapenerbit" class="col-sm-2 col-form-label">Penerbit Berita</label>
			<div class="col-sm-10">
			<input type="text" class="form-control" id="beritapenerbit" name="beritapenerbit"
				placeholder="Penerbit Berita">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="beritatanggal" class="col-sm-2 col-form-label">Tanggal Berita</label>
			<div class="col-sm-10">
			<input type="date" class="form-control" id="beritatanggal" name="beritatanggal"
				placeholder="Tanggal Berita">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="kodedestinasi" class="col-sm-2 col-form-label">ID Destinasi</label>
			<div class="col-sm-10">
			<select class="form-control" id="kodedestinasi" name="kodedestinasi">
				<?php while($row = mysqli_fetch_array($datadestinasi))
				{?>
				<option value="<?php echo $row["destinasiID"]?>"> 
				<?php echo $row["destinasiID"] ?> 
				<?php echo $row["destinasinama"] ?> 
				</option>
				<?php } ?>
			</select>
			</div>
		</div>
		
		<div class="form-group row">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-10">
				<input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
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
					<h1 class="display-4">Daftar Berita</h1>
				</div>
			</div>		
			
		<form method= "POST">
			<div class="form-group row mb-2">
				<label for="search" class="col-sm-3">Nama Berita</label>
				<div class="col-sm-6">
					<input type="text" name="search" class="form-control" id="search"
					value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>"
					placeholder="Cari Nama Berita">
				</div>
					<input type="submit" name="kirim" class="col-sm-1 btn btn-primary"
					value="Search">
			</div>
		</form>
			
		<table class="table table-hover" style="background-color:#FFE5E5;">
			<thead class="thead-dark">
				<tr>
					<th>No</th>
					<th>ID Berita</th>
					<th>Judul Berita</th>
					<th>Inti Berita</th>
					<th>Penulis</th>
					<th>Penerbit</th>
					<th>Tanggal Terbit</th>
					<th>ID Destinasi</th>
					<th colspan="2" style="text-align: center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if (isset($_POST["kirim"]))
					{
						$search = $_POST['search'];
						$query = mysqli_query($connection,"select * from berita
						where beritajudul like '%" .$search."%'");
					}else
					{
						$query = mysqli_query($connection,"select * from berita");
					}
				
					$nomor = 1;
					while ($row = mysqli_fetch_array($query))
					{ ?>
						<tr>
							<td><?php echo $nomor;?></td>
							<td><?php echo $row['beritaID'];?></td>
							<td><?php echo $row['beritajudul'];?></td>
							<td><?php echo $row['beritainti'];?></td>
							<td><?php echo $row['penulis'];?></td>
							<td><?php echo $row['penerbit'];?></td>
							<td><?php echo $row['tanggalterbit'];?></td>
							<td><?php echo $row['destinasiID'];?></td>
							<td><a href="beritaedit.php?ubah=<?php echo $row["beritaID"]?>" 
							class="btn btn-success btn-sm" title="EDIT">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
							  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
							  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
							</svg></td></a>
							<td><a href="beritahapus.php?hapus=<?php echo $row["beritaID"]?>" 
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