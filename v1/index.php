<?php
    include('functions.php');

    $req_method = $_SERVER["REQUEST_METHOD"];
    switch($req_method){
        case 'GET':
            if(isset($_GET['id'])){
                $query = new Employes("", "", "", "");
                echo $query->find($_GET['id']);
            }else{
                $query = new Employes("", "", "", "");
                echo $query->select();
            }
            break;
        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);
            $name = $data['name'];
            $age = $data['age'];
            $salary = $data['salary'];
            $entry = $data['entry'];

            $query = new Employes("$name", "$age", "$salary", "$entry");
            echo $query->insert();
            break;
        case 'PUT':
            $data = json_decode(file_get_contents("php://input"), true);
            $name = $data['name'];
            $age = $data['age'];
            $salary = $data['salary'];
            $entry = $data['entry'];

            $query = new Employes("$name", "$age", "$salary", "$entry");
            echo $query->update($_GET['id']);
            break;
        case 'DELETE':
            $query = new Employes("", "", "", "");
            echo $query->delete($_GET['id']);
            break;
        default:
            header("HTTP/1.0 405 Method Not Allowed"); 
            $message = array('message'=>'Method Not Allowed');
            echo json_encode($message);
            break;
    }
?>