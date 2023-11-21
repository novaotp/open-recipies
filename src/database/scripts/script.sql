-- Recreates the database
CREATE TABLE user (
  id SERIAL NOT NULL PRIMARY KEY,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(80) NOT NULL,
  password VARCHAR NOT NULL
);

CREATE TABLE recipy (
  id SERIAL NOT NULL PRIMARY KEY,
  author_id INTEGER NOT NULL,
  name VARCHAR(80) NOT NULL,
  time INTEGER NOT NULL,
  text VARCHAR NOT NULL,
  CONSTRAINT fk_recipy_user FOREIGN KEY (author_id) REFERENCES user (id)
);

CREATE TABLE ingredient (
  id SERIAL NOT NULL PRIMARY KEY,
  name VARCHAR(50) NOT NULL
);

CREATE TABLE recipy_ingredient (
  id SERIAL NOT NULL PRIMARY KEY,
  recipy_id INTEGER NOT NULL,
  ingredient_id INTEGER NOT NULL,
  CONSTRAINT fk_recipy_ingredient_recipy FOREIGN KEY (recipy_id) REFERENCES recipy (id),
  CONSTRAINT fk_recipy_ingredient_ingredient FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)
);