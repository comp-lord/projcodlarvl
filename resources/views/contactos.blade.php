<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Sergio Araujo">
        <meta name="description" content="codigo, php, mysql, bootstrap 3"/>
        <meta name="keywords" content="Music Videos, News, Photos, Tour Dates"/>
        <title>Home</title>

        <!-- core CSS -->
        <!--colocar asset-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body class="homepage">
        <header id="header">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-1 col-sm-6 col-xs-4 col-lg-6">
                            <div class="top-number"><p><i class="fa fa-phone-square"></i>+253 034 036</p></div>
                        </div>
                        <div class="col-sm-6 col-xs-8">
                            @include('layout.social');
                        </div>
                    </div>
                </div><!--/.container-->
            </div><!--/.top-bar-->
            @include('layout.navbar')
        </header><!--/header-->

        <div id="modallogin" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-content">
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
        </div>
        <section id="content">
            <div class="container">
                <div class="center">
                    <h2>Contactos</h2>
                    <img src="{{asset("images/gallery/email.png")}}" />
                    <p class="lead">Página de Contactos</p>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wow fadeInDown center">
                        <div class="col-sm-6 wow"><div class="row" >
                                <div class="col-md-12 col-xs-12" id="messagesuccess">
                                    <div class="alert alert-success alert-dismissible collapse" role="alert" id="Successkeys">
                                        <strong>O e-mail foi enviado com successo</strong>
                                    </div>  
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
             <form method="post" name="sentMessage" id="contactForm" data-toggle="validator" action="{{$action}}">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <br>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" id="sizing-addon3">Nome</span>
                            <input type="text" class="form-control" name="username" id="nome" placeholder="Nome" aria-describedby="sizing-addon3" required />
                        </div>
                        <br>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon" id="sizing-addon3">E-Mail</span>
                            <input type="text" class="form-control" name="email" id="sobrenome" placeholder="E-Mail" aria-describedby="sizing-addon3" required />
                        </div>
                        <br>
                        <div class="form-groupp form-group-sm">
                            <label class="form-group" id="sizing-addon3">Mensagem</label>
                            <textarea rows="10" cols="100" class="form-control" 
                                      placeholder="Mensagem" name="menssagem" data-validation-required-message="Insira a Mensagem" minlength="5" 
                                      data-validation-minlength-message="Min 5 characters" 
                                      maxlength="999" required style="resize:none"></textarea>
                        </div>
                        <?php
                        /* echo $success_message[0]; */
                        ?>    

                        <button type="submit" class="btn btn-primary pull-right">Enviar</button><br />

                    </div>
                </div>
                {{ csrf_field() }}
            </form>
        </section><!--/#contact-page-->

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
        {{$success}}
    </body>
</html>