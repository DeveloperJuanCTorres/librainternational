<div class="container py-8">
    <x-table-responsive>

        @if (count(Cart::getContent()) > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="pl-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            &nbsp; Eliminar
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Precio
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cantidad
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach (Cart::getContent() as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                         
                                <div class="ml-5">
                                    <a href="javascript:void(0);" class="text-secondary"
                                        wire:click="delete('{{$item->id}}')"
                                        wire:loading.class="text-red-600 opacity-25"
                                        wire:target="delete('{{$item->id}}')">
                                        <i class="zmdi zmdi-close" style="font-size: 22px"></i>
                                    </a>
                                </td>
                             </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-20 w-20">
                                        <img src="{{config('services.trading.url')}}/uploads/{{$item->attributes->image}}" alt="IMG-PRODUCT"> 	  
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ Str::limit($item->name,85)}}
                                        </div>
                                        
                                            @if($item->attributes->variante != 'DUMMY')
                                            <div class="text-sm text-gray-500">
                                                {{ Str::limit($item->attributes->variante,25)}}
                                            </div>
                                            @endif
                                      
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">
                                    <span>  S/. {{number_format($item->price,2) }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">
                                    @livewire('update-cart-item', ['rowId' => $item->id], key($item->id)) 
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="text-sm text-gray-500">
                                    S/. {{number_format(Cart::get($item->id)->getPriceSum(),2) }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="px-6 py-4">
                <a href="javascript:void(0);" class="btn btn-outline-danger" 
                    wire:click="destroy">
                    <i class="zmdi zmdi-delete" style="font-size: 18px"></i>
                    &nbsp; Limpiar el carrito
                </a>
            </div>

        @else
            <div class="flex flex-col items-center">
                <p class="text-lg text-gray-700 mt-4">Tu carrito está vacio</p>
                <a href="/" class="mt-4 px-16 bor1 size-102">
                   Ir a inicio
                </a>
            </div>
        @endif
    <!-- This example requires Tailwind CSS v2.0+ -->
    </x-table-responsive>

    @if (Cart::getContent()->count())
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-700">
                        <span class="font-bold text-lg ">Total:</span>
                         S/. {{number_format(Cart::getSubTotal(),2)}}
                    </p>
                </div>
                <div>
                    <a href="{{route('orders.create')}}" class="title-atlifor-m">
                        Continuar &nbsp; <i class="zmdi zmdi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- @push('header')
		<header class="header-v4">
	@endpush -->

</div>
