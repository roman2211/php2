<?php
include '../config/main.php';
include '../services/Autoloader.php';

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);


$controllerName = $_GET['c'] ?: DEFAULT_CONTROLLER;
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)){
    $controller = new $controllerClass();
    $controller->runAction($actionName);
}