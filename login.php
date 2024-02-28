<?php
$email = $_POST['femail'];
$password = $_POST['fsenha'];

if ($email === 'joaomaropi@gmail.com' && $password === 'jgmlvmjdshybypfd') {
    header('Location: home.html');
    exit();
} else {
    echo("<script>");
    echo("alert('Dados de login incorretos!');");
    echo("location.href='index.html';");
    echo("</script>");
    exit();
}

?>