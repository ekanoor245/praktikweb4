<?php
	@session_start();
	$pengguna =isset($_SESSION["user"]) ? $_SESSION["user"] : "" ;
	$nama_lengkap=isset($_SESSION["nama_lengkap"]) ? $_SESSION["nama_lengkap"] : "" ;
	$akses=isset($_SESSION["akses"]) ? $_SESSION["akses"] : "sewa" ;
	if($akses == "sewa"){
		$nama_akses = "Operator Sewa" ;
	}else{
		$nama_akses = "Penyewa" ;
	}

		if (!empty($pengguna)){
			echo "Sedang Login Sebagai : $pengguna,
			Nama Lengkap :$nama_lengkap <br/>
			Akses Sebagai : $nama_akses,";
						$tampil_login = "display:none";
						$tampil_logout = "" ;
						}else{
						$tampil_login = "";
						$tampil_logout = "display:none";
						}

    session_start();
	$pengguna = $_POST['pengguna'];
	$kata_kunci = md5($_POST['kata_kunci']);
	
	$dataValid="YA";
	if (strlen(trim($pengguna))==0){
	    echo "User Harus Diisi!<br/>";
		$dataValid="TIDAK";
	}
	if (strlen(trim($kata_kunci))==0){
	    echo "Password Harus Diisi!<br/>";
		$dataValid="TIDAK";
	}
	if ($dataValid == "TIDAK") {
	    echo "Masih Ada Kesalahan, Silahkan Perbaiki ! <br/>";
		echo "<input type='button' value='kembali'
		       onClick='self.history.back()'>";
		exit;
	}
	
	include "koneksi.php";
	$sql = "select * from pengguna where
	        user='".$pengguna."' and password='".$kata_kunci."' limit 1" ;
	$hasil = mysqli_query($kon,$sql) or die('Gagal Akses ! <br/>');
	$jumlah = mysqli_num_rows($hasil);
	if($jumlah > 0){
	    $row = mysqli_fetch_assoc($hasil);
		$_SESSION["user"] = $row["user"];
		$_SESSION["nama_lengkap"] = $row["nama_lengkap"];
		$_SESSION["akses"] = $row["akses"];
		header("Location: template.html");
	}else{
	    echo "User atau Password Salah ! <br/>";
		echo "<input type='button' value='kembali'
		       onClick='self.history.back()'>";
	}
	?>