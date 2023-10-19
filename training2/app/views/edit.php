<?php
// Check if the user is logged in
if (!isset($_COOKIE['user'])) {
    // If the user is not logged in, you can redirect them to the login page
    header('Location: index.php?action=login');
    exit;
}

// Get user data based on the session
$user = unserialize($_COOKIE['user']);

// Assume $user contains the user's information, e.g., email, role, etc.
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Profile</title>
    <style>
 
        h1 {
            text-align: center;
        }

        .form-container {
             /* Adjust the max-width as needed */
             max-width: 30rem;
            margin: 0 auto;
            padding: 1rem;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .form-container form {
            padding: 1rem;
        }

        .profile-image {
            display: block;
            border-radius:50% ;
            object-fit: cover;
            outline: 1px solid blue;
            margin: 0 auto;
        }

        #profile_picture {
            display: none;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="file"] {
            display: none;
        }

        #choose-photo-label {
            cursor: pointer;
            color: #0074cc;
            text-align: center;
        }

        input[type="submit"] {
            background-color: #0074cc;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056a4;
        }
    </style>
</head>

<body>
    <h1>Edit Profile</h1>

    <div class="form-container">
        <form method="post" action="index.php?action=edit" enctype="multipart/form-data" class='ff'>
            <img class="profile-image" src="public/uploads/<?php echo (file_exists("public/uploads/" . $user['photo'])) ? $user['photo'] : 'default.png'; ?>" alt="Profile Image" width="100" height="100" id="photo">
            <label id="choose-photo-label" for="profile_picture">Choose a profile picture</label>
            <input type="file" name="profile_picture" accept="image/*" id="profile_picture" onchange="loadPhoto()">
            <label for="new_email">New Email:</label>
            <input type="email" name="new_email" value="<?php echo $user['email']; ?>" required><br>
            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" placeholder="Leave blank to keep the current password"><br>
            <!-- Add more fields for other profile information -->
            <input type="submit" value="Save Changes">
        </form>
    </div>

    <script>
        function loadPhoto() {
            const img = document.getElementById('photo');
            const input = document.getElementById('profile_picture');
            img.src = URL.createObjectURL(input.files[0]);
        }
    </script>
</body>

</html>
