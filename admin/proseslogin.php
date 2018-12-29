<html>
<head>
<title>E-LEARNING</title>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'/>
<link href="css/login.css" rel="stylesheet"> 
<link href="css/stylemenulagi.css" rel="stylesheet">
<!--[if lt IE 9]>
 <script src=”https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js”></script>
   <script src=”https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js”></script>
<![endif]-->    
	
<link rel="icon" type="image/png" id="favicon"
          href="img/logosttikomiulagi.png"/>
</head>
<body>
<div class="span6" style="margin-left:450px;margin-top:150px;">		
<div class="navbar-form">	

			<?php
	 session_start();
	  require_once("koneksi.php");  
	function antiinjection($data){
	$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter_sql;
	}
	  $username = antiinjection($_POST['username']);
	  $password = antiinjection(md5($_POST['password']));
	  $level = antiinjection($_POST['level']);
	  $cekuser = mysql_query("SELECT * FROM tbl_pengguna WHERE username = '$username'");
	  $jumlah = mysql_num_rows($cekuser);
	  $hasil = mysql_fetch_array($cekuser); 
	  if($jumlah==0) {
	  echo "<table><tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr></table>
		<center><h3>FORM LOGIN</h3></center>
		<form action='proseslogin.php' method=post><table>
				<tr><td width='50px'></td><td>Username: </td><td><input type='text' name='username' size=20 placeholder='Username Belum Terdaftar' required autofocus></td></tr>
				<tr><td></td><td>Password: </td><td><input type='password' name='password' size=20></td></tr>
				<tr><td></td><td>Level: </td><td><select name='level'>
				<option>Mahasiswa</option>
				<option>Dosen</option>
				<option>Administrator</option>
				</tr>
			<tr><td></td><td></td><td><input type=submit value='Log In' class='btn btn-inverse'></td></tr>
			<tr><td></td><td></td></tr>
			<tr><td></td><td></td><td><a href=register.php>Daftar</td></tr>
			</form>";
	 } else {
	  if($password <> $hasil['password']) {
	   echo "<table><tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr></table>
		<center><h3>FORM LOGIN</h3></center>
		<form action='proseslogin.php' method=post><table>
				<tr><td width='50px'></td><td>Username: </td><td><input type='text' name='username' size=20></td></tr>
				<tr><td></td><td>Password: </td><td><input type='password' name='password' size=20 placeholder='Password Salah' required autofocus></td></tr>
				<tr><td></td><td>Level: </td><td><select name='level'>
				<option>Mahasiswa</option>
				<option>Dosen</option>
				<option>Administrator</option>
				</tr>
			<tr><td></td><td></td><td><input type=submit value='Log In' class='btn btn-inverse'></td></tr>
			<tr><td></td><td></td></tr>
			<tr><td></td><td></td><td><a href=register.php>Daftar</td></tr>
			</form>";
	  } else 
	    {
		if($level <> $hasil['level']) {
	   echo "<table><tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr></table>
		<center><h3>FORM LOGIN</h3></center>
		<form action='proseslogin.php' method=post><table>
				<tr><td width='50px'></td><td>Username: </td><td><input type='text' name='username' size=20></td></tr>
				<tr><td></td><td>Password: </td><td><input type='password' name='password' size=20></td></tr>
				<tr><td></td><td>Level: </td><td><select name='level' required autofocus>
				<option>Mahasiswa</option>
				<option>Dosen</option>
				<option>Administrator</option>
				</tr>
			<tr><td></td><td></td><td><input type=submit value='Log In' class='btn btn-inverse'></td></tr>
			<tr><td></td><td></td></tr>
			<tr><td></td><td></td><td><a href=register.php>Daftar</td></tr>
			</form>";
	   }
	   else
	   {
	   if ($level=='Administrator'){
	   $_SESSION['username'] = "$username";
	   header('location:admin/media.php?p=home');
	  }
	  elseif ($level=='Mahasiswa')
	  {
	  $_SESSION['username'] = "$username";
	   header('location:mahasiswa/media.php?hal=home');
	  }
	  else
	  {
	  $_SESSION['username'] = "$username";
	   header('location:dosen/media.php?hal=home');
	  }
	  }
	 }
	 }
	?>

</div>		
</div>
</body>
</html>
