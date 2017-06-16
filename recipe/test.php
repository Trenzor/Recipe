<html>

<head>

<title>This is my dynamic Web page</title>

</head>

<body>

<h1>Data records stored in the recipe database</h1>

<?php

$con = mysqli_connect("localhost", "test", "test", "recipe");

$query = "SELECT title, poster, shortdesc FROM recipes";

$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))

{

   $title = $row['title'];

   $poster = $row['poster'];

   $shortdesc = $row['shortdesc'];

   echo "<b>Title:</b>$title<br>\n";

   echo "<b>posted by:</b>$poster<br>\n";

   echo "$shortdesc<br><br>\n";

}

?>

</body>

</html>