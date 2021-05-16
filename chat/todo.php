<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chatriq - Chat & Taskmanager</title>
    <meta name="description"
        content="The ultimate Bootstrap based Messaging framework to help build Messaging or Chat application fast and easy. Fully responsive and crafted with modern elements and latest design">
    <meta name="keywords" content="Chatriq, chat, messaging, theme, platform" />
    <meta name="subject" content="">
    <meta name="copyright" content="">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="dist/css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/material-floating-button/dist/mfb.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/app.css">
    <link rel="stylesheet" type="text/css" href="dist/css/theme/default-theme.css">
</head>

<body class="default-theme">
    <!-- Preloader Start -->
    <div class="preloader"></div><!-- Preloader end -->
    <!-- main wrapper start -->
    <div class="main-wrapper">
        <div class="chatapp">
            <!-- navbar start -->
            <nav id="navbar" class="navbar navbar-expand-md navbar-light fixed-top bg-white border-bottom shadow-sm">    
            <a class="navbar-brand" href="https://health.airhot.tw/chat/">
            	<img src="https://health.airhot.tw/images/logo/logo180.ico" width="50" height="50" class="d-inline-block align-top" alt="">
            	<h1>簡疫聊天室</h1>
        	</a>
                <div class="ml-auto d-flex align-items-center">
                    <div class="iconbox iconbox-search btn-hovered-light"><i class="iconbox__icon mdi mdi-magnify"></i>
                    </div>
                    <div class="navbar-nav">
                        <div class="iconbox-group">
                            <div class="iconbox btn-hovered-light"><i class="iconbox__icon mdi mdi-wallet-outline"></i>
                            </div>
                            <div class="iconbox btn-hovered-light"><i class="iconbox__icon mdi mdi-diamond-stone"></i>
                            </div>
                            <div class="iconbox btn-hovered-light"><i
                                    class="iconbox__icon mdi mdi-bell-ring-outline"></i></div>
                            <div class="iconbox btn-hovered-light"><i class="iconbox__icon mdi mdi-dots-vertical"></i>
                            </div>
                        </div>
                        <div class="dropdown user-nav">
                            <div class="user-avatar user-avatar-sm user-avatar-rounded" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="chatriq-user chatriq-user-01"></div>
                            </div>
                    <div class="dropdown-menu dropdown-menu-right">
                    	<a class="dropdown-item" href="https://health.airhot.tw/p/<?php echo $_SESSION['username'];?>">
                    		<span><i class="mdi mdi-account-outline"></i></span>
                        	<span>個人化</span>
                    	</a>
                    	<a class="dropdown-item" >
                        	<span><i class="mdi mdi-arrow-up-bold"></i></span>
                        	<span>版本v 8.7</span>
                    	</a>
                    	<div class="dropdown-divider"></div>
                    	<a class="dropdown-item" href="https://health.airhot.tw/auth/logout.php">
                    		    	<span><i class="mdi mdi-logout-variant"></i></span>
                		        	<span>登出</span>
                  		  	</a>
                  		  </div>
               		 </div>
                        <div class="iconbox-searchbar">
                            <form><input type="text" class="form-control" placeholder="Search here..." autofocus><button
                                    class="search-submit" type="submit"><i class="mdi mdi-magnify"></i></button><a
                                    href="javascript:void(0)" class="search-close"><i
                                        class="mdi mdi-arrow-left"></i></a></form>
                        </div>
                    </div>
                </div>
            </nav><!-- navbar end -->
            <!-- sidebar start -->
            <        <div class="chatapp__sidebar" >
        	<ul class="nav" id="myTab" role="tablist">
            <li class="nav-item">
                	<a class="nav-link" href="../find/index.php">
                    	<i class="mdi mdi-account-box-outline"></i>
                    		<span>疫搜尋</span>
                	</a>
            	</li>	
            <li class="nav-item">
                	<a class="nav-link active" href="https://health.airhot.tw/chat/">
                    	<i class="mdi mdi-message-text-outline"></i>
                    		<span>聊天室</span>
                	</a>
            	</li>
            	<li class="nav-item nav-item-todo">
                	<a class="nav-link" href="todo.html" >
                    	<i class="mdi mdi-checkbox-marked-outline"></i>
                    		<span>代辦事項</span>
                	</a>
            	</li>
            	<li class="nav-item sidebar-bottom-nav nav-item-help">
                	<a class="nav-link" href="https://health.airhot.tw/isolation" title="Help">
                    	<i class="mdi mdi-help-circle-outline"></i>
                    		<span>Help</span>
                	</a>
            	</li>
        	</ul>
        </div>
    <!-- sidebar end -->
            <!-- main content start -->
            <div class="chatapp__content">
                <div class="taskmanager-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="pt-3">To-Do List Overview</h6>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card my-2">
                                    <div class="card-body">
                                        <div class="taskbox">
                                            <div class="taskbox__icon"><svg width="35px" height="35px" fill="#ae6eea"
                                                    version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 438.891 438.891"
                                                    style="enable-background:new 0 0 438.891 438.891;"
                                                    xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <g>
                                                                <path
                                                                    d="M347.968,57.503h-39.706V39.74c0-5.747-6.269-8.359-12.016-8.359h-30.824c-7.314-20.898-25.6-31.347-46.498-31.347                                                                    c-20.668-0.777-39.467,11.896-46.498,31.347h-30.302c-5.747,0-11.494,2.612-11.494,8.359v17.763H90.923                                                                    c-23.53,0.251-42.78,18.813-43.886,42.318v299.363c0,22.988,20.898,39.706,43.886,39.706h257.045                                                                    c22.988,0,43.886-16.718,43.886-39.706V99.822C390.748,76.316,371.498,57.754,347.968,57.503z M151.527,52.279h28.735                                                                    c5.016-0.612,9.045-4.428,9.927-9.404c3.094-13.474,14.915-23.146,28.735-23.51c13.692,0.415,25.335,10.117,28.212,23.51                                                                    c0.937,5.148,5.232,9.013,10.449,9.404h29.78v41.796H151.527V52.279z M370.956,399.185c0,11.494-11.494,18.808-22.988,18.808                                                                    H90.923c-11.494,0-22.988-7.314-22.988-18.808V99.822c1.066-11.964,10.978-21.201,22.988-21.42h39.706v26.645                                                                    c0.552,5.854,5.622,10.233,11.494,9.927h154.122c5.98,0.327,11.209-3.992,12.016-9.927V78.401h39.706                                                                    c12.009,0.22,21.922,9.456,22.988,21.42V399.185z" />
                                                                <path
                                                                    d="M179.217,233.569c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437,31.869l-14.106-14.629                                                                    c-3.919-4.131-10.425-4.363-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135                                                                    c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025                                                                    C179.628,233.962,179.427,233.761,179.217,233.569z" />
                                                                <path
                                                                    d="M329.16,256.034H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16                                                                    c5.771,0,10.449-4.678,10.449-10.449S334.931,256.034,329.16,256.034z" />
                                                                <path
                                                                    d="M179.217,149.977c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437,31.869l-14.106-14.629                                                                    c-3.919-4.131-10.425-4.364-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135                                                                    c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025                                                                    C179.628,150.37,179.427,150.169,179.217,149.977z" />
                                                                <path
                                                                    d="M329.16,172.442H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16                                                                    c5.771,0,10.449-4.678,10.449-10.449S334.931,172.442,329.16,172.442z" />
                                                                <path
                                                                    d="M179.217,317.16c-3.919-4.131-10.425-4.363-14.629-0.522l-33.437,31.869l-14.106-14.629                                                                    c-3.919-4.131-10.425-4.363-14.629-0.522c-4.047,4.24-4.047,10.911,0,15.151l21.42,21.943c1.854,2.076,4.532,3.224,7.314,3.135                                                                    c2.756-0.039,5.385-1.166,7.314-3.135l40.751-38.661c4.04-3.706,4.31-9.986,0.603-14.025                                                                    C179.628,317.554,179.427,317.353,179.217,317.16z" />
                                                                <path
                                                                    d="M329.16,339.626H208.997c-5.771,0-10.449,4.678-10.449,10.449s4.678,10.449,10.449,10.449H329.16                                                                    c5.771,0,10.449-4.678,10.449-10.449S334.931,339.626,329.16,339.626z" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg></div>
                                            <div class="taskbox__text">
                                                <div class="taskbox__text--numbers">26</div>
                                                <div class="taskbox__text--heading">Number of Tasks</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card my-2">
                                    <div class="card-body">
                                        <div class="taskbox">
                                            <div class="taskbox__icon"><svg width="35px" height="35px" fill="#ae6eea"
                                                    version="1.1" class="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 503.607 503.607"
                                                    style="enable-background:new 0 0 503.607 503.607;"
                                                    xml:space="preserve">
                                                    <g transform="translate(1 1)">
                                                        <g>
                                                            <g>
                                                                <path
                                                                    d="M385.098,57.754h-41.967v-8.393c0-9.233-7.554-16.787-16.787-16.787h-25.18V24.18c0-14.269-10.911-25.18-25.18-25.18                                                            h-50.361c-14.269,0-25.18,11.751-25.18,25.18v8.393h-25.18c-9.233,0-16.787,7.554-16.787,16.787v8.393h-41.967                                                            c-23.502,0-41.967,18.466-41.967,41.967v360.918c0,23.502,18.466,41.967,41.967,41.967h268.59                                                            c23.502,0,41.967-18.466,41.967-41.967V99.721C427.066,76.22,408.6,57.754,385.098,57.754z M175.262,49.361h33.574                                                            c5.036,0,8.393-3.357,8.393-8.393V24.18c0-5.036,3.357-8.393,8.393-8.393h50.361c5.036,0,8.393,4.197,8.393,8.393v16.787                                                            c0,5.036,3.357,8.393,8.393,8.393h33.574v16.787v41.967H175.262V66.148V49.361z M410.279,460.639                                                            c0,14.269-10.911,25.18-25.18,25.18h-268.59c-14.269,0-25.18-10.911-25.18-25.18V99.721c0-14.269,10.911-25.18,25.18-25.18                                                            h41.967v33.574c0,9.233,7.554,16.787,16.787,16.787h151.082c9.233,0,16.787-7.554,16.787-16.787V74.541h41.967                                                            c14.269,0,25.18,10.911,25.18,25.18V460.639z" />
                                                                <path
                                                                    d="M354.043,317.951c-5.036-0.839-9.233,2.518-10.072,6.715c-9.233,46.164-46.164,77.22-90.649,77.22                                                            c-42.601,0-79.462-27.886-92.158-67.148h39.279v-16.787h-48.756c-1.094-0.207-2.215-0.214-3.283,0h-15.108v67.148h16.787v-31.155                                                            c18.142,38.867,57.962,64.729,102.4,64.729c53.718,0,96.525-36.092,108.275-90.649                                                            C361.597,322.987,358.239,318.79,354.043,317.951z" />
                                                                <path
                                                                    d="M351.525,254.168c-18.75-37.83-56.397-62.119-99.043-62.119c-51.2,0-96.525,33.574-110.793,82.256                                                            c-0.839,4.197,1.679,8.393,5.875,10.072c4.197,0.839,8.393-1.679,10.072-5.875c11.751-40.289,52.039-69.666,94.846-69.666                                                            c38.211,0,72.239,22.967,86.895,58.754h-38.213v16.787h67.148v-67.148h-16.787V254.168z" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg></div>
                                            <div class="taskbox__text">
                                                <div class="taskbox__text--numbers">05</div>
                                                <div class="taskbox__text--heading">Task in Progress</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card my-2">
                                    <div class="card-body">
                                        <div class="taskbox">
                                            <div class="taskbox__icon"><svg width="35px" height="35px" fill="#ae6eea"
                                                    version="1.1" class="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 503.607 503.607"
                                                    style="enable-background:new 0 0 503.607 503.607;"
                                                    xml:space="preserve">
                                                    <g transform="translate(1 1)">
                                                        <g>
                                                            <g>
                                                                <path
                                                                    d="M385.098,57.754h-41.967v-8.393c0-9.233-7.554-16.787-16.787-16.787h-25.18V24.18c0-14.269-10.911-25.18-25.18-25.18                                                            h-50.361c-14.269,0-25.18,11.751-25.18,25.18v8.393h-25.18c-9.233,0-16.787,7.554-16.787,16.787v8.393h-41.967                                                            c-23.502,0-41.967,18.466-41.967,41.967v360.918c0,23.502,18.466,41.967,41.967,41.967h268.59                                                            c23.502,0,41.967-18.466,41.967-41.967V99.721C427.066,76.22,408.6,57.754,385.098,57.754z M175.262,49.361h33.574                                                            c5.036,0,8.393-3.357,8.393-8.393V24.18c0-5.036,3.357-8.393,8.393-8.393h50.361c5.036,0,8.393,4.197,8.393,8.393v16.787                                                            c0,5.036,3.357,8.393,8.393,8.393h33.574v16.787v41.967H175.262V66.148V49.361z M410.279,460.639                                                            c0,14.269-10.911,25.18-25.18,25.18h-268.59c-14.269,0-25.18-10.911-25.18-25.18V99.721c0-14.269,10.911-25.18,25.18-25.18                                                            h41.967v33.574c0,9.233,7.554,16.787,16.787,16.787h151.082c9.233,0,16.787-7.554,16.787-16.787V74.541h41.967                                                            c14.269,0,25.18,10.911,25.18,25.18V460.639z" />
                                                                <path
                                                                    d="M356.561,281.02l-11.751-2.518c-5.875-0.839-10.072-5.036-12.59-10.072c-2.518-5.875-1.679-10.911,1.679-15.948                                                            l7.554-10.072c2.518-3.357,1.679-8.393-0.839-10.911l-16.787-16.787c-3.357-2.518-7.554-3.357-10.911-0.839l-10.072,6.715                                                            c-5.036,3.357-10.911,4.197-15.948,1.679c-5.875-2.518-9.233-6.715-10.072-12.59l-1.679-12.59                                                            c-0.839-3.357-4.197-6.715-8.393-6.715h-23.502c-4.197,0-7.554,2.518-8.393,6.715l-3.357,15.948                                                            c-0.839,5.875-5.036,10.072-10.072,12.59c-5.875,1.679-10.911,1.679-15.948-1.679l-13.43-9.233                                                            c-3.357-2.518-8.393-1.679-10.911,0.839l-16.787,16.787c-2.518,3.357-3.357,7.554-0.839,10.911l7.554,10.072                                                            c3.357,5.036,4.197,10.911,1.679,15.948c-2.518,5.036-6.715,9.233-12.59,10.072l-11.751,2.518                                                            c-4.197,0.839-6.715,4.197-6.715,8.393v23.502c0,4.197,2.518,7.554,6.715,8.393l12.59,1.679                                                            c5.875,0.839,10.072,5.036,12.59,10.072c2.518,5.036,1.679,10.911-1.679,15.948l-6.715,10.072                                                            c-2.518,3.357-1.679,8.393,0.839,10.911l16.787,16.787c3.357,2.518,7.554,3.357,10.911,0.839l10.072-7.554                                                            c5.036-3.357,10.911-3.357,15.948-1.679c5.036,2.518,9.233,6.715,10.072,12.59l2.518,11.751c0.839,4.197,4.197,6.715,8.393,6.715                                                            h23.502c4.197,0,7.554-2.518,7.554-5.875l1.679-9.233c0.839-5.875,5.036-10.072,10.072-12.59s10.911-1.679,15.948,1.679                                                            l7.554,5.036c3.357,2.518,8.393,1.679,10.911-0.839l16.787-16.787c2.518-3.357,3.357-7.554,0.839-10.911l-6.715-10.072                                                            c-3.357-5.036-4.197-10.911-1.679-15.948c2.518-5.036,7.554-8.393,16.787-11.751l12.59-1.679                                                            c3.357-0.839,6.715-4.197,6.715-8.393v-23.502C363.275,285.216,360.757,281.859,356.561,281.02z M342.292,307.879l-5.875,0.839                                                            c-10.911,1.679-20.984,8.393-25.18,19.305c-4.197,10.072-3.357,22.662,3.357,31.895l4.197,4.197l-6.715,6.715l-1.679-0.839                                                            c-10.072-7.554-21.823-8.393-32.734-4.197c-10.911,5.036-18.466,14.269-20.144,26.02v1.679h-9.233l-1.679-5.036                                                            c-1.679-10.911-9.233-20.144-20.144-24.341c-10.911-4.197-22.662-2.518-31.895,4.197l-4.197,3.357l-6.715-6.715l2.518-5.036                                                            c6.715-9.233,7.554-21.823,3.357-31.895c-4.197-10.072-13.43-17.626-25.18-19.305l-5.875-0.839v-9.233l5.875-1.679                                                            c10.911-1.679,20.144-9.233,24.341-20.144c4.197-10.911,2.518-22.662-4.197-31.895l-3.357-4.197l6.715-6.715l7.554,5.036                                                            c9.233,6.715,20.984,7.554,31.056,3.357c10.911-4.197,17.626-13.43,20.144-24.341l1.679-9.233h9.233l0.839,6.715                                                            c1.679,10.911,8.393,20.984,19.305,25.18c10.072,4.197,22.662,3.357,31.895-3.357l4.197-3.357l6.715,7.554l-3.357,4.197                                                            c-6.715,9.233-8.393,20.984-4.197,31.895c4.197,10.072,13.43,17.626,24.341,20.144l5.036,0.839V307.879z" />
                                                                <path
                                                                    d="M250.803,259.197c-23.502,0-41.967,18.466-41.967,41.967s18.466,41.967,41.967,41.967s41.967-18.466,41.967-41.967                                                            S274.305,259.197,250.803,259.197z M250.803,326.344c-14.269,0-25.18-10.911-25.18-25.18s10.911-25.18,25.18-25.18                                                            c14.269,0,25.18,10.911,25.18,25.18S265.072,326.344,250.803,326.344z" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg></div>
                                            <div class="taskbox__text">
                                                <div class="taskbox__text--numbers">03</div>
                                                <div class="taskbox__text--heading">Tasks in Review</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card my-2">
                                    <div class="card-body">
                                        <div class="taskbox">
                                            <div class="taskbox__icon"><svg width="35px" height="35px" fill="#ae6eea"
                                                    version="1.1" class="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 503.607 503.607"
                                                    style="enable-background:new 0 0 503.607 503.607;"
                                                    xml:space="preserve">
                                                    <g transform="translate(1 1)">
                                                        <g>
                                                            <g>
                                                                <path
                                                                    d="M385.098,57.754h-41.967v-8.393c0-9.233-7.554-16.787-16.787-16.787h-25.18V24.18c0-14.269-10.911-25.18-25.18-25.18                                                                h-50.361c-14.269,0-25.18,11.751-25.18,25.18v8.393h-25.18c-9.233,0-16.787,7.554-16.787,16.787v8.393h-41.967                                                                c-23.502,0-41.967,18.466-41.967,41.967v360.918c0,23.502,18.466,41.967,41.967,41.967h268.59                                                                c23.502,0,41.967-18.466,41.967-41.967V99.721C427.066,76.22,408.6,57.754,385.098,57.754z M175.262,49.361h33.574                                                                c5.036,0,8.393-3.357,8.393-8.393V24.18c0-5.036,3.357-8.393,8.393-8.393h50.361c5.036,0,8.393,4.197,8.393,8.393v16.787                                                                c0,5.036,3.357,8.393,8.393,8.393h33.574v16.787v41.967H175.262V66.148V49.361z M410.279,460.639                                                                c0,14.269-10.911,25.18-25.18,25.18h-268.59c-14.269,0-25.18-10.911-25.18-25.18V99.721c0-14.269,10.911-25.18,25.18-25.18                                                                h41.967v33.574c0,9.233,7.554,16.787,16.787,16.787h151.082c9.233,0,16.787-7.554,16.787-16.787V74.541h41.967                                                                c14.269,0,25.18,10.911,25.18,25.18V460.639z" />
                                                                <path
                                                                    d="M250.803,192.049c-60.433,0-109.115,48.682-109.115,109.115s48.682,109.115,109.115,109.115                                                                s109.115-48.682,109.115-109.115S311.236,192.049,250.803,192.049z M250.803,393.492c-51.2,0-92.328-41.128-92.328-92.328                                                                c0-51.2,41.128-92.328,92.328-92.328s92.328,41.128,92.328,92.328C343.131,352.364,302.003,393.492,250.803,393.492z" />
                                                                <path
                                                                    d="M296.967,252.482c-4.197-2.518-9.233-1.679-11.751,2.518l-44.485,74.702l-26.02-26.02c-3.357-3.357-8.393-3.357-11.751,0                                                                c-3.357,3.357-3.357,8.393,0,11.751l33.574,33.574c1.679,1.679,3.357,2.518,5.875,2.518c0,0,0.839,0,0.839,0.839                                                                c2.518-0.839,4.197-1.679,5.875-4.197l50.361-83.934C302.003,260.036,301.164,255,296.967,252.482z" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg></div>
                                            <div class="taskbox__text">
                                                <div class="taskbox__text--numbers">18</div>
                                                <div class="taskbox__text--heading">Completed Tasks</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row pt-3 mb-5">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                <div class="taskpanel-title">Tasklist</div><button
                                    class="btn btn-primary-light newtaskbtn btn-block mb-3"><i
                                        class="mdi mdi-plus-circle-outline"></i><span>Add task</span></button>
                                <div class="taskpanel" id="taskList">
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Shopping App Redesign</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                                <div class="collapse" id="collapseExample">
                                                    <div class="task-details pt-3">
                                                        <div class="task-details__title">Checklist</div>
                                                        <ul class="task-checklist">
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-checkbox task-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="customCheck1"><label
                                                                        class="custom-control-label"
                                                                        for="customCheck1">Make Wireframe Using
                                                                        Figma</label></div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-checkbox task-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="customCheck2"><label
                                                                        class="custom-control-label"
                                                                        for="customCheck2">Approve Design & Make
                                                                        PSD</label></div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-checkbox task-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="customCheck3"><label
                                                                        class="custom-control-label"
                                                                        for="customCheck3">Make PSD to
                                                                        Responsive</label></div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-checkbox task-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="customCheck4"><label
                                                                        class="custom-control-label"
                                                                        for="customCheck4">Test & Submit to
                                                                        Clients</label></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="task-details__title">Deadline</div>
                                                    <div class="taskenddate">25/07/2019 at 12:00AM</div>
                                                    <div class="task-details__title">Members</div>
                                                    <div class="user-avatar-group"><a href="javascript:;"
                                                            class="user-avatar user-avatar-rounded">
                                                            <div class="chatriq-user chatriq-user-14"></div>
                                                        </a><a href="javascript:;"
                                                            class="user-avatar user-avatar-rounded">
                                                            <div class="chatriq-user chatriq-user-12"></div>
                                                        </a><a href="javascript:;"
                                                            class="user-avatar user-avatar-rounded  avatar-info"><span>BB</span></a><a
                                                            href="javascript:;" class="user-avatar user-avatar-rounded">
                                                            <div class="chatriq-user chatriq-user-10"></div>
                                                        </a><a href="javascript:;"
                                                            class="user-avatar user-avatar-rounded avatar-primary"><span><i
                                                                    class="mdi mdi-account-plus-outline base-font-size"></i></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer taskpanel-footer">
                                                <div class="checklist-number">0/4</div>
                                                <div class="taskinfo-footer">
                                                    <div class="attachment"><i
                                                            class="mdi mdi-paperclip"></i><span>3</span></div>
                                                    <div class="comments"><i
                                                            class="mdi mdi-comment-text-multiple-outline"></i><span>15</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                            <div class="taskcard-ribbon"><span class="badge badge-primary">New</span>
                                            </div>
                                            <div class="task-expander" role="button" data-toggle="collapse"
                                                data-target="#collapseExample" aria-expanded="false"
                                                aria-controls="collapseExample"><i
                                                    class="task-expander-btn mdi mdi-plus-box-outline"></i></div>
                                        </div>
                                    </div>
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Make Website Responsive</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                            </div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                            <div class="taskcard-ribbon"><span
                                                    class="badge badge-danger">Important</span></div>
                                        </div>
                                    </div>
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Make Website Responsive</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                            </div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                            <div class="taskcard-ribbon"><span
                                                    class="badge badge-danger">Important</span></div>
                                        </div>
                                    </div>
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Testing of Eductation Website Payment Modes</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                            </div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                        </div>
                                    </div>
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Send an Email to Client</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                            </div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                            <div class="taskcard-ribbon"><span class="badge badge-warning">Due</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Submit Website to the Client</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                            </div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                        </div>
                                    </div>
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Find Issue in Video App Project</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                            </div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                        </div>
                                    </div>
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Testing of Eductation Website Payment Modes</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                            </div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                        </div>
                                    </div>
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Send an Email to Client</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                            </div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                <div class="taskpanel-title">In Process</div><button
                                    class="btn btn-primary-light newtaskbtn btn-block mb-3"><i
                                        class="mdi mdi-plus-circle-outline"></i><span>Add task</span></button>
                                <div class="taskpanel" id="inProcessTask">
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Education App Redesign</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                                <div class="progress mt-3" style="height: 3px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="collapse show" id="collapseExample2">
                                                    <div class="task-details pt-3">
                                                        <div class="task-details__title"> Checklist</div>
                                                        <ul class="task-checklist">
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-checkbox task-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="customCheck5" checked><label
                                                                        class="custom-control-label done"
                                                                        for="customCheck5">Make Wireframe Using
                                                                        Figma</label></div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-checkbox task-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="customCheck6"><label
                                                                        class="custom-control-label"
                                                                        for="customCheck6">Approve Design & Make
                                                                        PSD</label></div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-checkbox task-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="customCheck7"><label
                                                                        class="custom-control-label"
                                                                        for="customCheck7">Make PSD to
                                                                        Responsive</label></div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="custom-control custom-checkbox task-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="customCheck8"><label
                                                                        class="custom-control-label"
                                                                        for="customCheck8">Test & Submit to
                                                                        Clients</label></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="task-details__title">Deadline</div>
                                                    <div class="taskenddate">25/07/2019 at 12:00AM</div>
                                                    <div class="task-details__title">Members</div>
                                                    <div class="user-avatar-group"><a href="javascript:;"
                                                            class="user-avatar user-avatar-rounded">
                                                            <div class="chatriq-user chatriq-user-05"></div>
                                                        </a><a href="javascript:;"
                                                            class="user-avatar user-avatar-rounded">
                                                            <div class="chatriq-user chatriq-user-04"></div>
                                                        </a><a href="javascript:;"
                                                            class="user-avatar user-avatar-rounded avatar-info"><span>BB</span></a><a
                                                            href="javascript:;" class="user-avatar user-avatar-rounded">
                                                            <div class="chatriq-user chatriq-user-03"></div>
                                                        </a><a href="javascript:;"
                                                            class="user-avatar user-avatar-rounded avatar-primary"><span><i
                                                                    class="mdi mdi-account-plus-outline base-font-size"></i></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer taskpanel-footer">
                                                <div class="checklist-number">1/4</div>
                                                <div class="taskinfo-footer">
                                                    <div class="attachment"><i
                                                            class="mdi mdi-paperclip"></i><span>3</span></div>
                                                    <div class="comments"><i
                                                            class="mdi mdi-comment-text-multiple-outline"></i><span>15</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                            <div class="task-expander" role="button" data-toggle="collapse"
                                                data-target="#collapseExample2" aria-expanded="true"
                                                aria-controls="collapseExample2"><i
                                                    class="task-expander-btn mdi mdi-minus-box-outline"></i></div>
                                        </div>
                                    </div>
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Make Website Responsive</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                            </div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                            <div class="taskcard-ribbon"><span
                                                    class="badge badge-danger">Important</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                <div class="taskpanel-title">In Review</div><button
                                    class="btn btn-primary-light newtaskbtn btn-block mb-3"><i
                                        class="mdi mdi-plus-circle-outline"></i><span>Add task</span></button>
                                <div class="taskpanel" id="inReviewTask">
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Shopping App Redesign</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                            </div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                            <div class="card-footer taskpanel-footer">12</div>
                                        </div>
                                    </div>
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Testing of Eductation Website Payment Modes</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                            </div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                        </div>
                                    </div>
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Testing Payment Modes</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                            </div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                        </div>
                                    </div>
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Checking Security</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                            </div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                <div class="taskpanel-title">Completed</div><button
                                    class="btn btn-primary-light newtaskbtn btn-block mb-3"><i
                                        class="mdi mdi-plus-circle-outline"></i><span>Add task</span></button>
                                <div class="taskpanel" id="completedTasks">
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Shopping App Redesign</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                            </div>
                                            <div class="card-footer taskpanel-footer"> 12</div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                        </div>
                                    </div>
                                    <div class="taskcard">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="taskname">Send an Email to Client</div>
                                                <div class="taskdate">20/07/2019 at 03:10PM</div>
                                            </div>
                                            <div class="taskcard-dragger"><i class="mdi mdi-drag-horizontal"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- main content end -->
        </div>
    </div><!-- Javascripts Files -->
    <script src="dist/js/jquery-3.3.1.slim.min.js"></script>
    <script src="dist/js/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/vendors/shortable/sortable.min.js"></script>
    <script src="dist/js/main.js"></script>
    <script
        class="text/javascript">/*--------------------------------------------------------------    TO-DO LIST START    --------------------------------------------------------------*/        Sortable.create(taskList, { animation: 100, group: 'list-1', draggable: '.taskcard', handle: '.taskcard-dragger', sort: true, chosenClass: 'active', }); Sortable.create(inProcessTask, { group: 'list-1', handle: '.taskcard-dragger' }); Sortable.create(inReviewTask, { group: 'list-1', handle: '.taskcard-dragger' }); Sortable.create(completedTasks, { group: 'list-1', handle: '.taskcard-dragger' }); $('.task-checklist').on('click', '.task-checkbox >label', function () { $(this).toggleClass('done'); }); $(".task-expander-btn").click(function () { $(this).toggleClass("mdi-minus-box-outline mdi-plus-box-outline"); });    /*--------------------------------------------------------------    TO-DO LIST END    --------------------------------------------------------------*/</script>
</body>

</html>