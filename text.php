<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <header>
        <img src="images/logo.png">
        <h1>AquaFlask</h1>
    </header>   
    <main>
        <div class="left">
            <h1>RESELLER MANAGEMENT SYSTEM</h1>
            <form action="index.php" method="POST" >
                <input type="text" name="username" placeholder="  Username" >
                <input type="password" name="password" placeholder="  Password" class="password">
                <input type="submit" name="login" value="LOGIN" class="login">
            </form>
        </div>
        <div class="right"></div>
    </main>

</body>
</html>

<?php
    include 'connector.php';
    session_start();


    if(isset($_POST["login"])){
      
       $username = htmlspecialchars($_POST["username"]); 
       $password = htmlspecialchars($_POST["password"]);
       
       $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

       $result = $conn->query($sql);
       if($result -> num_rows == 1){
        header("Location:pages/resellerList.php");

       }else{
        echo '<script>alert("LOGIN ERROR: CHECK USERNAME AND PASSWORD");</script>';
       }
       
    }
    $conn -> close();
   
?>

