DROP TABLE IF EXISTS movies;
CREATE TABLE movies (id INT AUTO_INCREMENT NOT NULL,
name VARCHAR(50),
picture VARCHAR(30),
description TEXT,
release_date DATE,
budget FLOAT,
revenue FLOAT,
trailer VARCHAR(30),
duration INT,
PRIMARY KEY (id)) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS actors;
CREATE TABLE actors (id INT AUTO_INCREMENT NOT NULL,
first_name VARCHAR(25) NOT NULL,
last_name VARCHAR(25) NOT NULL,
picture VARCHAR(30) NOT NULL,
popularite FLOAT NOT NULL,
nationality CHAR(2) DEFAULT NULL,
PRIMARY KEY (id)) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS genres;
CREATE TABLE genres (id INT AUTO_INCREMENT NOT NULL,
name VARCHAR(20) NOT NULL,
bg_color VARCHAR(6) NOT NULL,
fg_color VARCHAR(6) DEFAULT 'FFF',
PRIMARY KEY (id)) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS movies_actors;
CREATE TABLE movies_actors (film_id INT NOT NULL, acteur_id INT NOT NULL, PRIMARY KEY (film_id, acteur_id)) ENGINE=InnoDB;

DROP TABLE IF EXISTS movies_genres;
CREATE TABLE movies_genres (genre_id INT NOT NULL, film_id INT NOT NULL, PRIMARY KEY (genre_id, film_id)) ENGINE=InnoDB;

ALTER TABLE movies_actors ADD CONSTRAINT FK_movies_actors_film_id FOREIGN KEY (film_id) REFERENCES movies (id) ON DELETE restrict ON UPDATE restrict;
ALTER TABLE movies_actors ADD CONSTRAINT FK_movies_actors_acteur_id FOREIGN KEY (acteur_id) REFERENCES actors (id) ON DELETE restrict ON UPDATE restrict;
ALTER TABLE movies_genres ADD CONSTRAINT FK_movies_genres_film_id FOREIGN KEY (film_id) REFERENCES movies (id) ON DELETE restrict ON UPDATE restrict;
ALTER TABLE movies_genres ADD CONSTRAINT FK_movies_genres_genre_id FOREIGN KEY (genre_id) REFERENCES genres (id) ON DELETE restrict ON UPDATE restrict;
