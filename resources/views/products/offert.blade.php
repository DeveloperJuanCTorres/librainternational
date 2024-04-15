<x-app-layout>
		<div class="sec-banner bg0 p-t-55 p-b-55">
			<div class="container">
				<div class="txt-center cl2 text-product mb-5" >
					<h2>Ofertas</h2>
                    <p class="stext-111">Aprovecha nuestras ofertas exclusivas para ti.</p>
				</div>

                <ul >
                    @forelse ($products as $product)
                       
                        <li  class=" bg-white border-2 border-gray-500 rounded-lg  shadow-lg">
                            <article class="d-md-flex">
                                <figure class="mb-0">
                                    <a href="{{route('products.show',$product)}}">
                                        <img class="w-img rounded-l-md" src="{{config('services.trading.url')}}/uploads/img/{{$product->image}}" alt="{{$product->name}}">
                                    </a>
                                </figure>
                                <div class="flex-1 py-4 px-6 flex flex-col">
                                    <div class="d-md-flex justify-between">
                                        <div >
                                            <a href="{{route('products.show',$product)}}">
                                                <h1 class="mtext-106 cl2">
                                                    {{ $product->name }}
                                                </h1>
                                            </a>
                                            <p class="mtext-106 cl3 mb-2">S/. {{ number_format($product->variation->first()->sell_price_inc_tax,2)}}
                                            
                                            </p>
                                            <p>{!! Str::limit($product->product_description,185)  !!}</p>
                                          
                                        </div>
                                        
                                    </div>

                                    <div class="mt-4 md:mt-auto">
                                        <a href="{{route('products.show',$product)}}" class="btn btn-atlifor-m">Ir a comprar</a>
                                    </div>
                                </div>
                            </article>
                        </li>
                    @empty
                        <li class="md:col-span-2 lg:col-span-4">
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Upss!,</strong>
                                <span class="block sm:inline"> No hay ninguna oferta por el momento</span>
                            </div>
                        </li>
                    @endforelse
                </ul>
            
				<div class="mt-4">

					{{$products->links("livewire::bootstrap")   }}
				</div>
        	</div>
		</div>

		@push('seo')
			<title>{{$seo['title']}}</title>
			<meta name="description" content="{{$seo['description']}}">
			<meta name="keywords" content="{{$seo['keywords']}}">
		@endpush
</x-app-layout>