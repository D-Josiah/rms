<?php
include 'connect.php';

// Capture the filter value if set
$filter = isset($_GET['status']) ? $_GET['status'] : '';

// Modify the SQL query based on the filter
$sql = "SELECT p.product_id, p.stock, p.price, p.description, p.image, a.type AS availability
        FROM product p
        JOIN availability a ON p.availability = a.availability_id";

if ($filter) {
    $sql .= " WHERE a.type = '$filter'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Product List</title>
</head>
<script>
function applyFilters() {
    var statusFilter = document.getElementById("statusFilter").value;
    window.location.href = "productList.php?status=" + statusFilter;
}
</script>
<header>
    <div class="header-content">
        <img src="persons.png" alt="persons" class="persons">
        <h1>Admin Dashboard</h1>
    </div>
</header>
<body>
    <nav>
        <ul>
            <li><a href="resellerList.php">Reseller List</a></li>
            <li><a href="productList.php">Product List</a></li>
            <li><a href="orderList.php">Order List</a></li>
        </ul>
    </nav>

    <div class="search-filter-container">
        <input type="text" id="searchInput" placeholder="Search...">
        <select id="statusFilter">
            <option value="">All</option>
            <option value="available">Available</option>
            <option value="limited stock">Limited Stock</option>
            <option value="out of stock">Out of Stock</option>
        </select>
        <button onclick="applyFilters()" class="apply-button">Apply</button>
        <button class="add-button">Add</button>
    </div>

    <main>
        <h2>Product List</h2>
        <div class="product-list">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $productId = $row['product_id'];
                    $productName = $row['description'];
                    $productStatus = $row['availability'];
                    echo "<div class='product-card'>
                            <img src='{$row['image']}' alt='Product Image' class='product-image'>
                            <div class='product-info'>
                                <h3>Product ID: {$productId}</h3>
                                <p>Name: {$productName}</p>
                                <p class='details price'>Price: $ {$row['price']}</p>
                                <p class='details quantity'>Quantity: {$row['stock']}</p>
                                <p class='details availability'>Availability: {$productStatus}</p>
                                <a href='productInfo.php?product_id={$productId}' class='view-details-link'>View Details</a>
                                </div>
                            </div>";
                    }
            } else {
                echo "<p>No products found</p>";
            }
            $conn->close();
            ?>
        </div>
    </main>

    <?php include 'footer.html'; ?>
</body>
</html>
