<?php
require_once('koneksi.php');
session_start();//
//strip_tags : menghilangkan tag2 HTML tersebut bukan mengubahnya menjadi text biasa.
//htmlspesialchars: mengubah tag2 HTML akan diubah menjadi text biasa
//stripslashes; membuang karakter escape "\",
//mysql_real_escape_string :digunakan untuk memberi backslash di beberapa kode untuk ditampilkan pada halaman, namun saat menyimpan menuju sql, kode akan tetap normal tanpa ada backsalash.
function anti_injection($data){
	$filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter;
}

if (isset ($_POST ['Login'])) {//
	$user =($_POST['user']);
	$pass =($_POST['pass']);
	$login =mysqli_query($conn,"SELECT * FROM user WHERE id_user='$user' AND password='$pass' ");
	$ketemu=mysqli_num_rows($login);
	$r=mysqli_fetch_assoc($login);
	if ($ketemu > 0){
		session_start();
		$_SESSION['id_user'] = $r['id_user'];
		$_SESSION['nama'] = $r['nama'];
		$_SESSION['bagian'] = $r['bagian'];
		//menuju halaman utama
		header ("location:home.php?p=0") ;
	} else echo ("<META HTTP-EQUIV='Refresh' CONTENT='0;url=index.php'>");
} else {?>
	<html>
	<link href="style.css" rel="stylesheet" type="text/css">
	<head>
		<title>Login here...</title>
		<script language="javascript">
			function validasi(form){
			if (form.user.value == ""){
				alert("Anda belum mengisikan Username");
				form.user.focus();
				return (false);
			}

			if (form.pass.value == ""){
				alert("Anda belum mengisikan password.");
				form.pass.focus();
				return(false);
			}
			return(true);
		}
		</script>
		</head>
		<body><br><br>
			<form action="" method="post" onSubmit="return validasi(this)">
			<table border="0" width="40%" align="center">
				<tr>
					<th colspan="3" class="bg_header">SISTEM INFORMASI Sistem Informasi Pencatatan Alat Kesehatan (SIPAK)</th>
					</tr>
					<tr>
						<td>Username </td>
						<td>: </td>
						<td><input type="text" name="user" id="user"> </td>
					</tr>
					<tr>
						<td>Password </td>
						<td>: </td>
						<td><input type="password" name="pass" id="pass"> </td>
					</tr>
					<tr>
						<td colspan="2" class="footer"> </td>
						<td class="footer"><input type="submit" name="Login" value="Login"> </td>
						</tr>
					</table>
			</form>
		</body>
	</html> 
<?php } ?>