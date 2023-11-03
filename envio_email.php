
<?php

require './PHPMailer-master/src/Exception.php';
require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['enviar'])){
    $email = htmlentities($_POST['fto']);
    $subject = htmlentities($_POST['fsubject']);
    $message = htmlentities($_POST['fmessage']);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'joaomaropi@gmail.com';
    $mail->Password = 'jgmlvmjdshybypfd';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom('joaomaropi@gmail.com');
    $mail->addAddress($_POST["fto"]);
    $mail->Subject = ($_POST["fsubject"]);
    $mail->Body = $_POST["fmessage"];

    if (isset($_FILES['anexo']) && $_FILES['anexo']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['anexo']['tmp_name'];
        $fileName = $_FILES['anexo']['name'];
        $mail->addAttachment($fileTmpPath, $fileName);
    }
    
   
    $mail->send();
    

if ($mail->send()) {
    require_once 'conexao.php';

    $remetente = 'joaomaropi@gmail.com';
    $destinatario = htmlentities($_POST['fto']);
    $assunto = htmlentities($_POST['fsubject']);
    $mensagem = htmlentities($_POST['fmessage']);
    $tem_anexo = isset($_FILES['anexo']) && $_FILES['anexo']['error'] == UPLOAD_ERR_OK ? 1 : 0;

    $sql = "INSERT INTO emails (remetente, destinatario, assunto, mensagem, tem_anexo) VALUES (:remetente, :destinatario, :assunto, :mensagem, :tem_anexo)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bindParam(':remetente', $remetente, PDO::PARAM_STR);
        $stmt->bindParam(':destinatario', $destinatario, PDO::PARAM_STR);
        $stmt->bindParam(':assunto', $assunto, PDO::PARAM_STR);
        $stmt->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
        $stmt->bindParam(':tem_anexo', $tem_anexo, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header('Location: estatisticapg.php');
            exit;
        } else {
            echo "Erro ao inserir dados no banco de dados: " . implode(" - ", $stmt->errorInfo());
        }
    } else {
        echo "Erro na preparação da instrução SQL: " . implode(" - ", $conn->errorInfo());
    }
}

   

}

?>