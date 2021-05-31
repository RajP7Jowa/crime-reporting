<?php $current_page = basename($_SERVER['SCRIPT_NAME']); ?>

<div id="nav">

   <div id="navcontainer">
      <ul id="navlist">
         <li <?php if ($current_page == 'index.php') echo 'class="selected"' ?>><a href="index.php">Dashboard</a></li>
         <li style="float:right;"> <a href="../logout.php"><small>Logout</small></a></li>
         <li style="float:right;"><a href="../index.php">Site</a><span></span></li>
      </ul>
   </div>
</div>