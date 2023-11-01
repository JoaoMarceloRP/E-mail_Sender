
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
    $numEmails = (int) $_POST['fnumemails'];

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
    
    for ($i = 0; $i < $numEmails; $i++) {
        $mail->send();
    }

    echo("<script>");
	echo("alert('E-mail enviado com sucesso!');");
	echo("location.href='home.html';");
	echo("</script>");
   
}

?>