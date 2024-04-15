<x-app-layout>
	<!-- Home MOVIL -->
	<section class="section-movil bg1 ">
		<!-- 	<div class="container h-full">-->
			<img src="/images/home/banner_celular.webp" height="100%"  alt="">
		<!-- </div>-->
	</section>
	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 carrouel-home-1">
					<div class="container"></div>
				</div>

				<div class="item-slick1 carrouel-home-2">
					<div class="container"></div>
				</div>

				<div class="item-slick1 carrouel-home-3">
					<div class="container"></div>
				</div> 
			</div>
		</div>
	</section>


	<section class="bg2">  
		<div class="container">
			<div class="row justify-content-center py-5">

				<div class="col-lg col-6 ">
					<div class="p-2 text-center">
						<img src="{{asset('/images/icons/icon-tienda.png')}}" width="40px" alt="icono telefono" class="mx-auto">
						<b class="mt-2 title-atlifor-m">Retiro en tienda</b>
						<p class="color-blue">Retirar tu pedido en nuestra tienda</p>
					</div>
				</div>

				<div class="col-lg col-6 ">
					<div class="p-2 text-center">
						<img src="{{asset('/images/icons/icon-delivery.png')}}" width="40px" alt="icono telefono" class="mx-auto">
						<b class="mt-2 title-atlifor-m">
							Delivery
						</b>
						<p  class="color-blue">
							Envío rápido
						</p>
					</div>
				</div>

				<div class="col-lg col-6 ">
					<div class="p-2 text-center">
						<img src="{{asset('/images/icons/icon-corazon.png')}}" width="40px" alt="icono telefono" class="mx-auto">
						<b class="mt-2 title-atlifor-m">
							Pagos seguros
						</b>
						<p  class="color-blue">
							¡Procesos seguros!
						</p>
					</div>
				</div>

				<div class="col-lg col-6">
					<div class="p-2 text-center">
						<img src="{{asset('/images/icons/icon-phone.png')}}" width="40px" alt="icono telefono" class="mx-auto">
						<b class="mt-2 title-atlifor-m">
							Soporte 24/7
						</b>
						<p  class="color-blue">
							Obtenga soporte todo el día
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Banner -->
	<div class="sec-banner bg0">
		<div class="flex-w flex-c-m">
			<div class="size-202 m-lr-auto respon4">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="images/maquinaria.png" alt="IMG-BANNER">

					<a href="{{route('machinery')}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								Maquinarias
							</span>
							<!-- <span class="block1-info stext-102 trans-04">Nuevos productos</span> -->
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Ver categoría
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="size-202 m-lr-auto respon4">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="images/lubricantes-home.png" alt="IMG-BANNER">

					<a href="{{route('categories.show',$lubricantes)}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								{{$lubricantes->name}}
							</span>
							<!-- <span class="block1-info stext-102 trans-04">Nuevos productos</span> -->
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Ver categoría
							</div>
						</div>
					</a>
				</div>
			</div>

			<div class="size-202 m-lr-auto respon4">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="images/repuestos-home.png" alt="IMG-BANNER">

					<a href="{{route('categories.show',$repuestos)}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
								{{$repuestos->name}}
							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Ver categoría
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	
	<section class="bg2"> 
		<div class="container">
			<div class="row justify-content-center py-4">


				<div class="col-lg col-4 ">
					<div class="p-2 text-center">
						<img src="{{asset('/images/icons/icon-qwann.png')}}" width="55px" alt="icono telefono" class="mx-auto">

					</div>
				</div>

				<div class="col-lg col-4 ">
					<div class="p-2 text-center">
						<img src="{{asset('/images/icons/icon-armour.png')}}" width="55px" alt="icono telefono" class="mx-auto">

					</div>
				</div>
				
				<div class="col-lg col-4 ">
					<div class="p-2 text-center">
						<img src="{{asset('/images/icons/icon-gulf.png')}}" width="55px" alt="icono telefono" class="mx-auto">

					</div>
				</div>

				<div class="col-lg col-4">
					<div class="p-2 text-center">
						<img src="{{asset('/images/icons/icon-xcmg.png')}}" width="55px" alt="icono telefono" class="mx-auto">
					</div>
				</div>

				<div class="col-lg col-4">
					<div class="p-2 text-center">
						<img src="{{asset('/images/icons/icon-mobil.png')}}" width="55px" alt="icono telefono" class="mx-auto">
					</div>
				</div>


				<div class="col-lg col-4">
					<div class="p-2 text-center">
						<img src="{{asset('/images/icons/icon-kapsen.png')}}" width="55px" alt="icono telefono" class="mx-auto">
					</div>
				</div>

					<div class="col-lg col-4">
					<div class="p-2 text-center">
						<img src="{{asset('/images/icons/icon-repsol.png')}}" width="55px" alt="icono telefono" class="mx-auto">
					</div>
				</div>
			
			</div>
		</div> 
	</section>

	<section class="bg0 pt-5"> 
		<div class="container">
			
				<div class="p-t-20 p-b-15 text-center">
					<h1 class="ltext-103 cl2 mb-2">
						Venta de Maquinarias XCMG, lubricantes y repuestos en un solo lugar
					</h1>
					<p class="stext-111">
						

						
						Conoce nuestra amplia variedad en Venta de Maquinarias XCMG, lubricantes y repuestos para maquinarias, todo reunido en un solo lugar con envíos a todo el Perú. 
					
					</p>
				</div>
			
		</div>
	</div>

	</section>
	@if(!is_null($lubricantes))
		@if($lubricantes->products->count())
			@livewire('carrousel-products',['carrousel'=> $lubricantes])
		@endif	
	@endif
	
	@if(!is_null($llantas))
		@if($llantas->products->count())
			@livewire('carrousel-products',['carrousel'=> $llantas])
		@endif	
	@endif
	
	@if(!is_null($filtros))
		@if($filtros->products->count())
			@livewire('carrousel-products',['carrousel'=> $filtros])
		@endif	
	@endif

	@if(!is_null($repuestos))
		@if($repuestos->products->count())
			@livewire('carrousel-products',['carrousel'=> $repuestos])
		@endif	
	@endif


	<div class="bg0 h-20"></div>
	@push('css')
		<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/carrousel-simple.css')}}">
	@endpush

	@push('script')
		<script>
			livewire.on('gilder',function(){
				$('.carrousel').owlCarousel({
					loop:true,
					margin:22,
					nav:true,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:3
						},
						1000:{
							items:4
						},

						1500:{
							items:5
						}
					}
				});
			});
		</script>
	@endpush

	@push('buscador')
		<div class="bg-white px-3 py-1 wrap-header-mobile">
             @livewire('search')
        </div>
	@endpush
	
	@push('seo')
		<title>{{$seo['title']}}</title>
        <meta name="description" content="{{$seo['description']}}">
		<meta name="keywords" content="{{$seo['keywords']}}">
	@endpush

</x-app-layout>