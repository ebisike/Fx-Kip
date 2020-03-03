<?php
    include '../mData/class/init.php';
    #2620 deskjet
    //$login->checkIfLogin();
    require('../handler/reset.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reset Password</title>
    <link rel="icon" type="image/ico" href="/fx-kip/mData/img/icon.png">

    <!-- Bootstrap Core CSS -->
    <link href="../mData/data_management/landing-pagex/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../mData/data_management/landing-pagex/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../mData/data_management/landing-pagex/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../mData/data_management/landing-pagex/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Password Reset</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter the email address associated with your account" name="email" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter a new Password" name="pwd" type="password">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="reset" class="btn btn-success" value="Submit">
                                <a href="../index.php" class="btn btn-warning">Cancle</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
