<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Blog Single | Corlate</title>

        <!-- core CSS -->

        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/dataTables.bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
        <link href="{{asset('css/datepicker.css')}}" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       

        <link rel="shortcut icon" href="{{asset('images/ico/favicon.ico')}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('images/ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('images/ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('images/ico/apple-touch-icon-72-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{asset('images/ico/apple-touch-icon-57-precomposed.png')}}">
    </head><!--/head-->

    <body>

        <header id="header">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-xs-4">
                            <div class="top-number"><p><i class="fa fa-phone-square"></i>  +0123 456 70 90</p></div>
                        </div>
                        <div class="col-sm-6 col-xs-8">
                            @include('layout.social');
                        </div>
                    </div>
                </div><!--/.container-->
            </div><!--/.top-bar-->

            @include('layout.navbar');
        </header><!--/header-->


        <!--Usar como modelo -->
        <section id="content" style="background: rgba(52, 99, 236,0.5) <?php echo 'url('.asset('images/slider/home.jpg').')' ?>;margin-top: -22px;height: 689px;">
            <div class="container">
                <div class="row wow fadeInDown">

                </div><!--/.row-->
            </div><!--/.container-->
        </section><!--/#content-->
        <div id="modallogin" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="background: rgba(52, 99, 236,0.5)">
                     <form data-toggle="validator" role="form" method="post" action="/login">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><span class="label label-default">Formulário de Entrada</span></h4>
                            </div>
                            <div class="modal-body">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon3">Login</span>
                                    <input type="text" name="username" class="form-control" id="login" placeholder="Login" aria-describedby="sizing-addon3" required />
                                </div>
                                <br>
                                <br>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon3">Password</span>
                                    <input type="password" name="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" aria-describedby="sizing-addon3" required />
                                </div>
                                <br>
                                <div class="alert alert-danger alert-dismissible collapse" role="alert" id="Error">
                                    <strong>Combinação Errada!</strong> A combinação digitada não é reconhecida !!!
                                </div>

                                <div class = "row">
                                    <h6>
                                        <span class="col-sm-offset-7">Nao sei a password ?</span>
                                        <span class="label label-warning" ><a data-toggle="modal" href="index.php/send_password">Enviar Password</a></span>
                                    </h6>
                                </div>
                            </div>    
                            <div class="modal-footer">
                                <div class = "row">
                                    <span class="col-sm-2 pull-left"><button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button></span>
                                    <span class="col-sm-10 pull-right"><button type="submit" class="btn btn-primary">Acesso</button></span>
                                </div>   
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
            </div>
        </div>

        <footer id="footer" class="midnight-blue">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        &copy; <?php echo date('Y'); ?> <a href="javascript:void();">X-Coder</a>. Todos os direitos reservados.
                    </div>
                    <div class="col-sm-6">
                        <ul class="pull-right">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer><!--/#footer-->

        <script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
        <script src="{{asset('js/jquery.isotope.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
        <script src="{{asset('js/wow.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.file-input.js')}}"></script>
        <?php echo $modallogin; ?>
        <?php echo $erro; ?>


   
    </body>
</html>

