<?php

require_once 'conexao.php';

if (session_id() == '') {
    session_start();
}      

$wfrom = $_POST['ffrom']; 
$wto = $_POST['fto'];
$wsubject = $_POST['fsubject'];
$wmessage = $_POST['fmessage'];

$sql = "SELECT * FROM emails_enviados WHERE para='$wto'";
$result = $conn->query($sql);
$rows = $result->fetchAll();

if (!$rows) { 
    try {
        $sql = "INSERT INTO emails_enviados(de, para, assunto, mensagem) VALUES(:sde, :spara, :sassunto, :smensagem)";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":sde", $wfrom);  
        $stmt->bindParam(":spara", $wto);
        $stmt->bindParam(':sassunto', $wsubject);  
        $stmt->bindParam(":smensagem", $wmessage);  
        $stmt->execute();
        
        echo("<script>");
        echo("alert('Cadastrado em nosso banco de dados!');");
        echo("location.href='home.html';");
        echo("</script>");
      
    } catch(PDOException $e) {
        echo("Error: ".$e->getMessage());
    }
}