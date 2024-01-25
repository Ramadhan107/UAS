<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Sign In</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            <?php 
             
              include("php/config.php");
              if(isset($_POST['submit'])){
                $npm = mysqli_real_escape_string($con,$_POST['npm']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE NPM='$npm' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['NPM'];
                    $_SESSION['nama'] = $row['NAMA'];
                    $_SESSION['id'] = $row['Id'];
                }else{
                    echo "<div class='message'>
                      <p>Wrong NAMA or Password</p>
                       </div> <br>";
                   echo "<a href='index.php'><button class='btn'>Go Back</button>";
         
                }
                if(isset($_SESSION['valid'])){
                    header("Location: home.php");
                }
              }else{

            
            ?>
            <?php function getHeaderContent() { return "Sign-In"; } ?> <!DOCTYPE html> <html> <head> <title>Page Title</title> <style> .header-class { text-align: center; } </style> </head> <body> <header class="header-class"> <?php echo getHeaderContent(); ?> </header> </body> </html>
            <form action="" method="post">
                <div class="field input">
                    <label for="npm">NPM</label>
                    <input type="text" name="npm" id="npm" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Kamu belum punya account wak? <a href="register.php">Register now</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>