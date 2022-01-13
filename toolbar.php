<?php
echo '<div id="menu">
	<ul>
		<li><a href="?p=">Peralatan</a>
			<ul>
				<li><a href="?p=1">Tampil Alat</a></li>
				<li><a href="?p=2">Input Alat</a></li>
				<li><a href="?p=3">Edit Alat</a></li>

			</ul>
		</li>
		<li><a href="?p=">Status Alat</a>
			<ul>
				<li><a href="?p=4">Edit Status</a></li>
				<li><a href="?p=12">Pemeliharaan</a></li>
				<li><a href="?p=13">Perbaikan</a></li>
				<li><a href="?p=14">Kalibrasi</a></li>
			</ul>
		</li>
			<li><a href="?p=">Ruang</a>
			<ul>
				<li><a href="?p=52">Edit Ruang</a></li>
			</ul>
		<li><a href="?p=">USER</a>
			<ul>
				<li><a href="?p=23">Edit User</a></li>
			</ul>
		</li>
		<li><a href="?p=">Rekapitulasi Alat</a>
			<ul>
				<li><a href="?p=21">Jumlah Alat</a></li>
				<li><a href="?p=22">Riwayat Alat</a><li>
			</ul>
		</li>
		<li><a href="logout.php">Logout- '.$user_name.' Level='.$user_level.'</a>
		</li>
		</ul>
</div>';
?>