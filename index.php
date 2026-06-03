<?php

require_once "menu.php";
require_once "livros.php";
require_once "dados.php";
require_once "api-gutendex.php";
require_once "api-OpenL.php";

$livros = carregarLivros();


foreach ($livros as &$livro) {
    $livro['lido'] = filter_var($livro['lido'], FILTER_VALIDATE_BOOLEAN);
}

do {

    exibirMenu();

   $opcao = lerInput("Escolha uma opção: ");

if ($opcao === "") {
    echo "Opcao vazia nao permitida.\n";
    continue;
}

if (!is_numeric($opcao)) {
    echo "Digite apenas números.\n";
    continue;
}

$opcao = (int)$opcao;

    switch ($opcao) {

        case 1:

            $pesquisa = lerInput("Digite o nome do livro: ");

            if ($pesquisa === "") {
                echo "Busca vazia nao permitida.\n";
                break;
            }

            $resultados = pesquisarOpenLibrary($pesquisa);

            if (empty($resultados)) {
                echo "Nenhum livro encontrado.\n";
                break;
            }

            $opcoes = array_slice($resultados, 0, 5);

            foreach ($opcoes as $indice => $livro) {

                echo "\n[$indice] === LIVRO ===\n";

                echo "Título: " . ($livro['title'] ?? 'Não informado') . "\n";
                echo "Autor: " . ($livro['author_name'][0] ?? 'Autor desconhecido') . "\n";
            }

            $escolha = (int) lerInput("\nDigite o número do livro: ");

            if (!isset($opcoes[$escolha])) {
                echo "Opção inválida.\n";
                break;
            }

            $selecionado = $opcoes[$escolha];

            $lidoInput = lerInput("Você já leu esse livro? (1 sim / 0 nao): ");

            $livros[] = [
                "id" => uniqid(),
                "titulo" => $selecionado['title'] ?? 'Sem título',
                "autor" => $selecionado['author_name'][0] ?? 'Desconhecido',
                "paginas" => 0,
                "lido" => ($lidoInput === "1")
            ];

            salvarLivros($livros);

            echo "Livro adicionado com sucesso!\n";

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
            salvarLivros($livros);
            echo "Saindo...\n";
            break;

        default:
            echo "Opcao invalida!\n";
    }

} while ($opcao != 0);