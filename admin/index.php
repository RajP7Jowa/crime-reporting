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
            <h1><img src="../assets/images/home.png" style="position: relative; " />&nbsp; Dashboard</h1>
            <div class="clear"></div>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="dashboard-content">
                        <div class="dashboard-heading">Overview</div>
                        <table style="margin-top:20px;">
                            <tr>
                                <td>Reported Crimes</td>
                                <td class="right"><?php $db_conn->getTotalCrimes(); ?></td>
                            </tr>
                            <tr>
                                <td>Missing Persons</td>
                                <td class="right"> <?php $db_conn->getTotalMissingPersons(); ?></td>
                            </tr>
                            <tr>
                                <td>Missing Vehicles</td>
                                <td class="right"><?php $db_conn->getTotalMissingVehicles(); ?></td>
                            </tr>
                            <tr>
                                <td>Lost Items</td>
                                <td class="right"><?php $db_conn->getTotalLostItems(); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="dashboard-content">
                        <div class="dashboard-heading">Applications</div>
                        <table style="margin-top:20px; width: 100%;">
                            <?php
                            $db_conn->getApplications();
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="dashboard-content">
                        <div class="dashboard-heading">Vehicles</div>
                        <table width="100%" style="margin-top:20px;">
                            <?php
                            echo '<tr style="border-bottom:2px solid #000;">';
                            echo '<td><b>Status</b></td>';
                            echo '<td text-align="center"><b>Number Plate</b></td>';
                            echo '<td text-align="center"><b>Action</b></td>';
                            echo '</tr>';

                            $db_conn->getStollenVehicles();

                            $db_conn->getFoundVehicles();
                            ?>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="dashboard-content">
                        <div class="dashboard-heading">Persons</div>
                        <table style="margin-top:20px; width: 100%;">
                            <tr style="border-bottom:2px solid #000;">
                                <td>Category</td>
                                <td><b>Name</b></td>
                                <td text-align="center"><b>Action</b></td>
                            </tr>

                            <?php
                            $db_conn->getMissingPersons();
                            $db_conn->getFoundPersons();

                            ?>
                        </table>
                    </div>
                </div>
            </div>

        </div>


    </div>

    <?php include 'php/includes/footer.php'; ?>