<?php

require_once "dados.php";

function cadastrarLivro(&$livros)
{
    echo "Título: ";
    $titulo = trim(fgets(STDIN));

    echo "Autor: ";
    $autor = trim(fgets(STDIN));

    echo "Número de páginas: ";
    $paginas = (int) trim(fgets(STDIN));

    echo "Você já leu esse livro? (1 sim / 0 nao): ";
    $lidoInput = trim(fgets(STDIN));

    $livros[] = [
        "id" => uniqid(),
        "titulo" => $titulo,
        "autor" => $autor,
        "paginas" => $paginas,
        "lido" => ($lidoInput === "1")
    ];

    salvarLivros($livros);

    echo "\nLivro cadastrado com sucesso!\n";
}


function listarLivros($livros)
{
    if (empty($livros)) {
        echo "\nNenhum livro cadastrado.\n";
        return;
    }

    usort($livros, fn($a, $b) => strcmp($a['titulo'], $b['titulo']));

    foreach ($livros as $livro) {

        echo "\n-------------------\n";
        echo "ID: {$livro['id']}\n";
        echo "Título: {$livro['titulo']}\n";
        echo "Autor: {$livro['autor']}\n";
        echo "Páginas: {$livro['paginas']}\n";
        echo "Status: " . ($livro['lido'] ? "Lido" : "Nao lido") . "\n";
    }
}