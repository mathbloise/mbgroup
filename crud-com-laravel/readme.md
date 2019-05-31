# Avaliação MBGROUP usando o framework Laravel

CRUD PHP MVC, Model-View-Controller para gerenciar as entidades Pessoa e Produto

## Getting Started

Clone o projeto em seu ambiente development.

### Prerequisites

database name: mbgroup, user: root, password: 123.

* Instalar o Composer (para o gerenciamento de dependências do PHP)
* Inicializar o Servidor Apache

## Migration

### Execute o Artisan command:

* php artisan migrate
* php artisan serve (para subir o app)

```
### CONSTRAINT UNIQUE KEY

Criei as constraint para evitar complexidade, desta forma garanto validação, pois cada column id, nome e cpf
não pode ter mais de um registro com o mesmo dado.

## Author

* **Matheus Vieira** - *CRUD MB GROUP* - [Repository](https://github.com/mathbloise/mbgroup)
