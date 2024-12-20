<?php 
	include "includes/config.php";
	if(isset($_GET['hapus']))
	{
		$kodefoto = $_GET["hapus"];
		mysqli_query($connection, "DELETE FROM fotodestinasi
			WHERE fotoID = '$kodefoto'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location='fotoinput.php'</script>";
	}
?>