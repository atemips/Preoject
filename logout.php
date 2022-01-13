<?php
session_start();
if (isset($_SESSION['id_user'])) {
	unset ($_SESSION);
	session_destroy();
	header("location:index.php") ;
} ?>