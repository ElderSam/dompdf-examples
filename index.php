<?php

use Dompdf\Dompdf;

require __DIR__ . "/vendor/autoload.php";

$dompdf = new Dompdf(["enable_remote" => true]);
$dompdf->loadHtml("<h1> Primeiro PDF</h1>");

ob_start();
require __DIR__ . "/contents/exemplo.html";
//echo "<h1>Olá mundo!</h1><p>Este é um exemplo de geração de PDF com a biblioteca DOMPDF</p>";
$dompdf->loadHtml(ob_get_clean());

//$dompdf->setPaper("A4", "landscape");
$dompdf->setPaper("A4");

$dompdf->render();

//$dompdf->stream("file.pdf");
$dompdf->stream("file.pdf", ["Attachment" => false]);