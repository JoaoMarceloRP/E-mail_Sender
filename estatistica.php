<?php

require_once 'conexao.php';

    $sender = 'joaomaropi@gmail.com';
    $recipient = $_POST['fto'];
    $subject = $_POST['fsubject'];
    $message = $_POST['fmessage'];
    $numEmails = (int) $_POST['fnumemails'];

    for ($i = 0; $i < $numEmails; $i++) {
        $sql = "INSERT INTO emails (sender, recipient, subject, message) VALUES ('$sender', '$recipient', '$subject', '$message')";

        if ($conn->query($sql) === true) {
            echo "Dados inseridos com sucesso na tabela.";
        } else {
            echo "Erro ao inserir dados na tabela: " . $conn->error;
        }
    }

    $conn->close();

    echo("<script>");
    echo("alert('E-mail enviado com sucesso e informações inseridas na tabela!');");
    echo("location.href='home.html';");
    echo("</script>");




?>