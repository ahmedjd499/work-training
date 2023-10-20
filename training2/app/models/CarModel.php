<?php
final class CarModel {
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
        self::$tablename= carTablename;   
     }

    
    
    
     public static function createCar($model, $marque, $hourlyPrice) {
        self::establishConnect();
        self::setTablename();
        $stmt = self::$conn->prepare("INSERT INTO " . self::$tablename . " (model, marque, hourly_price, created_at) VALUES (?, ?, ?, NOW())");
        
        if ($stmt === false) {
            // Add error handling here
            echo "Error in SQL query: " . self::$conn->error;
            return null;
        }
    
        $stmt->bind_param("sss", $model, $marque, $hourlyPrice);
    
        if ($stmt->execute()) {
            // Return the ID of the created car
            return self::$conn->insert_id;
        } else {
            // Add error handling here
            echo "Error executing query: " . $stmt->error;
            return null;
        }
    }
    public static function createCarPhoto($carId, $photo_path) {
        self::establishConnect();
        self::setTablename();
        $stmt = self::$conn->prepare("INSERT INTO car_photos (car_id, path ,created_at ) VALUES (?, ?, NOW())");
        
        if ($stmt === false) {
            // Add error handling here
            echo "Error in SQL query: " . self::$conn->error;
            return null;
        }
    
        $stmt->bind_param("ss", $carId, $photo_path);
    
        if ($stmt->execute()) {
            // Return the ID of the created car
            return true ;
        } else {
            // Add error handling here
            echo "Error executing query: " . $stmt->error;
            return null;
        }
    }


    public static function getCarById($id) {
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

    public static function getCarStatus($id) {
        self::establishConnect();
        self::setTablename() ;
        $stmt = self::$conn->prepare("SELECT car_id FROM rent WHERE car_id = ? and (rent_end > NOW() or rent_start > NOW() )");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            return false ;
        } else {
            return true;
        }
    }

    public static function getFreeCar($date_start) {
        self::establishConnect();
        self::setTablename();
    
        $sql = "SELECT " . self::$tablename . ".* FROM " . self::$tablename . " 
                LEFT JOIN rent ON " . self::$tablename . ".id = rent.car_id 
                WHERE rent.car_id IS NULL OR rent.rent_end < ? 
                OR " . self::$tablename . ".id NOT IN (SELECT car_id FROM rent )";
    
        $stmt = self::$conn->prepare($sql);
    
        if ($stmt === false) {
            echo "Error in SQL query: " . self::$conn->error;
            return array();
        }
    
        $stmt->bind_param("s", $date_start);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $Cars = array();
            while ($row = $result->fetch_assoc()) {
                $Cars[] = $row;
            }
            return $Cars;
        } else {
            return array();
        }
    }
    


    public static function getAllCars() {
        self::establishConnect();
        self::setTablename() ;
        $stmt = self::$conn->prepare("SELECT * FROM  " . self::$tablename );
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $Cars = array();
            while ($row = $result->fetch_assoc()) {
                $Cars[] = $row;
            }
            return $Cars;
        } else {
            return array();
        }
    }

    public static function updateCar($CarId,$model,$marque,$hourlyPrice) {
      
        self::establishConnect();
        self::setTablename() ;

        $stmt = self::$conn->prepare("UPDATE " . self::$tablename . " SET model = ?, marque = ?,hourly_price = ? WHERE id = ?");
        $stmt->bind_param("sssi", $model, $marque,$hourlyPrice, $CarId);

        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

    public static function deleteCar($CarId) {
        self::establishConnect();
        self::setTablename() ;
        $stmt = self::$conn->prepare("DELETE FROM " . self::$tablename . " WHERE id = ?");
        $stmt->bind_param("i", $CarId);

        if ($stmt->execute()) {
            return true; // Car deleted successfully
        } else {
            return false; // Error occurred while deleting Car
        }
    }

    public static function deleteCarPhoto($id) {
        self::establishConnect();
        self::setTablename() ;
        $stmt = self::$conn->prepare("DELETE FROM car_photos WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true; // Car deleted successfully
        } else {
            return false; // Error occurred while deleting Car
        }
    }

    public static function getAllPhotos($carId) {
        self::establishConnect();
        self::setTablename();
        
        $sql = "SELECT * FROM car_photos WHERE car_id = ?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param("i", $carId); // Assuming car_id is an integer
    
        $photos = [];
    
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $photos[] = $row;
            }
        } else {
            // Handle the error, e.g., return an empty array or log the error
        }
    
        return $photos;
    }
    
}

?>
