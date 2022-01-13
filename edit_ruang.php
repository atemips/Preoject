<?php require_once('koneksi.php');
if (isset($_POST['id']))$idr =$_POST['id'];
if (isset($_GET['id']))$idr =$_GET['id'];
	$query=mysqli_query($conn,"SELECT * FROM ruang where id='$idr'" );
	$jmlrek=mysqli_num_rows($query);
	if ($jmlrek!='0') {
		$hasil=mysqli_fetch_assoc($query);

	$id= $hasil['id'];
	$nama_ruang=$hasil['nama_ruang'];
    $denah=$hasil['denah'];
    $kepala=$hasil['kepala'];

	echo '<FORM ACTION="?=53" METHOD="POST" NAME="input">
	 	 	<table width="60%" border="1">
	 	 	<tr>
	 	 	<td colspan="3" align="center"><b>Edit Data Ruang</b></td>
	 	 	</tr>
	 	 	<tr><td width="20%">ID Ruang</td>
	 	 		<td width="2%">:</td>
	 	 		<td width="38%"><input name="idruang" type="text" size="9" maxlength="9" value="'.$id.'" readonly="readonly"></td> 
	 	 	</tr>
	 		<tr><td>Nama Ruang</td>
	 			<td>:</td>
	 			<td><input name="nama" type="text" value="'.$nama_ruang.'" readonly="readonly"></td>
	 		</tr>
	 		<tr><td>Denah Ruang</td>
	 			<td>:</td>
	 			<td><input type="text" name="denah" value="'.$denah.'"readonly="readonly"></td>
	 		</tr>
	 		<tr><td>Kepala Ruang</td>
	 			<td>:</td>
	 			<td><input type="text" name="kepala" value="'.$kepala.'" size="30"></td>
	 		</tr>
	 		<tr><td colspan="2"></td>

	 			<td width="35%"><input type="submit" name="Input" value="Simpan"></td>
	 	 	</tr>
	 	 	</table>
	 	 	</FORM>';
	}
	else{
		echo"Data $id Tidak ada";
	}
?>