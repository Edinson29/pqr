<?php 

	require __DIR__.'/vendor/autoload.php';// Para el pdf
	use Spipu\Html2Pdf\Html2Pdf;

	ob_start();
	require('pdf_view.php');
	$html = ob_get_clean();
	$html2pdf = new Html2Pdf('es','true');
	$html2pdf->writeHTML($html);
	$html2pdf->output('pqr.pdf');
	header_remove($html);
?>