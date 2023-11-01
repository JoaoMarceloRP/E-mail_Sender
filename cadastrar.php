<?php
    require_once 'conexao.php';

    if(session_id() == '') {
        session_start();
    }      

     $wemail = $_POST['femail']; 
     $wsenha = $_POST['fsenha'];

    $sql = "SELECT * FROM usuario where email='$wemail'";
    $result = $conn->query($sql);
    $rows = $result->fetchAll(); 
    echo $wemail;

    if (!$rows) { 
        try{

            $sql = "insert into usuario(email,senha)
                    values(:semail,:ssenha)";
    
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":semail", $wemail);  
            $stmt->bindParam(":ssenha", $wsenha);  
            $stmt->execute();
            
            echo("<script>");
            echo("alert('Cadastrado em nosso banco de dados!');");
            echo("location.href='home.html';");
            echo("</script>");
          

        }catch(PDOException $e){
            echo("Error: ".$e->getMessage());
        }finally{
            $this->conn = null;    
        }
        
    }else{
        echo("<script>");
            echo("alert('Este email já consta em nosso banco de dados!');");
            echo("location.href='home.html';");
            echo("</script>");
    } 
?>