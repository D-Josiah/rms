<?php
include 'connect.php';

$sql = "SELECT o.order_id, o.date, r.name AS reseller, os.type AS status, o.delivery_info, o.total_price, pm.type AS payment_method
        FROM orders o
        JOIN reseller r ON o.reseller_id = r.reseller_id
        JOIN order_status os ON o.order_status = os.orderStatus_id
        JOIN payment_method pm ON o.payment_method = pm.paymentMethod_id";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Order List</title>
</head>
<script>
function applyFilters() {
    console.log("Applying filters...");
    var input, filter, table, tr, td, i, statusFilter;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    statusFilter = document.getElementById("statusFilter").value.toUpperCase();
    table = document.getElementsByClassName("order-list")[0];
    tr = table.getElementsByClassName("order-item");

    for (i = 0; i < tr.length; i++) {
        var orderID = tr[i].getElementsByClassName("order-id")[0].innerText.toUpperCase();
        var reseller = tr[i].getElementsByClassName("reseller")[0].innerText.toUpperCase();
        var status = tr[i].getElementsByClassName("status")[0].innerText.toUpperCase();

        if ((orderID.indexOf(filter) > -1 || reseller.indexOf(filter) > -1) &&
            (status.indexOf(statusFilter) > -1 || statusFilter === "")) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
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
            <option value="complete">Complete</option>
            <option value="pending">Pending</option>
            <option value="to_be_shipped">To be shipped</option>
        </select>
        <button onclick="applyFilters()" class="apply-button">Apply</button>
        <button class="add-button">Add</button>
    </div>

    <main>
        <h2>Order List</h2>
        <div class="order-list">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='order-item'>
                            <div class='order-icon'>
                                <img src='cart.png' alt='Cart' class='cart-icon'>
                            </div>
                            <div class='order-info-left'>
                                <p class='order-id'><strong>Order ID:</strong> {$row['order_id']}</p>
                                <p class='reseller'><strong>Reseller:</strong> {$row['reseller']}</p>
                                <p class='status'><strong>Status:</strong> {$row['status']}</p>
                            </div>
                            <div class='order-info-right'>
                                <p>----<strong>Order Details</strong>----</p>
                                <p><strong>Date:</strong> {$row['date']}</p>
                                <p><strong>Delivery Location:</strong> {$row['delivery_info']}</p>
                            </div>
                        </div>
                        <hr>";
                }
            } else {
                echo "<p>No orders found</p>";
            }
            ?>
        </div>
    </main>

    <?php include 'footer.html'; ?>
</body>
</html>
