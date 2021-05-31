<?php

include 'includes/overallheader.php';

if (!isset($_SESSION['email'])) {
  header('Location:../logout.php');
}

?>
<div class="container">
  <div id="header">
    <div class="mainLogo">
      <div class="logo"><img src="../assets/images/lg.png" width="60px" height="50px" /> Crime <span> reporter</span></div>
    </div>
    <div id="login">
      <?php if (isset($_SESSION['email'])) { ?>
        <div class="div1">
          <img src="../assets/images/lock-open.png" style="position: relative; top: 3px;"> &nbsp; You are logged in as: <b>Admin</b>
        </div>
      <?php } else { ?>
        <a href="login.php">Login</a> | <a href="register.php">Register</a>
      <?php } ?>
    </div>
  </div>
  <?php include 'includes/menu.php'; ?>
  <div class="clear"></div>

  <div class="main">
    <div class="heading">
      <h1><img src="../assets/images/home.png" style="position: relative; " />&nbsp; Success</h1>
      <div class="clear"></div>
    </div>
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="dashboard-content">
            <div class="dashboard-heading">Info</div>
            <p style="margin-top:20px;background-color:#ccf6ae; border:2px solid #b1f580; padding:10px 15px;border-radius:5px;">
              <?php if (!isset($_GET['s'])) { ?>
                Success! An alert has been posted to the announcements page. <a href="index.php">Back to home</a>
              <?php
              } else {
              ?>
                Success! Announcement withdrawn. <a href="index.php">Back to home</a>
              <?php
              }
              ?>
            </p>

          </div>
        </div>

      </div>

    </div>
  </div>

  <?php include 'php/includes/footer.php'; ?>