<?php
    include '../../../class/init.php';

    $login->checkIfLogin();
    if(isset($_GET['var']) && isset($_GET['name'])) {
        $id=$_GET['var'];
        $name=$_GET['name'];
    $_SESSION['name'] = $name;
    $_SESSION['ref_id'] = $id;
    }
    $basic=$fetch->getBasicInfo(1,$_SESSION['ref_id']);
    $contact=$fetch->getContactInfo($_SESSION['ref_id']);
    $marital=$fetch->getMaritalInfo($_SESSION['ref_id']);
    $church=$fetch->getChurchInfo($_SESSION['ref_id']);
    $social=$fetch->getSocialInfo($_SESSION['ref_id']);

    if(!empty($marital['name_of_spouse'])){
        $spouse = $marital['name_of_spouse'].' '.$basic['last_name'];
    }else{
        $spouse = $marital['name_of_spouse'];
    }
    
    $num='';
    if(isset($_GET['num'])){
        $num = $_GET['num'];
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

    <title><?php echo $_SESSION['name'];?></title>
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
                <div class="col-lg-6">
                    <h1 class="page-header text-primary"><?php echo $_SESSION['name'];?></h1>
                    <a href="view_data.php?num=1"><i class="fa fa-phone fa-fw"></i>Contact Info</a>
                    <a href="view_data.php?num=2"><i class="fa fa-diamond fa-fw"></i>Marital Info</a>
                    <a href="view_data.php?num=3"><i class="fa fa-building fa-fw"></i>Church Info</a>
                    <a href="view_data.php?num=4"><i class="fa fa-heart fa-fw"></i>Social Info</a>
                    <a href="view_data.php?num=5"><i class="fa fa-child fa-fw"></i>Childern Info</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <img src="<?php echo 'passports/'.$basic['passport'] ?>" class="img-responsive">
                </div>
                <div class="col-lg-10">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Stewardship</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>other Name(s)</th>
                                        <th>Date 0f Birth</th>
                                        <th>Gender</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    /************************************
                                    create a time stamp for the expense date
                                    ****************************************/
                                    $timestamp = strtotime($basic['date_of_birth']);
                                    $day = date("d", $timestamp);
                                    $Day = date("D", $timestamp);
                                    $month = date("M", $timestamp);
                                    $year = date("Y", $timestamp);
                                    $birthday = $Day." ".$day.", ".$month." ".$year;
                                    /***************************************/
                                    echo
                                    '
                                        <tr>
                                            <td>'.$basic['stewardship'].'</td>
                                            <td>'.$basic['first_name'].'</td>
                                            <td>'.$basic['last_name'].'</td>
                                            <td>'.$basic['other_name'].'</td>
                                            <td>'.$birthday.'</td>
                                            <td>'.$basic['gender'].'</td>
                                        </tr>
                                    ';
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
            </div>
            <div class="col-lg-12" id="contact">
                <?php
                    switch ($num) {
                        case '1':
                            echo 
                                    '
                                        <div class="row">
                                            <h4 class="page-header"><i class="fa fa-phone fa-fw">CONTACT INFORMATION</i></h4>
                                            <p><b>Address: </b>'. $contact['Address'].'</p>
                                            <p><b>Phone 1: </b>'. $contact['phone1'].'</p>
                                            <p><b>Phone 2: </b>'. $contact['phone2'].'</p>
                                            <p><b>E-mail: </b>'. $contact['email'].'</p>
                                            <p><b>State of Origin: </b>'. $contact['state_of_origin'].'</p>
                                            <p><b>LGA: </b>'. $contact['LGA'].'</p>
                                            <p><b>Village: </b>'. $contact['village'].'</p>
                                        </div>
                                    ';
                            break;

                        case '2':
                                    /************************************
                                    create a time stamp for the expense date
                                    ****************************************/
                                    $timestamp = strtotime($marital['date_of_marriage']);
                                    $day = date("d", $timestamp);
                                    $Day = date("D", $timestamp);
                                    $month = date("M", $timestamp);
                                    $year = date("Y", $timestamp);
                                    $marriageday = $Day." ".$day.", ".$month." ".$year;
                                    /***************************************/
                            echo 
                                    '
                                        <div class="row">
                                            <h4 class="page-header"><i class="fa fa-diamond fa-fw">MARITAL INFORMATION</i></h4>
                                            <p><b>Marital Status: </b>'. $marital['marital_status'].'</p>
                                            <p><b>Name of spouse: </b>'. $spouse.'</p>
                                            <p><b>Nature of Marriage: </b>'. $marital['nature_of_marriage'].'</p>
                                            <p><b>Date of Marriage: </b>'. $marriageday.'</p>
                                            <p><b>Number of Children: </b>'. $marital['number_of_children'].'</p>
                                        </div>
                                    ';
                            break;

                        case '3':
                                    /************************************
                                    create a time stamp for the expense date
                                    ****************************************/
                                    $timestamp = strtotime($church['date_of_confirmation']);
                                    $day = date("d", $timestamp);
                                    $Day = date("D", $timestamp);
                                    $month = date("M", $timestamp);
                                    $year = date("Y", $timestamp);
                                    $confirmationday = $Day." ".$day.", ".$month." ".$year;
                                    /***************************************/

                                    $timestamp1 = strtotime($church['date_of_baptizim']);
                                    $day1 = date("d", $timestamp1);
                                    $Day1 = date("D", $timestamp1);
                                    $month1 = date("M", $timestamp1);
                                    $year1 = date("Y", $timestamp1);
                                    $baptismday = $Day1." ".$day1.", ".$month1." ".$year1;
                            echo 
                                    '
                                        <div class="row">
                                            <h4 class="page-header"><i class="fa fa-building fa-fw">CHURCH INFORMATION</i></h4>
                                            <p><b>Baptizim Status: </b>'. $church['baptizim_status'].'</p>
                                            <p><b>Date of Baptizim: </b>'. $baptismday.'</p>
                                            <p><b>Confirmation Status: </b>'. $church['confirmation_status'].'</p>
                                            <p><b>Date of Confirmation: </b>'. $confirmationday.'</p>
                                            <p><b>Group number: </b>'. $church['group_number'].'</p>
                                        </div>
                                    ';
                            break;

                        case '4':
                            echo 
                                    '
                                        <div class="row">
                                            <h4 class="page-header"><i class="fa fa-heart fa-fw">SOCIAL INFORMATION</i></h4>
                                            <p><b>Highest Academic Acheivement: </b>'. $social['academics'].'</p>
                                            <p><b>Occupation: </b>'. $social['occupation'].'</p>
                                            <p><b>Nature of Business: </b>'. $social['nature_of_business'].'</p>
                                            <p><b>Business Address: </b>'. $social['business_address'].'</p>
                                        </div>
                                    ';
                            break;
                        case '5':
                            echo 
                                    '<br>
                                    <p>Children Data </p>
                                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>FullName</th>
                                        <th>Date of Birth</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                    $fetch->getChildrenInfo($_SESSION['ref_id'],2);
                                echo '</tbody>
                            </table>
                        </div>
                                    ';
                            break;
                        
                        default:
                            # code...
                        echo '<h2 class="text-danger">DATA WILL BE AVAILABLE ON CLICK</h2>';
                            break;
                    }
                ?>
            </div>
        </div>
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