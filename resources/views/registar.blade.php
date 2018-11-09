<html>
    <head>
       
 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Registar Utilizador</title>

        <!-- core CSS -->
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
        <section id="content">
            <div class="container">
                <div class="center">
                    <h2>Registar</h2>
                    <img src="{{asset("images/gallery/registo.png")}}" />
                    <p class="lead">Página de Contactos</p>
                </div>
                <div class="row wow fadeInDown">
                    <div class="center col-md-6">
                        <h2>Fotografia de perfil</h2>
                        <div class="row">
                            <img style="width:150px;height:150px;" class="img-responsive img-thumbnail" src="data:image/jpeg;base64,<?php echo $fotoregisto ?>" />


                            <form action="/uploadfotoregisto" method="post">
                                <input class="btn btn-primary" type="submit" value="Inserir Imagem" name="buttonimagem" id="buttonimagem"/>    
                                {{ csrf_field() }}
                            </form>

                        </div>

                    </div>
                    <form id="registerform" method="post" action="/registar" >
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                            
                                <br>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon3">Nome</span>
                                    <input type="text" class="form-control" value="{{$nome}}" name="nome" id="nome" placeholder="Nome" aria-describedby="sizing-addon3" required />
                                </div>
                                <br>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon3">Sobrenome</span>
                                    <input type="text" class="form-control" value="{{$sobrenome}}" name="sobrenome" id="sobrenome" placeholder="Sobrenome" aria-describedby="sizing-addon3" required />
                                </div>
                                <br>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon3">Data de Nascimento</span>
                                    <input type="text" class="form-control" value="{{$datanascimento}}" name="datanascimento" id="datanascimento" placeholder="Data de Nascimento" aria-describedby="sizing-addon3" required />
                                </div>
                                <br>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon3">Sexo</span>
                                    <input type="text" class="form-control" value="{{$sexo}}" name="sexo" id="sexo" placeholder="Sexo" aria-describedby="sizing-addon3" required />
                                </div>
                                <br>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon3">Habilitações</span>
                                    <input type="text" class="form-control" value="{{$habilitacoes}}" name="habilitacoes" id="habilitacoes" placeholder="Habilitações" aria-describedby="sizing-addon3" required />
                                </div>                               
                                <br>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon3">Login</span>
                                    <input type="email" class="form-control" value="{{$username}}" name="username" id="password"  placeholder="Nome de Utilizador" aria-describedby="sizing-addon3" required>
                                    {!! $msguserexists !!}
                                </div>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon3">Password</span>
                                    <input type="password" class="form-control" value="{{$confirmacao}}" name="password" id="password"  placeholder="Password" aria-describedby="sizing-addon3" required>
                                </div>
                                <br>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon3">Confirmação</span>
                                    <input type="password" class="form-control" value="{{$confirmacao}}" name="confirmacao" id="confirmacao" placeholder="Confirmação" aria-describedby="sizing-addon3" required>
                                </div>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <br>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon3">NiB 1</span>
                                    <input type="text" class="form-control" value="{{$nib1}}" name="nib1" id="nib1" placeholder="Numero de identificação Bancária Nib1" aria-describedby="sizing-addon3" required />
                                </div>
                                <br>    
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon3">NiB 2</span>
                                    <input type="text" class="form-control" value="{{$nib2}}" name="nib2" id="nib2" placeholder="Numero de Identificação Bancária Nib2" aria-describedby="sizing-addon3" required />
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-md-6">
<?php $action = '/'; ?>
                                <a href="{{$action}}" class="btn btn-primary pull-left" role="button">Home</a></span>
                            </div>
                            <div class="col-md-6 col-md-6">
                                <button type="submit" class="btn btn-primary pull-right">Guardar</button>    
                            </div>
                        </div>
                        <br>
                        <div class="row" >
                            <div class="col-md-12 col-xs-12" id="message">
                                <div class="alert alert-danger alert-dismissible collapse" role="alert" id="Error">
                                    <strong>O registo não foi efetuado!</strong> A Password e a Confirmação não são iguais. Digite novamente !!!
                                </div>  
                            </div>
                            <div class="col-md-12 col-xs-12" id="messagesuccess">
                                <div class="alert alert-success alert-dismissible collapse" role="alert" id="Successkeys">
                                    <strong>O registo foi efetuado com successo</strong> A Password e a Confirmação coeincidem !!!
                                </div>  
                            </div>    
                        </div>
                        {{ csrf_field() }}
                    </form> 
                </div><!--/.row-->
            </div><!--/.container-->
        </section><!--/#content-->
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
        <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
        <script type="text/javascript">$('input[type=file]').bootstrapFileInput();
            $('.file-inputs').bootstrapFileInput();</script>

        <script>
            $(function () {
                $(".datepicker").datepicker(({dateFormat: 'yy-mm-dd'}));
            });
        </script>

{{$success;}}
{{$erro;}}
{{$msguserexists;}}
    </body>
</html>