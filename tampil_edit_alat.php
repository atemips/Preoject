<?php
//error_reporting(0);
require('koneksi.php');
require('tampil_edit.php');
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
		<td><select name="kategori" onchange='this.form.submit()'>
			<option value="" selected>---All Kategori Alat</option>
		<?php
		$q=mysqli_query($conn,"select kode,nama from kategori order by kode");
		while ($h=mysqli_fetch_assoc($q)){
					$kode = $h['kode'];
					$nama = $h['nama'];
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
		<select name="jenis" onchange='this.form.submit()'>
		<option value="" selected><b>---All Jenis Alat</b></option>
		<?php
		$q=mysqli_query($conn,"select kd,kode,nama from jenis where kd='$kategori' order 
		by kode");
		while ($h=mysqli_fetch_array($q)){
			$kode = $h['kode'];
			$nama = $h['nama'];
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
	if ($kategori!="" && $jenis!="" )
		tampil_jenis($kategori,$jenis);
	else if ($kategori!="" && $jenis=="" )
		tampil_kategori($kategori);
	else {
		echo '<FORM ACTION="?p=30" METHOD="POST" NAME="input">
		<table width="60%" border="1">
		<tr><td colspan="3" align="center"><b>Pencarian Data Alat</b></td>
		</tr>
		<tr><td width="20%">Kode Alat</td>
		<td width="2%">:</td>
		<td width="38%"><input name="kode" size="9" maxlength="9">
		</td>
		</tr>
		<tr><td colspan="2"></td>

		<td width="35%"><input type="submit" name="Edit" value="Edit"></td>
		</tr>
		</table>
		</FORM>';


		tampil_all();
	}
?>