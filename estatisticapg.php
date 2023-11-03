<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Emails Salvos</title>
</head>
<body>
    <h1>Lista de Emails Salvos</h1>

    <?php
    require_once 'conexao.php';

    $sql = "SELECT * FROM emails";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->rowCount() > 0) {
            echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Remetente</th>
                    <th>Destinatário</th>
                    <th>Assunto</th>
                    <th>Mensagem</th>
                    <th>Data de Envio</th>
                    <th>Tem Anexo</th>
                </tr>";

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["remetente"] . "</td>";
                echo "<td>" . $row["destinatario"] . "</td>";
                echo "<td>" . $row["assunto"] . "</td>";
                echo "<td>" . $row["mensagem"] . "</td>";
                echo "<td>" . $row["data_envio"] . "</td>";
                echo "<td>" . ($row["tem_anexo"] ? 'Sim' : 'Não') . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Nenhum email encontrado na tabela.";
        }
    } else {
        echo "Erro na consulta SQL: " . implode(" - ", $conn->errorInfo());
    }
    ?>

<a href="home.html">Voltar para a Página Inicial</a>


</body>
</html>
