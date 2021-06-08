<?php 
    header("Refresh: 900; URL=deleteSession.php");

    class Database {

        private $host = "127.0.0.1";
        //private $database_name;
        private $username = "root";
        private $password = "";

        public $conn;

        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->LoginIntoDB(), $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }

        public function LoginIntoDB(){
            if(isset($_SESSION["bedrijf_id"]) and isset($_SESSION["Naam_bedrijf"]))
            {
                //$database_name = $_SESSION;
                return $_SESSION["Naam_bedrijf"];
            }
            else
            {
               // $database_name = "loginbedrijfrevilt";
               return "loginbedrijfrevilt";
            }
        }
    }

?>