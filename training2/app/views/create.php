<!-- views/create.php (View) -->
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="./public/css/styles.css">

</head>
<body>
    <form action="index.php?action=register" method="POST" enctype="multipart/form-data">
    <h1>Register</h1>
    <input type="file" placeholder="choose a profile picture" name='profile_picture'accept="image/*" />

        <input type="email" name="email" required placeholder="Enter an email"><br>
        <input type="password" name="password" required placeholder="Choose a password"><br>
        
        <div>
        <button type="submit">Register</button>
        or 
        <a href="index.php?action=login"> Login </a> 
        </div>
    </form>
</body>
</html>
