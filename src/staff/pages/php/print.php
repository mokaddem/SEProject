<?php
require_once('../../tcpdf/tcpdf.php');
require_once('../../tcpdf/config/tcpdf_config.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetTitle('Match');

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
$db = new BDD();
$id = $_GET['id'];
$reponse = $db->query('SELECT * FROM `Match` WHERE '.$id.' = ID');
$donnees = $reponse->fetch_array();

$t = $db->query('SELECT * FROM `Team` WHERE '.$donnees['ID_Equipe1'].' = ID');
$t1 = $t->fetch_array();

$t1p = $db->query('SELECT * FROM `Personne` WHERE '.$t1['ID_Player1'].' = ID');
$t1p1 = $t1p->fetch_array();

$t1p = $db->query('SELECT * FROM `Personne` WHERE '.$t1['ID_Player2'].' = ID');
$t1p2 = $t1p->fetch_array();

$t1final = $t1p1['FirstName']." ".$t1p1['LastName']." & ".$t1p2['FirstName']." ".$t1p2['LastName'];

$t = $db->query('SELECT * FROM `Team` WHERE '.$donnees['ID_Equipe2'].' = ID');
$t2 = $t->fetch_array();

$t2p = $db->query('SELECT * FROM `Personne` WHERE '.$t2['ID_Player1'].' = ID');
$t2p1 = $t2p->fetch_array();

$t2p = $db->query('SELECT * FROM `Personne` WHERE '.$t2['ID_Player2'].' = ID');
$t2p2 = $t2p->fetch_array();

$t2final = $t2p1['FirstName']." ".$t2p1['LastName']." & ".$t2p2['FirstName']." ".$t2p2['LastName'];

$t = $db->query('SELECT * FROM `Terrain` WHERE '.$donnees['ID_Terrain'].' = ID');
$ter = $t->fetch_array();

$terfinal = $ter['adresse'] . " - " . $ter['etat'];


$hour = $donnees['hour'];
$date = $donnees['date'];

$nom1 = $t1p1['LastName'];
$prenom1 = $t1p1['FirstName'];
$mail1 = $t1p1['Mail'];
$ville1 = $t1p1['Ville'];
$rue1 = $t1p1['Rue'];
$number1 = $t1p1['Number'];
$zipcode1 = $t1p1['ZIPCode'];
$num1 = $t1p1['PhoneNumber'];
$gsm1 = $t1p1['GSMNumber'];

$nom2 = $t1p2['LastName'];
$prenom2 = $t1p2['FirstName'];
$mail2 = $t1p2['Mail'];
$ville2 = $t1p2['Ville'];
$rue2 = $t1p2['Rue'];
$number2 = $t1p2['Number'];
$zipcode2 = $t1p2['ZIPCode'];
$num2 = $t1p2['PhoneNumber'];
$gsm2 = $t1p2['GSMNumber'];

$nom3 = $t2p1['LastName'];
$prenom3 = $t2p1['FirstName'];
$mail3 = $t2p1['Mail'];
$ville3 = $t2p1['Ville'];
$rue3 = $t2p1['Rue'];
$number3 = $t2p1['Number'];
$zipcode3 = $t2p1['ZIPCode'];
$num3 = $t2p1['PhoneNumber'];
$gsm3 = $t2p1['GSMNumber'];

$nom4 = $t2p2['LastName'];
$prenom4 = $t2p2['FirstName'];
$mail4 = $t2p2['Mail'];
$ville4 = $t2p2['Ville'];
$rue4 = $t2p2['Rue'];
$number4 = $t2p2['Number'];
$zipcode4 = $t2p2['ZIPCode'];
$num4 = $t2p2['PhoneNumber'];
$gsm4 = $t2p2['GSMNumber'];

// Set some content to print
$html = <<<EOD
<h1>Match $id</h1>
<p><b>Equipe 1</b> : $t1final
<b>Equipe 2</b> : $t2final</p>
<p><b>Terrain</b> : $terfinal</p>
<p><b>Date du match</b> : $hour</p>
<p><b>Heure du match</b> : $date</p>
<hr/>
<p></p>
<hr/>
<p></p>
<p><b>Nom: </b>$nom1</p>
<p><b>Prénom: </b>$prenom1</p>
<p><b>E-mail: </b>$mail1</p>
<p><b>Adresse: </b>$number1 $rue1, $zipcode1 $ville1</p>
<p><b>PhoneNumber: </b>$num1</p>
<p><b>GSMNumber: </b>$gsm1</p>
<p></p>
<p><b>Nom: </b>$nom2</p>
<p><b>Prénom: </b>$prenom2</p>
<p><b>E-mail: </b>$mail2</p>
<p><b>Adresse: </b>$number2 $rue2, $zipcode2 $ville2</p>
<p><b>PhoneNumber: </b>$num2</p>
<p><b>GSMNumber: </b>$gsm2</p>

<hr/>
<p></p>
<p><b>Nom: </b>$nom3</p>
<p><b>Prénom: </b>$prenom3</p>
<p><b>E-mail: </b>$mail3</p>
<p><b>Adresse: </b>$number3 $rue3, $zipcode3 $ville3</p>
<p><b>PhoneNumber: </b>$num3</p>
<p><b>GSMNumber: </b>$gsm3</p>

<p></p>
<p><b>Nom: </b>$nom4</p>
<p><b>Prénom: </b>$prenom4</p>
<p><b>E-mail: </b>$mail4</p>
<p><b>Adresse: </b>$number4 $rue4, $zipcode4 $ville4</p>
<p><b>PhoneNumber: </b>$num4</p>
<p><b>GSMNumber: </b>$gsm4</p>

EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');
?>