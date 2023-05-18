# biblioteca-crud
# CRUD - Utilizando PHP + MySql + Bootstrap

Readme.md

![print.tela-login](https://github.com/rodrigolluzdevr/biblioteca-crud/assets/127913307/4b2a584c-d76b-48c7-8706-bc27bf2fb392)


```sql
- Criar a tabela no Mysql Workbanch:

create table usuario(
    cod integer primary key AUTO_INCREMENT,
    autor varchar(200) not null,
    livro varchar(300) not null,
)```


- Configurar o arquivo conexao.php com o banco de dados Mysql:

``` php
<?php

$host = "localhost";
$user = "root";
$pass = "*****";
$dbname = "crud";

//Conexão com a porta
$coon = new PDO("mysql:host=$host;dbname=".$dbname, $user, $pass);
```
##
# Créditos: Rodrigo Luz
#rodrigolluzdevr@gmail.com
#https://www.linkedin.com/in/rodrigolluz/
