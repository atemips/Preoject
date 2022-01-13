<?php require_once('koneksi.php');
if (isset($_POST['kode'])) $kode=$_POST['kode'];
if (isset($_GET['kode'])) $kode=$_GET['kode'];
$query = mysqli_query($conn,"SELECT * FROM alat,jenis,ruang where (substring(kode_alat,1,2)=kd and substring(kode_alat,3,2)=kode) and id_ruang=ruang.id and kode_alat='$kode' and status='LAIK' ");
$jmlrek = mysqli_num_rows($query);
if ($jmlrek!='0') {
	$hasil=mysqli_fetch_assoc($query);
			$kode_alat = $hasil['kode_alat'];
			$merek     = $hasil['merek'];
			$model     = $hasil['model'];
			$tgl_beli  = $hasil['tgl_beli'];
			$status    = $hasil['status'];
			$id_ruang  = $hasil['id_ruang'];
			$nama_alat = $hasil['nama'];
			$nama_ruang= $hasil['nama_ruang'];


	echo '<FORM ACTION="?p=41" METHOD="POST" NAME="input">
		<table width="60%" border="1">
			<tr>
				<td colspan="3" align="center"><b>Edit Data Tabel Alat</b></td>
			</tr>
			<tr><td width="20%">Kode Alat</td>
				<td width="2%">:</td>
				<td width="38%"><input name="kode" type="text" size="9" maxlength="9" value="'.$kode_alat.'" readonly="readonly"></td>
				</tr>
				<tr><td >Nama Alat</td>
					<td >:</td>
					<td ><input name="nama" type="text" value="'.$nama_alat.'"readonly="readonly"></td>
				</tr>
				<tr><td >Merek Alat</td>
					<td >:</td>
					<td ><input type="text" name="merek" value="'.$merek.'" readonly="readonly"></td>
				</tr>
				<tr><td >Model Alat</td>
					<td >:</td>
					<td ><input type="text" name="model" value="'.$model.'" readonly="readonly"></td>
				</tr>
				<tr><td >Ruang</td>
					<td >:</td>
					<td ><input type="text" name="model" value="'.$nama_ruang.'"readonly="readonly"></td>
				</tr>
				<tr><td >Tanggal Update</td>
					<td >:</td>
					<td ><input type="text" name="tglstatus" value="'.date('Y-m-d').'"></td>
				</tr>
						
					<tr><td >Status Alat</td>
					<td >:</td>
					<td ><input type="radio" name="status" value="PEMELIHARAAN" checked>PEMELIHARAAN<br>
						<input type="radio" name="status" value="PERBAIKAN" >PERBAIKAN<br>
						<input type="radio" name="status" value="KALIBRASI" >KALIBRASI<br>
					</td>
				</tr>
						<tr><td colspan="2"></td>

					<td width="35%"><input type="submit" name="Update" value="Simpan"></td>
				</tr>
			</table>
		</FORM>';
}else echo "Data $kode Tidak ada";
?>