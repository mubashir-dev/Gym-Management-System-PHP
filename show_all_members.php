<?php
require_once "objects/objects.php";
if(isset($_POST["auth"]))
{
    $data=$member->member_read();
    $rows=$member->CountRows();
     if($rows > 0 )
    {
      while ($row = $data->fetch(PDO::FETCH_ASSOC))
      {

          extract($row);

          echo "<tr>";
              echo "<td>{$mem_id}</td>";
              echo "<td>{$Name}</td>";
              echo "<td>{$Gender}</td>";
              echo "<td>{$Date_of_joining}</td>";
              echo "<td>{$Contact_No}</td>"; 
              echo "<td>{$Fee}</td>";    
              echo "<td>{$Address}</td>";
              echo "<td><a  href='#' update_id='{$mem_id}' class='btn  update_object'><i class='fas fa-edit'></i></td>";
              echo "<td><a  href='#' delete_id='{$mem_id}' class='btn  delete_object'><i class='fas fa-trash'></i></td>";
          echo "</tr>";


      }

    } 
}


?>