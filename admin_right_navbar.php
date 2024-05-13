
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="postmainlink/design.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>siderbar1</title>
<style>

                body{
                    height: 100vh;
                    width: 100%;
                    background-color: #DADEDF;
                }

                .image{
                        width: 50px;
                        height: 50px;
                        object-fit: cover;
                    }

                /*----------------Barra Lateral*/
                .siderbar1{
                    position: fixed;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    width: 300px;
                    height: 100%;
                    overflow: hidden;
                    padding: 20px 15px;
                    background-color: white;
                    transition: width 0.5s ease,background-color 0.3s ease,left 0.5s ease;
                    right: 0;
            
                }

                .mini-siderbar1{
                    width: 80px;
                }
                
                /*--------------> Menu Navegación*/
                .siderbar1 .navigation{
                    height: 100%;
                    margin-top: 50px;
                    overflow-y: auto;
                    overflow-x: hidden;
                }
                .siderbar1 .navigation::-webkit-scrollbar{
                    width: 10px;
                }
                .siderbar1 .navigation::-webkit-scrollbar-thumb{
                    background-color: lightgrey;
                    border-radius: 5px;
                }
                .siderbar1 .navigation::-webkit-scrollbar-thumb:hover{
                    background-color: grey;
                }
               .siderbar1container{
                    display: flex;
                }
                .bagologo{
                    padding: 10px;
                    width: 90px;
                    height: 80px;
                }

                #updateText {
                transition: color 1s ease-in-out;
            }

            .changetext{
                font-size: 15px;
                font-weight: bold;
            }

</style>
</head>

<body>
<div class="siderbar1container">
<div class="siderbar1" >
       <nav class="navigation">
            <div class="">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card rounded">
                                 <!-- <div class="card-body" style="margin-top: 10px;  height: 185px; border:1px solid grey;">
                                 <img class="bagologo" src="includes/Bago-removebg-preview.png">
                                 <span class="changetext" id="changingText"> ANNOUNCEMENTS <span>
                                 
                                   </div> -->
                                   
                                <div class="card-body" style=" margin-top: 10px; height: 900px; border:1px solid grey;">

                                <div id="onlineUsers">

                                </div>

                                <!-- <button id="logoutButton">Logout</button> -->
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </nav>

        </div>
   </div>
</div>

<script>
    // Array of texts to cycle through
    var texts = ["ANNOUNCEMENTS", "EVENTS", "UPDATES"];
    
    // Get the element by its ID
    var changingTextElement = document.getElementById("changingText");

    // Index to track the current text
    var currentIndex = 0;

    // Function to update the text content
    function updateText() {
        changingTextElement.innerHTML = texts[currentIndex];
        currentIndex = (currentIndex + 1) % texts.length; // Loop back to the beginning
    }

    // Update the text every 4 seconds
    setInterval(updateText, 3000);
</script>

<script>
        function updateOnlineUsers() {
            $.ajax({
                url: 'admin_online.php', // Replace with the actual PHP script to fetch online users
                method: 'GET',
                success: function (data) {
                    $('#onlineUsers').html(data);
                }
            });
        }

        $('#logoutButton').on('click', function () {
            $.ajax({
                url: 'admin_offline.php', // Replace with the actual PHP script to handle logout
                method: 'GET',
                success: function () {
                    updateOnlineUsers(); // Update the online users list after logout
                }
            });
        });

        // Update online users every 5 seconds (adjust as needed)
        setInterval(updateOnlineUsers, 1000);
    </script>
</body>
</html>