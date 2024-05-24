<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/registration.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
    
   
    <title>RESELLER REGISTRATION</title>
  </head>
  <body>
    <header>
      <img src="../images/addReseller.png">
      <h1>RESELLER REGISTRATION</h1>
    </header>
    <main>
      <div class="backBtnWrapper">
        <a href="../index.php"><img src="../images/back.png" class="backBtn" /></a>
      </div>
      <form class="infoWrapper">
        <div class="left">
          <div class="personalInfo">
            <h3>Personal Information</h3>
            <input name="name" type="text" placeholder="  Name" />
            <input name="dob" type="date" placeholder="  Date of Birth" />
          </div>
          <div class="contactInfo">
            <h3>Contact Information</h3>
            <input name="email" type="email" placeholder="  Email" />
            <input name="phoneNum" type="tel" placeholder="  Phone Number" />
          </div>
        </div>
        <div class="right">
          <div class="address">
            <h3>Address</h3>
            <input name="region" type="text" placeholder="  Region" />
            <input name="province" type="text" placeholder="  Province" />
            <input name="postal" type="tel" placeholder="  Postal Code" />
            <h3>PROFILE PICTURE</h3>
            <input
              type="file"
              id="photoInput"
              accept="image/*"
              class="profilePic"
            />
            <div class="submitWrapper">
              <input
                name="register"
                type="submit"
                value="SUBMIT"
                class="submit"
              />
            </div>
          </div>
        </div>
      </form>
    </main>
    </body>
    <?php include 'footer.html'; ?>
</html> 
