<?php

namespace App\Libraries;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria
 *
 * @author engenheiro
 */

use App\publicacao;
use App\comentarios;
use App\categoria;
use App\users;
use App\arquivo;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

class bloglib  {

     public function index() {
       
       $results = publicacao::fetch_publicacao($this->per_page(), $page);
        
        /*$page = $this->CI->paginacao->lerpagina();
        $this->CI->paginacao->escreverpagina($this->per_page(),$page);
        $results = $this->CI->publicacao->fetch_publicacao($this->per_page(), $page);*/
     }
     
     public static function getpublicacoes(){
        
        $publicacoes = publicacao::Todos();
        
        return $publicacoes;
    }
    
    public static function share_facebook() {
        return "<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '128517534473162',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.11'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = 'https://connect.facebook.net/en_US/sdk.js';
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk')); 
   
  document.getElementById('shareBtn').onclick = function(){  FB.ui(
      {
                  method: 'share',
                  name: 'Facebook Dialogs',
                  href: $(location).attr('href'),
                  link: 'https://developers.facebook.com/docs/dialogs/',
                  picture: 'http://localhost/digitalspot/uploads/erotildefreitas.jpg',
                  caption: 'Ishelf Book',
                  description: 'your description'
              },
              function (response) {
                  if (response && response.post_id) {
                      alert('success');
                  } else {
                     alert('error');
                  }
              }
    )};
     </script>";
    }
     public static function scrolllikecontroller() {
       $script= '<script>function uplike(numeroid) {
           
            
       
            lastvalue = document.getElementById("progress" + numeroid).style.width;
            lastvalue = lastvalue.replace("%", "");

            if (lastvalue < 100) {
                lastvalue = parseInt(lastvalue, 10) + 5;
            }
            document.getElementById("progress" + numeroid).style.width = lastvalue + "%";
            document.getElementById("progress" + numeroid).innerHTML = lastvalue + "% Qualidus";
            $("#gosto" + (parseInt(numeroid, 10))).text(lastvalue + " Gosto");
            $("#naogosto" + (parseInt(numeroid, 10))).text(100 - lastvalue + " Não Gosto");
           
            var d = document.getElementById("divprogressbargosto"+numeroid);
            if(d.style.display === "block"){
                document.getElementById("sideprogressgosto" + numeroid).style.width = lastvalue+"%";
                document.getElementById("sideprogressgosto" + numeroid).innerHTML = lastvalue + "%";
            }
            var d = document.getElementById("divprogressbarnaogosto"+numeroid);
            if(d.style.display === "block"){
                document.getElementById("sideprogressnaogosto" + numeroid).style.width = (100 -lastvalue) + "%";
                document.getElementById("sideprogressnaogosto" + numeroid).innerHTML = (100-lastvalue) + "%";
            }
            
            var a = document.getElementById("numeroid");
            var b = document.getElementById("lastvaluegosto"+numeroid);
            
            a.value = (parseInt(numeroid, 10));
            b.value = (parseInt(lastvalue, 10));
            var numeroid = $("#numeroid").val();
            var qualidus = $("#lastvaluegosto"+numeroid).val();
            token="'.csrf_token().'"
            $.ajax({
                type: "post",
                url: "/blog/updateInsertPublicacoes",
                data: {"numeroid": numeroid, "qualidus": qualidus,"_token": token},
            });
     
    }</script>';

        $script.='<script>function downlike(numeroid) {
            lastvalue = document.getElementById("progress" + numeroid).style.width;
            lastvalue = lastvalue.replace("%", "");
            if (lastvalue > 0)
                lastvalue = parseInt(lastvalue, 10) - 5;
            document.getElementById("progress" + numeroid).style.width = lastvalue + "%";
            document.getElementById("progress" + numeroid).innerHTML = lastvalue + "% Qualidus";
            $("#gosto" + (parseInt(numeroid, 10))).text(lastvalue + " Gosto");
            $("#naogosto" + (parseInt(numeroid, 10))).text(100 - lastvalue + " Não Gosto");
            var d = document.getElementById("divprogressbargosto"+numeroid);
            if(d.style.display === "block"){
                document.getElementById("sideprogressgosto" + numeroid).style.width = lastvalue+"%";
                document.getElementById("sideprogressgosto" + numeroid).innerHTML = lastvalue + "%";
            }
            var d = document.getElementById("divprogressbarnaogosto"+numeroid);
            if(d.style.display === "block"){
                document.getElementById("sideprogressnaogosto" + numeroid).style.width = (100 -lastvalue) + "%";
                document.getElementById("sideprogressnaogosto" + numeroid).innerHTML = (100-lastvalue) + "%";
            }
           
            var a = document.getElementById("numeroid");
            var b = document.getElementById("lastvaluenaogosto"+numeroid);
            
            a.value = (parseInt(numeroid, 10));
            b.value = (parseInt(lastvalue, 10));
            
            var numeroid = $("#numeroid").val();
            var qualidus = $("#lastvaluenaogosto"+numeroid).val();
            token="'.csrf_token().'"
            $.ajax({
                type: "post",
                url: "/blog/updateInsertPublicacoes",
                data: {"numeroid": numeroid, "qualidus": qualidus,"_token": token},
            });
       
    }</script>';
        return $script;
    }

    public function escrevercomments() {
        echo '<div class="widget categories">
    <h3>Comentarios Recentes</h3>
    <div class="row">
        <div class="col-sm-12">';
        for ($i = 0; $i < count($this->recent_comments['imagem']); $i++) {
            echo '<div class="single_comments">
                <img src="' . base_url() . $this->recent_comments['imagem'][$i] . '" alt="" style="width:50px;height:50px;" />
                <p>' . $this->recent_comments['comments'][$i] . '</p>
                <div class="entry-meta small muted">
                    <span>Publicacao efetuada por <a href="' . base_url() . 'index.php/perfil' . '">' . implode(PHP_EOL, $this->CI->publicacao->get_users_comments($this->recent_comments['id_publicacao'][$i])) . '</a></span><span>no<a href="#">Blog</a></span>
                </div>
            </div>
            <br>';
        }
        echo '</div>
    </div>                     
</div><!--/.recent comments-->
<!--/.recent comments-->';
    }

    /*
     * Funcao que é utilizada na blog view e pertence ao blog
     * escreve as categorias a que os publicacao pertencem na model DIALOG
     */

    public function escrevercategoria() {
        $categoria = $this->CI->categoria->listarcategoria();

        echo '<ul class = "blog_category" id="categorias">';
        if (is_array($categoria))
            foreach ($categoria as $row) {
                echo '<li><a href = "' . base_url() . 'index.php/blog/index/' . str_replace(" ", "_", preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($row->descricao)))) . '/">' . $row->descricao . '<span class = "badge">' . $this->CI->categoria->contarcategoria($row->id_categoria) . '</span></a></li>';
            }
        echo '</ul>';
    }

    /*
     * Funcao para escrever o arquivo na model Dialog
     */

    public function escreverarquivo() {
        $ano = date('Y');
        $meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio",
            "Junho", "Julho", "Agosto", "Setembro", "Outubro",
            "Novembro", "Dezembro");
        $arquivos = $this->CI->arquivo->listagem_datas_arquivo();
        for ($j = 0; $j < count($arquivos["meses"]); $j++) {
            $mes = $arquivos["meses"][$j];

            echo '<ul class="blog_archieve" id="arquivo">
    <li><a href="' . base_url() . 'index.php/blog/index/arquivo/' . $mes . '#categorias"><i class="fa fa-angle-double-right"></i> ' . $meses[$mes-1] . ' ' . $ano . '<span class="pull-right">(' . $arquivos["mesescontados"][$j] . ')</a></li>
</ul>';
        }
    }

    /*
     * Funcao para escrever as CloudTags na model Dialog
     */

    public function escrevercloudtags() {
        $matrix = $this->CI->publicacao->publicacao_Cloud_Tags();
        echo '<h3>Tag Cloud</h3><ul class="tag-cloud">';
        for ($i = 0; $i < count($matrix['tags']); $i++)
            echo '&nbsp<li><a style = "background-color:#428bca;color:white;" class = "btn btn-xs btn-info" href = "' . base_url() . 'index.php/blog/index/cloudtags/' . $matrix['id_publicacao'][$i] . '">' . $matrix['tags'][$i] . '</a></li>&nbsp';

        echo '</ul>';
    }

    /*
     * Funcao para escrever as CloudTags na model Dialog
     */

    public function escreverpublicacaoGallery() {
        $publicacao_Gallery = $this->CI->publicacao->get_publicacao_Gallery();
        echo '<div class="row"><div class="portfolio-items">
        <div class="portfolio-item primeiro">';
        for ($i = 0; $i < count($publicacao_Gallery['imagem']); $i++) {
            echo '<div class="recent-work-wrap col-xs-12 col-sm-3 col-md-3">
                <img style="height:40px;width:50px" src="' . base_url() . $publicacao_Gallery['imagem'][$i] . '" alt="">
                <a class="preview" href="' . base_url() . $publicacao_Gallery['imagem'][$i] . '"><i class="fa fa-eye"></i>View</a>

            </div>';
        }
        echo '</div></div>';
    }
    
    public static function comentario(){
        $script='<script>  
                function comentario(id_publicacao,event){
                    var key_pressed= event.which || event.keyCode;
                    var comentario = document.getElementById("comentario").value;
                    var ncomentarios = document.getElementById("ncomentarios"+id_publicacao).value;
                    alert(ncomentarios);
                    var token="'.csrf_token().'";
                    
                    if (key_pressed === 13) {
                        $(".wrapper").append('.'\''.'<div class="row"><div class="col-xs-11 col-sm-11 col-md-11 col-sm-offset-0 col-md-offset-0 col-xs-offset-0" style="margin-top:5px;margin-left:30px"><div class="input-group"><span class="input-group-addon" id="basic-addon1"><i class="fa fa-comment" style="color:blue">Comentário</i></span><input type="text" class="form-control add" placeholder="Comentário" aria-describedby="basic-addon1" disabled/></div></div></div>'.'\''.');
                        $(".add").attr("value",comentario);    
                                $.ajax({
                                type: "post",
                                url: "/blog/comentario",
                                data: {"comentario": comentario,"id_publicacao":id_publicacao,"_token": token},
                                success: function(result) {
                                alert(result);

                                },
                                error:function() {
                                alert("erro");

                                }
                             });
                            
                        }
                    
                }</script> '; 
        return $script;
}
}
