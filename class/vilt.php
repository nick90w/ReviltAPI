<?php
    class Vilt{

        // Connection
        private $conn;

        // Table
        private $db_table = "vilt";

        // Columns
        public $vilt_id;
        public $gewicht_glas;
        public $melding_boolean;
        public $word_afgehandeld;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getViltInfo(){
            $sqlQuery = "SELECT vilt_id, gewicht_glas, melding_boolean, word_afgehandeld FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createVilt(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        gewicht_glas = :gewicht_glas, 
                        melding_boolean = :melding_boolean, 
                        word_afgehandeld = :word_afgehandeld";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->gewicht_glas=htmlspecialchars(strip_tags($this->gewicht_glas));
            $this->melding_boolean=htmlspecialchars(strip_tags($this->melding_boolean));
            $this->word_afgehandeld=htmlspecialchars(strip_tags($this->word_afgehandeld));
        
            // bind data
            $stmt->bindParam(":gewicht_glas", $this->gewicht_glas);
            $stmt->bindParam(":melding_boolean", $this->melding_boolean);
            $stmt->bindParam(":word_afgehandeld", $this->word_afgehandeld);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleVilt(){
            $sqlQuery = "SELECT
                        vilt_id, 
                        gewicht_glas, 
                        melding_boolean, 
                        word_afgehandeld
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       vilt_id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->vilt_id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->vilt_id = $dataRow['vilt_id'];
            $this->gewicht_glas = $dataRow['gewicht_glas'];
            $this->melding_boolean = $dataRow['melding_boolean'];
            $this->word_afgehandeld = $dataRow['word_afgehandeld'];
        }        

        // UPDATE
        public function updateVilt(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        gewicht_glas = :gewicht_glas, 
                        melding_boolean = :melding_boolean, 
                        word_afgehandeld = :word_afgehandeld, 
                    WHERE 
                        vilt_id = :vilt_id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->gewicht_glas=htmlspecialchars(strip_tags($this->gewicht_glas));
            $this->melding_boolean=htmlspecialchars(strip_tags($this->melding_boolean));
            $this->word_afgehandeld=htmlspecialchars(strip_tags($this->word_afgehandeld));
        
            // bind data
            $stmt->bindParam(":gewicht_glas", $this->gewicht_glas);
            $stmt->bindParam(":melding_boolean", $this->melding_boolean);
            $stmt->bindParam(":word_afgehandeld", $this->word_afgehandeld);
            $stmt->bindParam(":vilt_id", $this->vilt_id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteVilt(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE vilt_id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->vilt_id=htmlspecialchars(strip_tags($this->vilt_id));
        
            $stmt->bindParam(1, $this->vilt_id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>