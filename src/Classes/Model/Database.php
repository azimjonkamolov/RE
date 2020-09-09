<?php
    namespace App\Classes\Model;
    use PDO;
    use PDOException;
    class Database{
        public $database_handler;
        public $host = "localhost";
        public $dbname = "rephp";
        public $user = "root";
        public $password = "";

        public function __construct()
        {
            try{
                $this->database_handler = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
                // echo "DB Connected";
            }
            catch (PDOException $error){
                echo $error->getMessage();
            }
        }

    }