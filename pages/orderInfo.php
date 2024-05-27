<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/orderInfo.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
    <title>ORDER INFO</title>
</head>
<body>
    <header>
        <img src="../images/order.png">
        <h1>ORDER INFO</h1>
    </header> 
    <nav>
        <ul>
            <li><a href="resellerList.php">Reseller List</a></li>
            <li><a href="productList.php">Product List</a></li>
            <li><a href="orderList.php">Order List</a></li>
        </ul>
    </nav>
    <main>
        <div class="backBtnWrapper">
            <a href="../productList.php"><img src="../images/back.png" class="backBtn" /></a>
        </div>
        <form>
            <div class="left">
                <h3>Delivery Information</h3>
                <label for="name">Reseller Name</label>
                <input name="name" type="text" />
                <label for="receiver">Receiver's Name</label>
                <input name="receiver" type="text"  />
                <label for="phoneNumber">Receiver's Phone Number</label>
                <input name="phoneNumber" type="tel"/>
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

                <table class="orderList" >
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1123</td>
                            <td>24</td>
                            <td> P12022</td>
                        </tr>
                        <tr>
                            <td>1123</td>
                            <td>24</td>
                            <td> P12022</td>
                        </tr>
                    </tbody>
                </table>  
            
                <div class="addWrapper">
                    <img src="../images/add.png" class="add">
                </div>
                
                <h3>Order Total: </h3>
                <h3>Status: </h3>
                <input type="submit" class="submit" value="SUBMIT">
            </div>
        </form>
    </main>
    <?php include 'footer.html'; ?>
</body>
</html>