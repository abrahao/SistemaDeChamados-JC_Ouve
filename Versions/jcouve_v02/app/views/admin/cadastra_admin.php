<?php $this->layout("master"); ?>

<h1>Cadastro Admin</h1>

<form action="/cadastra_admin" method="post">
	<input type="text" name="nome" placeholder="Nome">
	<input type="email" name="email" id="email" placeholder="E-mail">
	<input type="password" name="senha" id="senha" placeholder="Senha">
	<button type="submit">Cadastrar</button>
</form>

<a href="/">Voltar</a>