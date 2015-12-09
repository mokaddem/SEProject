<?php
require_once('../../tcpdf/tcpdf.php');
require_once('../../tcpdf/config/tcpdf_config.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetTitle('Charles de Lorraine - Poule');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING);


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
//$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 11, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();



include_once('BDD.php');
$db = BDconnect();
$id = $_GET['id'];



$html = <<<EOD
<h3 align="center">Tournoi</h3>
<h1 align="center">Charles de Lorraine</h1>
<p></p>
<hr/>
<p></p>
<h2 align="center">Equipe $id</h2>
<hr/>
<p></p>
EOD;
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$reponse = $db->query('SELECT * FROM `Team` WHERE '.$id.' = ID');
foreach ($reponse as $donnees) {

  $t = $db->query('SELECT * FROM `Personne` WHERE '.$donnees['ID_Player1'].' = ID');
  $t1 = $t->fetch_array();

  $t1p = $db->query('SELECT * FROM `Personne` WHERE '.$donnees['ID_Player2'].' = ID');
  $t1p1 = $t1p->fetch_array();

  $t1p = $db->query('SELECT * FROM `Player` WHERE '.$t1['ID'].' = ID_Personne AND 1= IsLeader');
  $t1p2 = $t1p->fetch_array();
  if ($t1p2){
  	$leader = utf8_encode($t1['FirstName'])." ".utf8_encode($t1['LastName']);
  	 }
  	 else{
  	     $leader = utf8_encode($t1p1['FirstName'])." ".utf8_encode($t1p1['LastName']);
  	     }
  $a = utf8_encode($t1['FirstName'])." ".utf8_encode($t1['LastName']);
  $b = utf8_encode($t1p1['FirstName'])." ".utf8_encode($t1p1['LastName']);

  $c = utf8_encode($t1['PhoneNumber']);
  $d = utf8_encode($t1['Mail']);

  $e = utf8_encode($t1p1['PhoneNumber']);
  $f = utf8_encode($t1p1['Mail']);




// Set some content to print
$html = <<<EOD
<p><b>Le leader: $leader</b></p>
<p><b>Joueur 1:</b> $a</p>
<p><b>Numero de Telephone:</b> $c</p>
<p><b>Mail:</b> $d</p>
<hr/>
<p></p>
<p><b>Joueur 2:</b> $b</p>
<p><b>Numero de Telephone:</b> $e</p>
<p><b>Mail:</b> $f</p>
<hr/>
EOD;

  // Print text using writeHTMLCell()
  $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
}

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');
?>
