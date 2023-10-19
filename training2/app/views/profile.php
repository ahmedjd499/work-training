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

<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .profile {
            max-width: 30rem;
            margin: 3rem auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex ;
            flex-direction: column;
            justify-content: space-between;
        }

        h1 {
            text-align: center;
        }

        .profile-image {
            display: block;
            margin: 0 auto;
            outline: 1px solid blue;
            border-radius: 50%;
        }

        p {
            margin: 10px 1rem;
        }

        a {
            text-decoration: none;
            background-color: #0074cc;
            color: white;
            margin: 0.5rem;
            text-align: center;
            padding: 5px 10px;
            border-radius: 4px;
            margin-right: 10px;
        }

        a:hover {
            background-color: #0056a4;
        }
 
        #photo {
    display: block;
    margin: 0 auto;
    outline: 1px solid blue;
    border-radius: 50%;
}
    </style>
</head>

<body>
    <div class="profile">
        <h1>User Profile</h1>

        <!-- Display user information -->
        <img class="profile-image" src="public/uploads/<?=  (file_exists("public/uploads/" .$user['photo'])) ?    $user['photo'] :  'default.png'; ?>" alt="Profile Image" width="100" height="100" id="photo">

        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>Role:</strong> <?php echo $user['role']; ?></p>
        <p><strong>Created At:</strong> <?php echo $user['created_at']; ?></p>

        <!-- You can also add links to edit profile, change password, etc. -->
        <a href="index.php?action=edit">Edit Profile</a>
        <a href="index.php?action=delete&id=<?php echo $user['id']; ?>">Delete Profile</a>
        <a href="index.php?action=logout">Logout</a>
    </div>

<div class="rentDiv">

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <script>
        function loadContent(page) {

            $.ajax({
                url: page,
                type: 'GET',
                success: function(data) {
                    // Replace the content of the "content" div with the response from the server.
                    $('.rentDiv').html(data);
                },
                error: function() {
                    // Handle the error case, e.g., show an error message.
                    alert('Error loading content.');
                }
            });
        }
        loadContent('index.php?action=addRent&car_id=12')
    </script>


</body>

</html>
