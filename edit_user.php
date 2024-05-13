<?php
session_start();
require("dbconn.php");

if (isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['yr_section']) && isset($_POST['username']) && isset($_POST['unique_code'])) {
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $yr_section = mysqli_real_escape_string($conn, $_POST['yr_section']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $unique_code = mysqli_real_escape_string($conn, $_POST['unique_code']);

        // Check if a password is provided, and hash it if necessary
        if (!empty($_POST['password'])) {
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = "UPDATE `user` SET `fname`=?, `lname`=?, `yr_section`=?, `username`=?, `password`=?, `unique_code`=? WHERE `user_id`=?";
        } else {
            $query = "UPDATE `user` SET `fname`=?, `lname`=?, `yr_section`=?, `username`=?, `unique_code`=? WHERE `user_id`=?";
        }

        try {
            $stmt = mysqli_prepare($conn, $query);

            if ($stmt) {
                if (!empty($_POST['password'])) {
                    mysqli_stmt_bind_param($stmt, "ssssssi", $fname, $lname, $yr_section, $username, $hashed_password, $unique_code, $user_id);
                } else {
                    mysqli_stmt_bind_param($stmt, "sssssi", $fname, $lname, $yr_section, $username, $unique_code, $user_id);
                }

                if (mysqli_stmt_execute($stmt)) {
                    // User successfully updated
                    header('Location: get_all_user.php');
                    exit();
                } else {
                    // Error handling if the update fails
                    echo "Error: " . mysqli_error($conn);
                }
                mysqli_stmt_close($stmt);
            } else {
                // Error handling if the prepared statement fails
                echo "Error: " . mysqli_error($conn);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    // Fetch the user details for pre-filling the edit form
    $queryGetUser = "SELECT * FROM `user` WHERE `user_id`=?";
    $stmt = mysqli_prepare($conn, $queryGetUser);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
} else {
    // Handle case where 'user_id' parameter is missing
    echo "User ID is missing.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User - My App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="page-header">
                    <h1>Edit User</h1>
                </div>
                <form method="post" action="edit_user.php?user_id=<?php echo $user_id; ?>">
                    <!-- Form fields for editing user information (you can add more fields) -->
                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $user['fname']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $user['lname']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="yr_section">Year Section:</label>
                        <input type="text" class="form-control" id="yr_section" name="yr_section" value="<?php echo $user['yr_section']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="unique_code">Unique Code:</label>
                        <input type="password" class="form-control" id="unique_code" name="unique_code" value="<?php echo $user['unique_code']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="get_all_user.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
