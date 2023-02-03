<!DOCTYPE html>
<html lang="pt">
<head>
	<title>Benchking</title>

      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      
      <meta name="description" content="Benchking tem como objetivo mostrar pontuações de benchmarks e as últimas noticias do mundo do hardware" />
      <meta name="keywords" content="benchmark, hardware, software, news, bench" />
      <meta name="author" content="Benchking" />
      <!-- Favicon icon -->
	  <link rel="icon" href="../img/icons/logo.png">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
      <!-- waves.css -->
      <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
      <!-- am chart export.css -->
      <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  </head>

  <body onload="setInterval('chat.update()', 1000)">


  <?php //Verificar se o utilizador está com o login efetuado e não acedeu a página diretamente
         include ('assets/php/login.php');

         if(isset($_SESSION['logged_in_admin'], $_SESSION['username_admin'])){


         $usuario_status = $_SESSION['logged_in_admin'];

         if ($usuario_status == 1) { 
    ?>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header">
              <div class="navbar-wrapper">
                  <div class="navbar-logo">
                      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                          <i class="ti-menu"></i>
                      </a>
                      <div class="mobile-search waves-effect waves-light">
                          <div class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control" placeholder="Enter Keyword">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <a href="index.php">
                        <img class="img-fluid" src="assets/images/logo.png" alt="Theme-Logo" />
                      </a>
                      <a class="mobile-options waves-effect waves-light">
                          <i class="ti-more"></i>
                      </a>
                  </div>
                
                  <div class="navbar-container container-fluid">
                      <ul class="nav-left">
                          <li>
                              <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                          </li>
                          <li class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </li>
                      </ul>
                      <ul class="nav-right">
                          <li class="user-profile header-notification">
                              <a href="#!" class="waves-effect waves-light">
                              <?php 
                                if(isset($_SESSION['logged_in_admin'], $_SESSION['username_admin'])){
                                    $username = $_SESSION['username_admin'];
                                    $usuario_status = $_SESSION['logged_in_admin'];

                                    if ($usuario_status) { 
                                        require_once ('assets/php/conexao_admin.php');
                                        
                                        $id = $_SESSION['id_admin'];

                                        $qry = mysqli_query($conn, "SELECT imagem FROM dc463jjk_benchking.admin WHERE id='$id'");
						                while($row = mysqli_fetch_assoc($qry)){
                                            if($row['imagem'] == ""){
                                                echo "<img class='img-radius' src='../Profiles/Imagens/default.png' alt='User-Profile-Image'>";
                                            }else{
                                                $nomeImg = $row['imagem'];
                                                echo "<img class='img-radius' src='assets/images/adminImages/".$nomeImg."' alt='User-Profile-Image'>";
                                            }
                                        }
                                    }
                                }
                                ?>
                                  <span><?php echo $username;?></span>

                                  <i class="ti-angle-down"></i>
                              </a>
                              <ul class="show-notification profile-notification">
                                  <li class="waves-effect waves-light">
                                      <a href="dashboardAdmin.php">
                                          <i class="ti-user"></i> Perfil
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="assets/php/logout_admin.php">
                                          <i class="ti-shift-left"></i> Sair
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>

          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                          <div class="main-menu-header">
                              <a href="index.php"><img class="img-80" src="../img/icons/logo.png" alt="User-Profile-Image"></a>
                          </div>
                          </div>
                          <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Layout</div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li class="active">
                                  <a href="index.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                          </ul>
                          <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Forms &amp; Tables</div>
                                                    <ul class="pcoded-item pcoded-left-item">
                              <li>
                                  <a href="bs-basic-table.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Tabelas</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>

                                  <a href="hardware.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Hardware</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>


                                  <a href="benchmarks.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Benchmarks</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>

                                  <a href="mensagens.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Mensagens</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>

                              </li>
        
                          </ul>
        
                          <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Chart &amp; Maps</div>
                          <ul class="pcoded-item pcoded-left-item">

                              <li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Paginas</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                      <li class=" ">
                                          <a href="auth-normal-sign-in.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Login Admin</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
        
                          </ul>
        
                         
                  </nav>
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Dashboard</h5>
                                          <p class="m-b-0">Painel de admin do Benchking</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.php"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                        <a href="../index.php" class="pagina-inicial">Página inicial Benchking</a> 
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h6 class="text-muted m-b-0">Membros registados</h6>
                                                                <br>
                                                                <?php
                                                                    require_once ('../PHP/conexao.php');

                                                                    $members = "SELECT id FROM dc463jjk_benchking.register ORDER BY id";
                                                                    $members_run = mysqli_query($conn, $members);

                                                                    $row = mysqli_num_rows($members_run);   

                                                                ?>
                                                                <h4 class="text-c-purple"><?php echo $row; ?></h4>

                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-users f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-purple">
                                                        <div class="row align-items-center">
                                                            <div class="col-12">
                                                                <p class="text-white m-b-0 text-center">Unidade</p>
                                                            </div>
                                                        </div>
            
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h6 class="text-muted m-b-0">Visitas</h6>
                                                                <br>
                                                                <?php
                                                                    require_once ('../PHP/conexao.php');

                                                                    $visitors = "SELECT id FROM dc463jjk_benchking.counter_table ORDER BY id";
                                                                    $visitors_run = mysqli_query($conn, $visitors);

                                                                    $row_visitors = mysqli_num_rows($visitors_run);   

                                                                ?>
                                                                <h4 class="text-c-green"><?php echo $row_visitors; ?></h4>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-eye f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-green">
                                                        <div class="row align-items-center">
                                                            <div class="col-12">
                                                                <p class="text-white m-b-0 text-center">Unidade</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h6 class="text-muted m-b-0">Downloads</h6>
                                                                <br>
                                                                <?php
                                                                    require_once ('../PHP/conexao.php');

                                                                    $downloads = "SELECT id FROM dc463jjk_benchking.downloads ORDER BY id";
                                                                    $downloads_run = mysqli_query($conn, $downloads);

                                                                    $row_downloads = mysqli_num_rows($downloads_run);   

                                                                ?>
                                                                <h4 class="text-c-blue"><?php echo $row_downloads; ?></h4>

                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-download f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-blue">
                                                        <div class="row align-items-center">
                                                            <div class="col-12">
                                                                <p class="text-white m-b-0 text-center">Unidade</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h6 class="text-muted m-b-0">Data</h6>
                                                                <br>
                                                                <?php
                                                                    $datenow = getdate();

                                                                    date_default_timezone_set("Europe/London");
                                                                ?>
                                                                <h4 class="text-c-red"><?php echo $datenow['mday'] . '/'; echo $datenow['mon'] . '/'; echo $datenow['year'];?></h4>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <h6 class="text-muted m-b-0">Hora</h6>
                                                                <br>

                                                                <h4 class="text-c-red"><?php print date('H:i'); $var = date('H:i');?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-red">
                                                        <div class="row align-items-center">
                                                            <div class="col-12">
                                                                <p class="text-white m-b-0 text-center">Data e Hora</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
							                    <h2>Comentarios do Chat</h2>
						                    </div>

						                    <div class="col-sm-12" style="border: 1px solid grey; max-width: 500px;">
							                    <object data="../Chat/chat.txt">Not supported</object>
						                    </div>

                                            <!-- task, page, download counter  end -->
    
                                           
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php }} else {?>

        <h5>You are NOT allowed to access this area</h5>

    <?php } ?>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
    <![endif]-->
    <!-- Warning Section Ends -->
    
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="assets/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="assets/js/SmoothScroll.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="assets/js/chart.js/Chart.js"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="assets/pages/widget/amchart/gauge.js"></script>
    <script src="assets/pages/widget/amchart/serial.js"></script>
    <script src="assets/pages/widget/amchart/light.js"></script>
    <script src="assets/pages/widget/amchart/pie.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="assets/js/script.js "></script>
</body>

</html>
