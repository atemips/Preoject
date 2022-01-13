<?php require_once('koneksi.php');
if (isset($_POST['user']))$idr =$_POST['user'];
if (isset($_GET['user']))$idr =$_GET['user'];
	$query=mysqli_query($conn,"SELECT * FROM user where id_user='$idr'" );
	$jmlrek=mysqli_num_rows($query);
	if ($jmlrek!='0') {
		$hasil=mysqli_fetch_assoc($query);

	$id= $hasil['id_user'];
	$password=$hasil['password'];
    $nama=$hasil['nama'];
    $bagian=$hasil['bagian'];
    $alamat=$hasil['alamat'];
    $tlp=$hasil['tlp'];

	echo '<FORM ACTION="?p=56" METHOD="POST" NAME="input">
	 	 	<table width="60%" border="1">
	 	 	<tr>
	 	 	<td colspan="3" align="center"><b>Edit Data Ruang</b></td>
	 	 	</tr>
	 	 	<tr><td width="20%">ID User</td>
	 	 		<td width="2%">:</td>
	 	 		<td width="38%"><input name="iduser" type="text" size="9" maxlength="9" value="'.$id.'" readonly="readonly"></td> 
	 	 	</tr>
	 		<tr><td>Password</td>
	 			<td>:</td>
	 			<td><input name="password" type="text" value="'.$password.'" ></td>
	 		</tr>
	 		<tr><td>Nama</td>
	 			<td>:</td>
	 			<td><input type="text" name="nama" value="'.$nama.'"></td>
	 		</tr>
	 		<tr><td>Alamat</td>
	 			<td>:</td>
	 			<td><input type="text" name="alamat" value="'.$alamat.'" size="30"></td>
	 		</tr>
	 		<tr><td>Tlp</td>
	 			<td>:</td>
	 			<td><input type="text" name="tlp" value="'.$tlp.'" size="30"></td>
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