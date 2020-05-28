<?php

// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
// Reference the Options namespace 
use Dompdf\Options; 
// Reference the Font Metrics namespace 
use Dompdf\FontMetrics; 

require __DIR__ . "/../vendor/autoload.php";
 
// Set options to enable embedded PHP 
$options = new Options(); 
$options->set('isPhpEnabled', 'true'); 
 
// Instantiate dompdf class 
$dompdf = new Dompdf($options); 

ob_start();
require __DIR__ . "/../contents/pageX.html";

// Load HTML content 
$dompdf->loadHtml('<h1>Welcome to CodexWorld.com</h1>' . ob_get_clean()); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', ''); 

// Render the HTML as PDF 
$dompdf->render(); 
 
// Instantiate canvas instance 
$canvas = $dompdf->getCanvas(); 
 
// Instantiate font metrics class 
$fontMetrics = new FontMetrics($canvas, $options); 
 
// Get height and width of page 
$w = $canvas->get_width(); 
$h = $canvas->get_height(); 
 
// Get font family file 
$font = $fontMetrics->getFont('times'); 
 
// Specify watermark text 
$text = "WATER MARK<img href='./contents/logo-php.jpg'</a>"; 
 
// Get height and width of text 
$txtHeight = $fontMetrics->getFontHeight($font, 75); 
$textWidth = $fontMetrics->getTextWidth($text, $font, 75); 
 
// Set text opacity 
$canvas->set_opacity(.2); 
 
// Specify horizontal and vertical position 
$x = (($w-$textWidth)/2); 
$y = (($h-$txtHeight)/2); 
 
// Writes text at the specified x and y coordinates 
$canvas->text($x, $y, $text, $font, 75); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream('document.pdf', array("Attachment" => 0));