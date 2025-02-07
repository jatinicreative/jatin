<?php 
    
    include 'db.php';

    if (isset($_GET['p_id'])) {

        $p_id = $_GET['p_id'];
        $sql = "SELECT * from product where p_id=$p_id  ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $sql = "SELECT * from variant where p_id=$p_id  ";
        $result = mysqli_query($conn, $sql);
    
    }
    ?>
    <html>
        <head>
            <title></title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </head>
        <body><br>
        <h4>Update Product Details</h4>
        <form action="update.php" method="POST" enctype="multipart/form-data"><br>
        <input type="hidden" name="p_id" value="<?= $row['p_id'] ?>">

        <label>Product Name :-</label>
        <input type="text" name="name" value="<?= $row['name'] ?>"><br><br>

        <label>SKU :-</label>
        <input type="text" name="sku" value="<?= $row['sku'] ?>"><br><br>

        <label>Category :-</label>
        <select name="category">
            <option value="">Select Category</option>
            <option value="Cloths" <?= $row['category']=='Cloths' ?'selected':''  ?>>Cloths</option>
            <option value="Electronics" <?= $row['category']== 'Electronics' ?'selected':''  ?>>Electronics</option>
            <option value="Furniture" <?= $row['category']== 'Furniture' ?'selected':''  ?>>Furniture</option>
        </select><br><br>

        <h6>Variants</h6>
        <div id="variant-container">
        <?php while ($variant = $result->fetch_assoc()) { ?>
                <div class="variant-block">
                <input type="hidden" name="v_id[]" value="<?= $variant['v_id'] ?>">
                <label>Size:</label>
                <select name="size[]">
                    <option value="">Select Size</option>
                    <option value="Small" <?= $variant['size'] == 'Small'? 'selected':'' ?>>Small</option>
                    <option value="Medium" <?= $variant['size'] == 'Medium'?  'selected':'' ?>>Medium</option>
                    <option value="Large" <?= $variant['size'] == 'Large'? 'selected':'' ?>>Large</option>
                </select>

                <label>Color:</label>
                <select name="color[]">
                    <option value="">Select Color</option>
                    <option value="Black" <?= $variant['color'] == 'Black' ? 'selected':'' ?>>Black</option>
                    <option value="White" <?= $variant['color'] == 'White' ? 'selected':'' ?>>White</option>
                    <option value="Blue" <?= $variant['color'] == 'Blue' ? 'selected':'' ?>>Blue</option>
                </select>

                <label>Quantity:</label>
                <input type="text" name="quantity[]" value="<?=  $variant['quantity']; ?>">

                </div>
            <?php } ?>
        
        </div><br>
        <button type="button" class="btn btn-secondary" id="variant">Add More Variant</button>

        <div id="showvariant" class="showvariant"></div><br>

        <button type="submit" class="btn btn-success" name="update">Update </button>
   
        </form>
        <footer>
            <script>
            const variantButton = document.getElementById("variant");
            const showVariantContainer =document.getElementById("showvariant");

            variantButton.onclick = function(){
                
                const variantDiv = document.createElement("div");
                variantDiv.classList.add("variant-container");

                variantDiv.innerHTML = `
                    <label>Size:</label>
                    <select name="size[]">
                        <option value="">Select Size</option>
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                    </select>

                    <label>Color:</label>
                    <select name="color[]">
                        <option value="">Select Color</option>
                        <option value="Black">Black</option>
                        <option value="White">White</option>
                        <option value="Blue">Blue</option>
                    </select>

                    <label>Quantity:</label>
                    <input type="text" name="quantity[]">

                    <button type="button" class="remove-variant">-</button>
                `;

                showVariantContainer.appendChild(variantDiv);

                variantDiv.querySelector(".remove-variant").onclick = function() {
                    showVariantContainer.removeChild(variantDiv);
                };

            }
            </script>
        </footer>
        </body>
        </html>