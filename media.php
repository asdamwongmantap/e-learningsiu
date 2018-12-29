<html>
<head>
<title>E-LEARNING</title>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'/>
<link href="css/bootstrap.css" rel="stylesheet"> 
<link href="css/stylemenulagi.css" rel="stylesheet">
<!--[if lt IE 9]>
 <script src=”https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js”></script>
   <script src=”https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js”></script>
<![endif]-->    
	
<link rel="icon" type="image/png" id="favicon"
          href="img/logosttikomiulagi.png"/>
		  
</head>
<body>
<div class="container">
<div class="navbar-search">
					<form name="formcari" method="POST" action="search.php"/>
					<input name="title" type="text" size="20"  placeholder="Pencarian"/>
					<input type="submit" name="input" value="Cari" class="btn btn-inverse" style="margin-bottom:5%;"/>
					</div>
<div class="nav-header">
<gambar>
</gambar>
</div>
<div class="navbar">                             
		<nav id='menu'>
<input type='checkbox'/>
<label>&#8801;<span>Menu</span></label>
<ul>
<li><a href='/' title="Home">Home</a></li>
<li><a href="?hal=profil" title="Profil">Profil</a></li>
<li><a href='' title="Drop Menu">Materi</a>
<ul class='menus'>
<li><a href='#' title="Drop Menu1">Drop Menu 1</a></li>
<li><a href='#' title="Drop Menu2">Drop Menu 2</a></li>
<li><a href='#' title="Drop Menu3">Drop Menu 3</a></li>
</ul>
</li>
<li><a href='#' title="Menu 1">Tugas</a></li>
<li><a href='#' title="Menu 2">Evaluasi</a></li>
</ul>
</nav>

</div>
  <?php
	   include "konten.php";
	  ?>


</div>	
<div class="modal-footer">
<small>&copy;&nbsp;<?php echo date('Y'); ?> - Wong Mantap</small>
</div>
</div>

</body>
</html>
