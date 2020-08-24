<?php
//Database Config
class Database 
{
public $conn;
private $dsn = 'mysql:host=localhost;dbname=gym_management_system';
private  $username = 'root';
private $password = ''; 

    //Connection Function
    public function getConnection()
    {
        $this->conn=null;
        try
        {
            $this->conn = new PDO($this->dsn, $this->username, $this->password);
        }
        catch(PDOException $exp)
        {
            echo "Connection Error".$exp->getMessage();
        }
        return $this->conn;
    }
}







?>