<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-fixed">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <!-- <a href="index.html">
                        <img src="/assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a> -->
                <!-- <p style="color: #fff;">Natures's CRM</p> -->
                <div class="menu-toggler sidebar-toggler"> </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                           <?php if(session()->get('userId')=='23'){
                            // 
                            echo"<span class='badge badge-default'>".$global."</span>";
                         
                           }
                           else{
                            echo"<span class='badge badge-default'> 0 </span>";
                           }?>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>
                                <?php if(session()->get('userId')=='23'){
                            // echo"<span class='bold'>".session()->get('unread')."pending notifications </span>";
                            echo"<span class='bold'>".$global."pending notifications </span>";
                          
                           }
                           else{
                            echo"<span class='bold'>0 pending</span> notifications";
                           }?>
                                </h3>
                                <a href="page_user_profile_1.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                <?php if(session()->get('userId')=='23'){
                                foreach($notifications as $unread):?>
                                     <li>
                                        <a href="javascript:;">
                                            <span class="time">just now</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-success">
                                                    <i class="fa fa-plus"></i>
                                                </span>Order from <?= $unread['username'];?> </span>
                                        </a>
                                    </li>
                                    <?php endforeach; } else{}?>
                                   <!-- <li>
                                        <a href="javascript:;">
                                            <span class="time">3 mins</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                    <i class="fa fa-bolt"></i>
                                                </span> Server #12 overloaded. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">10 mins</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-warning">
                                                    <i class="fa fa-bell-o"></i>
                                                </span> Server #2 not responding. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">14 hrs</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-info">
                                                    <i class="fa fa-bullhorn"></i>
                                                </span> Application error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">2 days</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                    <i class="fa fa-bolt"></i>
                                                </span> Database overloaded 68%. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">3 days</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                    <i class="fa fa-bolt"></i>
                                                </span> A user IP blocked. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">4 days</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-warning">
                                                    <i class="fa fa-bell-o"></i>
                                                </span> Storage Server #4 not responding dfdfdfd. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">5 days</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-info">
                                                    <i class="fa fa-bullhorn"></i>
                                                </span> System Error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">9 days</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                    <i class="fa fa-bolt"></i>
                                                </span> Storage server failed. </span>
                                        </a>
                                    </li> -->
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="<?= base_url(); ?>/assets/layouts/layout/img/avatar3_small.jpg" />
                            <span class="username username-hide-on-mobile"><?= session()->get('username') ?></span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="page_user_profile_1.html">
                                    <i class="icon-user"></i> My Profile </a>
                            </li>
                            <li>
                                <a href="app_calendar.html">
                                    <i class="icon-calendar"></i> My Calendar </a>
                            </li>
                            <li>
                                <a href="app_inbox.html">
                                    <i class="icon-envelope-open"></i> My Inbox
                                    <span class="badge badge-danger"> 3 </span>
                                </a>
                            </li>
                            <li>
                                <a href="app_todo.html">
                                    <i class="icon-rocket"></i> My Tasks
                                    <span class="badge badge-success"> 7 </span>
                                </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="<?= base_url(); ?>/logout">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a href="<?= base_url('logout'); ?>" class="dropdown-toggle">
                            <i class="icon-logout"></i>
                        </a>
                    </li>
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- BEGIN SIDEBAR -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                    <li class="sidebar-toggler-wrapper hide">
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <div class="sidebar-toggler"> </div>
                        <!-- END SIDEBAR TOGGLER BUTTON -->
                    </li>
                    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

                    <li class="nav-item  <?= (current_url(true)->getSegment(2) == 'dashboard') ? 'active' : '' ?>">
                        <a href=" <?= base_url(); ?>/dashboard" class="nav-link nav-toggle">
                            <i class="icon-home"></i>
                            <span class="title">Dashboard</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <!-- <li class="heading">
                            <h3 class="uppercase">Features</h3>
                        </li> -->
                    <?php if (session()->get('userRole') != 3) : ?>
                        <li class="nav-item start <?= (current_url(true)->getSegment(2) == 'registry') ? 'active' : '' ?>">
                            <a href="<?= base_url('registry') ?>" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">Leads</span>
                                <span class="selected"></span>
                            </a>
                        </li>

                        <li class="nav-item   <?= (current_url(true)->getSegment(2) == 'customer') ? 'active' : '' ?>   ">
                            <a href="<?= base_url('customer'); ?>" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Customers</span>
                            </a>
                        </li>

                        <li class="nav-item <?= (current_url(true)->getSegment(2) == 'assign') ? 'active' : '' ?>">
                            <a href="<?= base_url('assign'); ?>" class="nav-link nav-toggle">
                                <i class="icon-rocket"></i>
                                <span class="title">Assign</span>
                            </a>
                        </li>

                        <li class="nav-item  <?= (current_url(true)->getSegment(2) == 'products') ? 'active' : '' ?> ">
                            <a href="<?= base_url(); ?>/products" class="nav-link nav-toggle">
                                <i class="icon-tag"></i>
                                <span class="title">Products</span>
                            </a>
                        </li>
                        <li class="nav-item  <?= (current_url(true)->getSegment(2) == 'order-details') ? 'active' : '' ?>   ">
                            <a href="<?= base_url();?>/order-details" class="nav-link nav-toggle">
                                <i class="icon-basket"></i>
                                <span class="title">Orders</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-note"></i>
                                <span class="title">Quotes</span>
                            </a>
                        </li>
                        <li class="nav-item start <?= (current_url(true)->getSegment(2) == 'user' || current_url(true)->getSegment(2) == 'add-user') ? 'active' : '' ?>">
                            <a href="<?= base_url(); ?>/user" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">Users</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-folder"></i>
                                <span class="title">Export to Excel</span>
                            </a>
                        </li>
                        <li class="nav-item start <?= (current_url(true)->getSegment(2) == 'reports' || current_url(true)->getSegment(2) == 'add-user') ? 'active' : '' ?>">
                            <a href="<?= base_url(); ?>/reports" class="nav-link nav-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Report</span>
                            </a>
                        </li>
                        <li class="nav-item start ">
                            <a href="<?= base_url(); ?>/settings" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">Settings</span>
                            </a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item start <?= (current_url(true)->getSegment(2) == 'registry') ? 'active' : '' ?>">
                            <a href="<?= base_url('registry') ?>" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">Leads</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="nav-item   <?= (current_url(true)->getSegment(2) == 'existing_customer') ? 'active' : '' ?>   ">
                            <a href="<?= base_url('customer'); ?>" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Customers</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?= base_url();?>/order-details" class="nav-link nav-toggle">
                                <i class="icon-basket"></i>
                                <span class="title">Orders</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <div class="logo text-center" style="position: relative;
                        top: 9vh;">
                        <a href="index.html">
                            <img width="70%" src="<?= base_url() ?>/assets/pages/img/natures-logo.png" alt="" /> </a>
                    </div>

                </ul>
                <!-- END SIDEBAR MENU -->
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <!-- END SIDEBAR -->