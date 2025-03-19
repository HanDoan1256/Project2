<link rel="stylesheet" href="styles/style.css" />

<?php
session_start();

$users = [
    "admin" => "password123",
];
if (isset($_SESSION['lockout_time']) && time() >= $_SESSION['lockout_time']) {
    unset($_SESSION['lockout_time']);
    $_SESSION['login_attempts'] = 0;
}



// Get form inputs
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['login_attempts'] = 0;
        unset($_SESSION['lockout_time']);
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;
        header("Location: manage.php");
        exit();
    } else {
        $_SESSION['login_attempts'] = ($_SESSION['login_attempts'] ?? 0) + 1;

        if ($_SESSION['login_attempts'] >2) {
            $_SESSION['lockout_time'] = time() + 10;
            if (isset($_SESSION['lockout_time']) && time() < $_SESSION['lockout_time']) {
                $remaining_time = $_SESSION['lockout_time'] - time();
                echo "<h1>Your account is locked.</h1>";
                echo "<p>Try again in <span id='countdown'>$remaining_time</span> seconds.</p>";
                echo "<script>
                    var timeLeft = $remaining_time;
                    var countdownElement = document.getElementById('countdown');
        
                function updateCountdown() {
                    if (timeLeft > 0) {
                        timeLeft--;
                        countdownElement.textContent = timeLeft;
                        setTimeout(updateCountdown, 1000);
                    } else {
                        location.href = 'login.php'; // Redirect to login when time is up
                }
            }
            updateCountdown();
        </script>";
        exit();
        }
            exit();
        } else {
            echo "<h1>Invalid login. Attempt " . $_SESSION['login_attempts'] . "/3.</h1>";
            echo "<a href='login.php'>Try again</a>";
        }
    }
}
?>