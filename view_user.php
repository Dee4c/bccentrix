<!DOCTYPE html>
<?php
require("dbconn.php");

// Get the user ID from the URL parameter
if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];

    // Query to fetch user details and profile picture based on user_id
    $queryGetUser = "SELECT u.*, p.image_path 
                     FROM `user` AS u 
                     LEFT JOIN `user` AS p 
                     ON u.user_id = p.user_id 
                     WHERE u.user_id = $userId";

    try {
        $result = mysqli_query($conn, $queryGetUser);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
        } else {
            echo "User not found.";
            exit; // Exit to prevent further execution
        }
    } catch (\Throwable $th) {
        echo $th->getMessage(); // Display the error message
    }
} else {
    echo "User ID not provided.";
    exit; // Exit to prevent further execution
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <title>User Details</title>
</head>

<body>
   
<section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-12 col-xl-4">
                    <div class="card" style="border-radius: 15px;">
                        <div class="back" style="margin: 10px 10px;">
                            <a href='get_all_user.php'>back</a>
                        </div>
                        <div class="card-body text-center">
                            <div class="mt-3 mb-4">
                                <img src='<?php echo $user['image_path'] ?? "profile.png"; ?>' class="rounded-circle" style="width: 200px;" />
                            </div>
                            <h4 class="mb-2"><?php echo $user['fname'] ?></h4>
                            <p class="text-muted mb-1">ID: <?php echo $user['user_id'] ?></p>
                            <p class="text-muted mb-1">Year Section: <?php echo $user['yr_section'] ?></p>
                            <p class="text-muted mb-4">Username: <?php echo $user['username'] ?></p>
                            <!-- Add more user details as needed -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<!-- Include Bootstrap JS if needed -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

</html>
