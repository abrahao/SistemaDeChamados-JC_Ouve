<?php

function load(string $controller, string $action)
{
    try {
        // se controller existe
        $controllerNamespace = "app\\controllers\\{$controller}";

        if (!class_exists($controllerNamespace)) {
            throw new Exception("O controller {$controller} não existe");
        }

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
    "/" => fn () => load("HomeController", "index"),
    "/admin/cadastra_admin" => fn () => load("CadastraAdminController", "index"),
    "/admin/home" => fn () => load("HomeAdminController", "index"),
    "/cadastra_usuario" => fn () => load("CadastraUsuarioController", "index"),
    "/usuario/home" => fn () => load("HomeUsuarioController", "index"),
    "/login_usuario" => fn () => load("LoginUsuarioController", "index"),
    "/login_admin" => fn () => load("LoginAdminController", "index"),
  ],
  "POST" => [
    "/login_admin" => fn () => load("LoginAdminController", "processaLogin"),
    "/login_usuario" => fn () => load("LoginUsuarioController", "processaLogin"),
    "/cadastra_admin" => fn () => load("CadastraAdminController", "salvar"),
    "/cadastra_usuario" => fn () => load("CadastraUsuarioController", "salvar"),
    "/cadastra_chamado" => fn () => load("CadastraChamadoController", "salvar"),
  ],
];
