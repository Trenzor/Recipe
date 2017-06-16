<?php

$recipeid = $_GET['id'];
if (!isset($_SESSION['valid_recipe_user']))
	{
	echo "<h2>Sorry, you do not have permission to post comments</h2><br>\n";
	echo "<a href=\"index.php?content=login\">Please login to post comments</a><br>\n";
	echo "<a href=\"index.php?content=showrecipe&id=$recipeid\">Go back to recipe</a>\n";
} else
	$userid = $_SESSION['valid_recipe_user'];
	echo "<form action=\"index.php\"method=\"post\">\n";
	echo "<h2>Enter your comment</h2>";
	echo "<textarea rows=\"10\" cols=\"50\" name=\"comment\"></textarea><br>\n";
	echo "<input type=\"hidden\" name=\"poster\" value=\"$userid\"><br>\n";
	echo "<input type=\"hidden\" name=\"recipeid\" value=\"$recipeid\">\n";
	echo "<input type=\"hidden\" name=\"content\" value=\"addcomment\">\n";
	echo "<br><input type=\"submit\" value=\"Submit\">\n";
	echo "</form>\n";

?>
	