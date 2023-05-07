<?php
// ambil nilai dari query string
$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

// pastikan controller dan action benar-benar ada
$controllerName = ucfirst(strtolower($controllerName)) . 'Controller';
$actionName = strtolower($actionName);

if (!file_exists('controllers/' . $controllerName . '.php')) {
    die('Controller tidak ditemukan');
}

include 'controllers/' . $controllerName . '.php';

if (!class_exists($controllerName)) {
    die('Controller tidak ditemukan');
}

$controller = new $controllerName();

if (!method_exists($controller, $actionName)) {
    die('Action tidak ditemukan');
}

// panggil method action pada controller
$controller->$actionName();
