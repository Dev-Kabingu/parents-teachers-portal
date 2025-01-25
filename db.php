<?php
include 'layouts/connect.php';

// Variables to display validation error messages
$first_name_error = "";
$last_name_error = "";
$email_error = "";
$phone_error = "";
$address_error = "";
$password_error = "";
$confirm_password_error = "";
$invalid_login_error = "";

$error = false;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';  
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $role = isset($_POST['role']) ? $_POST['role'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
     // Hash the password
     $hash_password = password_hash($password, PASSWORD_DEFAULT);
    // $password = md5($_POST['password']);



    // Check if user already exists by email
    $user_exist_query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $user_exist_query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $email_error = "User already exists";
        $error = true;
    } else {
        // Validate password length
        if (strlen($password) < 8) {
            $password_error = 'Password must be at least 8 characters';
            $error = true;
        } elseif ($confirm_password != $password) {
            $confirm_password_error = "Passwords do not match";
            $error = true;
        } else {
            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_error = 'Email format is not valid';
                $error = true;
            } else {
                // Validate phone number
                if (!preg_match("/^\+?[0-9]{7,12}$/", $phone)) {
                    $phone_error = 'Phone number format is not valid';
                    $error = true;
                } else {
                    // If no errors, proceed with inserting the user data
                    if (!$error) {
                        $insert_user_query = "INSERT INTO users (first_name, last_name, email, phone, address, password, role)
                                              VALUES (?, ?, ?, ?, ?, ?, ?)";
                        $stmt = mysqli_prepare($conn, $insert_user_query);
                        mysqli_stmt_bind_param($stmt, "sssssss", $first_name, $last_name, $email, $phone, $address, $hash_password, $role);

                        if (mysqli_stmt_execute($stmt)) {
                            echo "Registration successful!";
                            header("Location: login.php");
                            exit; // Stop further execution after the redirect
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                    }
                }
            }
        }
    }


}


?>
