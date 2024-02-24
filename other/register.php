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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                <a href="#enroll-employee" id="enrollemployee">
                    <div class="tiles" title="enroll employee">
                        <div class="tile-icon"><img class="icon" src="images/enroll.png"></div>
                        <div class="tile-title">Enroll employee</div>
                    </div>                    
                </a>

                <!--    Nav profile -->
                <div class="profile-nav">
                    <div class="profile-nav-pic" title="Click to log out" onclick="LogOut()">
                        <img id="user-profile" class="icon" src="">
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
                    <form id="s-form" class="flex full" >
                        <div class="search">
                            <input type="search" class="search-input" placeholder="Search ID no" name="search" id="search">
                        </div>
                        <div  class="search-btn" id="s-submit">
                            <div class="sb"><img src="images/icons/search.png" class="icon"></div>
                        </div>
                    </form>

                    <script>                        
                        document.getElementById("s-form").addEventListener("submit", function(event) {
                        event.preventDefault();
                        
                     });    
                     document.getElementById('s-submit').addEventListener('click', function() {
                        var searchValue = document.getElementById('search').value;
                        document.getElementById('idnumber').value = searchValue;
                        });

                     
                    </script>  
                    <!--    clear table by pressing ctrl+x -->
            <script>
                // Function to clear the form fields
                function clearForm() {
                    document.getElementById('fname').value = '';
                    document.getElementById('lname').value = '';
                    document.getElementById('email').value = '';
                    document.getElementById('idnumber').value = '';
                    document.getElementById('role').selectedIndex = 0; // Reset role dropdown to first option
                    document.getElementById('password').value = '';
                    document.getElementById('checkbox').checked = true; // Reset checkbox
                    document.getElementById('profile_picture').value = ''; // Reset file input
                }

                // Event listener for keydown event
                document.addEventListener('keydown', function(event) {
                    // Check if Ctrl key and 'X' key are pressed simultaneously
                    if (event.ctrlKey && event.key === 'x') {
                        // Clear the form fields
                        clearForm();
                    }
                });
            </script>
  
                        
                
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
                            <div class="top-profile" id="updateRole">
                                <div class="notification-top">
                                    <img class="icon" src="images/icons/refresh2.png" title="Update role">
                                </div>
                                
                            </div>
                            <div class="top-profile" id="updatePassword">
                                <div class="notification-top">
                                    <img class="icon" src="images/icons/password.png" title="Update password">
                                </div>
                                
                            </div>
                            <div class="top-profile" id="deleteuser">
                                <div class="notification-top">
                                    <img class="icon" src="images/icons/delete.png" title="Delete employee" >
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
                                        <div class="form-title">  Use <b>Ctrl+x</b> to clear the form </div>
                                        <div class="input-holder2">
                                            <input id="fname" type="text" placeholder="First name" name="f_name" required>
                                            <input type="text" placeholder="Last name" name="l_name" required id="lname">
                                        </div>
                                        <div class="input-holder1">
                                            <input type="text" placeholder="Email" class="ione" name="email" required id="email">
                                        </div>
                                        <div class="input-holder1">
                                            <input type="text" placeholder="ID no" class="ione" name="id_no" required id="idnumber">
                                        </div>
                                        <div class="input-holder2">
                                            <select required name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>   
                                            <select required name="role" id="role">
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
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


<!--    SCRIPT FOR SEARCHING DATABASE -->
<script>
    $(document).ready(function(){
        $('#s-submit').on('click', function(){
            var id_no = $('#search').val();
            $.ajax({
                url: 'search.php',
                method: 'POST',
                data: {id_no: id_no},
                success: function(response){
                    
                    var data = JSON.parse(response);
                    
                    
                    
                    // Autofill the rest of the form fields with the received data
                    setTimeout(()=>{
                    $('#form input[name="f_name"]').val(data.f_name);
                    $('#form input[name="l_name"]').val(data.l_name);
                    $('#form input[name="email"]').val(data.email);
                    $('#form select[name="gender"]').val(data.gender);
                    $('#form select[name="role"]').val(data.role);


    if (data.role =="admin") {
        setTimeout(() => {
            console.log("User found!");
            infotext.textContent = "User info found!";
            info.style.display = "block";
            showNotif(); 
        }, 30);
    } else if (data.role =="user"){
        setTimeout(() => {
            console.log("User found!");
            infotext.textContent = "User info found!";
            info.style.display = "block";
            showNotif();
        }, 30);
        
    }else{
        setTimeout(() => {
            console.log("User found not!");
            warningtext.textContent = "User not found!";
            warning.style.display = "block";
            showNotif();
                }, 30);
            }
            }, 300);                 
                    
        },
                error: function(xhr, status, error) {
                    
                    console.log("Error: " + error);
                }
            });
        });
    });
</script>

<!--    SCRIPT FOR DELETING USER -->
<script>
    $(document).ready(function() {
    $('#deleteuser').on('click', function() {
        var idNo = $('#search').val();

        // Check if ID number is not empty
        if (idNo.trim() !== '') {
            // Send AJAX request to delete.php
            $.ajax({
                url: 'delete.php',
                method: 'POST',
                data: { id_no: idNo },
                success: function(response) {
                    // Check the status of the response
                    if (response.status === 'success') {
                        setTimeout(()=>{
                        successtext.textContent = "User Deleted successfully!";
                        success.style.display = "block";
                        showNotif();
                        }, 30);
                        console.log('User deleted successfully.');
                        
                    } else {
                        setTimeout(()=>{
                        errortext.textContent = "An error occured";
                        error.style.display = "block";
                        showNotif();
                        }, 30);
                        console.error('Error deleting user:', response.message);
                        
                    }
                    // Check if there is a profile picture message in the response
                    if (response.profile_picture_message) {
                        console.log(response.profile_picture_message);
                        
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response here
                    console.error('Error deleting user:', error);
                    
                    }
            });
        } else {
            
            console.log('Please enter ID number.');
            setTimeout(()=>{
                        errortext.textContent = "Please enter id no";
                        error.style.display = "block";
                        showNotif();
                        }, 30);
        }
        });
    });

</script> 

<!--    SCRIPT FOR UPDATING PASSWORD -->
<script>
        $(document).ready(function() {
            $('#updatePassword').on('click', function() {
                var idNo = $('#search').val();
                var password = $('#password').val();

                // Check if ID number and password are not empty
                if (idNo.trim() !== '' && password.trim() !== '') {
                    // Send AJAX request to update_password.php
                    $.ajax({
                        url: 'update_p.php',
                        method: 'POST',
                        data: {
                            id_no: idNo,
                            password: password
                        },
                        success: function(response) {
                            // Check if password was updated successfully
                            if (response.status === 'success') {
                                console.log('Password updated successfully.');
                                setTimeout(()=>{
                                successtext.textContent = "Password updated successfully!";
                                success.style.display = "block";
                                showNotif();
                                }, 30);
                            } else {
                                console.error('Failed to update password:', response.message);
                                setTimeout(()=>{
                                errortext.textContent = "Failed to update password";
                                error.style.display = "block";
                                showNotif();
                                }, 30);
                            }
                        },
                        error: function(xhr, status, error) {
                            
                            console.error('Error updating password:', error);
                            setTimeout(()=>{
                                errortext.textContent = "Error updating password";
                                error.style.display = "block";
                                showNotif();
                                }, 30);
                            
                        }
                    });
                } else {
                    
                    console.log('Please enter ID number and password.');
                                setTimeout(()=>{
                                warningtext.textContent = "Both Id and password are required";
                                warning.style.display = "block";
                                showNotif();
                                }, 30);
                }
            });
        });


</script>

<!--    SCRIPT FOR UPDATING ROLE AND PROFILE -->
<script>
    $(document).ready(function() {
    $('#updateRole').on('click', function() {
        var idNo = $('#search').val();
        var role = $('select[name="role"]').val();

        // Check if ID number and role are not empty
        if (idNo.trim() !== '' && role.trim() !== '') {
            // Send AJAX request to update_role.php
            $.ajax({
                url: 'update_role.php',
                method: 'POST',
                data: {
                    id_no: idNo,
                    role: role
                },
                
                success: function(response) {
                    // Check if role was updated successfully
                    if (response.status === 'success') {
                        console.log('Role updated successfully.');
                        setTimeout(() => {
                            successtext.textContent = "User role updated successfully!";
                            success.style.display = "block";
                            showNotif();
                        }, 30);
                    } else {
                        console.error('Failed to update role:', response.message);
                        // Display error message
                        setTimeout(() => {
                            errortext.textContent = "Failed to update role";
                            error.style.display = "block";
                            showNotif();
                        }, 30);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error('Error updating role:', error);
                    // Display error message
                    setTimeout(() => {
                        errortext.textContent = "An error occurred while updating role.";
                        error.style.display = "block";
                        showNotif();
                    }, 30);
                }
            });
        } else {
            // Handle case where ID number or role is empty
            console.log('Please enter ID number and select a role.');
                        setTimeout(() => {
                        errortext.textContent = "Kindly input the id number";
                        error.style.display = "block";
                        showNotif();
                    }, 30);
        }
    });
    });

</script>

</body>

<script src="js/notifications.js" defer></script>
<script src="js/dash.js" defer></script>
<script src="js/reports.js" defer></script>
<script src="js/fns.js" defer></script>
<script src="js/register.js" defer></script>


</html>
