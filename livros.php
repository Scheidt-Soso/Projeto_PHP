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

    echo "\nLivro cadastrado com sucesso!\n";
}?>