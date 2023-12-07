<?php 
    session_start();
    if (isset($_SESSION['username'])) header('Location: dashboard.php');

        include "conecct.php"; 
        include "init.php"; 
        include $lang . "en.php"; 

        if ($_SERVER['REQUEST_METHOD'] == 'POST') :
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $pass_sha1 = sha1($_POST['pass']);

            $sql = "SELECT `Username`, `Password`, `userID` FROM `users` WHERE `GroupID` = 1 && `Username` = '$user' && `Password` = '$pass_sha1' LIMIT 1";
            $res = mysqli_query($con, $sql);
            if (mysqli_num_rows($res) > 0) :
                $row = mysqli_fetch_assoc($res);
                $_SESSION['username']   = $user;
                $_SESSION['userID']     = $row['userID'];
                header('Location: dashboard.php');
                exit();
                else : echo "no rows";
        endif;
    endif;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=<?php echo $css . "bootstrap.min.css";  ?>>
        <link rel="stylesheet" href=<?php echo $css . "all.min.css";        ?>>
        <link rel="stylesheet" href=<?php echo $css . "mohamad.css";        ?>>
        <title> page name </title>
    </head>
    <body>
        <?php include $tmp . "header.php" ?>
        <form  class="login-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <h1 class="title text-center mb-2 "> Admin Login </h1>
            <input type="text"     name="user" placeholder="UserName"  autocomplete="off"           class="form-control mb-2" >
            <input type="password" name="pass" placeholder="Password"  autocomplete="new-password"  class="form-control mb-2" >
            <button type="submit" class="btn btn-primary d-block">Login</button>                                      
        </form>
        <?php include $tmp . "footer.php";?>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="<?php echo $js . "bootstrap.bundle.min.js"; ?>"></script>
        <script src="<?php echo $js . "mohamad.js"; ?>"></script>
    </body>
</html>