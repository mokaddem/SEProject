<?php
require_once('../../tcpdf/tcpdf.php');
require_once('../../tcpdf/config/tcpdf_config.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetTitle('Charles de Lorraine - Match');

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

if ($_GET["jour"] == "sam") {
  $knock = $db->query('SELECT * FROM KnockoffSaturday');
} elseif ($_GET["jour"] == "dim") {
  $knock = $db->query('SELECT * FROM KnockoffSunday');
}

$html = <<<EOD
<h3 align="center">Tournoi</h3>
<h1 align="center">Charles de Lorraine</h1>
<p></p>
<hr/>
<p></p>
EOD;
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

foreach ($knock as $k) {
$id = $k['ID_Match'];
$reponse = $db->query('SELECT * FROM `Match` WHERE '.$id.' = ID');
$donnees = $reponse->fetch_array();

if ($donnees['ID_Equipe1'] > 0 && $donnees['ID_Equipe2'] > 0) {

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

$nom1 = utf8_encode($t1p1['LastName']);
$prenom1 = utf8_encode($t1p1['FirstName']);
$mail1 = utf8_encode($t1p1['Mail']);
$ville1 = utf8_encode($t1p1['Ville']);
$rue1 = utf8_encode($t1p1['Rue']);
$number1 = utf8_encode($t1p1['Number']);
$zipcode1 = utf8_encode($t1p1['ZIPCode']);
$num1 = utf8_encode($t1p1['PhoneNumber']);
$gsm1 = utf8_encode($t1p1['GSMNumber']);

$nom2 = utf8_encode($t1p2['LastName']);
$prenom2 = utf8_encode($t1p2['FirstName']);
$mail2 = utf8_encode($t1p2['Mail']);
$ville2 = utf8_encode($t1p2['Ville']);
$rue2 = utf8_encode($t1p2['Rue']);
$number2 = utf8_encode($t1p2['Number']);
$zipcode2 = utf8_encode($t1p2['ZIPCode']);
$num2 = utf8_encode($t1p2['PhoneNumber']);
$gsm2 = utf8_encode($t1p2['GSMNumber']);

$nom3 = utf8_encode($t2p1['LastName']);
$prenom3 = utf8_encode($t2p1['FirstName']);
$mail3 = utf8_encode($t2p1['Mail']);
$ville3 = utf8_encode($t2p1['Ville']);
$rue3 = utf8_encode($t2p1['Rue']);
$number3 = utf8_encode($t2p1['Number']);
$zipcode3 = utf8_encode($t2p1['ZIPCode']);
$num3 = utf8_encode($t2p1['PhoneNumber']);
$gsm3 = utf8_encode($t2p1['GSMNumber']);

$nom4 = utf8_encode($t2p2['LastName']);
$prenom4 = utf8_encode($t2p2['FirstName']);
$mail4 = utf8_encode($t2p2['Mail']);
$ville4 = utf8_encode($t2p2['Ville']);
$rue4 = utf8_encode($t2p2['Rue']);
$number4 = utf8_encode($t2p2['Number']);
$zipcode4 = utf8_encode($t2p2['ZIPCode']);
$num4 = utf8_encode($t2p2['PhoneNumber']);
$gsm4 = utf8_encode($t2p2['GSMNumber']);


// Set some content to print
$html = <<<EOD
<h2 align="center">Knock-off Match $id</h2>
<hr/>
<p></p>
<p><b>Equipe 1:</b> $t1final</p>
<p><b>Equipe 2:</b> $t2final</p>
<p><b>Terrain:</b> $terfinal</p>
<p><b>Date du match:</b> $date</p>
<p><b>Heure du match:</b> $hour</p>
<hr/>
<p></p>
<hr/>
<p></p>
<p><b>Nom: </b>$nom1</p>
<p><b>Prénom: </b>$prenom1</p>
<p><b>E-mail: </b>$mail1</p>
<p><b>Adresse: </b>$number1 $rue1 - $zipcode1 $ville1</p>
<p><b>PhoneNumber: </b>$num1</p>
<p><b>GSMNumber: </b>$gsm1</p>
<p></p>
<p><b>Nom: </b>$nom2</p>
<p><b>Prénom: </b>$prenom2</p>
<p><b>E-mail: </b>$mail2</p>
<p><b>Adresse: </b>$number2 $rue2 - $zipcode2 $ville2</p>
<p><b>PhoneNumber: </b>$num2</p>
<p><b>GSMNumber: </b>$gsm2</p>

<hr/>
<p></p><p></p><p></p><p></p><p></p>

<p><b>Nom: </b>$nom3</p>
<p><b>Prénom: </b>$prenom3</p>
<p><b>E-mail: </b>$mail3</p>
<p><b>Adresse: </b>$number3 $rue3 - $zipcode3 $ville3</p>
<p><b>PhoneNumber: </b>$num3</p>
<p><b>GSMNumber: </b>$gsm3</p>

<p></p>
<p><b>Nom: </b>$nom4</p>
<p><b>Prénom: </b>$prenom4</p>
<p><b>E-mail: </b>$mail4</p>
<p><b>Adresse: </b>$number4 $rue4 - $zipcode4 $ville4</p>
<p><b>PhoneNumber: </b>$num4</p>
<p><b>GSMNumber: </b>$gsm4</p>
<hr/>
<p></p>
<br pagebreak="true"/>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
}
}

$reponse->free(); $t->free(); $t1p->free(); $t2p->free();
// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('knock-off '.$id.'.pdf', 'I');
?>
