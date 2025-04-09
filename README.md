# Projeto PHP Puro com FastRoute

Este é um projeto simples em PHP usando a biblioteca FastRoute para roteamento.

Você pode hospedá-lo em um servidor docker, o arquivo Dockerfile está configurado.

Ou você pode rodar ele localmente para testar. Segue tutorial:

## ✅ Requisitos

- PHP 7.4 ou superior
- Composer

## 🚀 Instalação

1. Clone o repositório:

```bash
git clone https://github.com/seu-usuario/seu-projeto.git
cd seu-projeto
```

2. Instale as dependências:

```bash
composer install
```

3. Inicie o servidor local:

```bash
php -S localhost:8000 -t public
```

4. Acesse no navegador:

[http://localhost:8000](http://localhost:8000)

---

## 📂 Estrutura do Projeto

```
.
├── public/             # Pasta pública, ponto de entrada do servidor
├── api/                # Endpoints e controladores
├── lib/                # Bibliotecas auxiliares
├── data/               # Simulação de banco de dados (JSON, SQLite etc)
├── composer.json
└── index.php           # Arquivo inicial de bootstrap
```

---

## 📦 Dependências

- [FastRoute](https://github.com/nikic/FastRoute)

---

## 🛠️ Em desenvolvimento...

Esse projeto está em fase inicial e serve como base para desafios técnicos ou protótipos rápidos com PHP puro.

## ✍🏼 Author

Matheus Amorim

[Github](https://github.com/Amorimm101)