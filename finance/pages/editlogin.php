<?php
    include '../../mData/class/init.php';

    $login->checkIfLogin();


    require('../../handler/editDetails.php');

    if(isset($_GET['cancel'])){
        $id = $_GET['cancel'];
        if($id == 1){
            header("Location: ../../mData/data_management/landing-pagex/pages/home.php");
        }
        elseif($id == 2){
            header("Location: home.php");
        }
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

    <title>Edit login</title>

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

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Your Info</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                            <fieldset>
                                <?php
                                    if(isset($_POST['edit'])){
                                        echo '
                                            <div class="row bg-primary" style="min-height: 50px">
                                                <div class="col-md-12">
                                                    '.$msg.'
                                                </div>
                                            </div>
                                        ';
                                    }
                                ?>
                                <div class="form-group">
                                    <label>company name</label>
                                    <input class="form-control" placeholder="<?php echo $company; ?>" name="comp_name" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" placeholder="<?php echo $email; ?>" name="email" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label>password</label>
                                    <input class="form-control" placeholder="Enter a password" name="pwd" type="password" required>
                                </div>
                                <!-- <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div> -->
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="edit" class="btn btn-success" value="Submit">
                                <a href="editlogin.php?cancel=<?php echo $_SESSION['user']?>" class="btn btn-warning">Cancel</a>
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
