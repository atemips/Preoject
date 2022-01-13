<?php require_once('koneksi.php');
if (isset($_POST['kode'])) $kode=$_POST['kode'];
if (isset($_GET['kode'])) $kode=$_GET['kode'];

$query = mysqli_query($conn,"SELECT kode_alat, jenis.nama ,merek,model,tgl_beli,status, id_ruang,nama_ruang FROM alat,jenis,ruang where (substring(kode_alat,1,2)=kd and substring(kode_alat,3,2)=kode) and id_ruang=ruang.id and kode_alat='$kode' ORDER BY kode_alat" );
	while ($hasil=mysqli_fetch_assoc($query)) {
			$kode_alat 	= 	$hasil['kode_alat'];
			$nama_alat 	=	$hasil['nama'];
			$merek     	= 	$hasil['merek'];
			$model     	= 	$hasil['model'];
			$tgl_beli  	= 	$hasil['tgl_beli'];
			$status    	= 	$hasil['status'];
			$id_ruang  	= 	$hasil['id_ruang'];
			$nama_ruang	= 	$hasil['nama_ruang'];
			$tgl_beli = explode("-", $tgl_beli);
			$tgl_beli = $tgl_beli[2]."-".$tgl_beli[1]."-".$tgl_beli[0];
			$kd=substr($kode_alat,0,2);
			$kode=substr($kode_alat,2,2);
		}
	echo "<table width='60%' border='1'>
			<tr>
				<td colspan='3' align='center'><b>Edit Data Tabel Alat</b></td>
			</tr>
			<tr><td width='20%'>Kode Alat</td>
				<td width='2%'>:</td>
				<td width='38%'>$kode_alat</td>
				</tr>
				<tr><td >Nama Alat</td>
					<td >:</td>
					<td >$nama_alat</td>
				</tr>
				<tr><td >Merek Alat</td>
					<td >:</td>
					<td >$merek</td>
				</tr>
				<tr><td >Model Alat</td>
					<td >:</td>
					<td >$model</td>
				</tr>
				<tr><td >Tgl Pembelian</td>
					<td >:</td>
					<td >$tgl_beli</td>
				</tr>

				<tr><td >Nama Ruang</td>
					<td >:</td>
					<td >$nama_ruang</td> 
				</tr>
				<tr><td >Status</td>
					<td >:</td>
					<td >$status</td>
				</tr>
			</table> <br>";
		//riwayat pemeliharaan
	$nomer=0;
	$query1 = mysqli_query($conn,"SELECT * FROM `pemeliharaan` left join user on pemeliharaan.id_teknisi=user.id_user where kode_alat='$kode_alat' order by tgl DESC");
	$jmlrek1 = mysqli_num_rows($query1);
	if ($jmlrek1!='0') {
		echo "Tampil Riwayat pemeliharaan
		<table width='100%' border='1'>
			<tr>
				<th>Nomer</th>
				<th>Tanggal Msk</th>
				<th>Tanggal selesai</th>
				<th>Teknisi</th>
				<th>Keterangan</th>
			</tr>";
	
		while ($hasil1=mysqli_fetch_assoc($query1)){
			$nomer++;
			$kode_alat 	= 	$hasil1['kode_alat'];
			$tgl 		=	$hasil1['tgl'];
			$tgl_usai  	= 	$hasil1['tgl_usai'];
			$id_teknisi	= 	$hasil1['id_teknisi'];
			$ket 	 	= 	$hasil1['ket'];
			$nama   	= 	$hasil1['nama'];
			$tgl = explode("-", $tgl);
			$tgl= $tgl[2]."-".$tgl[1]."-".$tgl[0]; 
			$tgl_usai = explode("-", $tgl_usai);
			$tgl_usai= $tgl_usai[2]."-".$tgl_usai[1]."-".$tgl_usai[0]; 
			echo "<tr>
					<td>$nomer</td>
					<td>$tgl</td>
					<td>$tgl_usai</td>
					<td>$nama</td>
					<td>$ket</td>
				</tr>";
		}
	echo "</table> <br>";
	}
else {
		echo "Data $kode_alat belum pernah proses pemeliharaan <br>";
	}
	//riwayat perbaikan
	$nomer=0;
	$query1 = mysqli_query($conn,"SELECT * FROM `perbaikan` left join user on perbaikan.id_teknisi=user.id_user where kode_alat='$kode_alat' order by tgl DESC");
	$jmlrek1 = mysqli_num_rows($query1);
	if ($jmlrek1!='0'){
		echo "Tampil Riwayat perbaikan
		<table width='100%' border='1'>
			<tr>
				<th>Nomer</th>
				<th>Tanggal Msk</th>
				<th>Tanggal selesai</th>
				<th>Teknisi</th>
				<th>Keterangan</th>
				<th>Biaya</th>
			</tr>";
		$dana1=0;
		while ($hasil1=mysqli_fetch_assoc($query1)){
			$nomer++;
			$kode_alat 	= 	$hasil1['kode_alat'];
			$tgl 		=	$hasil1['tgl'];
			$tgl_usai  	= 	$hasil1['tgl_usai'];
			$id_teknisi	= 	$hasil1['id_teknisi'];
			$ket 	 	= 	$hasil1['ket'];
			$biaya 		= 	$hasil1['biaya'];
			$nama   	= 	$hasil1['nama'];
			$biaya_indo 	= number_format ($biaya, 2, ',', '.');
			$tgl = explode("-", $tgl);
			$tgl= $tgl[2]."-".$tgl[1]."-".$tgl[0]; 
			$tgl_usai = explode("-", $tgl_usai);
			$tgl_usai= $tgl_usai[2]."-".$tgl_usai[1]."-".$tgl_usai[0];
			$dana1=$dana1+$biaya; 
			echo "<tr>
					<td>$nomer</td>
					<td>$tgl</td>
					<td>$tgl_usai</td>
					<td>$nama</td>
					<td>$ket</td>
					<td align='right'>$biaya_indo</td>
				</tr>";
		}
		$dana1indo=number_format($dana1,2,',','.');
		echo "<tr>
				<td colspan='5'>Total Biaya perbaikan</td>
				<td align='right'><b>$dana1indo</b></td>
				</tr>
			</table> <br>";
		} else {
			echo "Data $kode_alat belum pernah proses perbaikan <br>";
		}
		//riwayat kalibrasi
			$nomer=0;
	$query1 = mysqli_query($conn,"SELECT * FROM `kalibrasi` left join user on kalibrasi.id_teknisi=user.id_user where kode_alat='$kode_alat' order by tgl DESC");
	$jmlrek1 = mysqli_num_rows($query1);
	if ($jmlrek1!='0'){
		echo "Tampil Riwayat kalibrasi
		<table width='100%' border='1'>
			<tr>
				<th>Nomer</th>
				<th>Tanggal Msk</th>
				<th>Tanggal selesai</th>
				<th>Teknisi</th>
				<th>Biaya</th>
			</tr>";
		$dana2=0;
		while ($hasil1=mysqli_fetch_assoc($query1)){
			$nomer++;
			$kode_alat 	= 	$hasil1['kode_alat'];
			$tgl 		=	$hasil1['tgl'];
			$tgl_usai  	= 	$hasil1['tgl_usai'];
			$id_teknisi	= 	$hasil1['id_teknisi'];
			$biaya 		= 	$hasil1['biaya'];
			$nama   	= 	$hasil1['nama'];
			$biaya_indo 	= number_format ($biaya, 2, ',', '.');
			$tgl = explode("-", $tgl);
			$tgl= $tgl[2]."-".$tgl[1]."-".$tgl[0]; 
			$tgl_usai = explode("-", $tgl_usai);
			$tgl_usai= $tgl_usai[2]."-".$tgl_usai[1]."-".$tgl_usai[0];
			$dana=$dana2+$biaya; 
			echo "<tr>
					<td>$nomer</td>
					<td>$tgl</td>
					<td>$tgl_usai</td>
					<td>$nama</td>
					<td align='right'>$biaya_indo</td>
				</tr>";
		}
		$dana2indo=number_format($dana2,2,',','.');
		echo "<tr>
				<td colspan='4'>Total Biaya kalibrasi</td>
				<td align='right'><b>$dana2indo</b></td>
				</tr>
			</table> <br>";
		} else {
			echo "Data $kode_alat belum pernah proses kalibrasi <br>";
		}
?>