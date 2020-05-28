<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo cabeçalho e tabela</title>
</head>
<style type="text/css">

    @page {
        margin: 120px 50px 80px 50px;
    }

    #head-text {
       
        background-repeat: no-repeat;
        font-size: 25px;
        text-align: center;
        height: 50px;
        width: 100%;
        position: fixed;
        top: -100px;
        left: 0;
        right: 0;
        margin: auto;
    }

    #head-logo {
        background-repeat: no-repeat;
        text-align: center;
        position: fixed;
        top: -120px;
        left: -450px;
        right: 0;
    }

    #head-logo img{
        width: 10%;
        height: 10%;
    }

    #corpo {
        width: 600px;
        position: relative;
        margin: auto;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        position: relative;
    }

    td {
        padding: 3px;
    }

    #footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        text-align: right;
        border-top: 1px solid gray;
    }

    #footer .page:after {
        content: counter(page);
    }
</style>

<body>

    <!-- cabeçalho da página -->
    <div id="head">
        <div id="head-logo"><img src="contents/img/images.png"></div>
        <div id="head-text"> Lista de Compras (CABEÇALHO)</div>
    </div>
        
    <div id="corpo">

        <!-- define o corpo do documento -->
        <table style="border: 1px">
            <thead>
                <tr bgcolor="#ccc">
                    <td>Item</td>
                    <td>Quantidade</td>
                    <td>Tipo</td>
                    <td>Produto</td>
                    <td>Obs.</td>
                </tr>
            </thead>
            <tbody>

                <?php
                //recebendo os dados do Formulário
                $quant = 22;
                $tipo = 'Unidade';
                $produto = 'Garrafa PET';
                $obs = 'Sem Obs';


                $total = 40;
                $body = '';

                for ($i = 0; $i < $total; $i++) {
                    $item = $i + 1;

                    $tmp = '<tr>
            <td width="5%">' . $item . '</td>
            <td width="10%">' . $quant . '</td>
            <td width="15%">' . $tipo . '</td>
            <td width="40%">' . $produto . '</td>
            <td width="30%"> ' . $obs . '</td>';
                    $body .= $tmp;
                }

                $body .= "<br> <h3>TOTAL: $total produtos</h3>";
                echo $body;
                ?>

                <!-- define o rodapé da página -->
                </tbody>
        </table>
    </div>
    <div id="footer">
        <p class="page">Página </p>
    </div>
</body>

</html>
