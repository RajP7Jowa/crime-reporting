<?php
include 'php/includes/header.php';

if (!isset($_SESSION['email'])) {
  Header('Location:logout.php');
}


?>
<div class="container" id="wrapper">
  <div id="header">
    <div class="mainLogo">
      <div class="logo"><img src="assets/images/lg.png" width="60px" height="50px" /> Crime <span> reporter</span></div>
    </div>
    <div id="login">
      <?php if (isset($_SESSION['email'])) { ?>
        <div class="div1">
          <img src="assets/images/lock-open.png" style="position: relative; top: 3px;"> &nbsp; You are logged in as: <b><?php echo $_SESSION['email']; ?></b>
        </div>
      <?php } else { ?>
        <a href="login.php">Login</a> | <a href="register.php">Register</a>
      <?php } ?>
    </div>
  </div>
  <div id="nav">
    <?php include 'php/includes/navigation.php' ?>
  </div>
  <div id="main">
    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-9">
        <div class="col-lg-12">
          <div class="well">
            <form class="bs-example form-horizontal" method="post" action="" id="apply">
              <fieldset>
                <input type="hidden" name="applicationForm" value="apply">
                <legend style="font-family: trebuchet ms;">Applications:</legend>
                <div id="application_alert"></div>
                <div class="form-group">
                  <label for="national_id" class="col-lg-2 control-label">ID number:</label><br>
                  <div class="col-lg-4">
                    <input class="form-control" id="national_id" placeholder="National ID Number" type="number" min="5" title="National Id required and should contain numbers only" required />
                  </div>
                </div>
                <div class="form-group">
                  <label for="app_type" class="col-lg-2 control-label">Application Type:</label><br>
                  <div class="col-lg-4">
                    <select class="form-control" id="app_type" title="Please select application type!" required name="app_type" style="font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;">
                      <option value="">-- Select --</option>
                      <option value="certificate">Cert. of Conduct</option>
                      <option value="abstract">Police Abstract</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-lg-4 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary pull-right" style="padding:5px 7px;border-radius:6px;font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;" id="application">Submit</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="clearer" style="height:8px;"></div>
  <?php include 'php/includes/footer.php'; ?>