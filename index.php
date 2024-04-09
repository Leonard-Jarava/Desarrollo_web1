<?php

header('Content-Type: application/json');   

$directorioControladores = 'controladores/';

$controlador = isset($_GET['controlador']) ? $_GET['controlador'] : 'inicio';
$accion = isset($_GET['accion']) ? $_GET['accion'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$archivoControlador = $directorioControladores . ($controlador) . '_controlador.php';

require_once file_exists($archivoControlador) ? $archivoControlador : die('Controlador no encontrado');

$controladorInstancia = crearControlador($controlador);
$controladorInstancia->{$accion}($id);

function crearControlador($controlador) {
    $nombreClase = 'controladores\\' . ucfirst($controlador) . 'Controlador';
    return new $nombreClase();
}

