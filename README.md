# Projeto FIOCRUZ
## Instruções necessárias para rodar a aplicação

## Tecnologias usadas

* Infraestrutura: Docker
* Desenvolvimento: PHP | Laravel | Jetstream | VueJS | NodeJS | InertiaJS
* Design CSS: Tailwind CSS
* Banco de dados: MySQL

## Instruções gerais

### Infraestrutura da aplicação


_Passo 1_ 
* Instalar o Docker na sua máquina caso não tenha. Você pode fazer o download em https://docs.docker.com/docker-for-windows/install/


_Passo 2_
* Criar o arquivo .env a partir do .env.example. Na raiz do projeto, execute o comando: 
```
    cp .env.example .env
```
* Ou apenas crie um arquivo .env e cole o conteúdo do .env.example dentro dele


_Passo 3_
* Execute o comando para fazer a build da imagem: 
```
    docker-compose build --no-cache
```   
* Execute o comando para gerar/subir o container: 
```
    docker-compose up -d
```
### Instalação das dependências do projeto

_Passo 4_
* Execute os comandos para instalar as configurações do projeto, uma linha por vez:
```
docker container exec web-fiocruz composer install
```
```
docker container exec web-fiocruz php artisan migrate
```
```
docker container exec web-fiocruz npm install 
```
```
docker container exec web-fiocruz npm install laravel-mix --save-dev
```
```
docker container exec web-fiocruz npm run dev
```
## Criar o usuário admin

_Passo 5_
```
docker container exec web-fiocruz php artisan db:seed
```
* Este comando deverá criar o usuário com as seguintes credenciais:
```
    email: admin@fiocruz.br
    senha: 12345678
```
# Neste momento você pode acessar a interface a partir de http://localhost
# Para gerenciar o banco de dados, disponibilizei o PHPMyAdmin e deve estar rodando na em http://localhost:8080

