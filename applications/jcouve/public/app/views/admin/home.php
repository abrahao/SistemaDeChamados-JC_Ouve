<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$logado = $_SESSION['email'];

$this->layout('template')
?>


<h4>Admin: <?= $logado ?></h4>
<h1>Tela Inicial - Admin</h1>
<br>

<a href="cadastra_admin">Cadastrar Admin</a> |
<a href="/">Sair</a>
<br>

<h3>Chamados</h3>

<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<table style="width:50%;text-align: center;">
    <tr>
        <th>Titulo</th>
        <th>Descrição</th>
        <th>Status</th>
        <th>Mudar Status</th>
    </tr>

    <?php
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $dbname = "xjcouve";

    try {
        $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    } catch (PDOException $err) {
        echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
    }

    $query_usuarios = "SELECT * FROM cadastro_chamados";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <tr>
            <?php extract($row_usuario);
            ?>
            <td><?= $titulo ?></td>
            <td><?= $descricao ?></td>
            <td><?= $status ?></td>
            <td>
                <form action="" method="post">
                    <!-- <a href="/chamado/deferir_chamado?id=<?= $id ?>&titulo=<?= $titulo ?>&descricao=<?= $descricao ?>&status=<?= $status ?>">Deferir</a> | -->
                    <a href="#">Deferir</a> | 
                    <a href="#">Indeferir</a>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>