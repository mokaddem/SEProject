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
$terrain = $db->query('SELECT * FROM Terrain WHERE '.$id.' = ID');
$terrain = $terrain->fetch_array();

$html = <<<EOD
<h3 align="center">Tournoi</h3>
<h1 align="center">Charles de Lorraine</h1>
<p></p>
<hr/>
<p></p>
<hr/>
EOD;
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

// Set some content to print

$adresse = $terrain["adresse"];
$dispoFrom = $terrain["disponibiliteFrom"];
$dispoTo = $terrain["disponibiliteTo"];
$type = utf8_encode($terrain["Type"]);

$html = <<<EOD
<h2 align="center">Terrain $id</h2>
<p><b>Adresse :</b> $adresse</p>
<p><b>Disponibilité:</b> Du $dispoFrom au $dispoTo</p>
<p><b>Type:</b> $type</p>
EOD;

$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$owner = $db->query('SELECT * FROM Owner WHERE '.$terrain["ID_Owner"].' = ID');
$owner = $owner->fetch_array();
$personne = $db->query('SELECT * FROM Personne WHERE '.$owner['ID_Personne'].' = ID');
$personne = $personne->fetch_array();

$nom = $personne["LastName"];
$prenom = $personne["FirstName"];
$mail = $personne["Mail"];
$phone = $personne["GSMNumber"];

$html = <<<EOD
<h2 align="center">Propriétaire</h2>
<p><b>Nom, Prénom :</b> $nom, $prenom</p>
<p><b>E-mail:</b> $mail</p>
<p><b>Téléphone:</b> $phone</p>
<hr/>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Terrain '.$id.'.pdf', 'I');
?>
