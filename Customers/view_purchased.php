<?php
    session_start();
    $user_id = $_SESSION['user_id'];

    if (!$_SESSION['user_email']) 
    {
        header("Location: ../index.php");
    }
?>

<?php
    include("config.php");
    extract($_SESSION);
    $stmt_edit = $DB_con->prepare('SELECT * FROM users WHERE user_email =:user_email');
    $stmt_edit->execute(array(':user_email' => $user_email));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
?>

<?php
    include("config.php");
    $user_id = 0;
    $stmt_edit = $DB_con->prepare("SELECT sum(order_total) AS total FROM orderdetails WHERE user_id=:user_id AND order_status='Ordered'");
    $stmt_edit->execute(array(':user_id' => $user_id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    $total = extract($edit_row);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WOUF Store</title>
        <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/local.css" />
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">WOUF Store</a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li><a href="index.php"> &nbsp; <span class='glyphicon glyphicon-home'></span> Home</a></li>
                        <li><a href="shop.php?id=1"> &nbsp; <span class='glyphicon glyphicon-shopping-cart'></span> Shop Now</a></li>
                        <li><a href="cart_items.php"> &nbsp; <span class='fa fa-cart-plus'></span> Shopping Cart Lists</a></li>
                        <li><a href="orders.php"> &nbsp; <span class='glyphicon glyphicon-list-alt'></span> My Ordered Items</a></li>
                        <li class="active"><a href="view_purchased.php"> &nbsp; <span class='glyphicon glyphicon-eye-open'></span> Previous Items Ordered</a></li>
                        <li><a data-toggle="modal" data-target="#setAccount"> &nbsp; <span class='fa fa-gear'></span> Account Settings</a></li>
                        <li><a href="logout.php"> &nbsp; <span class='glyphicon glyphicon-off'></span> Logout</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown messages-dropdown">
                            <a href="#"><i class="fa fa-calendar"></i> <?php
                                $Today = date('y:m:d');
                                $new = date('l, F d, Y', strtotime($Today));
                                echo $new; ?>
                            </a>
                        </li>
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class='glyphicon glyphicon-shopping-cart'></span> Total Harga Pesanan: &#36; <?php echo $total; ?> </b></a>
                        </li>
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user_email; ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a data-toggle="modal" data-target="#setAccount"><i class="fa fa-gear"></i> Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper">
                <div class="alert alert-default" style="color:white;background-color:#008CBA">
                    <center>
                        <h3> <span class="glyphicon glyphicon-eye-open"></span> Pesanan Barang Sebelumnya</h3>
                    </center>
                </div>
                <br />
                <div class="table-responsive">
                    <table class="display table table-bordered" id="example" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include("db_conection.php");
                                $sql = "SELECT * FROM orderdetails where order_status='Ordered_Finished' and user_id='$user_id'";
                                $stid = oci_parse($dbcon,$sql);
                                oci_execute($stid);

                                while (oci_fetch($stid)) 
                                {
                            ?>
                            <tr>
                                <td><?php echo oci_result($stid,'ORDER_NAME'); ?></td>
                                <td>&#36; <?php echo oci_result($stid,'ORDER_PRICE'); ?> </td>
                                <td><?php echo oci_result($stid,'ORDER_QUANTITY'); ?></td>
                                <td>&#36; <?php echo oci_result($stid,'ORDER_TOTAL'); ?> </td>
                            </tr>
                            <?php
                                    }
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                                echo "<br />";
                                echo '<div class="alert alert-default" style="background-color:#033c73;">
                                        <p style="color:white;text-align:center;">
                                            &copy 2020 WOUF Store| Design by : Made Rahano
                                        </p>  
                                        </div>
                                        </div>';
                                echo "</div>";
                            ?>
                        </tbody>
                    </div> 
                </div>
            </div>
        </div>
        <div class="modal fade" id="setAccount" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
            <div class="modal-dialog modal-sm">
                <div style="color:white;background-color:#008CBA" class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 style="color:white" class="modal-title" id="myModalLabel">Account Settings</h2>
                    </div>
                    <div class="modal-body">
                        <?php
                            include("db_conection.php");
                            $sql = "SELECT * FROM users WHERE user_id = $user_id";
                            $stid = oci_parse($dbcon,$sql);
                            oci_execute($stid);

                            while(oci_fetch($stid))
                            {
                        ?>
                        <form enctype="multipart/form-data" method="post" action="settings.php">
                            <fieldset>
                                <p>Nama Pertama:</p>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nama Pertama" name="user_firstname" type="text" value="<?php  echo oci_result($stid,'USER_FIRSTNAME'); ?>" required>
                                </div>
                                <p>Nama Terakhir:</p>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nama Terakhir" name="user_lastname" type="text" value="<?php  echo oci_result($stid,'USER_LASTNAME'); ?>" required>
                                <p>Alamat:</p>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Alamat" name="user_address" type="text" value="<?php  echo oci_result($stid,'USER_ADDRESS'); ?>" required>
                                </div>
                                <p>Kata Sandi:</p>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Kata Sandi" name="user_password" type="password" value="<?php  echo oci_result($stid,'USER_PASSWORD'); ?>" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control hide" name="user_id" type="text" value="<?php  echo oci_result($stid,'USER_ID'); ?>" required>
                                </div>
                            </fieldset>
                            <div class="modal-footer">
                                <button class="btn btn-block btn-success btn-md" name="user_save">Save</button>
                                <button type="button" class="btn btn-block btn-danger btn-md" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#priceinput').keypress(function (event) {
                    return isNumber(event, this)
                });
            });
            function isNumber(evt, element) 
            {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (
                    (charCode != 45 || $(element).val().indexOf('-') != -1) &&      
                    (charCode != 46 || $(element).val().indexOf('.') != -1) &&      
                    (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }    
        </script>
    </body>
</html>