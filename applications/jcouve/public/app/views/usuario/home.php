<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$logado = $_SESSION['email'];

$this->layout('template') 
?>


<h4>Usuário: <?= $logado ?></h4>
<h1>Tela Inicial - Usuário</h1>

<form action="/cadastra_chamado" method="post">
	<input type="text" name="titulo" placeholder="Titulo" required>
	<input type="text" name="descricao" id="descricao" placeholder="Descricao" required>
	<input hidden type="text" name="status" id="status" value="indeferido" required>
	
	<button class="btn btn-primary" type="submit">Novo chamado</button>
</form>
<br>
<a href="/">Sair</a>