<?php
require 'koneksi.php';
echo 'Tampilan Keseluruhan Data Tabel User
	<table width="100%" border="1">
		<tr>
			<th>Nomer</th>
			<th>Id User</th>
			<th>Password</th>
			<th>Nama</th>
			<th>Tlp</th>
			<th>Bagian</th>
			<th>Alamat</th>
			<th></th>
		</tr>';
		
	$nomer=0;
	$query = mysqli_query($conn,"SELECT*FROM user");
	while ($hasil=mysqli_fetch_assoc($query)) {
		$nomer++;
		echo "<tr>
				<td class='kotak_nomor'>$nomer</td>
				<td>$hasil[id_user]</td>
				<td>$hasil[password]</td>
				<td>$hasil[nama]</td>
				<td>$hasil[tlp]</td>
				<td>$hasil[bagian]</td>
				<td>$hasil[alamat]</td>
		</tr>";
	}
	echo '</table>';
?>