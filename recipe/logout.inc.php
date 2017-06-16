<?php

if(isset($_SESSION['valid_recipe_user']))
{
	unset($_SESSION['valid_recipe_user']);
	echo "<h2>You are now logged out.</h2>\n";
} else 
{
	echo "<h2>Sorry, you are not currently logged in.</h2>\n";
}
?>