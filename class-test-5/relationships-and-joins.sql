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

SELECT certificates.name,count(films.title) as "Number of films" from films 
INNER JOIN certificates ON films.certificate_id=certificates.id 
GROUP BY name;

SELECT genres.name,count(films.title) as "Number of films" from films 
INNER JOIN film_genre ON films.id=film_genre.film_id
INNER JOIN genres ON film_genre.genre_id=genres.id
GROUP BY name;

SELECT films.title as "Movie",genres.name  as "Genre",certificates.name  as "Certificate" from films 
INNER JOIN film_genre ON films.id=film_genre.film_id
INNER JOIN genres ON film_genre.genre_id=genres.id
INNER JOIN certificates ON films.certificate_id=certificates.id 
WHERE films.id=6;

SELECT title as "Movie" from films 
INNER JOIN film_genre ON films.id=film_genre.film_id
INNER JOIN genres ON film_genre.genre_id=genres.id
WHERE genres.id=3;

SELECT certificates.name,avg(films.duration) as "Average duration" from films 
INNER JOIN certificates ON films.certificate_id=certificates.id 
GROUP BY name 
ORDER BY duration DESC;
