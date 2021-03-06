# DEV SRE Utilizando Lumen

O projeto foi desenvolvido com embasamento no documento https://gist.github.com/jameskennerly-tn/24d196ddf5318fdc3adbafa121b629ca#file-dev-sre-application

Requisitos
1. docker 
2. docker-compose

Instalação

1. Clonar o repositório.
2. Entre na pasta do repositóio
3. Suba os containers

```sh
$ git clone https://github.com/CarlosKono/devsre.git
$ cd devsre
$ cp .env.example .env
$ docker run --rm -v "$(pwd):/app" composer/composer install
$ docker-compose up
$ docker-compose exec app php artisan migrate
```

Considerações Docker

O docker-compose contem 3 imagens:

1. app onde contem a aplicação em Laravel(Lumen) 8.2.1 e PHP 7.3
2. webserver onde contem um container com nginx instalado.
3. db onde contem um container MySQL 5.7 instalado.

Na estrutura de pastas temos a pasta config onde contem os arquivos de configurações do Nginx e do PHP.

Na pasta .docker contem o DockerFile dos containers app e webserver.

Considerações Aplicação

A aplicação sobe no http://localhost:8080

Fora as rotas
 /make [POST]
 /hash/{hash} [GET]

Foi adicionado
 /list [GET] retorna todas as mensagens utilizar para validação/debug.

 
Na raiz do projeto contém um arquivo "devsre.postman_collection.json" para importar os testes via Postman.

Para realizar o teste das features.

```sh
$ docker-compose exec app php vendor/bin/phpunit
```


 

