<?php 
    header("Refresh: 900; URL=deleteSession.php");

    class Database {

        private $host = "127.0.0.1";
       // private $database_name = LoginIntoDB();
        private $username = "root";
        private $password = "";

        public $conn;

        public function getConnection(){
           // $database_name = $this->LoginIntoDB();
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
                //$database_name = "";
                return $_SESSION["Naam_bedrijf"];
            }
            else
            {

                 if(isset($_GET["user"]) and isset($_GET["pass"]))
                 {

                    $mysqli = new mysqli("localhost", "root", "", "loginbedrijfrevilt");
                    if($mysqli->connect_error) {
  		exit('Error connecting to database'); 
		}          
                    
		$user = $_GET["user"];
		$pass = $_GET["pass"];

                $stmt = $mysqli->prepare("SELECT Naam_bedrijf FROM bedrijf WHERE (Gebruikersnaam = ?) And (Password = ?)");
                
		$stmt->bind_param("ss",$user,$pass);
                
                $stmt->execute();

		$stmt->store_result();
		
		if($stmt->num_rows === 0) exit('No rows');
		$stmt->bind_result($Naam_bedrijf);
		while($stmt->fetch()) {
 		$Naam_bedrijven[] = $Naam_bedrijf;
  		
		}

		return $Naam_bedrijf;
		$stmt->close();

                    // return "loginbedrijfrevilt";
            	}	
                 else
                 {
                      // $database_name = "loginbedrijfrevilt";
                      return "loginbedrijfrevilt";
                 }
               
               
            }
        }

    }

?>