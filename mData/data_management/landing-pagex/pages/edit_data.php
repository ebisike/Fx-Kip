<?php
    include '../../../class/init.php';

    $login->checkIfLogin();
    $id='';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $_SESSION['editId'] = $id;

    }
    $basicInfo = $fetch->getBasicInfo(3,$_SESSION['editId']);
    $churchInfo = $fetch->getChurchInfo($_SESSION['editId']);
    $maritalInfo = $fetch->getMaritalInfo($_SESSION['editId']);
    $socialInfo = $fetch->getSocialInfo($_SESSION['editId']);
    $contactInfo = $fetch->getContactInfo($_SESSION['editId']);
    //echo $_SESSION['editId'];

    # the next line calls the php file to handle all form actions
    require('../../../../handler/edit_data.php');

    $num = '';
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

    <title>Edit</title>
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
                    <h1 class="page-header">Edit Data</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <a href="edit_data.php?num=1"><i class="fa fa-male fa-fw"></i>Basic Info</a>
                    <a href="edit_data.php?num=2"><i class="fa fa-phone fa-fw"></i>Contact Info</a>
                    <a href="edit_data.php?num=3"><i class="fa fa-diamond fa-fw"></i>Marital Info</a>
                    <a href="edit_data.php?num=6"><i class="fa fa-child fa-fw"></i>Children Info</a>
                    <a href="edit_data.php?num=4"><i class="fa fa-heart fa-fw"></i>Social Info</a>
                    <a href="edit_data.php?num=5"><i class="fa fa-building fa-fw"></i>Church Info</a>
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
                                            <input type="file" name="file" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Stewardship number *</label>
                                            <input class="form-control" type="number" placeholder="'.$basicInfo['stewardship'].'" name="stewardship" required value="'.$basicInfo['stewardship'].'">
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name *</label>
                                            <input class="form-control" type="text" placeholder="'.$basicInfo['last_name'].'" name="lName" required value="'.$basicInfo['last_name'].'">
                                        </div>
                                        <div class="form-group">
                                            <label>First Name *</label>
                                            <input class="form-control" type="text" placeholder="'.$basicInfo['first_name'].'" name="fName" required value="'.$basicInfo['first_name'].'">
                                        </div>
                                        <div class="form-group">
                                            <label>Other Names</label>
                                            <input class="form-control" placeholder="'.$basicInfo['other_name'].'" type="text" name="oName" value="'.$basicInfo['other_name'].'">
                                        </div>
                                        <div class="form-group">
                                            <label>Date of birth *</label>
                                            <input type="date" name="dob" class="form-control" required value="'.$basicInfo['date_of_birth'].'">
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
                                        <input type="submit" name="basic" class="btn btn-default" value="submit" onclick="nextForm()">
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
                                            <input class="form-control" type="text" placeholder="'.$contactInfo['Address'].'" name="address" required value="'.$contactInfo['Address'].'">
                                        </div>
                                        <div class="form-group">
                                            <label>Primary Phone *</label>
                                            <input class="form-control" type="number" placeholder="'.$contactInfo['phone1'].'" name="tel1" required value="'.$contactInfo['phone1'].'">
                                        </div>
                                        <div class="form-group">
                                            <label>Secondary Phone</label>
                                            <input class="form-control" type="number" placeholder="'.$contactInfo['phone2'].'" name="tel2" value="'.$contactInfo['phone2'].'">
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input class="form-control" placeholder="'.$contactInfo['email'].'" type="email" name="email" required value="'.$contactInfo['email'].'">
                                        </div>
                                        <div class="form-group">
                                            <label>State of origin *</label>
                                            <select class="form-control" name="state">
                                                <option value="'.$contactInfo['state_of_origin'].'">'.$contactInfo['state_of_origin'].'</option>
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
                                            <input type="text" name="lga" placeholder="'.$contactInfo['LGA'].'" class="form-control" required value="'.$contactInfo['LGA'].'">
                                        </div>
                                        <div class="form-group">
                                            <label>Town/village *</label>
                                            <input type="text" name="villa" placeholder="'.$contactInfo['village'].'" class="form-control" required value="'.$contactInfo['village'].'">
                                        </div>
                                        <input type="submit" name="contact" class="btn btn-success" value="submit">
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
                                                <option value="'.$maritalInfo['marital_status'].'">'.$maritalInfo['marital_status'].'</option>
                                                <option value="single">single</option>
                                                <option value="marrried">marrried</option>
                                                <option value="separated">separated</option>
                                                <option value="widowed">widowed</option>
                                                <option value="widower">widower</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Name of spouse</label>
                                            <input class="form-control" type="text" placeholder="'.$maritalInfo['name_of_spouse'].'" value="'.$maritalInfo['name_of_spouse'].'" name="spouse">
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input list="title" class="form-control" placeholder="Please choose a tite or enter a new one" name="title">
                                            <datalist id="title">
                                                <option value="Mr.">
                                                <option value="Mrs.">
                                                <option value="Dr.">
                                                <option value="Barr.">
                                                <option value="Engr.">
                                                <option value="Hon.">
                                                <option value="Ven.">
                                            </datalist>
                                        </div>
                                        <div class="form-group">
                                            <label>Nature of marriage</label>
                                            <select class="form-control" required name="marriageNature">
                                                <option value="'.$maritalInfo['nature_of_marriage'].'">'.$maritalInfo['nature_of_marriage'].'</option>
                                                <option value="nill">unmarried</option>
                                                <option value="Traditional">Traditional</option>
                                                <option value="Ordinance">Ordinance</option>
                                                <option value="Blessing">Blessing</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Marriage</label>
                                            <input class="form-control" type="date" name="dom" value="'.$maritalInfo['date_of_marriage'].'">
                                        </div>
                                        <div class="form-group">
                                            <label>Number of children</label>
                                            <input class="form-control" type="number" name="child" placeholder="'.$maritalInfo['number_of_children'].'" min="0" maxlength="7" value="'.$maritalInfo['number_of_children'].'">
                                        </div>
                                        <input type="submit" name="maritalS" class="btn btn-success" value="submit">
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
                                                <option value="'.$socialInfo['academics'].'">'.$socialInfo['academics'].'</option>
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
                                            <input list="income" class="form-control" placeholder="Enter Occupation" name="occupation" required value="'.$socialInfo['occupation'].'">
                                            <datalist id="income">
                                                <option value="Civil servant">
                                                <option value="Entrepreneur">
                                                <option value="Student">
                                            </datalist>
                                        </div>
                                        <div class="form-group">
                                            <label>Nature of Business</label>
                                            <input type="text" name="job" placeholder="nature of business" class="form-control" required value="'.$socialInfo['nature_of_business'].'">
                                        </div>
                                        <div class="form-group">
                                            <label>Address *</label>
                                            <input class="form-control" type="text" name="bizAddress" placeholder="office/business address (name of school for students)" required value="'.$socialInfo['business_address'].'">
                                        </div>
                                        <input type="submit" name="social" class="btn btn-success" value="submit">
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
                                            <input type="date" name="dob" class="form-control" value="'.$churchInfo['date_of_baptizim'].'">
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
                                            <input type="date" name="doc" class="form-control" value="'.$churchInfo['date_of_confirmation'].'">
                                        </div>
                                        <div class="form-group">
                                            <label>Group *</label>
                                            <select class="form-control" required name="group">
                                                <option value="'.$churchInfo['group_number'].'">'.$churchInfo['group_number'].'</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>
                                        <input type="submit" name="churchX" class="btn btn-success" value="submit">
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
            </div>
            <!-- /.row -->
                            ';
                            break;
                        case '6':
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
                                            <input type="number" name="updateId" class="form-control" required placeholder="Please enter an Update Id">
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" name="new_child" value=1>
                                            <p style="margin-top: -23px; margin-left: 18px">check this box to stay on this page to add more children</p>
                                        </div>
                                        <input type="submit" name="child" class="btn btn-success" value="submit">
                                    </form><br>
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
                             
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>update id</th>
                            <th>FullName</th>
                            <th>Date of Birth</th>
                        </tr>
                    </thead>
                    <tbody>';
                                    $fetch->getChildrenInfo($_SESSION['editId'],1);
                    echo '</tbody>
                </table>
            </div>
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
