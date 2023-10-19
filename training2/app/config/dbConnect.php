
<?php
final class  dbConnect {

    private $host ;
    private $username ;
    private $password ;
    private $dbName ;
    private $conn ;

    private function __construct(){
       

    }
    public static function connection (){
        require_once 'config.php' ;
        $host=host ;
        $username=username ;
        $password=password ;
        $dbName=dbName ;
        $conn=new mysqli('localhost', 'root', '', 'trainingdb');
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn ;

    }
}
 

?>
