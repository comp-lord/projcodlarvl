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
            <div class="container" >
                <div class="row wow fadeInDown">

                </div><!--/.row-->
            </div><!--/.container-->
        </section><!--/#content-->
        <div id="modalupload" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="background: rgba(52, 99, 236,0.5)">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="center col-md-12 " style='height:50px;'>
                            <h3 class="text-danger">Inserir foto de registo</h3>
                        </div>
                        <div class = "row">
                            <div class="center col-xs-12 col-sm-12 col-md-12" style="height:200px">
                                <div class="row">
                                    <img style="width:150px;height:150px;" class="img-responsive img-thumbnail" src="data:image/jpeg;base64,{{$fotoregisto}}" />
                                </div>
                                <form action="/uploadfotoregisto/do_upload" method="post" enctype="multipart/form-data">
                                    <label class="btn btn-primary btn-file">
                                        Seleccionar Foto <input type="file" name="userfile" style="display: none;">
                                    </label>

                                    <input class="btn btn-primary" type="submit" value="Guardar Foto" <?php echo $disabled ?>/>    
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>                    
                    </div>    
                    <div class="modal-footer">
                        <div class = "row">
                            <span class="col-sm-2 pull-right"><a href="/registar" type="button" class="btn btn-primary">Feito</a></span>
                        </div>   
                    </div>
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
        <?php echo $modalupload ?>
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

