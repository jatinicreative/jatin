<html>
    <head>
        <title></title>    
        <?php include 'nav.php'; ?><br>
    <style>
        .productform {
         display: none;
        }
        .variant-container {
            margin-top: 10px;
            padding: 10px;
            border: 2px solid rgb(99, 95, 95);
        }
        .remove-variant {
            background-color: tomato;
            color: white;
            border: none;
            padding: 5px 10px;

        }   
    </style>
    </head>    
    <body>

        <button type="button" class="btn btn-primary" id="addproduct">Add Product</button>
        <div class="productform" id="productform">
            <form action="add.php" method="POST" enctype="multipart/form-data"><br>
                <label>Product Name :-</label>
                <input type="text" name="name"><br><br>

                <label>SKU :-</label>
                <input type="text" name="sku"><br><br>

                <label>Category :-</label>
                <select name="category">
                    <option value="">Select Category</option>
                    <option value="Cloths">Cloths</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Furniture">Furniture</option>
                </select><br><br>

                <button type="button" class="btn btn-secondary" id="variant">Add Variant</button>

                <div id="showvariant" class="showvariant"></div><br>

                <button type="submit" class="btn btn-success" name="add">Submit</button>
            </form>
        </div>
    <footer>
        <script>
            var addproduct = document.getElementById("addproduct");
            var productform = document.getElementById("productform");

            addproduct.onclick = function()
            {
                productform.style.display = productform.style.display === "block" ? "none" : "block" ;
            }
            
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
