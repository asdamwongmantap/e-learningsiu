<?php
  error_reporting(0);
  session_start();
  
  if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){

?>
   <hr/>
   <?php
		$nid=$_SESSION['username'];
		$hasil=mysql_query("select p.username, d.nid,d.namadsn 
from tbl_pengguna p, tbl_dosen d where p.username=d.nid AND p.username='$nid'");

		$row =mysql_fetch_array($hasil);
		
			$nid=$row["nid"];
			$nama =$row["namadsn"];
			
		?>
      <div role="main" class="container checkout">
        <div class="row">
          <div class="span9 checkout-list">
            <ol class="rr">
              <li class="current">
                <h6>Login Atau Daftar</h6>
                <div class="row">
                  <div class="span9 content-wrapper clearfix">
                    <div class="left-col">
                  
                      <h6>Belum menjadi member?<br>
                       Silahkan Daftar</h6>
                      <p>
                        Jadilah Member untuk mendapatkan berbagai fasilitas menarik
                      </p>
                        <a href="?hal=daftar" class="btn secondary">
                          Daftar
                        </a>
                    </div>
                    <div class="right-col">
                    
                      <h6>Login</h6>
                      <p>
                        Already registered
                      </p>
                      
                      <form action="cek_login.php" method="post" id="form-2">
                        <ul class="rr">
                          <li>
                            <label>
                              <input type="text" name="email" placeholder="Masukkan e-mail anda..." size="30" require autofocus/>
                            </label>
                          </li>
                          <li>
                            <label>
                              <input type="password" name="password" placeholder="Masukkan Password..." size="30"/>
                            </label>
                          </li>
                        </ul>
                                                
                          <span class="gradient"><input type="submit" class="btn secondary" value="Login"></span>
                        </a>
                      </form>
					   <a href="?hal=lupapassword" class="forgot">Lupa password?</a>
                    
                    </div>  
                  </div>                      
                </div>
              </li>
            </ol>
          </div>
        
        </div>
      </div>    
      
 <?php
  }
  else
  {
   echo "<script>window.alert('anda sudah melakukan login')</script>";
   echo "<meta http-equiv='refresh' content='0; url=index.php?hal=home'>";

  }
 ?>     