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
    $result = $mysqli->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Remetente</th>
                    <th>Destinatário</th>
                    <th>Assunto</th>
                    <th>Mensagem</th>
                    <th>Data de Envio</th>
                    <th>Número de Emails</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["sender"] . "</td>";
                echo "<td>" . $row["recipient"] . "</td>";
                echo "<td>" . $row["subject"] . "</td>";
                echo "<td>" . $row["message"] . "</td>";
                echo "<td>" . $row["sent_at"] . "</td>";
                echo "<td>" . $row["num_emails"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Nenhum email encontrado na tabela.";
        }
    } else {
        echo "Erro na consulta SQL: " . $mysqli->error;
    }

    $mysqli->close();
    ?>
</body>
</html>
