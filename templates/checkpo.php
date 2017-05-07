<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'Password12#';
$db_name = 'fuelhqdb';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$sql = 'SELECT * FROM orders';
$query = mysqli_query($conn, $sql);

if (!$query){
    die ('SQL Error: ' . mysqli_error($conn));
}
?>

<html>
    <head>
        <title>AMFCS | Check PO</title>
        
        <!--Bootstrap Theme Specific-->
      <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="http://getbootstrap.com/examples/jumbotron-narrow.css" rel="stylesheet">
      
      <!--Login Form Specific-->
      <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
      <link rel="stylesheet" href="../static/css/style.css">

        <style type="text/css">
            body{
                font-size: 15px;
                color: #343d44;
                font-family: "segoe-ui", "open-sans", tahoma, arial;
                margin: 0;
                padding-bottom:50px;
            }           
            h1 {
                margin: 15px auto 0;
                text-align: center;
                text-transform: uppercase;
                font-size: 17px;
                font-weight: bold;
            }
            }
            table td {
                transition: all .5s;
            }
            /*Table*/
            .data-table{
                border-collapse: collapse;
                font-size: 14px;
                min-width: 537px;
                margin: auto;
            }

            .data-table th,
            .data-table td {
                border: 1px solid #e1edff;
                padding: 7px 17px;
            }
            .data-table caption {
                margin: 7px;
                text-align: center;
            }
            /*Table Header*/
            .data-table thead th {
                background-color: #508abb;
                color: #FFFFFF;
                border-color: #6ea1cc !important;
                text-transform: uppercase;
            }

            /*Table Body*/
            .data-table tbody td {
                color: #353535;
            }
            .data-table tbody td:first-child,
            .data-table tbody td:nth-child(4),
            .data-table tbody td:last-child {
                text-align: right;
            }

            .data-table tbody tr:nth-child(odd) td {
                background-color: #f4fbff;
            }
            .data-table tbody tr:hover td {
                background-color: #ffffa2;
                border-color: #ffff0f; 
            }
            /*Table Footer*/
            .data-table tfoot th {
                background-color: #e5f5ff;
                text-align: right;
            }
            .data-table tfoot th:first-child {
                text-align: left;
            }
            .data-table tbody td:empty
            {
                background-color: #ffcccc;
            }
            #foota{
                position: fixed;
                bottom:0;
                height:50px;
                width: 100%;
                color: #FFFFFF;
                text-align: center;
                background: #878787;
                padding-left: 20px;
                padding-top: 15px;
            }
            </style>
    </head>
    
    <body>
        <div class="container">
        
            <!--MAIN MENU START-->
            <div class="header">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation"><a href="home.php">Home</a>
                        </li>
                        <li role="presentation" class="active"><a href="#">Check PO</a>
                        </li>
                        <li role="presentation"><a href="checklevels.php">Check Levels</a>
                        </li>
                        <li role="presentation"><a href="deliver.php">Deliver</a>
                        </li>
                        <li role="presentation"><a href="login.php">Sign Out</a>
                        </li>
                    </ul>
                </nav>
                <h3 class="text-muted" style="margin-left:30px;">Automated Fuel Monitor & Control System</h3>
            </div>
            <!--MAIN MENU END-->

            <div class="jumbotron">
                <h4 align="right">Driver Logged In: DRV001 </h4>
            </div>


            <h1>Purchase Order</h1>
            <table class="data-table">
                <caption class="title">Check Purchase Orders/ Pending Deliveries</caption>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>PO Num</th>
                        <th>Loc ID</th>
                        <th>Driver ID</th>
                        <th>Date Exp</th>
                        <th>QTY Order</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $total = 0;
                while ($row = mysqli_fetch_array($query))
                {
                    echo '<tr>
                            <td>'.$no . '</td>
                            <td>'.$row['ponum'] . '</td>
                            <td>'.$row['locationid'].'</td>
                            <td>'.$row['assigneddriver'].'</td>
                            <td>'.$row['dateexpected'].'</td>
                            <td>'.$row['qty_ordered'].' gal</td>
                        </tr>';
                    $no++;     
                }?>
                </tbody>
            </table>
        </div>

        <!--FOOTER START-->
        <footer class="footer" id="foota">
                <p>&copy; AMFCS 2017<p>
        </footer>
        <!--FOOTER END-->

    </body>
</html>
