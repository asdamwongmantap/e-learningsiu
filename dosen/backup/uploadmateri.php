    			<div class="span9">
				<div class="isi">
				
			<div class="title">Silahkan Upload Materi Anda</div>
<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                       
                        <h1>Input Materi</h1>
                    </div>    
                      <div class='row-form clearfix'>
							<div class='span3'>Kode Materi</div>
                            <div class='span9'><input type='text' name='kd_materi'/></div>
                        </div>
						
					<div class='row-form clearfix'>
                            <div class='span3'>Mata Kuliah</div>
                            <div class='span9'>
							<select name='kdmk' id='s2_1' style='width: 100%;'>
								  <option value=0 selected>- Pilih Mata Kuliah -</option>";
										$tampil=mysql_query("SELECT * FROM tbl_matakuliah ORDER BY kd_mk");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[kd_mk]>$r[nma_mk]</option>";
										}                               
                       echo"</select>
							</div>
                        </div>
						
					<div class='row-form clearfix'>
                            <div class='span3'>Kelas</div>
                            <div class='span9'>
							<select name='kdkelas' id='s2_1' style='width: 100%;'>
								  <option value=0 selected>- Pilih Kelas -</option>";
										$tampil=mysql_query("SELECT * FROM tbl_kelas ORDER BY nma_kelas");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[kd_kelas]>$r[kd_kelas]</option>";
										}                               
                       echo"</select>
							</div>
                        </div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Materi Tentang</div>
                            <div class='span9'><textarea name='nm_materi'></textarea></div>
                        </div>
						
					
					 <div class='row-form clearfix'>
                           <div class='span3'>Judul Materi</div>
                            <div class='span9'><textarea name='judul_materi'></textarea></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Deskripsi</div>
                            <div class='span9'><textarea name='deskripsi'></textarea></div>
                    </div>
							
					 <div class='row-form clearfix'>
                            <div class='span3'>File</div>
                            <div class='span9'> <input type='file' name='berkas'>
							<br>
							* Apabila File tidak diubah, dikosongkan saja.</br>
							
							</div>
                    </div>
					
					
					
					
					
							
                    </div>
                </div>
            </div>
			<input type='submit' class='btn' value='Simpan'>
</div>
			</div>	
<div class="span4" style="float:right;">

  <div class="col-md-8"></div>
  <div class="col-md-4">
  	<ul class="nav nav nav-pills nav-stacked">
	<li class="active">Materi Per-Mata Kuliah</li>
 <li>
	<a href="">MENU A</a>
  </li>
  <li>
	<a href="">MENU B</a>
  </li>
  
	</ul>
  </div>
</div>	