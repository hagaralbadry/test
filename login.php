<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
</head>

<body>

<!--user login form--> 
<div>
<div class="container">
 <div class="row  justify-content-md-center " >
  <div class="col-md-auto "> 
   <form method="POST">
          <input type="text"  placeholder="user name" name="txtuser" id="username" required><br>
          <input type="password"  placeholder="password" name="txtpass" id="password" required><br>
          <input type="submit" name="submit"  value="login"/>
          <label>

             <input type="checkbox" name="remember_me" id="remember_me">
             Remember me 
         </label>
   </form>
  </div>


<!--user login form-->
<?php 

if(isset($_POST['submit']) && $_POST['submit']=="login"){
     if( !empty($_POST['txtuser']) &&  !empty($_POST['txtpass']) ){
       include "Connection.php";
     $Username = trim($_POST['txtuser']);
     $Password = trim($_POST['txtpass']);
     $db = new Connection();
     $query = $db->search("select * from user where name='$Username' and password='$Password'");
     if($query == "1"){ 
           echo("<script> alert('user found');</script>");
           echo("<script> location.href='categories.php'; </script>");
            //remember password
          if(!empty($_POST["remember_me"])) {
            setcookie ("username",$_POST["txtuser"],time()+ 3600);
            setcookie ("password",$_POST["txtpass"],time()+ 3600);
            echo "Cookies Set Successfuly";
          } else {
            setcookie("username","");
            setcookie("password","");
            echo "Cookies Not Set";
          }
       }else{ 
        echo("<script> alert('Invaild username or password'); </script> ");
       } 
  }
}
    ?>

 </div>
</div>



</body>
</html>

