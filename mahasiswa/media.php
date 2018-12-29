<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses halaman ini, Anda harus login Dahulu <br>";
  echo "<a href=../index.php><b>LOGIN</b></a></center>";
}
else{
	?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gte IE 9]>         <html class="no-js gte-ie9"> <![endif]-->
<!--[if gt IE 99]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  
      <title>E-LEARNING</title>
	  <link rel="icon" type="image/png" id="favicon"
          href="../img/logosttikomiulagi.png"/>
     
      

      <link rel="stylesheet" href="css/normalize.min.css">
      <link rel="stylesheet" href="css/main.css">		
     
	  <link rel="stylesheet" href="css/media-queries.css">		
		<link rel="stylesheet" href="css/bootstrap.css">
		
	  
		<link rel="stylesheet" href="css/navbar.css">
		<link rel="stylesheet" href="asset/css/bootstrap.css">	
		<link rel="stylesheet" href="asset/css/bootstrap-responsive.css">	
		 <!-- Le styles -->
        
	

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="asset/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  

      <script src="js/vendor/modernizr-2.6.1.min.js"></script>
      
    
    <link rel="stylesheet" href="css_ticker/style.css">  

    <script type="text/javascript" src="js_ticker/jquery.min.js"></script>
	<script type="text/javascript" src="js_ticker/jquery.totemticker.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#vertical-ticker').totemticker({
				row_height	:	'100px',
				next		:	'#ticker-next',
				previous	:	'#ticker-previous',
				stop		:	'#stop',
				start		:	'#start',
				mousestop	:	true,
			});
		});
	</script>


    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
		
		
 	 <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="#">APLIKASI E-LEARNING</a>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li class="active"><a href="?hal=home">Home</a></li>
                <li><a href="?hal=materi">Materi</a></li>
                <li><a href="?hal=tugas">Tugas</a></li>
				<li><a href="?hal=listujian">Ujian</a></li>
				
              </ul>
			 
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->
	      
		  
      <?php
	   include "konten.php";
	  ?>  
      <footer>
	 
		<div class="row">
		<div class="bottom">
          Copyright &copy;&nbsp;<?php echo date('Y'); ?> - Wong Mantap
        </div>
		</div>
		
      </footer>
      
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
		
		 <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    </body>
</html>
<?php
}
?>