<nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=""><img src="{{asset("images/logo.png")}}" alt="logo" /></a>
        </div>

        
            <div class="collapse navbar-collapse navbar-right col-sm-12 col-md-12 col-xs-12">
                
                <ul class="nav navbar-nav">
                    @foreach($menu as $item)
                        @if($item->href !='')
                            @if($item->session==0)    
                                        <li><img src="{{asset($item->imagem)}}" style="height:20px;"/><a href="{{$item->href}}">{{$item->opcao}}</a></li>
                            @else
                                @if(isset($sessionusername))
                                    <li><img src="{{asset($item->imagem)}}" style="height:20px;"/><a href="{{$item->href}}">{{$item->opcao}}</a></li>
                                @endif
                            @endif
                        @else
                            @if($item->session==1)
                                @if(isset($sessionusername))
                                    <li class="dropdown"><a href="#" class="dropdown-toogle" data-toggle="dropdown"><img src="{{asset($item->imagem)}}" style="height:20px;"/>{{$item->opcao}}<i class="fa fa-angle-down"></i></a>                        
                                    <ul class="dropdown-menu">
                                    @foreach($submenu as $itemsubmenu)
                                        @if($itemsubmenu->submenu_id===$item->id)
                                            @if($itemsubmenu->ligado===0)
                                                <li class="disabled"><a href="#" >{{$itemsubmenu->opcao}}<img src="{{$itemsubmenu->imagem}}" style="height:45px;"/></a></li>
                                            @else
                                                <li><a  href="{{$itemsubmenu->href}}" >{{$itemsubmenu->opcao}}<img src="{{$itemsubmenu->imagem}}" style="height:45px;"/></a></li>
                                            @endif
                                        @endif
                                    @endforeach
                                    </ul>
                                    </li>
                                @endif
                            @else
                               
                                <li class="dropdown"><a href="#" class="dropdown-toogle" data-toggle="dropdown"><img src="{{asset($item->imagem)}}" style="height:20px;"/>{{$item->opcao}}<i class="fa fa-angle-down"></i></a>                        
                                    <ul class="dropdown-menu">
                                    @foreach($submenu as $itemsubmenu)
                                        @if($itemsubmenu->submenu_id===$item->id)
                                            @if($itemsubmenu->ligado===0)
                                                <li class="disabled"><a href="#" >{{$itemsubmenu->opcao}}<img src="{{$itemsubmenu->imagem}}" style="height:45px;"/></a></li>
                                            @else
                                                <li><a  href="{{$itemsubmenu->href}}" >{{$itemsubmenu->opcao}}<img src="{{$itemsubmenu->imagem}}" style="height:45px;"/></a></li>
                                            @endif
                                        @endif
                                    @endforeach
                                    </ul>
                                    </li>
                             @endif   
                        @endif
                    @endforeach
                    @if($sessionusername)
                        <li><a href="/perfil"><img class="center-block"" style='height:20px;width:50px' src="data:image/jpeg;base64,<?php echo $perfil->fotografia ?>"/><div style="text-align:center">{{$perfil->nome}} {{$perfil->sobrenome}}</div></a></li>
                    @endif
                </ul>
            </div>          
</nav><!--/nav-->