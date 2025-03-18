<html>
    <head>
        <title>Products</title>    
        <?php 
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            include 'nav.php';
            include 'add.php';
        ?><br>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>    
    <body>

        
        <div class="productform" id="productform">
        <h4>Product form...</h4>
            <form action="" method="POST" enctype="multipart/form-data"><br>
                <label>Product Name :-</label>
                <input type="text" name="name" value="<?= $name ?>"><br>
                <span class="text-danger"><?= $nameErr ?? '' ?></span><br>

                <label>SKU :-</label>
                <input type="text" name="sku" value="<?= $sku ?>"><br>
                <span class="text-danger"><?= $skuErr ?? '' ?></span><br>

                <label>Category :-</label>
                <select name="category">
                    <option value="" <?= isset($category) && $category=='' ?'selected':''; ?> >Select Category</option>
                    <option value="Cloths" <?= isset($category) && $category=='Cloths' ?'selected':''; ?> >Cloths</option>
                    <option value="Electronics" <?= isset($category) && $category=='Electronics' ?'selected':''; ?>>Electronics</option>
                    <option value="Furniture" <?= isset($category) && $category=='Furniture' ?'selected':''; ?>>Furniture</option>
                </select><br>
                <span class="text-danger"><?= $categoryErr ?? '' ?></span><br>

                <button type="button" class="btn btn-secondary" id="variant">Add Variant</button>

                <div id="showvariant" class="showvariant"></div><br>

                <button type="submit" class="btn btn-success" name="add">Submit </button>
            </form>
        </div>
    <footer>
        <script>
            
            
            const variantButton = document.getElementById("variant");
            const showVariantContainer =document.getElementById("showvariant");

            variantButton.onclick = function(){
                
                const variantDiv = document.createElement("div");
 

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
