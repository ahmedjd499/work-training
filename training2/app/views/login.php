<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">

</head>
<body>
    
    <form method="post" action="./index.php?action=login">
    <h1>Login</h1>
        <input type="email" name="email" required placeholder="Enter your Email"><br>
        
        <input type="password" name="password" required placeholder="Enter your Email"><br>

        <div>
        <input type="submit" value="Login"> or 
            <a href="index.php?action=register"> Register</a> 
            </div>
    </form>
</body>
</html>
