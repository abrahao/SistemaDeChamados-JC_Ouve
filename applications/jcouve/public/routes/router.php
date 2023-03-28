<?php

// Função responsável por carregar as rotas. Ela espera dois parâmetros:
// o controller e o método do controller solicitado
// $action é o método do controller que vai ser executado
function load(string $controller, string $action)
{
    try {
        // Verifica se o controller existe
        $controllerNamespace = "app\\controllers\\{$controller}";

        // ... se o controller não existir vai entrar nesse if
        if (!class_exists($controllerNamespace)) {
            throw new Exception("O controller {$controller} não existe");
        }

        //  ...se existe, uma nova instância é criada
        $controllerInstance = new $controllerNamespace();

        if (!method_exists($controllerInstance, $action)) {
            throw new Exception(
                "O método {$action} não existe no controller {$controller}"
            );
        }

        $controllerInstance->$action((object) $_REQUEST);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

$router = [
  "GET" => [
    // fn() - arrow function usada para ão ser preciso usar o echo no index.php
    "/" => fn () => load("HomeController", "index"),
    "/login" => fn () => load("LoginController", "index"),
    "/login_admin" => fn () => load("LoginAdminController", "index"),
    "/admin/cadastra_admin" => fn () => load("CadastraAdminController", "index"),
    "/admin/home" => fn () => load("HomeAdminController", "index"),
    "/cadastra_usuario" => fn () => load("CadastraUsuarioController", "index"),
    "/login_usuario" => fn () => load("LoginUsuarioController", "index"),
    "/usuario/home" => fn () => load("HomeUsuarioController", "index"),
    "/defere_chamado" => fn () => load("ChamadoController", "index"),
    
    
  ],
  "POST" => [
    "/login_admin" => fn () => load("LoginAdminController", "processaLogin"),
    "/login_usuario" => fn () => load("LoginUsuarioController", "processaLogin"),
    "/admin/cadastra_admin" => fn () => load("CadastraAdminController", "salvar"),
    "/cadastra_usuario" => fn () => load("CadastraUsuarioController", "salvar"),
    "/cadastra_chamado" => fn () => load("ChamadoController", "salvar"),
  ],
];
