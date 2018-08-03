<?php
	if(isset($_POST['idkendaraan'])){
	$foto_lama	= $_POST['foto_lama'];
	$simpan 	= "edit";
	}
	else{	
		$simpan = "baru"; 
	}

$no			= $_POST['no'];
$nama		= $_POST['nama'];
$jenis		= $_POST['jenis'];
$sopir		= $_POST['sopir'];
$warna		= $_POST['warna'];
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
if (strlen(trim($no))==0){
	echo "no Harus Diisi! <br/>";
	$datavalid = "Tidak";
}
if (strlen(trim($nama))==0){
	echo "Nama Harus Diisi! <br/>";
	$datavalid = "Tidak";
}
if (strlen(trim($jenis))==0){
	echo "jenis Harus Diisi! <br/>";
	$datavalid = "Tidak";
}
if (strlen(trim($sopir))==0){
	echo "sopir Harus Diisi! <br/>";
	$datavalid = "Tidak";
}
if (strlen(trim($warna))==0){
	echo "warna Harus Diisi! <br/>";
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
	$sql = "update kendaraan set 
			no 			= '$no',
			nama		= '$nama',
			jenis		= '$jenis',
			sopir		= '$sopir',
			warna		= '$warna',
			foto		= '$foto',
			where idkendaraan = $idkendaraan";
	}else{
		$sql = "insert into kendaraan
				(no,nama,jenis,sopir,,warna,foto)
				values
				('$no', '$nama', '$jenis', '$sopir', '$warna', '$foto' )"; 
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
		echo"<a href='kendaraan_tampil.php'>Daftar sewa </a>";
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
<a href="kendaraan_tampil.php">tampil</a>