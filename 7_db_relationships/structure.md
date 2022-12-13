# Library db

Tables:

- books
- copies
- conditions
- genres
- autors
- rents
- users

Relationships:

- oneToMany => books & copies
- oneToMany => copies & conditions
- manyToMany => books & genres (+ pivot table)
- oneToMany => books & autors
- oneToMany => copies & rents
- oneToMany => rents & users
- oneToOne  => users & user_details
BOOKS:

- id          | BIGINT PK AI NOTNULL UNIQUE
- autor_id    | FK BIGINT
- title       | VARCHAR(255) | NOTNULL
- price       | DECIMAL(5,2) | NULL
- cover       | VARCHAR(255) | NULL
- language    | VARCHAR(5) | NULL
- year        | YEAR | NULL
- plot        | TEXT | NULL
- vote        | FLOAT(2, 1) | DEFAULT(0)
- note        | TEXT | NULL

COPIES:

- id          | BIGINT PK AI NOTNULL UNIQUE
- book_id     | FK BIGINT
- condition_id| FK BIGINT
- isbn        | CHAR(13) | NOTNULL
- pages       | SMALLINT | NULL
- publisher  | VARCHAR(50) |NULL (NOTA = potrebbe essere una tabella?)

CONDITIONS:

- id          | BIGINT PK AI NOTNULL UNIQUE
- name        | VARCHAR(50) NOTNULL UNIQUE

GENRES:

- id    | BIGINT PK AI UN NOTNULL
- slug  | VARCHAR(30) | NOTNULL
- name  | VARCHAR(30) | NOTNULL


BOOK_GENRE (pivot)

- book_id  | FK BIGINT
- genre_id | FK BIGINT

AUTORS:

- id           | BIGINT PK AI UN NOTNULL
- fullname     | VARCHAR(255)  | NOT NULL

RENTS:

- id            | BIGINT PK AI UN NOTNULL
- copy_id       | FK BIGINT
- user_id       | FK BIGINT
- start_date    | DATETIME
- end_date      | DATETIME

USERS:

- id
- name
- lastname

USER_DETAILS:

- id
- user_id
- email
- address
- phone
