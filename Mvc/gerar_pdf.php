<?php  
ob_start();
 
include('templates_pdf.php');

$conteudo = ob_get_contents();
ob_end_clean();
echo $conteudo;

/*
include('../vendor/autoload.php');

$mpdf = new mPDF(); 
$mpdf->WriteHTML($conteudo); 
$mpdf->Output(); 
*/
?>
