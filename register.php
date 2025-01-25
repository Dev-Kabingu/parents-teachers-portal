<?php
include 'layouts/connect.php';
include "db.php";
?>

<!-- 
$first_name = "";  
$last_name = "";
$email = "";
$phone = "";
$address = "";
// variables to display validation error messages
$first_name_error = "";  
$last_name_error = "";
$email_error = "";
$phone_error = "";
$address_error = "";
$password_error = "";

$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $first_name = $_POST['fname'];  
    $last_name = $_POST['lname'];
    $email =$_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

// if (is($_POST['submit'])){
//     $first_name = $_POST['fname'];  
//     $last_name = $_POST['lname'];
//     $email =$_POST['email'];
//     $phone = $_POST['phone'];
//     $address = $_POST['address'];
//     $password = $_POST['password'];
//     $confirm_password = $_POST['confirm_password'];

}


</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" id = "fname" name= 'fname' <?= $first_name ?>required>
                <span class="text_danger"><?= $first_lname ?></span>
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" id = "lname" name= 'lname' value= "<?= $lname ?>" required>
                <span class="text_danger"><?= $last_name_error ?></span>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id = "email" name= 'email'  value = '<?= $email ?>'required>
                <span class="text_danger"><?= $email_error ?></span>
            </div>
            <div class="form-group">
                <label for="tel">Phone:</label>
                <input type="tel" id = "phone" name= 'phone' value = '<?= $phone?>' required>
                <span class="text_danger"><?= $phone_error?></span>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id = "address" name= 'address' value = '<?= $address?>' required>
                <span class="text_danger"><?= $address_error?></span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id = "password" name= 'password' value = '<?= $password?>' required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id = "confirm_password" name= 'confirm_password' required>
                <span class="text_danger"><?= $confirm_password_error?></span>
            </div>
            <div class="form-group form-btn">
            <button type = 'submit'>register</button>
                <button type = 'submit'><a href="index.php">cancel</a></button>
            </div>
        </form>
    </div>
    
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        .form-group #signup{
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
    <!-- registration form -->
    <div class="container" id="signupForm">
        <h1>sign up</h1>
        <form action="" method="post">
            <div class="form-group">
                <div class="form-input">
                    <label for="fname">First Name:</label>
                    <input type="text" name="first_name" id="first_name" placeholder="First Name" required>
                    
                </div>
                <div class="form-input">
                    <label for="lname">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" required>
                 
                </div>
            </div>
            <div class="form-group">
                <div class="form-input">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                    <span class="text_danger"><?= $email_error?></span>
                </div>
                <div class="form-input">
                    <label for="phone">Phone Number:</label>
                    <input type="text" name="phone" id="phone" placeholder="Phone Number" required>
                    <span class="text_danger"><?= $phone_error?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="form-input">
                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" placeholder="Address" required>
                </div>
                <div class="form-input">
                    <label for="role">Role Name:</label>
                    <input type="text" name="role" id="role" placeholder="role" required>
                </div>
            </div>
            <div class="form-group"><div class="form-input">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password"value = '<?= $password?>'  placeholder="Password" required>
                <span class="text_danger"><?= $password_error?></span>
            </div>
            <div class="form-input">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                <span class="text_danger"><?= $confirm_password_error?></span>
            </div>
        </div>
        <!-- <div class="form-input"><div class="form-group">
            <input type="submit" name="signup" id="signup" value="Sign Up">
        </div></div> -->
        <input type="submit" name="signup" id="signup" value="Sign Up">
               <p>Already have an account? <a href="login.php" id="signinBtn">sign in</a></p> 
        </form>
    </div>

</body>
</html>