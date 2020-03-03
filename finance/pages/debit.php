<?php
    include '../../mData/class/init.php';

    $login->checkIfLogin();
    require('../../handler/debitslip.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>debit</title>
    <link rel="icon" type="image/ico" href="/fx-kip/mData/img/icon.png">
    

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <style type="text/css">
        #icon{
            width: 15%;
            float: left;
            margin-left: 5%;
        }
    </style>
    <div id="wrapper">

<?php
    include('header.php');
    include_once('navbar.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header"><i class="fa fa-money"> Debit Slip</i></h1>
                    <!-- <p class="help-block" style="margin-top: -4%; font-style: italic;">Note you can't move to the next stage until you complete this stage.</p> -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-success">
                            Expenditure | fields marked * are compulsory
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
                                        <div class="form-group">
                                            <label>Expense Category *</label>
                                            <input list="income" class="form-control" placeholder="provide debit source" name="expense" required>
                                            <datalist id="income">
                                                <option value="Utility Bills">
                                                <option value="Salary">
                                                <option value="Diocesan Assessment">
                                                <option value="Medicals">
                                                <option value="Church Vestment">
                                                <option value="Gifts/Donations">
                                                <option value="Printing and Stationaries">
                                            </datalist>
                                        </div>
                                        <div class="form-group">
                                            <label>Amount *</label>
                                            <input class="form-control" type="number" placeholder="enter amount" name="amount" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Date payment was made *</label>
                                            <input type="date" name="dates" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" cols="5" placeholder="enter income description *" name="desc" required></textarea>
                                        </div>
                                        <input type="submit" name="debit" class="btn btn-danger">
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                <div id="aform"></div>
            </div>
            <!-- /.row -->
            <!-- php code here -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
