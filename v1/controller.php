<?php
    include('dbconn.php');
    Class Employes {
        public $name;
        public $age;
        public $salary;
        public $entry;

        function __construct($name, $age, $salary, $entry){
            $this->name = $name;
            $this->age = $age;
            $this->salary = $salary;
            $this->entry = $entry;
        }

        function select(){
            global $db;
            $employ = $db->query("SELECT * FROM `employe`");
            while($row = $employ->fetch(PDO::FETCH_ASSOC)){
                $result[] = $row;
                $data = array('status'=>200, 'result'=>$result);
            }
            return json_encode($data);
        }

        function find($id){
            global $db;
            $employ = $db->query("SELECT * FROM `employe` WHERE id = $id");
            while($row = $employ->fetch(PDO::FETCH_ASSOC)){
                $result[] = $row;
                $data = array('status'=>200, 'result'=>$result);
            }
            return json_encode($data);
        }

        function insert(){
            global $db;
            if($employ = $db->exec("INSERT INTO `employe` (`id`, `name`, `age`, `salary`, `entry`) VALUES (NULL, '$this->name', '$this->age', '$this->salary', '$this->entry');")){
                $result = array('status' => $employ, 'message' => 'Employ Added Successfuly');
                return json_encode($result);
            }
            http_response_code(503);
            $result = array('status' => $employ, 'message' => 'Employ Added Failed');
            return json_encode($result);
        }

        function update($id){
            global $db;
            if($employ = $db->exec("UPDATE `employe` SET `name` = '$this->name', `age` = '$this->age', `salary` = '$this->salary', `entry` = '$this->entry' WHERE `employe`.`id` = $id;")){
                $result = array('status' => $employ, 'message' => 'Employ Updated Successfuly');
                return json_encode($result);
            }
            http_response_code(503);
            $result = array('status' => $employ, 'message' => 'Employ Updated Failed');
            return json_encode($result);
        }

        function delete($id){
            global $db;
            if($employ = $db->exec("DELETE FROM `employe` WHERE `employe`.`id` = $id")){
                $result = array('status' => $employ, 'message' => 'Employ Deleted Successfuly');
                return json_encode($result);
            }
            http_response_code(503);
            $result = array('status' => $employ, 'message' => 'Employ Deleted Failed');
            return json_encode($result);
        }
    }
?>