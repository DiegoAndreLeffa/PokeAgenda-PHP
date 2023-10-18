# Documentação da API Pokémon

## Introdução

A API Pokémon é um serviço que permite a criação, listagem e pesquisa de informações sobre Pokémon e tipos de Pokémon. Você pode adicionar novos Pokémon, consultar a lista de Pokémon existentes, pesquisar Pokémon por tipo e gerenciar os tipos de Pokémon.

## Rotas

### Pokémons

#### Adicionar Pokémon

- **Rota:** `/api/pokemons`
- **Método:** POST
- **Descrição:** Adiciona um novo Pokémon com os atributos especificados.
- **Corpo da Requisição:**

```json
{
    "name": "Nome do Pokémon",
    "number_dex": Número da Dex,
    "previous_evolution": null ou Número da Dex da evolução anterior,
    "img": null ou URL da imagem,
    "description": "Descrição do Pokémon"
}
```

#### Listagem de Pokémons

- **Rota:** `/api/pokemons`
- **Método:** GET
- **Descrição:** Lista todos os Pokémon cadastrados na aplicação.
- **Exemplo de Resposta:**

```json
{
    {
        "id": 1,
        "name": "Bulbasaur",
        "number_dex": 1,
        "previous_evolution": null,
        "img": "001.png",
        "description": "O bulbo em suas costas está cheio de nutrientes. Nele, Bulbasaur armazena suas energias. O bulbo vai crescendo à medida que envelhece porque ele absorve os raios de sol.",
        "tipos": [
            {
                "id": 14,
                "name": "Planta"
            },
            {
                "id": 17,
                "name": "Veneno"
            }
        }
    },
    ...
}
```

#### Listagem de Pokémons

- **Rota:** `/api/pokemons`
- **Método:** GET
- **Descrição:** Lista todos os Pokémon cadastrados na aplicação.
- **Exemplo de Resposta:**

```json
{
    {
	"4": {
		"id": 4,
		"name": "Charmander",
		"number_dex": 4,
		"previous_evolution": null,
		"img": "004.png",
		"description": "A chama que possui na ponta de seu rabo mostra a força de sua vida. Se ele estiver fraco, a chama irá diminuir. Quando está saudável, a chama brilhará intensamente.",
		"created_at": null,
		"updated_at": null,
		"tipos": [
			{
				"id": 7,
				"name": "Fogo"
			}
		]
	},
    ...
}
```

### Tipos

#### Adicionar Tipos

- **Rota:** `/api/types`
- **Método:** POST
- **Descrição:** Adiciona um novo Tipo.
- **Corpo da Requisição:**

```json
{
	"name": "tipo pokemon"
}
```
#### Listagem de Tipos

- **Rota:** `/api/types`
- **Método:** GET
- **Descrição:** Lista todos os tipos cadastrados na aplicação.
- **Exemplo de Resposta:**

```json
[
	{
		"id": 1,
		"name": "Agua",
		"created_at": null,
		"updated_at": null
	},
	{
		"id": 3,
		"name": "Dragao",
		"created_at": null,
		"updated_at": null
	},
	{
		"id": 4,
		"name": "Eletrico",
		"created_at": null,
		"updated_at": null
	}, 
    ...
]
```

### Pokemon e Tipos

#### Adicionar Pokémon

- **Rota:** `/api/pokemons_types`
- **Método:** POST
- **Descrição:** Faz o link entre o pokemon e o seu tipo.
- **Corpo da Requisição:**

```json
{
	"pokemon_name": "Nome do pokemon",
	"type_name": "Tipo do pokemon"
}
```
