<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="page-header">
                    <h1>Create User</h1>
                </div>
                <form method="post" action="save_user.php" onsubmit="return debugFormData()">
                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" class="form-control" id="fname" name="fname" required placeholder="Enter your first name">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" class="form-control" id="lname" name="lname" required placeholder="Enter your last name">
                    </div>
                    <div class="form-group">
                        <label for="yr_section">Year Section:</label>
                        <input type="text" class="form-control" id="yr_section" name="yr_section" required placeholder="Enter your year and section">
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required placeholder="Choose a username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <label for="unique_code">Unique Code:</label>
                        <input type="password" class="form-control" id="unique_code" name="unique_code" required placeholder="Enter the unique code">
                    </div>
                    <button type="submit" class="btn btn-primary">Create User</button>
                    <a href="get_all_user.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        function debugFormData() {
            alert("Debugging form data. Proceeding with form submission.");
            return true; // This allows the form to proceed with submission
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
