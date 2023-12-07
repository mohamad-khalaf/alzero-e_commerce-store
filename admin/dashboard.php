<?php
session_start();
if ( isset( $_SESSION['username'] )) {
    include "conecct.php"; 
    include "init.php"; 
    include $lang . "en.php"; 
} else {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=<?php echo $css . "bootstrap.min.css";  ?>>
        <link rel="stylesheet" href=<?php echo $css . "all.min.css";        ?>>
        <link rel="stylesheet" href=<?php echo $css . "mohamad.css";        ?>>
        <title> dashboard </title>
    </head>
    <body>
        <?php include $tmp . "header.php" ?>

        <?php include $tmp . "footer.php";?>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="<?php echo $js . "bootstrap.bundle.min.js"; ?>"></script>
        <script src="<?php echo $js . "mohamad.js"; ?>"></script>
    </body>
</html>