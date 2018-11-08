<p align="center">
    <h1 align="center">Desafio 21</h1>
    <br>
</p>


INSTALAÇÃO
------------
Após clonar o projeto<br>

Baixar as bibliotecas necessárias para a aplicação<br>
composer install

[Criar estrutura de banco de dados (migration)]<br>
Criar um database chamado p21 e rodar o comando abaixo.<br>
php yii migrate/up


[Importa a base do XLSX] <br>
php yii importador/importa-base


[Atualiza a base usando o XML enviado pelo CNJ]<br>
php yii importador/atualiza-base

[Envia Email (deixei apenas a estrutura pronta)]<br>
php yii importador/envia-email

[Aonde encontrar a lógica]<br>
commands/ImportadorController.php

[Acessar a index do sistema para ter acesso ao CRUD]


CONFIGURAÇÃO
-------------
Toda a configuração do banco de dados fica no arquivo<br>
config/db.php