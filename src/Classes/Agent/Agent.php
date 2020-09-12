<?php
    namespace App\Classes\Agent;
    use App\Classes\Model\Database;
    use PDO, PDOException;
    class Agent extends Database{
        private $agent_id;
        private $agent_name;
        private $agent_email;
        private $agent_phone;
        private $agent_address;
        private $agent_about;
        private $agent_image;
        // Setting Up Data
        public function setData($arrData){
            if(array_key_exists('agent_id',$arrData)){
                $this->agent_id = $arrData['agent_id'];
            }
            if(array_key_exists('agent_name',$arrData)){
                $this->agent_name = $arrData['agent_name'];
            }
            if(array_key_exists('agent_email',$arrData)){
                $this->agent_email = $arrData['agent_email'];
            }
            if(array_key_exists('agent_phone',$arrData)){
                $this->agent_phone = $arrData['agent_phone'];
            }
            if(array_key_exists('agent_address',$arrData)){
                $this->agent_address = $arrData['agent_address'];
            }
            if(array_key_exists('agent_about',$arrData)){
                $this->agent_about = $arrData['agent_about'];
            }
            if(array_key_exists('agent_image',$arrData)){
                $this->agent_image = $arrData['agent_image'];
            }
        }

        // Get All Data
        public function viewAllAgent(){
            $sql = "SELECT * FROM agents";
            $statement_handler = $this->database_handler->query($sql);
            $statement_handler->setFetchMode(PDO::FETCH_OBJ);
            return $statement_handler->fetchAll();
        }
        // Get Single Data
        public function viewSingleAgent($id){
            $sql = "SELECT * FROM agents WHERE id = ".$id;
            $statement_handler = $this->database_handler->query($sql);
            $statement_handler->setFetchMode(PDO::FETCH_OBJ);
            return $statement_handler->fetch();
        }
        // Get Search
        public function searchAgent($term){
            $sql = "SELECT * FROM `agents` WHERE `name` LIKE '%".$term."%' OR `address` LIKE '%".$term."%'";
            $statement_handler = $this->database_handler->query($sql);
            $statement_handler->setFetchMode(PDO::FETCH_OBJ);
            $all_data = $statement_handler->fetchAll();
            return $all_data;
        }
        public function viewTopAgent(){
            $sql = "SELECT * FROM `real_estate` WHERE top > 0";
            $statement_handler = $this->database_handler->query($sql);
            $statement_handler->setFetchMode(PDO::FETCH_OBJ);
            $value_count = 0;
            for($value_count = 0; $value_count < 5; $value_count++)
            {
                $all_data[$value_count] = $statement_handler->fetch();
            }
            return $all_data;
        }
    }