<?php
    namespace App\Classes\RealEstate;
    use App\Classes\Model\Database;
    use PDO, PDOException;
    class RealEstate extends Database{
        private $id;
        private $name;
        private $owner_name;
        private $contact;
        private $monthly_charge;
        private $images;
        private $address;
        private $access;
        private $utility;
        private $floor_space;
        private $description;
        // Setting Up Data
        public function setData($arrData){
            if(array_key_exists('id',$arrData)){
                $this->id = $arrData['id'];
            }
            if(array_key_exists('name',$arrData)){
                $this->name = $arrData['name'];
            }
            if(array_key_exists('owner_name',$arrData)){
                $this->owner_name = $arrData['owner_name'];
            }
            if(array_key_exists('contact',$arrData)){
                $this->contact = $arrData['contact'];
            }
            if(array_key_exists('monthly_charge',$arrData)){
                $this->monthly_charge = $arrData['monthly_charge'];
            }
            if(array_key_exists('images',$arrData)){
                $this->images = $arrData['images'];
            }
            if(array_key_exists('address',$arrData)){
                $this->address = $arrData['address'];
            }
            if(array_key_exists('access',$arrData)){
                $this->access = $arrData['access'];
            }
            if(array_key_exists('utility',$arrData)){
                $this->utility = $arrData['utility'];
            }
            if(array_key_exists('floor_space',$arrData)){
                $this->floor_space = $arrData['floor_space'];
            }
            if(array_key_exists('description',$arrData)){
                $this->description = $arrData['description'];
            }
        }
        // Get All Data
        public function viewAllData(){
            $sql = "SELECT * FROM real_estate";
            $statement_handler = $this->database_handler->query($sql);
            $statement_handler->setFetchMode(PDO::FETCH_OBJ);
            return $statement_handler->fetchAll();
        }
        // Get Single Data
        public function viewSingleData($id){
            $sql = "SELECT * FROM real_estate WHERE id = ".$id;
            $statement_handler = $this->database_handler->query($sql);
            $statement_handler->setFetchMode(PDO::FETCH_OBJ);
            return $statement_handler->fetch();
        }
        // Get Search
        public function search($term){
            $sql = "SELECT * FROM `real_estate` WHERE `name` LIKE '%".$term."%' OR `address` LIKE '%".$term."%'";
            $statement_handler = $this->database_handler->query($sql);
            $statement_handler->setFetchMode(PDO::FETCH_OBJ);
            $all_data = $statement_handler->fetchAll();
            return $all_data;
        }
        public function viewTopData(){
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