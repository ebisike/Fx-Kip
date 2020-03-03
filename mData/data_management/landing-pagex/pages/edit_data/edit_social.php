<?php
    include '../../../class/init.php';

    $login->checkIfLogin();
    if(!empty($_SESSION['ref_id'])){
        if(isset($_POST['next4'])){
            if($write->setSocialData($_POST)){
                header("Location: form_church.php");
            }
        }
    }else{
        header("Location: form_basic.php");
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

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

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
                    <h1 class="page-header">Membership Forms</h1>
                    <p class="help-block" style="margin-top: -4%; font-style: italic;">Note you can't move to the next stage until you complete this stage.</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- php code here -->
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Social Information | fields marked * are compulsory
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>"" method="POST">
                                        <div class="form-group">
                                             <input type="hidden" value="<?php echo $_SESSION['ref_id']?>" name="ref_id" placeholder="<?php echo $_SESSION['ref_id']?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Highest Academic Qualification *</label>
                                            <select class="form-control" required name="academic">
                                                <option value="FSLC">FSLC</option>
                                                <option value="O level">O level</option>
                                                <option value="ND">ND</option>
                                                <option value="HND">HND</option>
                                                <option value="BSc.">BSc.</option>
                                                <option value="MSc.">MSc.</option>
                                                <option value="PHD">PHD</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Occupation *</label>
                                            <select class="form-control" required name="occupation">
                                                <option value="Civil servant">Civil servant</option>
                                                <option value="Entrepreneur">Entrepreneur</option>
                                                <option value="Student">Student</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nature of Business</label>
                                            <input type="text" name="job" placeholder="nature of business" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Address *</label>
                                            <input class="form-control" type="text" name="bizAddress" placeholder="office/business address" required>
                                        </div>
                                        <input type="submit" name="next4" class="btn btn-default" value="next">
                                    </form>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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
