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
    <body>
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
        <!--/header--><section id="portfolio">
            <div class="container">
                <ul class="portfolio-filter text-center">
                    <li><a class="btn btn-default active" href="#" data-filter="*">Todos os Mêses</a></li>
                    <li><a class="btn btn-default" href="#" data-filter=".primeiro">1º Trimestre</a></li>
                    <li><a class="btn btn-default" href="#" data-filter=".segundo">2º Trimestre</a></li>
                    <li><a class="btn btn-default" href="#" data-filter=".terceiro">3º Trimestre</a></li>
                    <li><a class="btn btn-default" href="#" data-filter=".quarto">4º Trimestre</a></li>
                </ul><!--/#portfolio-filter-->

                <div class="row">
                    <div class="portfolio-items">
                        
                        <div class="portfolio-item primeiro col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <img class="img-responsive" src="{{asset('images/portfolio/full/janeiro.png')}}" alt="" />
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <p>Despesas de Janeiro</p>
                                        <p>Despesas relativas ao mes de Janeiro</p>
                                        <a class="preview" href="meses/janeiro"><i class="fa fa-eye"></i>View</a>
                                    </div> 
                                </div>
                            </div>
                        </div><!--/.portfolio-item-->

                        <div class="portfolio-item segundo col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <img class="img-responsive" src="{{asset('images/portfolio/full/abril.png')}}" alt="" />
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <p>Despesas de Abril</p>
                                        <p>Despesas relativas ao mes de Abril</p>
                                        <a class="preview" href="meses/abril" ><i class="fa fa-eye"></i> View</a>
                                    </div> 
                                </div>
                            </div>           
                        </div><!--/.portfolio-item-->

                        <div class="portfolio-item terceiro col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <img class="img-responsive" src="{{asset('images/portfolio/full/julho.png')}}" alt="" />
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <p>Despesas de Julho</p>
                                        <p>Despesas relativas ao mes de Julho</p>
                                        <a class="preview" href="meses/julho" ><i class="fa fa-eye"></i> View</a>
                                    </div> 
                                </div>
                            </div>          
                        </div><!--/.portfolio-item-->
                        
                        
                         <div class="portfolio-item quarto col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <img class="img-responsive" src="{{asset('images/portfolio/full/outubro.png')}}" alt="" />
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <p>Despesas de Outubro</p>
                                        <p>Despesas relativas ao mes de Outubro</p>
                                        <a class="preview" href="meses/outubro" ><i class="fa fa-eye"></i> View</a>
                                    </div> 
                                </div>
                            </div>          
                        </div><!--/.portfolio-item-->
                        
                        <div class="portfolio-item primeiro col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <img class="img-responsive" src="{{asset('images/portfolio/full/fevereiro.png')}}" alt="" />
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <p>Despesas de Feverreiro</p>
                                        <p>Despesas relativas ao mes de Fevereiro</p>
                                        <a class="preview" href="meses/fevereiro"><i class="fa fa-eye"></i>View</a>
                                    </div> 
                                </div>
                            </div>          
                        </div><!--/.portfolio-item-->
                        
                            
                        <div class="portfolio-item segundo col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <img class="img-responsive" src="{{asset('images/portfolio/full/maio.png')}}" alt="" />
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <p>Despesas de Maio</p>
                                        <p>Despesas relativas ao mes de Maio</p>
                                        <a class="preview" href="meses/maio"><i class="fa fa-eye"></i> View</a>
                                    </div> 
                                </div>
                            </div>      
                        </div><!--/.portfolio-item-->
                        
                        
                        <div class="portfolio-item terceiro col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <img class="img-responsive" src="{{asset('images/portfolio/full/agosto.png')}}" alt="" />
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <p>Despesas de Agosto</p>
                                        <p>Despesas relativas ao mes de Agosto</p>
                                        <a class="preview" href="meses/agosto" ><i class="fa fa-eye"></i> View</a>
                                    </div> 
                                </div>
                            </div>          
                        </div><!--/.portfolio-item-->
                        
                        <div class="portfolio-item quarto col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <img class="img-responsive" src="{{asset('images/portfolio/full/novembro.png')}}" alt="" />
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <p>Despesas de Novembro</p>
                                        <p>Despesas relativas ao mes de Novembro</p>
                                        <a class="preview" href="/meses/novembro"><i class="fa fa-eye"></i> View</a>
                                    </div> 
                                </div>
                            </div>          
                        </div><!--/.portfolio-item-->

                        <div class="portfolio-item primeiro col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <img class="img-responsive" src="{{asset('images/portfolio/full/marco.png')}}" alt="" />
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <p>Despesas de Março</p>
                                        <p>Despesas relativas ao mes de Março</p>
                                        <a class="preview" href="meses/marco" ><i class="fa fa-eye"></i> View</a>
                                    </div> 
                                </div>
                            </div>        
                        </div><!--/.portfolio-item-->
                        
                        <div class="portfolio-item segundo col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <img class="img-responsive" src="{{asset('images/portfolio/full/junho.png')}}" alt="" />
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <p>Despesas de Junho</p>
                                        <p>Despesas relativas ao mes de Junho</p>
                                        <a class="preview" href="meses/junho" ><i class="fa fa-eye"></i> View</a>
                                    </div> 
                                </div>
                            </div>         
                        </div><!--/.portfolio-item-->
                        
                        <div class="portfolio-item terceiro col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <img class="img-responsive" src="{{asset('images/portfolio/full/setembro.png')}}" alt="" />
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <p>Despesas de Setembro</p>
                                        <p>Despesas relativas ao mes de Setembro</p>
                                        <a class="preview" href="meses/setembro" ><i class="fa fa-eye"></i> View</a>
                                    </div> 
                                </div>
                            </div>          
                        </div><!--/.portfolio-item-->

                        <div class="portfolio-item quarto col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <img class="img-responsive" src="{{asset('images/portfolio/full/dezembro.png')}}" alt="" />
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <p>Despesas de Dezembro</p>
                                        <p>Despesas relativas ao mes de Dezembro</p>
                                        <a class="preview" href="meses/dezembro" ><i class="fa fa-eye"></i>View</a>
                                    </div> 
                                </div>
                            </div>          
                        </div><!--/.portfolio-item--> 
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <a href="gastosmensais/fecharano" class="btn btn-primary">Fechar Ano</a>
                </div>  
            </div>
        </section><!--/#portfolio-item-->
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
        <script src="{{asset('js//bootstrap.min.js')}}"></script>
        <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
        <script src="{{asset('js/jquery.isotope.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
        <script src="{{asset('js/wow.min.js')}}"></script>
        <script src="{{asset('js/jquery.dataTables.js')}}"></script>
        <script src="{{asset('js/dataTables.bootstrap.js')}}"></script>
        <script src="{{asset('js/dataTables.responsive.js')}}"></script>
        <script src="{{asset('js/responsive.bootstrap.js')}}"></script>
        <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
        <script type="text/javascript">$(document).ready(function () {
                var table = $('#example').DataTable({
                    "paging": false,
                    "info": false,
                    "scrollX": true,
                    "scrollY": '50vh',
                    "scrollCollapse": true,
                });
               $('.datepicker').datepicker();

            });
        </script>
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
