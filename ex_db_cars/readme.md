# Schema db auto usate

Modellizzare la struttura di una tabella per memorizzare tutti i dati riguardanti delle auto usate messe in vendita da un concessionario

Table name: cars

Table columns:

- id | BIGINT PK AI NOTNULL UNIQUE INDEX
- vin | VARCHAR(20) NULL UNIQUE INDEX
- model | VARCHR(60) NULL NULL INDEX
- brand | VARCHAR(60) NULL INDEX
- year | YEAR NULL
- mileage | FLOAT(8, 2)
- engine | VARCHAR(20)
- fuel_type | VARCHAR(20) INDEX
- gear | VARCHAR(10)
- color | VARCHAR(50)
- is_new | TINYINT DEFAULT(0)
- is_available | TINYINT DEFAULT(1) INDEX
- price | DECIMAL(8,2)
- doors | TINYINIT  
- seats | TINYINT
- horse_power | VARCHAR(4)
- descripions |TEXT
- owners | TINYINT
- notes | TEXT

| ID           | Vin       |  Model     | Brand  | is_available | fuel_type |
|--------------|-----------|------------|--------|--------------|-----------|
| 1            | ssdfjsdf  |    500     | fiat   | 1            | electric
| 2            | asdfsdf s |    panda   | fiat   | 1            | diesel
