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

// Recupération des respos
// ID Cat Poule = ID Cat staff
if (!array_key_exists("jour", $_GET)) {
  echo "Mauvais lien !";
  return;
}
if ($_GET["jour"] = "sam") {
  $poule = $db->query('SELECT * FROM GroupSaturday WHERE '.$id.' = ID');
} elseif ($_GET["jour"] = "dim") {
  $poule = $db->query('SELECT * FROM GroupSunday WHERE '.$id.' = ID');
}

$poule = $poule->fetch_array();

$staffeurs = $db->query('SELECT ID_Personne FROM Staff WHERE '.$poule['ID_Cat'].' = ID_Cat');
$respoPrint= "";

foreach ($staffeurs as $staffeur) {
  $respos = $db->query('SELECT * FROM Personne WHERE '.$staffeur['ID_Personne'].' = ID');
  foreach ($respos as $respo) {
    $respoPrint.=", ";
    $respoPrint.=$respo["FirstName"]." ".$respo["LastName"];
  }
}
  $respoPrint = substr($respoPrint, 2, strlen($respoPrint));


$html = <<<EOD
<h3 align="center">Tournoi</h3>
<h1 align="center">Charles de Lorraine</h1>
<p></p>
<hr/>
<p></p>
<h2 align="center">Poule $id - $respoPrint</h2>
<hr/>
<p></p>
EOD;
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$reponse = $db->query('SELECT * FROM `Match` WHERE '.$id.' = Poule_ID');

$numMatch = 1;
foreach ($reponse as $donnees) {

  $t = $db->query('SELECT * FROM `Team` WHERE '.$donnees['ID_Equipe1'].' = ID');
  $t1 = $t->fetch_array();

  $t1p = $db->query('SELECT * FROM `Personne` WHERE '.$t1['ID_Player1'].' = ID');
  $t1p1 = $t1p->fetch_array();

  $t1p = $db->query('SELECT * FROM `Personne` WHERE '.$t1['ID_Player2'].' = ID');
  $t1p2 = $t1p->fetch_array();

  $t1final = utf8_encode($t1p1['FirstName'])." ".utf8_encode($t1p1['LastName'])." & ".utf8_encode($t1p2['FirstName'])." ".utf8_encode($t1p2['LastName']);
  $t = $db->query('SELECT * FROM `Team` WHERE '.$donnees['ID_Equipe2'].' = ID');
  $t2 = $t->fetch_array();

  $t2p = $db->query('SELECT * FROM `Personne` WHERE '.$t2['ID_Player1'].' = ID');
  $t2p1 = $t2p->fetch_array();

  $t2p = $db->query('SELECT * FROM `Personne` WHERE '.$t2['ID_Player2'].' = ID');
  $t2p2 = $t2p->fetch_array();

  $t2final = utf8_encode($t2p1['FirstName'])." ".utf8_encode($t2p1['LastName'])." & ".utf8_encode($t2p2['FirstName'])." ".utf8_encode($t2p2['LastName']);

  $t = $db->query('SELECT * FROM `Terrain` WHERE '.$donnees['ID_Terrain'].' = ID');
  $ter = $t->fetch_array();

  $terfinal = utf8_encode($ter['adresse']) . " - " . utf8_encode($ter['etat']);

  $hour = $donnees['hour'];
  $date = $donnees['date'];



// Set some content to print
$html = <<<EOD
<h2 align="center">Match $numMatch</h2>
<p><b>Equipe 1:</b> $t1final</p>
<p><b>Equipe 2:</b> $t2final</p>
<p><b>Terrain:</b> $terfinal</p>
<p><b>Date du match:</b> $date</p>
<p><b>Heure du match:</b> $hour</p>
<hr/>
EOD;

  // Print text using writeHTMLCell()
  $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
  $numMatch++;
}

// Set some content to print
$html = <<<EOD
<table border="1px">
EOD;

for ($ii = 0; $ii <= 8; $ii+=1) {
$html .= <<<EOD
<tr>
EOD;

  for ($jj = 0; $jj <= 8; $jj+=1) {
    if ($ii == $jj && $ii != 0) {
$hh =<<<EOD
<td bgcolor="#000000"></td>
EOD;
    }elseif ($ii == $jj && $ii== 0) {
$hh =<<<EOD
<td></td>
EOD;

    } elseif ($ii==0) {
$hh =<<<EOD
<td> Equipe $jj<br/></td>
EOD;
    } elseif ($jj==0) {
$hh =<<<EOD
<td> Equipe $ii<br/></td>
EOD;

    } else {
$hh =<<<EOD
<td></td>
EOD;
    }
    $html.=$hh;
  }
$html .= <<<EOD
</tr>
EOD;
}
$html .= <<<EOD
</table>
EOD;

  $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


$reponse->free(); $t->free(); $t1p->free(); $t2p->free();

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');
?>
