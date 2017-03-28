<?php ?>
<body>
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="green">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li class="center"><h1 class="logo-wrapper" style="font-size: 45pt; ">SITM sms</h1></li>
                    </ul>
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <div class="row">
                                <div class="col col s4 m4 l4">
                                    <?php
                                    foreach ($userinfo as $ui) {
                                        if ($_SESSION['role'] == 3) {
                                            echo '<img class="responsive-img valign profile-image" src="' . base_url() . '/staff/teaching_staff/' . $ui->photo . '">';
                                        }  else if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2 || $_SESSION['role'] == 4 || $_SESSION['role'] == 5 || $_SESSION['role'] == 7 || $_SESSION['role'] == 8 || $_SESSION['role'] == 9 || $_SESSION['role'] == 10) {
                                            echo '<img class="responsive-img valign profile-image" style="height: 65px; width: 65px" src="' . base_url() . '/staff/non_teaching_staff/' . $ui->photo . '">';
                                        } else if ($_SESSION['role'] == 6) {
                                            echo '<img class="responsive-img valign profile-image"  src="' . base_url() . '/students/' . $ui->photo . '">';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="col s8 m8 l8">
                                    <ul id="profile-dropdown" class="dropdown-content">

                                        <li class="divider"></li>
                                        <?php  if ($_SESSION['role'] == 1) {?>
                                        <li><a href="<?php echo base_url(); ?>dashboard/userManager"><i class="mdi-action-lock-outline"></i>Manage Users</a>
                                        </li>
                                        <?php }?>
                                        <li><a href="<?php echo base_url(); ?>dashboard/logOut"><i class="mdi-hardware-keyboard-tab"></i>Logout</a>
                                        </li>
                                    </ul>
                                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">
                                       <i class="mdi right mdi-arrow-down-drop-circle-outline" style="padding-top: 8px"></i>
                                        <?php foreach ($userinfo as $ui) {
                                            if ($_SESSION['role'] == 6){
                                                echo $ui->s_name;
                                            } else {
                                                echo $ui->name;
                                            }
                                        } ?>
                                    </a>
<!--                                    <p class="user-roal">Administrator</p>-->
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="center"><img src="<?php echo base_url(); ?>plugins/logo_old.png" ></li>
                <li class="no-padding">
                    <li class="bold active"><a href="<?php echo base_url(); ?>dashboard" class="waves-effect waves-cyan"><i class="mdi mdi-view-dashboard" style="padding-top: 10px;"></i>Dashboard</a>
                    </li>
                </li>

                    <?php  if ($_SESSION['role'] == 1 || $_SESSION['role'] == 9) { ?>
                    <li class="no-padding">
                    <li class="bold"><a href="<?php echo base_url(); ?>enquiry_c/show" class="waves-effect waves-cyan"><i class="mdi mdi-book" style="padding-top: 10px"></i>Enquiry</a>
                    </li>
                    </li>
                    <?php } ?>

                    <?php  if ($_SESSION['role'] == 1 || $_SESSION['role'] == 5) { ?>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi mdi-account-plus" style="padding-top: 10px"></i>Register Student</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo base_url(); ?>certificate_c/newCertificate">Certificate</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>diploma_c/newDiploma">Diploma</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi mdi-format-list-numbers" style="padding-top: 10px"></i>View Students</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo base_url(); ?>certificate_c/certificateStudents">Certificate</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>diploma_c/diplomaStudents">Diploma</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>

                    <?php  if ($_SESSION['role'] == 1 || $_SESSION['role'] == 3) {?>
                     <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi mdi-format-list-numbers" style="padding-top: 10px"></i>Batch</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo base_url(); ?>batches_c">Batches</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>batch_tracker">Batch Tracker</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>

                    <?php  if ($_SESSION['role'] == 1 || $_SESSION['role'] == 7) {?>
                    <li><a href="<?php echo base_url(); ?>counselor"><i class="mdi mdi-account-settings-variant" style="padding-top: 10px"></i>Counselor</a>
                        <?php } ?>

                        <?php  if ($_SESSION['role'] == 1) {?>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi mdi-account-star" style="padding-top: 10px"></i>Staff</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo base_url(); ?>teacher/show">Teaching</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>non_teacher/show">Non Teaching</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                    <?php  if ($_SESSION['role'] == 1) {?>
                <li><a href="<?php echo base_url(); ?>course_c/allCourses"><i class="mdi mdi-school" style="padding-top: 10px"></i>Courses</a>
                </li>
                    <?php } ?>

                    <?php  if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2) {?>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi mdi-cash-100" style="padding-top: 10px"></i>Accounts</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo base_url(); ?>accounts_reg/">Registration</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>accounts">pay here</a>
                                        </li>
                                        <li><a href="#">view payment history</a>
                                        </li>
                                        <li><a href="#">see and add expense</a>
                                        </li>
                                        <li><a href="#">see expense category</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>

                    <?php  if ($_SESSION['role'] == 1 || $_SESSION['role'] == 10) {?>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi mdi-library" style="padding-top: 10px"></i>Library</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo base_url(); ?>Library/index.php">E-Library</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>book_c">Physical Library</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>

                    <?php  if ($_SESSION['role'] == 1 || $_SESSION['role'] == 8) {?>
                    <li><a href="<?php echo base_url();?>examinee"><i class="mdi mdi-account-check" style="padding-top: 10px"></i>Examinee</a>
                    </li>
                    <?php } ?>

                    <?php  if ($_SESSION['role'] == 1 || $_SESSION['role'] == 5) {?>
                    </li>
                    <li><a href="<?php echo base_url();?>oes/admin"><i class="mdi mdi-file-document-box" style="padding-top: 10px"></i>Online Examination</a>
                    </li>
                    <?php } ?>

                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->