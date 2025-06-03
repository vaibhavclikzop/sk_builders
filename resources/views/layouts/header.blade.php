 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
     @stack('title')

     <meta name="csrf-token" content="{{ csrf_token() }}">


     <link href="/css/jquery-jvectormap-2.0.2.css" rel="stylesheet">

     <!-- App css -->
     <link rel="shortcut icon" href="/logo/{{ $setting->img }}">





     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="/css/bootstrap.min.css">

     <!-- Feather CSS -->
     <link rel="stylesheet" href="/css/feather.css">

     <!-- Tabler Icon CSS -->
     <link rel="stylesheet" href="/css/tabler-icons.css">

     <!-- Select2 CSS -->
     <link rel="stylesheet" href="/css/select2.min.css">

     <!-- Fontawesome CSS -->
     <link rel="stylesheet" href="/css/fontawesome.min.css">
     <link rel="stylesheet" href="/css/all.min.css">

     <!-- Datetimepicker CSS -->
     <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">

     <!-- Bootstrap Tagsinput CSS -->
     <link rel="stylesheet" href="/css/bootstrap-tagsinput.css">

     <!-- Summernote CSS -->
     <link rel="stylesheet" href="/css/summernote-lite.min.css">

     <!-- Daterangepikcer CSS -->
     <link rel="stylesheet" href="/css/daterangepicker.css">

     <!-- Color Picker Css -->
     <link rel="stylesheet" href="/css/flatpickr.min.css">
     <link rel="stylesheet" href="/css/nano.min.css">

     <!-- Main CSS -->
     <link rel="stylesheet" href="/css/style.css">
     <link rel="stylesheet" href="/dataTables/datatables.min.css">



     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
         integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />


     <script src="https://code.jquery.com/jquery-2.2.4.min.js"
         integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>



     <link rel="stylesheet" href="/richtexteditor/richtexteditor/rte_theme_default.css" />
     <script type="text/javascript" src="/richtexteditor/richtexteditor/rte.js"></script>

     <script type="text/javascript" src='/richtexteditor/richtexteditor/plugins/all_plugins.js'></script>
 </head>

 <body>
     {{-- <div id="global-loader">
         <div class="page-loader"></div>
     </div> --}}

     <!-- Main Wrapper -->
     <div class="main-wrapper">

         <!-- Header -->
         <div class="header">
             <div class="main-header">

                 <div class="header-left">
                     <a href="/" class="logo">
                         <img src="images/logo.svg" alt="Logo">
                     </a>
                     <a href="/" class="dark-logo">
                         <img src="images/logo-white.svg" alt="Logo">
                     </a>
                 </div>

                 <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                     <span class="bar-icon">
                         <span></span>
                         <span></span>
                         <span></span>
                     </span>
                 </a>

                 <div class="header-user">
                     <div class="nav user-menu nav-list">

                         <div class="me-auto d-flex align-items-center" id="header-search">
                             <a id="toggle_btn" href="javascript:void(0);" class="btn btn-menubar me-1">
                                 <i class="ti ti-arrow-bar-to-left"></i>
                             </a>
                             <!-- Search -->
                             <div class="input-group input-group-flat d-inline-flex me-1">
                                 <span class="input-icon-addon">
                                     <i class="ti ti-search"></i>
                                 </span>
                                 <input type="text" class="form-control" placeholder="Search in HRMS">
                                 <span class="input-group-text">
                                     <kbd>CTRL + / </kbd>
                                 </span>
                             </div>
                             <!-- /Search -->
                             <div class="dropdown crm-dropdown">
                                 <a href="#" class="btn btn-menubar me-1" data-bs-toggle="dropdown">
                                     <i class="ti ti-layout-grid"></i>
                                 </a>
                                 <div class="dropdown-menu dropdown-lg dropdown-menu-start">
                                     <div class="card mb-0 border-0 shadow-none">
                                         <div class="card-header">
                                             <h4>CRM</h4>
                                         </div>
                                         <div class="card-body pb-1">
                                             <div class="row">
                                                 <div class="col-sm-6">
                                                     <a href="/"
                                                         class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
                                                         <span class="d-flex align-items-center me-3">
                                                             <i class="ti ti-user-shield text-default me-2"></i>Contacts
                                                         </span>
                                                         <i class="ti ti-arrow-right"></i>
                                                     </a>
                                                     <a href="/"
                                                         class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
                                                         <span class="d-flex align-items-center me-3">
                                                             <i
                                                                 class="ti ti-heart-handshake text-default me-2"></i>Deals
                                                         </span>
                                                         <i class="ti ti-arrow-right"></i>
                                                     </a>
                                                     <a href="/"
                                                         class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
                                                         <span class="d-flex align-items-center me-3">
                                                             <i
                                                                 class="ti ti-timeline-event-text text-default me-2"></i>Pipeline
                                                         </span>
                                                         <i class="ti ti-arrow-right"></i>
                                                     </a>
                                                 </div>
                                                 <div class="col-sm-6">
                                                     <a href="/"
                                                         class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
                                                         <span class="d-flex align-items-center me-3">
                                                             <i class="ti ti-building text-default me-2"></i>Companies
                                                         </span>
                                                         <i class="ti ti-arrow-right"></i>
                                                     </a>
                                                     <a href="/"
                                                         class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
                                                         <span class="d-flex align-items-center me-3">
                                                             <i class="ti ti-user-check text-default me-2"></i>Leads
                                                         </span>
                                                         <i class="ti ti-arrow-right"></i>
                                                     </a>
                                                     <a href="/"
                                                         class="d-flex align-items-center justify-content-between p-2 crm-link mb-3">
                                                         <span class="d-flex align-items-center me-3">
                                                             <i class="ti ti-activity text-default me-2"></i>Activities
                                                         </span>
                                                         <i class="ti ti-arrow-right"></i>
                                                     </a>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <a href="/" class="btn btn-menubar">
                                 <i class="ti ti-settings-cog"></i>
                             </a>
                         </div>



                         <div class="d-flex align-items-center">
                             <div class="me-1">
                                 <a href="#" class="btn btn-menubar btnFullscreen">
                                     <i class="ti ti-maximize"></i>
                                 </a>
                             </div>
                             <div class="dropdown me-1">
                                 <a href="#" class="btn btn-menubar" data-bs-toggle="dropdown">
                                     <i class="ti ti-layout-grid-remove"></i>
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-end">
                                     <div class="card mb-0 border-0 shadow-none">
                                         <div class="card-header">
                                             <h4>Applications</h4>
                                         </div>
                                         <div class="card-body">
                                             <a href="/" class="d-block pb-2">
                                                 <span class="avatar avatar-md bg-transparent-dark me-2"><i
                                                         class="ti ti-calendar text-gray-9"></i></span>Calendar
                                             </a>
                                             <a href="/" class="d-block py-2">
                                                 <span class="avatar avatar-md bg-transparent-dark me-2"><i
                                                         class="ti ti-subtask text-gray-9"></i></span>To Do
                                             </a>
                                             <a href="/" class="d-block py-2">
                                                 <span class="avatar avatar-md bg-transparent-dark me-2"><i
                                                         class="ti ti-notes text-gray-9"></i></span>Notes
                                             </a>
                                             <a href="/" class="d-block py-2">
                                                 <span class="avatar avatar-md bg-transparent-dark me-2"><i
                                                         class="ti ti-folder text-gray-9"></i></span>File Manager
                                             </a>
                                             <a href="/" class="d-block py-2">
                                                 <span class="avatar avatar-md bg-transparent-dark me-2"><i
                                                         class="ti ti-layout-kanban text-gray-9"></i></span>Kanban
                                             </a>
                                             <a href="/" class="d-block py-2 pb-0">
                                                 <span class="avatar avatar-md bg-transparent-dark me-2"><i
                                                         class="ti ti-file-invoice text-gray-9"></i></span>Invoices
                                             </a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="me-1">
                                 <a href="/" class="btn btn-menubar position-relative">
                                     <i class="ti ti-brand-hipchat"></i>
                                     <span
                                         class="badge bg-info rounded-pill d-flex align-items-center justify-content-center header-badge">5</span>
                                 </a>
                             </div>
                             <div class="me-1">
                                 <a href="/" class="btn btn-menubar">
                                     <i class="ti ti-mail"></i>
                                 </a>
                             </div>
                             <div class="me-1 notification_item">
                                 <a href="#" class="btn btn-menubar position-relative me-1"
                                     id="notification_popup" data-bs-toggle="dropdown">
                                     <i class="ti ti-bell"></i>
                                     <span class="notification-status-dot"></span>
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-end notification-dropdown p-4">
                                     <div
                                         class="d-flex align-items-center justify-content-between border-bottom p-0 pb-3 mb-3">
                                         <h4 class="notification-title">Notifications (2)</h4>
                                         <div class="d-flex align-items-center">
                                             <a href="#" class="text-primary fs-15 me-3 lh-1">Mark all as
                                                 read</a>
                                             <div class="dropdown">
                                                 <a href="javascript:void(0);" class="bg-white dropdown-toggle"
                                                     data-bs-toggle="dropdown">
                                                     <i class="ti ti-calendar-due me-1"></i>Today
                                                 </a>
                                                 <ul class="dropdown-menu mt-2 p-3">
                                                     <li>
                                                         <a href="javascript:void(0);"
                                                             class="dropdown-item rounded-1">
                                                             This Week
                                                         </a>
                                                     </li>
                                                     <li>
                                                         <a href="javascript:void(0);"
                                                             class="dropdown-item rounded-1">
                                                             Last Week
                                                         </a>
                                                     </li>
                                                     <li>
                                                         <a href="javascript:void(0);"
                                                             class="dropdown-item rounded-1">
                                                             Last Month
                                                         </a>
                                                     </li>
                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="noti-content">
                                         <div class="d-flex flex-column">
                                             <div class="border-bottom mb-3 pb-3">
                                                 <a href="/">
                                                     <div class="d-flex">
                                                         <span class="avatar avatar-lg me-2 flex-shrink-0">
                                                             <img src="images/avatar-27.jpg" alt="Profile">
                                                         </span>
                                                         <div class="flex-grow-1">
                                                             <p class="mb-1"><span
                                                                     class="text-dark fw-semibold">Shawn</span>
                                                                 performance in Math is below the threshold.</p>
                                                             <span>Just Now</span>
                                                         </div>
                                                     </div>
                                                 </a>
                                             </div>
                                             <div class="border-bottom mb-3 pb-3">
                                                 <a href="/" class="pb-0">
                                                     <div class="d-flex">
                                                         <span class="avatar avatar-lg me-2 flex-shrink-0">
                                                             <img src="images/avatar-23.jpg" alt="Profile">
                                                         </span>
                                                         <div class="flex-grow-1">
                                                             <p class="mb-1"><span
                                                                     class="text-dark fw-semibold">Sylvia</span> added
                                                                 appointment on 02:00 PM</p>
                                                             <span>10 mins ago</span>
                                                             <div
                                                                 class="d-flex justify-content-start align-items-center mt-1">
                                                                 <span class="btn btn-light btn-sm me-2">Deny</span>
                                                                 <span class="btn btn-primary btn-sm">Approve</span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </a>
                                             </div>
                                             <div class="border-bottom mb-3 pb-3">
                                                 <a href="/">
                                                     <div class="d-flex">
                                                         <span class="avatar avatar-lg me-2 flex-shrink-0">
                                                             <img src="images/avatar-25.jpg" alt="Profile">
                                                         </span>
                                                         <div class="flex-grow-1">
                                                             <p class="mb-1">New student record <span
                                                                     class="text-dark fw-semibold"> George</span> is
                                                                 created by <span
                                                                     class="text-dark fw-semibold">Teressa</span></p>
                                                             <span>2 hrs ago</span>
                                                         </div>
                                                     </div>
                                                 </a>
                                             </div>
                                             <div class="border-0 mb-3 pb-0">
                                                 <a href="/">
                                                     <div class="d-flex">
                                                         <span class="avatar avatar-lg me-2 flex-shrink-0">
                                                             <img src="images/avatar-01.jpg" alt="Profile">
                                                         </span>
                                                         <div class="flex-grow-1">
                                                             <p class="mb-1">A new teacher record for <span
                                                                     class="text-dark fw-semibold">Elisa</span> </p>
                                                             <span>09:45 AM</span>
                                                         </div>
                                                     </div>
                                                 </a>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="d-flex p-0">
                                         <a href="#" class="btn btn-light w-100 me-2">Cancel</a>
                                         <a href="/" class="btn btn-primary w-100">View All</a>
                                     </div>
                                 </div>
                             </div>
                             <div class="dropdown profile-dropdown">
                                 <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center"
                                     data-bs-toggle="dropdown">
                                     <span class="avatar avatar-sm online">
                                         <img src="images/avatar-12.jpg" alt="Img"
                                             class="img-fluid rounded-circle">
                                     </span>
                                 </a>
                                 <div class="dropdown-menu shadow-none">
                                     <div class="card mb-0">
                                         <div class="card-header">
                                             <div class="d-flex align-items-center">
                                                 <span class="avatar avatar-lg me-2 avatar-rounded">
                                                     <img src="images/avatar-12.jpg" alt="img">
                                                 </span>
                                                 <div>
                                                     <h5 class="mb-0">{{ session('user')->name }}</h5>
                                                     <p class="fs-12 fw-medium mb-0">
                                                         <a>{{ session('user')->email }}</a>
                                                     </p>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="card-body">
                                             <a class="dropdown-item d-inline-flex align-items-center p-0 py-2"
                                                 href="/profile">
                                                 <i class="ti ti-user-circle me-1"></i>My Profile
                                             </a>
                                             <a class="dropdown-item d-inline-flex align-items-center p-0 py-2"
                                                 href="/settings">
                                                 <i class="ti ti-settings me-1"></i>Settings
                                             </a>



                                         </div>
                                         <div class="card-footer">
                                             <a class="dropdown-item d-inline-flex align-items-center p-0 py-2"
                                                 href="/logout">
                                                 <i class="ti ti-login me-2"></i>Logout
                                             </a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <!-- Mobile Menu -->
                 <div class="dropdown mobile-user-menu">
                     <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                         aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                     <div class="dropdown-menu dropdown-menu-end">
                         <a class="dropdown-item" href="/profile">My Profile</a>
                         <a class="dropdown-item" href="/settings">Settings</a>
                         <a class="dropdown-item" href="/logout">Logout</a>
                     </div>
                 </div>
                 <!-- /Mobile Menu -->

             </div>

         </div>
         <!-- /Header -->

         <!-- Sidebar -->
         <div class="sidebar" id="sidebar">
             <!-- Logo -->
             <div class="sidebar-logo">
                 <a href="/" class="logo logo-normal">
                     <img src="/logo/{{ $setting->img }}" alt="Logo" width="150px">
                 </a>
                 <a href="/" class="logo-small">
                     <img src="/logo/{{ $setting->img }}" alt="Logo">
                 </a>
                 <a href="/" class="dark-logo">
                     <img src="/logo/{{ $setting->img }}" alt="Logo">
                 </a>
             </div>

             <div class="sidebar-inner slimscroll">
                 <div id="sidebar-menu" class="sidebar-menu">
                     <ul>

                         <li>
                             <ul>

                                 <li>
                                     <a href="/">
                                         <i class="ti ti-smart-home"></i><span>Dashboard</span>
                                     </a>
                                 </li>



                             </ul>
                         </li>

                         <li>
                             <ul>
                                 <li class="submenu">
                                     <a href="javascript:void(0);" class="">
                                         <i class="fa fa-users" aria-hidden="true"></i>
                                         <span>User Management</span>

                                         <span class="menu-arrow"></span>
                                     </a>
                                     <ul>
                                         <li><a href="/user-role">User Role</a></li>
                                         <li><a href="/users">Users</a></li>

                                     </ul>
                                 </li>
                                 <li class="submenu">
                                     <a href="javascript:void(0);" class="">

                                         <i class=" ti   ti-layout-grid"></i>
                                         <span>Masters</span>

                                         <span class="menu-arrow"></span>
                                     </a>
                                     <ul>
                                         <li><a href="/customers">Customers</a></li>
                                         <li><a href="/vendor">Vendor</a></li>
                                         <li><a href="/office">Office</a></li>
                                         <li><a href="/project">Project</a></li>
                                         <li><a href="/sub-account">Sub Account</a></li>

                                     </ul>
                                 </li>
                                 <li>
                                     <a href="/statement/pending">
                                         <i class="fa fa-file" aria-hidden="true"></i> <span>Pending Statement</span>
                                     </a>
                                 </li>
                                  <li>
                                     <a href="/statement/complete">
                                         <i class="fa fa-file" aria-hidden="true"></i> <span>Complete Statement</span>
                                     </a>
                                 </li>
                                  <li class="submenu">
                                     <a href="javascript:void(0);" class="">

                                         <i class=" ti   ti-layout-grid"></i>
                                         <span>Reports</span>

                                         <span class="menu-arrow"></span>
                                     </a>
                                     <ul>
                                         <li><a href="/customer-report">Customer Report</a></li>
                                         <li><a href="/vendor-report">Vendor Report</a></li>
                                         <li><a href="/office-report">Office Report</a></li>
                                         <li><a href="/project-report">Project Report</a></li>
                                         <li><a href="/sub-account-report">Sub Account Report</a></li>

                                     </ul>
                                 </li>


                             </ul>

                         </li>


                         <li>
                             <ul>

                                 <li>
                                     <a href="/profile">
                                         <i class="fa fa-user" aria-hidden="true"></i><span>Profile</span>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="/settings">
                                         <i class="fa fa-gear" aria-hidden="true"></i><span>Settings</span>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="/settings">
                                         <i class="fa fa-sign-out" aria-hidden="true"></i> <span>Logout</span>
                                     </a>
                                 </li>


                             </ul>
                         </li>

                     </ul>
                 </div>
             </div>
         </div>
         <!-- /Sidebar -->




         <!-- Page Wrapper -->
         <div class="page-wrapper">
             <div class="content">
