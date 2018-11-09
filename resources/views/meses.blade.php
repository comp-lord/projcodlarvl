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
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
        <style>
        table, th, td {
            border: 3px solid black;
        }</style>
    </head><!--/head-->

    <body>
        <header id="header">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-xs-6">
                            <div class="top-number"><p><i class="fa fa-phone-square"></i>+351 934 585 978</p></div>
                        </div>
                        <div class="col-sm-6 col-xs-6 col-md-6">
                            @include('layout.social');
                        </div>
                    </div>
                </div><!--/.container-->
            </div><!--/.top-bar-->
            @include('layout.navbar')
        </header><!--/header-->

        <section id="portfolio">
            <div class="container">
                <div class="center">
                <h2><u>{{$mes}}</u></h2>
                </div>
                <div class="center">
                    @if($fechames)
                        {{null}}
                    @else
                        <img src="{{asset('images/fechado.jpg')}}">
                    @endif
                </div>
                <form data-toggle="validator" role="form" action="meses/{{$mes}} " id="formgastos" name="formgastos" method="post">
                    <table id="example" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%" style="border: rgba(52, 99, 236,0.5)">
                        <thead>
                            <tr>
                                <th>Gasto Nº</th>
                                <th>Gasto</th>
                                <th>Designação Gasto</th>
                                <th class="text-center">Data</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                           
                            @for ($i = 0; $i < $elementosgastos; $i++) 
                                <tr><td style="width:2%;">{{$i + 1}}</td><td style="width:10%"><input type="number" oninput="botao_on()" id = "gastos{{$i}}"  name = "gastos{{$i}}" value = "{{$gastosmensais[$mes]['gasto'][$i]}}" step="0.01" min="0"  /></td>
                                <td style="width:10%"><select onchange="botao_on()" name = "selected{{$i}}">
                                @php ($indx = 0)
                                @php ($selected='')
                                @for ($k = 0; $k < $elementosdesignacao; $k++)
                                    <optgroup label = "{{$designacao['designacao'][$k]}}">{{$designacao['designacao'][$k]}}</optgroup>
                                    @php ($counted_id_designacao = $pagamentos['id_designacao'])
                                    @for ($j = 0; $j < $counted_id_designacao[$k + 1]; $j++)
                                        @if ($pagamentos['id_pagamento'][$indx] == $gastosmensais[$mes]['pagamento'][$i]) 
                                            @php ($selected = 'selected');
                                        @endif    
                                        <option value ="{{$pagamentos['pagamento'][$indx]}}">{{$pagamentos['pagamento'][$indx]}}></option>
                                        @php ($indx=$indx+1)
                                        @php ($selected='')
                                    @endfor
                                @endfor<?php 
                                $total = $total + $gastosmensais[$mes]['gasto'][$i];
                                echo '</select></td>' .
                                '<td class="text-center">                            
                                        <input onclick="botao_on()" name = "datepicker' . $i . '" class = "datepicker " size = "16" type = "text"   value="' . $gastosmensais[$mes]['data'][$i] . '" readonly/>
                                        
                                    </td>
                                    <td class="center">                            
     <img class="img-responsive" src="' . asset('images/delete.jpg') . '" width="25" height="25" onclick="apagar(this,'.$i.')"/></td>';
                            echo '</tr>';
                            echo '<br>';
                            ?>   
                             @endfor
                           <br>
                        </tbody>
                    </table>
                    <br>
           <div class="row">
                        <div class="col-sm-3 col-md-3 col-sm-offset-9 col-md-offset-9">

                            <table class="table table-striped table-bordered nowrap " cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="color:#c52d2f">Total</th>
                                    </tr>
                                </thead>
                                
                                <td class="text-center" style="font-weight: bold;">{{$total}}€</td>
                                </tbody>
                            </table>
                        </div>    
                    </div>
                    <div class = "row">
                        <div class = "col-md-6 col-sm-6 col-xs-6">
                            @if($flagravarTabela)<button id="botaogravar" type="submit" class="btn btn-primary" enabled>Gravar Tabela</button>@else <button id="botaogravar" type="submit" class="btn btn-primary" disabeld>Gravar Tabela</button>@endif
                                                           
                        </div>
                        <div class = "col-md-6 col-sm-6 col-xs-6">
                             @if($inserir_gasto)
                                <a href="{{asset('meses/' . $mes . '/true')}}" class="btn btn-primary pull-right" role="button" enabled>Inserir Gasto</a>
                            @else
                                <a href="{{asset('meses/' . $mes . '/true')}}" class="btn btn-primary pull-right" role="button" disabled>Inserir Gasto</a>
                            @endif    
                                
                        </div>
                        <div class = "col-md-6 col-sm-6 col-xs-6">
                        </div>
                        <div class = "col-md-6 col-sm-6 col-xs-6">
                            @if($fechames)
                                <a href="meses/{{$mes}}/fecharmes" id="fecharmes" class="btn btn-primary pull-right" role="button" enabled>&nbspFechar Mês&nbsp</a>
                            @else
                                <a href="meses/{{$mes}}/fecharmes" id="fecharmes" class="btn btn-primary pull-right" role="button" disabled>&nbspFechar Mês&nbsp</a>
                            @endif
                        </div>
                    </div
                    <input type = "hidden" name = "ival" value = "{{$elementosgastos}}" />
                     <input type = "hidden" id="delete" name = "delete" value = "" />
                </form><!--/.row-->

            </div>
        </section><!--/#portfolio-item-->

        <footer id="footer" class="midnight-blue">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        &copy; date('Y')<a href="javascript:void();">X-Coder</a>. Todos os direitos reservados.
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
        <script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
        <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
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
                    "info": true,
                    "scrollX": true,
                    "scrollY": '50vh',
                    "scrollCollapse": true
                });
                
                

                $('.datepicker').datepicker();

            });
        </script>
        <script>
            function apagar(a,id_post) {
                    var elem = document.getElementById('delete')
                    elem.value=id_post;
                    
                    $(a).closest("tr").remove();
                    $('#formgastos').submit();
                }
            function botao_on() {
                document.getElementById("botaogravar").disabled = false;
            }</script>
        @if ($opcao === 'fecharmes') {
            $this->gastos->insere_gasto_arquivo($mes, $this->session->userdata('username'));
             <script>document.getElementById("fecharmes").setAttribute("disabled", true);</script>
         @endif
         
    </body>
</html>