<x-app-layout>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        @if($transaction->shipping_status != 'cancelled')
            <div class="bg-white rounded-lg shadow-lg px-10 py-8 mb-6 flex items-center">
                <div class="relative">
                    <div class="{{ ($transaction->shipping_status == 'ordered' ||  $transaction->shipping_status == 'packed' ||  $transaction->shipping_status == 'shipped' || $transaction->shipping_status == 'delivered' ) ? 'bg-blue-400' : 'bg-gray-400' }}  rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="zmdi zmdi-check text-white"></i>
                    </div>
                    <div class="absolute -left-1.5 mt-0.5">
                        <p>Recibido</p>
                    </div>
                </div>
                <div class="{{ ($transaction->shipping_status == 'packed' ||  $transaction->shipping_status == 'shipped' || $transaction->shipping_status == 'delivered' ) ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2"></div>
                <div class="relative">
                    <div class="{{ ($transaction->shipping_status == 'packed' ||  $transaction->shipping_status == 'shipped' || $transaction->shipping_status == 'delivered' ) ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="zmdi zmdi-dropbox text-white"></i>
                    </div>

                    <div class="absolute -left-1 mt-0.5">
                        <p>Empacado</p>
                    </div>
                </div>
                <div class="{{ ($transaction->shipping_status == 'shipped' || $transaction->shipping_status == 'delivered' ) ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2"></div>
                <div class="relative">
                    <div class="{{ ($transaction->shipping_status == 'shipped' || $transaction->shipping_status == 'delivered' ) ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="zmdi zmdi-truck text-white"></i>
                    </div>
                    <div class="absolute -left-2 mt-0.5">
                        <p>Enviado</p>
                    </div>
                </div>

                <div class="{{ ($transaction->shipping_status == 'delivered' ) ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2"></div>
                <div class="relative">
                    <div class="{{ ($transaction->shipping_status == 'delivered' ) ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="zmdi zmdi-markunread-mailbox text-white"></i>
                    </div>
                    <div class="absolute -left-2 mt-0.5">
                        <p>Entregado</p>
                    </div>
                </div>
            </div>
           
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
                <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                    Orden-{{ $transaction->id }}</p>
                @if ($transaction->status == 'ordered')
                    <x-button-enlace class="ml-auto" href="{{route('orders.payment', $transaction)}}">
                        Ir a pagar
                    </x-button-enlace>
                @endif
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    @if($transaction->shipping_charges == 0)
                        <p class="text-lg font-semibold uppercase">Dirección</p>
                        <b class="text-sm">Los productos serán recogidos en:</b>
                        <p class="text-sm">{{$transaction->shipping_address}}</p>
                    @else
                        <p class="text-lg font-semibold uppercase">Envío</p>
                        <b class="text-sm">Los productos serán enviados a:</b>
                        <p class="text-sm">{{$transaction->shipping_address}}</p>
                    @endif
                
                </div>

                <div>
                    <p class="text-lg font-semibold uppercase">El comprobante se emitira a:</p>
                    <p class="text-sm"> <b>Nombre:</b> {{ $transaction->shipping_custom_field_2 }}</p>
                    <p class="text-sm"> <b>Documento:</b> {{ $transaction->shipping_custom_field_3 }}</p>
                    <p class="text-sm"> <b>Tipo de comprobante:</b> {{ $transaction->shipping_custom_field_4}}</p>
                    <p class="text-lg font-semibold uppercase mt-1">Persona que recibirá el pedido</p>
                    <p class="text-sm"> <b>Nombre:</b> {{ $transaction->delivered_to }} <b class="ml-1"> DNI:</b>  {{ $transaction->shipping_custom_field_1 }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4">Resumen</p>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                 @if(empty($item->product))
                                    El producto ya no existe
                                @else
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{config('services.trading.url')}}/uploads/img/{{$item->product->image}}" alt="IMG-PRODUCT">
                                    <article>
                                        <h5 class="font-bold">{{ $item->product->name }}</h5>
                                        @if($item->variation->name !='DUMMY')
                                            <div class="flex text-xs"> {{ $item->variation->name }} </div>
                                        @endif
                                    </article>
                                </div>
                                @endif
                            </td>

                            <td >
                               S/. {{ number_format($item->unit_price,2) }}
                            </td>

                            <td class="text-center" >
                                {{ number_format($item->quantity,0) }}
                            </td>

                            <td>
                             S/. {{ number_format($item->unit_price * $item->quantity,2) }}
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <td class="pt-1">
                            <div class="flex">&nbsp;
                                <b>Total: </b>&nbsp; S/. {{number_format($transaction->total_before_tax,2) }}
                                &nbsp;&nbsp;<b>Delivery: </b>&nbsp;
                                @if($transaction->shipping_charges == 0)
                                    Gratis
                                @else
                                    S/. {{number_format($transaction->shipping_charges,2) }} 
                                @endif
                            </div>
                        </td>
                        <td class="pt-1"></td>
                        <td class="pt-1"></td>
                        <td class="pt-1"> 
                            <b>  S/. {{number_format($transaction->final_total,2) }} </b>
                        </td>
                    </td>

                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>