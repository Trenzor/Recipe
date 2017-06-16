<?php
$title = $_POST['title'];
$poster = $_POST['poster'];
$shortdesc = $_POST['shortdesc'];
$ingredients = htmlspecialchars($_POST['ingredients']);
$directions = htmlspecialchars($_POST['directions']);
	if (trim($poster) == "")
		{
		echo "<h2>Sorry, each recipe must have a poster</h2>\n";
		}else
		{
			$con = mysqli_connect("localhost", "test", "test", "recipe") or die('Could not connect to server');
			$query = "INSERT INTO recipes (title, shortdesc, poster, ingredients, directions) " .
          " VALUES ('$title', '$shortdesc', '$poster', '$ingredients', '$directions')";
    $result = mysqli_query($con, $query) or die('Sorry, we could not post your recipe to the database at this time');
    if ($result)
       echo "<h2>Recipe posted</h2>\n";
    else
       echo "<h2>Sorry, there was a problem posting your recipe</h2>\n";
}
?>



	


          
