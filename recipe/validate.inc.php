<?php
$con = mysqli_connect("localhost", "test", "test", "recipe") or die('Could not connect to server');

$userid = $_POST['userid'];
$password = $_POST['password'];

$query = "SELECT userid from users where userid = '$userid' and password = PASSWORD('$password')";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 0)
{
    echo "<h2>Sorry, your user account was not validated.</h2><br>\n";
    echo "<a href=\"index.php?content=login\">Try again</a><br>\n";
    echo "<a href=\"index.php\">Return to Home</a>\n";
} else
{   
   $_SESSION['valid_recipe_user'] = $userid;
   echo "<h2>Your user account has been validated, you can now post recipes and comments</h2><br>\n";
   echo "<a href=\"index.php\">Return to Home</a>\n";
}
?>