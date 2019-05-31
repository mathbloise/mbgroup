# Avaliação MBGROUP

CRUD PHP para gerenciar as entidades Pessoa e Produto

## Getting Started

Clone o projeto e execute em seu ambiente development.

### Prerequisites

Execute o comando Sql em um banco de teste database name mbgroup, user: root, password: 123.

```
CREATE TABLE mbgroup.produto (
	id INTEGER NOT NULL,
	codigo varchar(100) NOT NULL,
	nome varchar(50) NOT NULL,
	preco_unitario DOUBLE NOT NULL,
	CONSTRAINT produto_id_un UNIQUE KEY (id),
	CONSTRAINT produto_codigo_un UNIQUE KEY (codigo),
	CONSTRAINT produto_nome_un UNIQUE KEY (nome)
)
ENGINE=InnoDB
DEFAULT CHARSET=latin1
COLLATE=latin1_swedish_ci;
```

```
CREATE TABLE mbgroup.pessoa (
	id INTEGER NOT NULL,
	nome varchar(50) NOT NULL,
	cpf varchar(11) NOT NULL,
	data_nascimento DATE NOT NULL,
	CONSTRAINT pessoa_id_un UNIQUE KEY (id),
	CONSTRAINT pessoa_nome_un UNIQUE KEY (nome),
	CONSTRAINT pessoa_cpf_un UNIQUE KEY (cpf)
)
ENGINE=InnoDB
DEFAULT CHARSET=latin1
COLLATE=latin1_swedish_ci;
```
### CONSTRAINT UNIQUE KEY

Criei as constraint para evitar complexidade, desta forma garanto validação, pois cada column id, nome e cpf
não pode ter mais de um registro com o mesmo dado, 

## Author

* **Matheus Vieira** - *CRUD MB GROUP* - [Repository](https://github.com/mathbloise/mbgroup)
