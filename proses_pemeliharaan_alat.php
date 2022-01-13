<?php require_once('koneksi.php');
	$id 		=$_POST['id'];
	$kode		=$_POST['kode'];
	$teknisi 	=$_POST['teknisi'];
	$ket 		=$_POST['ket'];
	$tglusai	=$_POST['tglusai'];
	$status		=$_POST['status'];
	//pastikan apakah data merek, model, tgl beli, id ruang tidak kosong
	if ($teknisi!='0') {
		//update data di tabel alat sesuai kode_alat
		if ($status=='PEMELIHARAAN'){
			$query2 = mysqli_query($conn,"UPDATE `pemeliharaan` SET `id_teknisi` = '$teknisi', `ket` = '$ket' WHERE `pemeliharaan`.`id` = '$id'");
			echo "Data $id - $kode Berhasil update status Pemeliharaan";

		} else {

			$query2 = mysqli_query($conn,"UPDATE `pemeliharaan` SET `id_teknisi` = '$teknisi', `ket` = '$ket', tgl_usai='$tglusai' WHERE `pemeliharaan`.`id` = '$id'");
			$query3 = mysqli_query($conn,"UPDATE `alat` SET `status` = '$status' WHERE `alat`.`kode_alat` = '$kode'" );
			echo "Data $kode Berhasil update status Pemeliharaan dan Status Laik pakai";
		} 	
	} else {
		echo "Data Tgl dan Status Belum Diisi Lengkap";
}
?>