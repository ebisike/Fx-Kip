<?php
    $result = $action->getRegistrationInfo(0,0,2);
    $name = strtoupper($result['company_name']);

    if($login->checkTimeOut()){
        header("location: ../../../../timeout.php");
    }
?>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header col-md-6">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="/fx-kip/mData/img/icon.png" class="img-responsive" id="icon" style="width: 10%"><a class="navbar-brand" href="home.php"><?php echo $name?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="view.php?val=1">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Students
                                    <span class="pull-right text-muted small"><?php $action->countInfo(1);?></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> Entrepreneur
                                    <span class="pull-right text-muted small"><?php $action->countInfo(2);?></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Civil Servant
                                    <span class="pull-right text-muted small"><?php $action->countInfo(3);?></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-group fa-fw"></i> Total number of Children Registered
                                    <span class="pull-right text-muted big"><?php $action->countInfo(4);?></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                        <li><a href="../../../../handler/switchUI.php?switch=<?php echo $_SESSION['user']?>"><i class="fa fa-android fa-fw"></i> Switch UI</a></li>
                        <li><a href="../../../../finance/pages/editlogin.php" class="disabled"><i class="fa fa-gear fa-fw"></i> Edit Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/fx-kip/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
        </nav>