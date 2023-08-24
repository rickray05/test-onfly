# Teste Onfly (CRUD Despesas)

Esse é um projeto de uma API com um CRUD simples de despesas utilizando PHP (Framework Laravel 10)

## 🚀 Começando

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

### 📋 Pré-requisitos

```
composer
```

### 🔧 Instalação

Para iniciar o projeto basta executar os seguintes comandos

Configure uma instancia de banco de dados no arquivo .env:

```
DB_CONNECTION=mysql
DB_HOST={seu host}
DB_PORT=3306
DB_DATABASE={database}
DB_USERNAME={usuario}
DB_PASSWORD={senha}
```

Instale os pacotes:

```
composer install
```

Execute o comando:

```
php artisan migrate
```

E por fim rode o Seed para gerar os usuários de teste na base:

```
php artisan db:seed
```

Após feito isso, podemos perceber que na tabela users do banco temos alguns usuários cadastrados, para o teste da nossa API, use o usuário a seguir:

```
email: test@example.com
senha: 123456
```

Execute o comando para subir o servidor do laravel

```
php artisan serve
```
Apartir dai temos nossos endpoints pronots pra teste

```
http://127.0.0.1:8000/api/login
http://127.0.0.1:8000/api/expense/create
http://127.0.0.1:8000/api/expense/list
http://127.0.0.1:8000/api/expense/list/{idExpense}
http://127.0.0.1:8000/api/expense/update/{idExpense}
http://127.0.0.1:8000/api/expense/delete/{idExpense}
```

## ⚙️ Executando os testes

Para executar os testes unitários basta rodar o comando.

```
./vendor/bin/phpunit
```

### 🛠️ Login

Rota responavél por executar o login na nossa API

**Endpoint**: /api/login

**METHOD**: POST

**Body**: 
```
{
	"email": "test@example.com",
	"password": 123456
}
```


**Response**:
```
{
	"token": "16|laravel_sanctum_V12K3Ci4rRyl0k6QRKxI478GNxQTDy5JWUfedTGP2e6a7167"
}
```
### 🛠️ Create

Rota responavél criar uma despesa

**Endpoint**: /api/expense/create

**METHOD**: POST

**Autenticação**: BearerToken

**Body**: 
```
{
	"description": "asdkfjasçlkfjalskdfjalksdjfklasdjfnlçasjkdflkcanjsdkfçnajslçkdfjnvalksdjfnlaksjdnfvlkçasjndflkjavnf",
	"date_expense": "2023-08-23 01:02:35",
	"value": 12.50
}
```

*Obs:* A descrição pode ter até 191 caracteres, e a data não pode ser maior que a data atual.


**Response**:
```
{
	"status": "success",
	"message": "User created with success."
}
```

### 🛠️ Update

Rota responavél editar uma despesa

**Endpoint**: /api/expense/create/{idExpense}

**METHOD**: PUT

**Autenticação**: BearerToken

**Body**: 
```
{
	"description": "asdkfjasçlkfjalskdfjalksdjfklasdjfnlçasjkdflkcanjsdkfçnajslçkdfjnvalksdjfnlaksjdnfvlkçasjndflkjavnf",
	"date_expense": "2023-08-23 01:02:35",
	"value": 12.50
}
```

*Obs:* A descrição pode ter até 191 caracteres, e a data não pode ser maior que a data atual.


**Response**:
```
{
	"status": "success",
	"message": "User updated with success."
}
```

### 🛠️ Delete

Rota responavél deletar uma despesa

**Endpoint**: /api/expense/create/{idExpense}

**METHOD**: DELETE

**Autenticação**: BearerToken

**Body**: 
```
no body
```

**Response**:
```
{
	"status": "success",
	"message": "User deleted with success."
}
```

### 🛠️ Listar

Rota responavél por listar todas as despesas do usuário

**Endpoint**: /api/expense/list

**METHOD**: GET

**Autenticação**: BearerToken

**Body**: 
```
no body
```

**Response**:
```
{
	"status": "success",
	"message": Success.",
	"data": [
		{
			"description": "Teste Carlos 1",
			"date": "2023-08-23 01:02:35",
			"value": "12.50"
		}
	]
}
```

### 🛠️ Listar por Despesas

Rota responavél por listar por uma despesa específica do usuário

**Endpoint**: /api/expense/list/{idExpense}

**METHOD**: GET

**Autenticação**: BearerToken

**Body**: 
```
no body
```

**Response**:
```
{
	"status": "success",
	"message": Success.",
	"data": [
		{
			"description": "Teste Carlos 1",
			"date": "2023-08-23 01:02:35",
			"value": "12.50"
		}
	]
}
```

## ✒️ Autores

Carlos Henrique de Oliveira
---