<?php

function cadastrarLivro(&$livros)
{
    echo "Título: ";
    $titulo = trim(fgets(STDIN));

    echo "Autor: ";
    $autor = trim(fgets(STDIN));

    echo "Número de páginas: ";
    $paginas = (int) trim(fgets(STDIN));

    $livros[] = [
        "id" => count($livros) + 1,
        "titulo" => $titulo,
        "autor" => $autor,
        "paginas" => $paginas,
        "status" => "Quero Ler",
        "nota" => 0
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

    usort($livros, function ($a, $b) {
        return strcmp($a['titulo'], $b['titulo']);
    });

    foreach ($livros as $livro) {

        echo "\n-------------------\n";
        echo "ID: {$livro['id']}\n";
        echo "Título: {$livro['titulo']}\n";
        echo "Autor: {$livro['autor']}\n";
        echo "Páginas: {$livro['paginas']}\n";
        echo "Status: {$livro['status']}\n";
        echo "Nota: {$livro['nota']}\n";
    }
    
    
}