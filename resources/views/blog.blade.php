<?php

use App\categoria ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Sergio Araujo">
        <meta name="description" content="codigo, php, mysql, bootstrap 3"/>
        <meta name="keywords" content="Music Videos, News, Photos, Tour Dates"/>
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Home</title>

        <!-- core CSS -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
        <link href="{{asset('css/like.css')}}" rel="stylesheet">
        <link href="{{asset('css/scrollbar.css')}}" rel="stylesheet">
        <style>
            a:hover {
                color: rgba(52, 99, 236);
            }
            .file-input-name {
                width: 100%;
                float:right;
                position: relative;
                min-height: 1px;
                background-color: red;
                margin-left: px;
                margin-right:px;
                color: rgba(52, 99, 236);
            }
        </style>


        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="favicon.ico">
        

    </head><!--/head-->
    <body class="homepage">
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
        <section id="blog" class="container" style="border: solid;border-color: #020f44">
            <div class="center">
                <h2>Blog</h2>
                <img src="{{asset("images/gallery/blog.png")}}" />
                <p class="lead">Blog para Usuários e Visitantes</p>
            </div>
            <div class="blog">
                <div class="row">
                    <div class="col-md-8" style="border-right-style:dashed;border-color: rgba(52, 99, 236,0.5)">

                        <div class="scroll-pane" id="scrollbar">
                            <!--controladort de blog -->
                            {!!$blog!!}

                        </div>
                        <div class = "blog-item"><div class = "row">
                                <div class = "row"><div class = "col-md-3 col-xs-3 col-sm-3 col-xs-offset-1 col-sm-offset-2 col-md-offset-2"><a href = "/" class = "btn btn-primary" >Fechar</a></div><div class = "col-md-3 col-xs-3 col-sm-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3"><a class = "btn btn-primary" href = "{{asset('blog/novopost')}}">Nova Publicação</a></div></div>
                            </div></div>

                        <embed data="data:application/pdf;base64,<?php echo base64_encode($blob) ?>" type="application/pdf" style="height:200px;width:60%">
                    </div>

                    <aside class="col-md-4">
                        <div class="widget search">
                            <form role="form">
                                <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
                            </form>
                        </div><!--/.search-->

                        <?php /*
                          $this->bloglib->escrevercomments($id_publicacao); */
                        ?>


                        <div class="widget categories">
                            <h3>Categories</h3>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php /*
                                      $this->bloglib->escrevercategoria($id_publicacao);
                                     */ ?>
                                </div>
                            </div>                     
                        </div><!--/.categories-->

                        <div class="widget archieve">
                            <h3>Archieve</h3>
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php /*
                                      $this->bloglib->escreverarquivo();
                                     */ ?>
                                </div>
                            </div>                     
                        </div><!--/.archieve-->
                        <div class="widget tags">
                            <?php /*
                              $this->bloglib->escrevercloudtags();
                             */ ?>
                        </div><!--/.tags-->

                        <div class="widget blog_gallery">
                            <h3>Our Gallery</h3>
                            <ul class="sidebar-gallery">
<?php /* $this->bloglib->escreverpublicacaoGallery(); */ ?>
                            </ul>
                        </div><!--/.blog_gallery-->
                    </aside>  

                    <div id="Login" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-content">
                                    <form data-toggle="validator" role="form" method="post" action="<?php /* echo base_url() . 'index.php/home'; */ ?>">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><span class="label label-default">Bem Vindo, Login</span></h4>
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
                                                    <span class="label label-warning" ><a data-toggle="modal" href="<?php /* echo base_url() . 'index.php/send_password'; */ ?>">Enviar Password</a></span>
                                                </h6>
                                            </div>
                                        </div>    
                                        <div class="modal-footer">
                                            <div class="row">
                                                <span class="col-sm-2 pull-left"><a href="<?php /* echo base_url() . 'index.php/blog/index/close' */ ?>" class="btn btn-primary">Fechar</a></span>
                                                <span class="col-sm-10 pull-right"><button type="submit" class="btn btn-primary">Acesso</button></span>
                                            </div>   
                                        </div>
                                        {{csrf_field()}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="Inserepublicacao" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content" style="background: rgba(52, 99, 236,0.5)">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><span class="label label-default">Inserir Publicação</span></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="text-center" style="color:white">Foto Publicação</h2>
                                            <div class="row">
                                                <?php
                                                if (isset($otherdata['imagem'])) {
                                                    echo '<img class="img-responsive thumbnail" style="margin: 0 auto;width:75%;height:150px;" src="data:image/jpeg;base64,' . base64_encode($otherdata['imagem']) . '"/>';
                                                }
                                                ?>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <form action = "/upload_blog_foto" method = "post" enctype = "multipart/form-data">
                                            <div class = "row">
                                                <div class = "col-md-6 col-xs-6 col-sm-6">
                                                    <input class = "btn btn-primary" type = "file" title = "Seleccione Foto" name = "userfile" />
                                                </div>
                                                <div class = "col-md-6 col-xs-6 col-sm-6 text-right">
                                                     <input class="btn btn-primary" type="file" title="Seleccione Video" name="uservideo"/>
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-md-6 col-xs-6 col-sm-6">
                                                    <input class = "btn btn-primary" type = "submit" value = "Guardar Foto" />
                                                </div>
                                                <div class = "col-md-6 col-xs-6 col-sm-6 text-right">
                                                    <input class="btn btn-primary" type="submit" value="Guardar Video" />
                                                </div>
                                            </div>
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>


                            
                            <form action='/blog/index/' id='formtexto'>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 pull-right">
                                        <span style="color:white"><div class="pull-right">Categoria da Publicação -</div><select class="pull-right" name = "selected">
                                                <?php
                                                $categoria = categoria::listarcategoria();
                                                if (is_array($categoria)) {
                                                    foreach ($categoria as $row) {
                                                        echo '<option  value="' . $row->id_publicacaocategoria . '">' . $row->descricao . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="text-center" style="color:white" id="sizing-addon3">Titulo da Publicação</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3">Titulo da Publicação</span>
                                            <input type="text" name="titulopost" class="form-control" id="login" placeholder="Titulo da Publicacao" aria-describedby="sizing-addon3" required />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-groupp form-group-sm">
                                            <label class="text-center" style="color:white" id="sizing-addon3">Mensagem da Publicação</label>
                                            <textarea rows="5" cols="100" class="form-control" 
                                                      placeholder="Mensagem" name="mensagem" required style="resize:none"></textarea>
                                        </div>
                                    </div>
                                </div> 
                                <div class="modal-footer">
                                    <div class = "row">
                                        <span class="col-md-2 col-sm-2 col-xs-2 pull-left"><button type="button"  data-dismiss="modal" class="btn btn-primary" >Fechar</button></span>
                                        <span class="col-sm-10 col-xs-10 col-md-10 pull-right"><button type="submit" class="btn btn-primary">Inserir Publicação</button></span>
                                    </div>   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal HTML -->
                <div id="Comentario" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><span class="label label-default">Comentarios</span></h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="widget categories">
                                            <h3>Comentarios ao Post</h3>
                                            <div class="row">
                                                <?php /* $publicacao = $publicacao::getpublicacao($id_publicacao); ?>
                                                  <div class="col-xs-12 col-sm-12 col-md-12 center" style="height:75px;">
                                                  <img src = "<?php echo base_url() . $publicacao['imagem']; ?>" class="img-responsive center-block" style = "width:150px;height:75px" />
                                                  </div>

                                                  <div class="col-xs-12 col-sm-12 col-md-12 center">
                                                  <div><h4 class="text-danger">Título da Publicacao</h4></div>
                                                  <div><h6 class="text-primary"><?php echo $publicacao['titulo']; ?></h6></div>
                                                  <textarea class="col-xs-12 col-sm-12 col-md-12 " rows="4" readonly><?php $publicacao['texto']; ?>
                                                  </textarea>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  </div><!--/.recent comments-->
                                                  </div>
                                                  <div class="row" id="comentariorefresh" style="overflow-x:hidden;overflow-y: scroll">
                                                  <div class="col-xs-2 col-sm-2 col-md-2">
                                                  <img src = "<?php echo base_url() . $perfil->fotografia  ?>" class="img-responsive" style = "border: 1px solid blue;width:50px;height:50px" />
                                                  </div>
                                                  <div class="col-xs-10 col-sm-10 col-md-10">
                                                  <input class="col-xs-10 col-sm-10 col-md-10" type="text" name="comentario" value="" placeholder="Comente o post aqui" id="comentario" />
                                                  <button id="inserecomentario" type="button" onclick="inserecomentario('<?php /* echo $id_publicacao; */ ?>', '<?php /* echo $this->users->getId_user($this->session->userdata('username') ? $this->session->userdata('username') : 'Anonimo')  ')" class="btn btn-info col-xs-2 col-sm-2 col-md-2"><i class="glyphicon glyphicon-comment"></i></button>
                                                  </div>
                                                  </div>
                                                  <?php
                                                  $comentarios = $this->comentario->getComentarios($id_publicacao);
                                                  $i = 0;
                                                  for ($i = 0; $i < count($comentarios); $i++) {
                                                  echo '<div class="row">

                                                  <div class="col-xs-2 col-sm-2 col-md-2">
                                                  <img src = "' . base_url() . $comentarios[$i]['fotografia'] . '" class="img-responsive" style = "border: 1px solid blue;width:50px;height:50px" />
                                                  </div>
                                                  <div class="col-xs-10 col-sm-10 col-md-10">
                                                  <input class="col-xs-10 col-sm-10 col-md-10" type="text" name="listacomentarios' . $i . '" value="' . $comentarios[$i]['comentario'] . '" id="listacomentarios' . $i . '" />
                                                  </div>


                                                  </div>';
                                                  }
                                                  ?>

                                                  </div>
                                                  </div>
                                                  </div>
                                                  </div>
                                                  <div id="Arquivo" class="modal fade" role="dialog">
                                                  <div class="modal-dialog">
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                  <div class="modal-header">
                                                  <a href="<?php echo base_url() . 'index.php/blog/index/' . $this->paginacao->lerpagina() . '#categorias'  ?>" class="close">&times;</a>
                                                  <h4 class="modal-title"><span class="label label-default">Arquivos de Publicações</span></h4>
                                                  </div>
                                                  <div class="modal-body">
                                                  <div class="row">
                                                  <div class="col-md-12">
                                                  <div class="widget categories">
                                                  <h3>Arquivo de Publicações</h3>
                                                  <div class="single_comments" style="height:200px;overflow-y: scroll; overflow-x: hidden">
                                                  <?php
                                                  $arquivos = $this->arquivo->listagem_arquivo($mes_arquivo);
                                                  for ($i = 0; $i < count($arquivos["datapost"]); $i++) {
                                                  $ext = pathinfo($arquivos["imagem"][$i], PATHINFO_EXTENSION);
                                                  !strcmp($ext, 'mp4')?$tag='<video style = "margin: 0 auto;width:75%;height:150px;"
                                                  id="myplyer'.$i.'"
                                                  class = "video-js"
                                                  controls
                                                  preload = "auto"
                                                  data-setup = "{}">
                                                  <source src = "'.base_url().$arquivos["imagem"][$i].'" type = "video/mp4"></source>
                                                  <p class = "vjs-no-js">
                                                  To view this video please enable JavaScript, and consider upgrading to a
                                                  web browser that
                                                  <a href = "http://videojs.com/html5-video-support/" target = "_blank">
                                                  supports HTML5 video
                                                  </a>
                                                  </p>
                                                  </video>':$tag='<img class = "img-responsive img-blog" src = "' . base_url() . $arquivos["imagem"][$i] . '" style = "max-width:732px;width:100%;max-height:248px" />';

                                                  echo '<div class="row">
                                                  <div class="col-md-6 col-sm-6 col-xs-6">
                                                  '.$tag.'
                                                  <div class="entry-meta small muted">
                                                  <span>' . $arquivos["titulo"][$i] . '</span>
                                                  <span>' . $arquivos["texto"][$i] . '</span>
                                                  </div>
                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-6">
                                                  ' . $arquivos["datapost"][$i] . '
                                                  </div>
                                                  </div><br>';
                                                  }
                                                  ?>
                                                  </div>
                                                  </div><!--/.recent comments-->
                                                  </div>
                                                  </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                  <div class = "row">
                                                  <span class="col-sm-10 pull-right"><a href="<?php  echo base_url() . 'index.php/blog/index/' . $this->paginacao->lerpagina() . '#categorias' */ ?>" class="btn btn-primary" >Fechar</a></span>
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Utilizadores" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><span class="label label-default">Post Tag</span></h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="widget categories">
                                            <div class="single_comments" style="height:200px;overflow-y: scroll; overflow-x: hidden">
                                                <h3>Utilizadores</h3>

                                            </div>                     
                                        </div><!--/.recent comments-->
                                    </div>
                                </div>
                            </div>    
                            <div class="modal-footer">
                                <div class = "row">
                                    <span class="col-sm-10 pull-right"><a href="{{asset('blog')}}" class="btn btn-primary" >Fechar</a></span>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
                <div id="CloudTags" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="<?php /* echo base_url() . 'index.php/blog/index/' . $this->paginacao->lerpagina() . '#categorias' */ ?>" class="close">&times;</a>
                                <h4 class="modal-title"><span class="label label-default">Post Tag</span></h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="widget categories">
                                            <div class="single_comments" style="height:200px;overflow-y: scroll; overflow-x: hidden">
                                                <h3>Cloud Tags</h3>

                                                <?php /*
                                                  $publicacao = $this->publicacao->get_tag_publicacao($id_publicacao);
                                                  for ($i = 0; $i < sizeof($publicacao['texto']); $i++) {
                                                  echo '<div class = "row">
                                                  <div class = "col-md-6 col-sm-6 col-xs-6">
                                                  <img src = "' . base_url() . $publicacao['imagem'][$i] . '" style = "width:45px;height:45px" />
                                                  <div class = "entry-meta small muted">
                                                  <span>' . $publicacao["texto"][$i] . '</span>
                                                  </div>
                                                  </div></div>
                                                  ';
                                                  }
                                                 */ ?>

                                            </div>                     
                                        </div><!--/.recent comments-->
                                    </div>
                                </div>
                            </div>    
                            <div class="modal-footer">
                                <div class = "row">
                                    <span class="col-sm-10 pull-right"><a href="<?php /* echo base_url() */ ?>" class="btn btn-primary" >Fechar</a></span>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>       
                <div id="Usersqualidus" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" class="close">&times;</button>
                                <h4 class="modal-title"><span class="label label-default">Post Tag</span></h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="widget categories">
                                            <h3>Gostos de Utilizadores nas Publicacações</h3>
                                            <div class="row">
                                                <div class="col-xs-4 col-sm-4 col-md-4" style="height:20px">
                                                    <h6 class="text-danger left">Utilizador</h6>
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4" style="height:20px">
                                                    <h6 class="text-danger center">Gosto</h6>
                                                </div>
                                                <div class="col-xs-4 col-sm-4 col-md-4" style="height:20px">
                                                    <h6 class="text-danger center">Não Gosto</h6>
                                                </div>
                                            </div>
                                            <div class="single_comments" style="height:250px;overflow-y: scroll; overflow-x: hidden">
                                                @if(isset($otherdata['usersqualidus']))
                                                {!! $otherdata['usersqualidus']!!}@endif                                     
                                            </div>    

                                        </div>                     
                                    </div><!--/.recent comments-->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class = "row">
                                    <span class="col-sm-10 pull-right"><button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button></span>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php /*
              foreach ($modalspublicacaocategoria as $modal) {
              $i = 1;
              $publicacoes = $this->publicacao->getpublicacao4Categoria($modal);
              echo '<div id="' . $modal . '" class="modal fade" role="dialog">
              <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><span class="label label-default">Categoria ' . $modal . '</span></h4>
              </div>
              <div class="modal-body">
              <div class="row">
              <div class="col-md-12">
              <div class="widget categories">
              <h3>Posts que pertencem á categoria ' . $modal . '</h3>
              <div class="row" style="height:290px;overflow-y:scroll;">';
              foreach ($publicacoes as $publicacao) {
              $ext = pathinfo($publicacao['imagem'], PATHINFO_EXTENSION);

              (!strcmp($ext, 'mp4')) ? $tag = '<video  style="margin: 0 auto;width:150px;height:75px"
              id="upload' . $i . '"
              class="video-js"
              controls
              preload="auto"
              data-setup="{}">
              <source src="' . base_url() . $publicacao['imagem'] . '" type="video/mp4"></source>
              <p class="vjs-no-js">
              To view this video please enable JavaScript, and consider upgrading to a
              web browser that
              <a href="http://videojs.com/html5-video-support/" target="_blank">
              supports HTML5 video
              </a>
              </p>
              </video>' : $tag = '<img src = "' . base_url() . $publicacao['imagem'] . '" class="img-responsive center-block" style = "width:150px;height:75px" />';
              echo '<div class="col-xs-12 col-sm-12 col-md-12 left" style="height:15px;"><div class="text-danger left">Post #' . $i . '</div></div>
              <div class="col-xs-12 col-sm-12 col-md-12 center" style="height:75px;">
              ' . $tag . '
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 center">
              <div><h4 class="text-danger">Título do Post</h4></div>
              <div><h6 class="text-primary">' . $publicacao['titulo'] . '</h6></div>
              <textarea rows="4" cols="50" readonly>' . $publicacao['mensagem'] . '
              </textarea>
              </div>';
              $i++;
              }
              echo '</div>
              </div><!--/.recent comments-->
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>';
              }
             */ ?>
        </div>
    </div>
</section><!--/#blog-->
<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                &copy; {{date('Y')}}; ?> <a href="javascript:void();">Centenary Tech</a>. Todos os direitos reservados.
            </div>
            <div class="col-sm-4 text-center">
                <img style="width:50px;height:50px" src="{{asset("images/ico/nero.png")}}"/>
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
<script src="{{asset('js/scrollbar.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('js/jquery.isotope.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/bootstrap.file-input.js')}}"></script>
<script src="{{asset('https://unpkg.com/video.js@6.2.1/dist/video.min.js')}}"></script>
<script src="{{asset('https://unpkg.com/videojs-flash@2.0.0/dist/videojs-flash.min.js')}}"></script>
<script>
videojs.options.flash.swf = 'https://unpkg.com/videojs-swf@5.4.0/dist/video-js.swf';
</script>
<script>
    $.ajaxSetup({headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content');
        }});
</script>   
<script>
    $(function ()
    {
        $('.scroll-pane').jScrollPane();
    });
</script>
<script>
    $("#upfile1").click(function () {
        $("#myFile").trigger('click');
    });</script>
<script type="text/javascript">$('input[type=file]').bootstrapFileInput();
        $('.file-inputs').bootstrapFileInput();</script>
<script type='text/javascript'>function janela(id_post) {
        $('#Usersqualidus').modal('show');
    }
</script>
<script>
    function progressbar(idpost, count, boolean) {
        var gosto = "";
        if (boolean == 1) {
            gosto = "gosto";
            var lastvalue = document.getElementById("progress" + idpost).style.width;

            lastvalue = lastvalue.replace("%", "");

            count = lastvalue;
        }
        if (boolean == 0) {
            gosto = "naogosto";
            var lastvalue = document.getElementById("progress" + idpost).style.width;
            lastvalue = lastvalue.replace("%", "");
            count = 100 - lastvalue;
        }


        var x = document.getElementById("divprogressbar" + gosto + idpost);
        if (x.style.display === "none") {
            x.style.display = "block";
            var sideprogress = '<div class="progress" id="progressdiv' + gosto + idpost + '" style="-webkit-box-shadow: -8px 7px 5px 0px rgba(0,0,0,0.75);-moz-box-shadow: -8px 7px 5px 0px rgba(0,0,0,0.75);box-shadow: -8px 7px 5px 0px rgba(0,0,0,0.75);border: 1px solid red"><div id="sideprogress' + gosto + idpost + '" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:' + count + '%">' + count + '%</div></div>';
            var divprogressbar = '#divprogressbar' + gosto + idpost;
            $(divprogressbar).append(sideprogress);
        } else {
            x.style.display = "none";
            var progressdiv = "#progressdiv" + gosto + idpost;
            $(progressdiv).remove();
        }
    }

</script>
<script>
    function remove() {

        $("#dropdown.dropdown-menu").css("display", "block");
    }
</script>
<script>
    function set() {

        $("#dropdown.dropdown-menu").css("display", "none");
    }
</script>
{!!$scrolllikecontroller!!} 
@if(isset($otherdata['imagemnewpost']))
{!! $otherdata['imagemnewpost']!!}@endif
@if(isset($sharefacebook))
{!! $sharefacebook; !!}@endif
@if(isset($otherdata['modalbox']))
{!! $otherdata['modalbox']!!}@endif
@if(isset($comentario))
{!! $comentario!!}@endif
</body>
</html>