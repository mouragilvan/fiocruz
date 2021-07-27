<h1>Projeto FIOCRUZ</h1>
<h2>Instruções necessárias para rodar a aplicação</h2>

<h3>Rodar o composer no container</h3>
```
docker container exec web-fiocruz composer install
```
<h3>Instalar as dependências do NPM</h3>
```
docker container exec web-fiocruz  npm install laravel-mix --save-dev
```
