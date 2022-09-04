
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Zofia Kanecka</title>
        <link rel="stylesheet" href="style/style.sass" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
    <form method="POST" name="form" onSubmit="return delete_confirm();">
        <div class="header">
        
                <h1>Product List</h1>
                <div class="button">
                    
                <a href="addproduct.php">
                    <input type="button" value="ADD" class="button2"/>
                </a>
                 
                    <button type="submit" name="delete" id="delete" value="DELETE">
                        DELETE
                    </button>
                </div>
            </div>

                <hr /> 
            <?php
                $db = new mysqli("localhost", "root", "", "test");
                $q = "SELECT * FROM products";
                $result= $db->query($q);
                
                        while($row = $result -> fetch_assoc()){
                    echo '<div class="box-1">';        
                    echo '<div class="box">';
                    echo '<input type="checkbox" class="delete-checkbox" name="checkbox[]" value="'.$row['ID'].'" />';
                    echo '</br>';
                    echo  '<p>'.$row['SKU'];
                    echo '</br>';
                    echo  $row['name'] ;
                    echo '</br>';
                    echo  $row['price']. "$" ;
                    echo '</br>';
                    if($row['size']!=0){
                        echo  "Size: ".$row['size'];
                       
                    }else if($row['height']!=0 && $row['width']!=0 && $row['lenght']!=0){
                    echo  "Dimension: ". $row['height'] . "x" . $row['width']. "x" . $row['lenght'];
  
                    }else if($row['weight']!=0){
                    echo  "Weight: ".$row['weight']. "KG". '</p>';
                
                    }
                    echo '</div>';
                    echo '</div>';
                    } 

                    if(isset($_POST['delete'])){
                        if (isset($_POST['checkbox'])){
                            $chkarr=( $_POST['checkbox']);
                            foreach($chkarr as $id){
                                    $sql2= "DELETE FROM products WHERE ID='$id'";
                                    $result= $db->query($sql2);
                        
                            } 
                        }
                    } 

                  
            ?>
        </form>
        
        <hr />

        <div class="footer">
            <p>Scandiweb Test assigment</p>
        </div>
        <script> 
            function delete_confirm(){
                if($('.delete-checkbox:checked').length > 0){
                    var result = confirm("Are you sure to delete selected products?");
                    if(result){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    alert('Select at least 1 record to delete.');
                    return false;
                }
            }
        </script>
      <?php 
        mysqli_close($db);
        ?>
    </body>
</html>
