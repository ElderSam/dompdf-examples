<?php

$message = '';

$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

function fetch_customer_data($connect)
{
    $query = "SELECT * FROM tbl_customer";
    $statement = $connect->prepare($query);
    $statement->execute();
	$result = $statement->fetchAll();
	
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');
	$dataTipo1 = utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today')));

	$hoje = date('d/m/Y');

	$output = "<p style='color: green;'> $hoje <br></p>
		<p style='color: red;'>$dataTipo1 <br></p>";

    $output .= '
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<tr style="background-color: lightgrey;">
				<th>#</th>
				<th>Nome</th>
				<th>Endereço</th>
				<th>Cidade</th>
				<th>Código Postal</th>
				<th>Cidade</th>
			</tr>
	';

    $indice = 1;

    foreach ($result as $row) {
        $output .= '
			<tr>
				<td>' . $indice . '</td>
				<td>' . $row["CustomerName"] . '</td>
				<td>' . $row["Address"] . '</td>
				<td>' . $row["City"] . '</td>
				<td>' . $row["PostalCode"] . '</td>
				<td>' . $row["Country"] . '</td>
			</tr>
		';

        $indice++;
    }
    $output .= '
		</table>
	</div>
	<p><strong>Total: ' . $indice . ' clientes</strong></p>
	';
    return $output;
}

?>