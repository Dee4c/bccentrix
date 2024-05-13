<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Count Data Display</title>
    <style>
        /* Style for the badge */
        .badge {
            display: inline-block;
            padding: 0.5em 1em;
            background-color: #007bff;
            color: #fff;
            border-radius: 0.25em;
        }
    </style>
</head>
<body>
    <?php
    // Include the database connection file
    include 'dbconn.php';

    // Query to get the count
    $sql = "SELECT COUNT(*) AS count FROM gen_post where seen_check =0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data
        $row = $result->fetch_assoc();
        $count = $row["count"];

        // Display the count as a badge
        echo "<p>Count: <span class='badge'>$count</span></p>";
    } else {
        echo "0 results";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
