<?php $this->layout('template') ?>

<h1>Cadastro de Usuário</h1>

<form action="/cadastra_usuario" method="post" class="row g-3">
	<div class="row">
		<div class="col">
			<input type="text" name="nome" id="nome" placeholder="Nome" required class="form-control">
		</div>
		<div class="col">
			<input type="email" name="email" id="email" placeholder="E-mail" required class="form-control">
		</div>
		<div class="col">
			<input required type="password" name="senha" placeholder="Senha" required class="form-control">
		</div>
		<br><br>
		<div class="col-12">
			<button type="submit" class="btn btn-primary">cadastrar</button>
		</div>
	</div>
</form>
<br><br>
<a href="/">Voltar</a>