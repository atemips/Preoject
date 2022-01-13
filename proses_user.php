<?php 
require_once ('koneksi.php');
$id_user 	= $_POST['iduser'];
$password	= $_POST['password'];
$nama		= $_POST['nama'];
$bagian		= $_POST['bagian'];
$alamat		= $_POST['alamat'];
$telfon		= $_POST['telfon'];
	if ($id_user != "" && $password!=""&& $bagian!="") {
		$query = mysqli_query($conn,"SELECT * FROM `user` WHERE `id_user`= '$id_user' ");
		$jmlrek= mysqli_num_rows($query);
		if ($jmlrek=='0'){
			$query2= mysqli_query($conn,"INSERT INTO `user` (`id_user`,`password`,`nama`,`bagian`,`alamat`,`telfon`) VALUES ('$id_user','$password','$nama','$bagian','$alamat','$telfon')");
			echo "Data $id_user berhasil diinput";
		}
	 else{
		echo "Data $id_user sudah ada";
}
} else {
	echo " Data ID user,password,bagian belum diisi lengkap";

}
?>