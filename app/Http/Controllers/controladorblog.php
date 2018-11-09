<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use App\Libraries\bloglib;
use App\perfil;
use App\publicacao;
use App\users;
use App\menu;
use App\submenu;
use App\comentario;
use App\arquivo;
use App\publicacaocategoria;

class controladorblog extends Controller {

    /**
     * Description of blog
     *
     * @author engenheiro
      /**
     * Index Page for this controller.
     *
     */
    private $data = [];
    private $array = [];

    public function index($opcao = null, $opcao2 = null) {


        $this->data = $this->iniciardata($opcao, $opcao2, null);
        return view('blog')->with($this->data);
    }

    public function upload_blog_foto() {

        if (($file = Input::file('userfile')))
            $file->move('images/blog/publicacoes', $file->getClientOriginalName());
        $filename = 'images/blog/publicacoes/' . $file->getClientOriginalName();
        
        $contents = File::get($filename);
        
        
        $this->data = $this->iniciardata(null, null, $contents);

        return view('blog')->with($this->data);
    }

    private function iniciardata($opcao, $opcao2, $filename) {
        $this->array['imagem'] = null;
        $flagcomentario='';
        $blob='';
        $blog = '';
        $perfil = null;
        $sessionusername = request()->session()->get('username');
        
        $video = request()->session()->get('video');

        $video ? $upload_dir = asset('videos/') : $upload_dir = asset('publicacaoes/');

        if (isset($sessionusername)) {
            
            $username = $sessionusername;
            $disabled = "enabled";
            $onclickup = "onclick";
        } else {
            $username = "Anonimo";
            $disabled = "disabled";
            $onclickup = "";
        }

        $scroll = 1;
//$this->recent_comments = comentarios::get_recent_comments();

        $title = "";

        $perfil = perfil::viewUserPerfil($sessionusername);

        $menu = menu::getMenu();
        $submenu = submenu::getSubMenu();
        if (isset($sessionusername)) {
            $submenu[6]->ligado = 0;
            $submenu[7]->ligado = 1;
            $submenu[8]->ligado = 0;
            $submenu[9]->ligado = 1;
        }

        if (isset($filename)) {

            $this->array['modalbox'] = '<script type="text/javascript">$("#Inserepublicacao").modal("show");</script>';
            $this->array['imagem'] = $filename;
            
            request()->session()->put('imagem', $filename);
        }
        
        switch ($opcao) {
            case "comentario":
                $this->array['id_post'] = Input::post('publicacao');
                $this->array['eliminar'] = null;
                $this->array['error'] = null;
                $this->array['opcao'] = null;
                $this->array['cloud_tags'] = null;
                $publicacao = publicacao::getpublicacao($opcao2);
                if ($publicacao['imagem']) {
                    $this->array['modalbox'] = '<script type="text/javascript">$("#Comentario").modal("show");</script>';
                }

                break;
            case "utilizador":
                $this->array['modalbox'] = "<script type='text/javascript'>$('#Utilizadores').modal('show');</script>";
                $this->array['id_user'] = $opcao2;
                $this->array['eliminar'] = null;
                $this->array['error'] = null;
                $this->array['opcao'] = null;
                $this->array['cloud_tags'] = null;
                break;
            case "verlikes" :
                $usersqualidus='';
                $this->array['modalbox'] = "<script type='text/javascript'>$('#Usersqualidus').modal('show');</script>";
                $this->array['id_publicacao'] = $opcao2;
                $this->array['eliminar'] = null;
                $this->array['error'] = null;
                $this->array['opcao'] = null;
                $this->array['cloud_tags'] = null;
                
                $users = publicacao::users_like_publicacao($opcao2);
                
                foreach ($users as $id) {
                   $usersqualidus.='<div class="row">
                                                      <div class="col-xs-4 col-sm-4 col-md-4" style="height:25px">
                                                      <h6 class="text-primary left">' . publicacao::get_username4db($id, TRUE) . '</h6>
                                                      </div>
                                                      <div class="col-xs-4 col-sm-4 col-md-4" style="height:25px">
                                                      <h6 class="text-primary center">' . publicacao::countgosto($opcao2, $id, TRUE) . '</h6>
                                                      </div>
                                                      <div class="col-xs-4 col-sm-4 col-md-4" style="height:25px">
                                                      <h6 class="text-primary center">' . publicacao::countgosto($opcao2, $id, false) . '</h6>
                                                      </div>
                                                      </div>';
                                                      }
                $this->array['usersqualidus']=$usersqualidus;                    
                
                
                break;
            case "novopost" :
                $this->array['modalbox'] = '<script type="text/javascript">$("#Inserepublicacao").modal("show");</script>';
                $this->array['id_publicacao'] = null;
                $this->array['eliminar'] = null;
                $this->array['error'] = null;
                $this->array['cloud_tags'] = null;
                break;
            case "arquivo" :
                $this->array['modalbox'] = "<script type='text/javascript'>$('#Arquivo').modal('show');</script>";
                $this->array['mes_arquivo'] = $opcao2;
                $this->array['eliminar'] = null;
                $this->array['error'] = null;
                $this->array['opcao'] = null;
                $this->array['cloud_tags'] = null;
                break;
            case "close":
                $this->array['imagemnewpost'] = request()->session()->put('imagemnewpost', null);
                $this->array['modalbox'] = "<script type='text/javascript'>$('#Inserepublicacao').modal('close');</script>";
                $this->array['option'] = $opcao2;
                $this->array['eliminar'] = null;
                $this->array['error'] = null;
                $this->array['opcao'] = null;
                $this->array['cloud_tags'] = null;
                break;
            case "cloudtags" :
                $this->array['modalbox'] = "<script type='text/javascript'>$('#CloudTags').modal('show');</script>";
                $this->array['id_publicacao'] = $opcao2;
                $this->array['eliminar'] = null;
                $this->array['error'] = null;
                $this->array['opcao'] = null;
                $this->array['cloud_tags'] = null;
                break;
            case 'eliminar':
                $this->array['eliminar'] = $opcao;
                $this->array['id_publicacao'] = $opcao2;
                $this->array['error'] = null;
                $this->array['opcao'] = null;
                $this->array['cloud_tags'] = null;
                break;
        }

        if (!strcmp(request()->session()->get('username'),'0' )){
            $username = "Anonimo";
            $flagcomentario="disabled";
        }
        else{
            $username = request()->session()->get('username');
            $flagcomentario="";
        }


        if (!strcmp(isset($this->array['eliminar']) ? $this->array['eliminar'] : null, 'eliminar'))
            publicacao::Eliminarpublicacao($this->array['id_publicacao']);


        if (Input::post('titulopost') && Input::post('mensagem') && Input::post('selected')) {
            publicacao::inserirpublicacao(date_format(date_create(date('Y-m-d H:i:s')), 'Y-m-d H:i:s'), request()->session()->get('imagem') ? request()->session()->get('imagem') : asset('uploads/blog/nopost.png'), Input::post('selected'), Input::post('titulopost'), Input::post('mensagem'), request()->session()->get('username') ? request()->session()->get('username') : '0');
            arquivo::inserir_post_arquivo(date_format(date_create(date('Y-m-d H:i:s')), 'Y-m-d H:i:s'), request()->session()->get('imagem') ? request()->session()->get('imagem') : 'uploads/blog/nopost.png', Input::post('selected'), Input::post('titulopost'), Input::post('mensagem'), request()->session()->get('username') ? request()->session()->get('username') : '0');
            request()->session()->put('imagem', null);
        }

        $publicacaocategoria = publicacaocategoria::getdescricao($opcao);



        $publicacoes = bloglib::getpublicacoes();
        $publicacoes = compact('publicacoes');
        $i = 0;
        foreach ($publicacoes['publicacoes'] as $publicacao) {
            $imagem=base64_encode($publicacao->imagem);
            /*strcmp($ext, 'mp4') ? $tag = '<video  style="margin: 0 auto;width:75%;height:150px;"
                                                           id="myplyer' . $publicacao->id_publicacao . '"
                                                           class="video-js"
                                                           controls
                                                           preload="auto"
                                                           data-setup="{}">
                            <source src="' . asset($publicacao->imagem) . '" type="video/mp4"></source>
                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="http://videojs.com/html5-video-support/" target="_blank">
                                    supports HTML5 video
                                </a>
                            </p>
                        </video>' :*/ $tag = '<img class="img-responsive img-blog" src="data:image/jpeg;base64,'.$imagem.'" style="max-width:732px;width:100%;max-height:248px" />';
            $blog .= '<div class="blog-item">
    <div class="row" >
        <div class="col-xs-12 col-sm-2 text-center" id="' . $publicacao->id_publicacao . '" ">
            <div class="entry-meta">
                <span id="publish_date">' . publicacao::datapublicacao($publicacao->id_publicacao) . '</span>
                <span><i class="fa fa-user"></i><a href="' . asset('/blog/utilizador') . '/' . publicacao::getiduseridpublicacao($publicacao->id_publicacao) . '">' . publicacao::get_username4db($publicacao->id_publicacao, FALSE) . '</a></span>
                <span><i class="fa fa-comment"></i><a href="' . asset('/blog/comentario') . '/' . $publicacao->id_publicacao . '">Comentários</a></span>
                <span><i style="color:hotpink" class="fa fa-smile"></i><div id="gosto' . $publicacao->id_publicacao . '" onclick="progressbar(' . $publicacao->id_publicacao . ',' . publicacao::countgosto($publicacao->id_publicacao, users::getId_user($username), TRUE) . ',1)" style="cursor: pointer;">' . publicacao::countgosto($publicacao->id_publicacao, users::getId_user($username), TRUE) . ' Gosto</div><div id="divprogressbargosto' . $publicacao->id_publicacao . '" class="col-xs-3 col-sm-3 col-md-3" style="display:none;width:100%;"></div></span>  
                <span><i style="color:hotpink" class="fa fa-unsmile"></i><div id="naogosto' . $publicacao->id_publicacao . '" onclick="progressbar(' . $publicacao->id_publicacao . ',' . publicacao::countgosto($publicacao->id_publicacao, users::getId_user($username), FALSE) . ',0)" style="cursor: pointer;">' . publicacao::countgosto($publicacao->id_publicacao, users::getId_user($username), false) . ' Não Gosto</div><div id="divprogressbarnaogosto' . $publicacao->id_publicacao . '" class="col-xs-3 col-sm-3 col-md-3" style="display:none;width:100%;"></div></span>   
            </div>
        </div>
                                <div class="col-xs-12 col-sm-8 col-md-8 blog-content">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-1 col-md-1 col-sm-offset-11 col-md-offset-10">
                                            <button class="btn dropdown-toggle btn-primary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ' . $disabled . '>
                                                Eliminar Publicação <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <div class="text-center">
                                                    <a href="' . asset('blog/eliminar') . '/' . $publicacao->id_publicacao . '">Eliminar</a>
                                                </div>    
                                            </ul>
                                        </div>
                                    </div>
                                    <a href="#">' . $tag . '</a>
                                    <div class="col-xs-12 col-sm-12 col-md-12 " id="'.$publicacao->id_publicacao.'">
                                        <h2><a href="blog-item.html">' . $publicacao->titulo . '</a></h2>
                                        <textarea class="form-control" rows="5" id="comment">' . $publicacao->mensagem . '</textarea>
                                    </div>
                                    <div class="row" style="height:20px" ></div>
                                    <div class="row">
                                        <div class="col-xs-11 col-sm-11 col-md-11 col-sm-offset-0 col-md-offset-0 col-xs-offset-0" style="margin-top:5px;margin-left:30px">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-comment" style="color:blue">Comentário</i></span>
                                                <input type="text" onkeypress="comentario('.$publicacao->id_publicacao.',event)" class="form-control" placeholder="Comentário" aria-describedby="basic-addon1" id="comentario" '.$flagcomentario.'/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrapper">
                                    <input type="hidden" value="0" id="ncomentarios'.$publicacao->id_publicacao.'" />         
                                    </div>
                                    <div class="row">
                                        <div class="center col-xs-12 col-sm-12 col-md-12" style="height:0px"><a href="'.asset("blog/verlikes") ."/". $publicacao->id_publicacao . '">Qualidus</a></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4 text-right"><button id="qualidusbtnup" type="button" class="btn btn-info " ' . $onclickup . '="uplike(' . $publicacao->id_publicacao . ')" ' . $disabled . '><i class="glyphicon glyphicon-thumbs-up"></i></button></div>
                                        <div class="col-xs-3 col-sm-4 col-md-4 ">
                                            <div class="progress">
                                                     <div class="progress">
                        <div id="progress' . $publicacao->id_publicacao . '" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="' . publicacao::lervalorprogress($publicacao->id_publicacao, users::getId_user($username)) . '"  aria-valuemin="0" aria-valuemax="100" style="width:' . publicacao::lervalorprogress($publicacao->id_publicacao, users::getId_user($username)) . '%">' . publicacao::lervalorprogress($publicacao->id_publicacao, users::getId_user($username)) . '% Qualidus</div>
                    </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <button type="button" class="btn btn-danger ' . $disabled . '" id="qualidusbtndown" onclick="downlike(' . $publicacao->id_publicacao . ')" ' . $disabled . '><i class="glyphicon glyphicon-thumbs-down"></i></button>
                                        </div> 
                                    </div>
                                    <div class = "col-xs-3 col-sm-4 col-md-4 ">
                                        <input type = "hidden" name = "numeroid" id = "numeroid" />
                                        <input type = "hidden" name = "lastvaluegosto" id = "lastvaluegosto' . $publicacao->id_publicacao . '" value="" />
                                        <input type = "hidden" name = "lastvaluenaogosto" id = "lastvaluenaogosto' . $publicacao->id_publicacao . '" value="" />    
                                    </div>
                                </div>
                            </div>
                        </div> ';

            $i++;
        }

        $sharefacebook = bloglib::share_facebook();
        $scrolllikecontroller = bloglib::scrolllikecontroller();
        $comentario = bloglib::comentario();


        $this->data = ['sessionusername' => $sessionusername,
            'username' => $sessionusername,
            'blog' => $blog,
            'perfil' => $perfil,
            'menu' => $menu,
            'submenu' => $submenu,
            'perfil' => $perfil,
            'disabled' => $disabled,
            'onclickup' => $onclickup,
            'publicacoes' => $publicacoes,
            'sharefacebook' => $sharefacebook,
            'blob' => $blob,
            'scrolllikecontroller' => $scrolllikecontroller,
            'comentario' => $comentario,
            'otherdata' => $this->array];

        
       
        return $this->data;
    }

    public function updateInsertPublicacoes(Request $request) {
        $data = $request->all(); 
        
        publicacao::insere_publicacao_qualidus($data['numeroid'], users::getId_user(request()->session()->get('username')), $data['qualidus']);
        // This will dump and die
    }

    public function InsereComentario(Request $request){
        $data =$request->all();
        comentario::insereComentario(users::getId_user(request()->session()->get('username'), TRUE),$data['id_publicacao'],$data['comentario']);
    }
    
}
