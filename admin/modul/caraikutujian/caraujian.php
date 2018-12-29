<div class="content">
  <div class="workplace">
    <div class="dr"><span></span></div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-favorite"></div>
                        <h1>Cara Ujian</h1>
                    </div>
                    <?php
					echo "<form method='post' action='modul/carabeli/aksicarabeli.php'>";
					 $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='45'");
    				 $r    = mysql_fetch_array($sql);
				  echo "<input type=hidden name=id value=$r[id_modul]>";
                    
                  echo"<div class='block-fluid' id='wysiwyg_container'>
                        <textarea id='wysiwyg' name='isi' style='height: 500px;'>$r[static_content]</textarea>
                     </div>";
				  echo "";
					?>
                </div>
            </div>
      <div class="dr"><span></span></div>
       <div class="span9">
         <p>
             <input class="btn" type="submit" value="  Update  ">
         </p>
       </div>
      </form>
    </div>
</div>   
    