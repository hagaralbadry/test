<html>
  <head>
    <style type="text/css">
      table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}
    </style>
  </head>

<body>
  
      <div>
        <div>
            <div >
                <a href='addCategory.php'>Add Category</a>
              </br></br></br>
            </div>
          <table>
            <thead>
              <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Sup Category</th>
                    <th>Product name</th>
                    <th>Image</th>
                    <th>Edit </th>
                    <th>Delete</th>
              </tr>
            </thead>

            <tbody>
               <?php   
                   $db = new Connection();
                    $query = $db->GetData("SELECT * FROM cat ");
                    foreach($query as $row){

                ?>
                <td><?php echo $row->id ?></td>
                <td><?php echo $row->cat_name ?></td>
                <td><?php echo $row->sup_cat_name ?></td>
                <td><?php echo $row->product_name ?></td>
                <td><?php echo $row->image ?></td>
                <td><a href='editCategory.php'>Edit Category</a></td>
                <td><a href='deleteCategory.php'>delete Category</a></td>
            </tbody>
          </table>
         
      
  </div>
</div>
</body>
</html>