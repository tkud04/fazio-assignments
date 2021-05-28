SELECT title from films WHERE certificate_id != 1;

SELECT title from films WHERE certificate_id != 1 AND duration < 100;

SELECT films.title, genres.name from films CROSS JOIN genres;

SELECT name from genres 
INNER JOIN film_genre ON genres.id=film_genre.genre_id 
INNER JOIN films ON film_genre.film_id=films.id 
WHERE films.id=4;

SELECT title from films
INNER JOIN film_genre ON films.id=film_genre.film_id
INNER JOIN genres ON film_genre.genre_id=genres.id
WHERE genres.id=3;

SELECT title from films
INNER JOIN film_genre ON films.id=film_genre.film_id
INNER JOIN genres ON film_genre.genre_id=genres.id
WHERE genres.id=2 OR genres.id=5;

