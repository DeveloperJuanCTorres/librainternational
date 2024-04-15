<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 ">
        <aside class="px-1">
            <h2 class="mtext-106 cl11"> <i class="zmdi zmdi-filter-list"></i> Filtros </h2>
            <div class="flex-w p-t-4 m-r--5 mb-3">
                
                @if(!is_null($marca))
                <a href="javascript:void(0);" wire:click="limpiarmarca" class="mt-1 stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                <i class="zmdi zmdi-close"></i>
                    {{$marca}} 
			    </a>
                @endif

                @if(!is_null($price))
                <a href="javascript:void(0);" wire:click="limpiarprice" class="mt-1 stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                <i class="zmdi zmdi-close"></i>
                    @switch($price)
                        @case(1)
                                S/.0.00 - S/.50
                            @break
                        @case(2)
                                S/.50 - S/.100
                            @break
                        @case(3)
                                S/.100 - S/.200
                            @break
                        @case(4)
                                S/.200 - S/.500
                            @break
                        @case(5)
                            S/.500 - S/.1000
                            @break
                        @case(6)
                            S/.1000 - S/.2000
                            @break
                        @case(7)
                            S/.2000.00 +
                            @break
                    @endswitch
			    </a>
                @endif

            </div>

            <x-jet-button class="mb-4 btn btn-primary bor1 size-102 bg-purpura" wire:click="limpiar">
                Limpiar filtros
            </x-jet-button><br>
            <div class="mb-3">
                <h4 class="mtext-112 cl11 p-b-10">
                    Marcas
                </h4>
                <ul>
                    @foreach($marcas as $key=>$item)
                    <li class="bor18">
                        <a class="cursor-pointer stext-115 {{ $marca == $item->name ? 'font-semibold title-atlifor-v' : ''}}"
                                wire:click="$set('marca', '{{$item->name}}')">
                            {{$item->name}} <span> ({{$item->products->where('category_id',$category->id)->count()}})</span> 
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            
            <div>
                <h4 class="mtext-112 cl11 p-b-10">
                    Precios
                </h4>
                <ul>
                    <li class="bor18">
                        <a class="cursor-pointer stext-115 {{ $price == 1 ? 'font-semibold title-atlifor-v' : ''}}"
                            wire:click="$set('price', 1)">
                            S/.0.00 - S/.50
                        </a>
                    </li>

                    <li class="bor18">
                        <a class="cursor-pointer stext-115 {{ $price == 2 ? 'font-semibold title-atlifor-v' : ''}}"
                            wire:click="$set('price', 2)">
                            S/.50 - S/.100
                        </a>
                    </li>

                    <li class="bor18">
                        <a class="cursor-pointer stext-115 {{ $price == 3 ? 'font-semibold title-atlifor-v' : ''}}"
                            wire:click="$set('price', 3)">
                            S/.100 - S/.200
                        </a>
                    </li>

                    <li class="bor18">
                        <a class="cursor-pointer stext-115 {{ $price == 4 ? 'font-semibold title-atlifor-v' : ''}}"
                            wire:click="$set('price', 4)">
                            S/.200 - S/.500
                        </a>
                    </li>

                    <li class="bor18">
                        <a class="cursor-pointer stext-115 {{ $price == 5 ? 'font-semibold title-atlifor-v' : ''}}"
                            wire:click="$set('price', 5)">
                            S/.500 - S/.1000
                        </a>
                    </li>


                    <li class="bor18">
                        <a class="cursor-pointer stext-115 {{ $price == 6 ? 'font-semibold title-atlifor-v' : ''}}"
                            wire:click="$set('price', 6)">
                            S/.1000 - S/.2000
                        </a>
                    </li>

                    <li class="bor18">
                        <a class="cursor-pointer stext-115 {{ $price == 7 ? 'font-semibold title-atlifor-v' : ''}}"
                            wire:click="$set('price', 7)">
                            S/.2000 +
                        </a>
                    </li>
                </ul>
            </div>

            
        </aside>

        <div class="md:col-span-2 lg:col-span-4">
            <div class="txt-center cl2 text-product" >
				<h2>{{$category->description}}</h2>
			</div>
            <div class="flex-w flex-sb-m p-b-35">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <h4 class="cl2 p-b-10 mt-4 mtext-108 ">{{$cantidad}} Productos</h4>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m pointer m-l-8 m-r-8 m-tb-4 ">
                        <select wire:model="order" style="border-color:#d6d7d8; ">
							<option value="" selected disabled>Organizar</option>
                            <option value="1">Nombre: A-Z</option>
                            <option value="2">Nombre: Z-A</option>
						</select>
					</div>
					<!-- <div class="flex-c-m pointer m-tb-4 ">
                        <div class="hidden md:block grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-500">
                            <i class="zmdi zmdi-grid  cursor-pointer {{ $view == 'grid' ? 'cl1' : ''}}" wire:click="$set('view', 'grid')" style="padding: 0.8rem!important;"> </i>
                            <i class="zmdi zmdi-view-day  cursor-pointer {{ $view == 'list' ? 'cl1' : ''}}" wire:click="$set('view', 'list')" style="padding: 0.8rem!important;"> </i>
                        </div>
					</div> -->
				</div>		
			</div>

            @if ($view == 'grid')
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse ($products as $item)
                        <div class="item pb-3" style="border: 1px solid #002E6A;border-radius: 20px;">
                            <!-- Product-1 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0" style="max-height: 350px;">
                                    <a href="{{route('products.show',$item)}}">
                                        <!-- <img src=" " alt="IMG-PRODUCT"> -->
                                        <img src="{{config('services.trading.url')}}/uploads/img/{{$item->image}}" alt="IMG-PRODUCT">
                                    </a>
                                    <a href="{{route('products.show',$item)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg6 bor2 hov-btn1 p-lr-15 trans-04">
                                        Ver detalle
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l">
                                        <div class="px-2">
                                            <a href="{{route('products.show',$item)}}">
                                                <h3 class="stext-104 cl2 text-center">{{Str::limit($item->name,40)}}</h3>
                                            </a>
                                        </div>
                                        <div class="mx-auto mb-1">
                                            @if($item->brand)
                                                <p class="cl2"> {{$item->brand->name}}</p> 
                                            @else
                                                Sin marca
                                            @endif
                                        </div>
                                        <div class="mx-auto stext-105 cl2 mb-2">
                                          <span class="stext-106">Precio</span>
                                            <span class="stext-106 cl11">S/.{{ number_format($item->variation->first()->sell_price_inc_tax,2) }}</span>
                                        
                                        </div> 
                                        <!-- livewire('add-cart-item',['product'=>$item]) -->
                                    </div>
                                </div>
                            </div>
                            <!-- Fin Product-1 -->	
                        </div>
                    @empty
                        <li class="md:col-span-2 lg:col-span-4">
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Upss!,</strong>
                                <span class="block sm:inline"> No hay ningún producto con este filtro</span>
                            </div>
                        </li>
                    @endforelse
                </ul>
            @else
                <ul>
                    @forelse ($products as $product)
                        <x-product-list :product="$product" />
                    @empty
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Upss!,</strong>
                            <span class="block sm:inline"> No hay ningún producto con este filtro</span>
                        </div>
                    @endforelse
                </ul>
            @endif
            <div class="mt-4">
               <!-- $products->links("pagination::bootstrap-4") -->
                {!! $products->links("livewire::bootstrap") !!} 
            </div>
        </div>
    </div>
</div>