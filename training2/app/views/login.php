<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="icon" href="public/logo.png" type="image/x-icon">

</head>
<body>
    <main class='main glass'>
    <form method="post" action="./index.php?action=login" class="flex-col">
    <h1>Login</h1>
        <input type="email" name="email" required placeholder="Enter your Email"><br>
        
        <input type="password" name="password" required placeholder="Enter your Email"><br>

        <div class='flex-row'>
        <button type="submit"  class='btn'>Login </button> or 
            <a href="index.php?action=register" class='link'> Register</a> 
            </div>
    </form>
    </main>
</body>
</html>
