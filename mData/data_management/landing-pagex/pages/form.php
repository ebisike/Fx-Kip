<?php
    include '../../../class/init.php';

    $login->checkIfLogin();

    # the next line calls the php file to handle all form actions
    require('../../../../handler/form_handler.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>form data</title>
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
    include_once('header.php');
    include_once('navbar.php');
?>
        
       
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="page-header">Membership Forms</h1>
                    <p class="help-block" style="margin-top: -2%; font-style: italic;">Note you can't move to the next stage until you complete this stage.</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <a href="form.php?num=1"><i class="fa fa-male fa-fw"></i>Basic Info</a>
                    <a href="form.php?num=2"><i class="fa fa-phone fa-fw"></i>Contact Info</a>
                    <a href="form.php?num=3"><i class="fa fa-diamond fa-fw"></i>Marital Info</a>
                    <a href="form.php?num=6"><i class="fa fa-child fa-fw"></i>Children Info</a>
                    <a href="form.php?num=4"><i class="fa fa-heart fa-fw"></i>Social Info</a>
                    <a href="form.php?num=5"><i class="fa fa-building fa-fw"></i>Church Info</a>
                </div>
            </div><br>
            <div class="row">
                <?php
                    switch ($num) {
                        case '1':
                            # code...
                        echo '
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-success">
                            Basic Information | fields marked * are compulsory
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>choose a passport</label>
                                            <input type="file" name="file" class="form-control" value="1.jpg">
                                        </div>
                                        <div class="form-group">
                                            <label>Stewardship number *</label>
                                            <input class="form-control" type="number" placeholder="enter Stewardship number" name="stewardship" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name *</label>
                                            <input class="form-control" type="text" placeholder="enter your surname" name="lName" required>
                                        </div>
                                        <div class="form-group">
                                            <label>First Name *</label>
                                            <input class="form-control" type="text" placeholder="enter your own name" name="fName" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Other Names</label>
                                            <input class="form-control" placeholder="enter your middle name" type="text" name="oName">
                                        </div>
                                        <div class="form-group">
                                            <label>Date of birth *</label>
                                            <input type="date" name="dob" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Gender: </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" value="male">male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" value="female">female
                                            </label>
                                        </div>
                                        <input type="submit" name="next1" class="btn btn-default" value="next" onclick="nextForm()">
                                    </form><br>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 2%">
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
                <div id="aform"></div>
            </div> 
                             ';
                            break;
                        case '2':
                            # code...
                        echo '
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Contact Information | fields marked * are compulsory
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" value="$_SESSION[ref_id]" name="ref_id">
                                        </div>
                                        <div class="form-group">
                                            <label>Address *</label>
                                            <input class="form-control" type="text" placeholder="Please Enter Your Address" name="address" required>
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
                                            <input class="form-control" placeholder="example@example.com" type="email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>State of origin *</label>
                                            <select class="form-control" name="state">
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
                                            <label>L.G.A *</label>
                                            <input type="text" name="lga" placeholder="Local Government Area" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Town/village *</label>
                                            <input type="text" name="villa" placeholder="enter your village" class="form-control" required>
                                        </div>
                                        <a href="form.php?back='.$num.'" class="btn btn-primary">Back</a>
                                        <input type="submit" name="next2" class="btn btn-default" value="next">
                                    </form><br>
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
                             ';
                            break;
                        case '3':
                            # code...
                        echo '
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Marital Information | fields marked * are compulsory
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" value="$_SESSION[ref_id]" name="ref_id">
                                        </div>
                                        <div class="form-group">
                                            <label>Marital Status *</label>
                                            <select class="form-control" required name="marital">
                                                <option value="single">single</option>
                                                <option value="marrried">marrried</option>
                                                <option value="separated">separated</option>
                                                <option value="widowed">widowed</option>
                                                <option value="widower">widower</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Name of spouse</label>
                                            <input class="form-control" type="text" placeholder="enter full name" name="spouse">
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input list="title" class="form-control" placeholder="Choose a prefix title" name="title">
                                            <datalist id="title">
                                                <option value="Mr.">
                                                <option value="Mrs.">
                                                <option value="Dr.">
                                                <option value="Barr.">
                                                <option value="Engr.">
                                                <option value="Hon.">
                                            </datalist>
                                        </div>
                                        <div class="form-group">
                                            <label>Nature of marriage</label>
                                            <select class="form-control" required name="marriageNature">
                                                <option value="nill">unmarried</option>
                                                <option value="Traditional">Traditional</option>
                                                <option value="Ordinance">Ordinance</option>
                                                <option value="Blessing">Blessing</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Marriage</label>
                                            <input class="form-control" type="date" name="dom">
                                        </div>
                                        <div class="form-group">
                                            <label>Number of children</label>
                                            <input class="form-control" type="number" name="child" placeholder="enter number of children" min="0" maxlength="2">
                                        </div>
                                        <a href="form.php?back='.$num.'" class="btn btn-primary">Back</a>
                                        <input type="submit" name="next3" class="btn btn-default" value="next">
                                    </form><br>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
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
                             ';
                            break;
                        case '4':
                            # code...
                        echo '
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Social Information | fields marked * are compulsory
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="'.($_SERVER["PHP_SELF"]).'" method="POST">
                                        <div class="form-group">
                                             <input type="hidden" value="$_SESSION[ref_id]" name="ref_id">
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
                                            <input list="income" class="form-control" placeholder="Enter Occupation" name="occupation" required>
                                            <datalist id="income">
                                                <option value="Civil servant">
                                                <option value="Entrepreneur">
                                                <option value="Student">
                                            </datalist>
                                        </div>
                                        <div class="form-group">
                                            <label>Nature of Business</label>
                                            <input type="text" name="job" placeholder="nature of business" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Address *</label>
                                            <input class="form-control" type="text" name="bizAddress" placeholder="office/business address (name of school for students)" required>
                                        </div>
                                        <a href="form.php?back='.$num.'" class="btn btn-primary">Back</a>
                                        <input type="submit" name="next4" class="btn btn-default" value="next">
                                    </form><br>
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
                             ';
                            break;
                        case '5':
                            # code...
                        echo '
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Church Information | fields marked * are compulsory
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="'.($_SERVER["PHP_SELF"]).'" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" value="$_SESSION[ref_id]" name="ref_id">
                                        </div>
                                        <div class="form-group">
                                            <label>Are you Baptized? *</label><br>
                                            <label class="radio-inline">
                                                <input type="radio" name="baptizim" value="No">No
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="baptizim" value="Yes">Yes
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Baptizim</label>
                                            <input type="date" name="dob" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Are you Confirmed? *</label><br>
                                            <label class="radio-inline">
                                                <input type="radio" name="confirm" value="No">No
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="confirm" value="Yes">Yes
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Confirmation</label>
                                            <input type="date" name="doc" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Group *</label>
                                            <select class="form-control" required name="group">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>
                                        <a href="form.php?back='.$num.'" class="btn btn-primary">Back</a>
                                        <input type="submit" name="next5" class="btn btn-success" value="submit">
                                    </form><br>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 97%">
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
                            ';
                            break;
                            case '6':
                            # code...
                        echo '
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Children Information | fields marked * are compulsory
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="'.($_SERVER["PHP_SELF"]).'" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" value="$_SESSION[ref_id]" name="ref_id">
                                        </div>
                                        <div class="form-group">
                                            <label>Child\'s fullname</label>
                                            <input type="text" name="child_name" required class="form-control" placeholder="child\'s fullname">
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="date" name="dob" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="new_child" value=1>
                                            <p style="margin-top: -23px; margin-left: 18px">check this box to stay on this page to add more children</p>
                                        </div>
                                        <a href="form.php?back='.$num.'" class="btn btn-primary">Back</a>
                                        <input type="submit" name="next6" class="btn btn-grey" value="next / submit">
                                    </form><br>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 97%">
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
                            ';
                            break;
                        
                        default:
                            # code...
                        echo '<h3 class="page-header text-primary">Click on the links above to view form</h3>';
                            break;
                    }
                ?>
            </div>
            
        </div>
    </div>
    <!-- /#wrapper -->
    <!-- JavaScript for AJAX -->
    <!-- <script type="text/javascript">
        function nextForm(){
            if(window.XMLHttpRequest){
                var xmlHttp = new XMLHttpRequest();
            }else{
                var xmlHttp = ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlHttp.onreadystatechange = function(){
                if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
                    <?php $num ?> = xmlHttp.responseText;
                }
            };
            xmlHttp.open("GET", "file.php?num")
        }
    </script> -->
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
