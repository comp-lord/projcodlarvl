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
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet">

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
    <body class="homepage">
        <header id="header">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-xs-6 ">
                            <div class="top-number"><p><i class="fa fa-phone-square"></i>+351 253 034 036</p></div>                                               
                        </div>  
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            @include('layout.social')
                        </div>
                    </div>
                </div>
            </div>
            @include('layout.navbar')
        </header><!--/header-->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{asset('images/slider/home.jpg')}}"/>
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('images/slider/home1.jpg')}}" alt=""/>
                    <div class="carousel-caption">


                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('images/slider/home2.jpg')}}" alt=""/>
                    <div class="carousel-caption">
                        <h3>...</h3>

                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('images/slider/home3.jpg')}}" alt=""/>
                    <div class="carousel-caption">

                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Seguinte</span>
            </a>
        </div>
        <section id="services" class="service-item">
            <div class="container">
                <div class="center wow fadeInDown">
                    <h2>Este Site. Conteúdo e Sugestões.</h2>
                </div>

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <div class="media services-wrap wow fadeInDown">
                            <div class="pull-left">
                                <div class="feature-wrap">
                                   <img class="img-responsive" src="{{asset('images/gallery/qualidade.png')}}">
                                </div>    
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Gostos</h3>
                                <p>Ligação entre o que agrada e o que menos se envolve. Definição dos engrados com qualidade.<br></br></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <div class="media services-wrap wow fadeInDown">
                            <div class="pull-left">
                                <img class="img-responsive" src="{{asset('images/services/services2.png')}}">
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Pontualidade</h3>
                                <p>A tempo do agendado procura-se cumprir dentro do previsto os respetivos prazos e objetivos que são algumas metas criteriadas no dia-a-dia e que merecem ser alcançadas.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <div class="media services-wrap wow fadeInDown">
                            <div class="pull-left">
                                <img class="img-responsive" src="{{asset('images/services/services3.png')}}">
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Planeamento</h3>
                                <p>A elaboração de projetos é criteriosamente planeada com recursos a elementos teóricos e técnicos capazes de prover os melhores resultados.</p>
                            </div>
                        </div>
                    </div>  

                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <div class="media services-wrap wow fadeInDown">
                            <div class="pull-left">
                                <img style="width:50px;height:50px;" class="img-responsive" src="{{asset('images/services/services4.png')}}">
                            </div> 
                            <div class="media-body">
                                <h3 class="media-heading">O Foco</h3>
                                <p>Um lar com recursos e auxilios à sua manutenção é de certeza uma garantia de qualidade na habitação e ambiente.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <div class="media services-wrap wow fadeInDown">
                            <div class="pull-left">
                                <img class="img-responsive" src="{{asset('images/services/services5.png')}}">
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">A tecnologia</h3>
                                <p>A nossa tecnologia é elaborada e adquirida como parte de um sistema apelativo e útil para o quotidiano.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <div class="media services-wrap wow fadeInDown">
                            <div class="pull-left">
                                <img class="img-responsive" src="{{asset('images/services/services6.png')}}">
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">A sustentação</h3>
                                <p>Processo de tranquilidade e sustentabilidade económica como equilibrio, bem-estar e conforto para o dia a dia e da sua habitacao.</p>
                            </div>
                        </div>
                    </div>                                                
                </div><!--/.row-->
            </div><!--/.container-->
        </section><!--/#services-->

        <footer id="footer" class="midnight-blue">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        &copy; <?php echo date('Y'); ?> <a href="javascript:void();">X-Coder</a>. Todos os direitos reservados.
                    </div>
                    <div class="col-sm-4 text-center">
                        <img style="width:50px;height:50px" src="{{asset('images/ico/nero.png')}}"/>
                    </div>
                    <div class="col-sm-4">
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
        <script>
     function remove(){
         
     $("#dropdown.dropdown-menu").css("display","block");
 }
 </script>
  <script>
     function set(){
         
     $("#dropdown.dropdown-menu").css("display","none");
 }
 </script>

    </body>
</html>