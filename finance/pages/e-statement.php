<?php
    include '../../mData/class/init.php';

    $login->checkIfLogin();

    require('../../handler/accountstatement.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Statemet of Account</title>
    <link rel="icon" type="image/ico" href="/fx-kip/mData/img/icon.png">

    <!-- custom css -->
    <link href="../my_css/mystyle.css" rel="stylesheet">

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
    include_once('header.php');
    include_once('navbar.php');
?>
        
       
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header"><i class="fa fa-book"> e-Statement of Account</i></h1>
                    <!-- <p class="help-block" style="margin-top: -4%; font-style: italic;">Note you cant move to the next stage until you complete this stage.</p> -->
                </div>
            </div>
            <div class="statement-date">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" id="submitxx">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>Start Date *</label>
                                    <input type="date" name="s_date" class="form-control" id="sDate" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>End Date *</label>
                                    <input type="date" name="e_date" class="form-control" id="eDate" required>
                                    </div>
                                </div>
                                <div class="col-md-4 sub"><br>
                                    <input type="submit" name="generate" value="GENERATE" class="btn btn-primary btn-block" onclick="runSubmitEvent()">
                                </div>
                            </div>                           
                        </form>
                    </div>
                </div><hr>
            </div>
            <div class="row" id="errorMsg" style="display:none">
                <div class="col-md-12 bg-danger">
                    <h4>Sorry the end date appears to be lesser than the start date</h4>
                </div>
            </div>
            <!-- this code is used to display an error message when the startDate is greater than the endDate -->
            <!--<?php //if(isset($_POST['generate'])){ echo $msg; } ?> -->
            <div id="show">
                <div class="row">
                    <div class="col-lg-12 headerx">
                        <h4><b>Statement Period:</b></h4>
                        <p id="sd"></p>
                        <p id="ed"></p>
                        <h5 class="balance"><b>Opening Balance: <span>&#8358</span><?php echo $open_bal.'.00'?></b></h5>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3"><a href="#" class="statement" id="click1">Income Statement</a></div>
                    <div class="col-md-3"><a href="#" class="statement" id="click2">Expenditure Statement</a></div>
                </div><br>
                <div class="row">
                    <div class="panel-body" id="income">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="bg-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>(<span>&#8358</span>) Credit Amount</th>
                                        <th>Trans. date</th>
                                        <th>Value Date</th>
                                        <th>Credit Source</th>
                                        <th>Description</th>
                                        <th>(<span>&#8358</span>) Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php $account->incomeStatement($startDate,$endDate,$open_bal)?>
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- end of income div -->
                    <div class="panel-body" id="expenditure">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="bg-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>(<span>&#8358</span>) Debit Amount</th>
                                        <th>Trans. date</th>
                                        <th>Devalue Date</th>
                                        <th>Expenditure Source</th>
                                        <th>Description</th>
                                        <th>(<span>&#8358</span>) Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php $account->expenditureStatement($startDate,$endDate,$open_bal)?>
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- end of expenditure div -->
                </div>
            </div>
            <!-- end of show div -->
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- my custome JavaScript -->
    <script type="text/JavaScript" src="../js/my_js.js"></script>
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
