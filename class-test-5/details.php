<?php
$invalid = true;

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	try{
       $conn = new PDO('mysql:host=localhost;dbname=fazio', 'root', 'kudayisi');
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch (PDOException $exception) 
   {
	echo "Oh no, there was a problem" . $exception->getMessage();
   }

   //select film
   //$query = "SELECT * FROM films WHERE id={$id}";
   $query = "SELECT films.id as 'id', films.title as 'title', films.year as 'year',films.duration as 'duration',genres.name  as 'genre',certificates.name  as 'certificate' from films INNER JOIN film_genre ON films.id=film_genre.film_id INNER JOIN genres ON film_genre.genre_id=genres.id INNER JOIN certificates ON films.certificate_id=certificates.id WHERE films.id={$id}";
   $resultset = $conn->query($query);
   $films = $resultset->fetchAll();
   $conn=NULL;

   if(count($films) > 0)
   {
     $f = $films[0];
    // print_r($f);
	 
	 echo "<h2>Movie Details</h2>";
	 $t = "<table cellspacing='10'>";
	 $t .= "<tr><th>ID</th><th>Title</th><th>Year released</th><th>Duration</th><th>Genre</th><th>Rating</th></tr>";
	 $t .= "<tr><td>{$f['id']}</td><td><em>{$f['title']}</em></td><td>{$f['year']}</td><td>{$f['duration']} mins</td><td>{$f['genre']}</td><td>{$f['certificate']}</td></tr>";
	 $t .= "</table>";
	 $t .= "<br><a href='list.php'>Go back</a>";
	 echo $t;
	 $invalid = false;
   }
   
}

if($invalid)
{
	echo "<p style='color:red;'>Oops! Movie not found. <a href='list.php'>Go back</a></p>";
}
?>