<?php

$con = mysqli_connect("localhost", "test", "test", "recipe") or die('Sorry, could not connect to server');

echo "<h2 align=\"center\">The Latest Recipes</h2><br>";


$query = "SELECT count(recipeid) FROM recipes";
$result = mysqli_query($con, $query);

$row = mysqli_fetch_array($result);
if ($row[0] == 0)
{
   echo "<h3>Sorry, there are no recipes posted at this time, please try back later.</h3>";
} else
{
   $totrecords = $row[0];

   if (!isset($_GET['page']))
      $thispage = 1;
   else
      $thispage = $_GET['page'];

   $recordsperpage = 5;
   $offset = ($thispage - 1) * $recordsperpage;
   $totpages = ceil($totrecords / $recordsperpage);

   $query = "SELECT recipeid,title,poster,shortdesc from recipes order by recipeid desc limit $offset, $recordsperpage";
   $result = mysqli_query($con, $query) or die('Could not get recipies: ' . mysqli_error());

   While($row=mysqli_fetch_array($result, MYSQL_ASSOC))
   {
       $recipeid = $row['recipeid'];
       $title = $row['title'];
       $poster = $row['poster'];
       $shortdesc = $row['shortdesc'];
       echo "<a href=\"index.php?content=showrecipe&id=$recipeid\">$title</a> submitted by $poster<br>\n";
       echo"$shortdesc<br><br>\n";
   }

   if ($thispage > 1)
   {
      $page = $thispage - 1;
      $prevpage = "<a href=\"index.php?page=$page\">Prev</a>";
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
            $bar .= " <a href=\"index.php?page=$page\">$page</a> ";
         }
      }
   }

   if ($thispage < $totpages)
   {
      $page = $thispage + 1;
      $nextpage = " <a href=\"index.php?page=$page\">Next</a>";
   } else
   {
      $nextpage = " ";
   }

   if ($totpages > 1)
      echo "GoTo: " . $prevpage . $bar . $nextpage;
}
?>