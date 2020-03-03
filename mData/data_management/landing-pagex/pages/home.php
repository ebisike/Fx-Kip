<?php
    include '../../../class/init.php';

    $login->checkIfLogin();
    unset($_SESSION['ref_id']);
    unset($_SESSION['name']);
    unset($_SESSION['editId']);

    if(isset($_GET['val'])){
        $x = $_GET['val'];
        switch ($x) {
            case '1':
                $msg = "BIRTHDAYS TODAY";
                break;
            case '2':
                $msg = "BIRTHDAYS FOR THE WEEK";
                break;
            case '3':
                $msg = "WEDDING ANNIVERSAY TODAY";
                break;
            case '4':
                $msg = "WEDDING ANNIVERSAY THIS WEEK";
                break;
            case '5':
                $msg = "CHILDREN BIRTHDAY TODAY";
                break;
            case '6':
                $msg = "WEEKLY CHILDREN BIRTHDAY";
                break;
                                        
            default:
                $msg = "EVENTS TABLE";
                        break;
        }
    }else{
        $msg = "EVENTS TABLE";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | dashboard</title>
    <link rel="icon" type="image/ico" href="/fx-kip/mData/img/icon.png">

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

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
            <!-- <div class="row">
                <div class="col-lg-12">
                    <img src="/fx-kip/mData/img/eye.jpg" class="img-responsive"><br>
                </div>
            </div> --><br>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php $action->countEvents(1);?></div>
                                    <div>Birthdays <br> Today!</div>
                                </div>
                            </div>
                        </div>
                        <a href="home.php?val=1">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php $action->countEvents(2);?></div>
                                    <div>Birthdays <br> This Week!</div>
                                </div>
                            </div>
                        </div>
                        <a href="home.php?val=2">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-heart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php $action->countEvents(3);?></div>
                                    <div>Marriage <br> Anniversary</div>
                                </div>
                            </div>
                        </div>
                        <a href="home.php?val=3">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-male fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php $action->countEvents(4);?></div>
                                    <div>Marriage Anniversary This Week!</div>
                                </div>
                            </div>
                        </div>
                        <a href="home.php?val=4">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row"><hr>
            <h5 style="padding-left: 18px">Children Birthday Notifications</h5>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-child fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php $action->countEvents(4);?></div>
                                    <div>Children Birthday <br> Today</div>
                                </div>
                            </div>
                        </div>
                        <a href="home.php?val=5">
                            <div class="panel-footer">
                                <span class="pull-left">view Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-child fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php $action->countEvents(6);?></div>
                                    <div>Weekly children Birthday</div>
                                </div>
                            </div>
                        </div>
                        <a href="home.php?val=6">
                            <div class="panel-footer">
                                <span class="pull-left">view Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- / row -->
            <!--tables-->
            <br><hr>
            <?php
                if(isset($_GET['val'])){
                    if($x==1 || $x==2){
                        echo '
                    <div class="col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        '.$msg.'
                                    </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Date of Birth</th>
                                                    <th>Age</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                                $action->getEvents($x);
                                       echo '</tbody>
                                        </table>
                                    </div>
                                <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                                </div>
                            <!-- /.panel -->
                            </div>
                        <!-- /.col-lg-6 -->
                        </div>
                    </div>
                ';
                    }elseif ($x==3 || $x==4) {
                        echo '
                    <div class="col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        '.$msg.'
                                    </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name of Spouse</th>
                                                    <th>Date of Wedding</th>
                                                    <th>Anniversary Count</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                                $action->getEvents($x);
                                       echo '</tbody>
                                        </table>
                                    </div>
                                <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                                </div>
                            <!-- /.panel -->
                            </div>
                        <!-- /.col-lg-6 -->
                        </div>
                    </div>
                ';
                    }elseif ($x==5 || $x==6) {
                        echo '
                    <div class="col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        '.$msg.'
                                    </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name of Child</th>
                                                    <th>Date of Birth</th>
                                                    <th>Age</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                                $action->getEvents($x);
                                       echo '</tbody>
                                        </table>
                                    </div>
                                <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                                </div>
                            <!-- /.panel -->
                            </div>
                        <!-- /.col-lg-6 -->
                        </div>
                    </div>
                ';
                    }
            }
            ?>
            
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

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
