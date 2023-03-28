<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$logado = $_SESSION['email'];

$this->layout('template');

// PARAMETROS
$id = $_GET['id'];
$titulo = $_GET['titulo'];
$descricao = $_GET['descricao'];
$status = $_GET['status'];
?>


<h4>Usuário: <?= $logado ?></h4>
<h1>Deferir Chamado</h1>


<form action="/admin/home" method="post">
	<label for="id">Id</label>
	<input type="text" disabled name="id" id="id" required value="<?=$id?>">

	<label for="titulo">Título</label>
	<input type="text" disabled name="titulo" id="titulo" value="<?=$titulo?>" required>

	<label for="descricao">Descrição</label>
	<input type="text" disabled name="descricao" id="descricao" value="<?=$descricao?>" required>
	
	<label for="status">Status</label>
	<input type="text" name="status" id="status" value="<?=$status?>" required>

	<button type="submit">Deferir</button>
	 
</form>
<br>
<a href="/admin/home">Voltarr</a>