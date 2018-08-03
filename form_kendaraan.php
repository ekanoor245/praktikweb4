<?php include_once ('template_atas.php') ; ?>
<form action="kendaraan_simpan.php" method="post" enctype="multipart/form-data">
<table border="1" cellpadding="5" cellspacing="0">
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
		<td>Warna Kendaraan</td>
		<td><select name="warna">
					<option value="pilih">Silahkan Pilih</option>
					<option value="merah">MERAH</option>
					<option value="hitam">HITAM</option>
					<option value="silver">SILVER</option>
			</select></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<input type="submit" value="Simpan"
			name="proses"/>
			<input type="reset" value="Reset"/>
			<input type="button" value="Print"
			onclick="window.print()"> </td>
	</tr>
	</table>
</form>
<?php include_once ('template_bawah.php') ; ?>