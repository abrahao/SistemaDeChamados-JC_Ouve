<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$logado = $_SESSION['email'];
?>

<?php $this->layout("master"); ?>

<h1>Tela Inicial - Usuário</h1>

<form action="/cadastra_chamado" method="post">
	<input type="text" name="titulo" placeholder="Titulo">
	<input type="text" name="descricao" id="descricao" placeholder="Descricao">
	<input hidden type="text" name="status" id="status" value="indeferido">
	
	<button type="submit">Novo chamado</button>
</form>
<br>
<a href="/">Sair</a>