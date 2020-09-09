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
        public function search($request_array){
            $sql = "SELECT * FROM 'real_estate' WHERE 'name' LIKE '%".$request_array['search']."%' OR 'address' LIKE '%".$request_array['search']."%'";
            $statement_handler = $this->database_handler->query($sql);
            $statement_handler->setFetchMode(PDO::FETCH_OBJ);
            $all_data = $statement_handler->fetchAll();
            return $all_data;
        }
        public function getAllKeywords(){
            $_all_keywords = array();
            $words_arr = array();
            $all_data = $this -> viewAllData();
            foreach($all_data as $single_data){
                $_all_keywords[] = trim($single_data->name);
            }
            $all_data = $this->viewAllData();
            foreach($all_data as $single_data){
                $each_string = strip_tags($single_data->name);
                $each_string = trim($each_string);
                $each_string = preg_replace("/\r|n/", " ", $each_string);
                $each_string = str_replace("&nbsp;","", $each_string);
                $words_arr = explode(" ", $each_string);
                foreach($words_arr as $each_word){
                    $_all_keywords[] = trim($each_word);
                }
            }
            return array_unique($_all_keywords);
        }
    }