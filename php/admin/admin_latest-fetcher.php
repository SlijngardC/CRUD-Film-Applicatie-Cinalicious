<?php
include '../includes/db_connection.php';

// Fetch the 3 latest updated movies
$im = "SELECT * FROM films ORDER BY updated_at DESC LIMIT 3";
$records = mysqli_query($conn, $im);

if ($records && mysqli_num_rows($records) > 0) {
    echo "<div class='row' style='display: flex; flex-wrap: wrap; justify-content: flex-start; margin-left: 80px;'>";
    while ($fetchr = mysqli_fetch_assoc($records)) {
        echo "<div class='movie-item' style='flex: 0 0 auto; margin: 10px;'>";
        echo "<form action='admin_movie.php' method='POST'>";
        echo "<div class='poster'>";
        echo "<img class='hompos' src='../../posters/". $fetchr['poster']. "' height='250' width='200' />";
        echo "</div>";
        echo "<div class='details'>";
        echo "<input type='submit' name='submit' class='movie-select' value='". ucwords($fetchr['title']). "' />";
        echo "</div>";
        echo "</form>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<p class='nomovv'>No movies updated</p>";
}
?>


