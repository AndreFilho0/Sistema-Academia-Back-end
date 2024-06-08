# Instruções para Subir o Projeto Pessoal

O projeto pessoal utiliza Docker e Docker Compose para facilitar o setup do ambiente de desenvolvimento. Siga os passos abaixo para configurar e executar o projeto no seu PC:

## 1. Clonando o Repositório

Para começar, clone o repositório do projeto utilizando o comando `git clone`:

```bash
git clone <URL_do_repositório>


```
 # Configurando as Variáveis de Ambiente

 Após clonar o repositório, você precisa configurar as variáveis de ambiente para cada um dos micro-serviços. Isso é feito copiando os arquivos .env.example para .env.

Por exemplo, para o micro-serviço servico1, você executaria o seguinte comando na raiz do projeto:

## 2. arrumando o env para cada micro
```bash
cd servico1
cp .env.example .env

```
# Construindo e Iniciando os Contêineres Docker
Agora que as variáveis de ambiente estão configuradas, você pode construir e iniciar os contêineres Docker usando o Docker Compose. Na raiz do projeto, execute o seguinte comando:
## 3. para subir a primeira vez
```bash
docker-compose up --build

```

# Instalando as Dependências
Por fim, você precisa instalar as dependências do projeto. Isso pode ser feito utilizando o comando composer install dentro de cada contêiner do micro-serviço correspondente. Por exemplo, para instalar as dependências do servico1, execute o seguinte comando:

## 4. para criar a pasta vedor onde tem todas as dependêcias do projeto que vai ser usada 
```bash
docker-compose exec app-adms composer install
docker-compose exec app-client composer install

```
## 5. criar as tabelas no seu banco de dados e preencher depois as tabelas com os dados padrão
```
docker-compose exec app-adms php artisan migrate
docker-compose exec app-adms php artisan db:seed

docker-compose exec app-client php artisan migrate
docker-compose exec app-client php artisan db:seed

```

## 6. gerar a chave secreta usada pela JWT 

```
docker-compose exec app-client php artisan jwt:secret
docker-compose exec app-adms php artisan jwt:secret
```
