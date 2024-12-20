<!DOCTYPE html>

<?php
	include "includes/config.php";
	ob_start();
	session_start();
	include "header.php";
	
	if (isset($_POST['Simpan']))
	{
		if (isset($_REQUEST['kodekategori']))
		{
			$kodekategori = $_REQUEST['kodekategori'];
		}
		
		if (!empty($kodekategori))
		{
			$kodekategori = $_POST['kodekategori'];
		}
		else {
			die ("Anda harus memasukkan kodenya");
		}

		$namakategori = $_POST['namakategori'];
		$keterangankategori = $_POST['keterangankategori'];
		$referensikategori = $_POST['referensikategori'];
		
		mysqli_query($connection, "insert into kategori values ('$kodekategori', '$namakategori', 
		'$keterangankategori', '$referensikategori')");
		header("location:kategoriinput.php");
	}
?>

<div class="container-fluid">
<div class="card shadow mb-4">

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Kategori</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="row">
<div class="col-sm-1 mb-5">
	</div>
	
	<div class="col-sm-10">
	
	<div class="jumbotron jumbotron-fluid" style="background-color:#ACBCFF; color: white;">
				<div class="container">
					<h1 class="display-4">Input Kategori</h1>
				</div>
			</div>	
	
      <form method="POST">
		<div class="form-group row">
			<label for="kodekategori" class="col-sm-2 col-form-label">ID Kategori</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="kodekategori" name="kodekategori"
				placeholder="ID Kategori">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="namakategori" class="col-sm-2 col-form-label">Nama Kategori</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="namakategori" name="namakategori"
				placeholder="Nama Kategori">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="keterangankategori" class="col-sm-2 col-form-label">Keterangan Kategori</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="keterangankategori" name="keterangankategori"
				placeholder="Keterangan Kategori">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="referensikategori" class="col-sm-2 col-form-label">Referensi Kategori</label>
			<div class="col-sm-10">
			<input type="text" class="form-control" id="referensikategori" name="referensikategori"
				placeholder="Referensi Kategori">
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
					<h1 class="display-4">Daftar Kategori</h1>
				</div>
			</div>		
			
		<form method= "POST">
			<div class="form-group row mb-2">
				<label for="search" class="col-sm-3">Nama Kategori</label>
				<div class="col-sm-6">
					<input type="text" name="search" class="form-control" id="search"
					value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>"
					placeholder="Cari Nama Kategori">
				</div>
					<input type="submit" name="kirim" class="col-sm-1 btn btn-primary"
					value="Search">
			</div>
		</form>
			
		<table class="table table-hover" style="background-color:#FFE5E5;">
			<thead class="thead-dark">
				<tr>
					<th>No</th>
					<th>ID Kategori</th>
					<th>Nama Kategori</th>
					<th>Keterangan Kategori</th>
					<th>Referensi Kategori</th>
					<th colspan="2" style="text-align: center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if (isset($_POST["kirim"]))
					{
						$search = $_POST['search'];
						$query = mysqli_query($connection,"select * from kategori
						where kategorinama like '%" .$search."%'");
					}else
					{
						$query = mysqli_query($connection,"select * from kategori");
					}
				
					$nomor = 1;
					while ($row = mysqli_fetch_array($query))
					{ ?>
						<tr>
							<td><?php echo $nomor;?></td>
							<td><?php echo $row['kategoriID'];?></td>
							<td><?php echo $row['kategorinama'];?></td>
							<td><?php echo $row['kategoriketerangan'];?></td>
							<td><?php echo $row['kategorireferensi'];?></td>
							<td><a href="kategoriedit.php?ubah=<?php echo $row["kategoriID"]?>" 
							class="btn btn-success btn-sm" title="EDIT">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
							  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
							  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
							</svg></td></a>
							<td><a href="kategorihapus.php?hapus=<?php echo $row["kategoriID"]?>" 
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
