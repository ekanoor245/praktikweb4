<?php include_once ('template_atas.php') ; ?>
<?php
$nama="";
		if (isset ($_POST ["nama"]))
		$nama=$_POST["nama"];
include "koneksi.php";
		$sql="select * from kendaraan
		where nama like '%".$nama."%' 
		order by idkendaraan desc";
  $hasil=mysqli_query ($kon,$sql);
  if (!$hasil)
    die ("gagal query..".mysqli_error($kon));
?>

<table border="1" cellpadding="5" cellspacing="0">
	   <tr>
			<th> Nama Kendaraan</th>
			<th> Jenis Kendaraan</th>
			<th> Sopir</th>
			<th> Warna Kendaraan</th>
		</tr>
		<?php
		  $no= 0;
		  while ($row = mysqli_fetch_assoc ($hasil)) {
		  echo " <tr>";
		  echo " <td> ".$row['nama']	."</td>";
		  echo " <td> ".$row['jenis']		."</td>";
		  echo " <td> ".$row['sopir']		."</td>";
		  echo " <td> ".$row['warna']	."</td>";
		  echo " </tr>";
		}
		?>
</table>
<?php include_once ('template_bawah.php') ; ?>