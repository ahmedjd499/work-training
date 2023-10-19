<?php
class UserController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = 'user'; // You can set a default role or implement a role selection mechanism

            // Validate input data (e.g., check for empty fields, valid email format, etc.)

            if ($this->userModel->getUserByEmail($email)) {
                // User with the same email already exists
                echo '<script>alert("User with this email already exists.")</script>'; 

             
            } else {
                // Create a new user
                if ($this->userModel->createUser($email, $password, $role)) {
                    // Registration successful, you can redirect to a success page or login page

                    header('Location: app/views/login.php');


                } else {
                    // Registration failed, show an error message
                    echo '<script>alert("registration failed please try again")</script>'; 
                }
            }
        } else {
            // Load the registration form view
            include './app/views/create.php';

        }
    }


    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission and update the user's profile
            $newEmail = $_POST['new_email'];
            
            $newPassWord = $_POST['new_password'];
      
            if ($this->userModel->getUserByEmail($newEmail)) {
                // User with the same email already exists
                echo '<script>alert("this email is already in use")</script>'; 
            } else {
                // Create a new user
                if ($this->userModel->updateUser( $_SESSION['user']["id"],$newEmail, $newPassWord)) {
                    $_SESSION['user']=$this->userModel->getUserByEmail($newEmail);
                    echo '<script>alert("profile updated successfully")</script>'; 

                     header('Location: app/views/profile.php');

               
                } else {
                    // Registration failed, show an error message
                    echo '<script>alert("failed to update the profile")</script>'; 

                }
            }
            
        } else {
            // Load the edit profile form
            include './app/views/edit.php';
        }
    }


    public function delete($id) {
    

            if ($this->userModel->deleteUser($id)) 
            {
                session_destroy();
                header('Location: app/views/login.php');
                
            
            } else {
                echo '<script>alert("user deleted successfully")</script>'; 
               
            }
            
      
    }
}
