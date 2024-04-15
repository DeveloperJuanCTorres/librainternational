<x-app-layout>
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-100" style="background-image: url('images/banner-nosotros.webp');">
        <h2 class="ltext-105 cl0 txt-center">
            Nosotros
        </h2>
    </section>	
    <!-- Content page -->
	<section class="bg0 p-t-75 pb-5">
		<div class="container">
			<div class="row p-b-35">
				<div class="col-12 col-md-7 col-lg-7">
					<div class="p-t-7 p-r-20 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-10">
							Nuestra Historia
						</h3>

						<p class="stext-113 cl6 p-b-26">
						Libra International fue fundada en el año 2020 por el empresario Ricardo Li bravo. Somos una empresa dedicada a la venta de maquinaria y vehículos pesados, repuestos y lubricantes industriales. Somos los únicos distribuidores autorizados de XMCG en Perú. Nuestra historia está marcada por el compromiso, innovación, y responsabilidad para nuestros clientes y colaboradores.  Actualmente, nos encontramos presente en la región Tumbes. Somos una empresa en crecimiento con distribución a nivel nacional. 

 
						</p>
					</div>
				</div>
				<div class="col-12 col-md-5 col-lg-5 my-auto">
					<div class="hov-img1">
						<img src="{{asset('images/about1.webp')}}" alt="IMG">
					</div>
				</div>
			</div>
			
			<div class="row p-b-35">
				<div class="order-md-2 col-md-7 col-lg-7 ">
					<div class="p-t-7 p-l-15-lg p-l-0-md">
					    <h3 class="mtext-111 cl2 p-b-10 text-center">
							NUESTRO PROPÓSITO 
						</h3>
						<h3 class="mtext-111 cl2 p-b-10">
							Misión
						</h3>
						<p class="stext-113 cl6 p-b-26">
						Brindar un servicio personalizado en la venta de maquinaria pesada, repuestos y lubricantes.
						</p>
						<h3 class="mtext-111 cl2 p-b-10">
							Visión
						</h3>
						<p class="stext-113 cl6 p-b-26">
							Ser líderes en el mercado, con tecnología de punta en la venta de nuestra maquinaria pesada, revolucionando constantemente el mercado.
						</p>
					</div>
				</div>

				<div class="order-md-1 col-12 col-md-5 col-lg-5 m-lr-auto">
					<div class="hov-img1">
						<img src="{{asset('images/about2.webp')}}" alt="IMG">
					</div>
				</div>
			</div>
		</div>
	</section>	

    <section class="bg0 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-50 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Contactanos
						</h4>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text"  id="correo"name="email" placeholder="Tu correo electrónico">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>
						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="mensaje" id="mensaje" placeholder="¿Cómo podemos ayudarte?"></textarea>
						</div>
						<a class="text-white flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer Enviarconsulta">
							Enviar
							</a>
					</form>
				</div>
				<div class="size-210 bor10 flex-w flex-col-m p-lr-45 p-tb-30 p-lr-15-lg w-full-md">
                    <div class="flex-w w-full p-b-20">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.9976441167246!2d-80.43774309999999!3d-3.5880145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x90338dba25cd1b1d%3A0x71a8aff97d3af97c!2sLibra%20International%20Per%C3%BA%20-%20Tumbes!5e0!3m2!1ses-419!2spe!4v1681854232556!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <!--<img src="{{asset('images/map.png')}}" alt="">-->
                    </div>
					<div class="flex-w w-full p-b-20">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>
						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Dirección
							</span>
							<p class="stext-115 cl6 p-t-18">
                                AA.HH 8 de setiembre, calle Las Mercedes Lote 01 - Carretera San Juan de la Virgen., Tumbes, Peru
							</p>
						</div>
					</div>
					<div class="flex-w w-full p-b-20">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>
						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Teléfono
							</span>
							<p class="stext-115 cl1 size-213 p-t-18">
								+51 957 233 959
							</p>
						</div>
					</div>
					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>
						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Correo eletrónico
							</span>
							<p class="stext-115 cl1 size-213 p-t-18">
                                informes@librainternational.com.pe
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	@push('seo')
		<title>{{$seo['title']}}</title>
        <meta name="description" content="{{$seo['description']}}">
		<meta name="keywords" content="{{$seo['keywords']}}">
	@endpush

    @push('script')
        <script>
			let token_location = $('meta[name="csrf-token"]').attr('content');

			 $(function() {
			 	$(".Enviarconsulta").on('click',function () {
			 	    var email = $("#correo").val();
			 		var mensaje = $("#mensaje").val();
			 		
			 		
			 		if(email == ''){
						Swal.fire({
							icon:'warning',
							text: "Tienes que ingresar un correo eletrónico",
						});
						return false;
					}else{
						emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
						if (emailRegex.test(email) != true) {
							Swal.fire({
								icon:'warning',
								text: "Tiene que ingresar un correo valido",
							});
							return false;
						} 
					}

					if(mensaje == ''){
						Swal.fire({
							icon:'warning',
							text: "Tienes que ingresar un mensaje",
						});
						return false;
					}
					Swal.fire({
						header: '...',
						title: 'Cargando...',
						allowOutsideClick:false,
						didOpen: () => {
							Swal.showLoading()
						}
					});

			 		
					grecaptcha.ready(function() {
						grecaptcha.execute('6LeQBgAnAAAAAE9bFQtY5eGVH9hKHvyaxfa4NqMQ', {action: 'submit'}).then(function(token) {
						
							$.ajax({
								url: "/menssage",
								method: "post",
								dataType: 'json',
								data: {
									_token: token_location,
									email: email,
									mensaje: mensaje,
									g_recaptcha_response: token,
								},
								success: function (response) {   
									if (response.status) {
										Swal.fire({
											icon: 'success',
											title: response.msg

										})
									} else {
										Swal.fire({
											icon: 'warning',
											title: 'Oops...',
											text: response.msg,
										})
									}
									$("#correo").val('');
									$("#mensaje").val('');
								},
								error: function () {
									Swal.fire({
										icon: 'error',
										title: 'Oops...!!',
										text: 'Something went wrong!',
									})
								}
							});
							
						});
					});
			});
		 })
		</script>
    @endpush
</x-app-layout>