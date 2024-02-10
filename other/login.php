<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance | Log In</title>
    <link rel="stylesheet" href="css/log.css">
    <link rel="stylesheet" href="../other/css/fonts.css">
    <link rel="stylesheet" href="../other/css/notifications.css">
    <link rel="icon" href="images/favicon.png">
</head>
<body>

    <!--NOTIFICATIONS       __________________________-->
<section id="notification">
    <div class="notify-cont" id="notify-cont">
        <div class="main-n-cont">               
         
            <div class="main-n" id="success">
                <div class="left-n"></div>
                <div class="right-n" id="closesuccess">
                    <div class="cross" id="cross1"></div>
                    <div class="cross" id="cross2"></div>
                </div>
                <div class="check-n">
                    <div class="cross" id="cross3"></div>
                    <div class="cross" id="cross4"></div>
                </div>
                <div class="text-n" id="success-text">
                    
                </div>

            </div>

            <div class="main-n-e" id="error">
                <div class="left-n-e"></div>
                <div class="right-n-e" id="closeerror">
                    <div class="cross-e" id="cross1-e"></div>
                    <div class="cross-e" id="cross2-e"></div>
                </div>
                <div class="check-n-e">
                    <div class="cross-e" id="cross3-e"></div>
                    <div class="cross-e" id="cross4-e"></div>
                </div>
                <div class="text-n" id="error-text">
                    
                </div>

            </div>

            <div class="main-n-i" id="info">
                <div class="left-n-i"></div>
                <div class="right-n-i" id="closeinfo">
                    <div class="cross-i" id="cross1-i"></div>
                    <div class="cross-i" id="cross2-i"></div>
                </div>
                <div class="check-n-i">
                    <div class="cross-i" id="cross3-i"></div>
                    <div class="cross-i" id="cross4-i"></div>
                </div>
                <div class="text-n" id="info-text">
                    
                </div>
                </div>

                <div class="main-n-w" id="warning">
                    <div class="left-n-w"></div>
                    <div class="right-n-w" id="closewarning"> 
                        <div class="cross-w" id="cross1-w"></div>
                        <div class="cross-w" id="cross2-w"></div>
                    </div>
                    <div class="check-n-w">
                        <div class="cross-w" id="cross3-w"></div>
                        <div class="cross-w" id="cross4-w"></div>
                    </div>
                    <div class="text-n" id="warning-text">
                        
                    </div>
                </div>

    </div>
  </div>
  </section>



    <div class="flex">
        <div class="flexed" id="f1">
            <div class="form-cont">
                <div class="form-flex">
                    <div id="ff1">
                        <div class="title">Log In</div>

                        <form method="post" id='form'>
                            <div class="input">

                                <div class="icon-i"><img class="icon" id="icon1" src="images/profile.png"></div>
                                <input type="text" id="username" name="username" placeholder="" autocomplete="off" >
                            </div>
                            <div class="input" id="pass">

                                <div class="icon-i" id="password-view"><img class="icon" id="icon2" src="images/password.png"></div>
                                <input id="password" name="password" type="password" >
                            </div>
                            <a id="a" onclick="forgot()">Forgot your password?</a><br />
                            
                            <button id="submit" type="submit">Submit</button>
                        </form>
                        
                        
                        
                    </div>
                    <div id="ff2">
                        <div id="title2" class="title">Hello there!</div>
                        <div class="p"><p>You have to be a registered user to log in.</p></div>
                        
                        <a href="../user manual.html#other-logins" target="_blank"><button id="register">Learn More</button></a>
                        <!--<div class="info"><p>?</p></div>-->
                    </div>

                </div>
            </div>
        </div>
        <div class="flexed" id="f2">
            <div class="quick">
                <div class="quick1"><img class="icon" src="images/ci.png"></div>
                <p><b>Quick<br /> Clock In</b></p>
            </div>
            <div class="quick">
                <div class="quick1"><img class="icon" src="images/co.png"></div>
                <p><b>Quick<br /> Clock Out</b></p>
            </div>
        </div>
    </div>
    
    

    <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attendancesystemapp001";
    
    // Assuming you have received the username and password from the form
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $inputUsername = $_POST['username'];
        $inputPassword = $_POST['password'];
    
        // Hash the password input by the user
        $hashedPassword = password_hash($inputPassword, PASSWORD_DEFAULT);
    
        // Connection to MySQL server
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        // Query to fetch data from Biodata table
        $fetchBiodataQuery = "SELECT * FROM Biodata WHERE f_name='$inputUsername'";
    
        $result = $conn->query($fetchBiodataQuery);
    
        if ($result->num_rows > 0) {
            // User found
            while ($row = $result->fetch_assoc()) {
                // Verify the hashed password
                if (password_verify($inputPassword, $row['password'])) {
                    // Passwords match
                    $idNo = $row['id_no']; // Obtain the ID number from the database
                    $email = $row['email']; // Obtain the email from the database
                    $profileUrl = $row['profile_url']; // Obtain the profile URL from the database
                    $theme = $row['theme']; // Obtain the theme from the database
                    $enrolled = $row['enrolled']; // Obtain the enrolled status from the database
                    $lName = $row['l_name']; // Obtain the last name from the database
    
                    // Store all values in localStorage
                    echo '<script>
                        document.addEventListener("DOMContentLoaded", function() {
                            successtext.textContent = "Login was successful!";
                            success.style.display = "block";
                            showNotif();

                            localStorage.setItem("role", "' . $row['role'] . '");
                            localStorage.setItem("idNo", "' . $idNo . '");
                            localStorage.setItem("email", "' . $email . '");
                            localStorage.setItem("profileUrl", "' . $profileUrl . '");
                            localStorage.setItem("theme", "' . $theme . '");
                            localStorage.setItem("enrolled", "' . $enrolled . '");
                            localStorage.setItem("lName", "' . $lName . '");
    
                            setTimeout(()=>{
                                window.location.href="' . ($row['role'] === 'admin' || $row['role'] === 'superadmin' ? 'dash.html' : 'dash-u.html') . '";
                            }, 3000);
    
                            
                        });
                    </script>';
                } else {
                    // Passwords do not match
                    echo '<script>
                        document.addEventListener("DOMContentLoaded", function() {        
                            setTimeout(()=>{
    
                                errortext.textContent = "Wrong password!";
                                error.style.display = "block";
                                showNotif();
                            }, 30);    
                        });        
                    </script>';
                }
            }
        } else {
            // User not found
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {        
                    setTimeout(()=>{
    
                        errortext.textContent = "User not found!";
                        error.style.display = "block";
                        showNotif();
                    }, 30);    
                });        
            </script>';
        }
    
        // Close connection
        $conn->close();
    }
    ?>
    
    
    
    


</body>

<script src="../other/js/notifications.js" defer></script>
<script src="../other/js/form.js" defer></script>
<script>
        document.getElementById('form').addEventListener('submit', function() {
             // Prevent default form submission behavior
            var name = document.getElementById('username').value;
            localStorage.setItem("user", name); // Use localStorage for persistence
            
        });
    </script>

</html>