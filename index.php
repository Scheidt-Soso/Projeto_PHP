<?php

require_once "menu.php";
require_once "livros.php";
require_once "api.php";

$livros = [];

do {

    exibirMenu();

    $opcao = trim(fgets(STDIN));

    switch ($opcao) {

        case 1:

            echo "\nDigite o nome do livro: ";

            $pesquisa = trim(fgets(STDIN));

            $resultados = pesquisarLivroAPI($pesquisa);

            mostrarResultadosAPI($resultados);

            break;

        case 2:

            echo "\nMinha biblioteca\n";

            break;

        case 3:

            echo "\nBuscar livro salvo\n";

            break;

        case 4:

            echo "\nEditar livro\n";

            break;

        case 5:

            echo "\nRemover livro\n";

            break;

        case 6:

            echo "\nEstatísticas\n";

            break;

        case 0:

            echo "\nSaindo...\n";

            break;

        default:

            echo "\nOpção inválida!\n";
    }

} while ($opcao != 0);

?>