<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen"/>
    <script src="js/jquery-1.9.1.min.js"></script>
    <?php include('dbconn.php'); ?>

    <style>
        body {
            background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Jost', sans-serif;
        }

        .container {
            width: 300px;
            padding: 20px;
            text-align: center;
            color: white;
            background-color: #C5B951;
            position: absolute;
            top: 5;
            width: 350px;
            height: 720px;
            background: red;
            overflow: hidden;
            background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
            border-radius: 10px;
            box-shadow: 5px 20px 50px #000;
        }

        label {
            color: #fff;
            font-size: 2.3em;
            justify-content: center;
            display: flex;
            font-weight: bold;
            cursor: pointer;
            transition: .5s ease-in-out;
        }

        .background-container {
            position: absolute;
            top: 0;
            left: -340px;
            width: 100%;
            height: 100%;
        }

        .background {
            width: 100%;
            height: 100%;
            object-fit: cover;
            background-color: #573b8a;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 80%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #2941c9;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #def703e0;
        }

        .logo-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .logo {
            width: 80px;
            padding: 10px;
            height: auto;
        }

        /* Style for the Sign Up button */
        input[type="submit"][name="signup"] {
            background-color: #4CAF50; /* Default background color */
            color: white; /* Default text color */
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Hover effect */
        input[type="submit"][name="signup"]:hover {
            background-color: #45a049; /* Change background color on hover */
        }

        @media(max-width: 750px){
            .container {
            width: 500px;
            padding: 20px;
            text-align: center;
            color: white;
            background-color: #C5B951;
            position: absolute;
            top: 5;
            width: 350px;
            height: 720px;
            background: red;
            overflow: hidden;
            background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
            border-radius: 10px;
            box-shadow: 5px 20px 50px #000;
        }
        }
    </style>
</head>

<body>
<div class="container">
    <div class="logo-container">
        <img src="includes/newlogo.png" alt="Logo 1" class="logo" />
        <img src="includes/Bago-removebg-preview.png" alt="Logo 2" class="logo" />
    </div>
    <form method="POST" action="signup.php" id="signup">
        <label for="chk" aria-hidden="true">Sign up</label><br>
        <input type="text" maxlength="10" name="Id_Number" Placeholder="ID Number" required=""/>
        <input type="text" name="fname" Placeholder="First name" required=""/>
        <input type="text" name="lname" Placeholder="Last name" required=""/>
        <select name="department" id="department" required="">
            <option value="">Select Department</option>
            <option value="BSIS">BSIS</option>
            <option value="CRIM">CRIM</option>
            <option value="BSOA">BSOA</option>
            <option value="ARTS">ARTS</option>
            <option value="BSEDUC">BSEDUC</option>
        </select>
        <select name="year" id="year" required="">
            <option value="">Select Year</option>
            <option value="1st">1</option>
            <option value="2nd">2</option>
            <option value="3rd">3</option>
            <option value="4th">4</option>
        </select>
        <select name="yr_section" id="yr_section" required="">
            <option value="">Select Section</option>
        </select>
        <input type="text" name="username" Placeholder="Username" required="" />
        <input type="password" name="password" Placeholder="Password" required="" />
        <input type="password" name="unique_code" Placeholder="Unique code" required="" />
        <input type="submit" name="signup" value="Sign Up">
    </form>
    <p>Already have an account? <a href="index.php">Log In</a></p>
    </form>
    <div id="error-message" style="color: red;"></div>
    <br>
    <?php include('scripts.php');?>
</div>

<script>
        // JavaScript to handle department selection and year/section options
        document.getElementById("department").addEventListener("change", function() {
            var department = this.value;
            var yrSectionSelect = document.getElementById("yr_section");

            // Clear existing options
            yrSectionSelect.innerHTML = '<option value="">Select Section</option>';

            // Define the options based on the selected department
            var yearSectionOptions = {
                "BSIS": ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"],
                "CRIM": ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"],
                "BSOA": ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"],
                "ARTS": ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"],
                "BSEDUC": ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"]
            };

            // Populate the year/section select with options based on the selected department
            if (department in yearSectionOptions) {
                yearSectionOptions[department].forEach(function(option) {
                    var optionElement = document.createElement("option");
                    optionElement.value = option;
                    optionElement.textContent = option;
                    yrSectionSelect.appendChild(optionElement);
                });
            }
        });
    </script>
    
</body>
</html>
