<?php

require_once "menu.php";
require_once "livros.php";
require_once "dados.php";
require_once "api-gutendex.php";
require_once "api-OpenL.php";

$livros = carregarLivros();

do {

    exibirMenu();

    $opcao = (int) trim(fgets(STDIN));

    switch ($opcao) {

        case 1:

    echo "\nDigite o nome do livro: ";
    $pesquisa = trim(fgets(STDIN));

    $resultados = pesquisarOpenLibrary($pesquisa);

    if (empty($resultados)) {
        echo "\nNenhum livro encontrado.\n";
        break;
    }

    $opcoes = array_slice($resultados, 0, 5);

    foreach ($opcoes as $indice => $livro) {

        echo "\n[" . $indice . "] === LIVRO ===\n";

        $titulo = $livro['title'] ?? 'Não informado';
        $autor = $livro['author_name'][0] ?? 'Autor desconhecido';

        echo "Título: $titulo\n";
        echo "Autor: $autor\n";
    }

    echo "\nDigite o número do livro que deseja adicionar à biblioteca: ";
    $escolha = (int) trim(fgets(STDIN));

    if (!isset($opcoes[$escolha])) {
        echo "\nOpção inválida.\n";
        break;
    }

    $selecionado = $opcoes[$escolha];

    $livros[] = [
        "titulo" => $selecionado['title'] ?? 'Sem título',
        "autor" => $selecionado['author_name'][0] ?? 'Desconhecido',
        "paginas" => 0,
        "lido" => false
    ];

    salvarLivros($livros);

    echo "\nLivro adicionado à biblioteca com sucesso!\n";

    break;

        case 2:

            minhaBiblioteca($livros);
            break;

        case 3:

            buscarLivro($livros);
            break;

        case 4:

            editarLivro($livros);
            salvarLivros($livros);
            break;

        case 5:

            removerLivro($livros);
            salvarLivros($livros);
            break;

        case 6:

            estatisticas($livros);
            break;

        case 0:

            echo "\nSaindo...\n";
            break;

        default:

            echo "\nOpção inválida!\n";
    }

} while ($opcao != 0);

?>