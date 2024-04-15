<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!--<title>Libra International</title>-->
        <!--<meta name="description" content="E-commerce de repuesto y lubricantes para maquinaria pesada, Cargadores, Tractocamiones,Excabadoras, Minicargadores,Volquetes,XCMG,Perú,Tumbes">-->
        @stack('seo') 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Onfleek Media">
        <link href="/images/icons/logo-min.icon" rel="icon" type="image/x-icon">  
        <!-- META -->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta property="og:title" itemprop="headline" content="Libra International" />
        <meta property="og:description" itemprop="description" content="E-commerce de repuesto y lubricantes para maquinaria pesada, Cargadores, Tractocamiones,Excabadoras, Minicargadores,Volquetes,XCMG,Perú,Tumbes" />
        <meta property="og:image" itemprop="image" content="/images/logo-min.png" />
        <meta property="og:url" itemprop="url" content="https://librainternational.com.pe/" />
        <meta property="og:type" content="E-commerce" />
        <!-- FB -->
        <meta property="fb:app_id" content="" />
        <meta property="fb:admins" content="" />
        <meta property="fb:pages" content="" /> 
        <!-- Google -->
        <link rel="icon" type="image/png" sizes="192x192" href="/images/logo-min-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/logo-min-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/images/logo-min-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/logo-min-16x16.png">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Scripts -->
        <!-- @vite(['resources/css/app.css', 'resources/js/app.js'])    -->
        <link rel="stylesheet" href="{{asset('css/libra.css')}}">  
        <script defer src="{{asset('js/libra.js')}}"></script> 
        <!-- Styles -->
        <?php $version='1993.1.55';?>
        <link rel="icon" type="image/png" href="/images/logo-min.png"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}?v=<?php echo $version;?>">  
        <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}?v=<?php echo $version;?>">
        <link rel="stylesheet" type="text/css" href="{{asset('fonts/iconic/css/material-design-iconic-font.min.css')}}?v=<?php echo $version;?>">
        <link rel="stylesheet" type="text/css" href="{{asset('fonts/linearicons-v1.0.0/icon-font.min.css')}}?v=<?php echo $version;?>">
        <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}?v=<?php echo $version;?>">	
        <link rel="stylesheet" type="text/css" href="{{asset('css/hamburgers.min.css')}}?v=<?php echo $version;?>">
        <link rel="stylesheet" type="text/css" href="{{asset('css/animsition.min.css')}}?v=<?php echo $version;?>">
        <link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}?v=<?php echo $version;?>">
        <link rel="stylesheet" type="text/css" href="{{asset('css/daterangepicker.css')}}?v=<?php echo $version;?>">
        <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}?v=<?php echo $version;?>">
        <link rel="stylesheet" type="text/css" href="{{asset('css/magnific-popup.css')}}?v=<?php echo $version;?>">
        <link rel="stylesheet" type="text/css" href="{{asset('css/perfect-scrollbar.css')}}?v=<?php echo $version;?>">
        <link rel="stylesheet" href="{{asset('css/main.css')}}?v=<?php echo $version;?>">
        <link rel="stylesheet" href="{{asset('css/util.css')}}?v=<?php echo $version;?>">
        @stack('css')
        @stack('izipay')
        @livewireStyles
        
        
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-M5MQ70F185"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-M5MQ70F185');
        </script>
        
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11405981562"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'AW-11405981562');
        </script>
        
         <!-- Codigos de reCAPTCHA V3-->
        <script src="https://www.google.com/recaptcha/api.js?render=6LeQBgAnAAAAAE9bFQtY5eGVH9hKHvyaxfa4NqMQ"></script>
          <!-- FIN-->
    </head>
    <body class="font-sans antialiased">
         <!-- Messenger plugin del chat Code -->
        <div id="fb-root"></div>

        <!-- Your plugin del chat code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>

        <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "105399988653606");
        chatbox.setAttribute("attribution", "biz_inbox");
        </script>

        <!-- Your SDK code -->
        <script>
        window.fbAsyncInit = function() {
            FB.init({
            xfbml            : true,
            version          : 'v16.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        
         <a class="btn-wasap mb-1" href="https://api.whatsapp.com/send?phone=51957233959&text=%C2%A1%C2%A1Hola!!%20Tengo%20%una%20%consulta" target="_blank">
            <i class="zmdi zmdi-whatsapp fs-40"></i>
        </a>

        <x-jet-banner />
        <div class="min-h-screen bg-gray-100"> 
            <!-- Page Heading -->
            <!-- Header -->
            <header class="header-v4">    
                @livewire('navigation') 
                @stack('buscador')
            </header> 
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            @livewire('footer') 
            <!-- Back to top -->
            <!--<div class="btn-back-to-top" id="myBtn">-->
            <!--    <span class="symbol-btn-back-to-top">-->
            <!--        <i class="zmdi zmdi-chevron-up"></i>-->
            <!--    </span>-->
            <!--</div> -->
        </div>
        @stack('modals')
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <!-- Scripts -->
        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('js/animsition.min.js')}}"></script>
        <script src="{{asset('js/popper.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>  
        <script src="{{asset('js/select2.min.js')}}"></script>
        <script src="{{asset('js/moment.min.js')}}"></script>
        <script src="{{asset('js/daterangepicker.js')}}"></script>
        <script src="{{asset('js/slick.min.js')}}"></script>
        <script src="{{asset('js/parallax100.js')}}"></script>
        <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('js/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('js/slick-custom.js')}}?v=<?php echo $version;?>"></script>
        <script src="{{asset('js/main.js')}}?v=<?php echo $version;?>"></script>
        <script src="{{asset('js/owl.carousel.js')}}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @livewireScripts
        <script>
            function dropdown(){
                return {
                    open: false,
                    show(){
                        if(this.open){
                            //Se cierra el menu
                            this.open = false;
                            document.getElementsByTagName('html')[0].style.overflow = 'auto'
                        }else{
                            //Esta abriendo el menu
                            this.open = true;
                            document.getElementsByTagName('html')[0].style.overflow = 'hidden'
                        }
                    },
                    close(){
                        this.open = false;
                        document.getElementsByTagName('html')[0].style.overflow = 'auto'
                    }
                }
            }
        </script>
        @stack('script')
        <script type="application/ld+json">
            {
                "@context" : "http://schema.org",
                "@type" : "LocalBusiness",
                "name" : "Libra International",
                "image" : "https://librainternational.com.pe/images/icons/logo-2.png",
                "telephone" : "+51 957233959",
                "url" : "https://librainternational.com.pe/",
                
                "address" : {
                    "@type" : "PostalAddress",
                    "streetAddress" : "AA.HH 8 de setiembre, calle Las Mercedes Lote 01",
                    "addressLocality" : "Tumbes",
                    "addressRegion" : "Departamento de Tumbes",
                    "addressCountry" : "Perú",
                    "postalCode" : "70600"
                },
                "review" : {
                    "@type" : "Review",
                    "reviewBody" : "Venta de maquinarias XCMG, lubricantes y repuestos",
                    "author": {
                        "@type": "LocalBusiness",
                        "name": "Onfleek Media"
                    }
                }
            }
        </script>
    </body>
</html>
