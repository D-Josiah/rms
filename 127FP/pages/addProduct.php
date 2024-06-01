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
        <a href="registration.php"><img src="../images/product.png"></a>
        <h1>Add Product</h1>
    </header>
    <main>
        <div class="backBtnWrapper">
            <a href="../productList.php"><img src="../images/back.png" class="backBtn" /></a>
        </div>
        <form action="addProduct.php" method="post" enctype="multipart/form-data">
            <div class="left">
                <h3>Product Information</h3>
                <input name="name" type="text" placeholder="  Name" required />
                <div class="priceWrapper">
                    <input name="price" type="number" step="0.01" placeholder="  Price" required />
                    <input name="stock" type="number" placeholder="  Stock" required />
                </div>
                
                <h3>Product Image</h3>
                <input name="product_photo" type="file" id="photoInput" accept="image/*" class="productImg" />
            </div>
            <div class="right">
                <input name="submit" type="submit" class="submit" value="ADD">
            </div>
        </form>
    </main>
    <?php include 'footer.html'; ?>
</body>
</html>

<?php
include '../connector.php';
session_start();

function generateUniqueFilename($filename) {
    $path_parts = pathinfo($filename);
    $extension = isset($path_parts['extension']) ? '.' . $path_parts['extension'] : '';
    $basename = isset($path_parts['filename']) ? $path_parts['filename'] : '';
    $dirname = 'C:/xampp/htdocs/127FP'; // Directory to save the files

    if (!is_dir($dirname)) {
        mkdir($dirname, 0777, true);
    }

    $count = 1;
    $new_filename = $basename . $extension;
    while (file_exists($dirname . '/' . $new_filename)) {
        $new_filename = $basename . '_' . $count . $extension;
        $count++;
    }
    return $new_filename;
}

if(isset($_POST["submit"])){
    $name = htmlspecialchars($_POST["name"]); 
    $price = htmlspecialchars($_POST["price"]);
    $stock = htmlspecialchars($_POST["stock"]);
    $imagePath = null;

    // If a new image is uploaded, handle the upload process
    if(isset($_FILES["product_photo"]) && $_FILES["product_photo"]["error"] == 0){
        $filename = generateUniqueFilename($_FILES["product_photo"]["name"]);
        $destination = 'C:/xampp/htdocs/127FP/' . $filename;

        if(move_uploaded_file($_FILES["product_photo"]["tmp_name"], $destination)){
            $imagePath = $filename; // Store only the filename
        } else {
            echo "Failed to move uploaded file.";
            exit();
        }
    }

    // Prepare the INSERT statement
    if ($imagePath) {
        $insert_product_sql = "INSERT INTO product (stock, image, price, name) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_product_sql);
        $stmt->bind_param("isds", $stock, $imagePath, $price, $name);
    } else {
        $insert_product_sql = "INSERT INTO product (stock, price, name) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_product_sql);
        $stmt->bind_param("ids", $stock, $price, $name);
    }

    // Execute the statement
    if ($stmt->execute()) {
        $product_id = $stmt->insert_id;

        $insert_record_sql = "INSERT INTO records (date, admin_id, product_id, record_type) VALUES (NOW(), ?, ?, 1)";
        $stmt = $conn->prepare($insert_record_sql);
        $stmt->bind_param("ii", $_SESSION['admin_id'], $product_id);

        if ($stmt->execute()) {
            header("Location: ../productList.php");
            exit();
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    } else {
        echo "Error inserting product: " . $conn->error;
    }
}

$conn->close();
?>
