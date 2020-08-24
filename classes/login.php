<?php
//Login Class
class Login
{
public $id;
public $email;
public $password;
public $conn;
public $username;
public $table_name="login";
public function __construct($db)
{
$this->conn=$db;
}
//Create Login Function
public function login($user)
{
$sql="SELECT *FROM login  WHERE username = ?";
$stmt=$this->conn->prepare($sql);
$stmt->bindParam(1,$user["email"]);
//$stmt->bindParam(2,$user["password"]);
$stmt->execute();
 if($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
    if(md5($user["password"]) == $row['password'])
    {  session_start();
        $_SESSION['logged_in'] = [
            'id'			=> 	$row['id'],
            'name'  =>  $row['name'],
        ];    
     return true;
    }
    else
    {
        return false;
    }
 }
 else
 {
     return false;
 }

}
//Login Method
//ListAll User Method
//Auth Method
//Update Password
}


?>