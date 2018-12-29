<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
 <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
                <?php echo "Hallo,$_SESSION[username]"; ?>
            </div>
        </div>
        
        <div class="admin">
            <div class="image">
                <img src="img/users/iu.png" class="img-polaroid"/>                
            </div>
            <ul class="control"> 
                <li><span class="icon-user"></span> <?php echo "Hallo, $_SESSION[username]"; ?></li>               
                <li><span class="icon-share-alt"></span> <a href="logout.php">Logout</a></li>

            </ul>
        </div>
        
        <ul class="navigation">            
            <li class="active">
                <a href="?p=home">
                    <span class="isw-grid"></span><span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="?p=caraujian">
                    <span class="isw-list"></span><span class="text">Cara Ujian Online</span>
                </a>
            </li> 
            <li>
                <a href="?p=gantipassword">
                    <span class="isw-list"></span><span class="text">Ganti Password</span>
                </a>
            </li>
            <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Manajemen Data</span>
                </a>
                <ul>
					<li>
                        <a href="?p=datapengguna">
                            <span class="icon-check"></span><span class="text">Pengguna</span>
                        </a>                  
                    </li>   
                    <li>
                        <a href="?p=datamahasiswa">
                            <span class="icon-check"></span><span class="text">Mahasiswa</span>
                        </a>                  
                    </li>   
                    <li>
                        <a href="?p=datamatakuliah">
                            <span class="icon-check"></span><span class="text">Mata Kuliah</span>
                        </a>                  
                    </li>                     
                    <li>
                        <a href="?p=datadosen">
                            <span class="icon-check"></span><span class="text">Dosen</span>
                        </a>                  
                    </li> 
                    <li>
                        <a href="?p=datakelas">
                            <span class="icon-check"></span><span class="text">Kelas</span>
                        </a>                  
                    </li>                    
					<li>
                        <a href="?p=listmateri">
                            <span class="icon-check"></span><span class="text">Materi</span>
                        </a>                  
                    </li>  
					<li>
                        <a href="?p=databanksoal">
                            <span class="icon-check"></span><span class="text">Bank Soal</span>
                        </a>                  
                    </li>  
					<li>
                        <a href="?p=listtugas">
                            <span class="icon-check"></span><span class="text">Tugas</span>
                        </a>                  
                    </li>  
                </ul>                
            </li> 
			
			
			 <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Laporan</span>
                </a>
                <ul>
					<li>
                        <a href="?p=laporandsn">
                            <span class="icon-check"></span><span class="text">Data Dosen</span>
                        </a>                  
                    </li>   
                    <li>
                        <a href="?p=laporanmahasiswa">
                            <span class="icon-check"></span><span class="text">Data Mahasiswa</span>
                        </a>                  
                    </li>   
                    <li>
                        <a href="?p=laporannilai">
                            <span class="icon-check"></span><span class="text">Data Nilai</span>
                        </a>                  
                    </li>                     
                    
                      
                </ul>                
            </li> 
            
                                           
        </ul>
</body>
</html>