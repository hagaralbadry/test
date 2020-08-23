<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
</head>

<body>

<!-- add category form--> 
<div>
<div class="container">
 <div class="row  justify-content-md-center " >
  <div class="col-md-auto "> 
   <form method="POST">
          <input type="text"  placeholder="category name" name="category_name"required><br>
          <input type="text"  placeholder="sup_cat_name" name="sup_cat_name"  required><br>
          <input type="text"  placeholder="product_name" name="product_name"  required><br>
          <input type="file" name="file"><br>
          <input type="submit" name="submit"  value="submit"/>
          
   </form>
  </div>


<!--add category-->
<?php 
  if(isset($_POST['submit'])){
     include "Connection.php";
     $category_name = trim($_POST['category_name']);
     $sup_cat_name = trim($_POST['sup_cat_name']);
     $product_name = trim($_POST['product_name']);
     $image = $_POST['file'];
     $db = new Connection();
     $query = $db->insert("INSERT INTO cat (cat_name, sup_cat_name, image, product_name) VALUES ('$category_name', '$category', '$image','$product_name')");
       if($query == "1"){ 
             //upload image into folder 
             if(isset($_FILES['file'])){
              $errors= array();
              $file_name = $_FILES['file']['name'];
              $file_size =$_FILES['file']['size'];
              $file_tmp =$_FILES['file']['tmp_name'];
              $file_type=$_FILES['file']['type'];
              $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
              $extensions= array("jpeg","jpg","png");
              if(in_array($file_ext,$extensions)=== false){
                 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
              }
              if(empty($errors)==true){
                 move_uploaded_file($file_tmp,"images/".$file_name);
                 echo "Success";
              }else{
                 print_r($errors);
              }
           }
          /// 

           echo("<script> alert('Data inserted');</script>");
           echo("<script> location.href='categories.php'; </script>");
       }else{ 
        echo("<script> alert('faild to insert Data'); </script> ");
       } 

   }

    ?>

 </div>
</div>



</body>
</html>

