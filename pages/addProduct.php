<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addProduct.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
    <title>ADD PRODUCT</title>
</head>
<body>
    <header>
        <img src="../images/product.png">
        <h1>ADD PRODUCT</h1>
    </header> 
    <main>
        <div class="backBtnWrapper">
            <a href="../productList.php"><img src="../images/back.png" class="backBtn" /></a>
        </div>
        <form>
            <div class="left">
                <h3>Product Information</h3>
                <input name="name" type="text" placeholder="  Name" />
                <div class="priceWrapper">
                    <input name="price" type="text" placeholder="  Price" />
                    <input name="stock" type="text" placeholder="  Stock" />
                </div>
                
                <h3>Product Image</h3>
                <input
                type="file"
                id="photoInput"
                accept="image/*"
                class="productImg"
                />
            </div>
            <div class="right">
                <h3>Product Description</h3>
                <textarea>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque quasi sed totam ipsum non ratione, accusantium aperiam commodi molestias natus beatae? Enim esse nam voluptatem, consequuntur rem itaque! Tempora, quis.</textarea>
                <input type="submit" class="submit" value="ADD">
            </div>
        </form>
    </main>
    <?php include 'footer.html'; ?>
</body>
</html>