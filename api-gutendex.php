<?php

function pesquisarGutendex($termo)
{
    $url = "https://gutendex.com/books?search=" . urlencode($termo);

    $resposta = @file_get_contents($url);

    if ($resposta === false) {
        echo "\nErro ao conectar com a API Gutendex.\n";
        return [];
    }

    $dados = json_decode($resposta, true);

    return $dados['results'] ?? [];
}

function mostrarResultadosGutendex($livros)
{
    if (empty($livros)) {
        echo "\nNenhum livro encontrado na Gutendex.\n";
        return;
    }

    foreach (array_slice($livros, 0, 5) as $indice => $livro) {

        echo "\n=== LIVRO " . ($indice + 1) . " ===\n";

        echo "Título: " . $livro['title'] . "\n";

        $autor = $livro['authors'][0]['name'] ?? 'Autor desconhecido';

        echo "Autor: " . $autor . "\n";

        echo "\nLinks disponíveis:\n";

        if (isset($livro['formats']['application/pdf'])) {
            echo "PDF: " . $livro['formats']['application/pdf'] . "\n";
        }

        if (isset($livro['formats']['application/epub+zip'])) {
            echo "EPUB: " . $livro['formats']['application/epub+zip'] . "\n";
        }

        if (isset($livro['formats']['text/html'])) {
            echo "HTML: " . $livro['formats']['text/html'] . "\n";
        }

        echo "\n";
    }
}