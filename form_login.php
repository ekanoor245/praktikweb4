<?php include_once ('template_atas.php') ; ?>
<form method="post" action="home.php">

  <table border="1" cellpadding="5" cellspacing="0">
    <tr>
		<td>USER</td>
		<td><input type="text" name="pengguna" /></td>
	</tr>
	<tr>
		<td>PASSWORD</td>
		<td><input type="password" name="kata_kunci" /></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" value="LOGIN" /></td>
	</tr>
  </table>
 </form>
 <?php include_once ('template_bawah.php') ; ?>