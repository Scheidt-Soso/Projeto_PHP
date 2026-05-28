<?php

function cadastrarLivro($livros){
    echo "\nCadastrar Livro\n";


    $titulo = readline ("Título: ");
    $autor = readline ("Autor:");
    $paginas = readline ("Páginas");

}
function listarLivros($livros){
    echo "\nListar Livros\n";
}
//https://openlibrary.org/search.json?q=harry+potter&utm_source=chatgpt.com, usar esse caso de erro 
//https://developers.google.com/books/docs/overview?hl=pt-br usar para integrar a api no php, para não ficar listando dms os livros
?>