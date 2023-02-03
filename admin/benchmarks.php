<!DOCTYPE html>
<html lang="pt">

<head>
    <title> Benchking </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
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
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
</head>

<body>
    <!-- Pre-loader start -->
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php //Verificar se o utilizador está com o login efetuado e não acedeu a página diretamente
    include('assets/php/login.php');

    if (isset($_SESSION['logged_in_admin'], $_SESSION['username_admin'])) {


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
                                            if (isset($_SESSION['logged_in_admin'], $_SESSION['username_admin'])) {
                                                $username = $_SESSION['username_admin'];
                                                $usuario_status = $_SESSION['logged_in_admin'];

                                                if ($usuario_status) {
                                                    require_once('assets/php/conexao_admin.php');

                                                    $id = $_SESSION['id_admin'];

                                                    $qry = mysqli_query($conn, "SELECT imagem FROM dc463jjk_benchking.admin WHERE id='$id'");
                                                    while ($row = mysqli_fetch_assoc($qry)) {
                                                        if ($row['imagem'] == "") {
                                                            echo "<img class='img-radius' src='../Profiles/Imagens/default.png' alt='User-Profile-Image'>";
                                                        } else {
                                                            $nomeImg = $row['imagem'];
                                                            echo "<img class='img-radius' src='assets/images/adminImages/".$nomeImg."' alt='User-Profile-Image'>";                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                            <span><?php echo $username; ?></span>
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
                                <div class="sidebar_toggle"><a href="#"></a></div>
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
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Paginas</span>
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
                                                    <h5 class="m-b-10">Benchmarks</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="index.php"> <i class="fa fa-home"></i> </a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Benchmarks</a>
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
                                            <!-- Page-body start -->
                                            <div class="page-body">
                                                <!-- Basic table card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Benchmarks</h5>

                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalBench" style="margin-left: 45px;">Adicionar Benchmark</button>

                                                        <?php if (isset($_GET['erro'])) { ?>
                                                            <div class="mensagem_error"><?php echo $_GET['erro']; ?></div>
                                                        <?php } ?>


                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalBench" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Inserir Benchmark</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form name="form-benchmark" class="form-benchmark" action="assets/php/phpBenchmark/registerBENCHMARK.php" method="POST" enctype="multipart/form-data">

                                                                            <input type="text" name="inputLink" class="form-control" placeholder="Link">


                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                        <button type="submit" name="enviar-benchmark" class="btn btn-primary">Salvar</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-trash close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block table-border-style">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Link</th>
                                                                        <th>Editar</th>
                                                                        <th>Eliminar</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    require_once('../PHP/conexao.php');
                                                                    $sql_benchmark = "SELECT id, link FROM dc463jjk_benchking.benchmark";
                                                                    $result = $conn->query($sql_benchmark);
                                                                    if ($result->num_rows > 0) {
                                                                        // output data of each row
                                                                        while ($rows = $result->fetch_assoc()) {
                                                                            echo "<tr>";
                                                            
                                                                            $url = "https://www.youtube.com/embed/" . $rows['link'];
                                                                            echo "<td><iframe class='resp-container' id='resp-container' src='" . $url . "' allowfullscreen></iframe></td>";


                                                                            echo "<div class='btn-group'>"; ?>
                                                                            <td><a class="btn btn-dark text-light" data-toggle="modal" type="button" data-target="#update_modalBench<?php echo $rows['id'] ?>">Editar</a></td>
                                                                            <div class="modal fade" id="update_modalBench<?php echo $rows['id'] ?>" aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <form method="POST" action="assets/php/crud/updateBench.php">
                                                                                            <div class="modal-header">
                                                                                                <h3 class="modal-title">Editar V&iacute;deo</h3>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <div class="col-md-2"></div>
                                                                                                <div class="col-md-8">
                                                                                                    <div class="form-group">
                                                                                                        <label>Link</label>
                                                                                                        <input type="hidden" name="bench_id" value="<?php echo $rows['id'] ?>" />
                                                                                                        <input type="text" name="inputLink" value="<?php echo $rows['link'] ?>" class="form-control" required="required" />
                                                                                                        <iframe class="resp-container iframe" id="resp-container iframe" src="<?php echo $url?>"></iframe>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div style="clear:both;"></div>
                                                                                            <div class="modal-footer">
                                                                                                <button name="updateBench" class="btn btn-warning">Atualizar</button>
                                                                                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                                                                                            </div>
                                                                                    </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                        </div>

                                                <?php
                                                                            echo "<td>";
                                                                            echo "<a class='btn btn-danger' href='assets/php/crud/deleteBench.php?id=" . $rows['id'] . "'>Eliminar</a>";
                                                                            echo "</div>";
                                                                            echo "<td>";
                                                                            echo "</tr>";
                                                                        }
                                                                    }
                                                ?>


                                                </tbody>
                                                </table>
                                                    </div>
                                                </div>
                                            </div>



                                            <!-- Background Utilities table end -->
                                        </div>
                                        <!-- Page-body end -->
                                    </div>
                                </div>
                                <!-- Main-body end -->

                                <div id="styleSelector">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        <?php }
    } else { ?>

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
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js "></script>
    <!-- Custom js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical-layout.min.js "></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>


    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>

</html>