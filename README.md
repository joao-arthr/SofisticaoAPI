<h1 align="center">Sofisticão</h1>


## Descrição do Projeto
<p align="center">Projeto de e-commerce para petshop</p>

## Tabela de conteúdos
<!--ts-->
   * [Sobre](#Sobre)
   * [Tabela de Conteudo](#tabela-de-conteudo)
   * [Instalação](#instalacao)
   * [Como usar](#como-usar)
      * [Pre Requisitos](#pre-requisitos)
      * [Local files](#local-files)
      * [Multiple files](#multiple-files)
   * [Tecnologias](#tecnologias)
<!--te-->


### Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
[XAMPP](https://www.apachefriends.org/pt_br/download.html) com a versão do PHP 8.1. Para a base de dados utilizaremos o [MongoDB](https://www.mongodb.com/try/download/community) versão 5.0.16.
Além disto terá que ter o editor [VSCode](https://code.visualstudio.com/) com a extensão [Live Server](https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer).

### Configurando ambiente MongoDB com PHP

- Baixe o [MongoDB Driver](https://pecl.php.net/package/mongodb/1.13.0/windows) para PHP versão 1.13
- Extraia os arquivos e coloque o arquivo php_mongodb.dll dentro da pasta C:\xampp\php\ext
- Vá até o arquivo php.ini dentro da pasta C:\xampp\php e na sessão Dynamic Extensions adicione a seguinte linha:
  ```bash
    extension=php_mongodb.dll
  ```

### 🎲 Rodando o Back End (API)

```bash
# Clone este repositório
$ git clone https://github.com/joao-arthr/SofisticaoAPI.git

#Inicie o server php na pasta public da API utilizando o endereço localhost:8000
$ php -S localhost:8000 -t SofisticaoAPI/public

# O servidor local onde está rodando a API é <http://localhost:8000>
```

