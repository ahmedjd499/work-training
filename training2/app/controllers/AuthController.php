<?php

require_once './models/UserModel.php';
class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            // Assuming you have already created an instance of UserModel

            // Call the non-static method on the instance
            $user = UserModel::getUserByEmail($email);

            if ($user && hash('sha256', Salt . $password)== $user['password']) {
                // Set user session and redirect to the dashboard
                setcookie('user',   serialize($user), time() + 3600, '/');
                if ($user["role"]!="admin")
                header('Location: index.php?action=profile');
                else  header('Location: index.php?action=admin');
            } else {
                // Invalid login, show an error message
                echo '<script>alert("Invalid credentials. Please try again.")</script>';
            include '../app/views/login.php';

            }
        } else {
            // Load the login form view
            include '../app/views/login.php';
        }
    }

    public function logout()
    {
        setcookie('user', '', time() + 3600, '/');
        header('Location: index.php?action=login');

    }
}