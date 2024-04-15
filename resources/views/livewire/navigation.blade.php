<div>
    <!-- Header desktop -->
    <div class="container-menu-desktop" >
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    <a class="text-blue" target="_blank" href="https://www.facebook.com/XCMGlibrainternationalperu?mibextid=ZbWKwL/"><i class="zmdi zmdi-facebook-box"></i> </a>
                    <span class="ml-3">
                        <a class="text-blue" target="_blank" href="https://www.instagram.com/xcmglibrainternational/"><i class="zmdi zmdi-instagram"></i> </a>
                    </span>
                    <span class="ml-3">
                        <a class="text-blue" target="_blank" href="https://twitter.com/librainternati3"><i class="zmdi zmdi-twitter"></i></a>
                    </span>
                </div>
                <div class="text-center text-blue">
                        AH. 8 de Septiembre, Calle Las Mercedes Lt 1 – Tumbes
                </div>
                <div class="right-top-bar flex-w h-full">
                    @auth
                        <a href="javascript:void(0)" class="flex-c-m trans-04 p-lr-25">
                            Usuario:  {{Auth::user()->name}}
                        </a> 
                    @else
                        <a href="{{ route('register') }}" class="flex-c-m trans-04 p-lr-25" target="_blank"> 
                            <i class="zmdi zmdi-collection-plus"></i> &nbsp;&nbsp; <span>Registrarse</span> 
                        </a> 
                    @endauth
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">
                <!-- Logo desktop -->		
                <a href="{{route('home')}}" class="logo p-1"><img src="/images/icons/logo.png" alt="IMG-LOGO"></a>
                <div class="menu-desktop">
                    <ul class="main-menu">

                        <li style="position:relative">
                            <a href="javascript:void(0)">Maquinarias <i class="zmdi zmdi-chevron-down"></i></a>
                            <div class="sub-menu maquinaria py-4">
                                <div class="container-sub-menu mx-auto">
                                    

                                    <div class="row mx-auto">
                                        
                                       
                                        <div class="col-2 text-center">
                                            @if(!is_null($cargadores))
                                                @if($cargadores->products->count())
                                            
                                                <a href="{{route('machinery.category',$cargadores)}}">
                                                    <img src="/images/icons/icon-cargadorfrontal.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                </a>
                                                @else
                                                    <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                @endif
                                                <p class="mb-1">{{$cargadores->name}}</p>
                                            @else
                                                <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                <p class="mb-1">Sin categoria</p>
                                            @endif
                                        </div>
                                        

                                        <div class="col-2 text-center">
                                            @if(!is_null($minicargadores))
                                                @if($minicargadores->products->count())
                                                    <a href="{{route('machinery.category',$minicargadores)}}">
                                                        <img src="/images/icons/icon-minicargador.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                    </a>
                                                @else
                                                    <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                @endif
                                                <p class="mb-1">{{$minicargadores->name}}</p>
                                            @else
                                                <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                <p class="mb-1">Sin categoria</p>
                                            @endif

                                        </div>

                                        <div class="col-2 text-center">
                                            @if(!is_null($excabadoras))
                                                @if($excabadoras->products->count())
                                                    <a href="{{route('machinery.category',$excabadoras)}}">
                                                        <img src="/images/icons/icon-excavadora.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                    </a>
                                                @else
                                                    <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                @endif
                                                <p class="mb-1">{{$excabadoras->name}}</p>
                                            @else
                                                <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                <p class="mb-1">Sin categoria</p>
                                            @endif
                                        </div>

                                        <div class="col-2 text-center">
                                            @if(!is_null($retroexcavadora))
                                                @if($retroexcavadora->products->count())
                                                    <a href="{{route('machinery.category',$retroexcavadora)}}">
                                                        <img src="/images/icons/icon-retroexcavadora.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                    </a>
                                                @else
                                                    <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                @endif
                                                <p class="mb-1">{{$retroexcavadora->name}}</p>
                                            @else
                                                <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                <p class="mb-1">Sin categoria</p>
                                            @endif
                                        </div>
                                        
                                         <div class="col-2 text-center">
                                            @if(!is_null($rodillo))
                                                @if($rodillo->products->count())
                                                    <a href="{{route('machinery.category',$rodillo)}}">
                                                        <img src="/images/icons/icon-rodillo.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                    </a>
                                                @else
                                                    <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                @endif
                                                <p class="mb-1">{{$rodillo->name}}</p>
                                            @else
                                                <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                <p class="mb-1">Sin categoria</p>
                                            @endif
                                        </div>
                                        
                                              <div class="col-2 text-center">
                                            @if(!is_null($motoniveladora))
                                                @if($motoniveladora->products->count())
                                                    <a href="{{route('machinery.category',$motoniveladora)}}">
                                                        <img src="/images/icons/icon-motoniveladora.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                    </a>
                                                @else
                                                    <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                @endif
                                                <p class="mb-1">{{$motoniveladora->name}}</p>
                                            @else
                                                <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                <p class="mb-1">Sin categoria</p>
                                            @endif
                                        </div>
                                        
                                        
                                        
                                              <div class="col-2 text-center">
                                            @if(!is_null($fresadora))
                                                @if($fresadora->products->count())
                                                    <a href="{{route('machinery.category',$fresadora)}}">
                                                        <img src="/images/icons/icon-fresadora.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                    </a>
                                                @else
                                                    <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                @endif
                                                <p class="mb-1">{{$fresadora->name}}</p>
                                            @else
                                                <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                <p class="mb-1">Sin categoria</p>
                                            @endif
                                        </div>
                                        
                                        
                                         <div class="col-2 text-center">
                                            @if(!is_null($mixxer))
                                                @if($mixxer->products->count())
                                                    <a href="{{route('machinery.category',$mixxer)}}">
                                                        <img src="/images/icons/icon-mixxer.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                    </a>
                                                @else
                                                    <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                @endif
                                                <p class="mb-1">{{$mixxer->name}}</p>
                                            @else
                                                <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                <p class="mb-1">Sin categoria</p>
                                            @endif
                                        </div>
                                        
                                        
                                        
                                        <div class="col-2 text-center">
                                            @if(!is_null($tractocamiones))
                                                @if($tractocamiones->products->count())
                                                    <a href="{{route('machinery.category',$tractocamiones)}}">
                                                        <img src="/images/icons/icon-tractocamion.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                    </a>
                                                @else
                                                    <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                @endif
                                                <p class="mb-1">{{$tractocamiones->name}}</p>
                                            @else
                                                <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                <p class="mb-1">Sin categoria</p>
                                            @endif
                                        </div>
                                        <div class="col-2 text-center">
                                            @if(!is_null($volquetes))
                                                @if($volquetes->products->count())
                                                    <a href="{{route('machinery.category',$volquetes)}}">
                                                        <img src="/images/icons/icon-volquete.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                    </a>
                                                @else
                                                    <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                @endif
                                                <p class="mb-1">{{$volquetes->name}}</p>
                                            @else
                                                <img src="/images/hobrero.png" width="100px" height="100px" class="mx-auto" alt=""> 
                                                <p class="mb-1">Sin categoria</p>
                                            @endif
                                        </div>
                                        
                                        
                                        
                                        
                                        

                                    </div>
                                </div>
                            </div>
                        </li>

                        <li style="position:relative">
                            @if(!is_null($lubricantes))
                                <a href="javascript:void(0)">{{$lubricantes->name}} <i class="zmdi zmdi-chevron-down"></i></a>
                                <div class="sub-menu lubricantes py-4">
                                    <div class="container-sub-menu mx-auto">
                                        <div class="row mx-auto">
                                    
                                            @if($lubricantes->products->count())
                                                <div class="col-2 text-center">
                                                    <a href="{{route('categories.show',$lubricantes)}}">
                                                        <img src="/images/lubricantes.png" width="100px" height="100px" class="mx-auto" alt="">
                                                    </a>
                                                    <b class="mb-1">Ver todos</b>
                                                </div>

                                                @foreach($lubricantes->products as $key=>$lubricante)
                                                    <div class="col-2 text-center">
                                                        <a href="{{route('products.show',$lubricante)}}">
                                                            <img src="{{config('services.trading.url')}}/uploads/img/{{$lubricante->image}}" width="100px" height="100px" class="mx-auto rounded-md" alt=""> 
                                                            <!-- <img src="{{$lubricante->image}}" width="100px" height="100px" class="mx-auto" alt=""> -->
                                                        </a>
                                                        <p class="mb-1">{{$lubricante->name}}</p>

                                                    </div>
                                                    @if($key == 4)
                                                        @break
                                                    @endif
                                                @endforeach
                                            @else
                                                <div class="col-10">
                                                    <h4 class="text-center"> No hay productos en esta categoria </h4>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @else
                                Sin Categoria <i class="zmdi zmdi-chevron-down"></i>
                            @endif
                        </li>

                        <li style="position:relative">
                            @if(!is_null($repuestos))
                                <a href="javascript:void(0)">{{$repuestos->name}} <i class="zmdi zmdi-chevron-down"></i></a>                   
                                <div class="sub-menu repuestos py-4">
                                    <div class="container-sub-menu mx-auto">
                                        
                                        
                                        
                                        @if(!is_null($llantas))
                                            <div class="row mx-auto">
                                                @if($llantas->products->count())
                                                    <div class="col-2 text-center">
                                                        <a href="{{route('categories.show',$llantas)}}">
                                                            <img src="/images/icons/icono_llantas.webp" width="80px" height="80px" class="mx-auto" alt="">
                                                        </a>
                                                        <b class="mb-1">Ver llantas</b>
                                                    </div>

                                                    @foreach($llantas->products as $key=>$llanta)
                                                        <div class="col-2 text-center">
                                                            <a href="{{route('products.show',$llanta)}}">
                                                                <img src="{{config('services.trading.url')}}/uploads/img/{{$llanta->image}}" width="80px" height="80px" class="mx-auto rounded-md" alt=""> 
                                                                
                                                            </a>
                                                            <p class="mb-1">{{Str::limit($llanta->name,40)}} </p>
                                                        </div>

                                                        @if($key == 4)
                                                            @break
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <div class="col-10">
                                                        <h4 class="text-center"> No hay productos en esta categoria </h4>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                        
                                        @if(!is_null($filtros))
                                        <div class="row mx-auto">
                                            @if($filtros->products->count())
                                                <div class="col-2 text-center">
                                                    <a href="{{route('categories.show',$filtros)}}">
                                                        <img src="/images/repuesto.png" width="80px" height="80px" class="mx-auto" alt="">
                                                    </a>
                                                    <b class="mb-1">Ver filtros</b>
                                                </div>

                                                @foreach($filtros->products as $key=>$filtro)
                                                    <div class="col-2 text-center">
                                                        <a href="{{route('products.show',$filtro)}}">
                                                            <img src="{{config('services.trading.url')}}/uploads/img/{{$filtro->image}}" width="80px" height="80px" class="mx-auto rounded-md" alt=""> 
                                                         
                                                        </a>
                                                        <p class="mb-1">{{Str::limit($filtro->name,40)}} </p>
                                                    </div>

                                                    @if($key == 4)
                                                        @break
                                                    @endif
                                                @endforeach
                                            @else
                                                <div class="col-10">
                                                    <h4 class="text-center"> No hay productos en esta categoria </h4>
                                                </div>
                                            @endif
                                        </div>
                                        @endif
                                        


                                        <div class="row mx-auto">
                                            @if($repuestos->products->count())
                                                <div class="col-2 text-center">
                                                    <a href="{{route('categories.show',$repuestos)}}">
                                                        <img src="/images/tornillo.png" width="80px" height="80px" class="mx-auto" alt="">
                                                    </a>
                                                    <b class="mb-1">Ver repuestos</b>
                                                </div>

                                                @foreach($repuestos->products as $key=>$repuesto)
                                                    <div class="col-2 text-center">
                                                        <a href="{{route('products.show',$repuesto)}}">
                                                            <img src="{{config('services.trading.url')}}/uploads/img/{{$repuesto->image}}" width="80px" height="80px" class="mx-auto rounded-md" alt=""> 
                                                         
                                                        </a>
                                                        <p class="mb-1">{{Str::limit($repuesto->name,40)}} </p>
                                                    </div>

                                                    @if($key == 4)
                                                        @break
                                                    @endif
                                                @endforeach
                                            @else
                                                <div class="col-10">
                                                    <h4 class="text-center"> No hay productos en esta categoria </h4>
                                                </div>
                                            @endif
                                        </div>
                                       
                                           
                                      
                                        
                                        
                                        
                                        
                                    </div>
                                </div>
                            @else
                                Sin Categoria <i class="zmdi zmdi-chevron-down"></i>
                            @endif
                        </li>

                    
                        <li style="position:relative">
                            <a href="{{route('products.offers')}}">Ofertas</a>
                        </li>
                        
                            <li style="position:relative">
                            <a href="{{route('blog.index')}}">Blog</a>
                        </li>

                    </ul>
                </div>	
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="flex-1 relative m-l-20 m-r-20">
                        @livewire('search')
                    </div>	
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{Cart::getContent()->count()}}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>

                <div class="mx-6 relative hidden md:block">
                    @auth
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Administrar cuenta
                                </div>
        
                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    <i class="zmdi zmdi-account"></i> Mi perfil
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('orders.index') }}">
                                    <i class="zmdi zmdi-assignment-o"></i> Mis ordenes
                                </x-jet-dropdown-link>
        
                                <div class="border-t border-gray-100"></div>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        Cerrar sesión
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    @else
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <i class="fa fa-user-circle cl2" style="font-size: 28px;"></i>
                            </x-slot>
        
                            <x-slot name="content">
                                <x-jet-dropdown-link href="{{ route('login') }}">
                                    Iniciar sesión
                                </x-jet-dropdown-link>
        
                                <x-jet-dropdown-link href="{{ route('register') }}">
                                    Crear una cuenta
                                </x-jet-dropdown-link>
                            </x-slot>
                        </x-jet-dropdown>
                    @endauth
                </div>
            </nav>
        </div>	
    </div>
        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->		
            <div class="logo-mobile">
                <a href="{{route('home')}}"><img src="/images/icons/logo.png" alt="IMG-LOGO"></a>
            </div>
            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{Cart::getContent()->count()}}">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
                &nbsp;&nbsp;&nbsp;
                @auth
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Administrar cuenta
                            </div>
                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                <i class="zmdi zmdi-account"></i> Mi perfil
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('orders.index') }}">
                                <i class="zmdi zmdi-assignment-o"></i> Mis ordenes
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    Cerrar sesión
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                @else
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <i class="fa fa-user-circle cl2" style="font-size: 28px;"></i>
                        </x-slot>
                        <x-slot name="content">
                            <x-jet-dropdown-link href="{{ route('login') }}">
                                Iniciar sesión
                            </x-jet-dropdown-link>
    
                            <x-jet-dropdown-link href="{{ route('register') }}">
                                Crear una cuenta
                            </x-jet-dropdown-link>
                        </x-slot>
                    </x-jet-dropdown>
                @endauth
            </div>
            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="main-menu-m">
                <li>
                    @if(is_null($cargadores))
                        <a href="javascript:void(0)">Sin categoria</a>
                    @elseif($cargadores->products->count())
                        <a href="{{route('machinery.category',$cargadores)}}">{{$cargadores->name}}</a>
                    @else
                        <a href="javascript:void(0)">{{$cargadores->name}} (Sin stock)</a>
                    @endif
                </li>
                <li>
                    @if(is_null($minicargadores))
                        <a href="javascript:void(0)">Sin categoria</a>
                    @elseif($minicargadores->products->count())
                        <a href="{{route('machinery.category',$minicargadores)}}">{{$minicargadores->name}}</a>
                    @else
                        <a href="javascript:void(0)">{{$minicargadores->name}} (Sin stock)</a>
                    @endif
                </li>

                <li>
                    @if(is_null($excabadoras))
                        <a href="javascript:void(0)">Sin categoria</a>
                    @elseif($excabadoras->products->count())
                        <a href="{{route('machinery.category',$excabadoras)}}">{{$excabadoras->name}}</a>
                    @else
                        <a href="javascript:void(0)">{{$excabadoras->name}} (Sin stock)</a>
                    @endif
                    
                </li>
                <li>
                    @if(is_null($retroexcavadora))
                        <a href="javascript:void(0)">Sin categoria</a>
                    @elseif($retroexcavadora->products->count())
                        <a href="{{route('machinery.category',$retroexcavadora)}}">{{$retroexcavadora->name}}</a>
                    @else
                        <a href="javascript:void(0)">{{$retroexcavadora->name}} (Sin stock)</a>
                    @endif
                  
                </li>
                <li>
                    @if(is_null($tractocamiones))
                        <a href="javascript:void(0)">Sin categoria</a>
                    @elseif($tractocamiones->products->count())
                        <a href="{{route('machinery.category',$tractocamiones)}}">{{$tractocamiones->name}}</a>
                    @else
                        <a href="javascript:void(0)">{{$tractocamiones->name}} (Sin stock)</a>
                    @endif
                </li>
                <li>
                    @if(is_null($volquetes))
                        <a href="javascript:void(0)">Sin categoria</a>
                    @elseif($volquetes->products->count())
                        <a href="{{route('machinery.category',$volquetes)}}">{{$volquetes->name}}</a>
                    @else
                        <a href="javascript:void(0)">{{$volquetes->name}} (Sin stock)</a>
                    @endif
                </li>
                
                  <li>
                    @if(is_null($mixxer))
                        <a href="javascript:void(0)">Sin categoria</a>
                    @elseif($mixxer->products->count())
                        <a href="{{route('machinery.category',$mixxer)}}">{{$mixxer->name}}</a>
                    @else
                        <a href="javascript:void(0)">{{$mixxer->name}} (Sin stock)</a>
                    @endif
                  
                </li>

                @if(!is_null($lubricantes))
                    @if($lubricantes->products->count())
                        <li><a href="{{route('categories.show',$lubricantes)}}">{{$lubricantes->name}}</a></li>
                    @else
                        <li> <a href="javascript:void(0)"> {{$lubricantes->name}} (sin productos) </a></li>
                    @endif
                @endif

                @if(!is_null($llantas))
                    @if($llantas->products->count())
                        <li><a href="{{route('categories.show',$llantas)}}">{{$llantas->name}}</a></li>
                    @else
                        <li> <a href="javascript:void(0)"> {{$llantas->name}} (sin productos) </a></li>
                    @endif
                @endif
                
                 @if(!is_null($filtros))
                    @if($filtros->products->count())
                        <li><a href="{{route('categories.show',$filtros)}}">{{$filtros->name}}</a></li>
                    @else
                        <li> <a href="javascript:void(0)"> {{$filtros->name}} (sin productos) </a></li>
                    @endif
                @endif
                
                
                
                 @if(!is_null($repuestos))
                    @if($repuestos->products->count())
                        <li><a href="{{route('categories.show',$repuestos)}}">{{$repuestos->name}}</a></li>
                    @else
                        <li> <a href="javascript:void(0)"> {{$repuestos->name}} (sin productos) </a></li>
                    @endif
                @endif

                <li><a href="{{route('products.offers')}}">Ofertas</a></li>
                <li><a href="{{route('blog.index')}}">Blog</a></li>
     
            </ul>
        </div> 
        
        <div class="wrap-header-cart js-panel-cart">
            <div class="s-full js-hide-cart"></div>
            <div class="header-cart flex-col-l p-l-65 p-r-25">
                <div class="header-cart-title flex-w flex-sb-m p-b-8">
                    <span class="mtext-103 cl2">
                     Carrito de compras
                    </span>
                    <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                        <i class="zmdi zmdi-close"></i>
                    </div>
                </div>
                <div class="header-cart-content flex-w js-pscroll">
                    <ul class="header-cart-wrapitem w-full">
                        @if(count(Cart::getContent()) > 0)
                            @foreach(Cart::getContent() as $car)
                            <li class="header-cart-item flex-w flex-t m-b-12">
                                <div class="header-cart-item-img" >
                                    @isset($car->attributes['image'])
                                        <img src="{{config('services.trading.url')}}/uploads/{{$car->attributes->image}}" alt="IMAGE">
                                    @endisset
                                </div>
                                <div class="header-cart-item-txt ">
                                    <a href="javascript:void(0)" class="header-cart-item-name m-b-1 hov-cl1 trans-04">
                                        {{Str::limit($car->name,80)}}
                                    </a>
                                    
                                    @isset($car->attributes['variante'])
                                        @if($car->attributes['variante'] != 'DUMMY')
                                        <span class="header-cart-item-info">
                                            {{Str::limit($car->attributes->variante,15)}}
                                        </span>
                                        @endif
                                    @endisset

                                    <span class="m-b-8">
                                        {{$car->quantity}} x $ {{number_format($car->price,2)}}
                                    </span>
                                </div>
                            </li>
                            @endforeach
                        @else
                            <h5>Tu carrito aún está vacío.</h5>
                        @endif
                    </ul>
                    <div class="w-full">
                        <div class="header-cart-total w-full p-tb-40">
                            Subtotal: S/. {{number_format(Cart::getSubTotal(),2)}}
                        </div>
                        <div class="header-cart-buttons flex-w w-full">
                            <a href="{{route('shopping-cart')}}" class="flex-c-m cl0 w-full bg3 bor2 hov-btn3 trans-04 py-2">
                                Ver carrito
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        