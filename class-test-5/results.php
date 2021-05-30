<?php
$invalid = true;

if(isset($_GET['search']) && !empty($_GET['search']))
{
	$q = $_GET['search'];
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
   $q2 = "%{$q}%";
   $query = "SELECT DISTINCT films.id as 'id', films.title as 'title' from films INNER JOIN film_genre ON films.id=film_genre.film_id INNER JOIN genres ON film_genre.genre_id=genres.id INNER JOIN certificates ON films.certificate_id=certificates.id WHERE films.title LIKE '{$q2}' OR genres.name LIKE '{$q2}' OR certificates.name LIKE '{$q2}'";
   $resultset = $conn->query($query);
   $films = $resultset->fetchAll();
   $conn=NULL;
   $filmCount = count($films);
   $text = $filmCount == 1 ? "result" : "results";
   echo "<h2>{$filmCount} {$text} found for: <em>{$q}</em></h2>";
   
   if(count($films) > 0)
   {
	
     foreach($films as $f)
     {
        $dl = "details.php?id={$f['id']}";
        echo "<p><a href='{$dl}'>{$f['title']}</a></p>";
     }
	  echo "<hr><p><a href='search.php'>New search</a></p>";
	 $invalid = false;
   }
}

if($invalid)
{
	echo "<p style='color:red;'>Oops! We couldn't find the movie you were looking for. <a href='search.php'>Try again</a></p>";
}

?>