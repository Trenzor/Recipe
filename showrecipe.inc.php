<?php
$con = mysqli_connect("localhost", "test", "test", "recipe") or die('Could not connect to server ');

$recipeid = $_GET['id'];
$query = "SELECT title,poster,shortdesc,ingredients,directions from recipes where recipeid = $recipeid";
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
echo "by $poster <br><br>\n";
echo $shortdesc . "<br><br>\n";
echo "<h3>Ingredients:</h3>\n";
echo $ingredients . "<br><br>\n";
echo "<h3>Directions:</h3>\n";
echo $directions . "\n";
echo "<br><br>\n";
$query = "SELECT count(commentid) from comments where recipeid = $recipeid";
$result = mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
if ($row[0] == 0)
{
   echo "No comments posted yet.<br><br>\n";
   echo "<a href=\"index.php?content=newcomment&id=$recipeid\">Add a comment</a><br><br>\n";
   echo "   <a href=\"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n";
   echo "<hr>\n";
} else
{
   $totrecords = $row[0];
   echo $row[0] . "\n";
   echo " comments posted.<br><br> \n";
   echo "<a href=\"index.php?content=newcomment&id=$recipeid\">Add a comment</a><br><br>\n";
   echo "   <a href=\"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n";
   echo "<hr>\n";
   echo "<h2>Comments:</h2>\n";
   if (!isset($_GET['page']))
      $thispage = 1;
   else
      $thispage = $_GET['page'];

   $recordsperpage = 5;
   $offset = ($thispage - 1) * $recordsperpage;
   $totpages = ceil($totrecords / $recordsperpage);
   $query = "SELECT date,poster,comment from comments where recipeid = $recipeid order by commentid desc limit $offset,$recordsperpage";
   $result = mysqli_query($con, $query) or die('Could not retrieve comments: ' . mysqli_error());
   while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
   {
       $date = $row['date'];
       $poster = $row['poster'];
       $comment = $row['comment'];
       $comment = nl2br($comment);
       echo $date . " - posted by " . $poster . "\n";
       echo "<br>\n";
       echo $comment . "\n";
       echo "<br><br>\n";
   }
   if ($thispage > 1)
   {
      $page = $thispage - 1;
      $prevpage = "<a href=\"index.php?content=showrecipe&id=$recipeid&page=$page\">Prev</a>";
   } else
   {
      $prevpage = " ";
   }

   $bar = '';
   if ($totpages > 1)
   {
      for($page = 1; $page <= $totpages; $page++)
      {
         if ($page == $thispage)     
         {
            $bar .= " $page ";
         } else
         {
            $bar .= " <a href=\"index.php?content=showrecipe&id=$recipeid&page=$page\">$page</a> ";
         }
      }
   }
   if ($thispage < $totpages)
   {
      $page = $thispage + 1;
      $nextpage = " <a href=\"index.php?content=showrecipe&id=$recipeid&page=$page\">Next</a>";
   } else
   {
      $nextpage = " ";
   }
 
  echo "GoTo: " . $prevpage . $bar . $nextpage;
}
?>