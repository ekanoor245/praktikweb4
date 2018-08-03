<?php include_once ('template_atas.php') ; ?>
<table border="1" cellpadding="5" cellspacing="0">
<form action='simpan_pinjam.php' method="POST">
<tr>
		<td>NIK</td>
		<td><input type="text" name="nik"/> </td>
</tr>
<tr>
		<td>No SIM</td>
		<td><input type="text" name="sim"/> </td>
</tr>
<tr>
	<td>Nama</td>
	<td><input type="text" name="nama"/></td>
</tr>
<tr>
	<td>No Telepon</td>
	<td><input type="text" name="no"/></td>
</tr>
<tr>
		<td>Nama Kendaraan</td>
		<td><input type="checkbox" name="nama" value="mitsubishi">MITSUBISHI
		<input type="checkbox" name="nama" value="honda">HONDA
		<input type="checkbox" name="nama" value="toyota">TOYOTA
		</td>
	</tr>
	<tr>
		<td>Jenis Kendaraan</td>
		<td>
			<input type="checkbox" name="jenis" value="buka">Bak Terbuka
			<input type="checkbox" name="jenis" value="tutup">Bak Tertutup
		</td>
	</tr>
	<tr>
		<td>Sopir</td>
		<td>
			<input type="checkbox" name="sopir" value="ya">Ya
			<input type="checkbox" name="sopir" value="tidak">Tidak
		</td>
	</tr>
<tr>
	<td colspan="2" align="center">
	<input type="submit" value="SIMPAN"/>
	<input type="submit" value="RESET"/>
	<input type="submit" value="PRINT" onclick="window.print()"/></td>
</tr>
</form>
</table>
<?php include_once ('template_bawah.php') ; ?>