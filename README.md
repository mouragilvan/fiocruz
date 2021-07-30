# Projeto FIOCRUZ
## Instruções necessárias para rodar a aplicação

## Tecnologias usadas
```
 Infra: Docker
 Desenvolvimento: PHP | Laravel | Jetstream | VueJS | NodeJS | InertiaJS
 Design CSS: Tailwind CSS
 Banco de dados: MySQL
```
## Instruções gerais
```
Passo 1 
Instalar o Docker na sua máquina caso não tenha. 
Você pode fazer o download em https://docs.docker.com/docker-for-windows/install/
```
```
Passo 2
Criar o arquivo .env a partir do .env.example: 
Na raiz do projeto, digite: cp .env.example .env
Ou crie um arquivo .env e cole o conteúdo do .env.example dentro dele
```

```
Passo 3
Execute o comando para fazer a build da imagem: 

   docker-compose build --no-cache
   
Execute o comando para gerar/subir o container: 

   docker-compose up -d
```
## Instalar as dependências do projeto
```
Passo 4
Execute os comandos para instalar as configurações do projeto, uma linha por vez:

docker container exec web-fiocruz composer install
docker container exec web-fiocruz php artisan migrate
docker container exec web-fiocruz npm install 
docker container exec web-fiocruz npm install laravel-mix --save-dev
```
## Criar o usuário admin
```
Passo 5
docker container exec web-fiocruz php artisan db:seed

Este comando deverá criar o usuário com as seguintes credenciais:

    email: admin@fiocruz.br
    senha: 12345678
```



