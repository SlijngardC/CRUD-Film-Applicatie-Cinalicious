<?php
include '../includes/db_connection.php';
$sql = "SELECT * FROM films ORDER BY title ASC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div class='row' style='display: flex; flex-wrap: wrap; justify-content: flex-start; margin-left: 80px;'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='movie-item' style='flex: 0 0 auto; margin: 10px;'>";
        echo "<form action='admin_movie.php' method='POST'>";
        echo "<div class='poster'>";
        echo "<img class='hompos' src='../../posters/" . $row['poster'] . "' height='250' width='200' />";
        echo "</div>";
        echo "<div class='details'>";
        echo "<input type='submit' name='submit' class='movie-select' value='" . ucwords($row['title']) . "' />";
        echo "</div>";
        echo "</form>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<p class='nomovv'>No movies uploaded</p>";
}
?>
