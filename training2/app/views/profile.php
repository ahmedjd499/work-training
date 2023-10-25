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
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="icon" href="public/logo.png" type="image/x-icon">

</head>

<body>

<div class="dash">
        <aside class="aside">

            <a class="nav" href="#" onclick="setDisplay('profile','myRents');">Profile</a>
            <a class="nav" href="#" onclick="setDisplay('myRents','profile');">MY rents</a>
                <button class="nav" id='open-popup'>rent a car</button>
        <a class="nav" href="index.php?action=logout">Logout</a>

           

        </aside>
        <div class="maindash">
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
    </div>


        <div class="myRents">

        </div>
    <div class="popup-overlay">
        <div class="popup-container">
        <button id="close-popup">X</button>
            <div class="popup-card">
                <div class="rentDiv">
                </div>
                <div class="freeCars">
                </div>
              
            </div>
        </div>
    </div>
        </div>

    </div>

 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        function loadContent(page,div) {

            $.ajax({
                url: page,
                type: 'GET',
                
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
        loadContent('index.php?action=myRents','.myRents');

        function setDisplay (div1,div2){
           const div_1= document.getElementsByClassName(div1)[0];
           const div_2= document.getElementsByClassName(div2)[0];
           div_1.style.display=  div1==='profile'? 'flex': 'block'
         
           div_2.style.display='none'


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