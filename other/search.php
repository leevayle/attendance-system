<?php
// Assuming you have a database connection established already

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve entered ID from the form
    $id_no = $_POST['id_no'];
    
    // Prepare and execute a query to search for the user with the entered ID
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $id_no]);
    
    // Fetch the user details if found
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // If user is found, populate the form fields with their details
    if ($user) {
        $f_name = $user['f_name'];
        $l_name = $user['l_name'];
        $email = $user['email'];
        $gender = $user['gender'];
        $role = $user['role'];
        // Populate other fields similarly
        
        // Now, you can echo these values into your form fields to display them for editing
        echo '<script>';
        echo 'document.getElementById("fname").value = "' . $f_name . '";';
        echo 'document.getElementById("lname").value = "' . $l_name . '";';
        echo 'document.getElementById("email").value = "' . $email . '";';
        echo 'document.getElementById("gender").value = "' . $gender . '";';
        echo 'document.getElementById("role").value = "' . $role . '";';
        // Echo other field values similarly
        echo 'document.addEventListener("DOMContentLoaded", function() {';
        echo '    setTimeout(()=>{';
        echo '        errortext.textContent = "User details loaded for editing.";';
        echo '        error.style.display = "block";';
        echo '        showNotif();';
        echo '    }, 30);';
        echo '});';
        echo '</script>';
    } else {
        // If user is not found, you can display a message or take appropriate action
        echo '<script>';
        echo 'document.addEventListener("DOMContentLoaded", function() {';
        echo '    setTimeout(()=>{';
        echo '        errortext.textContent = "User not found. Please check the entered ID.";';
        echo '        error.style.display = "block";';
        echo '        showNotif();';
        echo '    }, 30);';
        echo '});';
        echo '</script>';
    }
}
?>
