<?php require_once('koneksi.php');
	$kode		=$_POST['kode'];
	$tglstatus	=$_POST['tglstatus'];
	$status		=$_POST['status'];
	//pastikan apakah data merek, model, tgl beli, id ruang tidak kosong
	if ($tglstatus!= "" && $status!="") {
		//update data di tabel alat sesuai kode_alat
		$query = mysqli_query($conn,"UPDATE `alat` SET `status` = '$status' WHERE `alat`.`kode_alat` = '$kode'");
		if ($status=='PEMELIHARAAN'){
			$query2 = mysqli_query($conn,"INSERT INTO `pemeliharaan` (`id` , `kode_alat`, `tgl` ) VALUES (NULL, '$kode', '$tglstatus');");
			echo "Data $kode Berhasil update status Pemeliharaan";

		} else if ($status=='PERBAIKAN'){
			$query2 = mysqli_query($conn,"INSERT INTO `perbaikan` (`id` , `kode_alat`, `tgl` ) VALUES (NULL, '$kode', '$tglstatus');");
			echo "Data $kode Berhasil update status Perbaikan";

		} else {
			$query2 = mysqli_query($conn,"INSERT INTO `kalibrasi` (`id` , `kode_alat`, `tgl` ) VALUES (NULL, '$kode', '$tglstatus');");
			echo "Data $kode Berhasil update status kalibrasi";
		}
			
	} else echo "Data Tgl dan Status Belum Diisi Lengkap";

?>