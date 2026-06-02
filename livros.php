<?php

function cadastrarLivro(&$livros)
{
    echo "Título: ";
    $titulo = trim(fgets(STDIN));

    echo "Autor: ";
    $autor = trim(fgets(STDIN));

    echo "Número de páginas: ";
    $paginas = (int) trim(fgets(STDIN));

    echo "Lido? (s/n): ";
    $lido = strtolower(trim(fgets(STDIN)));

    $livros[] = [
        "titulo" => $titulo,
        "autor" => $autor,
        "paginas" => $paginas,
        "lido" => ($lido == "s")
    ];

    echo "\nLivro cadastrado com sucesso!\n";
}