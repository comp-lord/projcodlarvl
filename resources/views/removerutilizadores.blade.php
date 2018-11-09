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
                            <div class="top-number"><p><i class="fa fa-phone-square"></i>+0123 456 70 90</p></div>
                        </div>
                        <div class="col-sm-6 col-xs-8">
                            @include('layout.social');
                        </div>
                    </div>
                </div><!--/.container-->
            </div><!--/.top-bar-->

            @include('layout.navbar');
        </header><!--/header-->
        <section  class="container">    
            <div>
                <h2 style="color:rgba(52, 99, 236,0.5)">Remover Perfis de Utilizadores</h2>
                <p style="color: #C52D2F">Remover Utilizadores com a imagem <img style="height:20px"src="{{asset('images/gallery/remover.png')}}" /></p>           
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="center" style="color: blueviolet">Foto-Retrato</th>
                            <th class="center" style="color: blueviolet">Nome</th>
                            <th class="center" style="color: blueviolet">Sobrenome</th>
                            <th class="center" style="color: blueviolet">Email</th>
                            <th class="center" style="color: blueviolet">Remover</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="center"><img style="height:50px;width:100px;" src="data:image/jpeg;base64,<?php echo $user->fotografia ?>"  /></td>
                            <td class="center">{!! $user->nome !!}</td>
                            <td class="center">{!! $user->sobrenome !!}</td>
                            <td class="center">{!! $user->username !!}</td>
                            <td class="center"><a href="#" onclick="removeuser('{{$user->username}}')" data-toggle="modal" data-target="#exampleModal" ><img style="height:50px;width:50px" src="{{asset('images/gallery/remover.png')}}" /></a></td>
                        </tr>
                        @endforeach           
                    </tbody>
                </table>
            </div>
            <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background: rgba(52, 99, 236,0.5)">
                        <div class="modal-header">
                            <h5 class="modal-title"><span class="label label-default">Remoção de Utilizadores</span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p style='color:white'>Pretende remover o utilizador <u id='utilizador'></u></p>
                        </div>
                        <div class="modal-footer" id="modal-footer">
                            
                            <button type="button" data-dismiss="modal" class="btn btn-primary">Cancelar</button
                        </div>
                    </div>
                </div>
            </div>
        </section>    
        <footer id="footer" class="midnight-blue">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        &copy; {!!date('Y')!!}; ?> <a href="javascript:void();">X-Coder</a>. Todos os direitos reservados.
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
        <script>
            function removeuser(user) {
                var u = document.getElementById("utilizador"); 
                //Inserindo o texto dentro da Div:
                u.innerHTML = user; 
                var a = document.createElement("a");
                a.setAttribute('class', 'btn btn-primary');
                a.setAttribute('href', '/removerutilizador/remover/'+user);
                var texto = document.createTextNode("Remover");
                a.appendChild(texto);
                document.getElementById("modal-footer").appendChild(a);
            }

        function remove() {

            $("#dropdown.dropdown-menu").css("display", "block");
        }
        </script>
        <script>
            function set() {

                $("#dropdown.dropdown-menu").css("display", "none");
            }
        </script>
    </body>
</html>
