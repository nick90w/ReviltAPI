<?php
    class Bedrijf{

        // Connection
        private $conn;

        // Table
        private $db_table = "bedrijf";

        // Columns
        public $bedrijf_id;
        public $Naam_bedrijf;
        public $Gebruikersnaam;
        public $Password;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getBedrijfInfo(){
            $sqlQuery = "SELECT Bedrijf_id, Naam_bedrijf, Gebruikersnaam, Password FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createBedrijf(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        Naam_bedrijf = :Naam_bedrijf, 
                        Gebruikersnaam = :Gebruikersnaam, 
                        Password = :Password";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->Naam_bedrijf=htmlspecialchars(strip_tags($this->Naam_bedrijf));
            $this->Gebruikersnaam=htmlspecialchars(strip_tags($this->Gebruikersnaam));
            $this->Password=htmlspecialchars(strip_tags($this->Password));
        
            // bind data
            $stmt->bindParam(":Naam_bedrijf", $this->Naam_bedrijf);
            $stmt->bindParam(":Gebruikersnaam", $this->Gebruikersnaam);
            $stmt->bindParam(":Password", $this->Password);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleBedrijf(){
            $sqlQuery = "SELECT
                        Bedrijf_id, 
                        Naam_bedrijf, 
                        Gebruikersnaam, 
                        Password
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       Bedrijf_id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->bedrijf_id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->bedrijf_id = $dataRow['Bedrijf_id'];
            $this->Naam_bedrijf = $dataRow['Naam_bedrijf'];
            $this->Gebruikersnaam = $dataRow['Gebruikersnaam'];
            $this->Password = $dataRow['Password'];
        }        

        // UPDATE
        public function updateBedrijf(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        Naam_bedrijf = :Naam_bedrijf, 
                        Gebruikersnaam = :Gebruikersnaam, 
                        Password = :Password
                    WHERE 
                        Bedrijf_id = :Bedrijf_id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->Naam_bedrijf=htmlspecialchars(strip_tags($this->Naam_bedrijf));
            $this->Gebruikersnaam=htmlspecialchars(strip_tags($this->Gebruikersnaam));
            $this->Password=htmlspecialchars(strip_tags($this->Password));
        
            // bind data
            $stmt->bindParam(":Naam_bedrijf", $this->Naam_bedrijf);
            $stmt->bindParam(":Gebruikersnaam", $this->Gebruikersnaam);
            $stmt->bindParam(":Password", $this->Password);
            $stmt->bindParam(":Bedrijf_id", $this->Bedrijf_id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteVilt(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE Bedrijf_id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->Bedrijf_id=htmlspecialchars(strip_tags($this->Bedrijf_id));
        
            $stmt->bindParam(1, $this->Bedrijf_id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>