<?php require_once('koneksi.php');
	$kode		=$_POST['kode'];
	$inventaris	=$_POST['inventaris'];
	$merek		=$_POST['merek'];
	$model		=$_POST['model'];
	$tglbeli	=$_POST['tglbeli'];
	$status		=$_POST['status'];
	$idruang	=$_POST['idruang'];
	//pastikan apakah data merek, model, tgl beli, id ruang tidak kosong
	if ($merek != "" && $model!=""&& $tglbeli!=""&& $idruang!="") {
		$query2 = mysqli_query($conn,"INSERT INTO `alat` (`kode_alat`,`merek`,`model`,`tgl_beli`,`status`,`id_ruang`) VALUES ('$kode','$merek','$model','$tglbeli','$status','$idruang')");
		echo "Data $kode berhasil diinput di tabel alat ";
		if ($inventaris !="") {
			$query3 = mysqli_query($conn,"INSERT INTO `inventaris` (`kode_alat`,`
			no_inventaris`) VALUES ('$kode', '$inventaris')");
			echo "Data $kode berhasil diinput di tabel inventaris";
		}
	} else
		echo "Data merek, model, tgl beli, status dan id ruang belum diisi lengkap";
?>