<?php
require('vendor/autoload.php');
require ("routes/router.php");

// o index vai verificar se a rota existe

try {
  $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
  $request = $_SERVER["REQUEST_METHOD"];

  // se a rota não existe é lançada uma exceção
  if (!isset($router[$request])) {
    throw new Exception("A rota não existe");
  }

  // se o tipo de requisiçåo não existe
  if (!array_key_exists($uri, $router[$request])) {
    throw new Exception("A rota não existe");
  }

  // se existe
  $controller = $router[$request][$uri];
  $controller();
} catch (Exception $e) {
  $e->getMessage();
}
