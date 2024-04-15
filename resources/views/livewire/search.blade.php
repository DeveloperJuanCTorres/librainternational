<div class="flex-1 relative p-l-10 p-r-10" style="border: 2px solid #002E6A; border-radius: 15px;"  x-data>
    
    <form action="{{ route('search') }}" autocomplete="off">
        <x-jet-input name="name" wire:model="search" type="text" class="w-full border-none" placeholder="¿Qué producto estas buscando?"  />
        <button class="absolute top-0 right-0 w-12 h-full flex items-center justify-center rounded-r-md cl2 ">
            <i class="zmdi zmdi-search" style="font-size: 26px;"></i>
        </button>
    </form>


    <div class="absolute w-full mt-1 {{$open ? '' : 'hidden'}}" @click.away="$wire.open = false"> 
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                    @if($product->category->id == 1 || $product->category->id == 2)
                        <a href="{{ route('products.show', $product) }}" class="flex mb-2">
                            <img class="w-16 h-16 object-cover" src="{{config('services.trading.url')}}/uploads/img/{{$product->image}}" alt="">
                            <div class="ml-4 text-gray-700">
                                <p class="text-lg font-semibold leading-5">{{$product->name}}</p>
                                @if(isset($product->category->name))
                                <p>Categoria: {{$product->category->name}}</p> 
                                @endif
                            </div>
                        </a>
                    @else
                        <a href="{{ route('machinery.show', $product) }}" class="flex mb-2">
                            <img class="w-16 h-16 object-cover" src="{{config('services.trading.url')}}/uploads/img/{{$product->image}}" alt="">
                            <div class="ml-4 text-gray-700">
                                <p class="text-lg font-semibold leading-5">{{$product->name}}</p>
                                @if(isset($product->category->name))
                                <p>Categoria: {{$product->category->name}}</p> 
                                @endif
                            </div>
                        </a>
                    @endif
                @empty
                    <p class="text-lg leading-5">
                        No existe ningún registro con los parametros especificados
                    </p>
                @endforelse
            </div>
        </div> 
    </div>  
    
</div> 