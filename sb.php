<?php

$dir = 'sqlite:/Applications/AMPPS/www/SB_test.db';
$dbh  = new PDO($dir) or die("cannot open the database");
$query = "SELECT songs.song_title, songs.song_bpm, artists.artist_name ";
$query.= "FROM songs ";
$query.= "INNER JOIN artists ";
$query.= "ON songs.song_artist_id=artists.artist_id";

echo $query;

foreach ($dbh->query($query) as $row)

	{
			$table_output.= '<tr>';

			$table_output.= '<td>';
			$table_output.= $row[0];
			$table_output.= '</td>';

			$table_output.= '<td>';
			$table_output.= $row[1];
			$table_output.= '</td>';

			$table_output.= '<td>';
			$table_output.= $row[2];
			$table_output.= '</td>';


			$table_output.= '</tr>';

	} //end foreach


$htmlBody .= <<<END
	<table>
	$table_output
	</table>
END;

?>

<!doctype html>
<html>
<head>
<title>The White Bottoms Music Catalog</title>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/fixed-navigation-bar.css">
<link href='https://fonts.googleapis.com/css?family=Homemade+Apple' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>

</head>

<body>

	<section class="content">

		<form method="GET">
		<label>Photoset Title:</label>
		<input type="text" name="photoset_title" value=""><br>
		<label>Page #:</label>
		<input type="number" name="pageNumber"><br>
		<label>Ready?</label>
		<input type="checkbox" name="go" value="Y">
		<input type="submit" value="Go!" align="center">
		</form>

		<?=$htmlBody?>
	</section>


</body>
</html>

</body>
</html>