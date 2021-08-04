<?php
    session_start();
?>

<?php
    include("db_conection.php");
    if (isset($_POST['register'])) 
    {
        $user_email = $_POST['ruser_email'];
        $user_password = $_POST['ruser_password'];
        $user_firstname = $_POST['ruser_firstname'];
        $user_lastname = $_POST['ruser_lastname'];
        $user_address = $_POST['ruser_address'];
        $check_user = "SELECT * FROM users WHERE user_email='$user_email'";
        $run_query = oci_parse($dbcon, $check_user);
        oci_execute($run_query);
        if (oci_fetch_row($run_query) > 0) 
        {
            echo "<script>alert('Customer is already exist, Please try another one!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            exit();
        }
        $saveaccount = "INSERT INTO users (user_id,user_email,user_password,user_firstname,user_lastname,user_address) VALUES ('','$user_email','$user_password','$user_firstname','$user_lastname','$user_address')";
        $stid = oci_parse($dbcon, $saveaccount);
        oci_execute($stid);
        oci_free_statement($stid);
        oci_close($dbcon);
        echo "<script>alert('Data successfully saved, You may now login!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
?>
