<?php
final class RentModel {
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
        self::$tablename= rentTablename;   
     }

    
    
    
     public static function createRent($carId, $userId, $totalPrice,$rentStart, $rentEnd) {
       
        self::establishConnect();
        self::setTablename();
        $stmt = self::$conn->prepare("INSERT INTO " . self::$tablename . " (car_id, user_id, total_price, rent_start, rent_end, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
        
        if ($stmt === false) {
            // Add error handling here
            echo "Error in SQL query: " . self::$conn->error;
            return null;
        }
    
        $stmt->bind_param("iisss", $carId, $userId, $totalPrice,$rentStart,$rentEnd);
    
        if ($stmt->execute()) {
            // Return the ID of the created car
            return true ;
        } else {
            // Add error handling here
            echo "Error executing query: " . $stmt->error;
            return null;
        }
    }
   


    public static function getRentById($id) {
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



    public static function getAllRents() {
        self::establishConnect();
        self::setTablename();
        $stmt = self::$conn->prepare("SELECT car.id, car.marque, car.model, car.hourly_price, rent.rent_start, rent.rent_end, rent.total_price, users.email
                                     FROM car
                                     INNER JOIN rent ON car.id = rent.car_id
                                     INNER JOIN users ON rent.user_id = users.id ;");
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $rents = array();
            while ($row = $result->fetch_assoc()) {
                $rents[] = $row;
            }
            return $rents;
        } else {
            return array();
        }
    }
    

    public static function getUserRents($userId) {
        self::establishConnect();
        self::setTablename() ;
        $stmt = self::$conn->prepare("SELECT car.marque, car.model, car.hourly_price, rent.rent_start, rent.rent_end, rent.total_price
                                        FROM car
                                        INNER JOIN rent ON car.id = rent.car_id
                                        WHERE rent.user_id = ? ;");
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $rents = array();
            while ($row = $result->fetch_assoc()) {
                $rents[] = $row;
            }
            return $rents;
        } else {
            return array();
        }
    }


    public static function deleteRent($rentId) {
        self::establishConnect();
        self::setTablename() ;
        $stmt = self::$conn->prepare("DELETE FROM " . self::$tablename . " WHERE id = ?");
        $stmt->bind_param("i", $rentId);

        if ($stmt->execute()) {
            return true; // Car deleted successfully
        } else {
            return false; // Error occurred while deleting Car
        }
    }

    
}
