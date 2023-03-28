<?php $this->layout('template') ?>

<h1>Login Admin</h1>

<form action="/login_admin" method="post">

    <label>E-mail</label>
    <input type="mail" name="email" id="email">

    <label>Senha</label>
    <input type="password" name="senha" id="senha">

    <button type="submit">Entrar</button>
</form>
<br>
<a href="/" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Voltar</a  