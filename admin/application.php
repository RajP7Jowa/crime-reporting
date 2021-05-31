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
            <h1><img src="../assets/images/home.png" style="position: relative; " />&nbsp; Application</h1>
            <div class="clear"></div>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-content">

                        <div class="dashboard-heading">Details</div>

                        <table width="50%">
                            <?php

                            if (isset($_GET['id'])) {
                            ?>
                                <form method="post" action="application_handler.php">
                                    <input type="hidden" name="id_number" value="<?php echo $_GET['id'] ?>">

                                    <?php

                                    $db_conn->getDetailedInfo($_GET['id']);
                                    ?>
                                    <tr>
                                        <td colspan="2">
                                            <input style="border:none; margin-top: 10px;margin-right:20px;" type="submit" class="btn-danger btn-sm pull-right" name="deny" value="Deny" />&nbsp; &nbsp;
                                            <input style="border:none; margin-top: 10px; margin-right:20px;" type="submit" class="btn-success btn-sm pull-right" name="grant" value="Grant" />
                                        </td>
                                    </tr>
                                </form>
                            <?php
                            } else {
                                echo "No details to display";
                            }

                            ?>

                        </table>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <?php include 'php/includes/footer.php'; ?>