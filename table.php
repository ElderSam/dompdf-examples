<?php
/* Exemplo cabeçalho e tabela */
use Dompdf\Dompdf;

require __DIR__ . "/vendor/autoload.php";

//gerando o pdf
$dompdf = new DOMPDF();

ob_start();
require __DIR__ . "/contents/cabecalho.php";

$dompdf->load_html(ob_get_clean());
$dompdf->render();

//$dompdf->stream("file.pdf");
$dompdf->stream("file.pdf", ["Attachment" => false]);
