<?php

// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
// Reference the Options namespace 
use Dompdf\Options; 

require __DIR__ . "/../vendor/autoload.php";
 
// Set options to enable embedded PHP 
$options = new Options(); 
$options->set('isPhpEnabled', 'true'); 
 
// Instantiate dompdf class 
$dompdf = new Dompdf($options); 

ob_start();
require __DIR__ . "/../contents/waterMark.html";

// Load HTML content 
$dompdf->loadHtml('<h1>Welcome to CodexWorld.com</h1>' . ob_get_clean()); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', ''); 

// Render the HTML as PDF 
$dompdf->render(); 
 

// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream('document.pdf', array("Attachment" => 0));