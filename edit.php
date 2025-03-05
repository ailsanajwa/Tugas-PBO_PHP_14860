<?php 
   session_start();

   include("config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Change Profile</title>
</head>
<body>
    <div class="nav">
        <div class="Siadin">
            <p><a href="home.php"> SIADIN</a></p>
        </div>
        <div class="right-links">
        <a href="#">Change Profile</a>
            <a href="logout.php"> <button class="btn">Log Out</button> </a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php 
               if(isset($_POST['submit'])){
                $alamat = $_POST['alamat'] ?? null;
                $nim = $_POST['nim'] ?? null;
                $umur = $_POST['umur'] ?? null;
                $nama = $_POST['nama'] ?? null;

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE users SET Alamat='$alamat', Nim='$nim', Umur='$umur',Nama='$nama' WHERE Id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
              echo "<a href='home.php'><button class='btn'>Go Home</button>";
       
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Alamat = $result['Alamat'];
                    $res_Nim = $result['Nim'];
                    $res_Umur = $result['Umur'];
                    $res_Nama = $result['Nama'];
                }
            ?>
            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" id="nim" value="<?php echo $res_Alamat; ?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="<?php echo $res_Nim; ?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="umur">Umur</label>
                    <input type="text" name="" id="umur" value="<?php echo $res_Umur; ?>" autocomplete="off" required>
                </div> 
                <div class="field input">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" value="<?php echo $res_Nama; ?>" autocomplete="off" required>
                </div>
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
                <div class="links">
                    Don't have account? <a href="index.html">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>