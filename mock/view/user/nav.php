<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper green darken-2">
      <ul class="left">
        <a href="#" data-activates="show-sidenav" class="button-collapse waves-effect show-on-large">
            <span class="fa fa-bars fa-lg"></span>
          </a>
      </ul>
      <!--end of ul-->&emsp;&emsp;

      <a href="#" class="brand-logo hide-on-med-and-down" style="font-size:23px !important;">Electronic File Tracking System</a>


      <ul class="right ">
        <li><a href="#" class="dropdown-button" data-beloworigin="true" data-activates='dropdown1'><span class="fa fa-user fa-lg"></span></a></li>
        <!-- Dropdown Structure -->
        <ul id='dropdown1' class='dropdown-content'>
          <li><a href="myAccount.php"><small class="center green-text">My Account</small></a></li>
          <li><a href="myPhoto.php"><small class="center green-text">My Photos</small></a></li>
          <li><a href="logout.php"><small class="center green-text">Logout</small></a></li>
        </ul>
      </ul>
      <!--end of ul-->

      <ul class="right">
        <li><a href='#' class='dropdown-button' data-beloworigin='true' data-activates='notification'><span class='fa fa-bell fa-lg'></span> <span class='red' id="notif"></span></a></li>
        <!-- Dropdown Structure -->
        <ul id='notification' class='dropdown-content'>
          <li><a href='notifEfile.php'><small class='center green-text'>Efile <span class='red white-text' id="notif_efile"></span> </small></a></li>
          <li><a href='notifExcel.php'><small class='center green-text'>Excel <span class='red white-text' id="notif_excel"></span></small></a></li>
          <li><a href='notifPowerpoint.php'><small class='center green-text'>Powerpoint <span class='red white-text' id="notif_powerpoint"></span></small></a></li>
          <li><a href='notifVideo.php'><small class='center green-text'>Video <span class='red white-text' id="notif_video"></span></small></a></li>
        </ul>
      </ul>
      <!--end of ul-->

      <ul class="right ">
        <li><a href="index.php"><span class="fa fa-home fa-lg"></span></a></li>
      </ul>
      <!--end of ul-->

    </div>
    <!--end of nav-wrapper-->
  </nav>
  <!--end of nav-->
</div>






  <ul class="side-nav grey lighten-4" id="show-sidenav">

    <li>
      <div class="userView">
        <div class="background">
          <img src="../../DB/full-office-green.jpg" alt="" width="310" height="auto">
        </div>
        <!--end of background-->

        <div>
          <img class="circle" src="../../DB/profile/<?php echo $_SESSION['user_photo'];?>">
        </div>
        <!--end of div-->

        <span class="white-text name"><?php echo $_SESSION['user_fn']." ".$_SESSION['user_mn']." ".$_SESSION['user_ln'];?></span>
        <span class="white-text email"><?php echo $_SESSION['user_email'];?></span>


      </div>
      <!--end of userView-->
    </li>
    <!--end of li-->




    <li>
      <!--collapsible-->
      <ul class="collapsible" data-collapsible="accordion">
        <li>
          <a class="collapsible-header">&emsp;<span class="fa fa-id-card-o fa-lg">&emsp;</span>Manage E-file</a>
          <div class="collapsible-body grey lighten-4">
            <ul>
              <li><a href="createEfile.php">&emsp;&emsp;<span class="fa fa-caret-right ">&emsp;</span>Create E-file</a></li>
              <li><a href="myEfile.php">&emsp;&emsp;<span class="fa fa-caret-right ">&emsp;</span>My E-file</a></li>
            </ul>
          </div>
          <!--end of collapsable-body-->
        </li>
        <!--end of li-->
      </ul>
      <!--end of ul-->
    </li>
    <!--end of collapsible-->

    <li>
      <!--collapsible-->
      <ul class="collapsible" data-collapsible="accordion">
        <li>
          <a class="collapsible-header">&emsp;<span class="fa fa-files-o fa-lg">&emsp;</span>Other Files</a>
          <div class="collapsible-body grey lighten-4">
            <ul>
              <li><a href="myExcel.php">&emsp;&emsp;<span class="fa fa-caret-right ">&emsp;</span>Excel</a></li>
              <li><a href="myPowerpoint.php">&emsp;&emsp;<span class="fa fa-caret-right ">&emsp;</span>Powerpoint</a></li>
              <li><a href="myVideo.php">&emsp;&emsp;<span class="fa fa-caret-right ">&emsp;</span>Video</a></li>
            </ul>
          </div>
          <!--end of collapsable-body-->
        </li>
        <!--end of li-->
      </ul>
      <!--end of ul-->
    </li>
    <!--end of collapsible-->

    <li>
      <a href="chatRoom.php"><span class="fa fa-comments fa-lg">&emsp;</span>Chat Room</a>
    </li>



  </ul>
  <!-- end of side-nav -->
