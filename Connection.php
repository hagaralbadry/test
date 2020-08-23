<?php
class Connection
{
  public function insert($st)
 {
    $conn=  mysqli_connect("localhost","root","","test");   
    $insert=$st;
    if(mysqli_query($conn,$insert)){
         return "1";
     } else{
        return mysqli_error($conn);
     }
}
public function search($st)
{
    $conn=  mysqli_connect("localhost","root","","test");   
    $select=$st; 
    $result = mysqli_query($conn,$select);
    if(mysqli_num_rows($result) > 0){
        return "1";
    }else{
        return mysqli_error($conn);
    }
}
public function GetData($st)
{
    $conn=  mysqli_connect("localhost","root","","test");   
    $select=$st;
    
    $result=mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($result);
     return  $row;
}

}
?>