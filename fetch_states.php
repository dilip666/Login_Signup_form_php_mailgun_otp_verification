<?php
include 'db.php'; // Include your database connection

if (isset($_GET['country_id'])) {
    $countryId = $_GET['country_id'];

    // Query to fetch states based on the country ID
    $query = $conn->prepare("SELECT * FROM states WHERE country_id = ?"); // Assuming you have a 'states' table
    $query->bind_param("i", $countryId);
    $query->execute();
    $result = $query->get_result();

    // Output states as options
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
    }
}
?>
