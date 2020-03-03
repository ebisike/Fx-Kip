            <div class="navbar-default sidebar" role="navigation" style="margin-top: -0%">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="home.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="credit.php"><i class="fa fa-edit fa-fw"></i> Credit slip</a>
                        </li>
                        <li>
                            <a href="debit.php"><i class="fa fa-money fa-fw"></i> Debit slip</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book fa-fw"></i> Account Book<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="view_credit.php"><i class="fa fa-search"></i> Credit</a>
                                </li>
                                <li>
                                    <a href="view_debit.php"><i class="fa fa-building"></i> Debit</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#error"><i class="fa fa-warning fa-fw"></i> Error</a>
                        </li>
                        <li>
                            <a href="e-statement.php"><i class="fa fa-book fa-fw"></i> Generate Statement</a>
                        </li>
                        <!-- <li>
                            <a data-toggle="modal" href="#" data-target="#statement"><i class="fa fa-book fa-fw"></i> Generate Statement</a>
                        </li> -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->

            <!-- Error Modal -->
    <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Error Correction Slip</h5>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                  <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                      <div class="form-group">
                          <select class="form-control" name="error" required>
                              <option value="0">---------Select An Error Type---------</option>
                              <option value="1">Credit Error</option>
                              <option value="2">Debit Error</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Slip Id *</label>
                          <input type="number" name="slipId" class="form-control" required placeholder="Enter The Slid Id of the Wrong Data" data-toggle="tooltip" title="To get the slid Id, go to the respective Record Book">
                      </div>
                      <div class="form-group">
                          <textarea class="form-control" name="error_desc" placeholder="State the reason for the error"></textarea>
                      </div>
                      <input type="submit" name="correct" value="correct" class="btn btn-primary">
                  </form>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger close" data-dismiss="modal">x</button>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

            <!-- ACCOUNT STATEMENT Modal -->
    <div class="modal fade" id="statement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Generate Account Statement</h5>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                  <form role="form" action="e-statement.php" method="post">
                      <div class="form-group">
                          <label>Start Date *</label>
                          <input type="date" name="s_date" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>End Date *</label>
                          <input type="date" name="e_date" class="form-control">
                      </div>
                      <input type="submit" name="generate" value="generate" class="btn btn-primary">
                  </form>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-12">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger close" data-dismiss="modal">x</button>
                  </div>  
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
        
        //require('../../handler/accountstatement.php'); //code to handle statement generation request

        if(isset($_POST['correct'])){
            if($account->errorHandle($_POST)){
                echo "<script>alert()</script>";
            }
        }
    ?>

    