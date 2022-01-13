<?php
session_start();
error_reporting(0);
?>
<title>.:Sistem Informasi Penjadwalan Pemeliharaan Dan Kalibrasi Alat Kesehatan (SIPKAK):.</title>
<link href="style.css" rel="stylesheet" type="text/css">
<center>
	<table width="100%" cellspacing="0">
		<tr></tr>
		<tr>
			<td class="bg_header">Sistem Informasi Penjadwalan Pemeliharaan Dan Kalibrasi Alat Kesehatan (SIPKAK)
			</td>
		</tr>
		<?php
		if (isset($_SESSION['id_user'])){
				$user_id	=$_SESSION['id_user'];
				$user_level	=$_SESSION['bagian'];
				$user_name	=$_SESSION['nama'];
		?>
				<tr>
					<td><?php require "toolbar.php"; ?></td>
				</tr>
				<tr>
					<td><div style="padding:5px"> <?php require "control.php"; ?> </div></td>
				</tr>
			<?php
				} else {
					echo "<tr>
							<td align='center'>Anda belum login! Anda tidak berhak masuk ke halaman ini.Silahkan login <a href='index.php'>di sini </a></td>
							</tr>";
				}
		?>
		<tr>
			<td class="footer">&copy: 2021 By Advent Sabatika Tawa 1904005<br>
			</td>
		</tr>
	</table>
</center>