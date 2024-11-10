<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Flag variable to track validation status
    $isValid = true;

    $servername = "localhost";
    $username = "yogesh";
    $password = "yogesh@2005";
    $database = "login";
 
    $con = mysqli_connect($servername, $username, $password, $database);

    if (!$con) {
        die("error" . mysqli_connect_error());
    }

       $mobile="";
	   $adhar="";
    // Validating each form field
    $username = mysqli_real_escape_string($con, $_POST["t1"]);
    $mobile = mysqli_real_escape_string($con, $_POST["t2"]);
    $dob = mysqli_real_escape_string($con, $_POST["t3"]);
    $adhar = mysqli_real_escape_string($con, $_POST["t4"]);
    $add = mysqli_real_escape_string($con, $_POST["t5"]);
    $per = mysqli_real_escape_string($con, $_POST["t6"]);
    $donorid = mysqli_real_escape_string($con, $_POST["t7"]);
    //$gender = mysqli_real_escape_string($con, $_POST["t8"]);
	// Validating radio button input
$gender = isset($_POST["t8"]) ? mysqli_real_escape_string($con, $_POST["t8"]) : "";

    $country = mysqli_real_escape_string($con, $_POST["t9"]);
    $state = mysqli_real_escape_string($con, $_POST["t10"]);
    $doblast = mysqli_real_escape_string($con, $_POST["t11"]);
    $bloodgroup = mysqli_real_escape_string($con, $_POST["t12"]);
    $weight = mysqli_real_escape_string($con, $_POST["t13"]);


    // Validating each field and setting error messages
    if (empty($_POST["t1"]) || empty($_POST["t2"]) || empty($_POST["t3"]) || empty($_POST["t4"]) || empty($_POST["t5"]) || empty($_POST["t6"]) || empty($_POST["t7"]) || empty($_POST["t8"]) || empty($_POST["t9"]) || empty($_POST["t10"]) || empty($_POST["t11"]) || empty($_POST["t12"]) || empty($_POST["t13"])) {
        $isValid = false;
        $message = "<center><div class='alert alert-danger' role='alert'>All fields are required!</div></center>";
     echo "<script>setTimeout(function(){ document.querySelector('.alert').remove(); }, 5000);</script>";
           
	}

    // Validating mobile number
   else  if (!preg_match('/^[0-9]{10}$/', $mobile)) {
        $isValid = false;
        $message .= "<center><div class='alert alert-danger' role='alert'>Invalid mobile number! Mobile number should be 10 digits.</div></center>";
       echo "<script>setTimeout(function(){ document.querySelector('.alert').remove(); }, 5000);</script>";

    }

    // Validating Aadhar number
    else if (!preg_match('/^[0-9]{12}$/', $adhar)) {
        $isValid = false;
        $message .= "<center><div class='alert alert-danger' role='alert'>Invalid Aadhar number! Aadhar number should be 12 digits.</div></center>";
               echo "<script>setTimeout(function(){ document.querySelector('.alert').remove(); }, 5000);</script>";

     }

    // Validating full name
    else if (strlen($username) > 50) {
        $isValid = false;
        $message .= "<center><div class='alert alert-danger' role='alert'>Name should be less than 50 characters.</div></center>";
               echo "<script>setTimeout(function(){ document.querySelector('.alert').remove(); }, 5000);</script>";

    }

    // If all validations pass, proceed with database insertion
    if ($isValid) {
        $sql = "INSERT INTO taker_reg VALUES ('$username','$mobile','$dob','$adhar','$add','$per','$donorid','$gender','$country','$state','$doblast','$bloodgroup','$weight')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $message = "<center><div class='alert alert-primary' role='alert'>Data inserted successfully.</div></center>";
              echo "<script>setTimeout(function(){ window.location.href = 'admin.html'; }, 2000);</script>";
           
    } else {
            $message = "<center><div class='alert alert-danger' role='alert'>Data insertion failed.</div></center>";
        }
    }
}

?>


<html>

<head>
    <link rel="stylesheet" type="text/css" href="registration_doner.css">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
 
 
 
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    
    <div class="header_section">
        <img src="blooddonate.jpeg" class="web_logo">

        <div class="menu_container">
            <a href="home1.html" class="menu">Home</a>
            <a href="about_us.html" class="menu">About-us</a>
            <a href="Help.html" class="menu">Help</a>
            <a href="contact-us.html" class="menu">Contact-us</a>
            <a href="certifacate.html" class="menu">user-report</a>
        </div>
		<?php echo $message;?>
    </div>


    <div class="form_container">
        <center>
            <h1 style="color: red;font-size: 40px;" class="page_heading">Registration</h1>

            <h3>Donors Personal Details</h3>
        </center>
        <form action="" method="post">

            <div class="marge">
                <lable type="profile_logo">Enter your Full name:</lable>
                <input type="text" class="input_box" name="t1" id="f17" placeholder="Enter full_name">

                <br>
                <lable"> Enter Mobile number:</lable>
                    <input type="number" class="input_box" id="n1" name="t2"
                        placeholder="Enter MObile_number">

                    <br>
                    <lable> Enter DOb:</lable>
                    <input type="date" class="input_box" name="t3" placeholder="Enter DOB">


                    <br>
                    <lable"> Enter Adhar number:</lable>
                        <input type="number" id="a1" class="input_box" name="t4"
                            placeholder="Enter Adhar_number">

                        <lable> Enter Current Address:</lable>
                        <textarea name="t5" class="input_box" placeholder="Enter Current Address"></textarea>

                        <br>
                        <lable> Enter Perment Address:</lable>
                        <textarea name="t6" class="input_box" placeholder="Enter Perment Address"></textarea>

                        <br>
                        <lable> Donors ID:</lable>
                          <div class="input-group"> 
                       <input type="text" id="randomNumberField" class="input_box" name="t7" readonly>
   <span class="input-group-text"><button onclick="generateRandomNumber()" class="btn btn-secondary">Get Donor-Id</span>
            </div>

  <!-- Button to generate a random number -->
  
                            <br>
                            <lable>Select Gender</lable>
                            <input type="radio" name="t8" value="Male" checked>Male
                            <input type="radio" name="t8" value="Female">Female
                            <input type="radio" name="t8" value="Other">Other
                            <br>
                            <br>
                            <lable>select Country</lable>
                            <select name="t9">
                                <option value="select">Select Country</option>
                                <option value="India">India</option>
                                <option value="USA">USA</option>
                                <option value="UK">UK</option>
                                <option value="England">England</option>
                                <option value="Japan">Japan</option>
                                <option value="Canada">Canada</option>
                                <option value="Russia">Russia</option>
                                <option value="Keniya">Keniya</option>
                                <option value="China">China</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Bangladesh">Bangladesh</option>
                            </select>

                            <br>
                            <br>
                            <lable>select State</lable>
                            <select id="country-state" name="t10">
                                <option value="">Select state</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Ladakh">Ladakh</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                            <br>
                            <br>

                            <input type="file" class="input_box" name="profile_photo" />
                            <br>
                            <br>

                            <center>
                                <h4> Donors Medical Details</h4>
                            </center>

                            <lable> When did you Last Donate</lable>
                            <input type="date" class="input_box" name="t11" placeholder="Enter DOB">



                            <br>
                            <br>
                            <lable>select Blood Group</lable>
                            <select name="t12">
                                <option value="select">Select Blood Group</option>
                                <option value="A+">A positive (A+)</option>
                                <option value="A-">A negative (A-)</option>
                                <option value="B+">B Posistive(B+)</option>
                                <option value="B-">B negative(B-)</option>
                                <option value="AB+">AB positive(AB+)</option>
                                <option value="AB-">AB negative(Ab-)</option>
                                <option value="O+">O positive(O+)</option>
                                <option value="O-">O negative(O-)</option>
                            </select>

                            <br>
                            <br>
                            <lable> Enter Your Weight:</lable>
                                <input type="number" class="input_box" name="t13" placeholder="Enter Your Weight">


                                <br>
                                <input type="checkbox" name="term" value="true" required style="margin-left:10px;">

                                <span style="margin-left:10px;"><b>I am agree to donate my blood and show my Name,
                                        Contact No.and E-Mail in Blood donors List</b></span>

                                <center>

                                    <input type="submit" name="submit_btn" value="Create my account">

                                </center>
        </form>
    </div>
    </div>
    <script>


		function generateRandomNumber() {
      // Generate a random number between 1 and 100
      var randomNumber = Math.floor(Math.random() * 100) + 1;
      
      // Set the generated number in the text field
      document.getElementById("randomNumberField").value = randomNumber;
    }

    </script>


</body>

</html>