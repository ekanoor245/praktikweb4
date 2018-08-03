<?php
	session_start();
	include_once ('template_atas.php') ;
	session_destroy();
	echo "Anda Sudah keluar <br/> ";
	include_once ('template_bawah.php') ; 
?>