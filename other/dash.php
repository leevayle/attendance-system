<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance system</title>
    <link rel="stylesheet" href="css/dash.css" id="stylesheet">
    <link rel="stylesheet" href="css/notifications.css">
    <link rel="stylesheet" href="css/fonts.css">
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
                        <div class="tiles" title="Dashboard" id="active-dashboard">
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
                    <a href="#clock-out" id="nav-clock-out">
                        <div class="tiles" title="clock out">
                            <div class="tile-icon"><img class="icon" src="images/co (2).png"></div>
                            <div class="tile-title">Clock Out</div>
                        </div>                    
                    </a>
                    <a href="#clock-reports" id="clock-reports">
                        <div class="tiles" title="clock reports">
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
                    <a href="#register-new">
                        <div class="tiles" title="register employee">
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
                        <div class="profile-nav-pic" onclick="LogOut()">
                            <img class="icon" src="images/profile.png">
                        </div>
                        <div class="profile-nav-caption">
                                <p id="userdash">Admin</p>
                        </div>
                        <div class="company-name company">
                            <p id="company-name"><a href="https://samoyugisolutions.co.ke" target="_blank">Sam oyugi solutions ltd.</a></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

    <!--Main app area-->    
        <div class="app-whole">
            <div class="dash-cont-parent">

                    <div class="search-bar-cont">
                        <div class="search-bar" id="searchbar">
                            <div class="phone-nav">
                                <div class="p-nav-element p-nav-active" id="dash-phone">
                                    <div class="p-nav-ico ">
                                        <img class="icon" src="images/dash.png">
                                    </div>
                                </div>
                                <div class="p-nav-element" id="clock-in-phone">
                                    <div class="p-nav-ico ">
                                        <img class="icon" src="images/clock in.png">
                                    </div>
                                </div>
                                <div class="p-nav-element" id="clock-out-phone-dash">
                                    <div class="p-nav-ico ">
                                        <img class="icon" src="images/co (2).png">
                                    </div>
                                </div>
                                <div class="p-nav-element" id="clock-reports-phone">
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

                    <div class="filter-main">
                        <div class="app-title" id="apptitle">Attendance System - Dashboard</div>
                        
                        <div class="dash-cont">
                            <!--Filters section______________________________________-->
                            <div class="filter-cont">
                                
                                <input type="date" id="date" class="filter-date" style="padding-top: 0px;padding-bottom: 0px;">
                                
                                
                                <select class="filter-date">
                                    <option>Select Dpt</option>
                                    <option id="dpt-option1">All dptmts</option>
                                    <option id="dpt-option1">Human resource</option>
                                    <option id="dpt-option2">IT</option>
                                    <option id="dpt-option3">Front Office</option>
                                    <option id="dpt-option4">Other</option>
                                </select>
                                
                                <select class="filter-date">
                                    <option>Time filter</option>
                                    <option>Early check in</option>
                                    <option>Late check in</option>
                                </select>  
                                <div class="print" title="Click to print"><img class="icon" src="images/print.png"></div>
                                <div id="apply-filters" title="Click to apply filters">Apply Filters</div>         
                                
                            </div>

                        </div>
                    
                    </div>
                

            </div>
                
            <div class="app-cont">
                
                <div class="app">
                    <section id="dashboard">
                        <div class="dashboard-main">
                            
                            <div class="dash-tile-cont">
                                <div class="dash-tile">
                                    <div class="tile-icon-dash">
                                        <img src="images/icons/calender.png" class="icon">
                                    </div>
                                    <div class="tile-title-dash"></div>
                                    <div id="time" class="tile-title-dash2">...</div>
                                    <div class="tile-title-dash3" id="date1" style="font-family: 'corbel',sans-serif;">Current system time</div>
                                </div>

                                <div class="dash-tile">
                                    <div class="tile-icon-dash">
                                        <img src="images/icons/8666798_clock_watch_icon.png" class="icon">
                                    </div>
                                    <div class="tile-title-dash"></div>
                                    <div class="tile-title-dash2">12</div>
                                    
                                    <div class="tile-title-dash3">late check ins</div>
                                </div>

                                <div class="dash-tile">
                                    <div class="tile-icon-dash">
                                        <img src="images/icons/8666798_clock_watch_icon.png" class="icon">
                                    </div>
                                    <div class="tile-title-dash"></div>
                                    <div class="tile-title-dash2">120</div>
                                    
                                    <div class="tile-title-dash3">On time check in</div>
                                </div>                        

                                
                            </div>

                            <div class="dash-tile-cont">

                                <div class="dash-tile">
                                    <div class="tile-icon-dash">
                                        <img src="images/icons/8666539_pie_chart_icon.png" class="icon">
                                    </div>
                                    <div class="tile-title-dash"></div>
                                    <div class="tile-title-dash2">192</div>
                                    
                                    <div class="tile-title-dash3">registered</div>
                                </div>

                                <div class="dash-tile">
                                    <div class="tile-icon-dash">
                                        <img src="images/icons/8666691_home_icon.png" class="icon">
                                    </div>
                                    <div class="tile-title-dash"></div>
                                    <div class="tile-title-dash2">192</div>
                                    
                                    <div class="tile-title-dash3">Enrolled</div>
                                </div>

                                <div class="dash-tile">
                                    <div class="tile-icon-dash">
                                        <img src="images/icons/account_circle_FILL0_wght400_GRAD0_opsz24.png" class="icon">
                                    </div>
                                    <div class="tile-title-dash"></div>
                                    <div class="tile-title-dash2">13</div>
                                    
                                    <div class="tile-title-dash3">Absent today</div>
                                </div>

                                
                                

                                
                            </div>

                            <div class="graphs-dash">
                                <div class="graph1">

                                </div>
                                <div class="graph2">

                                </div>
                            </div>
                            
                        </section>
                        
                    </div>
            </div>
        </div>


        <?php
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

// Query to fetch data from company table
$sql = "SELECT name FROM company";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the first row
    $row = $result->fetch_assoc();
    // Check if name exists
    if (!empty($row["name"])) {
        // Display company name in a paragraph element
        echo "<p id='company-name'>" . $row["name"] . "</p>";
    }
} 

// Close connection
$conn->close();
?>

        
    
</body>

<script src="js/notifications.js" defer></script>
<script src="js/dash.js" defer></script>
<script src="js/fns.js" defer></script>

</html>