<?php
//Gym Management System
//Class For Members//
class Members
{
//Variables 
public $mem_id;
public $name;
public $gender;
public $Address;
public $contact;
public $joining_date;
public $fee_amount;
public $conn;
//Consractor 
public function __construct($db)
{
$this->conn=$db;
}

//------Add Member Function-------------------//
public function add_member()
{
   // echo var_dump($member);
    $sql="INSERT INTO members (Name,Gender,Date_of_joining,Contact_No,Fee,Address) VALUES(?,?,?,?,?,?)";
    $stmt=$this->conn->prepare($sql);
    $stmt->bindParam(1,$this->name);
    $stmt->bindParam(2,$this->gender);
    $stmt->bindParam(3,$this->joining_date);
    $stmt->bindParam(4,$this->contact);
    $stmt->bindParam(5,$this->fee_amount);
    $stmt->bindParam(6,$this->Address);
    if($stmt->execute())
    {
        return "success";
    }
    else
    {
        return "error";
    }

}
//Method For Delete Memeber 
public function delete_member()
{
    $sql="DELETE  FROM members WHERE mem_id = ?";
    $stmt=$this->conn->prepare($sql);
    $stmt->bindParam(1,$this->mem_id);    
    if($stmt->execute())
    {
        return "success";
    }
    else
    {
        return "error";
    }
}
//Method For Check Member ID exist or not
public function mem_id_exist()
{
    $sql="SELECT  * FROM members WHERE mem_id = ?";
    $stmt=$this->conn->prepare($sql);
    $stmt->bindParam(1,$this->mem_id);    
    $stmt->execute();
    if($stmt->fetch(PDO::FETCH_OBJ))
    {
        return true;
    }
    else
    {
        return false;
    }
}

//Method For Show Member Data From Table
public function member_read()
{
    $sql="SELECT  * FROM members";
    $stmt=$this->conn->prepare($sql);
    $stmt->execute();
    return $stmt;
}
//Method For Counting All Rows in Table
public function CountRows()
{
    $sql="SELECT mem_id FROM members";
    $stmt=$this->conn->prepare($sql);
    $stmt->execute();
    $num=$stmt->rowCount();
    return $num;
}
//Method For Select Data For Sepecific Member--->include_once
public function read_one()
{
    $sql="SELECT  * FROM members WHERE mem_id = ?";
    $stmt=$this->conn->prepare($sql);
    $stmt->bindParam(1,$this->mem_id);    
    $stmt->execute();
    return $stmt;
}
}
?>