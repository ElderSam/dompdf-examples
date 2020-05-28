<?php

use Dompdf\Dompdf; //biblioteca para gerar PDF

require __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/page.php"; //página HTML que será transformada em PDF
require_once __DIR__ . "/Mailer.php";

function sendMail($file_name)
{
	$toAdress = 'eldersamuel98@gmail.com';
	$toName = 'Elder Sam';
	$subject = 'TESTE envio de PDF por e-mail';
	$html = 'Olá, estou enviando um arquivo PDF (teste) gerado a partir da biblioteca MPDF';
	$mail = new Mailer($toAdress, $toName, $subject, $html, $file_name);

	if ($mail->send()) { //envia o email, e verifica se retornou sucesso

		$message = "<br>Email enviado com <strong style='color: green;'>sucesso ;)</strong>";
	} else {
		$error = $mail->getErrorInfo();
		$message = "<br>Ops, algo deu errado<br>
				<strong style='color: red;'> $error :(</strong>";
	}

	echo $message;
	echo "<br><a href='index.php'><- Voltar</a>";
}

if (isset($_POST["action"])) {

	//$file_name = md5(rand()) . '.pdf';
	$file_name = 'teste.pdf';
	$html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
	$html_code .= '<h1> TESTE envio de PDF por e-mail </h1>' . fetch_customer_data($connect);
	$dompdf = new Dompdf();
	//$dompdf = new Dompdf(["enable_remote" => true]);
	$dompdf->load_html($html_code);
	//$dompdf->setPaper("A4", "landscape");
	$dompdf->setPaper("A4");
	$dompdf->render();

	//echo "post: ". $_POST["action"];
	if ($_POST["action"] == 'send') {
		$file = $dompdf->output();
		file_put_contents($file_name, $file);
	} else {

		//$dompdf->stream("$file_name");
		$dompdf->stream("$file_name", ["Attachment" => false]);
	}


	sendMail($file_name); //envia o email

	unlink($file_name);
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Create Dynamic PDF Send As Attachment with Email in PHP</title>
	<script src="jquery.min.js"></script>
	<link rel="stylesheet" href="bootstrap.min.css" />
	<script src="bootstrap.min.js"></script>
</head>

<body>
	<br />
	<div class="container">
		<h3 align="center">Create Dynamic PDF Send As Attachment with Email in PHP</h3>
		<br />
		<form method="post">
			<input type="submit" name="action" class="btn btn-danger" value="send" />
			<input type="submit" name="action" class="btn btn-danger" value="displayPDF" />
		</form>
		<br />
		<?php
		echo '<h1> TESTE envio de PDF por e-mail </h1>'; /*fetch_customer_data($connect);*/
		?>
	</div>
	<br />
	<br />
</body>

</html>