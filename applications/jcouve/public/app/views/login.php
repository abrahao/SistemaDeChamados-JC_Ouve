<?php $this->layout('template') ?>

<h1>Login</h1>

<form id='form' method='post' enctype='multipart/form-data'>
    <label>E-mail</label>
    <input type="text" name="email" id="email">

    <label>Senha</label>
    <input type="password" name="senha" id="senha">
    <br><br><br>

    <button class="btn btn-primary" type="submit" id='botaoUsuario'>Usuário</button>
    <button class="btn btn-primary" type="submit" id='botaoAdmin'>Admin</button>
</form>
</form>
<script>
    document.getElementById('botaoUsuario').onclick = function() {
        document.getElementById('form').action = '/login_usuario';
    }
    document.getElementById('botaoAdmin').onclick = function() {
        document.getElementById('form').action = '/login_admin';
    }
</script>
<br>
<a href="/" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Voltar</a