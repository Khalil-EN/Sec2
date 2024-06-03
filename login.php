<?php 
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $rfidtag = $_POST['rfidtag'];
    $password = $_POST['password'];

    if(!empty($rfidtag) && !empty($password)) {
        // Read from database
        $query = "SELECT * FROM users2 WHERE rfidtag = '$rfidtag' LIMIT 1";
        $result = mysqli_query($con, $query);

        if($result) {
            if($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                // Verify the password
                if(password_verify($password, $user_data['password'])) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        
        echo "wrong username or password!";
    } else {
        echo "wrong username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="auth2.css">
</head>
<body>
    <div class="login-container">
        <div class="left-panel">
            <img src="Images/Logo_narsa.png" alt="Icon Image">
            <h2>Login</h2>
            <form action="#" method="post">
                <div class="input-group">
                    <input type="text" name="rfidtag" placeholder="RFID Tag" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <button type="submit" name="signIn">Login</button>
                </div>
                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            </form>
        </div>
        <div class="right-panel">
            <div class="text-box">
                <h1 class="big-text">Respect the traffic lights for your own safety!</h1>
            </div>
            <img src="Images/sample2.jpg" alt="Right Image">
        </div>
    </div>
</body>
</html>
