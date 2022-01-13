<?php require_once('koneksi.php');
if (isset($_POST['kode'])) $kode=$_POST['kode'];
if (isset($_GET['kode'])) $kode=$_GET['kode'];

$query = mysqli_query($conn,"SELECT * FROM `pemeliharaan` where kode_alat='$kode' and tgl_usai='0000-00-00' ");
$jmlrek = mysqli_num_rows($query);

if ($jmlrek!='0') {
	while ($hasil=mysqli_fetch_assoc($query)) {
		$id 		=	$hasil['id'];
		$kode_alat 	= 	$hasil['kode_alat'];
		$tgl  		=	$hasil['tgl'];
		$id_teknisi = 	$hasil['id_teknisi'];
		$ket 		= 	$hasil['ket'];

		//
		$query2 = mysqli_query($conn,"SELECT * FROM alat,jenis,ruang where (substring(kode_alat,1,2)=kd and substring(kode_alat,3,2)=kode) and id_ruang=ruang.id and kode_alat='$kode_alat' ");
		$hasil2=mysqli_fetch_assoc($query2);
			$merek     = $hasil2['merek'];
			$model     = $hasil2['model'];
			$tgl_beli  = $hasil2['tgl_beli'];
			$status    = $hasil2['status'];
			$id_ruang  = $hasil2['id_ruang'];
			$nama_ruang= $hasil2['nama_ruang'];
			$nama_alat = $hasil2['nama'];
	}
			echo '<FORM ACTION="?p=121" METHOD="POST" NAME="input">
		<table width="60%" border="1">
		<input type="hidden" name="id" value="'.$id.'"	/>
			<tr>
				<td colspan="3" align="center"><b>Edit Data Pemeliharaan Alat</b></td>
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
				<tr><td >Teknisi</td>
					<td >:</td>
					<td ><select name="teknisi">';
					$tampil=mysqli_query($conn,"SELECT * FROM user where bagian='IPSRS' ORDER BY nama");
						if ($id_teknisi==''){
							echo "<option value=0 selected>- Pilih Teknisi -</option>";
						}
						while ($w=mysqli_fetch_assoc($tampil)) {
							if ($id_teknisi==$w['id_user']){
								echo "<option value=$w[id_user] selected>$w[nama]</option>";
							}
							else{
								echo "<option value=$w[id_user]>$w[nama]</option>";
							}
						}
						echo '</select>
					</td>
				</tr>
				<tr><td >Keterangan</td>
					<td >:</td>
					<td ><textarea name="ket" >'.$ket.'</textarea></td>
				</tr>
				<tr><td >Tanggal selesai</td>
					<td >:</td>
					<td ><input type="text" name="tglusai" value="'.date('Y-m-d').'"></td>
				</tr>
				<tr><td >Status Alat</td>
					<td >:</td>
					<td ><input type="radio" name="status" value="PEMELIHARAAN" checked>PEMELIHARAAN<br>
						<input type="radio" name="status" value="LAIK" >LAIK<br>
						</td>
				</tr>
				<tr><td colspan="2"></td>
					<td width="35%"><input type="submit" name="Input" value="Simpan"></td>
				</tr>
			</table>
		</FORM>';
}
else {
	echo "Data $kode Tidak ada"; }
?>