<?php
require "dados.php";
require "livros.php";

while (true){

echo "1-Cadastrar um livro"."\n";
echo "2-Listar ". "\n";
echo "3-Buscar" . "\n";
echo "4-Editar". "\n";
echo "5-Remover". "\n";
echo "0-Sair". "\n";

$opcao = readline("Escolha");


switch($opcao){
case 1 :
    "Cadastrar livro($livros)";
    break;

case 2:
   "Listar Livros($livros)";
    break;

case 3:
    echo "Buscar Livro\n";
    break;

case 0:
    exit;

    default:
    echo "Opçãp Inválida\n";
}

}


//echo "\nMenu\n";
 

?>