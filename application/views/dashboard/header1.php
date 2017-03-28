<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 10/28/16
 * Time: 12:47 PM
 */
?>
<body hoe-navigation-type="vertical" hoe-nav-placement="left" theme-layout="wide-layout" theme-bg="bg1"  style="height: 1250px">
<div id="hoeapp-wrapper" class="hoe-hide-lpanel" hoe-device-type="desktop">
    <header id="hoe-header" hoe-lpanel-effect="shrink">
        <div class="hoe-left-header">
            <a href="#"><span>SITM SMS</span></a>
            <span class="hoe-sidebar-toggle"><a href="#"></a></span>
        </div>

        <div class="hoe-right-header" hoe-position-type="relative">
            <span class="hoe-sidebar-toggle"><a href="#"></a></span>

            <ul class="right-navbar">
                <li class="dropdown hoe-rheader-submenu hoe-header-profile">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                        foreach ($userinfo as $ui) {
                            if ($_SESSION['role'] == 1) {
                                echo '<span><img class="img-circle" src="' . base_url() . '/staff/non_teaching_staff/' . $ui->photo . '"></span>';
                            } else if ($_SESSION['role'] == 2) {
                                echo '<span><img class="img-circle" src="' . base_url() . '/staff/non_teaching_staff/' . $ui->photo . '"></span>';
                            } else if ($_SESSION['role'] == 3) {
                                echo '<span><img class="img-circle" src="' . base_url() . '/staff/teaching_staff/' . $ui->photo . '"></span>';
                            } else if ($_SESSION['role'] == 4) {
                                echo '<span><img class="img-circle" src="' . base_url() . '/staff/non_teaching_staff/' . $ui->photo . '"></span>';
                            } else if ($_SESSION['role'] == 5) {
                                echo '<span><img class="img-circle" src="' . base_url() . '/staff/non_teaching_staff/' . $ui->photo . '"></span>';
                            } else if ($_SESSION['role'] == 6) {
                                echo '<span><img class="img-circle" src="' . base_url() . '/diploma/' . $ui->photo . '"></span>';
                            } else if ($_SESSION['role'] == 7) {
                                echo '<span><img class="img-circle" src="' . base_url() . '/certificate/' . $ui->photo . '"></span>';
                            }
                        }
                        ?>

                        <?php foreach ($userinfo as $ui) {
                            if ($_SESSION['role'] != 6 && $_SESSION['role'] != 7){
                                echo '<span><b>'.$ui->name.'</b><i class=" fa fa-angle-down"></i></span>';
                            } else if ($_SESSION['role'] == 6 || $_SESSION['role'] == 7){
                                echo '<span><b>'.$ui->s_name.'</b><i class=" fa fa-angle-down"></i></span>';
                            }
                        } ?>

                    </a>
                    <ul class="dropdown-menu ">
                        <?php if ($_SESSION['role'] == 1) {?>
                        <li><a href="<?php echo base_url(); ?>dashboard/userManager"><i class="fa fa-users"></i>Manage Users</a></li>
                        <?php }?>
                        <li><a href="<?php echo base_url(); ?>dashboard/logOut"><i class="fa fa-power-off"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </header>
    <div id="hoeapp-container" hoe-color-type="lpanel-bg1" hoe-lpanel-effect="shrink">
        <aside id="hoe-left-panel" hoe-position-type="absolute">
            <div class="profile-box">
                <div class="media">
                    <div class="media-body text-center">
                        <img src="<?php echo base_url(); ?>plugins/logo.png">
                    </div>
                </div>
            </div>
            <ul class="nav panel-list">
                <li class="nav-level">Navigation</li>
                <li class="active">
                    <a href="<?php echo base_url(); ?>dashboard">
                        <i class="fa fa-tachometer"></i>
                        <span class="menu-text">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo base_url(); ?>enquiry_c/show">
                        <i class="fa fa-paper-plane"></i>
                        <span class="menu-text">Enquiry</span>
                    </a>
                </li>
                <li class="hoe-has-menu">
                    <a href="javascript:void(0)">
                        <i class="fa fa-users"></i>
                        <span class="menu-text">Register Students</span>
                        <span class="selected"></span>
                    </a>
                    <ul class="hoe-sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>certificate_c/newCertificate">
                                <span class="menu-text">Certificate</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>diploma_c/newDiploma">
                                <span class="menu-text">Diploma</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span class="menu-text">Degree</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="hoe-has-menu">
                    <a href="javascript:void(0)">
                        <i class="fa fa-users"></i>
                        <span class="menu-text">Students</span>
                        <span class="selected"></span>
                    </a>
                    <ul class="hoe-sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>certificate_c/certificateStudents">
                                <span class="menu-text">Certificate</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>diploma_c/diplomaStudents">
                                <span class="menu-text">Diploma</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span class="menu-text">Degree</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="hoe-has-menu">
                    <a href="javascript:void(0)">
                        <i class="fa fa-users"></i>
                        <span class="menu-text">Staff</span>
                        <span class="selected"></span>
                    </a>
                    <ul class="hoe-sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>teacher/show">
                                <span class="menu-text">Teaching</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>non_teacher/show">
                                <span class="menu-text">Non-Teaching</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                <li class="active">
                    <a href="<?php echo base_url(); ?>course_c/allCourses">
                        <i class="fa fa-book"></i>
                        <span class="menu-text">Courses</span>
                    </a>
                </li>
                <li class="hoe-has-menu">
                    <a href="javascript:void(0)">
                        <i class="fa fa-money"></i>
                        <span class="menu-text">Accounts</span>
                        <span class="selected"></span>
                    </a>
                    <ul class="hoe-sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>acount_reg">
                                <span class="menu-text">Registration</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>acount_reg/index1">
                                <span class="menu-text">Certificate Payment</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span class="menu-text">Diploma Payment</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="hoe-has-menu">
                    <a href="javascript:void(0)">
                        <i class="fa fa-book"></i>
                        <span class="menu-text">Library</span>
                        <span class="selected"></span>
                    </a>
                    <ul class="hoe-sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>Library/index.php">
                                <span class="menu-text">E-Library</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>book_c">
                                <span class="menu-text">Physical Library</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="<?php echo base_url();?>oes/index.php">
                        <i class="fa fa-building"></i>
                        <span class="menu-text">Online Examination</span>
                    </a>
                </li>
            </ul>
        </aside>

