<?php

// Check if the user is logged in
if (!isset($_COOKIE['user'])) {
    // If the user is not logged in, you can redirect them to the login page
    header('Location: index.php?action=login');
    exit;
}

// Get user data based on the session

// Here, you would typically retrieve user data from the database using your User model.
// For this example, we assume that $user contains the user data.
$user = unserialize($_COOKIE['user']);
?>


<div class="profile">
        <h1>User Profile</h1>

        <!-- Display user information -->
        <img class="profile-image" src="public/uploads/<?= (file_exists("public/uploads/" . $user['photo'])) ?    $user['photo'] :  'default.png'; ?>" alt="Profile Image" width="100" height="100" >

        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>Role:</strong> <?php echo $user['role']; ?></p>
        <p><strong>Created At:</strong> <?php echo $user['created_at']; ?></p>

        <!-- You can also add links to edit profile, change password, etc. -->
        <a href="index.php?action=edit">Edit Profile</a>
        <a href="index.php?action=delete&id=<?php echo $user['id']; ?>">Delete Profile</a>
        <a href="index.php?action=logout">Logout</a>
    </div>