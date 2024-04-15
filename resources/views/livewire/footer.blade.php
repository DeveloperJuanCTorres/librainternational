<footer>
    <div class="footer-contact">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 d-flex align-items-center">
                    <div class="my-4 ml-3">
                        <h1 class="text-amarillo">CONSULTA A NUESTRO</h1>
                        <h1 class="title-atlifor-b mb-3">ASESOR DE VENTAS</h1>
                        <a href="mailto:informes@librainternational.com.pe" class="btn btn-atlifor-m">
                            <div class="px-2"> <i class="zmdi zmdi-email"></i> Enviar mail</div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <img src="{{asset('images/vendedor.png')}}" class="img-hobrero mx-auto" alt="hobrero">	
                </div>
            </div>
        </div>
    </div>

    <div class="bgwhite">
        <div class="container mb-5">
            <div class="row pt-4">
                <div class="col-sm-6 col-lg-3 p-b-40">
                    <div class="px-5 text-center">
                        <img src="/images/icons/logo-2.png"  alt="img-footer" class="img-footer mx-auto">
                    </div>
                </div>

                <div class="col-sm-6 col-lg-2 p-b-30 display-movil">
                    <h4 class="stext-301 cl0 p-b-20">
                        Sobre nosotros
                    </h4>
                    <ul class="pl-0">
                        <li class="p-b-5">
                            <a href="{{route('about')}}" class="stext-107 cl2 hov-cl1 trans-04">
                                Acerca de Libra International
                            </a>
                        </li>
                        <li class="p-b-5">
                            <a href="{{route('conditions')}}" class="stext-107 cl2 hov-cl1 trans-04">
                                 Términos y Condiciones
                            </a>
                        </li>
                        <!-- <li class="p-b-5">
                            <a href="route('devoluciones')" class="stext-107 cl2 hov-cl1 trans-04">
                               Devoluciones
                            </a>
                        </li> -->
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-2 p-b-30">
                    <h4 class="stext-301 cl0 p-b-20">
                        Cuenta
                    </h4>

                    <a href="{{ route('profile.show') }}">
                        <p class="stext-107 cl2 size-201" >Mi Cuenta</p>
                    </a>
                    <a href="{{ route('orders.index') }}" >
                        <p class="stext-107 cl2 size-201" >Seguimiento de pedidos</p>
                    </a>
                </div>

                <div class="col-sm-6 col-lg-2 p-b-30">
                    <h4 class="stext-301 cl0 p-b-20">
                        Contáctanos
                    </h4>
                    <p class="stext-107 cl2 size-201" >
                        <i class="zmdi zmdi-phone"></i> +51 957233959
                    </p>
                    <!-- <p class="stext-107 cl2 size-201 mt-2">
                        <i class="fa fa-envelope" aria-hidden="true"></i> contact@libra.com
                    </p> -->
                </div>

                <div class="col-sm-6 col-lg-2 p-b-30">
                    <h4 class="stext-301 cl0 ">
                       Entérate más:
                    </h4>
                    <div class="p-t-20 text-center">
                        <a href="https://www.facebook.com/XCMGlibrainternationalperu?mibextid=ZbWKwL" target="_blank" class="redes-sociales cl12 hov-cl1 trans-04 m-r-16" >
                            <i class="zmdi zmdi-facebook" style="padding-top: 7px;"></i>
                        </a>
                        <a href="https://www.instagram.com/xcmglibrainternational/" target="_blank" class="redes-sociales cl12 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-instagram" style="padding-top: 7px;"></i>
                        </a>
                        <a href="https://twitter.com/librainternati3" target="_blank" class="redes-sociales cl12 hov-cl1 trans-04 m-r-16">
                            <i class="zmdi zmdi-twitter" style="padding-top: 7px;"></i>
                        </a>
                    </div>
                    
                </div>
            </div>

            <div class="p-t-40 p-3">
                <div class="flex-c-m flex-w p-b-18">
                    <a href="#" class="m-all-1">
                        <img src="/images/icons/icon-pay-01.png" alt="ICON-PAY">
                    </a>
                    <a href="#" class="m-all-1">
                        <img src="/images/icons/icon-pay-02.png" alt="ICON-PAY">
                    </a>
                    <a href="#" class="m-all-1">
                        <img src="/images/icons/icon-pay-03.png" alt="ICON-PAY">
                    </a>
                    <a href="#" class="m-all-1">
                        <img src="/images/icons/icon-pay-04.png" alt="ICON-PAY">
                    </a>
                    <a href="#" class="m-all-1">
                        <img src="/images/icons/icon-pay-05.png" alt="ICON-PAY">
                    </a>
                </div>
                <p class="stext-107 cl2 txt-center">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> “Libra International”. Creado por <a href="https://onfleekmedia.com/" target="_blank">Onfleek Media</a>	
                </p>
            </div>
        </div>
    </div>
    </div>
</footer>
