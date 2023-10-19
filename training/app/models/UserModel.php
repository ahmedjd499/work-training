<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=localhost;dbname=trainingdb", "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    }

    public function createUser($email, $password, $role) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (email, password, role, created_at) VALUES (:email, :password, :role, NOW())";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateUser($userId, $newEmail, $newPassword) {
        if( $newPassword == "") $newPassword=$_SESSION['user']["password"] ;
        $query = "UPDATE users SET email = :email, password = :password WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $userId);
        $stmt->bindParam(':email', $newEmail);
        $stmt->bindParam(':password', $newPassword);

        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

    public function deleteUser($userId) {
        // Define the SQL query to delete the user by their ID
        $sql = "DELETE FROM users WHERE id = :user_id";

        // Prepare the SQL statement
        $stmt = $this->db->prepare($sql);

        // Bind the user_id parameter
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);

        // Execute the query to delete the user
        if ($stmt->execute()) {
            return true; // User deleted successfully
        } else {
            return false; // Error occurred while deleting user
        }
    }



}

?>
