<?php
include 'db.php';

$continent = isset($_GET['continent']) ? $_GET['continent'] : '';

$sql = "SELECT * FROM destinations";
if ($continent) {
    $sql .= " WHERE continent = '$continent'";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Destinations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Explore Travel Destinations</h1>

    <form method="GET" action="">
        <label for="continent">Select Continent:</label>
        <select name="continent" id="continent">
            <option value="">All</option>
            <option value="Asia">Asia</option>
            <option value="Africa">Africa</option>
            <option value="Oceania">Oceania</option>
            <option value="Europe">Europe</option>
            <option value="North America">North America</option>
            <option value="South America">South America</option>
        </select>
        <button type="submit">Filter</button>
    </form>

    <div class="destination-list">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="destination-card">
                <h2><?php echo $row['name']; ?></h2>
                <p><?php echo $row['description']; ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
