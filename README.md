# biblioteca-crud
# CRUD - Utilizando PHP + MySql + Bootstrap

Readme.md


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

# Views:

. Login:

![print.tela-login](https://github.com/rodrigolluzdevr/biblioteca-crud/assets/127913307/4b2a584c-d76b-48c7-8706-bc27bf2fb392)

. Cadastro:

![print.tela-cadastro](https://github.com/rodrigolluzdevr/biblioteca-crud/assets/127913307/7beea883-125e-4c53-9285-d68d336f6028)

. Database:

![print.database](https://github.com/rodrigolluzdevr/biblioteca-crud/assets/127913307/64f6c282-703c-4ef2-b3b2-02c968d6d74d)

. Inf. :

![print.inf](https://github.com/rodrigolluzdevr/biblioteca-crud/assets/127913307/a7ad9f72-40bf-4331-a907-c5cf63448fca)

. Edit. :

![print.edit](https://github.com/rodrigolluzdevr/biblioteca-crud/assets/127913307/3bc1aaf9-4c91-46e6-92df-d159716d470a)

# Créditos: 
rodrigolluzdevr@gmail.com | https://www.linkedin.com/in/rodrigolluz/
