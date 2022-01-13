<?php require_once('koneksi.php');?>
<form action="edit_pemeliharaan_alat.php" method="POST" name="kodeinput">
<table width="60%" border="1">
	<tr>
		<td colspan="3" align="center"><b> Status Pemeliharaan Alat</b></td>
	</tr>
			<tr><td width="20%">Kode Alat</td>
				<td width="2$">:</td>
				<td width="38%"><input name="kode" type="text" size="9" maxlength="9"></td>
			</tr>
			<tr><td colspan="2"></td>
				<td width="35%"><input type="submit" name="Input" value="Input"></td>
			</tr>
</table>
</form>
Tampilkan Data Pemeliharaan Alat
<table width="100%" border="1">
	<tr>
		<th>Nomer</th>
		<th>Kode Alat</th>
		<th>Nama Alat</th>
		<th>Merek</th>
		<th>Model</th>
		<th>Tgl Beli</th>
		<th>Nama Ruang</th>
		<th>Teknisi</th>
		<th>Tgl</th>
		<th>Ket</th>
	</tr>
<?php
$nomer=0;
//cari data pemeliharaan yang tgl_usai masih kosong
$query = mysqli_query($conn,"SELECT * FROM `pemeliharaan` left join user on pemeliharaan.id_teknisi=user.id_user where tgl_usai='0000-00-00' order by tgl,kode_alat asc");
while ($hasil=mysqli_fetch_assoc($query)) {
		$nomer++;
		$kode_alat	=	$hasil['kode_alat'];
		$tgl 		=	$hasil['tgl'];
		$id_teknisi	=	$hasil['id_teknisi'];
		$ket 		=	$hasil['ket'];
		$nama 		=	$hasil['nama'];

		$tgl = explode("-", $tgl);
		$tgl = $tgl[2]."-".$tgl[1]."-".$tgl[0];
		//cari data tabel alat sesuai kode_Alat
		$query2 = mysqli_query($conn,"SELECT * FROM alat,jenis,ruang where (substring(kode_alat,1,2)=kd and substring(kode_alat,3,2)=kode) and id_ruang=ruang.id and `kode_alat`='$kode_alat' ");
		$hasil2=mysqli_fetch_assoc($query2);
		$merek 		=	$hasil2['merek'];
		$model 		= 	$hasil2['model'];
		$tgl_beli 	=	$hasil2['tgl_beli'];
		$status 	=	$hasil2['status'];
		$id_ruang 	= 	$hasil2['id_ruang'];
		$nama_ruang =	$hasil2['nama_ruang'];
		$nama_alat 	=	$hasil2['nama'];
		echo "<tr>
				<td>$nomer</td>
				<td><a href='?p=120&kode=$kode_alat' style='TEXT-DECORATION: NONE'>$kode_alat</a></td>
				<td>$nama_alat</td>
				<td>$model</td>
				<td>$merek</td>
				<td>$tgl_beli</td>
				<td>$nama_ruang</td>
				<td>$nama</td>
				<td>$ket</td>
				<td>$tgl</td>
			</tr>";
}
?>
</table>