-- Recreates the database
CREATE TABLE public.user (
  id SERIAL NOT NULL PRIMARY KEY,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(80) NOT NULL,
  password VARCHAR NOT NULL
);

CREATE TABLE public.recipy (
  id SERIAL NOT NULL PRIMARY KEY,
  author_id INTEGER NOT NULL,
  name VARCHAR(80) NOT NULL,
  time INTEGER NOT NULL,
  text VARCHAR NOT NULL,
  CONSTRAINT fk_recipy_user FOREIGN KEY (author_id) REFERENCES public.user (id)
);

CREATE TABLE public.ingredient (
  id SERIAL NOT NULL PRIMARY KEY,
  name VARCHAR(50) NOT NULL
);

CREATE TABLE public.recipy_ingredient (
  id SERIAL NOT NULL PRIMARY KEY,
  recipy_id INTEGER NOT NULL,
  ingredient_id INTEGER NOT NULL,
  CONSTRAINT fk_recipy_ingredient_recipy FOREIGN KEY (recipy_id) REFERENCES public.recipy (id),
  CONSTRAINT fk_recipy_ingredient_ingredient FOREIGN KEY (ingredient_id) REFERENCES public.ingredient (id)
);