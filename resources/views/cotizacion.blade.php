<x-app-layout>
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-100" style="background-image: url('images/COTIZACION_2.webp');">
        <h2 class="ltext-105 cl0 txt-center">Cotización</h2>
    </section>	
   <section class="bg0 p-t-65 pb-5">
		<div class="container">
			<h1 class="ltext-103 cl2 txt-center mb-4">Nuestras máquinas</h1>
			<div class="row">	
                @foreach($machinaries as $machinary)
                    <div class="col-md-6 col-lg-3 p-b-30 ">
                        <!-- Block1 -->
                        <div class="block1 wrap-pic-w">
                            <img src="{{config('services.trading.url')}}/uploads/img/{{$machinary->image}}" alt="IMG-PRODUCT"> 
                            <a href="{{route('machinery.show',$machinary)}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                                <div class="block1-txt-child1 flex-col-l xcmg">
                                    <span class="block1-name ltext-102 trans-04 p-b-8">
                                        {{$machinary->name}}
                                    </span>
                                </div>

                                <div class="block1-txt-child2 p-b-4 trans-05">
                                    <div class="block1-link stext-101 cl0 trans-09">
                                        Ver detalle
                                    </div>
                                </div>
                            </a>
                        </div>
                        <p class="text-center mt-2 stext-104 cl2">{{$machinary->name}}</p>
                    </div>
                @endforeach
			</div>
		</div>
	</section>	
    <!-- Content page -->
	<section class="bg6">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12 col-md-5 col-lg-5 px-0">
					<img src="{{asset('images/Imagen-cotizador-2.webp')}}" width="100%" alt="">
				</div>
                <div class="col-12 col-md-7 col-lg-7">
                    <form action="" class="my-4 mx-2">
						<h4 class="mtext-105 cl2 txt-center">
							Cotiza con nosotros
						</h4>
						<p class="stext-111 text-white p-b-30 text-center">Déjanos tus datos para comunicarnos contigo</p>
						<div class=" m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text"  id="nombre" name="nombre" placeholder="Nombre *">
							<img class="how-pos4 pointer-none" src="images/icons/Nombre.png" alt="ICON">
						</div>
                        <div class=" m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="number"  id="telefono" name="telefono" placeholder="Número de Teléfono *">
							<img class="how-pos4 pointer-none"  src="images/icons/Telefono.png" alt="ICON">
						</div>
                        <div class=" m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text"  id="correo" name="correo" placeholder="Correo electrónico (opc.)">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>
                        <div class=" m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="number"  id="ruc" name="ruc" placeholder="RUC *">
							<img class="how-pos4 pointer-none" src="images/icons/RUC.png" alt="ICON">
						</div>
						<div class=" m-b-20 how-pos4-parent">
							<select class="js-select2 size-116 stext-111" id="maquinaria" name="maquinaria">
								<option selected disabled >Selecciona una Maquinaria</option>
								@foreach($machinaries as $machinary)
									<option value="{{$machinary->name}}">{{$machinary->name}}</option>
								@endforeach
							</select>	
						</div>
						<a class=" text-white flex-c-m stext-101 cl0 size-121 bg3 bor1  p-lr-15 trans-04 pointer Enviarcotizacion" >
							Enviar
						</a>
					</form>
                </div>
			</div>
		</div>
	</section>	
	<section class="bg0 p-t-50 pb-5">
		<h2 class="mtext-105 cl2 txt-center">Encuntranos en nuestra sede</h2>
		<p class="text-center mb-4">Distribuidor oficial de XCMG</p>
		
		<div class="card mx-auto" style="width: 23rem;">
			<div class="card-body">
				<h4 class="card-title text-center">Dirección</h4>
				<p class="card-text text-center mb-2">AA.HH 8 de setiembre, calle Las Mercedes Lote 01 - Carretera San Juan de la Virgen., Tumbes, Peru</p>
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
			 	$(".Enviarcotizacion").on('click',function () {

					var nombre = $("#nombre").val();
			 		var telefono = $("#telefono").val();
                    var correo = $("#correo").val();
                    var ruc = $("#ruc").val();
                    var maquinaria = $("#maquinaria").val();

					if(nombre == ''){
						Swal.fire({
							icon:'warning',
							text: "Ingresar tu nombre completo",
						});
						return false;
					}

				   if(telefono == ''){
						Swal.fire({
							icon:'warning',
							text: "Ingresa un número de teléfono",
						});
						return false;
					}else{
						if(telefono.length != 9){
							Swal.fire({
								icon:'warning',
								text: "Ingresa un número de teléfono de 9 dígitos",
							});
							return false;
						}
					}
					
					if(ruc == ''){
						Swal.fire({
							icon:'warning',
							text: "Ingresar tu RUC",
						});
						return false;
					}
					
					if(maquinaria == '' || maquinaria === null){
						Swal.fire({
							icon:'warning',
							text: "Selecciona una maquinaria",
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
								url: "/menssagecotizacion",
								method: "post",
								dataType: 'json',
								data: {
									_token: token_location,
									nombre: nombre,
									telefono: telefono,
                                    correo: correo,
                                    ruc: ruc,
                                    maquinaria: maquinaria,
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
									$("#nombre").val('');
									$("#telefono").val('');
                                    $("#correo").val('');
									$("#ruc").val('');
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
		 });
		</script>
    @endpush

</x-app-layout>