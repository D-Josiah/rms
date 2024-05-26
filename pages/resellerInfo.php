<!DOCTYPE html>
<head>

    <title>Reseller Info</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="pages/css/footer.css"/>
    
</head>
<body>
    <header>
        <div class="header-content">
            <img src="persons2.png" alt="persons" class="persons">
            <h1>Admin Dashboard</h1>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="resellerInfo.php">Reseller Info</a></li>
            <li><a href="productInfo.php">Product Info</a></li>
            <li><a href="ordersInfo.php">Orders Info</a></li>
        </ul>
    </nav>

    <div class="search-filter-container">
        <input type="text" placeholder="Search...">
        <select>
            <option value="complete">Complete</option>
            <option value="pending">Pending</option>
            <option value="to_be_shipped">To be shipped</option>
        </select>
        <button class="apply-button">Apply</button>
        <button class="add-button">Add</button>
    </div>


    <h1>RESELLER INFO</h1>
    <form action="" method="post"> 
        <div class="reseller-icon">
            <img src="reseller_icon.png" alt="reseller icon">
        </div>
        <br>

        <div class="form-columns">
            <div>
                <label for="reseller_name">Reseller Name:</label>
                <input type="text" id="reseller_name" name="reseller_name">
            </div>
            <div>
                <label for="region">Region:</label>
                <input type="text" id="region" name="region">
            </div>
            <div>
                <label for="postal_code">Postal Code:</label>
                <input type="text" id="postal_code" name="postal_code">
            </div>
        </div>
        <div class="form-columns">
            <div>
                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number">
            </div>
            <div>
                <label for="age">Age:</label>
                <input type="text" id="age" name="age">
            </div>

            <div>
                <label for="province">Province:</label>
                <input type="text" id="province" name="province">
            </div>
        </div>
        <div class="form-columns">
            <div>
                <label for="reseller_id">Reseller ID:</label>
                <input type="text" id="reseller_id" name="reseller_id">
            </div>
            <div>
                <label for="active_status">Active Status:</label>
                <input type="text" id="active_status" name="active_status">
            </div>
            <div>
                <label for="total_amount_spent">Total Amount Spent:</label>
                <input type="text" id="total_amount_spent" name="total_amount_spent">
            </div>

        </div>
        <input type="submit" value="SAVE CHANGES" name="save_changes">
    </form>

    <h2>ORDERS</h2>
    <!-- Display orders for the reseller here -->

    <footer>
        <p>&copy; 2024 Aquaflask. All rights reserved.</p>
    </footer>
</body>
</html>