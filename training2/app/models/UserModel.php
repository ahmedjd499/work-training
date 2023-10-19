<?php
final class UserModel {
    private static $conn;
    private static $tablename;

    private function __construct() {

    }
    public static function establishConnect() {
        require_once '../app/config/dbConnect.php' ;

        self::$conn = dbConnect::connection();
    }
    public static function setTablename() {
        require_once '../app/config/config.php' ;
        self::$tablename= tablename;   
     }

    
    
    
    public static function createUser($email, $password, $role,$photo) {

        self::establishConnect();
        self::setTablename() ;

        $stmt = self::$conn->prepare("INSERT INTO " . self::$tablename . " (email, password, role,photo,created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $email, $password, $role,$photo);
        

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function getUserByEmail($email) {
        self::establishConnect();
        self::setTablename() ;
        
        $stmt = self::$conn->prepare("SELECT * FROM " . self::$tablename . " WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
   public static function searchUsers($email, $role, $date_start, $date_end) {
    self::establishConnect();
    self::setTablename();

    // Initialize an array to store the conditions
    $conditions = array();
    $bindTypes = "";

    if (!empty($email)) {
        $conditions[] = "email LIKE ?";
        $bindTypes .= "s";
    }

    if (!empty($role)) {
        $conditions[] = "role = ?";
        $bindTypes .= "s";
    }

    if (!empty($date_start) && !empty($date_end)) {
        $conditions[] = "created_at BETWEEN ? AND ?";
        $bindTypes .= "ss";
    }

    // Construct the SQL query
    $query = "SELECT * FROM " . self::$tablename;
    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = self::$conn->prepare($query);

    // Bind parameter values
    $paramValues = array();

    if (!empty($email)) {
        $paramValues[] = "%" . $email . "%";
    }
    if (!empty($role)) {
        $paramValues[] = $role;
    }
    if (!empty($date_start) && !empty($date_end)) {
        $paramValues[] = $date_start;
        $paramValues[] = $date_end;
    }

    if (!empty($paramValues)) {
        $stmt->bind_param($bindTypes, ...$paramValues);
    }
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch all rows into an array
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    } else {
        return null;
    }
}

    public static function getUserById($id) {
        self::establishConnect();
        self::setTablename() ;
        $stmt = self::$conn->prepare("SELECT * FROM " . self::$tablename . " WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public static function getAllUser() {
        self::establishConnect();
        self::setTablename() ;
        $stmt = self::$conn->prepare("SELECT * FROM  " . self::$tablename );
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $users = array();
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            return $users;
        } else {
            return array();
        }
    }

    public static function updateUser($userId, $newEmail, $newPassword,$photo) {
      
        self::establishConnect();
        self::setTablename() ;

        $stmt = self::$conn->prepare("UPDATE " . self::$tablename . " SET email = ?, password = ?,photo = ? WHERE id = ?");
        $stmt->bind_param("sssi", $newEmail, $newPassword,$photo, $userId);

        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

    public static function deleteUser($userId) {
        self::establishConnect();
        self::setTablename() ;
        $stmt = self::$conn->prepare("DELETE FROM " . self::$tablename . " WHERE id = ?");
        $stmt->bind_param("i", $userId);

        if ($stmt->execute()) {
            return true; // User deleted successfully
        } else {
            return false; // Error occurred while deleting user
        }
    }
}

?>
