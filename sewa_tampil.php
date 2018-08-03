<?php include_once ('template_atas.php') ; ?>
<?php
$nama="";
		if (isset ($_POST ["nama"]))
		$nama=$_POST["nama"];
include "koneksi.php";
		$sql="select * from sewa
		where nama like '%".$nama."%' 
		order by idsewa desc";
  $hasil=mysqli_query ($kon,$sql);
  if (!$hasil)
    die ("gagal query..".mysqli_error($kon));
?>

<table border="1" cellpadding="5" cellspacing="0">
	   <tr>
			<th> Foto</th>
			<th> NIK</th>
			<th> No SIM</th>
			<th> Nama</th>
			<th> Alamat</th>
			<th> No Telepon</th>
			<th> Denda</th>
			<th> Bayar</th>
		</tr>
		<?php
		  $no= 0;
		  while ($row = mysqli_fetch_assoc ($hasil)) {
		  echo " <tr>";
		  echo" <td> <a href='pict/{$row['foto']}'/>
		         <img src='thumb/t_{$row['foto']}' width='100' height='100'/>
				 </a></td>";
		echo " <td> ".$row['nik']	."</td>";
		echo " <td> ".$row['sim']	."</td>";			
		echo " <td> ".$row['nama']	."</td>";
		echo " <td> ".$row['alamat']	."</td>";
		echo " <td> ".$row['no']		."</td>";
		echo " <td> ".$row['denda']	."</td>";
		echo " <td> ".$row['bayar']	."</td>";
		echo " </tr>";
		}
		?>
</table>
<?php include_once ('template_bawah.php') ; ?>