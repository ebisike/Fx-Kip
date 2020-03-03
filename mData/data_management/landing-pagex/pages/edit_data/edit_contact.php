<?php
    include '../../../class/init.php';

    $login->checkIfLogin();
    if(!empty($_SESSION['ref_id'])){
        if(isset($_POST['next2'])){
            if($write->setContactData($_POST)){
                header("Location: form_marital.php");
            }else{
                echo "updated!";
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
                            Contact Information | fields marked * are compulsory
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>"" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" value="<?php echo $_SESSION['ref_id']?>" name="ref_id" placeholder="<?php echo $_SESSION['ref_id']?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Address *</label>
                                            <input class="form-control" type="text" placeholder="enter your address" name="address" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Primary Phone *</label>
                                            <input class="form-control" type="number" placeholder="enter your telephone" name="tel1" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Secondary Phone</label>
                                            <input class="form-control" type="number" placeholder="telephone (optional)" name="tel2">
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input class="form-control" placeholder="example@example.com" type="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label>State of origin *</label>
                                            <select class="form-control" required name="state">
                                                <option value="Abia">Abia</option>
                                                <option value="Adamawa">Adamawa</option>
                                                <option value="Akwa Ibom">Akwa Ibom</option>
                                                <option value="Anambra">Anambra</option>
                                                <option value="Bauchi">Bauchi</option>
                                                <option value="Bayelsa">Bayelsa</option>
                                                <option value="Benue">Benue</option>
                                                <option value="Borno">Borno</option>
                                                <option value="Cross River">Cross River</option>
                                                <option value="Delta">Delta</option>
                                                <option value="Ebonyi">Ebonyi</option>
                                                <option value="Edo">Edo</option>
                                                <option value="Ekiti">Ekiti</option>
                                                <option value="Enugu">Enugu</option>
                                                <option value="Gombe">Gombe</option>
                                                <option value="Imo">Imo</option>
                                                <option value="Jigawa">Jigawa</option>
                                                <option value="Kaduna">Kaduna</option>
                                                <option value="Kano">Kano</option>
                                                <option value="Kastina">Kastina</option>
                                                <option value="Kebbi">Kebbi</option>
                                                <option value="Kogi">Kogi</option>
                                                <option value="Kwara">Kwara</option>
                                                <option value="Lagos">Lagos</option>
                                                <option value="Nassarawa">Nassarawa</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Ogun">Ogun</option>
                                                <option value="Ondo">Ondo</option>
                                                <option value="Osun">Osun</option>
                                                <option value="Oyo">Oyo</option>
                                                <option value="Plateau">Plateau</option>
                                                <option value="Rivers">Rivers</option>
                                                <option value="Sokoto">Sokoto</option>
                                                <option value="Taraba">Taraba</option>
                                                <option value="Yobe">Yobe</option>
                                                <option value="Zamfara">Zamfara</option>
                                                <option value="FCT">FCT</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>L.G.A</label>
                                            <input type="text" name="lga" placeholder="Local Government Area" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Town/village</label>
                                            <input type="text" name="villa" placeholder="enter your village" class="form-control" required>
                                        </div>
                                        <input type="submit" name="next2" class="btn btn-default" value="next">
                                    </form>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
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
