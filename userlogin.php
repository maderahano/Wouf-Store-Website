<?php
    session_start();
?>

<?php
    include("db_conection.php");

    if (isset($_POST['user_login'])) 
    {
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $check_user = "SELECT * FROM users WHERE user_email='$user_email' AND user_password='$user_password'";
        $i = 0;

        $stid = oci_parse($dbcon, $check_user);
        oci_execute($stid);
        while($row = oci_fetch_array($stid))
        {
            $i++;
            $user_id = $row['USER_ID'];
        }
        oci_free_statement($stid);
        oci_close($dbcon);
        if ($i!=0) 
        {
            $_SESSION['user_id'] = $user_id;
            echo "<script>alert('You're successfully login!')</script>";
            echo "<script>window.open('Customers/index.php','_self')</script>";
            $_SESSION['user_email'] = $user_email;
        }else 
        {
            echo "<script>alert('Email or password is incorrect!')</script>";
            echo "<script>window.open('index.php','_self'//)</script>";
            exit();
        }
    }
?>