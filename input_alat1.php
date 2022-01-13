<?php
//error_reporting(0); 
require('koneksi.php'); 
require('tampil.php');
if (isset($_POST['kategori']))
	$kategori =$_POST['kategori'];
else $kategori="";
if (isset($_POST['jenis']))
	$jenis =$_POST['jenis'];
else $jenis="";
?>
<form method="post" action="">
	<table>
	<tr>
		<td colspan='3'></td>
	</tr>
	<tr>
		<td>Kategori Alat</td>
		<td>:</td>
		<td><select name="kategori"	onchange='this.form.submit()'>
			<option value="" selected>---All Kategori Alat</option>
		<?php
		$q=mysqli_query($conn,"select kode,nama from kategori order by kode" );
		while ($h=mysqli_fetch_assoc($q)){
				$kode	=	$h['kode'];
				$nama	=	$h['nama'];
				if ($kategori==$kode)
					echo "<option value=$kode selected>$nama</option>";
				else
					echo "<option value=$kode>$nama</option>";
			}
			?>
		</select></td>
	</tr>
	<tr>
		<td>Jenis Alat</td>
		<td>:</td>
		<td>
			<select name="jenis"	onchange='this.form.submit()'>
			<option value="" selected><b>---All Jenis Alat</b></option>
			<?php
			$q=mysqli_query($conn,"select kd,kode,nama from jenis where kd='$kategori' order by kode");
			while ($h=mysqli_fetch_array($q)){
				$kode	=	$h['kode'];
				$nama	=	$h['nama'];
				if ($jenis==$kode)
					echo "<option value=$kode selected>$nama</option>";
				else
					echo "<option value=$kode>$nama</option>";
			}
			?>
		</select>*Jika akan memilih kembali kategori pilih dl jenis alat <b>All Jenis Alat</b>
		</td>
	</tr>
	</table>
</form>
<?php
	if ($kategori!="" && $jenis!="" ) {
		//tampilkan form input data alat
		$kode_alat=$kategori.$jenis;
		$carinourut = mysqli_query($conn,"SELECT max(kode_alat) FROM alat WHERE kode_alat LIKE '$kode_alat%'");
		//menjadikannya array
		$datanourut = mysqli_fetch_row($carinourut);
		//jika $datakode
		if ($datanourut) {
			//membuat variabel baru untuk mengambil kode alat selain karakter 1-4
			$nilainourut = substr($datanourut[0], 4);
			//menjadikan $nilaikode ( int )
			$nourut = (int) $nilainourut;
			//setiap $kode di tambah 1
			$zzz = $nourut + 1;
			//hasil untuk menambah kode 
			//angka 3 untuk menambah tiga angka setelah kode dan angka 0 angka yang berada di tengah 
			//atau angka sebelum $kode
			$hasilnourut = "$kode_alat".str_pad($zzz, 3, "0", STR_PAD_LEFT);
		} else 
			$hasilnourut = "001";
	?>
	<FORM ACTION="?p=20" METHOD="POST" NAME="input">
		<table width="60%" border="1">
			<tr><td colspan="3" align="center"><b>Inputan Data Tabel Alat</b></td>		
			</tr>
			<tr><td width="20%">Kode Alat</td>
				<td width="2%">:</td>
				<td width="38%"><input name="kode" type="text" size="7" maxlength"7" value="<?php echo $hasilnourut ?>"</td>
			</tr>
			<tr><td >Inventaris<br />Jika Diperlukan</td>
				<td >:</td>
				<td ><input type="text" name="inventaris" ></td>
			</tr>
			<tr><td >Merek Alat</td>
				<td >:</td>
				<td ><input type="text" name="merek" ></td>
			</tr>
			<tr><td >Model Alat</td>
				<td >:</td>
				<td ><input type="text" name="model" ></td>
			</tr>
			<tr><td >Tgl Pembelian</td>
				<td >:</td>
				<td ><input name="tglbeli" value="<?php echo date('Y-m-d'); ?>"></td>
			</tr>
			<tr><td >Status Alat</td>
				<td >:</td>
				<td ><input type="radio" name="status" value="LAIK" checked>LAIK<br>
					<input type="radio" name="status" value="PEMELIHARAAN" >PEMELIHARAAN<br>
					<input type="radio" name="status" value="PERBAIKAN" >PERBAIKAN<br>
					<input type="radio" name="status" value="KALIBRASI" >KALIBRASI<br>
				</td>
			</tr>
			<tr>
				<td >Ruang</td>
				<td >:</td>
				<td ><select name="idruang">
					<option value=''>------</option>
					<?php
					$tampil=mysqli_query($conn,"SELECT * FROM ruang ORDER BY id");
					while($w=mysqli_fetch_assoc($tampil)){
						echo "<option value=$w[id]>$w[nama_ruang]</option>";
					}
					?>
					</select>
				</td>
			</tr>
			<tr><td colspan="2"><input type="submit" name="Input" value="Input"></td>
				<td width="35%"></td>
			</tr>
		</table>
	</FORM>
<?php 	tampil_jenis($kategori,$jenis);		
		} else if ($kategori!="" && $jenis=="")
			tampil_kategori($kategori);
			else
				tampil_all();
	?>