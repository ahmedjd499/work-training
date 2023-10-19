<?php
session_start();

// Include necessary files and define your routes

require_once './controllers/UserController.php';
require_once './controllers/AuthController.php';
require_once './controllers/CarController.php';
require_once './controllers/RentController.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    header('Location: ./views/home.php');
}
$userController = new UserController();
$carController = new CarController();
$rentController = new RentController();

// Route requests to the appropriate controllers and actions
switch ($action) {

    case 'register':
        $userController->register();
        break;
    case 'login':
        $authController = new AuthController();

        $authController->login();
        break;

    case 'logout':
        $authController = new AuthController();

        $authController->logout();
        break;
    case 'profile':
        if (isset($_GET['isAdmin']) && $_GET['isAdmin'] == "admin") {
            include "./views/adminProfile.php";
        } else
            include "./views/profile.php";
        break;
    case 'edit':
        $userController->edit();
        break;
    case 'adminEdit':
        $userController->adminEdit($_GET['id']);
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $userController->delete($_GET['id']);
        }
        break;
    case 'allUsers':
        $userController->allUsers();
        break;

    case 'admin':
        $userController->admin();
        break;
    case 'search':
        $userController->search();
        break;
    case 'addCar':
        $carController->add();
        break;
    case 'allCars':
        $carController->allCars();
        break;
    case 'deleteCar':
        $carController->delete($_GET['id']);
        break;
    case 'deleteCarPhoto':
        $carController->deleteCarPhoto($_GET['id'],$_GET['car_id']);
        break;
    case 'editCar':
        $carController->edit($_GET['id']);
        break;
    case 'getCarPhotos':
        $carController->getCarPhotos($_GET['id']);
        break;
    case 'loadRentForm':
        $rentController->loadRentForm();
        break;
    case 'addRent':
        $rentController->addRent();
        break;
    case 'allRents':
        $rentController->allRents();
        break;
    default:
        // Redirect to the login page or home page
        include "./views/404.php";

        break;
}
