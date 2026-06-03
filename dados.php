<?php

function carregarLivros()
{
    if (!file_exists("livros.json")) {
        return [];
    }

    return json_decode(
        file_get_contents("livros.json"),
        true
    ) ?? [];
}

function salvarLivros($livros)
{
    file_put_contents(
        "livros.json",
        json_encode($livros, JSON_PRETTY_PRINT)
    );
}
function minhaBiblioteca($biblioteca) {
    if (empty($biblioteca)) {
        echo "Nenhum livro cadastrado.\n";
        return;
    }

    foreach ($biblioteca as $i => $livro) {
        echo "$i - {$livro['titulo']} | {$livro['autor']} | ";
        echo $livro['lido'] ? "Lido" : "Nao lido";
        echo "\n";
    }
}

function buscarLivro($biblioteca) {
    echo "Digite o titulo do livro: ";
    $nome = trim(fgets(STDIN));

    foreach ($biblioteca as $livro) {
        if (strtolower($livro['titulo']) == strtolower($nome)) {
            echo "Encontrado!\n";
            echo "{$livro['titulo']} | {$livro['autor']}\n";
            return;
        }
    }

    echo "Livro nao encontrado.\n";
}

function editarLivro(&$biblioteca) {
    echo "Digite o indice do livro: ";
    $id = (int) fgets(STDIN);

    if (!isset($biblioteca[$id])) {
        echo "Indice invalido.\n";
        return;
    }

    echo "Novo titulo: ";
    $biblioteca[$id]['titulo'] = trim(fgets(STDIN));

    echo "Novo autor: ";
    $biblioteca[$id]['autor'] = trim(fgets(STDIN));

    echo "Quantidade de paginas: ";
    $biblioteca[$id]['paginas'] = (int) fgets(STDIN);

    echo "Foi lido? (1 sim / 0 nao): ";
    $biblioteca[$id]['lido'] = (bool) fgets(STDIN);
}

function removerLivro(&$biblioteca) {
    echo "Digite o indice do livro: ";
    $id = (int) fgets(STDIN);

    if (!isset($biblioteca[$id])) {
        echo "Indice invalido.\n";
        return;
    }

    array_splice($biblioteca, $id, 1);
    echo "Livro removido com sucesso.\n";
}

function estatisticas($biblioteca) {
    $total = count($biblioteca);
    $lidos = 0;

    foreach ($biblioteca as $livro) {
        if ($livro['lido']) $lidos++;
    }

    echo "Total de livros: $total\n";
    echo "Livros lidos: $lidos\n";
    echo "Livros nao lidos: " . ($total - $lidos) . "\n";
}
