<?php $this->layout("master"); ?>

<h1>Login Admin</h1>

<form action="/login_admin" method="post">

    <label>E-mail</label>
    <input type="text" name="email" id="email">

    <label>Senha</label>
    <input type="password" name="senha" id="senha">

    <button type="submit">Entrar</button>
</form>
<br>
<a href="/">Voltar</a>  