<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

         <?php 

            include("config.php");
            if(isset($_POST['submit'])){
              $nim = mysqli_real_escape_string($con,$_POST['nim']);
              $nama = mysqli_real_escape_string($con,$_POST['nama']);

              $result = mysqli_query($con,"SELECT * FROM users WHERE Nim='$nim' AND Nama='$nama' ") or die("Select Error");
              $row = mysqli_fetch_assoc($result);

              if(is_array($row) && !empty($row)){
                  $_SESSION['valid'] = $row['Nim'];
                  $_SESSION['alamat'] = $row['Alamat'];
                  $_SESSION['umur'] = $row['Umur'];
                  $_SESSION['id'] = $row['Id'];
              }else{
                  echo "<div class='message'>
                    <p>Wrong Nim or Nama</p>
                     </div> <br>";
                 echo "<a href='index.php'><button class='btn'>Go Back</button>";
       
              }
              if(isset($_SESSION['valid'])){
                  header("Location: home.php");
              }
            }else{
            ?>

            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" id="nim" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>