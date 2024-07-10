#!/bin/bash

#!/bin/bash

# Passo 1: Verificar se Docker está instalado
if ! [ -x "$(command -v docker)" ]; then
  echo "Erro: Docker não está instalado." >&2
  exit 1
fi

if ! [ -x "$(command -v docker-compose)" ]; then
  echo "Erro: Docker Compose não está instalado." >&2
  exit 1
fi

# Passo 2: Arrumando o env para cada micro serviço
echo "Configurando arquivos .env para cada serviço..."
cd Adms
cp .env.example .env
cd ..

cd Client
cp .env.example .env
cd ..

# Passo 3: Construindo e Iniciando os Contêineres Docker
echo "Construindo e iniciando os contêineres Docker..."
cd Client 
docker-compose up --build -d
cd ../Adms
docker-compose up --build -d

# Passo 4: Instalar as dependências usando Composer
echo "Instalando dependências do projeto..."
docker-compose exec app-adms composer install
docker-compose exec app-adms php artisan key:generate
docker-compose exec app-adms php artisan migrate
docker-compose exec app-adms php artisan db:seed
docker-compose exec app-adms php artisan jwt:secret

cd ../Client
docker-compose exec app-client composer install
docker-compose exec app-client php artisan key:generate
docker-compose exec app-client php artisan migrate
docker-compose exec app-client php artisan db:seed
docker-compose exec app-client php artisan jwt:secret


# Passo 5: Criar as tabelas no banco de dados e preencher com dados padrão
echo "Migrando e populando o banco de dados..."



