<?php
    session_start();
    include "../../../koneksi.php";
    require('laporan/fpdf.php');
	
    $query ="select dmk.nid, d.namadsn, d.alamat, d.email, mk.nma_mk, k.kd_kelas, dmk.thn_ajaran from tbl_dosenmk dmk, tbl_kelas k,tbl_dosen d, tbl_matakuliah mk where dmk.nid=d.nid AND dmk.kd_mk=mk.kd_mk AND dmk.kd_kelas=k.kd_kelas ORDER BY dmk.nid ASC";
    $db_query = mysql_query($query) or die("Query gagal");
    //Variabel untuk iterasi
    $i = 0;
    //Mengambil nilai dari query database
    while($data=mysql_fetch_row($db_query))
    {
        $cell[$i][0] = $data[0];
        $cell[$i][1] = $data[1];
        $cell[$i][2] = $data[2];
        
		$cell[$i][3] = $data[3];
       $cell[$i][4] = $data[4];
	   $cell[$i][5] = $data[5];
       $cell[$i][6] = $data[6];
        $i++;
    }
    //memulai pengaturan output PDF
    class PDF extends FPDF
    {
        //untuk pengaturan header halaman
        function Header()
        {
			$this->image('laporan/logosttikomiulagijpgaja.jpg');
			
            $this->SetFont('helvetica','B',23); //jenis font : Times New Romans, Bold, ukuran 13
            //untuk warna background Header
            $this->SetFillColor(255,255,255);
            //untuk warna text
            $this->SetTextColor(0,0,0);
            //Menampilkan tulisan di halaman
			
            $this->Cell(34,1,'LAPORAN DATA DOSEN MATA KULIAH',"",1,'C',1); //TBLR (untuk garis)=> B = Bottom,
            // L = Left, R = Right
            //untuk garis, C = center
        }
		function Footer()
		{
			// Go to 1.5 cm from bottom
			$this->SetY(-07);
			// Select Arial italic 8
			$this->SetFont('Arial',"",8);
			// Print current and total page numbers
			$this->Cell(0,10,'Halaman ke '.$this->PageNo()."",0,0,'C');
		}
    }
    //pengaturan ukuran kertas P = Portrait, L=Landscape
	$pdf = new PDF('L','cm','legal');
    $pdf->Open();
    $pdf->AddPage();
    //Ln() = untuk pindah baris
    $pdf->Ln();
    $pdf->SetFont('arial','B',10);
	// arti formatnya $pdf->Cell('Lebarnya','Tingginya','Header Text','LRTB',0,'C') 
   // $pdf->Cell(1,1,'NO','LRTB',0,'C');
	$pdf->Cell(2,1,'NID','LRTB',0,'C');
    $pdf->Cell(6,1,'Nama Dosen','LRTB',0,'C');
    $pdf->Cell(7,1,'Alamat','LRTB',0,'C');
    
	$pdf->Cell(6,1,'Email','LRTB',0,'C');
	$pdf->Cell(6,1,'Mata Kuliah','LRTB',0,'C');
	$pdf->Cell(2,1,'Kelas','LRTB',0,'C');
	$pdf->Cell(4,1,'Tahun Ajaran','LRTB',0,'C');
	
    $pdf->Ln();
    $pdf->SetFont('arial',"",10);
    for($j=0;$j<$i;$j++)
    {
        //menampilkan data dari hasil query database
       // $pdf->Cell(1,1,$j+1,'LBTR',0,'C');
		$pdf->Cell(2,1,$cell[$j][0],'LBTR',0,'C');
        $pdf->Cell(6,1,$cell[$j][1],'LBTR',0,'C');
        $pdf->Cell(7,1,$cell[$j][2],'LBTR',0,'C');
        
		$pdf->Cell(6,1,$cell[$j][3],'LBTR',0,'C');
		$pdf->Cell(6,1,$cell[$j][4],'LBTR',0,'C');
       $pdf->Cell(2,1,$cell[$j][5],'LBTR',0,'C');
		$pdf->Cell(4,1,$cell[$j][6],'LBTR',0,'C');
	   
        $pdf->Ln();
    }
    //menampilkan output berupa halaman PDF
    $pdf->Output();
?>

