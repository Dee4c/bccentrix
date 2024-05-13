<?php
    include("grouppage.php");

    // Get the user ID from the session
    $userId = $_SESSION['id'];

    $userName = $_SESSION['user_name'];

    // Assuming you have the user ID and group ID in the URL parameters
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $groupId = $_GET['id'];

        // Connect to your MySQL database
        $connection = mysqli_connect("localhost", "root", "", "prac");

        if ($connection === false) {
            die("Error: Could not connect to the database. " . mysqli_connect_error());
        }

        // Retrieve the group name based on the group_id
        $groupQuery = "SELECT group_name FROM groups WHERE id = ?";
        if ($stmt = mysqli_prepare($connection, $groupQuery)) {
            mysqli_stmt_bind_param($stmt, "i", $groupId);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_bind_result($stmt, $groupName);
                mysqli_stmt_fetch($stmt);
                mysqli_stmt_close($stmt);
            } else {
                echo "Error executing the group query: " . mysqli_error($connection);
            }
        } else {
            echo "Error preparing the group statement: " . mysqli_error($connection);
        }

        mysqli_close($connection);
    }

    // Handle message submission
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
        $message = $_POST['message'];
        $timestamp = date('Y-m-d H:i:s');

        // Use the user_id from the session
        $userId = $user_id;

        // Connect to your MySQL database
        $connection = mysqli_connect("localhost", "root", "", "prac");

        if ($connection === false) {
            die("Error: Could not connect to the database. " . mysqli_connect_error());
        }

        // Insert the message into the database
        $insertQuery = "INSERT INTO group_chat_messages (group_id, user_id, message, timestamp) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($connection, $insertQuery)) {
            mysqli_stmt_bind_param($stmt, "iiss", $groupId, $userId, $message, $timestamp);
            if (mysqli_stmt_execute($stmt)) {
                // Message inserted successfully
                // You can handle success here
            } else {
                echo "Error executing the insert query: " . mysqli_error($connection);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing the insert statement: " . mysqli_error($connection);
        }

        mysqli_close($connection);
    }
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Joined Group</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="postmainlink/design.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background:linear-gradient(to left, #D1DFB7, #B9D9CF, #85CDFF);background-color: #f5f5f5;
            text-align: center;
        }

        /* Remove the overflow-y from the container */
        .gc-container {
            width: 80%; /* Increased the width for better alignment */
            /* margin: 0 auto; */
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background:linear-gradient( #38AECC, #B9D9CF,  #022F40);
            margin-top: 8px;
            margin-left: 290px;
        }

        .group-title-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        h1 {
            color: #333;
            margin: 0;
        }

        .toggle-members-button {
            background-color: transparent;
            border: none;
            font-size: 24px;
            cursor: pointer;
            margin-right: 10px;
        }

        /* Flex container for chat box and user list */
        .content-container {
            display: flex;
        }

        .chat-box {
            flex: 1;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            height: 600px;
        }

        .chat-message {
            background-color: #3498db;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
            margin: 5px;
            word-wrap: break-word; /* Add word-wrap to break long words */
        }

        .chat-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-top: 270px;
        }

        .send-button {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .chat-messages {
            height: 250px;
            overflow-y: scroll;
            padding: 10px;
        }

        .chat-message {
            padding: 5px 10px;
            border-radius: 5px;
            margin: 5px;
            max-width: 70%; /* Adjust as needed */
        }

        .sent-message {
            background-color: #3498db;
            color: #fff;
            float: right; /* Change float to right */
            clear: both;
        }

        .received-message {
            background-color: #e1e1e1;
            color: #333;
            float: left;
            clear: both;
        }

        /* Adjust the chat input */
        .chat-input {
            width: 30%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px; /* Increase border-radius for a rounder look */
            outline: none; /* Remove the default input outline */
        }

        .send-button {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 20px; /* Increase border-radius for a rounder look */
            cursor: pointer;
            outline: none; /* Remove the default button outline */
        }

        /* Hover effect for the send button */
        .send-button:hover {
            background-color: #2980b9;
        }

        /* User List Styling */
        .user-list {
            flex: 1;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 200px;
            height: 330px;
            overflow-y: scroll;
        }

        .member {
            margin: 5px 0;
        }

        /* Hidden class to hide the user list */
        .hidden {
            display: none;
        }

        .user-name {
            font-weight: bold; 
            margin-right: 5px;
        }

        /* Style for the indicator */
        .indicator {
            background-color: #4CAF50;
            color: #fff;
            padding: 2px 5px;
            border-radius: 3px;
            margin-right: 5px;
        }

            /* Additional styles for message options */
        .message-wrapper {
            display: flex;
            align-items: flex-start;
            margin-bottom: 10px; /* Adjust the distance between the message and options */
        }

        .message-options {
            display: inline-block;
            position: relative;
            margin-left: 5px; /* Adjust the distance between the message and options */
        }

        .options-btn {
            background-color: #3498db;
            color: #fff;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        .options-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            top: 100%; /* Position content below the options button */
            right: 0; /* Align the options content with the right edge of the options button */
        }

        .options-content.active {
            display: block;
        }


        .options-content button {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            width: 100%; /* Ensure button takes full width */
        }

        .options-content button:hover {
            background-color: #ddd;
        }

        .message-options:hover .options-content {
            display: block;
        }

        .message-options:hover .options-btn {
            background-color: #2980b9;
        }
        @media(max-width: 750px){
            .gc-container {
            width: 100%; 
            /* margin: 0 auto; */
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 90px;
            margin-left:0px;
        }
        .chat-box {
            flex: 1;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            height: 500px;
        }
        .chat-input {
            width: 80%;
            padding: 10px;
            margin-top: 175px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .send-button {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
       

      

        }
    </style>
</head>
<body>
    <div class="gc-container">
        <?php if (isset($groupName)): ?>
            <div class="group-title-container">
                <h1><?php echo $groupName; ?></h1>
                <button class="toggle-members-button" onclick="toggleMemberList()">⋮</button>
            </div>
        <?php else: ?>
            <h1>Group Name Not Found</h1>
        <?php endif; ?>

        <div class="content-container">
            <div class="chat-box">
                <div id="chat-messages" class="chat-messages"></div>
                <input type="text" id="chat-input" class="chat-input" placeholder="Type your message here">
                <button id="send-button" class="send-button">Send</button>
            </div>

            <!-- User List Container to the right -->
            <div class="user-list hidden">
                <h2>Group Members:</h2>
                <?php
                    // Modify your PHP code to retrieve and display members in alphabetical order
                    $connection = mysqli_connect("localhost", "root", "", "prac");
                    $selectMembersQuery = "SELECT name FROM group_members WHERE group_id = ? ORDER BY name ASC"; // Added "ORDER BY name ASC"
                    if ($stmt = mysqli_prepare($connection, $selectMembersQuery)) {
                        mysqli_stmt_bind_param($stmt, "i", $groupId);
                        if (mysqli_stmt_execute($stmt)) {
                            $result = mysqli_stmt_get_result($stmt);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="member">' . $row['name'] . '</div>';
                            }
                        } else {
                            echo "Error executing the select members query: " . mysqli_error($connection);
                        }
                        mysqli_stmt_close($stmt);
                    } else {
                        echo "Error preparing the select members statement: " . mysqli_error($connection);
                    }

                    mysqli_close($connection);
                ?>
            </div>
        </div>
    </div>

    <!-- JavaScript for sending and retrieving chat messages -->
    <script>
   // Function to display chat messages
function displayChatMessage(message, isSentByMe) {
    const chatMessages = document.getElementById("chat-messages");
    const messageClass = isSentByMe ? "sent-message" : "received-message";

    const messageContainer = document.createElement('div');
    messageContainer.className = `chat-message ${messageClass}`;

    const senderName = isSentByMe ? 'Me' : message.user_name;
    const messageText = `<span class="user-name">${senderName}</span> ${message.message}`;

    messageContainer.innerHTML = messageText;

    // If the message is sent by the current user, add a message options dropdown
    if (isSentByMe) {
        const optionsContainer = document.createElement('div');
        optionsContainer.className = 'message-options';

        const optionsIcon = document.createElement('button');
        optionsIcon.innerHTML = '⋮'; // Vertical ellipsis character
        optionsIcon.className = 'options-btn';

        const optionsContent = document.createElement('div');
        optionsContent.className = 'options-content';

        const editButton = document.createElement('button');
        editButton.innerHTML = 'Edit Message';
        editButton.onclick = function () {
            // Get the existing message text
            const existingMessageText = messageText;

            // Prompt the user to enter the new message
            const newMessage = prompt('Edit your message:');

            // Check if the user entered a new message and it's different from the existing one
            if (newMessage !== null && newMessage !== existingMessageText) {
                // Implement the edit functionality here
                const messageId = message.message_id;
                editMessage(messageId, newMessage);
            }
        };

        const deleteButton = document.createElement('button');
        deleteButton.innerHTML = 'Delete Message';
        deleteButton.onclick = function () {
            const messageId = message.message_id;
            deleteMessage(messageId);
        };

        optionsContent.appendChild(editButton);
        optionsContent.appendChild(deleteButton);

        optionsContainer.appendChild(optionsIcon);
        optionsContainer.appendChild(optionsContent);

        // Add click event listener to the options button
        optionsIcon.addEventListener('click', function () {
            handleOptionsButtonClick(optionsContent);
        });

        messageContainer.appendChild(optionsContainer);
    }

    chatMessages.appendChild(messageContainer);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

// Function to handle click on options button
function handleOptionsButtonClick(optionsContent) {
    optionsContent.classList.toggle('active');
}




    // Declare the groupId variable here
    const groupId = <?php echo $groupId; ?>;
    const userId = <?php echo json_encode($userId); ?>;

      // Function to send a message to the server
function sendMessage(message) {
    const timestamp = new Date().toISOString();

    // Prepare the data to send
    const data = new URLSearchParams();
    data.append('groupId', groupId);
    data.append('userId', userId);
    data.append('message', message);
    data.append('timestamp', timestamp);

    // Make an AJAX request to send the message to the server
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "sent_chat_message.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (xhr.status == 200) {
            // Message sent successfully, you can handle success here if needed
            console.log(xhr.responseText); // For debugging
            // Clear the input field
            document.getElementById("chat-input").value = "";
            // Retrieve and display chat messages after sending
            retrieveAndDisplayChatMessages();
        } else {
            console.error("Error sending message:", xhr.status, xhr.responseText);
        }
    };
    xhr.send(data);
}

   // Function to retrieve and display chat messages
function retrieveAndDisplayChatMessages() {
    const chatMessages = document.getElementById("chat-messages");

    // Make an AJAX request to retrieve chat messages
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `get_chat_messages.php?group_id=${groupId}`, true);
    xhr.onload = function () {
        if (xhr.status == 200) {
            try {
                chatMessages.innerHTML = ''; // Clear existing messages
                const messages = JSON.parse(xhr.responseText);

                // Loop through the messages and display them
                messages.forEach((message) => {
                    const isSentByMe = message.sentByMe;
                    const messageText = `<span class="user-name">${isSentByMe ? "" : ""}:</span> ${message.message}`;
                    const messageId = message.message_id; // Get the message_id
                    displayChatMessage({ message: messageText, user_name: message.user_name, message_id: messageId }, isSentByMe);
                });
            } catch (error) {
                console.error("Error parsing JSON response:", error);
            }
        } else {
            console.error("Error retrieving chat messages:", xhr.status, xhr.responseText);
        }
    };
    xhr.send();


}

window.onload = () => {
        retrieveAndDisplayChatMessages();

        setInterval(()=>{
            retrieveAndDisplayChatMessages();
        }, 1000);
        
     }


// Function to edit a message
function editMessage(messageId, newMessage) {
    // Implement the edit functionality here
    // You can use AJAX to send the edited message to the server
    const data = new URLSearchParams();
    data.append('messageId', messageId);
    data.append('newMessage', newMessage);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "edit_chat_message.php", true); // Create an edit_chat_message.php file for handling edits
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (xhr.status == 200) {
            // Message edited successfully, you can handle success here if needed
            console.log(xhr.responseText); // For debugging
            // Retrieve and display chat messages after editing
            retrieveAndDisplayChatMessages();
        } else {
            console.error("Error editing message:", xhr.status, xhr.responseText);
        }
    };
    xhr.send(data);
}



// Function to delete a message
function deleteMessage(messageId) {
    // Implement the delete functionality here
    // You can use AJAX to send the delete request to the server
    const data = new URLSearchParams();
    data.append('messageId', messageId);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "delete_chat_message.php", true); // Create a delete_chat_message.php file for handling deletions
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (xhr.status == 200) {
            // Message deleted successfully, you can handle success here if needed
            console.log(xhr.responseText); // For debugging
            // Retrieve and display chat messages after deletion
            retrieveAndDisplayChatMessages();
        } else {
            console.error("Error deleting message:", xhr.status, xhr.responseText);
        }
    };
    xhr.send(data);
}

    // Event listener for sending messages
    document.getElementById("send-button").addEventListener("click", function () {
        const inputElement = document.getElementById("chat-input");
        const message = inputElement.value;
        if (message) {
            displayChatMessage({ message, user_name: "Me" }, true); // Display the sent message
            sendMessage(message); // Send the message to the server
        }
    });



    // Call the function to retrieve and display chat messages when the page loads
    retrieveAndDisplayChatMessages();
    
</script>

<script>
    // Show a popup message
    window.onload = function () {
        var popupMessage = document.createElement('div');
        popupMessage.innerHTML = 'Welcome back to the GroupChat!';
        popupMessage.style.position = 'fixed';
        popupMessage.style.top = '100px';
        popupMessage.style.left = '50%';
        popupMessage.style.transform = 'translateX(-50%)';
        popupMessage.style.backgroundColor = '#3498db';
        popupMessage.style.color = '#fff';
        popupMessage.style.padding = '10px';
        popupMessage.style.borderRadius = '5px';
        popupMessage.style.zIndex = '9999';
        popupMessage.style.display = 'block';
        popupMessage.style.textAlign = 'center';
        document.body.appendChild(popupMessage);

        // Close the popup when the user clicks "OK"
        popupMessage.onclick = function () {
            this.style.display = 'none';
        };  

        // Automatically close the popup after a certain time (e.g., 5 seconds)
        setTimeout(function () {
            popupMessage.style.display = 'none';
        }, 2000);
    };
</script>

</body>
</html>
