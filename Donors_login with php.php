<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Group Donor Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <style>
        .form-control {
            width: 100%;
        }
		#res{
			margin-top:10px;
		}
		#log{
			margin-top:10px;
		}
    </style>
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <?php
    $message = ""; // Initialize an empty message variable

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "yogesh";
        $password = "yogesh@2005";
        $database = "login";

        $con = mysqli_connect($servername, $username, $password, $database);

        if ($con) {
            $username = $_POST["t1"];
            $Group = $_POST["t2"];
            $id = $_POST["t3"];

            // SQL to select username and password from admin table
            $sql = "SELECT Username, Bloodgroup, BloodId FROM user WHERE Username='$username' AND Bloodgroup='$Group' AND BloodId='$id'";

            $result = mysqli_query($con, $sql);
            $pattern = "/^[a-zA-Z0-9_]{4,20}$/";

            if (isset($_POST['reset'])) {
                $_POST['t1'] = "";
                $_POST['t2'] = "";
                $_POST['t3'] = "";
            } else {
                if ($result) {
                    // Query executed successfully
                    if (mysqli_num_rows($result) > 0) {
                        // Password correct, redirect
                        $message = "<div class='alert alert-primary' role='alert'>Good, Logged In!</div>";
                        echo "<script>setTimeout(function(){ window.location.href = 'donate.html'; }, 2000);</script>";
                    } else {
                    // No rows returned, username not found
                        $message = "<div class='alert alert-primary' role='alert'>Login Credentials Wrong!</div>";
                    echo "<script>setTimeout(function(){ document.querySelector('.alert').remove(); }, 5000);</script>";
            $message = "<div class='alert alert-primary' role='alert'>Please Fill Correct Information!</div>";
                   
		   echo "<script>setTimeout(function(){ document.querySelector('.alert').remove(); }, 5000);</script>";
           
                
				}
				}				
				else {
                    // Query execution failed
                    $message = "<div class='alert alert-primary' role='alert'>Error executing query: " . mysqli_error($con) . "</div>";
                }
            }
            // Close connection
            mysqli_close($con);
        } else {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    ?>
    <div class="login-container">
        <!-- Display the message above the login form -->
		<?php echo $message;?>
        <h1>Blood Group Donor Login</h1>
        <form id="login-form" method="post">
            <label for="username">Username:</label>
            <input type="text" id="in1" name="t1" class="form-control" placeholder="Enter your username" required>

			
			 <label for="password">Choose BloodGroup:</label>
			<select name="t2">
			<option name="op1" value="A-">A-</option>
			<option name="op2" value="A+">A+</option>
			<option name="op3" value="B+">B+</option>
			<option name="op4" value="B-">B-</option>
			<option name="op5" value="AB+">AB+</option>
			<option name="op6" value="AB-">AB-</option>
			<option name="op7" value="O+">O+</option>
			<option name="op8" value="O-">O-</option>
			</select>
			
            
            <label for="password">BloodId:</label>
            <div class="input-group">
                <input type="password" id="pass3" name="t3" class="form-control" placeholder="Enter your blood group" required>
                <span class="input-group-text"><input type="checkbox" onclick="toggle1()">Show Password</span>
            </div>

            <button type="submit" id="log">Login</button>
            <button type="reset" id="res" value="reset">Reset</button>
        </form>
         </div>
   <script>
        // Change the type of input to password or text
        function Toggle() {
            let temp = document.getElementById("pass1");
            
            if (temp.type === "password") {
                temp.type = "text";
            }
			else {
                temp.type = "password";
            }
			
			
        }
		
		function toggle1(){
			let tmp=document.getElementById("pass3");  
			if (tmp.type === "password") {
                tmp.type = "text";
            }
            else {
                tmp.type = "password";
            }
		}
    </script>
</body>

</html>
