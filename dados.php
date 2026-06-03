<?php


function lerInput($msg = "")
{
    echo $msg;
    return trim(fgets(STDIN));
}


function carregarLivros()
{
    if (!file_exists("livros.json")) {
        return [];
    }

    return json_decode(file_get_contents("livros.json"), true) ?? [];
}

function salvarLivros($livros)
{
    file_put_contents(
        "livros.json",
        json_encode($livros, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    );
}


function minhaBiblioteca($biblioteca)
{
    if (empty($biblioteca)) {
        echo "Nenhum livro cadastrado.\n";
        return;
    }

    usort($biblioteca, fn($a, $b) =>
        strcmp($a['titulo'] ?? '', $b['titulo'] ?? '')
    );

    foreach ($biblioteca as $livro) {

        $id = $livro['id'] ?? 'sem-id';
        $titulo = $livro['titulo'] ?? 'Sem título';
        $autor = $livro['autor'] ?? 'Desconhecido';
        $paginas = $livro['paginas'] ?? 0;
        $lido = filter_var($livro['lido'] ?? false, FILTER_VALIDATE_BOOLEAN);

        echo "\n-------------------\n";
        echo "ID: $id | $titulo | $autor | $paginas | ";
        echo ($lido ? "Lido" : "Nao lido") . "\n";
    }
}

function buscarLivro($biblioteca)
{
    $nome = strtolower(lerInput("Digite o titulo do livro: "));

    $encontrado = false;

    foreach ($biblioteca as $livro) {
        if (str_contains(strtolower($livro['titulo']), $nome)) {
            echo "Encontrado: {$livro['titulo']} | {$livro['autor']}\n";
            $encontrado = true;
        }
    }

    if (!$encontrado) {
        echo "Nenhum livro encontrado.\n";
    }
}

function editarLivro(&$biblioteca)
{
    $id = lerInput("Digite o ID do livro: ");

    foreach ($biblioteca as &$livro) {

        if ($livro['id'] == $id) {

            $input = lerInput("Novo titulo ({$livro['titulo']}): ");
            if ($input !== "") $livro['titulo'] = $input;

            $input = lerInput("Novo autor ({$livro['autor']}): ");
            if ($input !== "") $livro['autor'] = $input;

            $input = lerInput("Paginas ({$livro['paginas']}): ");
            if ($input !== "") $livro['paginas'] = (int)$input;

            $input = lerInput("Lido? (1 sim / 0 nao): ");

            if ($input === "1") {
                $livro['lido'] = true;
            } elseif ($input === "0") {
                $livro['lido'] = false;
            }

            echo "Livro atualizado com sucesso!\n";
            return;
        }
    }

    echo "ID nao encontrado.\n";
}


function removerLivro(&$biblioteca)
{
    $id = lerInput("Digite o ID do livro: ");

    foreach ($biblioteca as $i => $livro) {

        if ($livro['id'] == $id) {

            $confirma = strtolower(lerInput("Tem certeza? (s/n): "));

            if ($confirma != "s") {
                echo "Remocao cancelada.\n";
                return;
            }

            unset($biblioteca[$i]);
            $biblioteca = array_values($biblioteca);

            echo "Livro removido com sucesso.\n";
            return;
        }
    }

    echo "ID nao encontrado.\n";
}


function estatisticas($biblioteca)
{
    $total = count($biblioteca);
    $lidos = 0;
    $paginasTotal = 0;

    foreach ($biblioteca as $livro) {

        $lido = $livro['lido'] ?? false;

        if ($lido == true) {
            $lidos++;
        }

        $paginasTotal += $livro['paginas'] ?? 0;
    }

    $media = $total > 0 ? $paginasTotal / $total : 0;

    echo "Total de livros: $total\n";
    echo "Livros lidos: $lidos\n";
    echo "Livros nao lidos: " . ($total - $lidos) . "\n";
    echo "Media de paginas: " . round($media, 2) . "\n";
}