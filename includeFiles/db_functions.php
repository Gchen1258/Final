<?php
function get_posts($dbc ,$index = 0){
	if($index === 0){
	//Query for 5 most recent posts
	$query = "SELECT title, body, date_posted, name FROM posts INNER JOIN users ON posts.userid = users.userid 
		ORDER BY date_posted DESC LIMIT 0 , 5;";
	$run = mysqli_query($dbc,$query); //Used for queries with no user input
	$results = mysqli_num_rows($run); //Stores results
	echo '<table align="center">';
	echo '<col width = "250"><col width = "250"><col width = "350"><col width = "250">';
	echo '<tr><th> Title </th><th> Name </th><th> Body </th><th> Date Posted </th></tr>';
	echo '</table>';
	while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)){
		echo '<table align="center">';
		echo '<col width = "250"><col width = "250"><col width = "350"><col width = "250">';
		echo "<tr><td align=\"center\">{$row['title']}</td><td align=\"center\">{$row['name']}</td><td align=\"center\">{$row['body']}</td><td align=\"center\">{$row['date_posted']}</td></tr>";
		echo '</table><br><br>';
	}

	mysqli_close($dbc);
	}
	else{
		$i = ($index * 5) + 1;
		$j = $i + 5;
		$query = "SELECT title, body, date_posted, name FROM posts INNER JOIN users ON posts.userid = users.userid 
		ORDER BY date_posted DESC LIMIT {$i} , 5;";
		$run = mysqli_query($dbc,$query); //Used for queries with no user input
		$results = mysqli_num_rows($run); //Stores results
		echo '<table align="center">';
		echo '<col width = "250"><col width = "250"><col width = "350"><col width = "250">';
		echo '<tr><th> Title </th><th> Name </th><th> Body </th><th> Date Posted </th></tr>';
		echo '</table>';
		while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)){
			echo '<table align ="center">';
			echo '<col width = "250"><col width = "250"><col width = "350"><col width = "250">';
			echo "<tr><td align=\"center\">{$row['title']}</td><td align=\"center\">{$row['name']}</td><td align=\"center\">{$row['body']}</td><td align=\"center\">{$row['date_posted']}</td></tr>";
			echo "</table><br><br>";
		}

		mysqli_close($dbc);
	}
	
}


?>
