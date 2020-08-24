<?php
require_once "objects/objects.php";
$member->mem_id=$_POST["id"];
if($member->mem_id_exist())
{
   $data= $member->read_one();
   $row = $data->fetch(PDO::FETCH_ASSOC);
   $result_string='';
   //echo var_dump($row);
   $result_string .= '<form action="member_update.php" method="POST" class="update_member">
   <div class="form-row">
     <div class="form-group col-md-6">
       <label for="name">Name</label>
       <input type="text" name="name" class="form-control" id="up_name" placeholder="Name" value="'.$row["Name"].'">
     </div>
     <div class="form-group col-md-6">
       <label for="contact">Contact No</label>
       <input type="contact" name="contact" class="form-control" id="u_contact" placeholder="Contact No" value="'.$row["Contact_No"].'">
     </div>
   </div>';
   if($row["Gender"] == "Male")
   {
       $result_string .='<div class="form-group">
       <label for="Gender">Gender</label>
       <div class="form-check">
     <input class="form-check-input" type="radio" name="gender" id="u_gender" value="Male" checked>
     <label class="form-check-label" for="Male">
       Male
     </label>
   </div>
   <div class="form-check">
   <input class="form-check-input" type="radio" name="gender" id="u_gender" value="Female">
   <label class="form-check-label" for="Female">
     Female
   </label>
 </div>
 </div>
';
}
else
{
    $result_string .='<div class="form-group">
    <label for="Gender">Gender</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="u_gender" value="Male" >
  <label class="form-check-label" for="Male">
    Male
  </label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="gender" id="u_gender" value="Female" checked>
<label class="form-check-label" for="Female">
  Female
</label>
</div>
</div>
';  
}
   
 
 $result_string .='<div class="form-group">
     <label for="date">Date of Joining</label>
     <input type="date" class="form-control" name="date" id="date" value="'.$row["Date_of_joining"].'">
   </div>
   <div class="form-row">
     <div class="form-group col-md-12">
       <label for="fee">Fee</label>
       <input type="text" class="form-control" id="u_fee" name="fee" value="'.$row["Fee"].'">
     </div>
   </div> 
   <div class="form-row">
     <div class="form-group col-md-12">
       <label for="Address">Address</label>
       <input type="text" class="form-control" id="u_Address" name="Address" value="'.$row["Address"].'">
     </div>
   </div> 
</form>';
 

echo $result_string;

}
else
{
    echo "MEMBER ID NOT EXIST IN RECORED";
}


?>