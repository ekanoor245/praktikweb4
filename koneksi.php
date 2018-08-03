<?php
error_reporting(E_ALL ^ E_DEPRECATED);
	$host	="localhost";
	$user	="root";
	$pass	="";
	$dbName	="sewa";
	$kon=mysqli_connect ($host,$user,$pass);
		if (!$kon)
		die ("gagal koneksi..");
	$hasil=mysqli_select_db($kon,$dbName);
		if (!$hasil){
			$hasil=mysqli_query ($kon, "CREATE DATABASE $dbName");
		if (!$hasil)
			die ("gagal buat database");
		else
			$hasil=mysqli_select_db ($kon,$dbName);
		if (!$hasil) die ("gagal koneksi database");  	
		}
		
$sqlTabelsewa="create table if not exists sewa (
                 idsewa int auto_increment not null primary key,
				 nik int not null default 0,
				 sim int not null default 0,
				 nama varchar(40) not null,
				 alamat varchar(40) not null,
				 no varchar(12) not null default 0,
				 denda int not null default 0,
				 bayar int not null default 0,
				 foto varchar (70) not null default '',
				 KEY (nama))";
mysqli_query ($kon, $sqlTabelsewa) or die ("gagal buat tabel sewa");

$sqlTabelkendaraan="create table if not exists kendaraan (
                 idkendaraan int auto_increment not null primary key,
				 no varchar(12) not null default 0,
				 nama varchar(30) not null,
				 jenis varchar(30) not null,
				 sopir varchar(30) not null,
				 warna varchar(30) not null,
				 foto varchar (70) not null default '',
				 KEY (nama))";
mysqli_query ($kon, $sqlTabelkendaraan) or die ("gagal buat tabel kendaraan");

$sqlTabelUser = "create table if not exists pengguna (
                idpengguna int auto_increment not null primary key,
				user varchar(25) not null,
				password varchar(50) not null,
				nama_lengkap varchar(50) not null,
				akses varchar(10) not null
				)";
mysqli_query($kon,$sqlTabelUser) or die ("Gagal Buat Tabel Pengguna");

$sql = "select * from pengguna" ;
$hasil = mysqli_query($kon,$sql);
$jumlah = mysqli_num_rows($hasil);
if($jumlah == 0){
    $sql = "insert into pengguna (user,password,nama_lengkap,akses)
	        values ('admin',md5('admin'),'administrator','sewa'),
			       ('cust',md5('cust'),'pelanggan','sewa')";
	mysqli_query($kon,$sql);
}	
?>	