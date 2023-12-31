<?php

// Check if the user is logged in
if (!isset($_COOKIE['user'])   ) {
    // If the user is not logged in, you can redirect them to the login page
    header('Location: index.php?action=login');
    exit;
}

if (! (unserialize($_COOKIE['user'])["role"]=="admin")  ) {
    // If the user is not logged in, you can redirect them to the login page
    header('Location: ./views/accessDinied.php');
    exit;
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="icon" href="public/logo.png" type="image/x-icon">

</head>
<body>
<div class="form-container profile">

    <form method="POST" action="index.php?action=adminEdit&id=<?php echo $user['id']; ?>" class='flex-col'>
    <h1>Edit Profile</h1>
        <label for="new_email">New Email:</label>
        <input type="email" name="new_email" value="<?php echo $user['email']; ?>" required><br>

        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" placeholder="Leave blank to keep the current password" ><br>

        <!-- Add more fields for other profile information -->

        <button type="submit" class="btn" >Save Changes</button>
    </form>
    </div>

</body>
</html>
