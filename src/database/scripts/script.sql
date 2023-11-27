-- Recreates the database
DROP SCHEMA IF EXISTS openrecipydb;
CREATE SCHEMA openrecipydb;

CREATE TABLE openrecipydb.user (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(80) NOT NULL,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE openrecipydb.recipy (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  author_id INTEGER NOT NULL,
  name VARCHAR(80) NOT NULL,
  time INTEGER NOT NULL,
  text TEXT NOT NULL,
  CONSTRAINT fk_recipy_user FOREIGN KEY (author_id) REFERENCES openrecipydb.user (id)
);

CREATE TABLE openrecipydb.ingredient (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL
);

CREATE TABLE openrecipydb.recipy_ingredient (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  recipy_id INTEGER NOT NULL,
  ingredient_id INTEGER NOT NULL,
  CONSTRAINT fk_recipy_ingredient_recipy FOREIGN KEY (recipy_id) REFERENCES openrecipydb.recipy (id),
  CONSTRAINT fk_recipy_ingredient_ingredient FOREIGN KEY (ingredient_id) REFERENCES openrecipydb.ingredient (id)
);