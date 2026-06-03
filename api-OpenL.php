<?php

function pesquisarOpenLibrary($termo)
{
    $url = "https://openlibrary.org/search.json?q=" . urlencode($termo);

    $resposta = @file_get_contents($url);

    if ($resposta === false) {
        echo "\nErro ao conectar com a Open Library.\n";
        return [];
    }

    $dados = json_decode($resposta, true);

    return $dados['docs'] ?? [];
}

function mostrarResultadosOpenLibrary($livros)
{
    if (empty($livros)) {
        echo "\nNenhum livro encontrado.\n";
        return;
    }

    foreach (array_slice($livros, 0, 5) as $indice => $livro) {

        echo "\n=== LIVRO " . ($indice + 1) . " ===\n";

        echo "Título: " . ($livro['title'] ?? 'Não informado') . "\n";

        $autor = $livro['author_name'][0] ?? 'Autor desconhecido';
        echo "Autor: " . $autor . "\n";

        if (isset($livro['first_publish_year'])) {
            echo "Ano: " . $livro['first_publish_year'] . "\n";
        }

        if (isset($livro['edition_count'])) {
            echo "Edições: " . $livro['edition_count'] . "\n";
        }

        echo "\n";
    }
}