<?php include_once ('template_atas.php') ; ?>
<table border="1" cellpadding="5" cellspacing="0">
<form action='simpan_pinjam.php' method="POST">
<tr>
		<td>Id Sewa</td>
		
</tr>
<tr>
	<td>Nama</td>
</tr>
<tr>
	<td>No Telepon</td>
</tr>
<tr>
	<td>Alamat</td>
</tr>
<tr>
		<td>Nama Kendaraan</td>
		</td>
	</tr>
	<tr>
		<td>Jenis Kendaraan</td>
	</tr>
	<tr>
		<td>Jumlah Mobil yang disewa</td>
	</tr>
	<tr>
		<td>Sopir</td>
	</tr>
	<tr>
		<td>Denda</td>
		<td>
			<input type="text" name="denda" /> 
		</td>
	</tr>
	<tr>
		<td>Jumlah Bayar</td>
		<td>
			<input type="text" name="bayar" /> 
		</td>
<tr>
	<td colspan="2" align="center">
	<input type="submit" value="SIMPAN"/>
	<input type="submit" value="PRINT" onclick="window.print()"/></td>
</tr>
</form>
</table>
<?php include_once ('template_bawah.php') ; ?>