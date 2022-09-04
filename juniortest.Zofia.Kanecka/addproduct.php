<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Zofia Kanecka</title>
        <link rel="stylesheet" href="style/style.sass" />
 
    </head>
    <body>
    <form action="addproduct.php" method="post">
        <div class="header">
            <h1>Product Add</h1>
                <div class="button">
                    <button type="submit">SAVE</button>
                <a href="index.php">
                        <input type="button" value="CANCEL" class="button2"/>
                    </a>
                </div>
        </div>

        <hr />

        <?php
            $db = new mysqli("localhost", "root", "", "test");
            $q = "SELECT * FROM products";
            $result= $db->query($q);

            if (isset($_POST['add_sku']) && isset($_POST['add_name']) && isset($_POST['add_price']) && isset($_POST['add_size']) && isset($_POST['add_height']) && isset($_POST['add_width']) && isset($_POST['add_lenght']) && isset($_POST['add_weight']) ){
            $sku= $_POST['add_sku'];
            $name= $_POST['add_name'];
            $price= $_POST['add_price'];
            $size= $_POST['add_size'];
            $height= $_POST['add_height'];
            $width= $_POST['add_width'];
            $lenght= $_POST['add_lenght'];
            $weight= $_POST['add_weight'];
        
            $sql ="INSERT INTO products (ID, SKU, name, price, size, height, width, lenght, weight) VALUES (NULL, '$sku','$name','$price','$size','$height','$width','$lenght','$weight')";
            $result= $db->query($sql);
        }

           
             ?>

        <div class="box-2">
            <div id="product-form">
                    <p>SKU <input type="text" name="add_sku" id="sku" /></p>
                    <p>Name <input type="text" name="add_name" id="name" /></p>
                    <p>Price ($) <input type="text" name="add_price" id="price" /></p>
            </div>
           
            <div id="productType">

                Type Switcher: 

                <select id="type" name="product" onChange="prodType(this.value);">
                    <option value="" id="choose">Choose Switcher</option>
                    <option value="dvd">DVD</option>
                    <option value="book">Book</option>
                    <option value="furniture">Furniture</option>
                </select>

            <!---Size: -->
                <div class="fieldbox" id="dvd">
                    <p>Size (MB) <input type="text" name="add_size" id="size" value="" /></p>
                </div>

            <!---Dimension: -->
                <div class="fieldbox" id="furniture">
                    <p>Height (CM) <input type="text" name="add_height" id="height" /></p>
                    <p>Width (CM) <input type="text" name="add_width" id="width" /></p>
                    <p>Lenght (CM) <input type="text" name="add_lenght" id="lenght" /></p>
                </div>

            <!---Weight: -->
                <div class="fieldbox" id="book">
                    <p>Weight (KG) <input type="text" name="add_weight" id="weight" /></p>
                    </div>
                </div>
             </div>
        </div>
        <hr />
        <div class="footer">
          
            <p>Scandiweb Test assigment</p>
        </div>

        <script>
            function prodType(prod){
            var dvd = document.getElementById("dvd");
            var furnitures = document.getElementById("furnitures");
            var book = document.getElementById("book");
            var choos = document.getElementById("choose");

            dvd.style.display="none";
            furniture.style.display="none";
            book.style.display="none";
            choos.style.dispaly="none";

            if(prod=="dvd"){
                    dvd.style.display="block";
                }else if(prod=="furniture"){
                    furniture.style.display="block";
                }else if(prod=="book"){
                book.style.display="block";
                }
            }
        </script>       
    </body>
</html>
