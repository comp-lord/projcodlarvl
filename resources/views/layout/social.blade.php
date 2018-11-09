@if(isset($sessionusername))@if($perfil->sexo=='xy')<div style="margin-left: 45%"><li onmouseover="remove()" onmouseout="set()" class="dropdown" style="list-style-type: none;"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('images/gallery/definicoes.png')}}" style="height:20px;"/></a>
                        
    <ul id ="dropdown" class="dropdown-menu col-xs-1 col-md-4 col-sm-4" style="margin-left: -135px">
                          
                            <li><a href="/removerutilizador">Remover Conta<img src="{{asset('images/gallery/removeuserdata.png')}}" style="height:20px;"/></a></li>
                            
                            <li><a  href="#">Utilizadores<img src="{{asset('images/gallery/automacao.png')}}" style="height:20px;"/></a></li>
                            
                            </ul>
                        
                    </li>
                    
                    
</div>
@endif
 @endif
