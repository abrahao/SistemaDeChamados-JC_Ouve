<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$logado = $_SESSION['email'];
?>

<?php $this->layout("master"); ?>

<h1>Tela Inicial - Admin</h1>

<br>
<a href="/">Sair</a>