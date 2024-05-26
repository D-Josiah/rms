<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addOrder.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
    <title>Document</title>
</head>
<body>
<header>
        <img src="../images/order.png">
        <h1>ADD ORDER</h1>
    </header> 
    <main>
        <div class="backBtnWrapper">
            <a href="../productList.php"><img src="../images/back.png" class="backBtn" /></a>
        </div>
        <form>
            <div class="left">
                <h3>Delivery Information</h3>
                <input name="name" type="text" placeholder="  Reseller Name" />
      
                <input name="receiver" type="text" placeholder="  Receiver's Name" />
                <input name="phoneNumber" type="tel" placeholder="  Receiver's Phone Number" />
                <select id="payment-method" name="payment_method" required>
                    <option value="">MODE OF PAYMENT</option>
                    <option value=1>Cash</option>
                    <option value=2>Gcash</option>
                    <option value=3>Bank</option>
                    <option value=4>Pending</option>
                </select>  
                <h3>Delivery Information</h3>
                <textarea>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae debitis possimus nostrum voluptate voluptas labore totam qui dolorem nemo. Perferendis recusandae facilis, iste deleniti deserunt excepturi doloribus ea ipsa illum!</textarea>
                 
   
            </div>
            <div class="right">
                <h3>Order Information</h3>
                <div class="orderList">
                    <div class="orderWrapper">
                        <input name="productId" type="text" placeholder="  Product ID" />
                        <input name="quantity" type="number" placeholder="  Quantity" />
                        <input name="total" type="number" placeholder="  Total" />
                    </div>
                </div>
                <div class="addWrapper">
                    <img src="../images/add.png" class="add">
                </div>
                
                <h3>Order Total: </h3>
                <input type="submit" class="submit" value="SUBMIT">
            </div>
        </form>
    </main>

    <?php include 'footer.html'; ?>
</body>
</html>
