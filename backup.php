<?php
include('dbconn.php'); // Include your database connection code here

// Get All Table Names From the Database
$tables = array();
$sql = "SHOW TABLES";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];
}

$sqlScript = "";
foreach ($tables as $table) {

    $query = "SHOW CREATE TABLE $table";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);

    $sqlScript .= "\n\n" . $row[1] . ";\n\n";

    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);

    $columnCount = mysqli_num_fields($result);

    // Prepare SQL script for dumping data for each table
    while ($row = mysqli_fetch_row($result)) {
        $sqlScript .= "INSERT INTO $table VALUES(";
        for ($j = 0; $j < $columnCount; $j++) {
            $row[$j] = $row[$j];

            if (isset($row[$j])) {
                $sqlScript .= '"' . $row[$j] . '"';
            } else {
                $sqlScript .= '""';
            }
            if ($j < ($columnCount - 1)) {
                $sqlScript .= ',';
            }
        }
        $sqlScript .= ");\n";
    }
    $sqlScript .= "\n";
}

// Save the SQL script to a backup file
$backupFile = 'backup_' . date('Ymd_His') . '.sql';
file_put_contents($backupFile, $sqlScript);

// Provide the backup file for download
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($backupFile) . '"');
readfile($backupFile);

// Optionally, you can delete the backup file after download
unlink($backupFile);

mysqli_close($conn);
?>
