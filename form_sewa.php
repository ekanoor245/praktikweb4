<?php include_once ('template_atas.php') ; ?>
<form action="sewa_simpan.php" method="post" enctype="multipart/form-data">
<table border="1" cellpadding="5" cellspacing="0">
	<tr>
		<td>Id Sewa</td>
		<td><input type="text" name="nik"/> </td>
	</tr>
	<tr>
		<td>No KTP</td>
		<td><input type="text" name="nik"/> </td>
	</tr>
	<tr>
		<td>No SIM</td>
		<td><input type="text" name="sim"/> </td>
	</tr>
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama"/> </td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><textarea cols="20" rows="3" name="alamat"></textarea> </td>
	</tr>
	<tr>
		<td>No Telepon</td>
		<td><input type="text" name="no"/> </td>
	</tr>
	<tr>
		<td>Tanggal Sewa</td>
		<td>Tanggal <select name="tgl">
						<?php
						  for ($i=1; $i<=31; $i++){
							  echo "<option value='$i'>$i </option>";
						  }
						?>
		</select>
		Bulan <select name="bulan">
						<?php
						  for ($b=1; $b<=12; $b++){
							  echo "<option value='$b'>$b </option>";
						  }
						?>
		</select>
		Tahun <select name="tahun">
			<?php
				for ($t=2017; $t<=2020; $t++){
					echo "<option value='$t'>$t </option>";
						 }
						?>
		</select></td>
	</tr>
	<tr>
		<td>Tanggal Kembali</td>
		<td>Tanggal <select name="tgl">
						<?php
						  for ($i=1; $i<=31; $i++){
							  echo "<option value='$i'>$i </option>";
						  }
						?>
		</select>
		Bulan <select name="bulan">
						<?php
						  for ($b=1; $b<=12; $b++){
							  echo "<option value='$b'>$b </option>";
						  }
						?>
		</select>
		Tahun <select name="tahun">
			<?php
				for ($t=2017; $t<=2020; $t++){
					echo "<option value='$t'>$t </option>";
						 }
						?>
		</select></td>
	</tr>
		<tr>
		<td>Jumlah Mobil yang disewa</td>
		<td><select name="tgl">
						<?php
						  for ($i=1; $i<=5; $i++){
							  echo "<option value='$i'>$i </option>";
						  }
						?>
		
		</select></td>
	</tr>
	<tr>
		<td>Nama Kendaraan</td>
		<td><select name="nama">
		<option value="pilih">Silahkan Pilih</option>
					<option value="misubishi">Mitsubishi</option>
					<option value="honda">Honda</option>
					<option value="toyota">Toyota</option>
		</select></td>
	</tr>
	<tr>
		<td>Jenis Kendaraan</td>
		<td>
			<select name="jenis">
		<option value="pilih">Silahkan Pilih</option>
					<option value="small">Small MPV</option>
					<option value="big">Big MPV</option>
					<option value="suv">Suv</option>
		</select>
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
		<td>Jumlah Bayar</td>
		<td>
			<input type="text" name="bayar" /> 
		</td>
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