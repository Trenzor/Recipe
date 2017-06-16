<?php

    $con = mysqli_connect("localhost", "test", "test", "recipe") or die('Sorry, could not connect to server');
		$search = $_GET['searchFor'];
		$words = explode(" ", $search);
		$phrase = implode("%' AND title LIKE '%", $words);
		$query = "SELECT recipeid,title,shortdesc from recipes where title like '%$phrase%'";
		$result = mysqli_query($con, $query) or die('Could not query database at this time');

			echo "<h1>Search Results</h1><br><br>\n";

				if (mysqli_affected_rows($con) == 0)
					{
						echo "<h2>Sorry, no recipes were found with '$search' in them.</h2>";
			  } else
					{
				while($row=mysqli_fetch_array($result, MYSQL_ASSOC))
					{
				$recipeid = $row['recipeid'];
				$title = $row['title'];
				$shortdesc = $row['shortdesc'];
				echo "<a href=\"index.php?content=showrecipe&id=$recipeid\">$title</a><br>\n";
				echo "$shortdesc<br><br>\n";
					}
					}
?>