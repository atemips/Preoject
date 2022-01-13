<?php
$p=$_GET['p'];
if (empty($p)) $p=0;
if ($p==0) require "selamat.php";
if ($p==1) require "tampil_alat.php";

if ($p==2) require "input_alat.php";
if ($p==20) require "simpan_alat.php";

if ($p==3) require "tampil_edit_alat.php";
if ($p==30) require "edit_alat.php";
if ($p==31) require "simpan_edit_alat.php";

if ($p==4) require "tampil_edit_status_alat.php";
if ($p==40) require "edit_status_alat.php";
if ($p==41) require "simpan_edit_status_alat.php";

if ($p==12) require "tampil_pemeliharaan_alat.php";
if ($p==120) require "edit_pemeliharaan_alat.php";
if ($p==121) require "proses_pemeliharaan_alat.php";

if ($p==52) require "tampil_ruang.php";

if ($p==23) require "tampil_user.php";

if ($p==21) require "tampil_rekap_alat.php";

if ($p==22) require "tampil_riwayat_alat.php";

if ($p==220) require "riwayat_alat.php";

?>