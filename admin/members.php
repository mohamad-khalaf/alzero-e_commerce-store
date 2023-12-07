
<?php 
    session_start();
    if (! isset($_SESSION['username'])) header('Location: index.php');

        include "conecct.php"; 
        include "init.php"; 
        include $lang . "en.php"; 
        $do =  isset($_GET['do']) ? $_GET['do'] : 'manage';

?>        
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=<?php echo $css . "bootstrap.min.css";  ?>>
        <link rel="stylesheet" href=<?php echo $css . "all.min.css";        ?>>
        <link rel="stylesheet" href=<?php echo $css . "mohamad.css";        ?>>
        <title>Members</title>
    </head>
    <body class="member-page">
        <?php include $tmp . "header.php" ?>
        <!-- Start manage Part -->
        <?php if ($do == 'manage') : ?>
            <div class="container">
                <h1>welcome to page main </h1>
                <a href="members.php?do=edit">edit member</a>
                <a href="members.php?do=update">update member</a>
                <a href="members.php?do=add">add new member</a>
                <a href="members.php?do=reove">remove member</a>
            </div>
        <!-- Start edit Part -->
        <?php  elseif ($do == 'edit') : ?>
                <?php 
                $user_id =  $_SESSION['userID'];
                
                $sql = "SELECT * FROM `users` WHERE `userID` = $user_id ";
                $res = mysqli_query($con, $sql);
                if ( mysqli_num_rows($res) > 0 ) :
                    $row = mysqli_fetch_assoc($res);
                else : echo "you id is uncorect";
                endif;
                ?>

                <h1 class="text-center">Edit Member</h1>
                <section>
                    <div class="container">
                        <form action="<?php echo $_SERVER['PHP_SELF'] . "?do=update"; ?>" class="form-horizontal" method="POST">
                            <!-- Start Inputs container  -->
                            <div class="form-group row mt-2">
                                <label for="" class="col-sm-2 control-label">username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" value="<?php echo $row['Username'] ?>" required>
                                </div>
                            </div>
                            <!-- End Inputs container  -->
                            
                            <!-- Start Inputs container  -->
                            <div class="form-group row mt-2">
                                <label for="" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="hidden"  name="oldPassword" value="<?php echo $row['Password'] ?>">
                                    <input type="text" class="form-control" name="password" autocomplete="new-password" placeholder="اترك الحقل فارغ اذا كنت تريد استخدام كلمة السر القديمة س" required="required">
                                </div>
                            </div>
                            <!-- End Inputs container  -->

                            <!-- Start Inputs container  -->
                            <div class="form-group row mt-2">
                                <label for="" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" value="<?php echo $row['Email'] ?>">
                                </div>
                            </div>
                            <!-- End Inputs container  -->

                            <!-- Start Inputs container  -->
                            <div class="form-group row mt-2">
                                <label for="" class="col-sm-2 control-label">Full Name </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="fullname" value="<?php echo $row['FullName'] ?>">
                                </div>
                            </div>
                            <!-- End Inputs container  -->
                            <button type="submit" class="btn btn-primary d-block w-50 m-auto mt-2">Save</button>
                        </form>
                    </div>
                </section>   
        <!-- Start update Part -->
        <?php  elseif ($do == 'update') : ?>
            <section class="update">
                <div class="container">
                    <h1 class="text-center"> update page  </h1>

                    <?php
                        $user_id =  $_SESSION['userID'];
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') :
                            $new_pass   = mysqli_real_escape_string($con, empty($_POST['password']) ? $_POST['oldPassword'] : $_POST['password']);
                            $new_pass   = mysqli_real_escape_string($con, sha1($new_pass));
                            $user       = mysqli_real_escape_string($con, $_POST["username"]);
                            $email      = mysqli_real_escape_string($con, $_POST["email"]);
                            $full_name  = mysqli_real_escape_string($con, $_POST["fullname"]);

                            // validate data 
                            $formErrors = array();
                            if (strlen($user) < 4 ) $formErrors[]   = "user name cant be less than 4 char";
                            if (empty($user)) $formErrors[]         = 'username can not be empty';
                            if (empty($email)) $formErrors[]        = 'email can not be empty';
                            if (empty($full_name)) $formErrors[]    = 'full name can not be empty';


                            if (empty($formErrors)) :
                                $sql = "UPDATE 
                                            `users` 
                                        SET 
                                            `Username`  = '$user', 
                                            `Email`     = '$email', 
                                            `Password`  = '$new_pass', 
                                            `FullName`  = '$full_name'
                                        WHERE 
                                            `userID`    = '$user_id' ";
                                $res = mysqli_query($con, $sql);
                                if ( $res > 0 ) echo "<div class='alert alert-primary' role='alert'> update is done correctly </div>" ;
                                else            echo "<div class='alert alert-danger' role='alert'> edit data faild </div>";
                            else :
                                foreach( $formErrors as $error ) :
                                    echo "<div class='alert alert-danger' role='alert'> $error </div>";
                                endforeach;
                            endif;

                        endif; //REQUEST_METHOD
                        // $user_id =  isset( $_GET['userid'] ) && is_numeric( $_GET['userid'] ) ? intval( $_GET['userid'] ) : 0;
                    ?>
                </div>
            </section>
        <!-- Start add Part -->
        <?php  elseif ($do == 'add') : ?>
            <h1 class="text-center">Add New Member</h1>
                <section>
                    <div class="container">
                        <form action="<?php echo $_SERVER['PHP_SELF'] . "?do=insert"; ?>" class="form-horizontal" method="POST" required="required">

                            <!-- Start Inputs container  -->
                            <div class="form-group row mt-2">
                                <label for="" class="col-sm-2 control-label">username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" value="" placeholder="Enter Username">
                                </div>
                            </div>
                            <!-- End Inputs container  -->
                            
                            <!-- Start Inputs container  -->
                            <div class="form-group row mt-2">
                                <label for="" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="password" autocomplete="new-password" placeholder="Enter Password">
                                </div>
                            </div>
                            <!-- End Inputs container  -->

                            <!-- Start Inputs container  -->
                            <div class="form-group row mt-2">
                                <label for="" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email Member ">
                                </div>
                            </div>
                            <!-- End Inputs container  -->

                            <!-- Start Inputs container  -->
                            <div class="form-group row mt-2">
                                <label for="" class="col-sm-2 control-label">Full Name </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name">
                                </div>
                            </div>
                            <!-- End Inputs container  -->
                            <button type="submit" class="btn btn-primary d-block w-50 m-auto mt-2">Save</button>
                        </form>
                    </div>
                </section>   
            
        <!-- Start insert Part -->
        <?php elseif( $do == 'insert') : // add ?>
            <?php
                echo $_POST['username'] . "<br>";
                echo $_POST['password'] . "<br>";
                echo $_POST['email'] . "<br>";
                echo $_POST['fullname'] . "<br>";

            ?>
        <!-- Start remove Part -->
        <?php  elseif ($do == 'remove') : ?>
            <h1>welcome to page remove</h1>
        <?php  else : echo "no page is here"; endif;?>

        <?php include $tmp . "footer.php";?>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="<?php echo $js . "bootstrap.bundle.min.js"; ?>"></script>
        <script src="<?php echo $js . "mohamad.js"; ?>"></script>       
    </body>
</html>