<?php
class CarController
{
    private $carModel;
    private $uploaddir = 'public/car-photos/';

    public function __construct()
    {
        require_once('./config/config.php');
        require_once('./models/CarModel.php');

        $this->carModel = carModel::class;
    }

    public function add()
    {
        require ('checkAdmin.php');
        require('checkLogin.php');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $marque =  filter_input(INPUT_POST, 'marque', FILTER_SANITIZE_STRING);
            $model =  filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
            $hourlyPrice =  filter_input(INPUT_POST, 'hourly_price', FILTER_VALIDATE_INT);
           
            try 
          {  
                $carId=$this->carModel::createCar($model, $marque, $hourlyPrice);
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
                header('Location: index.php?action=admin&whereTo=cars');
            }

            catch (Exception) {echo '<script>alert("registration failed please try again")</script>';}
        } else {
            // Load the registration form view
            include './views/addCar.php';
        }
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

    public function deleteCarPhoto($id,$carId)
    {
        require_once('checkLogin.php');
        require_once('checkAdmin.php');


        if ($this->carModel::deleteCarPhoto($id)) {

                $this->getCarPhotos($carId);
           
        } else {
            echo '<script>alert("error while deleting the car photo ")</script>';
        }
    }


    public function allCars()
    {
        require_once('checkLogin.php');
        require_once('checkAdmin.php');
       
        $carsList = $this->carModel::getAllCars();
        for ($i=0 ;$i<count($carsList);$i++)
          $carsList[$i]['status']= $this->carModel::getCarStatus($carsList[$i]['id']) ? 'rented' : 'free' ;
      
        include './views/carslist.php';
    }

    public function getCarPhotos($carId)
    {
        require_once('checkLogin.php');

        $carsPhotosList = $this->carModel::getAllPhotos($carId);
        include './views/carsPhotoslist.php';
    }



}
