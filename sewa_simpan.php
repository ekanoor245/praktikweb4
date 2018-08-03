<?php
	if(isset($_POST['idsewa'])){
	$foto_lama	= $_POST['foto_lama'];
	$simpan 	= "edit";
	}
	else{	
		$simpan = "baru"; 
	}

$nik		= $_POST['nik'];
$sim		= $_POST['sim'];
$nama		= $_POST['nama'];
$alamat 	= $_POST['alamat'];
$no			= $_POST['no'];
$denda		= $_POST['denda'];
$bayar		= $_POST['bayar'];
$foto 		= $_FILES['foto'] ['name'];
$tmpname 	= $_FILES['foto'] ['tmp_name'];
$size 		= $_FILES['foto'] ['size'];
$type 		= $_FILES['foto'] ['type'];

$maxsize = 1500000;
$typeYgBoleh = array("image/jpeg","image/png","image/pjpeg");
$dirFoto = "pict";
if (!is_dir($dirFoto))
	mkdir($dirFoto);
$fileTujuanFoto = $dirFoto."/".$foto;

$dirThumb ="thumb";
if(!is_dir($dirThumb))
	mkdir($dirThumb);
$fileTujuanThumb = $dirThumb."/t_".$foto;
	
	if ($size > 0) {
	if ($size > $maxsize){
		echo "ukuran file terlalu beasar <br/>";
		$datavalid="tidak";
	}
	if (!in_array($type,$typeYgBoleh)){
		echo "type file tidak dikenal <br/>";
		$datavalid="tidak";
	}
}

$datavalid = "Ya";
if (strlen(trim($nik))==0){
	echo "nik Harus Diisi! <br/>";
	$datavalid = "Tidak";
}
if (strlen(trim($sim))==0){
	echo "sim Harus Diisi! <br/>";
	$datavalid = "Tidak";
}
if (strlen(trim($nama))==0){
	echo "Nama Harus Diisi! <br/>";
	$datavalid = "Tidak";
}
if (strlen(trim($alamat))==0){
	echo "Alamat Harus Diisi! <br/>";
	$datavalid = "Tidak";
}
if (strlen(trim($no))==0){
	echo "No Harus Diisi! <br/>";
	$datavalid = "Tidak";
}
if (strlen(trim($denda))==0){
	echo "denda Harus Diisi! <br/>";
	$datavalid = "Tidak";
}
if (strlen(trim($bayar))==0){
	echo "Bayar Harus Diisi! <br/>";
	$datavalid = "Tidak";
}
if ($datavalid == "Tidak"){
	echo "Masih ada kesalahan, Silahkan perbaiki!<br/>";
	echo "<input type='button' value='kembali'
			onClick='self.history.back()'>";
	exit;
}

include "koneksi.php";
if($simpan == "edit") {
	if($size == 0){
		$foto = $foto_lama;
	}
	$sql = "update sewa set 
			nik			= '$nik';
			sim			= '$sim';
			nama		= '$nama',
			alamat 		= '$alamat',
			no 			= '$no',
			denda		= '$denda',
			bayar		= '$bayar',
			foto		= '$foto',
			where idsewa = $idsewa";
	}else{
		$sql = "insert into sewa
				(nama,alamat,no,bayar,foto)
				values
				('$nik', '$sim', '$nama','$alamat','$no', '$denda', '$bayar', '$foto' )"; 
		}
$hasil = mysqli_query($kon,$sql);

if (!$hasil){
	echo "Gagal simpan, silahkan diulang! <br/>";
	echo mysqli_error($kon);
	echo "<br/><input type='button' value='kembali'
	onClick='self.history.back()'>";
	exit;
}else{
	echo "Simpan data berhasil";
}

if ($size > 0){
	if (!move_uploaded_file($tmpname,$fileTujuanFoto)) {
		echo "gagal upload gambar..<br/>";
		echo"<a href='sewa_tampil.php'>Daftar sewa </a>";
		exit;
	} else{
		buat_thumbnail($fileTujuanFoto,$fileTujuanThumb);
	}
}
echo "<br/>file sudah di upload. <br/>";
function buat_thumbnail($file_src,$file_dst){
	list($w_src,$h_src,$type) = getImageSize($file_src);
	switch ($type){
	case 1: //gif->jpg
	$img_src = imagecreatefromgif($file_src);
	break;
	case 2:
		$img_src =imagecreatefromjpeg($file_src);
		break;
	case 3:
		$img_src = imagecreatefrompng($file_src);
		break;
	}
	$thumb = 100;
	if ($w_src > $h_src) {
		$w_dst = $thumb;
		$h_dst = round($thumb / $w_src * $h_src);
	}
	else {
		$w_dst = round($thumb / $h_src * $w_src );
		$h_dst = $thumb;
	}
		
	$img_dst = imagecreatetruecolor($w_dst,$h_dst);
	
	imagecopyresampled($img_dst, $img_src, 0,0,0,0,
		$w_dst,$h_dst,$w_src,$h_src);
		imagejpeg($img_dst, $file_dst);
		imagedestroy($img_src);
		imagedestroy($img_dst);
	}
?>
<a href="sewa_tampil.php">tampil</a>