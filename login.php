<?php
$email = $_POST['femail'];
$password = $_POST['fsenha'];

if ($email === 'joaomaropi@gmail.com' && $password === 'jgmlvmjdshybypfd') {
    header('Location: home.html');
    exit();
} else {
    header('Location: index.html');
    exit();
}

?>