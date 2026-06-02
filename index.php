<?php

require_once "menu.php";
require_once "livros.php";

$livros = [];

do {

    exibirMenu();

    $opcao = trim(fgets(STDIN));

    switch ($opcao) {

        case 1:
            echo "\nCadastrar livro\n";
            break;

        case 2:
            echo "\nListar livros\n";
            break;

        case 3:
            echo "\nBuscar livro\n";
            break;

        case 4:
            echo "\nEditar livro\n";
            break;

        case 5:
            echo "\nRemover livro\n";
            break;

        case 0:
            echo "\nSaindo...\n";
            break;

        default:
            echo "\nOpção inválida!\n";
    }

} while ($opcao != 0);