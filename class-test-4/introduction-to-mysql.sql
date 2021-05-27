SELECT * FROM films WHERE year="2004";

SELECT * FROM films WHERE duration >=100;

SELECT * FROM films ORDER BY duration DESC;

SELECT * FROM films WHERE title LIKE "%the%";

SELECT * FROM films WHERE title LIKE "the%";

SELECT * FROM films WHERE title LIKE "%the%" AND year != "2004";

SELECT * FROM films WHERE title LIKE "%g%" AND title NOT IN ("Mean Girls","Get Out");

SELECT * FROM films ORDER BY duration ASC LIMIT 3;

SELECT * FROM films ORDER BY year ASC OFFSET 3 LIMIT 2;

SELECT SUM(duration) AS 'Total Duration' FROM films;

SELECT DISTINCT year FROM films;

SELECT COUNT(*) AS 'Number of films' FROM films;

SELECT AVG(duration) AS 'Average Duration' FROM films;

SELECT AVG(duration) AS 'Average Duration 21st Century' 
FROM films WHERE year > 2000;

SELECT year, COUNT(year) as "Number of students"
FROM  films
GROUP BY year;

SELECT year, AVG(duration) as "Average Duration"
FROM  films
GROUP BY year
ORDER BY duration ASC;
