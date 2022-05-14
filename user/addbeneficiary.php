<?php
//include auth_session.php file on all user pages
include("../includes/auth_session.php");
require("../includes/db.php");
?>
<?php
	// Fetch USERS DATA FROM DATABASE 
	
	$query = " SELECT * FROM `users` WHERE username = '{$_SESSION['username']}' ";
	$run_query = mysqli_query($conn, $query);
	if(mysqli_num_rows($run_query) == 1){
		while($result = mysqli_fetch_assoc($run_query)){
		
			$acctNo = $result['acctNo'];
            
			
			
		}
	}
?>
<?php

if(isset($_POST['add_beneficiary'])){

    $beneficiary_name = $_POST['beneficiary_name'];
    $beneficiary_acno = $_POST['beneficiary_acno'];
    $username =  $_SESSION['username'];

    $sql = "SELECT acctNo FROM users WHERE acctNo = $beneficiary_acno";
    $result = $conn->query($sql);
    if($result->num_rows <= 0 ){

        echo '<script>alert("Beneficiary not found. \nKindly enter a valid Account number")
        location="addbeneficiary.php"</script>';
    }


        else{

            if($beneficiary_acno == $acctNo){

                echo '<script>alert("You cannot add yourself as a beneficiary")</script>';
            }
            
            else{             
                date_default_timezone_set('Asia/Kolkata'); 
                $_date_added = date("d/m/y h:i:s A");
            
                    $sql = "INSERT INTO beneficiary_$acctNo (Beneficiary_name,
                    Beneficiary_ac_no,Date_added) 
                    VALUE ('$beneficiary_name','$beneficiary_acno','$_date_added')";
                    if($conn->query($sql) == TRUE){
            
                        echo '<script>alert("Beneficiary Added Successfully")
                        location="viewbeneficiary.php"</script>';
                    }
            
                    else{
            
                        echo "Error inserting data: " . $conn->error;
            
                       } 

                      }
            

                }
            
             }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/logo/logo-icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/logo/logo-icon.png" type="image/x-icon">
    <title>Novatify Fintech - Transfer</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/chartist.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/date-picker.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
</head>

<body onload="startTime()">
    <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                </fecolormatrix>
            </filter>
        </svg>
    </div>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper row m-0">
                <form class="form-inline search-full col" action="#" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                    placeholder="Search Cuba .." name="q" title="" autofocus>
                                <div class="spinner-border Typeahead-spinner" role="status"><span
                                        class="sr-only">Loading...</span>
                                </div><i class="close-search" data-feather="x"></i>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>
                <div class="header-logo-wrapper col-auto p-0">
                    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid"
                                src="../assets/images/logo/logo.png" alt=""></a></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle"
                            data-feather="align-center"></i>
                    </div>
                </div>
                <div class="left-header col horizontal-wrapper ps-0">
                    <ul class="horizontal-menu">
                        <li class="mega-menu outside"><a class="nav-link" href="#!"><i
                                    data-feather="layers"></i><span>Bonus
                                    Ui</span></a>
                            <div class="mega-menu-container nav-submenu menu-to-be-close header-mega">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col mega-box">
                                            <div class="mobile-title d-none">
                                                <h5>Mega menu</h5><i data-feather="x"></i>
                                            </div>
                                            <div class="link-section icon">
                                                <div>
                                                    <h6>Error Page</h6>
                                                </div>
                                                <ul>
                                                    <li><a href="error-400.html">Error page 400</a></li>
                                                    <li><a href="error-401.html">Error page 401</a></li>
                                                    <li><a href="error-403.html">Error page 403</a></li>
                                                    <li><a href="error-404.html">Error page 404</a></li>
                                                    <li><a href="error-500.html">Error page 500</a></li>
                                                    <li><a href="error-503.html">Error page 503</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col mega-box">
                                            <div class="link-section doted">
                                                <div>
                                                    <h6> Authentication</h6>
                                                </div>
                                                <ul>
                                                    <li><a href="login.html">Login</a></li>
                                                    <li><a href="login_one.html">Login with image</a></li>
                                                    <li><a href="login-bs-validation.html">Login with validation</a>
                                                    </li>
                                                    <li><a href="sign-up.html">Sign Up</a></li>
                                                    <li><a href="sign-up-one.html">SignUp with image</a></li>
                                                    <li><a href="sign-up-two.html">SignUp with image</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col mega-box">
                                            <div class="link-section dashed-links">
                                                <div>
                                                    <h6>Usefull Pages</h6>
                                                </div>
                                                <ul>
                                                    <li><a href="search.html">Search Website</a></li>
                                                    <li><a href="unlock.html">Unlock User</a></li>
                                                    <li><a href="forget-password.html">Forget Password</a></li>
                                                    <li><a href="reset-password.html">Reset Password</a></li>
                                                    <li><a href="maintenance.html">Maintenance</a></li>
                                                    <li><a href="login-sa-validation">Login validation</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col mega-box">
                                            <div class="link-section">
                                                <div>
                                                    <h6>Email templates</h6>
                                                </div>
                                                <ul>
                                                    <li class="ps-0"><a href="basic-template.html">Basic Email</a></li>
                                                    <li class="ps-0"><a href="email-header.html">Basic With Header</a>
                                                    </li>
                                                    <li class="ps-0"><a href="template-email.html">Ecomerce Template</a>
                                                    </li>
                                                    <li class="ps-0"><a href="template-email-2.html">Email Template
                                                            2</a></li>
                                                    <li class="ps-0"><a href="ecommerce-templates.html">Ecommerce
                                                            Email</a></li>
                                                    <li class="ps-0"><a href="email-order-success.html">Order
                                                            Success</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col mega-box">
                                            <div class="link-section">
                                                <div>
                                                    <h6>Coming Soon</h6>
                                                </div>
                                                <ul class="svg-icon">
                                                    <li><a href="comingsoon.html"> <i data-feather="file">
                                                            </i>Coming-soon</a></li>
                                                    <li><a href="comingsoon-bg-video.html"> <i data-feather="film">
                                                            </i>Coming-video</a></li>
                                                    <li><a href="comingsoon-bg-img.html"><i data-feather="image">
                                                            </i>Coming-Image</a></li>
                                                </ul>
                                                <div>
                                                    <h6>Other Soon</h6>
                                                </div>
                                                <ul class="svg-icon">
                                                    <li><a class="txt-primary" href="landing-page.html"> <i
                                                                data-feather="cast"></i>Landing
                                                            Page</a></li>
                                                    <li><a class="txt-secondary" href="sample-page.html"> <i
                                                                data-feather="airplay"></i>Sample
                                                            Page</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="level-menu outside"><a class="nav-link" href="#!"><i
                                    data-feather="inbox"></i><span>Level
                                    Menu</span></a>
                            <ul class="header-level-menu menu-to-be-close">
                                <li><a href="file-manager.html" data-original-title="" title=""> <i
                                            data-feather="send"></i><span>Transfer </span></a></li>
                                <li><a href="#!" data-original-title="" title=""> <i
                                            data-feather="users"></i><span>Users</span></a>
                                    <ul class="header-level-sub-menu">
                                        <li><a href="file-manager.html" data-original-title="" title=""> <i
                                                    data-feather="user"></i><span>User Profile</span></a></li>
                                        <li><a href="file-manager.html" data-original-title="" title=""> <i
                                                    data-feather="user-minus"></i><span>User Edit</span></a></li>
                                        <li><a href="file-manager.html" data-original-title="" title=""> <i
                                                    data-feather="user-check"></i><span>Users Cards</span></a></li>
                                    </ul>
                                </li>
                                <li><a href="kanban.html" data-original-title="" title=""> <i
                                            data-feather="airplay"></i><span>Kanban
                                            Board</span></a></li>
                                <li><a href="bookmark.html" data-original-title="" title=""> <i
                                            data-feather="heart"></i><span>Bills Payment</span></a></li>
                                <li><a href="social-app.html" data-original-title="" title=""> <i
                                            data-feather="zap"></i><span>Social
                                            App </span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="nav-right col-8 pull-right right-header p-0">
                    <ul class="nav-menus">
                        <li class="language-nav d-none">
                            <div class="translate_wrapper">
                                <div class="current_lang">
                                    <div class="lang"><i class="flag-icon flag-icon-us"></i><span class="lang-txt">EN
                                        </span></div>
                                </div>
                                <div class="more_lang">
                                    <div class="lang selected" data-value="en"><i
                                            class="flag-icon flag-icon-us"></i><span class="lang-txt">English<span>
                                                (US)</span></span></div>
                                    <div class="lang" data-value="de"><i class="flag-icon flag-icon-de"></i><span
                                            class="lang-txt">Deutsch</span></div>
                                    <div class="lang" data-value="es"><i class="flag-icon flag-icon-es"></i><span
                                            class="lang-txt">Español</span></div>
                                    <div class="lang" data-value="fr"><i class="flag-icon flag-icon-fr"></i><span
                                            class="lang-txt">Français</span></div>
                                    <div class="lang" data-value="pt"><i class="flag-icon flag-icon-pt"></i><span
                                            class="lang-txt">Português<span> (BR)</span></span></div>
                                    <div class="lang" data-value="cn"><i class="flag-icon flag-icon-cn"></i><span
                                            class="lang-txt">简体中文</span></div>
                                    <div class="lang" data-value="ae"><i class="flag-icon flag-icon-ae"></i><span
                                            class="lang-txt">لعربية
                                            <span> (ae)</span></span></div>
                                </div>
                            </div>
                        </li>
                        <li> <span class="header-search d-none"><i data-feather="search"></i></span></li>
                        <li class="onhover-dropdown">
                            <div class="notification-box"><i data-feather="bell"> </i><span
                                    class="badge rounded-pill badge-secondary">4 </span></div>
                            <ul class="notification-dropdown onhover-show-div">
                                <li><i data-feather="bell"></i>
                                    <h6 class="f-18 mb-0">Notitications</h6>
                                </li>
                                <li>
                                    <p><i class="fa fa-circle-o me-3 font-primary"> </i>Delivery processing <span
                                            class="pull-right">10
                                            min.</span></p>
                                </li>
                                <li>
                                    <p><i class="fa fa-circle-o me-3 font-success"></i>Order Complete<span
                                            class="pull-right">1 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p><i class="fa fa-circle-o me-3 font-info"></i>Tickets Generated<span
                                            class="pull-right">3 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p><i class="fa fa-circle-o me-3 font-danger"></i>Delivery Complete<span
                                            class="pull-right">6
                                            hr</span></p>
                                </li>
                                <li><a class="btn btn-primary" href="#">Check all notification</a></li>
                            </ul>
                        </li>
                        <li class="onhover-dropdown d-none">
                            <div class="notification-box"><i data-feather="star"></i></div>
                            <div class="onhover-show-div bookmark-flip">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="front">
                                            <ul class="droplet-dropdown bookmark-dropdown">
                                                <li class="gradient-primary"><i data-feather="star"></i>
                                                    <h6 class="f-18 mb-0">Bookmark</h6>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-4 text-center"><i data-feather="file-text"></i>
                                                        </div>
                                                        <div class="col-4 text-center"><i data-feather="activity"></i>
                                                        </div>
                                                        <div class="col-4 text-center"><i data-feather="users"></i>
                                                        </div>
                                                        <div class="col-4 text-center"><i data-feather="clipboard"></i>
                                                        </div>
                                                        <div class="col-4 text-center"><i data-feather="anchor"></i>
                                                        </div>
                                                        <div class="col-4 text-center"><i data-feather="settings"></i>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="text-center">
                                                    <button class="flip-btn" id="flip-btn">Add New Bookmark</button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="back">
                                            <ul>
                                                <li>
                                                    <div class="droplet-dropdown bookmark-dropdown flip-back-content">
                                                        <input type="text" placeholder="search...">
                                                    </div>
                                                </li>
                                                <li>
                                                    <button class="d-block flip-back" id="flip-back">Back</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="mode"><i class="fa fa-moon-o"></i></div>
                        </li>
                        <li class="cart-nav onhover-dropdown d-none">
                            <div class="cart-box"><i data-feather="shopping-cart"></i><span
                                    class="badge rounded-pill badge-primary">2</span></div>
                            <ul class="cart-dropdown onhover-show-div">
                                <li>
                                    <h6 class="mb-0 f-20">Shoping Bag</h6><i data-feather="shopping-cart"></i>
                                </li>
                                <li class="mt-0">
                                    <div class="media"><img class="img-fluid rounded-circle me-3 img-60"
                                            src="../assets/images/ecommerce/01.jpg" alt="">
                                        <div class="media-body"><span>V-Neck Shawl Collar Woman's Solid T-Shirt</span>
                                            <p>Yellow(#fcb102)</p>
                                            <div class="qty-box">
                                                <div class="input-group"><span class="input-group-prepend">
                                                        <button class="btn quantity-left-minus" type="button"
                                                            data-type="minus" data-field=""><i
                                                                data-feather="minus"></i></button></span>
                                                    <input class="form-control input-number" type="text" name="quantity"
                                                        value="1"><span class="input-group-prepend">
                                                        <button class="btn quantity-right-plus" type="button"
                                                            data-type="plus" data-field=""><i
                                                                data-feather="plus"></i></button></span>
                                                </div>
                                            </div>
                                            <h6 class="text-end text-muted">$299.00</h6>
                                        </div>
                                        <div class="close-circle"><a href="#"><i data-feather="x"></i></a></div>
                                    </div>
                                </li>
                                <li class="mt-0">
                                    <div class="media"><img class="img-fluid rounded-circle me-3 img-60"
                                            src="../assets/images/ecommerce/03.jpg" alt="">
                                        <div class="media-body"><span>V-Neck Shawl Collar Woman's Solid T-Shirt</span>
                                            <p>Yellow(#fcb102)</p>
                                            <div class="qty-box">
                                                <div class="input-group"><span class="input-group-prepend">
                                                        <button class="btn quantity-left-minus" type="button"
                                                            data-type="minus" data-field=""><i
                                                                data-feather="minus"></i></button></span>
                                                    <input class="form-control input-number" type="text" name="quantity"
                                                        value="1"><span class="input-group-prepend">
                                                        <button class="btn quantity-right-plus" type="button"
                                                            data-type="plus" data-field=""><i
                                                                data-feather="plus"></i></button></span>
                                                </div>
                                            </div>
                                            <h6 class="text-end text-muted">$299.00</h6>
                                        </div>
                                        <div class="close-circle"><a href="#"><i data-feather="x"></i></a></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="total">
                                        <h6 class="mb-2 mt-0 text-muted">Order Total : <span
                                                class="f-right f-20">$598.00</span></h6>
                                    </div>
                                </li>
                                <li><a class="btn btn-block w-100 mb-2 btn-primary view-cart" href="cart.html">Go to
                                        shoping bag</a><a class="btn btn-block w-100 btn-secondary view-cart"
                                        href="checkout.html">Checkout</a></li>
                            </ul>
                        </li>
                        <li class="onhover-dropdown d-none"><i data-feather="message-square"></i>
                            <ul class="chat-dropdown onhover-show-div">
                                <li><i data-feather="message-square"></i>
                                    <h6 class="f-18 mb-0">Message Box </h6>
                                </li>
                                <li>
                                    <div class="media"><img class="img-fluid rounded-circle me-3"
                                            src="../assets/images/user/1.jpg" alt="">
                                        <div class="status-circle online"></div>
                                        <div class="media-body"><span>Erica Hughes</span>
                                            <p>Lorem Ipsum is simply dummy...</p>
                                        </div>
                                        <p class="f-12 font-success">58 mins ago</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="media"><img class="img-fluid rounded-circle me-3"
                                            src="../assets/images/user/2.jpg" alt="">
                                        <div class="status-circle online"></div>
                                        <div class="media-body"><span>Kori Thomas</span>
                                            <p>Lorem Ipsum is simply dummy...</p>
                                        </div>
                                        <p class="f-12 font-success">1 hr ago</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="media"><img class="img-fluid rounded-circle me-3"
                                            src="../assets/images/user/4.jpg" alt="">
                                        <div class="status-circle offline"></div>
                                        <div class="media-body"><span>Ain Chavez</span>
                                            <p>Lorem Ipsum is simply dummy...</p>
                                        </div>
                                        <p class="f-12 font-danger">32 mins ago</p>
                                    </div>
                                </li>
                                <li class="text-center"> <a class="btn btn-primary" href="#">View All </a></li>
                            </ul>
                        </li>
                        <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                    data-feather="maximize"></i></a></li>
                        <li class="profile-nav onhover-dropdown p-0 me-0">
                            <div class="media profile-media"><img class="b-r-10"
                                    src="../assets/images/dashboard/profile.jpg" alt="">
                                <div class="media-body"><span><?php echo $_SESSION['username']; ?></span>
                                    <i class="middle fa fa-angle-down"></i>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li><a href="settings.php"><i data-feather="settings"></i><span>Settings</span></a></li>
                                <li><a href="logout.php"><i data-feather="log-out"> </i><span>Log out</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script>
                <script class="empty-template"
                    type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
            </div>
        </div>
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div>
                    <div class="logo-wrapper"><a href="dashboard.php"><img class="img-fluid for-light"
                                src="../assets/images/logo/nova.png" width="145" alt=""><img class="img-fluid for-dark"
                                src="../assets/images/logo/nova.png" width="145" alt=""></a>
                        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle"
                                data-feather="toggle-left">
                            </i></div>
                    </div>
                    <div class="logo-icon-wrapper"><a href="dashboard.php"><img class="img-fluid"
                                src="../assets/images/logo/logo-icon.png" width="32" alt=""></a></div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">
                                <li class="back-btn"><a href="dashboard.php"><img class="img-fluid"
                                            src="../assets/images/logo/logo-icon.png" width="32" alt=""></a>
                                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                            aria-hidden="true"></i></div>
                                </li>
                                <!-- <li class="sidebar-main-title">
                          <div>
                            <h6 class="lan-1">General</h6>
                            <p class="lan-2">Dashboards,widgets & layout.</p>
                          </div>
                        </li> -->
                                <li class="sidebar-list">
                                    <a class="sidebar-link" href="dashboard.php"><i data-feather="home"></i><span
                                            class="lan-3">Dashboard</span></a>
                                    <!-- <ul class="sidebar-submenu">
                            <li><a class="lan-4" href="index.html">Default</a></li>
                            <li><a class="lan-5" href="dashboard-02.html">Ecommerce</a></li>
                          </ul> -->
                                </li>
                                <!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="airplay"></i><span class="lan-6">Widgets</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="general-widget.html">General</a></li>
                            <li><a href="chart-widget.html">Chart</a></li>
                          </ul>
                        </li> -->
                                <!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="layout"></i><span class="lan-7">Page layout</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="box-layout.html">Boxed</a></li>
                            <li><a href="layout-rtl.html">RTL</a></li>
                            <li><a href="layout-dark.html">Dark Layout</a></li>
                            <li><a href="hide-on-scroll.html">Hide Nav Scroll</a></li>
                            <li><a href="footer-light.html">Footer Light</a></li>
                            <li><a href="footer-dark.html">Footer Dark</a></li>
                            <li><a href="footer-fixed.html">Footer Fixed</a></li>
                          </ul>
                        </li> -->
                                <!-- <li class="sidebar-main-title">
                          <div>
                            <h6 class="lan-8">Applications</h6>
                            <p class="lan-9">Ready to use Apps</p>
                          </div>
                        </li>
                        <li class="sidebar-list">
                          <label class="badge badge-danger">New</label><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="box"></i><span>Project </span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="projects.html">Project List</a></li>
                            <li><a href="projectcreate.html">Create new</a></li>
                          </ul>
                        </li> -->
                                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                        href="transfer.php"><i data-feather="send"> </i><span>Transfer</span></a></li>
                                <!-- <li class="sidebar-list">
                          <label class="badge badge-info">Latest </label><a class="sidebar-link sidebar-title link-nav"
                            href="kanban.html"><i data-feather="monitor"> </i><span>kanban Board</span></a>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="shopping-bag"></i><span>Ecommerce</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="product.html">Product</a></li>
                            <li><a href="product-page.html">Product page</a></li>
                            <li><a href="list-products.html">Product list</a></li>
                            <li><a href="payment-details.html">Payment Details</a></li>
                            <li><a href="order-history.html">Order History</a></li>
                            <li><a href="invoice-template.html">Invoice</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="list-wish.html">Wishlist</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="pricing.html">Pricing </a></li>
                          </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="mail"></i><span>Email</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="email-application.html">Email App</a></li>
                            <li><a href="email-compose.html">Email Compose</a></li>
                          </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="message-circle"></i><span>Chat</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="chat.html">Chat App</a></li>
                            <li><a href="chat-video.html">Video chat</a></li>
                          </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="users"></i><span>Users</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="user-profile.html">Users Profile</a></li>
                            <li><a href="edit-profile.html">Users Edit</a></li>
                            <li><a href="user-cards.html">Users Cards</a></li>
                          </ul>
                        </li> -->
                                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                                            class="fa fa-credit-card" data-feather="credit-card"> </i><span>Bills
                                            Payment</span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="cable.html">Cable TV</a></li>
                                        <li><a href="electricity.html">Electricity</a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                        href="airtime.html"><i data-feather="trending-up"> </i><span>Airtime
                                            Topup</span></a></li>
                                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                        href="data.html"><i data-feather="wifi"> </i><span>Data Topup</span></a></li>
                                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                        href="dashboard.html-basic.html"><i data-feather="dollar-sign">
                                        </i><span>Loan</span></a>
                                </li>
                                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                        href="settings.php"><i data-feather="settings">
                                        </i><span>Settings</span></a></li>
                                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                        href="faqs.html"><i data-feather="help-circle"> </i><span>FAQS</span></a>
                                </li>
                                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                        href="logout.php"><i data-feather="log-out">
                                        </i><span>Log Out</span></a></li>
                                <!-- <li class="sidebar-main-title">
                          <div>
                            <h6>Forms & Table</h6>
                            <p>Ready to use froms & tables </p>
                          </div>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="file-text"></i><span>Forms</span></a>
                          <ul class="sidebar-submenu">
                            <li><a class="submenu-title" href="#">Form Controls<span class="sub-arrow"><i
                                    class="fa fa-angle-right"></i></span></a>
                              <ul class="nav-sub-childmenu submenu-content">
                                <li><a href="form-validation.html">Form Validation</a></li>
                                <li><a href="base-input.html">Base Inputs</a></li>
                                <li><a href="radio-checkbox-control.html">Checkbox & Radio</a></li>
                                <li><a href="input-group.html">Input Groups</a></li>
                                <li><a href="megaoptions.html">Mega Options</a></li>
                              </ul>
                            </li>
                            <li><a class="submenu-title" href="#">Form Widgets<span class="sub-arrow"><i
                                    class="fa fa-angle-right"></i></span></a>
                              <ul class="nav-sub-childmenu submenu-content">
                                <li><a href="datepicker.html">Datepicker</a></li>
                                <li><a href="time-picker.html">Timepicker</a></li>
                                <li><a href="datetimepicker.html">Datetimepicker</a></li>
                                <li><a href="daterangepicker.html">Daterangepicker</a></li>
                                <li><a href="touchspin.html">Touchspin</a></li>
                                <li><a href="select2.html">Select2</a></li>
                                <li><a href="switch.html">Switch</a></li>
                                <li><a href="typeahead.html">Typeahead</a></li>
                                <li><a href="clipboard.html">Clipboard</a></li>
                              </ul>
                            </li>
                            <li><a class="submenu-title" href="#">Form layout<span class="sub-arrow"><i
                                    class="fa fa-angle-right"></i></span></a>
                              <ul class="nav-sub-childmenu submenu-content">
                                <li><a href="default-form.html">Default Forms</a></li>
                                <li><a href="form-wizard.html">Form Wizard 1</a></li>
                                <li><a href="form-wizard-two.html">Form Wizard 2</a></li>
                                <li><a href="form-wizard-three.html">Form Wizard 3</a></li>
                              </ul>
                            </li>
                          </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="server"></i><span>Tables</span></a>
                          <ul class="sidebar-submenu">
                            <li><a class="submenu-title" href="#">Bootstrap Tables<span class="sub-arrow"><i
                                    class="fa fa-angle-right"></i></span></a>
                              <ul class="nav-sub-childmenu submenu-content">
                                <li><a href="bootstrap-basic-table.html">Basic Tables</a></li>
                                <li><a href="bootstrap-sizing-table.html">Sizing Tables</a></li>
                                <li><a href="bootstrap-border-table.html">Border Tables</a></li>
                                <li><a href="bootstrap-styling-table.html">Styling Tables</a></li>
                                <li><a href="table-components.html">Table components</a></li>
                              </ul>
                            </li>
                            <li><a class="submenu-title" href="#">Data Tables<span class="sub-arrow"><i
                                    class="fa fa-angle-right"></i></span></a>
                              <ul class="nav-sub-childmenu submenu-content">
                                <li><a href="datatable-basic-init.html">Basic Init</a></li>
                                <li><a href="datatable-advance.html">Advance Init</a></li>
                                <li><a href="datatable-styling.html">Styling</a></li>
                                <li><a href="datatable-AJAX.html">AJAX</a></li>
                                <li><a href="datatable-server-side.html">Server Side</a></li>
                                <li><a href="datatable-plugin.html">Plug-in</a></li>
                                <li><a href="datatable-API.html">API</a></li>
                                <li><a href="datatable-data-source.html">Data Sources</a></li>
                              </ul>
                            </li>
                            <li><a class="submenu-title" href="#">Ex. Data Tables<span class="sub-arrow"><i
                                    class="fa fa-angle-right"></i></span></a>
                              <ul class="nav-sub-childmenu submenu-content">
                                <li><a href="datatable-ext-autofill.html">Auto Fill</a></li>
                                <li><a href="datatable-ext-basic-button.html">Basic Button</a></li>
                                <li><a href="datatable-ext-col-reorder.html">Column Reorder</a></li>
                                <li><a href="datatable-ext-fixed-header.html">Fixed Header</a></li>
                                <li><a href="datatable-ext-html-5-data-export.html">HTML 5 Export</a></li>
                                <li><a href="datatable-ext-key-table.html">Key Table</a></li>
                                <li><a href="datatable-ext-responsive.html">Responsive</a></li>
                                <li><a href="datatable-ext-row-reorder.html">Row Reorder</a></li>
                                <li><a href="datatable-ext-scroller.html">Scroller</a></li>
                              </ul>
                            </li>
                            <li><a href="jsgrid-table.html">Js Grid Table </a></li>
                          </ul>
                        </li>
                        <li class="sidebar-main-title">
                          <div>
                            <h6>Components</h6>
                            <p>UI Components & Elements </p>
                          </div>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="box"></i><span>Ui Kits</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="state-color.html">State color</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="avatars.html">Avatars</a></li>
                            <li><a href="helper-classes.html">helper classes</a></li>
                            <li><a href="grid.html">Grid</a></li>
                            <li><a href="tag-pills.html">Tag & pills</a></li>
                            <li><a href="progress-bar.html">Progress</a></li>
                            <li><a href="modal.html">Modal</a></li>
                            <li><a href="alert.html">Alert</a></li>
                            <li><a href="popover.html">Popover</a></li>
                            <li><a href="tooltip.html">Tooltip</a></li>
                            <li><a href="loader.html">Spinners</a></li>
                            <li><a href="dropdown.html">Dropdown</a></li>
                            <li><a href="according.html">Accordion</a></li>
                            <li><a class="submenu-title" href="#">Tabs<span class="sub-arrow"><i
                                    class="fa fa-angle-right"></i></span></a>
                              <ul class="nav-sub-childmenu submenu-content">
                                <li><a href="tab-bootstrap.html">Bootstrap Tabs</a></li>
                                <li><a href="tab-material.html">Line Tabs</a></li>
                              </ul>
                            </li>
                            <li><a href="box-shadow.html">Shadow</a></li>
                            <li><a href="list.html">Lists</a></li>
                          </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="folder-plus"></i><span>Bonus Ui</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="scrollable.html">Scrollable</a></li>
                            <li><a href="tree.html">Tree view</a></li>
                            <li><a href="bootstrap-notify.html">Bootstrap Notify</a></li>
                            <li><a href="rating.html">Rating</a></li>
                            <li><a href="dropzone.html">dropzone</a></li>
                            <li><a href="tour.html">Tour</a></li>
                            <li><a href="sweet-alert2.html">SweetAlert2</a></li>
                            <li><a href="modal-animated.html">Animated Modal</a></li>
                            <li><a href="owl-carousel.html">Owl Carousel</a></li>
                            <li><a href="ribbons.html">Ribbons</a></li>
                            <li><a href="pagination.html">Pagination</a></li>
                            <li><a href="breadcrumb.html">Breadcrumb</a></li>
                            <li><a href="range-slider.html">Range Slider</a></li>
                            <li><a href="image-cropper.html">Image cropper</a></li>
                            <li><a href="sticky.html">Sticky</a></li>
                            <li><a href="basic-card.html">Basic Card</a></li>
                            <li><a href="creative-card.html">Creative Card</a></li>
                            <li><a href="tabbed-card.html">Tabbed Card</a></li>
                            <li><a href="dragable-card.html">Draggable Card</a></li>
                            <li><a class="submenu-title" href="#">Timeline<span class="sub-arrow"><i
                                    class="fa fa-angle-right"></i></span></a>
                              <ul class="nav-sub-childmenu submenu-content">
                                <li><a href="timeline-v-1.html">Timeline 1</a></li>
                                <li><a href="timeline-v-2.html">Timeline 2</a></li>
                              </ul>
                            </li>
                          </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="edit-3"></i><span>Builders</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="form-builder-1.html"> Form Builder 1</a></li>
                            <li><a href="form-builder-2.html"> Form Builder 2</a></li>
                            <li><a href="pagebuild.html">Page Builder</a></li>
                            <li><a href="button-builder.html">Button Builder</a></li>
                          </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="cloud-drizzle"></i><span>Animation</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="animate.html">Animate</a></li>
                            <li><a href="scroll-reval.html">Scroll Reveal</a></li>
                            <li><a href="AOS.html">AOS animation</a></li>
                            <li><a href="tilt.html">Tilt Animation</a></li>
                            <li><a href="wow.html">Wow Animation</a></li>
                          </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="command"></i><span>Icons</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="flag-icon.html">Flag icon</a></li>
                            <li><a href="font-awesome.html">Fontawesome Icon</a></li>
                            <li><a href="ico-icon.html">Ico Icon</a></li>
                            <li><a href="themify-icon.html">Thimify Icon</a></li>
                            <li><a href="feather-icon.html">Feather icon</a></li>
                            <li><a href="whether-icon.html">Whether Icon</a></li>
                          </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="cloud"></i><span>Buttons</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="buttons.html">Default Style</a></li>
                            <li><a href="buttons-flat.html">Flat Style</a></li>
                            <li><a href="buttons-edge.html">Edge Style</a></li>
                            <li><a href="raised-button.html">Raised Style</a></li>
                            <li><a href="button-group.html">Button Group</a></li>
                          </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="bar-chart"></i><span>Charts</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="echarts.html">Echarts</a></li>
                            <li><a href="chart-apex.html">Apex Chart</a></li>
                            <li><a href="chart-google.html">Google Chart</a></li>
                            <li><a href="chart-sparkline.html">Sparkline chart</a></li>
                            <li><a href="chart-flot.html">Flot Chart</a></li>
                            <li><a href="chart-knob.html">Knob Chart</a></li>
                            <li><a href="chart-morris.html">Morris Chart</a></li>
                            <li><a href="chartjs.html">Chatjs Chart</a></li>
                            <li><a href="chartist.html">Chartist Chart</a></li>
                            <li><a href="chart-peity.html">Peity Chart</a></li>
                          </ul>
                        </li>
                        <li class="sidebar-main-title">
                          <div>
                            <h6>Pages</h6>
                            <p>All neccesory pages added</p>
                          </div>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="landing-page.html"><i
                              data-feather="cast"> </i><span>Landing page</span></a></li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="sample-page.html"><i
                              data-feather="file-text"> </i><span>Sample page</span></a></li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                            href="internationalization.html"><i data-feather="globe"> </i><span>Internationalization</span></a>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="../starter-kit/index.html"
                            target="_blank"><i data-feather="anchor"></i><span>Starter kit</span></a></li>
                        <li class="mega-menu"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="layers"></i><span>Others</span></a>
                          <div class="mega-menu-container menu-content">
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col mega-box">
                                  <div class="link-section">
                                    <div class="submenu-title">
                                      <h5>Error Page</h5>
                                    </div>
                                    <ul class="submenu-content opensubmegamenu">
                                      <li><a href="error-400.html">Error 400</a></li>
                                      <li><a href="error-401.html">Error 401</a></li>
                                      <li><a href="error-403.html">Error 403</a></li>
                                      <li><a href="error-404.html">Error 404</a></li>
                                      <li><a href="error-500.html">Error 500</a></li>
                                      <li><a href="error-503.html">Error 503</a></li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="col mega-box">
                                  <div class="link-section">
                                    <div class="submenu-title">
                                      <h5> Authentication</h5>
                                    </div>
                                    <ul class="submenu-content opensubmegamenu">
                                      <li><a href="login.html" target="_blank">Login Simple</a></li>
                                      <li><a href="login_one.html" target="_blank">Login with bg image</a></li>
                                      <li><a href="login_two.html" target="_blank">Login with image two </a></li>
                                      <li><a href="login-bs-validation.html" target="_blank">Login With validation</a></li>
                                      <li><a href="login-bs-tt-validation.html" target="_blank">Login with tooltip</a></li>
                                      <li><a href="login-sa-validation.html" target="_blank">Login with sweetalert</a></li>
                                      <li><a href="sign-up.html" target="_blank">Register Simple</a></li>
                                      <li><a href="sign-up-one.html" target="_blank">Register with Bg Image </a></li>
                                      <li><a href="sign-up-two.html" target="_blank">Register with Bg video</a></li>
                                      <li><a href="sign-up-wizard.html" target="_blank">Register wizard</a></li>
                                      <li><a href="unlock.html">Unlock User</a></li>
                                      <li><a href="forget-password.html">Forget Password</a></li>
                                      <li><a href="reset-password.html">Reset Password</a></li>
                                      <li><a href="maintenance.html">Maintenance</a></li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="col mega-box">
                                  <div class="link-section">
                                    <div class="submenu-title">
                                      <h5>Coming Soon</h5>
                                    </div>
                                    <ul class="submenu-content opensubmegamenu">
                                      <li><a href="comingsoon.html">Coming Simple</a></li>
                                      <li><a href="comingsoon-bg-video.html">Coming with Bg video</a></li>
                                      <li><a href="comingsoon-bg-img.html">Coming with Bg Image</a></li>
                                    </ul>
                                  </div>
                                </div>
                                <div class="col mega-box">
                                  <div class="link-section">
                                    <div class="submenu-title">
                                      <h5>Email templates</h5>
                                    </div>
                                    <ul class="submenu-content opensubmegamenu">
                                      <li><a href="basic-template.html">Basic Email</a></li>
                                      <li><a href="email-header.html">Basic With Header</a></li>
                                      <li><a href="template-email.html">Ecomerce Template</a></li>
                                      <li><a href="template-email-2.html">Email Template 2</a></li>
                                      <li><a href="ecommerce-templates.html">Ecommerce Email</a></li>
                                      <li><a href="email-order-success.html">Order Success</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li> -->
                                <!-- <li class="sidebar-main-title">
                          <div>
                            <h6>Miscellaneous</h6>
                            <p>Bouns pages & apps</p>
                          </div>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="image"></i><span>Gallery</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="gallery.html">Gallery Grid</a></li>
                            <li><a href="gallery-with-description.html">Gallery Grid Desc</a></li>
                            <li><a href="gallery-masonry.html">Masonry Gallery</a></li>
                            <li><a href="masonry-gallery-with-disc.html">Masonry with Desc</a></li>
                            <li><a href="gallery-hover.html">Hover Effects</a></li>
                          </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="film"></i><span>Blog</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="blog.html">Blog Details</a></li>
                            <li><a href="blog-single.html">Blog Single</a></li>
                            <li><a href="add-post.html">Add Post</a></li>
                          </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="faq.html"><i
                              data-feather="help-circle"> </i><span>FAQ</span></a></li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="package"></i><span>Job Search</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="job-cards-view.html">Cards view</a></li>
                            <li><a href="job-list-view.html">List View</a></li>
                            <li><a href="job-details.html">Job Details</a></li>
                            <li><a href="job-apply.html">Apply</a></li>
                          </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="radio"></i><span>Learning</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="learning-list-view.html">Learning List</a></li>
                            <li><a href="learning-detailed.html">Detailed Course</a></li>
                          </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="map"></i><span>Maps</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="map-js.html">Maps JS</a></li>
                            <li><a href="vector-map.html">Vector Maps</a></li>
                          </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                              data-feather="edit"></i><span>Editors</span></a>
                          <ul class="sidebar-submenu">
                            <li><a href="summernote.html">Summer Note</a></li>
                            <li><a href="ckeditor.html">CK editor</a></li>
                            <li><a href="simple-MDE.html">MDE editor</a></li>
                            <li><a href="ace-code-editor.html">ACE code editor </a></li>
                          </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="knowledgebase.html"><i
                              data-feather="sunrise"> </i><span>Knowledgebase</span></a></li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="support-ticket.html"><i
                              data-feather="users"> </i><span>Support Ticket</span></a></li>
                      </ul>
                    </div> -->
                                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </nav>
                </div>
            </div>
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Add Beneficiary</h3>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid credit-card">
                    <div class="row">
                        <!-- Individual column searching (text inputs) Starts-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body btn-showcase">
                                    <!-- Simple demo-->
                                    <button class="btn btn-primary btn-air-primary btn-pill btn-lg" type="button" data-bs-toggle="modal" data-original-title="test"
                                        data-bs-target="#exampleModal">Add Beneficiary</button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Enter your pin to confirm transaction?</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="theme-form" method="POST">
                                                        <div class="form-group">
                                                            <label class="col-form-label">Beneficiary's Name</label>
                                                            <div class="form-input position-relative">
                                                                <input class="form-control" type="text" name="beneficiary_name" required="" placeholder="Enter Beneficiary's Name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Beneficiary's Account No</label>
                                                            <div class="form-input position-relative">
                                                                <input class="form-control" type="text" name="beneficiary_acno" required="" placeholder="Enter Beneficiary's Account No">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary btn-pill" type="button" onclick="Cancel()" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" name="add_beneficiary" class="btn btn-secondary btn-pill">Proceed</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <!-- EMI Ends-->
                        <!-- Container-fluid Ends-->
                    </div>
                </div>
            </div>
                
                <!-- footer start-->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 footer-copyright text-center">
                                <p class="mb-0">Copyright 2022 © Novatify Fintech</p>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="../assets/js/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap js-->
        <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
        <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <script src="../assets/js/scrollbar/simplebar.js"></script>
        <script src="../assets/js/scrollbar/custom.js"></script>
        <script src="../assets/js/hide-on-scroll.js"></script>
        <!-- Sidebar jquery-->
        <script src="../assets/js/config.js"></script>
        <!-- Plugins JS start-->
        <script src="../assets/js/sidebar-menu.js"></script>
        <script src="../assets/js/tooltip-init.js"></script>
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="../assets/js/script.js"></script>
        <script src="../assets/js/theme-customizer/customizer.js"></script>
        <!-- login js-->
        <!-- Tawk.to Support -->
        <script src="../assets/js/support.js"></script>
        <!-- Plugin used-->

        
</body>

</html>