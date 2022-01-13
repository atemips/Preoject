<?php require_once('koneksi.php');
	$kode		=$_POST['kode'];
	$inventaris	=$_POST['inventaris'];
	$merek		=$_POST['merek'];
	$model		=$_POST['model'];
	$tglbeli	=$_POST['tglbeli'];
	$status		=$_POST['status'];
	$idruang	=$_POST['idruang'];
	//pastikan apakah data merek, model, tgl beli, id ruang tidak kosong
	if ($merek != "" && $model!="" && $tglbeli!="" && $idruang!="") {
		//update data di tabel alat sesuai kode_alat
		$query2 = mysqli_query($conn,"UPDATE `alat` SET `merek` = '$merek', `model` = '$model' `tgl_beli` = '$tglbeli', `id_ruang` ='$idruang' 
			WHERE `alat`.`kode_alat` = '$kode';");
		echo "Data $kode berhasil diupdate di tabel alat <br>";
		//update data di tabel inventaris sesuai kode_alat
		if ($inventaris !="") {
			$query = mysqli_query($conn,"SELECT * FROM `inventaris` WHERE `kode_alat` = '$kode' ");
			$jmlrek = mysql_num_rows($query);
			if ($jmlrek=='0') {
				$query3 = mysqli_query($conn,"INSERT INTO `inventaris` WHERE (`kode_alat`, `no_inventaris`) VALUES ('$kode', '$inventaris' ");
			echo "Data $kode berhasil diinput di inventaris <br>";
		} else { 
			$query3 = mysqli_query($conn,"UPDATE `inventaris` SET `no_inventaris` = '$no_inventaris' WHERE `kode_alat` = '$kode';");
			echo "Data $kode berhasil diupdate di inventaris <br>";
		}
	}
} else
		echo "Data merek, model, tgl beli dan id ruang belum diisi lengkap";
?>