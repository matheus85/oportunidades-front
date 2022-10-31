# Configurar o ambiente local

## Pré Requisitos 🚀

- Docker
- Git

## Como subir o ambiente local ⚙️

```bash
git clone https://github.com/matheus85/oportunidades-front.git
```

```bash
cd oportunidades-front
```

```bash
docker-compose up -d --build
```

```bash
docker-compose exec app composer install
```

```bash
docker-compose exec app cp .env.example .env
```

```bash
docker-compose exec app php artisan key:generate
```

*** Caso apresente erro de permissão rodar o comando abaixo
```bash
docker-compose exec app chmod 777 -R /var/www
```

Alterar a variável API_HOST para o ip da api que deve apontar para a rede do seu docker

# Para acessar
http://localhost:81

Existem 2 vendedores cadastrados para teste que são executados no seed. \
vendedor1@teste.com - 123456 \
vendedor2@teste.com - 123456
