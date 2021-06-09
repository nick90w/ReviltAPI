<?php
    class Vilt{

        // Connection
        private $conn;

        // Table
        private $db_table = "vilt";

        // Columns
        public $Vilt_id;
        public $Gewicht_glas;
        public $Melding_boolean;
        public $Word_afgehandeld;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getViltInfo(){
            $sqlQuery = "SELECT Vilt_id, Gewicht_glas, Melding_boolean, Word_afgehandeld FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createVilt(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        Gewicht_glas = :Gewicht_glas, 
                        Melding_boolean = :Melding_boolean, 
                        Word_afgehandeld = :Word_afgehandeld";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->Gewicht_glas=htmlspecialchars(strip_tags($this->Gewicht_glas));
            $this->Melding_boolean=htmlspecialchars(strip_tags($this->Melding_boolean));
            $this->Word_afgehandeld=htmlspecialchars(strip_tags($this->Word_afgehandeld));
        
            // bind data
            $stmt->bindParam(":Gewicht_glas", $this->Gewicht_glas);
            $stmt->bindParam(":Melding_boolean", $this->Melding_boolean);
            $stmt->bindParam(":Word_afgehandeld", $this->Word_afgehandeld);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleVilt(){
            $sqlQuery = "SELECT
                        Vilt_id, 
                        Gewicht_glas, 
                        Melding_boolean, 
                        Word_afgehandeld
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       Vilt_id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->Vilt_id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->Vilt_id = $dataRow['Vilt_id'];
            $this->Gewicht_glas = $dataRow['Gewicht_glas'];
            $this->Melding_boolean = $dataRow['Melding_boolean'];
            $this->Word_afgehandeld = $dataRow['Word_afgehandeld'];
        }        

        // UPDATE
        public function updateVilt(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        Gewicht_glas = :Gewicht_glas, 
                        Melding_boolean = :Melding_boolean, 
                        Word_afgehandeld = :Word_afgehandeld
                    WHERE 
                        Vilt_id = :Vilt_id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->Gewicht_glas=htmlspecialchars(strip_tags($this->Gewicht_glas));
            $this->Melding_boolean=htmlspecialchars(strip_tags($this->Melding_boolean));
            $this->Word_afgehandeld=htmlspecialchars(strip_tags($this->Word_afgehandeld));
            
            // bind data
            $stmt->bindParam(":Gewicht_glas", $this->Gewicht_glas);
            $stmt->bindParam(":Melding_boolean", $this->Melding_boolean);
            $stmt->bindParam(":Word_afgehandeld", $this->Word_afgehandeld);
            $stmt->bindParam(":Vilt_id", $this->Vilt_id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteVilt(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE Vilt_id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->Vilt_id=htmlspecialchars(strip_tags($this->Vilt_id));
        
            $stmt->bindParam(1, $this->Vilt_id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

        function GetMeldingen(){

                    $sqlQuery = "SELECT
                        Vilt_id, 
                        Gewicht_glas, 
                        Word_afgehandeld
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       Melding_boolean = 1";

            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;


        }

        function SetWord_afgehandeld(){

                    $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET 
                        Word_afgehandeld = :Word_afgehandeld
                    WHERE 
                        Vilt_id = :Vilt_id";
        
            $stmt = $this->conn->prepare($sqlQuery);

            $this->Word_afgehandeld=htmlspecialchars(strip_tags($this->Word_afgehandeld));
        
            // bind data
            $stmt->bindParam(":Word_afgehandeld", $this->Word_afgehandeld);
            $stmt->bindParam(":Vilt_id", $this->Vilt_id);
        
            if($stmt->execute()){
               return true;
            }
            return false;


        }

        function SendESPData(){

                    $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET 
                        Gewicht_glas = :Gewicht_glas
                    WHERE 
                        Vilt_id = :Vilt_id";
        
            $stmt = $this->conn->prepare($sqlQuery);

            $this->Word_afgehandeld=htmlspecialchars(strip_tags($this->Word_afgehandeld));
        
            // bind data
            $stmt->bindParam(":Gewicht_glas", $this->Word_afgehandeld);
            $stmt->bindParam(":Vilt_id", $this->Vilt_id);
        
            if($stmt->execute()){
               return true;
            }
            return false;


        }


    }
?>