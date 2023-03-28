<?php $this->layout('template') ?>

<h1>Login Usuário</h1>

<form action="/login_usuario" method="post">

    <label>E-mail</label>
    <input type="text" name="email" id="email">

    <label>Senha</label>
    <input type="password" name="senha" id="senha">

    <button type="submit">Entrar</button>
</form>
<br>
<a href="/" >Voltar</a>