<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="print.css" />
<title>The Recipe Center</title>
</head>
<body>
<?php

$con = mysqli_connect("localhost", "test", "test", "recipe") or die('Sorry, could not connect to server');

$recipeid = $_GET['id'];

$query = "SELECT title,poster,shortdesc,ingredients,directions FROM recipes WHERE recipeid = $recipeid";
$result = mysqli_query($con, $query) or die('Could not find recipe');
$row = mysqli_fetch_array($result, MYSQL_ASSOC) or die('No records retrieved');

$title = $row['title'];
$poster = $row['poster'];
$shortdesc = $row['shortdesc'];
$ingredients = $row['ingredients'];
$directions = $row['directions'];

$ingredients = nl2br($ingredients);
$directions = nl2br($directions);

	echo "<h2>$title</h2>\n";
	echo "posted by $poster <br>\n";
	echo $shortdesc . "\n";
	echo "<h3>Ingredients:</h3>\n";
	echo $ingredients . "<br>\n";
	echo "<h3>Directions:</h3>\n";
	echo $directions . "\n";
	
	

$query = "SELECT count(commentid) FROM comments WHERE recipeid = $recipeid";
$result = mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
if ($row[0] == 0)
{
   echo "<hr>\n";
} else
{
   echo $row[0] . "\n";
   echo "&nbsp;comments posted.&nbsp;&nbsp;\n";
      echo "<hr>\n";
   echo "<h2>Comments:</h2>\n";

   $query = "SELECT date,poster,comment FROM comments WHERE recipeid = $recipeid order by commentid desc";

   $result = mysqli_query($con, $query) or die('Could not retrieve comments');
   while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
   {
       $date = $row['date'];
       $poster = $row['poster'];
       $comment = $row['comment'];
       $comment = nl2br($comment);

       echo "$date  - posted by  $poster<br>\n";
       echo "$comment\n";
       echo "<br><br>\n";
   }
}	
?>
</body>
</html>