<?php
class UserController
{
    private $userModel;
    private $uploaddir = 'public/uploads/';

    public function __construct()
    {   
        require_once('./config/config.php');

        $this->userModel = UserModel::class;
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email =  filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

            $password =hash('sha256', Salt .filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

           if(!empty($_FILES['profile_picture']['name']))
           { $uploadfile = uniqid(). basename($_FILES['profile_picture']['name']);
           
            try {
                move_uploaded_file($_FILES['profile_picture']['tmp_name'],$this->uploaddir . $uploadfile);
            
            } catch(Exception) {
                echo "error while uploading file\n";}
            }else $uploadfile='default.png';
      $role = 'user'; // You can set a default role or implement a role selection mechanism

            // Validate input data (e.g., check for empty fields, valid email format, etc.)

            if ($this->userModel::getUserByEmail($email)) {
                // User with the same email already exists
                echo '<script>alert("User with this email already exists.")</script>';


            } else {
                // Create a new user
                echo($uploadfile);
                if ($this->userModel::createUser($email, $password, $role,$uploadfile)) {
                    // Registration successful, you can redirect to a success page or login page

                    header('Location: index.php?action=login');


                } else {
                    // Registration failed, show an error message
                    echo '<script>alert("registration failed please try again")</script>';
                }
            }
        } else {
            // Load the registration form view
            include './views/create.php';

        }
    }


    public function edit()
    {
        require_once('checkLogin.php');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission and update the user's profile
            $newEmail = filter_input(INPUT_POST, 'new_email', FILTER_VALIDATE_EMAIL);
            if($_FILES['profile_picture'])
          {  $uploadfile = uniqid() .basename($_FILES['profile_picture']['name']);
           
            if (move_uploaded_file($_FILES['profile_picture']['tmp_name'],$this->uploaddir . $uploadfile)) {
            
            } else {
                echo "error while uploading file\n";
            }}else $uploadfile=unserialize($_COOKIE['user'])["photo"];

            if($_POST['new_password']=="") $newPassWord=unserialize($_COOKIE['user'])['password'] ;
            
            else $newPassWord = hash('sha256', Salt .filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
            if ( !($newEmail == unserialize($_COOKIE['user'])["email"]) && $this->userModel::getUserByEmail($newEmail)) {
                // User with the same email already exists
                echo '<script>alert("this email is already in use")</script>';
            } else {
                // Create a new user
                if ($this->userModel::updateUser(unserialize($_COOKIE['user'])["id"], $newEmail, $newPassWord,$uploadfile)) {
                    setcookie('user', serialize($this->userModel::getUserByEmail($newEmail)), time() + 3600, '/');

                    echo '<script>alert("profile updated successfully")</script>';

                    header('Location: ./views/profile.php');


                } else {
                    // Registration failed, show an error message
                    echo '<script>alert("failed to update the profile")</script>';

                }
            }

        } else {
            // Load the edit profile form
            include './views/edit.php';
        }
    }

    public function adminEdit($id)
    {
        require_once('checkLogin.php');
        require_once('checkAdmin.php');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user=$this->userModel::getUserById($id);
            // Handle form submission and update the user's profile
            
            $newEmail = filter_input(INPUT_POST, 'new_email', FILTER_VALIDATE_EMAIL);
            if($_POST['new_password']=="") $newPassWord=$user['password'] ;
            else $newPassWord = hash('sha256', Salt . filter_input(INPUT_POST, 'new_password', FILTER_SANITIZE_STRING));

            if($newEmail==$user['email'] && $newPassWord=="")
              header('Location: index.php?action=admin');

             if(! $newEmail==$user['email'] && $this->userModel::getUserByEmail($newEmail)) {
                // User with the same email already exists
                echo '<script>alert("this email is already in use")</script>';
            } else {
                // Create a new user
                if ($this->userModel::updateUser($id, $newEmail, $newPassWord)) {

                    echo '<script>alert("profile updated successfully")</script>';

                    header('Location: index.php?action=admin');


                } else {
                    // Registration failed, show an error message
                    echo '<script>alert("failed to update the profile")</script>';

                }
            }

        } else {
           $user= $this->userModel::getUserById($_GET['id']) ;

            include './views/adminEdit.php';
        }
    }
    public function delete($id)
    {
        require_once('checkLogin.php');


        if ($this->userModel::deleteUser($id)) {
            if (unserialize($_COOKIE["user"])["role"] == "admin")
                header('Location: index.php?action=admin');
            else if (unserialize($_COOKIE["user"])["id"] == $id) {
                setcookie('user', '', time() + 3600, '/');
                header('Location: index.php?action=login');
            } else 
            header('Location: ./views/accessDinied.php');

        } else {
            echo '<script>alert("user deleted successfully")</script>';

        }


    }

    public function allUsers()
    {
        require_once('checkLogin.php');
        require_once('checkAdmin.php');

        $usersList = $this->userModel::getAllUser();
        include './views/userslist.php';

      
    }

    public function admin()
    {
        require_once('checkLogin.php');
        require_once('checkAdmin.php');
        
        $usersList = $this->userModel::getAllUser();
        include './views/adminDash.php';
        
    }

    public function search()
    {
        require_once('checkLogin.php');
        require_once('checkAdmin.php');
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $searchTerm =trim(filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING));
            $role=trim(filter_input(INPUT_POST, 'role_filter', FILTER_SANITIZE_STRING));
            $date_start=date("Y-m-d H:i", strtotime($_POST["date_start"]));
            $date_end=$_POST["date_end"]?date("Y-m-d H:i", strtotime($_POST["date_end"])) :date('Y-m-d H:i');
     
            $usersList=  $this->userModel::searchUsers($searchTerm,$role,$date_start,$date_end) ;
            if($usersList)
                include './views/userslist.php';
            else echo "no users found" ;
        }
        
    }
}