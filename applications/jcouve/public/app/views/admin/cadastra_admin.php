<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$logado = $_SESSION['email'];

$this->layout('template') 
?>

<h4>Admin: <?= $logado ?></h4>
<h1>Cadastrar Admin</h1>

<form action="/admin/cadastra_admin" method="post">
	<input type="text" name="nome" placeholder="Nome" required>
	<input type="email" name="email" id="email" placeholder="E-mail" required>
	<input type="password" name="senha" id="senha" placeholder="Senha" required>
	<button class="btn btn-primary" type="submit">Cadastrar</button>
</form>

<a href="/admin/home">Voltar</a>
