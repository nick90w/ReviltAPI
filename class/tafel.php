<?php
    class Tafel{

        // Connection
        private $conn;

        // Table
        private $db_table = "tafel";

        // Columns
        public $tafel_id;
        public $vilt_id;
        public $bedrijf_id;

        // Db connection
        public function __construct($db)
        {
            $this->conn = $db;
        }

        // GET ALL
        public function getTafelInfo()
        {
            $sqlQuery = "SELECT tafel_id, vilt_id, bedrijf_id FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
       /* public function createTafel()
       {
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
        
            if($stmt->execute())
            {
               return true;
            }
            return false;
        }*/

        // READ single
        public function getSingleTafel()
        {
            $sqlQuery = "SELECT
                        tafel_id, 
                        vilt_id, 
                        bedrijf_id
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       tafel_id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->tafel_id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->tafel_id = $dataRow['tafel_id'];
            $this->vilt_id = $dataRow['vilt_id'];
            $this->bedrijf_id = $dataRow['bedrijf_id'];
        }        

        // UPDATE
        public function updateTafel()
        {
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        vilt_id = :vilt_id, 
                        bedrijf_id = :bedrijf_id, 
                    WHERE 
                        tafel_id = :tafel_id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->vilt_id=htmlspecialchars(strip_tags($this->vilt_id));
            $this->bedrijf_id=htmlspecialchars(strip_tags($this->bedrijf_id));
        
            // bind data
            $stmt->bindParam(":vilt_id", $this->vilt_id);
            $stmt->bindParam(":bedrijf_id", $this->bedrijf_id);
            $stmt->bindParam(":tafel_id", $this->tafel_id);
        
            if($stmt->execute())
            {
               return true;
            }
            return false;
        }

        // DELETE
        function deleteTafel()
        {
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE tafel_id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->tafel_id=htmlspecialchars(strip_tags($this->tafel_id));
        
            $stmt->bindParam(1, $this->tafel_id);
        
            if($stmt->execute())
            {
                return true;
            }
            return false;
        }

    }
?>