<?php 
	include "includes/config.php";
	if(isset($_GET['hapus']))
	{
		$kodecindy = $_GET["hapus"];
		mysqli_query($connection, "DELETE FROM cindy
			WHERE cindyID = '$kodecindy'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location='tambahaninput.php'</script>";
	}
?>