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
            display: flex;
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

        a,button {
            text-decoration: none;
            background-color: #0074cc;
            color: white;
            margin: 0.5rem;
            text-align: center;
            padding: 5px 10px;
            border-radius: 4px;
            margin-right: 10px;
            border:none ;
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

        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 95%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 999;
            margin: 2rem;
            overflow-x: auto;


        }
        .freeCars{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .popup-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            width: 100%;
            padding: 1rem;

            opacity: 0;
            transform: scale(0.8);
            transition: all 0.3s ease-in-out;

        }

        .popup-card {
            padding: 20px;
            text-align: center;
            
        }

        .popup-card h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .popup-card p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        #close-popup {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            position: relative;
        
        }

        #close-popup:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="profile">
        <h1>User Profile</h1>

        <!-- Display user information -->
        <img class="profile-image" src="public/uploads/<?= (file_exists("public/uploads/" . $user['photo'])) ?    $user['photo'] :  'default.png'; ?>" alt="Profile Image" width="100" height="100" id="photo">

        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>Role:</strong> <?php echo $user['role']; ?></p>
        <p><strong>Created At:</strong> <?php echo $user['created_at']; ?></p>

        <!-- You can also add links to edit profile, change password, etc. -->
        <a href="index.php?action=edit">Edit Profile</a>
        <a href="index.php?action=delete&id=<?php echo $user['id']; ?>">Delete Profile</a>
        <button  id='open-popup'>rent a car</button>
        <a href="index.php?action=logout">Logout</a>
    </div>

    <div class="popup-overlay">
        <div class="popup-container">
        <button id="close-popup">Close</button>
            <div class="popup-card">
                <div class="rentDiv">
                </div>
                <div class="freeCars">
                </div>
              
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function loadContent(page,div) {

            $.ajax({
                url: page,
                type: 'POST',
                
                success: function(data) {
                    // Replace the content of the "content" div with the response from the server.
                    $(div).html(data);
                },
                error: function() {
                    // Handle the error case, e.g., show an error message.
                    alert('Error loading content.');
                }
            });
        }
      
    </script>
    <script>
        const popupOverlay = document.querySelector(".popup-overlay");
        const popupContainer = document.querySelector(".popup-container");
        const closePopupButton = document.getElementById("close-popup");
        const openPopupButton = document.getElementById("open-popup");
     
        function openPopup() {
            loadContent('index.php?action=loadRentForm','.rentDiv')
            popupOverlay.style.display = "flex";
            setTimeout(() => {
                popupContainer.style.opacity = "1";
                popupContainer.style.transform = "scale(1)";
            }, 100);
        }

        function closePopup() {
            popupContainer.style.opacity = "0";
            popupContainer.style.transform = "scale(0.8)";
            setTimeout(() => {
                popupOverlay.style.display = "none";
            }, 300);
        }

        // Automatically open the popup when the page loads
        openPopupButton.addEventListener("click", openPopup);

        closePopupButton.addEventListener("click", closePopup);
    </script>

</body>

</html>