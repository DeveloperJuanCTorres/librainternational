<div>
     @push('izipay')
        <!-- Javascript library. Should be loaded in head section -->
        <script 
        src="https://static.micuentaweb.pe/static/js/krypton-client/V4.0/stable/kr-payment-form.min.js" 
        kr-public-key="96439015:publickey_dMc6wTvcWc0DYUDeg6Oz4a47bhk0IhF50LNfvPjNSCb5M" 
        kr-post-url-success="{{route('paid.izipay')}}">
        </script>
        <!-- theme and plugins. should be loaded after the javascript library -->
        <!-- not mandatory but helps to have a nice payment form out of the box -->
        <link rel="stylesheet" href="https://static.micuentaweb.pe/static/js/krypton-client/V4.0/ext/classic-reset.css">
        <script src="https://static.micuentaweb.pe/static/js/krypton-client/V4.0/ext/classic.js"></script> 
    @endpush

    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-5 gap-6 container py-8">
        <div class="order-2 lg:order-1 xl:col-span-3">
            
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
                <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden :</span> Orden-{{ $transaction->id }}</p>
                <input type="hidden" id="idorder" value="{{$transaction->id}}" >
            </div>

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
                <x-table-responsive>
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="px-2"> Precio</th>
                            <th class="px-2"> Cantidad </th>
                            <th class="px-2"> Total </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($items as $item)
                            <tr>
                                <td class="pt-2">
                                    <div class="flex">
                                        <img class="h-15 w-20 object-cover mr-4" src="{{config('services.trading.url')}}/uploads/img/{{$item->product->image}}" alt="IMG-PRODUCT">
                                        <article style="min-width: 200px;">
                                            <h5>{{$item->product->name }}</h5>
                                            @if($item->variation->name !='DUMMY')
                                                <div class="flex text-xs"> {{ $item->variation->name }} </div>
                                            @endif
                                        </article>
                                    </div>
                                </td>

                                <td class="text-center px-2 pt-2">
                                    S/. {{ number_format($item->unit_price,2) }}
                                </td>

                                <td class="text-center px-2 pt-2">
                                    {{ number_format($item->quantity,0) }}
                                </td>

                                <td class="text-center px-2 pt-2">
                                    S/. {{ number_format($item->unit_price * $item->quantity,2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-table-responsive>
            </div>
        </div>

        <div class="order-1 lg:order-2 xl:col-span-2">
            <div class="bg-white rounded-lg shadow-lg px-6 pt-6">
                <div class="flex justify-between items-center mb-3">
                    <img class="h-8" src="{{ asset('/images/MC_VI_DI_2-1.png') }}" alt="">
                    <div class="text-gray-700 pl-2 text-right">
                        @if($transaction->shipping_charges <> 0)
                            <p class="text-sm font-semibold">
                                Subtotal: S/. {{number_format($transaction->total_before_tax,2) }}
                            </p>
                            <p class="text-sm font-semibold">
                                Envío: S/. {{number_format($transaction->shipping_charges,2) }} 
                            </p>
                        @endif
                        <p class="text-lg font-semibold uppercase">
                            Total: S/. {{number_format($transaction->final_total,2) }} 
                        </p>
                    </div>
                </div>
                <div class="pb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                <div class="col" >
                                    <!-- <h3 class="text-lg font-bold text-center">Metodo de Pago</h1> -->
                                    <div class="h-12 bgizipay">
                                        <img class="h-10 mx-auto pt-2" src="{{ asset('/images/logo_izipay.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div>
                                @if(isset($formToken))
                                    <!-- payment form -->
                                    <div class="kr-embedded"  kr-form-token="{{$formToken}}" style="width:100%">
                                        <!-- payment form fields -->
                                        <div class="kr-pan"></div>
                                        <div class="kr-expiry"></div>
                                        <div class="kr-security-code"></div>  
                                        <!-- payment form submit button -->
                                        <button class="kr-payment-button"></button>
                                        <!-- error zone -->
                                        <div class="kr-form-error"></div>
                                    </div>
                                @else
                                    <h3>Error</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>