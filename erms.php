
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title> Home | eRMS </title>
    <meta name="csrf-token" content="gXlQyBbIhiRAKHdyqw0gJsJKVRV7eor9n03annu5">
    <meta name="serial" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="CipherHub Solutions" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="/images/LogoSmall.png">
    <link rel="stylesheet" href="erm1.css">

    <style>
    .welcome{
         position: relative;
         text-align: center;
         height: 90vh;
        }
    .centered {
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #0072B9;
        font-size: 15px;
        font-weight: bold;
    }
    @media (min-width: 768px) {
        .centered {
             font-size: 45px;
             }
    }
</style>
</head>
<body class="fixed-left-void">
    <div id="wrapper" class="enlarged forced">
        <div class="topbar">
            <div class="topbar-left">
                <div class="text-center">
                    <a href="#" class="logo"><img src="ermslogo.png" alt="eSoft"></a>
                    <a href="#" class="logo-sm"><img src="ermslogo.png" alt="eSoft"></a>
                </div>
            </div>
            <!-- <div class="navbar navbar-default" role="navigation"> -->
                <!-- <div class="container"> -->
                    <!-- <div class="" id="refresh">
                        <div class="pull-left">
                            <button type="button" class="button-menu-mobile open-left waves-effect waves-light"> <i class="ion-navicon"></i> </button> <span class="clearfix"></span>
                        </div>                         -->
                        <!-- <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="hidden-xs"> <a href="#" id="btn-fullscreen" class="waves-effect waves-light notification-icon-box"><i class="mdi mdi-fullscreen"></i></a></li>
                            <li class="dropdown hidden-xs">
                                <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light notification-icon-box" data-toggle="dropdown" aria-expanded="true"> <i class="fa fa-bell"></i></a>
                                <sup class="badge badge-danger notifi_count" style="position: absolute; margin-top: 46%; margin-left: 55%; z-index: 1;"></sup>
                                <ul class="dropdown-menu dropdown-menu-lg noti-list-box">
                                    <li class="text-center notifi-title">Notifications </li>
                                    <li class="list-group notification-scroll all_notifications" style="overflow-y: scroll; max-height: 250px"> </li>
                                </ul> -->
                            <!-- </li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle profile waves-effect waves-light notification-icon-box" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-user"></i><span></span></a>
                                <ul class="dropdown-menu">
                                    <li style="font-style: italic"><a href="#">&nbsp;User Name :&nbsp;</i><span>eSoft</span> </a></li>
                                    <li style="font-style: italic"><a href="#">&nbsp;Email :&nbsp;</i><span>admin@esoft.com</span> </a></li>
                                    <li class="divider"></li>
                                    <li style="font-style: italic">
                                        <a class="dropdown-item" href="https://erms.in/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="mdi mdi-logout"></i> Logout </a>
                                        <form id="logout-form" action="https://erms.in/logout" method="POST" class="d-none"> <input type="hidden" name="_token" value="gXlQyBbIhiRAKHdyqw0gJsJKVRV7eor9n03annu5"> </form>
                                    </li>
                                </ul>
                            </li>
                        </ul> -->
                        <!-- <div class="pull-right">
                            <span id="digiclock"></span>
                         </div> -->
                    <!-- </div> -->
                <!-- </div> -->
            </div>
        <!-- </div> -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <div id="sidebar-menu">
                    <ul>
                        <li> <a href="https://erms.in/home" class="waves-effect"><i class="fa fa-home"></i><span> Home<span class="badge badge-primary pull-right"></span></span></a></li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-plus"></i> <span> Registration </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <!-- <ul class="list-unstyled">
                                <li><a href="https://erms.in/candidate-reg">New Candidate</a></li>
                                <li><a href="https://erms.in/candidate-list">Candidate List</a></li>
                            </ul> -->
                        </li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-check-circle-o"></i> <span> Biometric </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                        </li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i> <span> Users </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                        </li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect" id="settings-head"><i class="fa fa-cogs"></i> <span> Settings </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <main class="py-4">
                <div class="content-page">
        <div class="content">
            <div class="page-content-wrapper ">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="welcome">
                                        <img src="ermimage.png" alt="" style="width: 50%; opacity: 0.2;"/>
                                        <div class="centered" style="font-size: 45px;">
                                            <br>Welcome <br>To <br>
                                            <span class="text-success">e</span>-<span class="text-success">R</span>ecruitment <span class="text-success">M</span>anagement <span class="text-success">S</span>ystem
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </main>
    </div>
    <!-- <footer class="footer"> © 2023 - All Rights Reserved. Powered By @ <a href="http://cipherhub.com" target="_blank">CipherHub Solutions.</a> </footer>
    <script type="text/javascript" src="/js/app.js"></script>
    <div>
        <div class="sweet-overlay" tabindex="-1" >

        </div>
        <div class="sweet-alert" tabindex="-1">
            <div class="icon error">
                <span class="x-mark">
                    <span class="line left"></span>
                    <span class="line right"></span>
                </span>
            </div>
            <div class="icon warning">
                <span class="body"></span>
                <span class="dot"></span>
            </div>
            <div class="icon info"></div>
            <div class="icon success">
                <span class="line tip"></span>
                <span class="line long"></span>
                <div class="placeholder"></div>
                <div class="fix"></div>
            </div>
            <div class="icon custom"></div>
            <h2>Title</h2>
            <p class="lead tetx-muted">Text</p>
            <p>
                <button class="cancel btn btn-lg" tabindex="2">Cancle</button>
                <button class="confirm btn btn-lg" tabindex="1">ok</button>
            </p>
        </div>
    </div>          -->
    </body>
</html>