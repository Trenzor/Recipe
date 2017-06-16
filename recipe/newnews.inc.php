<?php
if (!isset($_SESSION['valid_recipe_user']))
{
   echo "<h2>Sorry, you do not have permission to post news</h2>\n";
   echo "<a href=\"index.php?content=login\">Please login to post news</a>\n";
} else
{
   $userid = $_SESSION['valid_recipe_user'];
	echo "<form action=\"index.php\" method=\"post\">\n";
	echo "<h2>Enter your new recipe</h2><br>\n";
	echo "Title:<input type=\"text\" size=\"40\" name=\"title\"><br>\n";
	echo "<h3>Article</h3>\n";
	echo "<textarea rows=\"10\" cols=\"50\" name=\"directions\"></textarea><br>\n";
	echo "<input type=\"submit\" value=\"Submit\">\n";
	echo "<input type=\"hidden\" name=\"content\" value=\"addnews\">\n";
	echo "</form>\n";
}
?>