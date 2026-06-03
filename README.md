# Projeto_PHP
Biblioteca Virtual em PHP (CLI)

Sistema de gerenciamento de biblioteca virtual desenvolvido em PHP puro, executado via terminal (CLI), com integração de APIs de livros e persistência em JSON.

 Funcionalidades

- Cadastro de livros (manual e via API)
- Pesquisa de livros via OpenLibrary
- Listagem da biblioteca ordenada (A-Z)
- Edição de livros
- Remoção de livros
- Estatísticas (total, lidos, não lidos, média de páginas)
- Persistência de dados em JSON
- Integração com API de livros (Open Library)


Tecnologias utilizadas

- PHP 8+
- JSON (armazenamento local)
- APIs públicas (Open Library)
- Execução via terminal (CLI)

---

Estrutura do projeto

Projeto_PHP/
│
├── index.php # Menu principal do sistema
├── dados.php # Funções de persistência e estatísticas
├── livros.php # CRUD de livros
├── menu.php # Interface do menu
├── api-OpenL.php # Integração com OpenLibrary
├── api-gutendex.php # API alternativa de livros
├── livros.json # Base de dados local
└── README.md

---

 Como executar o projeto

1. Instale o PHP 8+
2. Abra o terminal na pasta do projeto
3. Execute:

```bash
php index.php

Exemplo de uso
Menu principal:
1 - Pesquisar livro
2 - Minha biblioteca
3 - Buscar livro salvo
4 - Editar livro
5 - Remover livro
6 - Estatísticas
0 - Sair

Estatísticas exibidas:

Total de livros cadastrados
Quantidade de livros lidos
Quantidade de livros não lidos
Média de páginas

Integração com API:
O sistema utiliza a API da Open Library para buscar livros automaticamente e permitir adição à biblioteca.

Armazenamento

Os dados são salvos localmente no arquivo:
livros.json

