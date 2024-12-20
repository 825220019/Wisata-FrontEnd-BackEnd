<!DOCTYPE html>

<?php 
	include "includes/config.php";
	ob_start();
	session_start();
	include "header.php";
	if(isset($_POST['Simpan']))
	{
		$kodekabupaten = $_POST['kodekabupaten'];
		$namakabupaten = $_POST['namakabupaten'];
		$alamatkabupaten = $_POST['alamatkabupaten'];
		$keterangankabupaten = $_POST['keterangankabupaten'];
		$ketfotokabupaten = $_POST['ketfotokabupaten'];
		
		$nama = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];
		
		$ekstensifile = pathinfo($nama, PATHINFO_EXTENSION);
		
		if(($ekstensifile == "png") or ($ekstensifile == "PNG"))
		{
			move_uploaded_file($file_tmp, 'images/'.$nama);
			mysqli_query($connection, "INSERT into kabupaten value ('$kodekabupaten', '$namakabupaten',
			'$alamatkabupaten', '$keterangankabupaten','$nama', '$ketfotokabupaten')");
			header("location:kabupateninput.php");
		}
	}
	
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kabupaten</title>
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
			<h1 class="display-4">Input Kabupaten</h1>
		</div>
	</div>
	
	<form method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="kodekabupaten" class="col-sm-2 col-form-label">Kode Kabupaten</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="kodekabupaten" name="kodekabupaten"
				placeholder="Kode Kabupaten" maxlength="4">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="namakabupaten" class="col-sm-2 col-form-label">Nama Kabupaten</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="namakabupaten" name="namakabupaten"
				placeholder="Nama Kabupaten">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="alamatkabupaten" class="col-sm-2 col-form-label">Alamat Kabupaten</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="alamatkabupaten" name="alamatkabupaten"
				placeholder="Alamat Kabupaten">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="keterangankabupaten" class="col-sm-2 col-form-label">Keterangan Kabupaten</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="keterangankabupaten" name="keterangankabupaten"
				placeholder="Keterangan Kabupaten">
			</div>
		</div>
		
		<div class="form-group row">
			<label for="file" class="col-sm-2 col-form-label">File Foto</label>
			<div class="col-sm-10">
				<input type="file" id="file" name="file">
				<p class="help-block">Field ini digunakan untuk unggah file</p>
			</div>
		</div>
		
		<div class="form-group row">
			<label for="ketfotokabupaten" class="col-sm-2 col-form-label">Keterangan Foto</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="ketfotokabupaten" name="ketfotokabupaten"
				placeholder="Keterangan Foto">
			</div>
		</div>
		
		<div class="form-group row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<input type="submit" name="Simpan" class="btn btn-primary" value="Simpan">
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
				<h1 class="display-4">Daftar kabupaten</h1>
			</div>
		</div>
		
	<form method= "POST">
		<div class="form-group row mb-2">
			<label for="search" class="col-sm-3">Nama Kabupaten</label>
			<div class="col-sm-6">
				<input type="text" name="search" class="form-control" id="search"
				value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>"
				placeholder="Cari Nama Kabupaten">
			</div>
				<input type="submit" name="kirim" class="col-sm-1 btn btn-primary"
				value="Search">
		</div>
	</form>

	<table class="table table-hover" style="background-color:#FFE5E5;">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Kode Kabupaten</th>
				<th>Nama Kabupaten</th>
				<th>Alamat Kabupaten</th>
				<th>Ket Kabupaten</th>
				<th>Foto Kabupaten</th>
				<th>Ket Foto Kabupaten</th>
				<th colspan="2" style="text-align: center">Action</th>
			</tr>
		</thead>
		
		<tbody>
			<?php
			if (isset($_POST["kirim"]))
					{
						$search = $_POST['search'];
						$query = mysqli_query($connection,"select * from kabupaten
						where kabupatenNAMA like '%" .$search."%'");
					}else
					{
						$query = mysqli_query($connection,"select * from kabupaten");
					}
					$nomor = 1;
			while ($row = mysqli_fetch_array($query))
			{ ?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $row['kabupatenKODE'];?></td>
					<td><?php echo $row['kabupatenNAMA'];?></td>
					<td><?php echo $row['kabupatenALAMAT'];?></td>
					<td><?php echo $row['kabupatenKET'];?></td>
					<td>
						<?php if(is_file("img/".$row['kabupatenFOTOICON']))
						{ ?>
							<img src="img/<?php echo $row['kabupatenFOTOICON']?>" width="80">
						<?php } else
							echo "<img src='img/noimage.jpg' width='80'>"
						?>
					</td>
					<td><?php echo $row['kabupatenFOTOICONKET'];?></td>
					<td><a href="kabupatenedit.php?ubah=<?php echo $row["kabupatenKODE"]?>" 
						class="btn btn-success btn-sm" title="EDIT">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
							<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>							  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
						</svg></td></a>
						<td><a href="kabupatenhapus.php?hapus=<?php echo $row["kabupatenKODE"]?>" 
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