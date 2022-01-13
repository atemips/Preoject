<?php require_once ('koneksi.php');
$idruang = $_POST['idruang'];
$namaruang =$_POST['nama'];
$denah= $_POST['denah'];
$kepala = $_POST['kepala'];
if ($denah != "" && $kepala!="") {
	$query2= mysqli_query($conn, "UPDATE  `ruang` SET `kepala`= '$kepala' WHERE `id` ='$idruang';");
		echo "<b>Data $idruang berhasil di update di tabel Ruang</b></br>"; 
		
	} else
	echo "Data merek,model,tgl beli dan id ruang belum diisi lengkap";
	?>