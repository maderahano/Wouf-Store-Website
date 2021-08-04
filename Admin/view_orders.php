<?php
    session_start();

    if(!$_SESSION['admin_username'])
    {
        header("Location: ../index.php");
    }
?>

<?php
	error_reporting( ~E_NOTICE );
	require_once 'config.php';
	
	if(isset($_GET['view_id']) && !empty($_GET['view_id']))
	{
		$view_id = $_GET['view_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM users WHERE user_id=:user_id');
		$stmt_edit->execute(array(':user_id'=>$view_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: customers.php");
	}
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
                    <a class="navbar-brand" href="index.php">WOUF Store - Panel Administrasi</a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li><a href="index.php"> &nbsp; &nbsp; &nbsp; Home</a></li>
                        <li><a data-toggle="modal" data-target="#uploadModal"> &nbsp; &nbsp; &nbsp; Upload Items</a></li>
                        <li><a href="items.php"> &nbsp; &nbsp; &nbsp; Item Management</a></li>
                        <li class="active"><a href="customers.php"> &nbsp; &nbsp; &nbsp; Customer Management</a></li>
                        <li><a href="orderdetails.php"> &nbsp; &nbsp; &nbsp; Order Details</a></li>
                        <li><a href="logout.php"> &nbsp; &nbsp; &nbsp; Logout</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown messages-dropdown">
                            <a href="#"><i class="fa fa-calendar"></i>  
                                <?php
                                    $Today=date('y:m:d');
                                    $new=date('l, F d, Y',strtotime($Today));
                                    echo $new; 
                                ?>
                            </a>
                        </li>
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php   extract($_SESSION); echo $admin_username; ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper">
                <div class="alert alert-danger">
                    <center> <h3><strong>Customer Order Details</strong> </h3></center>            
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
                        <th>Tangal Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include("db_conection.php");
                    $sql = "SELECT * FROM orderdetails where user_id='$user_id' and order_status='Ordered'";
                    $stid = oci_parse($dbcon,$sql);
                    oci_execute($stid);
        
                    while($row=oci_fetch($stid))
                    {
                ?>
                    <tr>
                        <td><?php echo oci_result($stid,'ORDER_NAME'); ?></td>
                        <td>&#36; <?php echo oci_result($stid,'ORDER_PRICE'); ?> </td>
                        <td><?php echo oci_result($stid,'ORDER_QUANTITY'); ?></td>
                        <td>&#36; <?php echo oci_result($stid,'ORDER_TOTAL'); ?></td>
                        <td><?php echo oci_result($stid,'ORDER_DATE'); ?></td>
                    </tr>
                <?php
                        }
                    include("config.php");
                    $stmt_edit = $DB_con->prepare("select sum(order_total) as totalx from orderdetails where user_id=:user_id and order_status='Ordered'");
                    $stmt_edit->execute(array(':user_id'=>$user_id));
                    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
                    extract($edit_row);
                    echo "<tr>";
                    echo "<td colspan='3' align='right' style='font-size:20px;'>Customer: ".$user_firstname." ".$user_lastname." | <span style='color:red'>Total Price Ordered:</span>";
                    echo "</td>";
                    echo "<td style='font-size:18px;'><span style='color:red;'>&#36; ".$totalx."</span>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a class='btn btn-danger' href='customers.php'><span class='glyphicon glyphicon-backward'></span> Back<a/>'";
                    echo "</td>";
                    echo "</tr>";
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
            </div>
        </div>
        <br />
        <br />
        </div>
        </div>
        <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
            <div class="modal-dialog modal-md">
                <div style="color:white;background-color:#008CBA" class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 style="color:white" class="modal-title" id="myModalLabel">Upload Barang</h2>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" method="post" action="additems.php">
                            <fieldset>
                                <p>Nama Barang:</p>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Name Barang" name="item_name" type="text" required>
                                    </div>
                                <p>Harga:</p>
                                <div class="form-group">
                                    <input id="priceinput" class="form-control" placeholder="Harga" name="item_price" type="text" required>
                                </div>
                                <p>Pilih Gambar:</p>
                                <div class="form-group">
                                    <input class="form-control"  type="file" name="item_image" accept="image/*" required/>
                                </div>
                            </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-md" name="item_save">Save</button>
                        <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>
                        </form>
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
            function isNumber(evt, element) {
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
