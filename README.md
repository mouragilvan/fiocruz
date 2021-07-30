# Projeto FIOCRUZ
## Instruções necessárias para rodar a aplicação

## Tecnologias usadas
```
 Infra: Docker
 Desenvolvimento: PHP | Laravel | Jetstream | VueJS | NodeJS
 Banco de dados: MySQL
```
## Instruções gerais
```
Passo 1 
Instalar o Docker na sua máquina caso não tenha. Você pode fazer o download em https://docs.docker.com/docker-for-windows/install/
```
```
Passo 2
Criar o arquivo .env a partir do .env.example: 
Na raiz do projeto, digite: cp .env.example .env
Ou crie um arquivo .env e cole o conteúdo do .env.example dentro dele
```
##### Rodar o composer no container

#### docker container exec web-fiocruz composer install

<h3>Instalar as dependências do NPM</h3>
```
docker container exec web-fiocruz  npm install laravel-mix --save-dev
```
