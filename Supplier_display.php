
<?php

require_once('Database_class.php');
$query="Select * from supplier";
$result=mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>SUPPLIER DETAILS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #000;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td ,th{
            background-color:indianred  ;
            border: 1px solid ;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 30px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
       
    </style>

 
    </head>
    <body class="bg-dark">
        <div class="container">
          <div class="row mt-5">   
            <div class="col">
                <div class="card mt-5">
                     <div class="card-header">
                         <h1 >SUPPLIER DETAILS</h1>
                         
                            </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <colgroup>
                       < col style="background-color: yellowgreen;">
                        </colgroup>
                            <tr  class="big-dark text-white">
                                <th>Supplier Name</th>
                                <th>Supplier Id</th>
                               <th>Address</th>
                                <th>Phone Number</th>
                              <th>Medicine Code</th>
                              <th>Edit</th>
                              <th>Delete</th>
                              
                            
                                  <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
                                 <tr>
                                    
                                    <td><?php echo $rows['SupplierName'];?></td>
                                    <td><?php echo $rows['SupplierID'];?></td>
                                    <td><?php echo $rows['Address'];?></td>
                                    <td><?php echo $rows['PhoneNo'];?></td>
                                    <td><?php echo $rows['MedCode'];?></td>
                                     <td><a href="Supplier_edit.php?id=<?php echo $rows['SupplierID']; ?>">Edit</a></td>
                                <td><a href="Supplier_delete.php?id=<?php echo $rows['SupplierID']; ?>">Delete</a></td>
                                  
                                    </tr>
                                    <?php
                                   
                                    
                                   }
                                    
                                    ?>
                                    
                                      </table>
                                                
                        
                    </div>
                      </div>
                  </div>
                </div>
              </div>
         
                        
    </body>
</html>

                                    
                                    
                             
                             
                             
                             



                                
                                
                                
                                
                                
                                
                                
                                
                         
                                
                            
                            
                            
                            
                            
                            
                            
                            
                      
                            
                        
                        
                        
                        
                        
   