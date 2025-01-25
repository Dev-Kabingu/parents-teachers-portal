<?php
include 'layouts/connect.php';
include "db.php";

// Start session to store user data
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password']; 

    // query to prevent SQL injection
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if the user exists
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Validate the password using password_verify()
        if (password_verify($password, $user['password'])) {
            // Password is correct, store session data
            $_SESSION['user_id'] = $user['id']; // Store user session
            $_SESSION['email'] = $user['email']; // Store email in session
            $_SESSION['first_name'] = $user['first_name']; // Store first name in session
            $_SESSION['last_name'] = $user['last_name']; // Store last name in session

            // Redirect to profile page
            header("Location: profile.php");
            exit();
        } else {
            // Invalid password
            $invalid_login_error = "Invalid email or password!";
            $error = true;
        }
    } else {
        // Invalid email
        $invalid_login_error = "Invalid email or password!";
        $error = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        body{
            background: #2b2b2b;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 50px;
        }
        .container{
            width: 300px;
            height: auto;
        } h1{
            color: whitesmoke;
            text-transform: capitalize;
        }
        .form-group{
            margin-bottom: 10px;
        }
        .form-group label{
            display: block;
            font-size: 18px;
            color: whitesmoke;
            font-weight: 500;
            margin-bottom: 4px;
        }
        .form-group input{
            width: 100%;
            padding: 8px 12px;
            border: 1px solid rgb(240, 236, 236);;
            outline: none;
            border-radius: 4px;
            margin-bottom: 12px;
            background: transparent;
            color: white;
            font-size: 16px;
        }
        .form-group #signin{
            border: none;
            color: whitesmoke;
            font-size: 16px;
            font-weight: 500;
            background-color: blue;
        }
       .container p{
        color: rgb(218, 213, 213);
        font-size: 16px;
       }
       p a{
        color: blue;
        font-size: 16px;
        text-transform: capitalize;
       }
       span{
        color:red;
        font-size: 16px;
        padding: 10px;
        font-weight:bold;
       }

    </style>

</head>
<body>
    <!-- login form -->
    <div class="container">
        <h1>sign in</h1>
        <span class="text_danger"><?= $invalid_login_error?></span>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="submit" name="signin" id="signin" value="Signin">
            </div>
            <p>Don't have an account? <a href="register.php" id="signupBtn">sign up</a></p>
        </form>
    </div>
    

</body>
</html>