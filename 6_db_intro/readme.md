# Database intro

Imparare a modellizzare un'entità della realtà.
In questo esempio, modellizziamo una tabella per memorizzare le informazioni riguardanti i libri di una biblioteca.

Table name:
books

Table Columns:

- id | BIGINT PK AI NOTNULL UNIQUE
- isbn | CHAR(13) | NOTNULL
- title | VARCHAR(255) | NOTNULL
- ?genre | VARCHAR(30) | NULL
- ?autor | VARCHAR(255)| NULL
- price | DECIMAL(5,2) | NULL
- cover | VARCHAR(255) | NULL
- pages | SMALLINT | NULL
- language | VARCHAR(5) | NULL
- year | YEAR | NULL
- plot | TEXT | NULL
- vote | FLOAT(2, 1) | DEFAULT(0)
- note | TEXT | NULL
