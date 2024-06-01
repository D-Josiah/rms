<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="footer.css"/>

    <title>Reseller List</title>
</head>
<header>
    <div class="header-content">
        <img src="/images/persons2.png" alt="persons" class="persons">
        <h1>Admin Dashboard</h1>

    </div>
</header>
<body>
    <br>
    
    <nav>
        <ul>
            <li><a href="resellerList.php">Reseller List</a></li>
            <li><a href="productList.php">Product List</a></li>
            <li><a href="orderList.php">Order List</a></li>
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
    
    <main>
        <h2>Reseller List</h2>
        <!-- Content for reseller list goes here -->
    </main>
    
    <?php include 'footer.html'; ?>
</body>
</html>
