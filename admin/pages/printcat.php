<?php
require './lib/php/fpdf/fpdf.php';
echo 'JE SUIS LA';


$mg = new catManager($db);
$data = $mg->getCat();

$pdf=new FPDF('P','cm','A4');
$pdf->SetFont('Arial','B',14);


$pdf->output();
?>