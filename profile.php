<?php
// Start the session to get user info
// session_start();

// // Check if the user is logged in
// if (isset($_SESSION['user_id'])) {
//     echo "Welcome, " . $_SESSION['first_name'] . " " . $_SESSION['last_name'];
// } else {
//     echo "Please log in to continue.";
// }
//
// <?php
// Start the session to get user info
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Display user info
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone']; // Assuming phone number is stored in session
    $address = $_SESSION['address']; // Assuming address is stored in session
    $role = $_SESSION['role']; // Assuming role is stored in session
} else {
    echo "Please log in to view your profile.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS -->
</head>
<body>
    <div class="profile-container">
        <h1>User Profile</h1>
        <div class="profile-card">
            <h2>Welcome, <?php echo $first_name . " " . $last_name; ?>!</h2>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Phone:</strong> <?php echo $phone; ?></p>
            <p><strong>Address:</strong> <?php echo $address; ?></p>
            <p><strong>Role:</strong> <?php echo $role; ?></p>

            <div class="profile-actions">
                <a href="edit_profile.php" class="btn">Edit Profile</a>
                <a href="logout.php" class="btn">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
