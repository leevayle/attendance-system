<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance system</title>
    
    <link rel="stylesheet" href="css/dash.css">
    <link rel="stylesheet" href="css/notifications.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/register.css" id="stylesheet">

    <link rel="icon" href="images/favicon.png">
</head>
<body>

    <!--    BLUR BACK LOADING   -->
    <div class="blur-back-100" id="blur-back-100">
        <div class="b-b-101">
            <img class="icon" src="images/loading.gif">
        </div>
    </div>

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

    <!-- Navigation pane section-->
    <div class="nav">
        <div class="nav-cont">
            <div class="nav-logo">
                <div class="logo"><img class="icon" id="p1" src="images/favicon.png"></div>
                <div class="nav-title">Attendance System</div>
            </div>
            <div class="nav-tiles">
                
                <a href="#Dashboard" id="nav-dashboard">
                    <div class="tiles" title="Dashboard" >
                        <div class="tile-icon"><img class="icon" src="images/dash.png"></div>
                        <div class="tile-title" >Dashboard</div>
                    </div>                    
                </a>
                <a href="#Clock-in" id="nav-clock-in">
                    <div class="tiles" title="clock in">
                        <div class="tile-icon"><img class="icon" src="images/clock in.png"></div>
                        <div class="tile-title">Clock In</div>
                    </div>                    
                </a>
                <a href="#clock-out" id="clock-out-reports">
                    <div class="tiles" title="clock out">
                        <div class="tile-icon"><img class="icon" src="images/co (2).png"></div>
                        <div class="tile-title">Clock Out</div>
                    </div>                    
                </a>
                <a href="#clock-reports" id="clock-reports">
                    <div class="tiles" title="clock reports" >
                        <div class="tile-icon"><img class="icon" src="images/user list.png"></div>
                        <div class="tile-title">Clock reports</div>
                    </div>
                </a>
                
                <!-- <a href="#">
                    <div class="tiles" title="admins">
                        <div class="tile-icon"><img class="icon" src="images/727399.png"></div>
                        <div class="tile-title">Admins</div>
                    </div>                    
                </a> -->
                <a href="#register-new" id="reg-register">
                    <div class="tiles" title="register employee" id="active-dashboard">
                        <div class="tile-icon"><img class="icon" src="images/ser.png"></div>
                        <div class="tile-title">Register employee</div>
                    </div>                    
                </a>
                <a href="#enroll-employee">
                    <div class="tiles" title="enroll employee">
                        <div class="tile-icon"><img class="icon" src="images/enroll.png"></div>
                        <div class="tile-title">Enroll employee</div>
                    </div>                    
                </a>

                <!--    Nav profile -->
                <div class="profile-nav">
                    <div class="profile-nav-pic" title="Click to log out" onclick="LogOut()">
                        <img id="user-profile" class="icon" src="images/profile.png">
                    </div>
                    <div class="profile-nav-caption">
                            <p id="usernamedash">Admin</p>
                    </div>
                    <div class="company-name company">
                        <p id="company-name"><a href="https://samoyugisolutions.co.ke" target="_blank">Leek softwares ltd.</a></p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!--Main app area-->    
    <div class="app-whole">
        <div class="dash-cont-parent">

            <div class="search-bar-cont ">
                <div class="search-bar flex" id="searchbar">

                    <!-- Search Form -->
                    <form id="s-form" class="flex full" method="POST">
                        <div class="search">
                            <input type="search" class="search-input" placeholder="Search ID no">
                        </div>
                        <div  class="search-btn" id="s-submit">
                            <div class="sb"><img src="images/icons/search.png" class="icon"></div>
                        </div>
                    </form>
                        
                
                    <div class="phone-nav">
                        <div class="p-nav-element" id="dash-phone">
                            <div class="p-nav-ico ">
                                <img class="icon" src="images/dash.png">
                            </div>
                        </div>
                        <div class="p-nav-element" id="clock-in-phone">
                            <div class="p-nav-ico ">
                                <img class="icon" src="images/clock in.png">
                            </div>
                        </div>
                        <div class="p-nav-element" id="reports-clock-out-phone">
                            <div class="p-nav-ico ">
                                <img class="icon" src="images/co (2).png">
                            </div>
                        </div>
                        <div class="p-nav-element p-nav-active" id="clock-reports">
                            <div class="p-nav-ico ">
                                <img class="icon" src="images/user list.png">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search-bar" id="profile">
                    <div class="top-profile">
                        <div class="notification-top">
                            <img class="icon" src="images/icons/bell.png">
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="filter-main filter-main-reports">
                <div class="app-title" id="apptitle">Attendance System - Register new</div>
            </div>

        </div>
            
        <div class="app-cont">
            
            <div class="app">
                <section id="dashboard">
                    <div class="dashboard-main">                   
                        
                        <div class="register">
                            <div class="main-center">
                                <!-- Register Form -->
                                <form class="full" method="post" enctype="multipart/form-data" id="form">
                                    <div class="left1">
                                        <div class="form-title">   </div>
                                        <div class="input-holder2">
                                            <input id="fname" type="text" placeholder="First name" name="f_name" required>
                                            <input type="text" placeholder="Last name" name="l_name" required>
                                        </div>
                                        <div class="input-holder1">
                                            <input type="text" placeholder="Email" class="ione" name="email" required>
                                        </div>
                                        <div class="input-holder1">
                                            <input type="text" placeholder="ID no" class="ione" name="id_no" required>
                                        </div>
                                        <div class="input-holder2">
                                            <select required name="gender">
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Other</option>
                                            </select>   
                                            <select required name="role">
                                                <option>Admin</option>
                                                <option>User</option>
                                            </select>
                                        </div>
                                        <div class="input-holder2">
                                            <input type="password" placeholder="Password" class="ione" style="width: 80%;" name="password" id="password" required>
                                            <input id="checkbox" type="checkbox" style="width: 10%;" checked>
                                        </div>
                                        <div class="input-holder2" style="margin-top: 30px;display: block;">
                                            <input type="file" name="profile_picture" accept="image/*" style="border: none; width: 50%; ">
                                            <label for="profile_picture" style="margin-top: 10px;">Choose a profile picture </label>
                                        </div>
                                        
                                        <div class="input-holder2" id="btns">
                                        <button type="submit" class="reg" id="submit">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>                                
                        
                </section>
                    
                </div>
        </div>
    </div>


    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attendancesystemapp001";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to check if ID number exists
    $check_stmt = $conn->prepare("SELECT id_no FROM biodata WHERE id_no = ?");
    $check_stmt->bind_param("s", $_POST['id_no']);
    $check_stmt->execute();
    $check_stmt->store_result();

    // If ID number already exists, display an error message
    if ($check_stmt->num_rows > 0) {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {        
                setTimeout(()=>{
                    errortext.textContent = "ID number already exists!";
                    error.style.display = "block";
                    showNotif();
                }, 30);    
            });        
        </script>';
    } else {
        // ID number doesn't exist, proceed with inserting data

        // Check if a file was uploaded
        if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] !== UPLOAD_ERR_NO_FILE) {
            // File upload directory
            $target_dir = "images/profiles/";
            // Get the original filename
            $filename = $_FILES["profile_picture"]["name"];
            // Get the ID number
            $id_no = $_POST['id_no'];
            // Generate the new filename using the ID number and original file extension
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $new_filename = $id_no . '.' . $extension;
            // Set the target file path
            $target_file = $target_dir . $new_filename;

            // Check for file upload errors
            if ($_FILES["profile_picture"]["error"] !== UPLOAD_ERR_OK) {
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {        
                        setTimeout(()=>{
                            errortext.textContent = "File upload failed with error code: ' . $_FILES["profile_picture"]["error"] . '";
                            error.style.display = "block";
                            showNotif();
                        }, 30);    
                    });        
                </script>';
                exit(); // Exit script
            }

            // Move the uploaded file to the target directory with the new filename
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                $profile_url = $target_file; // Set profile URL to the uploaded filename
            } else {
                // Failed to upload profile picture
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {        
                        setTimeout(()=>{
                            errortext.textContent = "Failed to upload profile picture!";
                            error.style.display = "block";
                            showNotif();
                        }, 30);    
                    });        
                </script>';
                exit(); // Exit script
            }
        } else {
            // No file uploaded, set profile URL to empty
            $profile_url = '';
        }

        // Prepare SQL statement to insert data into biodata table
        $stmt = $conn->prepare("INSERT INTO biodata (id_no, f_name, l_name, gender, email, role, password, profile_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bind_param("ssssssss", $id_no, $f_name, $l_name, $gender, $email, $role, $password, $profile_url);

        // Set parameters
        $id_no = $_POST['id_no'];
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

        // Execute statement
        if ($stmt->execute()) {
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {        
                    setTimeout(()=>{
                        successtext.textContent = "User added successfully!";
                        success.style.display = "block";
                        showNotif();
                    }, 30);    
                });        
            </script>';
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $conn->close();
}
?>

</body>

<script src="js/notifications.js" defer></script>
<script src="js/dash.js" defer></script>
<script src="js/reports.js" defer></script>
<script src="js/fns.js" defer></script>
<script src="js/register.js" defer></script>


</html>