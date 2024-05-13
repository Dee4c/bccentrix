<?php
include("dbconn.php");
include("sidebar.php");
// include("session.php");
include 'right_navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Announcement</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="postmainlink/design.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <script src="postmainlink/bootstrap.min.js"></script> <!-- Include Bootstrap JavaScript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- Your existing CSS styles here -->
    <style>
        
                /* Your existing CSS styles here */
        body{
            background:linear-gradient(to right, #D1DFB7, #B9D9CF, #85CDFF);
            background-size: 100% 100%;
            margin: 0;
            height: 100vh;
        }
        /* Style for post content to enable word-wrap */
        .post-content {
            word-wrap: break-word;
        }

        /* Fix the width and height of the textarea and adjust the border */
        .post-textarea-modal {
            width: 350px; /* Fixed width */
            height: 120px; /* Fixed height */
            margin: 0 auto; /* Center horizontally */
            border: 2px solid #ccc; /* Border width and color */
            padding: 10px; /* Add padding inside the textarea */
            border-radius: 30px; /* Adjust border radius for an oblong shape */
        }

                /* CSS for the textarea inside the container */
        .post-textarea-container {
            width: 350px; /* Fixed width */
            height: 120px; /* Fixed height */
            margin: 0 auto; /* Center horizontally */
            margin-top: 80px;
            border: 2px solid #ccc; /* Border width and color */
            padding: 10px; /* Add padding inside the textarea */
            border-radius: 30px; /* Adjust border radius for an oblong shape */
        }

        /* Adjust width of the comment textarea */
        .comment-textarea {
            width: 35%; /* Adjust the width as needed */
            margin: 0 auto; /* Center horizontally */
            margin-top: 5px;
            border-radius: 30px; /* Adjust border radius for an oblong shape */
        }

        /* Customize the modal body */
        .modal-body {
            background-color: #f7f7f7; /* Set a background color */
        }

        /* Customize the textarea within the modal body */
        .modal-body textarea {
            width: 60%; /* Make the textarea full-width */
            height: 69px; /* Adjust the height as needed */
            resize: vertical; /* Allow vertical resizing */
            border: 2px solid #ccc; /* Add a border style and color */
            border-radius: 10px; /* Adjust border radius for rounded corners */
            padding: 10px; /* Add padding inside the textarea */
        }

        /* Center the buttons within the container */
        .button-container {
            text-align: right; /* Center the buttons horizontally */
            width: 50px; height: 50px;
        }

        /* Center the comment button within the container */
        .comment-button-container {
            text-align: right; /* Center the button horizontally */
            object-fit:cover; 
            float:right; 
            margin-top: 9px; 
            margin-right:90px;
        }

        #sendButton{
           font-size: 15px;
           color: #FFFFFF ;
           transition: color 0.3s ease;
           background-color: lightgrey; /* Initial color of the button */
           padding: 7px;
           border-color: #FFFFFF;
           cursor: pointer;
           border-radius: 10%;
        }

         #sendButton:hover{
           font-size: 15px;
           color: #DFE667 ;
           border-color: lightgrey;
           border-radius: 10%; 
        }

        .panel-body.post-content {
            border: 1px solid #ccc; /* Add a border style and color */
            padding: 10px; /* Add some padding for spacing */
        }

        .comment {
            border: 1px solid #ccc; /* Add a border style and color */
            padding: 10px; /* Add some padding for spacing */
            margin-top: 10px; /* Add margin to separate it from other comments */
            margin-left: 50px;
            margin-right: 50px;
            background:linear-gradient(to right, #e5e5e5, #DADEDF);
        }

        /* Style images within the post content */
        .panel-body.post-content img {
            max-width: 100%; /* Ensure images don't exceed the width of their container */
            height: auto; /* Maintain the aspect ratio of images */
            display: block; /* Remove any inline spacing */
            margin: 10px auto; /* Center images horizontally with margin */
        }

        .custom-panel {
            width: 40%; /* Adjust the width as needed */
            margin: 0 auto; /* Center the panel horizontally */
            border: 2px solid #ddd; /* Add a border style and color */
            border-radius: 10px; /* Adjust border radius for rounded corners */
            padding: 10px; /* Add padding for spacing */
            margin-bottom: 20px; /* Add margin between panels */
            background-color: #f9f9f9; /* Set a background color */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        }

        .custom-panel .panel-heading {
            background-color: #ddd; /* Set a background color for the heading */
            padding: 10px; /* Add padding for heading */
            border-top-left-radius: 8px; /* Adjust border radius for rounded top corners */
            border-top-right-radius: 8px;
        }

        .custom-panel .panel-body {
            padding: 15px; /* Add padding for content */
        }

        .custom-panel .comment {
            border: 1px solid #ccc; /* Add a border style and color for comments */
            padding: 10px; /* Add padding for comments */
            margin-top: 10px; /* Add margin to separate comments */
            background-color: #f7f7f7; /* Set a background color for comments */
            border-radius: 8px; /* Adjust border radius for rounded comment boxes */
        }

        /* Style for the dropdown button */
        .dropdown-menu {
            min-width: 100px;
        }

        /* Style the Create Post button and dropdown menu */
        .panel-heading .btn-group {
            left: 275px; /* Adjust the right distance as needed */
            
        }

        .panel-heading .btn-group .dropdown-menu {
            right: auto; /* Align the dropdown menu to the right */
            margin-top: 32px;
        }

                /* CSS to style the heart button in pink or red when the user has reacted */
        .btn-pink {
            background-color: pink; /* You can adjust the color to your preference */
            color: white; /* Text color for the button when it's pink */
            border-color: pink; /* Border color for the button when it's pink */
        }

        /* CSS to style the heart icon's color */
        .btn-pink .fas.fa-heart {
            color: red; /* Color for the heart icon when the button is pink */
        }

        .whats-the-update-conatiner {
            color: red; /* Color for the heart icon when the button is pink */
        }

        .icon{
            width: 30px;
            height: 30px;
            margin-left: 35%;
        }

                .upload{
                    display: flex;
                    align-items: center;
                    text-decoration: none;
                    border-radius: 10px;
                    color: grey;
                    cursor: pointer;
        
                }
                 .upload:hover{
                    background: lightgrey;
                    color: black;
                
                }

                .main-panelpost{
                    height:130px; margin-top: 80px; 
                    margin-left:30%; width:40%; 
                    border: 2px solid lightgrey; 
                    border-radius:10px; 
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                }
                .main-footerpost{
                    height:42px;
                }
                .mainphoto-icon{
                    width: 30px;
                    height: 30px;
                    margin-left: 40%
                }
                .maintext-comment{
                    height: 40%; width:80%; 
                    margin-left:70px; margin-right: 30px; 
                    margin-top:15px;  border-radius:25px;
                }

                .maincomment-btn{
                    position:absolute; 
                    margin-left: 480px;
                }
                .mainpost-image{
                    max-height: 500px; 
                    max-width: 500px;
                }
                
                @media(max-width: 750px){

                    .main-panelpost{
                    height:100px; margin-top: 80px; 
                    margin-left:0; width:100%; 
                    border: 2px solid lightgrey; 
                    border-radius:10px; 
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                    margin-bottom: 20px;
                    background-color: rgba(183, 192, 206, 0.2);
                    
                  }

                  .main-rowpost{
                    width: 100%; /* Adjust the width as needed */
                    margin: 0 auto; /* Center the panel horizontally */
                    border: 2px solid #ddd; /* Add a border style and color */
                    border-radius: 10px; /* Adjust border radius for rounded corners */
                    padding: 10px; /* Add padding for spacing */
                    margin-bottom: 20px; /* Add margin between panels */
                  }

                  .comment-button-container {
                    text-align: right; /* Center the button horizontally */
                    object-fit:cover; 
                    float:right; 
                    margin-top: 9px; 
                    margin-right:40px;
                }

                .comment-textarea {
                    width: 50%; /* Adjust the width as needed */
                    margin: 0 auto; /* Center horizontally */
                    margin-top: 5px;
                    border-radius: 25px; /* Adjust border radius for an oblong shape */
                }
                .main-footerpost span{
                    display: none;
                }
                .main-footerpost{
                    position: relative;
                    width: 50px;
                    bottom: 55px;
                    margin-left: 85%;
                }
                .maintext-comment{
                    width:70%; 
                }
                .maincomment-btn{
                    position:absolute; 
                    margin-left: 260px;
                }
                .mainpost-image{
                    max-height: 300px; 
                    max-width: 200px;
                }
                .comment {
                    font-size: 11px;
                }
            }

    </style>
</head>
<body>
          <!-- Modify the Create Post modal to include an image upload input -->
<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalLabel">Create Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="post.php" onsubmit="return validatePostContent()" enctype="multipart/form-data">
                    <div class="form-group">
                        <textarea class="form-control post-textarea-modal" name="post_content" id="post_content_modal" placeholder="What's the update?"></textarea>
                    </div>
                    <!-- Add an input field for image uploads -->
                    <div class="form-group">
                        <label for="post_image">Upload Image (Optional):</label>
                        <input type="file" class="form-control-file" name="post_image" id="post_image">
                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn btn-success" name="post">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalLabel">Create Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="post.php" onsubmit="return validatePostContent()" enctype="multipart/form-data">
                    <div class="form-group">
                        <textarea class="form-control post-textarea-modal" name="post_content" id="post_content_modal" placeholder="What's the update?"></textarea>
                    </div>
                    <!-- Add an input field for image uploads -->
                    <div class="form-group">
                        <label for="post_image">Upload Image (Optional):</label>
                        <input type="file" class="form-control-file" name="post_image" id="post_image">
                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn btn-success" name="post">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="panel main-panelpost" style=" ">
<div id="whats-on-your-mind-container">
    <div class="form-group">
    <img class="img-circle" style="position: absolute; width: 40px; height: 40px; object-fit:cover; margin-left:20px; margin-top: 5px; margin-right: 20px; float:left;" src= "<?php echo $_SESSION['profile_picture'] ?>" alt="User Image">
        <textarea class="form-control maintext-comment" style="" name="post_content" id="post_content_whats_on_your_mind" placeholder="What's the update?"></textarea>
        </div>
    </div>
      <div class="main-footerpost" style="">
    <div  data-toggle="modal" data-target="#uploadModal" class="upload" style=" display: flex; align-items: center; text-decoration: none; border-radius: 10px;">
      <img  class="mainphoto-icon" src="uploads/photos.png" > 
      <span>photos</span>
    </div>
</div> 

</div>


    <script>
        document.getElementById("whats-on-your-mind-container").onclick = function () {
            $("#postModal").modal("show");
        };
        
        $(document).ready(function () {
        // Initialize Bootstrap components here
        $('[data-toggle="dropdown"]').dropdown(); // Initialize dropdowns
        // Add any other initializations as needed
    });
    </script>

<?php
// Fetch posts and their comments
$sql = "SELECT post.*, concat(user.fname,' ',user.lname) as name,user.image_path  FROM post 
        LEFT JOIN user ON post.user_id = user.user_id
        ORDER BY date_created DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $post_id = $row['post_id'];
        $post_content = $row['content'];
        $name = $row['name'];
        $date_created = $row['date_created'];
        $imagePath = $row['image_path'];

         // Inside the while loop where you display posts
         echo '<div class="panel panel-default custom-panel main-rowpost">';
         echo '<div class="panel-heading">';
         echo '<div class="row">';
         echo '<div class="col-xs-6">';
         echo '<img class="img-circle" style="width: 40px; height: 40px; object-fit:cover; float:left;" src="'.$imagePath.'" alt="User Image">';
         echo '<div style="font-weight: bold">' . $row['name'] . '</div>';
         echo '<div style=" font-size: 11px; margin-left: 40px">'; 
         echo date("M d,Y h:i a",strtotime($row['date_created']));
         echo '</div>';
         echo '</div>';
         echo '<div class="col-xs-6 text-right">';
        
        // Inside the while loop where you display posts
        if ($user_id == $row['user_id']) {
            // Only display the dropdown button if the current user is the post owner
            echo '<div class="dropdown">';
            echo '<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
            echo '<i class="fas fa-ellipsis-v"></i>';
            echo '</button>';
            echo '<ul class="dropdown-menu dropdown-menu-right">';
                    
            // Add options for actions like edit and delete here
            echo '<li><a href="#" class="edit-post" data-postid="' . $post_id . '" data-postcontent="' . htmlspecialchars($post_content) . '"><i class="fas fa-edit"></i> Edit</a></li>';
            echo '<li><a href="delete_post.php?post_id=' . $post_id . '" onclick="return confirm(\'Are you sure you want to delete this post?\')"><i class="fas fa-trash"></i> Delete</a></li>';

            // Add more options as needed
            echo '</ul>';
            echo '</div>';
        }        
        echo '</div>'; // Close the right-aligned column
        echo '</div>'; // Close the row
        echo '</div>'; // Close the panel-heading

        echo '<div class="panel-body post-content">' . $post_content;

        // Check if there is an image associated with the post
        if (!empty($row['image'])) {
            // Construct the full image path
            $imagePath = $row['image'];
            
            // Display the image using an <img> tag with max-height and max-width
            echo '<img clas="mainpost-image" src="' . $imagePath . '" alt="Image" style="">'; // Adjust max-height and max-width as needed
        }
        
        $user_has_reacted = false; // Initialize as false
        if (isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];

            // Check if the user has reacted to this post
            $check_sql = "SELECT COUNT(*) FROM reaction_logs WHERE post_id = ? AND user_id = ?";
            $check_stmt = $conn->prepare($check_sql);
            $check_stmt->bind_param("ii", $post_id, $user_id);
            $check_stmt->execute();
            $check_stmt->bind_result($existing_reactions);
            $check_stmt->fetch();
            $check_stmt->close();

            if ($existing_reactions > 0) {
                $user_has_reacted = true; // User has reacted
            }
        }

        // mainerate the heart button HTML with the appropriate CSS class
        // mainerate the heart button HTML with the appropriate CSS class
        echo '<div class="panel-footer">';
        echo '<div class="d-flex justify-content-between align-items-center">'; // Flexbox container

        if ($user_has_reacted) {
            // User has reacted, so display the button in pink with a red heart icon
            echo '<button class="btn btn-pink reaction-button" data-postid="' . $post_id . '"><i class="fas fa-heart" style="color: red;"></i> <span class="reaction-counter">0</span></button>';
        } else {
            // User has not reacted, display the button in the default style (white)
            echo '<button class="btn btn-default reaction-button" data-postid="' . $post_id . '"><i class="fas fa-heart" style="color: pink;"></i> <span class="reaction-counter">0</span></button>';
        }

        // Add the comment counter code here
        $comment_count_sql = "SELECT COUNT(*) FROM comment WHERE post_id = ?";
        $comment_count_stmt = $conn->prepare($comment_count_sql);
        $comment_count_stmt->bind_param("i", $post_id);
        $comment_count_stmt->execute();
        $comment_count_stmt->bind_result($comment_count);
        $comment_count_stmt->fetch();
        $comment_count_stmt->close();

        echo '<div class="comment-counter" style="float:right; margin-top: 10px;">Comments: ' . $comment_count . '</div>'; // Use ml-auto for right alignment

        echo '</div>'; // Close the flexbox container
        echo '</div>';
        echo '</div>'; // Close the custom-panel


        // Fetch and display comments for this post
        $comments_sql = "SELECT comment.*, concat(user.fname,' ',user.lname) as name,user.image_path FROM comment
        LEFT JOIN user ON comment.user_id = user.user_id
        WHERE comment.post_id = $post_id
        ORDER BY date_posted ASC";
        $comments_result = $conn->query($comments_sql);

         // Add a form for adding comments to this post

        echo '<form method="post" action="comment.php">';
        echo '<input type="hidden" name="post_id" value="' . $post_id . '">'; // Add the hidden field here
        echo '<div class="comment-button-container" style="">';
        echo '<button type="submit" class="fas fa-paper-plane" name="comment"  style=" height: 35px;" id="sendButton" ></button>';
        echo '</div>';
        echo '<img class="img-circle" style="width: 40px; height: 40px; object-fit:cover; margin-left:45px; margin-top: 5px; float:left;" src= "'. $_SESSION['profile_picture'] .'" alt="User Image">';
        echo '<div class="form-group">';
        echo '<textarea class="form-control comment-textarea" name="comment_content" placeholder="Add a comment" id="textInput" oninput="checkInput()" ></textarea>';
        echo '</div>';
        echo '</form>';

        if ($comments_result->num_rows > 0) {
            echo '<div class="comments-container">'; // Container for comments
            while ($comment_row = $comments_result->fetch_assoc()) {
                // Display each comment here
                $comment_id = $comment_row['comment_id']; // Assuming you have a unique comment_id
                $comment_user_id = $comment_row['user_id']; // Get the user_id of the comment owner
                $image_Path = $comment_row['image_path'];// Get the profile of the user

                echo '<img class="img-circle" style="width: 40px; height: 40px; object-fit:cover; float:left; margin-top:10px;" src="'.$image_Path.'" alt="User Image">';
                echo '<div class="comment">';
                echo '<div style=" display: flex; align-items: center;">';
                echo '<div style="font-weight: bold; ">' . $comment_row['name'] .'</div>';
                echo '<div style="font-size: 13px; margin-left: 3px;">' . " - ".  date("M d,Y h:i a",strtotime($comment_row['date_posted']))  . '</div>';
            
                // Check if the current user is the owner of the comment
                if ($user_id == $comment_user_id) {
                    // Add a unique identifier to the modal (e.g., comment-edit-modal-commentID)
                    $modalId = "comment-edit-modal-" . $comment_id;
                    
                    ?>
                    <div class="dropdown maincomment-btn" style="">
                    <button class="btn btn-default dropdown-toggle " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <!-- Add data-target attribute to target the correct modal -->
                            <li><a href="#" class="edit-comment" data-toggle="modal" data-target="#<?php echo $modalId; ?>"><i class="fas fa-edit"></i> Edit</a></li>
                            <li><a href="delete_comment.php?comment_id=<?php echo $comment_id; ?>" onclick="return confirm('Are you sure you want to delete this comment?')"><i class="fas fa-trash"></i> Delete</a></li>
                        </ul>
                    </div>
                
                    <!-- Edit Comment Modal for this comment -->
                    <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="editCommentModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editCommentModalLabel">Edit Comment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <!-- Add this HTML form to your page -->
                                    <form method="post" action="edit_comment.php">
                                        <input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>">
                                        <div class="form-group">
                                            <textarea class="form-control" name="edited_comment_content" id="edited_comment_content"><?php echo $comment_row['content']; ?></textarea>
                                        </div>
                                        <div class="text-center"> <!-- Center-align the button -->
                                            <button type="submit" class="btn btn-primary" name="edit_comment">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } // End if user is comment owner
            
                echo '</div>';
                echo '<p style="margin-top: 10px; margin-left: 5px;">' . $comment_row['content'] .'</p>';
                echo '</div>';
            }
            
            echo '</div>'; // Close the comments container
        }

        echo '</div>'; // Close the custom-panel 
    }
}
?>

<!-- Edit Post Modal -->
<div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="editPostModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPostModalLabel">Edit Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="edit_post.php" id="editPostForm">
                    <div class="form-group">
                        <textarea class="form-control" name="edited_post_content" id="edited_post_content" placeholder="Edit your post"></textarea>
                    </div>
                    <div class="text-center"> <!-- Center-align the button -->
                        <input type="hidden" name="edited_post_id" id="edited_post_id">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Add a hidden input field to store the edited post content -->
<input type="hidden" id="editedPostContent" name="editedPostContent">

<script>

     // Function to fetch and update reaction count for a post
     function updateReactionCount(postId) {
        $.ajax({
            type: "GET",
            url: "fetch_reaction_count.php",
            data: {
                post_id: postId
            },
            success: function (response) {
                var counterElement = $(`[data-postid="${postId}"] .reaction-counter`);
                counterElement.text(response);
            },
            error: function () {
                console.error("Error fetching reaction count.");
            }
        });
    }

    $(document).ready(function () {
        // Initialize Bootstrap components here
        $('[data-toggle="dropdown"]').dropdown(); // Initialize dropdowns
        // Add any other initializations as need
    $(document).ready(function () {
    // Initialize Bootstrap components here
    $('[data-toggle="dropdown"]').dropdown(); // Initialize dropdowns
    // Add any other initializations as needed

    // Handle edit post click
    $(".edit-post").click(function () {
        var postId = $(this).data("postid");
        var postContent = $(this).data("postcontent");

        // Populate the modal with post content and post ID
        $("#edited_post_content").val(postContent);
        $("#edited_post_id").val(postId);

        // Store the edited post content in a hidden field
        $("#editedPostContent").val(postContent);

        // Show the edit post modal
        $("#editPostModal").modal("show");
    });

    // Handle form submission
    $("#editPostForm").submit(function (e) {
        e.preventDefault();

        // Get the edited content from the textarea
        var editedContent = $("#edited_post_content").val();

        // Update the hidden field with the edited content
        $("#editedPostContent").val(editedContent);

        // Submit the form to edit_post.php
        this.submit();
    });

    // Handle edit comment click
    $(".edit-comment").click(function () {
        var commentId = $(this).data("commentid");
        var commentContent = $(this).data("commentcontent");

        // Populate the modal with comment content and comment ID
        $("#edited_comment_content").val(commentContent);
        $("#edited_comment_id").val(commentId);

        // Show the edit comment modal
        $("#editCommentModal").modal("show");
    });

    // Handle form submission (similar to edit_post.js)
    $("#editCommentForm").submit(function (e) {
        e.preventDefault();

        // Get the edited content from the textarea
        var editedContent = $("#edited_comment_content").val();

        // Update the hidden field with the edited content
        $("#editedCommentContent").val(editedContent);

        // Submit the form to edit_comment.php
        this.submit();
    });
});

   // Handle reaction button click
   $(".reaction-button").click(function () {
        var postId = $(this).data("postid");
        var counterElement = $(this).find(".reaction-counter");

        // Simulate updating the counter immediately (before the AJAX request)
        var currentCount = parseInt(counterElement.text());
        var newCount = currentCount + 1;
        counterElement.text(newCount);

        // Send an AJAX request to record the reaction in your database
        $.ajax({
            type: "POST",
            url: "record_reaction.php",
            data: {
                post_id: postId,
                reaction_type: "heart"
            },
            success: function (response) {
                console.log("Response from server: " + response); // Log the response
                // Handle the response (e.g., display a success message)
                console.log("Reaction recorded successfully.");
                // Update the reaction count for the current post
                updateReactionCount(postId);
            },
            error: function () {
                // Handle errors (e.g., display an error message)
                console.error("Error recording reaction.");
            }
        });
    });

    // Fetch and update reaction counts for all posts when the page loads
    $(".reaction-button").each(function () {
        var postId = $(this).data("postid");
        updateReactionCount(postId);
    });
});

</script>

<!-- // Fetch and update reaction counts for all posts when the page loads -->
<script>
    function checkInput() {
      var inputText = document.getElementById('textInput').value;
      var sendButton = document.getElementById('sendButton');

      if (inputText.trim() !== '') {
        sendButton.style.backgroundColor = '#86dc3d'; /* Change color if input has text */
        sendButton.disabled = false;    
      } else {
        sendButton.style.backgroundColor = 'lightgrey'; /* Revert to initial color if input is empty */
        sendButton.disabled = true;
      }
    }
  </script>

</body>
</html>
