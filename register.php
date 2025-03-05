<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            
        <?php 
         
         include("config.php");
         if(isset($_POST['submit'])){
            $alamat = $_POST['alamat'];
            $nim = $_POST['nim'];
            $umur = $_POST['umur'];
            $nama = $_POST['nama'];

         //verifying the unique nim

         $verify_query = mysqli_query($con,"SELECT Nim FROM users WHERE Nim='$nim'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                    <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO users(Alamat,Nim,Umur,Nama) VALUES('$alamat','$nim','$umur','$nama')") or die("Erroe Occured");

            echo "<div class='message'>
                    <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Now</button>";
         

         }

         }else{
         
        ?>
            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" id="nim" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="alamat">alamat</label>
                    <input type="text" name="alamat" id="alamat" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="umur">Umur</label>
                    <input type="text" name="umur" id="umur" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="Nama">Nama</label>
                    <input type="text" name="nama" id="nama" autocomplete="off" required>
                </div>
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Don't have account? <a href="index.php">Login Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>