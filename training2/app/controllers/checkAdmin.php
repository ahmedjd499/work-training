
<?php
if (!(unserialize($_COOKIE['user'])['role']=="admin")) {
    // If the user is not logged in, you can redirect them to the login page
    header('Location: ./views/accessDinied.php');
    exit;
}
?>
