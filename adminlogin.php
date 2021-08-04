<?php
    session_start();
?>

<?php
    include("db_conection.php");

    if (isset($_POST['admin_login'])) 
    {
        $admin_username = $_POST['admin_username'];
        $admin_password = $_POST['admin_password'];
        $check_admin = "SELECT * FROM admin WHERE admin_username='$admin_username' AND admin_password='$admin_password'";
        $i = 0;

        $stid = oci_parse($dbcon, $check_admin);
        oci_execute($stid);
        while(oci_fetch_array($stid))
        {
            $i++;
        }
        oci_free_statement($stid);
        oci_close($dbcon);
        if ($i!=0) 
        {
            echo "<script>alert('You're successfully login!')</script>";
            echo "<script>window.open('Admin/index.php','_self')</script>";
            $_SESSION['admin_username'] = $admin_username;
        }else 
        {
            echo "<script>alert('Username or password is incorrect!')</script>";
            echo "<script>window.open('index.php','_self'//)</script>";
            exit();
        }
    }
?>