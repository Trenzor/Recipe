<?php
$title = $_POST['title'];
$article = htmlspecialchars($_POST['directions']);
$date = date("Y-m-d");

	$con = mysqli_connect("localhost", "test", "test", "recipe") or die('Could not connect to server');
	$query = "INSERT INTO news (title, date, article)".
			" VALUES ('$title','$date', '$article')";
	$result = mysqli_query($con, $query);
		if ($result)
			echo "<h2>News posted</h2>\n";
		else
			echo "<h2>Sorry, there was a problem posting your news</h2>\n";
?>