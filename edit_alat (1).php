<?php require_once('koneksi.php');
if (isset($_POST['kode'])) $kode=$_POST['kode'];
if (isset($_GET['kode'])) $kode=$_GET['kode'];
$query = mysqli_query($conn,"SELECT * FROM alat,jenis where (substring(kode_alat,1,2)=kd and substring(kode_alat,3,2)
=kode) and kode_alat='kode'");
$jmlrek = mysqli_num_rows($query);
if ($jmlrek!='0') {
	$hasil=mysqli_fetch_assoc($query);
	$kode_alat = $hasil['kode_alat'];
	$merek = $hasil['merek'];
	$model = $hasil['model'];
	$tgl_beli = $hasil['tgl_beli'];
	$status = $hasil['status'];
	$id_ruang = $hasil['id_ruang'];
	$nama_alat = $hasil['nama'];
	$query2 = mysqli_query($conn,"SELECT * FROM `inventaris` WHERE `kode_alat`=`$kode_alat`");
	$jmlrek = mysqli_num_rows($query2);
	if ($jmlrek!='0') {
		$hasil2=mysqli_fetch_assoc(query2);
		$no_inventaris = $hasil2['no_inventaris'];
	}else $no_inventaris = '';

	echo '<FORM ACTION="p=31" METHOD="POST" NAME="input">
	<table width="60%" border="1">
	<tr>
	<td colspan="3" align="center"><b>Edit Data Tabel Alat</b></td>
	</tr><td width="20%">Kode Alat</td>
	<td width="2%">:</td>
	<td width="38%"><input name="kode" type="text" size="9" maxlength="9" value="'.
	$kode_alat.'" readonly="readonly"></td>
	</tr>
	<tr><td> Nama Alat</cd>
		<td>:</td>
		<td><input name="nama" type="text" value="'.$nama_alat.'" readonly="readonly"></td>
	</tr>
	<tr></td>Inventaris<br/>Jika Diperlukan</td>
		<td>:</td>
		<td><input type="text" name="inventaris" value="'.$no_inventaris.'"></td>
	</tr>
	<tr></td>Merek Alat<br/>Jika Diperlukan</td>
		<td>:</td>
		<td><input type="text" name="merek" value="'.$merek.'"></td>
	</tr>
	<tr></td>Model Alat<br/>Jika Diperlukan</td>
		<td>:</td>
		<td><input type="text" name="model" value="'.$model.'"></td>
	</tr>
	<tr></td>Tgl Pembelian<br/>Jika Diperlukan</td>
		<td>:</td>
		<td><input type="text" name="tglbeli" value="'.$tgl_beli.'"></td>
	</tr>

	<tr><td >Id Ruang</td>
		<td >:</td>
		<td ><select name="idruang">';
			if ($id_ruang==''){
				echo"<option value=0 selected>- Pilih Ruang -</option>";
			}
			$tampil=mysqli_query($conn,"SELECT * FROM ruang ORDER BY id");
			while($w=mysqli_fetch_assoc($tampil)){
				if ($id_ruang==$w['id']){
					echo"<option value=$w[id] selected>$w[nama_ruang]</option>";
				}
				else{
				echo "<optio value=$W[id]>$w[nama_ruang]</option>";
				}
				}
				echo '</select>
				</td>
				</tr>
				<tr><td colspan="2"></td>
				<td width="35%"><input type="submit" name="Input" value="Simpan"></td>
				</tr>
				</table>
				</FORM>';
			}
			else {
				
				echo"Data $kode Tidak ada";
			}
			?>