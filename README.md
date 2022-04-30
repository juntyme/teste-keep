## Sistema de Busca de Veículos via PHP / RegEx

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<br>
<img src="https://user-images.githubusercontent.com/67340099/156049947-aae697f3-a4d6-4bd9-86bf-4f0f855f4c32.png" >
<br>

Sistema de Cadastro de Discas Com Laravel / Laradock::

-   PHP ^7.4.22
-   Laravel Framework 8.83.1
-   Banco de Dados MySQL.
-   Laradock / Docker.

## Instalação

1. Copie o arquivo do GitHub na pasta que você desejar.
2. Crie um Banco de Dados MySQL com o nome de sua preferência.
3. Configure o Banco de Dados no arquivo (.env), e altere as credenciais para os dados de acesso ao BD.

<p>DB_CONNECTION=mysql<br/>
DB_HOST=mysql<br/>
DB_PORT=3306<br/>
DB_DATABASE=default<br/>
DB_USERNAME=default<br/>
DB_PASSWORD=secret<p>

## Comando para instalação do Laravel

Após a instalação execute os comandos para configurar a loja.

1. Execute um dos comandos:<br/>
   composer install<br/>
   composer update<br/>

2. Criar Tabelas no BD (Atenção execute o comando dentro do container workspace ):<br/>
   php artisan migrate<br/>

3. Criar usuário Admin (Atenção execute o comando dentro do container workspace ):<br/>
   php artisan db:seed<br/>

## Acesso ao sistema

usuario: admin@admin.com<br/>
senha: admin<br/>

## Configurando Laradock Docker

1. Clone o Laradock dentro do seu projeto PHP:<br>

git clone https://github.com/Laradock/laradock.git <br><br>

2. Entre na pasta laradock e renomeie .env.example para .env.<br>

cp .env.example .env<br><br>

3. Execute seus contêineres:<br>

docker-compose up -d nginx mysql phpmyadmin redis workspace<br><br>

4. Abra o arquivo .env do seu projeto e defina o seguinte:<br>

DB_HOST=mysql<br>
REDIS_HOST=redis<br>
QUEUE_HOST=beanstalkd<br>

## Finalização

O Sistema fora criado com o objetivo de processo seletivo empresarial, não utilizar em
ambiente de produção.
