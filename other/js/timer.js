// Set the idle timeout duration in milliseconds
const IDLE_TIMEOUT = 180000; // 3 minute

let timer;

// Function to redirect to login page
function redirectToLoginPage() {
    localStorage.clear();
    window.location.href = './login.php'; // Replace 'login.html' with your actual login page URL
}

// Function to start the idle timer
function startIdleTimer() {
    // Clear any existing timer
    clearTimeout(timer);

    // Set a new timer
    timer = setTimeout(redirectToLoginPage, IDLE_TIMEOUT);
}

// Event listeners to reset the idle timer on user activity
document.addEventListener('mousemove', startIdleTimer);
document.addEventListener('keypress', startIdleTimer);

// Start the idle timer initially
startIdleTimer();