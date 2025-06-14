<?php

header('Content-Type: application/json');

require_once '../controller/ProdutosController.php';
require_once '../controller/comprarController.php';
require_once '../controller/jurosController.php';
require_once '../controller/estatisticasController.php';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

switch ($uri) {
    case '/produtos':
        if ($method == 'POST') {
            $produto = new ProdutosController();
            $produto->salvarProduto();
        } else {
            http_response_code(405);
        }
        break;

    case '/compras': {
            if ($method == 'POST') {
                $compras = new ComprarController();
                $compras->salvarCompras();
            } elseif ($method == 'GET') {
                $compras = new ComprarController();
                $compras->buscar();
            } else {
                http_response_code(405);
            }
            break;
        }
    case '/estatistica': {
            if ($method == 'GET') {
                $est = new EstatisticasController();
                $est->buscaEstatisticas();
            } else {
                http_response_code(405);
            }
            break;
        }
    case '/juros': {
            if ($method == 'PUT') {
                $juros = new JurosController();
                $juros->atualizarJuros();
            } else {
                http_response_code(405);
            }
            break;
        }
    default:{http_response_code(404);}        
}
