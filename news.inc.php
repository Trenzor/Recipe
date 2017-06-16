<h3>What's Cookin'</h3>
<br>The latest cooking news<br>
<?php

$con = mysqli_connect("localhost", "test", "test", "recipe") or die('Could not connect to server');

$query = "SELECT title,date,article from news order by id desc limit 0,2";
$result = mysqli_query($con,$query) or die('Sorry, could not get news articles');

while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $date = $row['date'];
    $title = $row['title'];
    $article = $row['article'];
    echo "<br>$date - <b>$title</b><br>$article<br><br>";
}

?>
