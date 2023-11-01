<?php
require_once 'pdo.php';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        echo "
            <center>
                Conectado a $dbname em $host com sucesso.
            </center>
        ";
       
    } catch (PDOException $pe) {
        die("Não foi possível se conectar ao banco de dados $dbname :" . $pe->getMessage());
    }
?>
