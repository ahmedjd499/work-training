<?php
class RentController
{
    private $carModel;
    private $rentModel;
    private $uploaddir = 'public/car-photos/';

    public function __construct()
    {
        require_once('./config/config.php');
        require_once('./models/RentModel.php');

        $this->carModel = carModel::class;
        $this->rentModel = RentModel::class;
    }

    function calculateHoursDifference($startDateTime, $endDateTime) {
        // Create DateTime objects from the provided strings or timestamps
        $start = new DateTime($startDateTime);
        $end = new DateTime($endDateTime);
    
        // Calculate the interval between the two DateTime objects
        $interval = $start->diff($end);
    
        // Calculate the total hours difference as a float
        $hoursDifference = $interval->h + ($interval->i / 60) + ($interval->s / 3600) + ($interval->days * 24);
    
        return $hoursDifference;
    }




    public function loadRentForm()
    {
        require('checkLogin.php');
 

           
    
           
            include './views/addRent.php';
        
    }

    
    public function addRent()
    {
        require('checkLogin.php');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $date_start=date("Y-m-d H:i", strtotime($_POST["rent_start"]));
            $date_end=date("Y-m-d H:i", strtotime($_POST["rent_end"]));
            $action=$_POST["action"] ;
            $carId=$_POST["car_id"];
            $userId=unserialize($_COOKIE['user'])['id'] ;
            if($action=="rent")
            try 
           {  
            $car=$this->carModel::getCarById($carId);
            $totalPrice=$this->calculateHoursDifference($date_start,$date_end) * $car['hourly_price'];
                $this->rentModel::createRent($carId, $userId, $totalPrice,$date_start,$date_end);
                  echo '<script>alert("rent  requested")</script>' ;
             
            } catch (Exception) {
                echo '<script>alert("rent failed please try again")</script>';
            }else {
               $carsList=$this->carModel::getFreeCar($date_start);
               include ('views/freeCarsList.php');

            }
        } else

            echo '<script>alert("rent failed please try again")</script>' ;
        
    }


    public function edit($carId)
    {
        require_once('checkLogin.php');
        require_once('checkAdmin.php');
        $car=$this->carModel::getCarById($carId);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission and update the car's info
            $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
            $marque = filter_input(INPUT_POST, 'marque', FILTER_SANITIZE_STRING);
            $hourlyPrice = filter_input(INPUT_POST, 'hourly_price', FILTER_SANITIZE_STRING);
          
            if(count($_FILES['file'])>0)
              
            { 
                for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
                    $fileName = $_FILES['file']['name'][$i];
                    $fileTmpName = $_FILES['file']['tmp_name'][$i];
                  
                        
             $uploadfile = uniqid(). basename($fileName);

             try {
                 move_uploaded_file($fileTmpName,$this->uploaddir . $uploadfile);
                 $this->carModel::createCarPhoto($carId, $uploadfile);

             } catch(Exception) {
                 echo "error while uploading file\n";}
             }
            }
            if ($this->carModel::updatecar($carId,$model, $marque, $hourlyPrice)) {
                  
                header('Location: index.php?action=admin&whereTo=cars');
                } else {
                    // Registration failed, show an error message
                    echo '<script>alert("failed to update the profile")</script>';
                }
            
        } else {
            // Load the edit profile form
            include './views/editCar.php';
        }
    }

    public function delete($id)
    {
        require_once('checkLogin.php');
        require_once('checkAdmin.php');


        if ($this->carModel::deleteCar($id)) {
                header('Location: index.php?action=admin&whereTo=cars');
           
        } else {
            echo '<script>alert("error while deleting the car")</script>';
        }
    }


    public function allRents()
    {
        require_once('checkLogin.php');
        require_once('checkAdmin.php');

        $rentList = $this->rentModel::getAllRents();
        include './views/rentlist.php';
    }

}
