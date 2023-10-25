<!-- views/create.php (View) -->
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="icon" href="public/logo.png" type="image/x-icon">

</head>
<body>
    <main class='main glass'>

    <form action="index.php?action=register" method="POST" enctype="multipart/form-data" class="flex-col">
    <h1>Register</h1>

    <img class="profile-image" src='public/uploads/default.png' alt="Profile Image" width="100" height="100" id="photo">

    <input type="file" placeholder="choose a profile picture" id='profile_picture' name='profile_picture'accept="image/*" onchange="loadPhoto()"/>

        <input type="email" name="email" required placeholder="Enter an email"><br>
        <input type="password" name="password" required placeholder="Choose a password"><br>
        
        <div class="flex-row">
        <button type="submit" class="btn">Register</button>
        or 
        <a href="index.php?action=login" class='link'> Login </a> 
        </div>
    </form>
    </main>
    <script>
        function loadPhoto() {
            const img = document.getElementById('photo');
            const input = document.getElementById('profile_picture');
            img.src = URL.createObjectURL(input.files[0]);
        }
    </script>
</body>
</html>
