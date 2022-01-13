<?php
function tampil_all(){
global $conn;
echo 'Tampilan seluruhan Data Tabel Alat
		<table width="100%" border="1">
			<tr>
				<th>Nomer</th>
				<th>Kode Alat</th>
				<th>Nama Alat</th>
				<th>Merek</th>
				<th>Model</th>
				<th>Tgl Beli</th>
				<th>Status</th>
				<th>Id Ruang</th>
				<th>Nama Ruang</th>
			</tr>';
$nomer=0;
$query=mysqli_query($conn,"SELECT kode_alat, nama ,merek,model,tgl_beli,status, 
id_ruang,nama_ruang FROM alat,jenis,ruang where (substring(kode_alat,1,2)=kd and 
substring(kode_alat,3,2)=kode) and id_ruang=ruang.id ORDER BY kode_alat" );
while ($hasil=mysqli_fetch_assoc($query)) {
	$nomer++;
	$tgl_beli = explode("-", $hasil['tgl_beli']);
	$tgl_beli = $tgl_beli[2]."-".$tgl_beli[1]."-".$tgl_beli[0];
	
	echo "<tr>
			<td class='kotak_nomor'>$nomer</td>
			<td>$hasil[kode_alat]</td>
			<td>$hasil[nama]</td>
			<td>$hasil[merek]</td>
			<td>$hasil[model]</td>
			<td>$tgl_beli</td>
			<td>$hasil[status]</td>
			<td>$hasil[id_ruang]</td>
			<td>$hasil[nama_ruang]</td>
		</tr>";
	}
	echo '</table>';
}
function tampil_kategori($a){
	global $conn;
	$query=mysqli_query($conn,"SELECT nama FROM kategori where kode='$a' ");
	$hasil=mysqli_fetch_assoc($query);
	$nama_kategori = $hasil['nama'];
	
		echo "Tampilan berdasarkan Kategori:$nama_kategori
			<table width='100%' border='1'>
				<tr>
					<th>Nomer</th>
					<th>Kode Alat</th>
					<th>Nama Alat</th>
					<th>Merek</th>
					<th>Model</th>
					<th>Tgl Beli</th>
					<th>Status</th>
					<th>Id Ruang</th>
					<th>Nama Ruang</th>
				</tr>";
	$nomer=0;
	$query=mysqli_query($conn,"SELECT kode_alat, jenis.nama as 
	nama_alat,merek,model,tgl_beli,status, id_ruang,nama_ruang FROM alat,jenis,ruang 
	where substring(kode_alat,1,2)='$a' and (substring(kode_alat,1,2)=kd and 
	substring(kode_alat,3,2)=kode) and id_ruang=ruang.id ORDER BY kode_alat" );
	while ($hasil=mysqli_fetch_assoc($query)) {
		$nomer++;
		$tgl_beli = explode("-", $hasil['tgl_beli']);
		$tgl_beli = $tgl_beli[2]."-".$tgl_beli[1]."-".$tgl_beli[0];
	echo "<tr>
			<td class='kotak_nomor'>$nomer</td>
			<td>$hasil[kode_alat]</td>
			<td>$hasil[nama_alat]</td>
			<td>$hasil[merek]</td>
			<td>$hasil[model]</td>
			<td>$tgl_beli</td>
			<td>$hasil[status]</td>
			<td>$hasil[id_ruang]</td>
			<td>$hasil[nama_ruang]</td>
		</tr>";
	}
	echo '</table>';
}
function tampil_jenis($a,$b){
	global $conn;
	$query=mysqli_query($conn,"SELECT nama FROM kategori where kode='$a' ");
	$hasil=mysqli_fetch_assoc($query);
	$nama_kategori = $hasil['nama'];
	$query1 = mysqli_query($conn,"SELECT nama FROM jenis where kd='$a' and kode='$b'");
	$hasil1=mysqli_fetch_assoc($query1);
	$nama_jenis = $hasil['nama'];
	
	echo "Tampilan berdasarkan Kategori:$nama_kategori, jenis:$nama_jenis
			<table width='100%' border='1'>
				<tr>
					<th>Nomer</th>
					<th>Kode Alat</th>
					<th>Nama Alat</th>
					<th>Merek</th>
					<th>Model</th>
					<th>Tgl Beli</th>
					<th>Status</th>
					<th>Id Ruang</th>
					<th>Nama Ruang</th>
				</tr>";
	$nomer=0;
	$query=mysqli_query($conn,"SELECT kode_alat, jenis.nama as 
	nama_alat,merek,model,tgl_beli,status, id_ruang,nama_ruang FROM alat,jenis,ruang 
	where substring(kode_alat,1,2)='$a' and substring(kode_alat,3 ,2)='$b' and 
	(substring(kode_alat,1,2)=kd and substring(kode_alat,3,2)=kode) and 
	id_ruang=ruang.id ORDER BY kode_alat desc");
	while ($hasil=mysqli_fetch_assoc($query)) {
		$nomer++;
		$tgl_beli = explode("-", $hasil['tgl_beli']);
		$tgl_beli = $tgl_beli[2]."-".$tgl_beli[1]."-".$tgl_beli[0];
		
		echo "<tr>
				<td class='kotak_nomor'>$nomer</td>
				<td>$hasil[kode_alat]</td>
				<td>$hasil[nama_alat]</td>
				<td>$hasil[merek]</td>
				<td>$hasil[model]</td>
				<td>$tgl_beli</td>
				<td>$hasil[status]</td>
				<td>$hasil[id_ruang]</td>
				<td>$hasil[nama_ruang]</td>
			</tr>";
	}
	echo '</table>';
}
?>