# Configurar o ambiente local

## Pré Requisitos 🚀

- Docker
- Git

## Como subir o ambiente local ⚙️

1. Executar o comando para clonar o repositório do frontend.

```bash
git clone https://github.com/matheus85/oportunidades-front.git
```

2. Dentro da pasta criada para o projeto executar o docker-compose.
```bash
docker-compose up -d --build
```

3. No arquivo de ambiente .env na raiz do projeto é necessário trocar o ip na variável API_HOST para o endereço do seu docker.

4. Acessar.
```
http://localhost:81
```
