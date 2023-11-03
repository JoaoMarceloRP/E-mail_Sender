<?php

require_once 'conexao.php';

require './PHPMailer-master/src/Exception.php';
require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['enviar_email'])) {
    $sender = 'joaomaropi@gmail.com';
    $recipient = htmlentities($_POST['fto']);
    $subject = htmlentities($_POST['fsubject']);
    $message = htmlentities($_POST['fmessage']);
    $numEmails = (int)$_POST['fnumemails'];

    $sql = "INSERT INTO emails (sender, recipient, subject, message, num_emails) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssi", $sender, $recipient, $subject, $message, $numEmails);
        if ($stmt->execute()) {
            echo "Dados do email foram salvos no banco de dados com sucesso!";
        } else {
            echo "Erro ao inserir dados no banco de dados: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro na preparação da instrução SQL: " . $mysqli->error;
    }
}

?>