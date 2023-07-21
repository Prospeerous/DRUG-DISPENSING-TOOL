
<?php

require_once('Database_class.php');
$query="Select * from medicine";
$result=mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>DRUG DETAILS</title>
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
                         <h1 >DRUG DETAILS</h1>
                         
                            </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                           
                            <tr  class="big-dark text-white">
                                <th>MedCode</th>
                                <th>Medicine_name</th>
                               <th>Type</th>
                                <th>Quantity</th>
                              <th>Price</th>
                              <th>Expiry_Date</th>
                              <th>Edit</th>
                              <th>Delete</th>
                              
                            
                                  <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
                                 <tr>
                                    
                                    <td><?php echo $rows['MedCode'];?></td>
                                    <td><?php echo $rows['Medicine_name'];?></td>
                                    <td><?php echo $rows['Type'];?></td>
                                    <td><?php echo $rows['Quantity'];?></td>
                                    <td><?php echo $rows['Price'];?></td>
                                     <td><?php echo $rows['Expiry_Date'];?></td>
                                     <td><a href="drug_edit.php?id=<?php echo $rows['MedCode']; ?>">Edit</a></td>
                                <td><a href="drug_delete.php?id=<?php echo $rows['MedCode']; ?>">Delete</a></td>
                                  
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

                                    
                                    
                             
                             
                             
                             



                                
                                
                                
                                
                                
                                
                                
                                
                         
                                
                            
                            
                            
                            
                            
                            
                            
                            
                      
                            
                        
                        
                        
                        
                        
   