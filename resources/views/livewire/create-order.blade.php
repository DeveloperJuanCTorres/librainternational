<div class="container py-8 grid lg:grid-cols-2 xl:grid-cols-5 gap-6">
    <div class="order-2 lg:order-1 lg:col-span-1 xl:col-span-3">
         @if (Cart::getContent()->count())
            <div class="bg-white rounded-lg shadow p-6">
                
            

                <label class=" flex items-center cursor-pointer">
                    <p class="mb-2 text-lg text-gray-700 font-semibold">Datos del Cliente</p>
                </label>

                <div>
                    <p></p>
                    <div class="flex items-center mb-3">
                        <input wire:model="isPerson" {{$isPerson == 1 ? 'checked' : ''}} id="default-radio-1" type="radio" value="1" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600">
                        <label for="default-radio-1" class="ml-1 mt-2 text-sm font-medium text-gray-900 dark:text-gray-300">Boleta </label>
                   
                        <input wire:model="isPerson" {{$isPerson == 2 ? 'checked' : ''}} id="default-radio-2" type="radio" value="2" name="default-radio" class="ml-3 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600">
                        <label for="default-radio-2" class="ml-1 mt-2 text-sm font-medium text-gray-900 dark:text-gray-300">Factura</label>
                    
                        <input wire:model="isPerson" {{$isPerson == 3 ? 'checked' : ''}} id="default-radio-3" type="radio" value="3" name="default-radio" class="ml-3 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600">
                        <label for="default-radio-3" class="ml-1 mt-2 text-sm font-medium text-gray-900 dark:text-gray-300">Boleta (Otra persona recibirá el pedido)</label>
                    
                    </div>
                </div>

                
                    @if($isPerson == 1)
                        <div class="grid grid-cols-2 gap-4 ">
                            <div>
                                <x-jet-label value="Nombres y Apellidos" />
                                <x-jet-input type="text"
                                            wire:model.defer="name"
                                            placeholder="Ingresa tu nombre completo "
                                            class="w-full"/>
                                <x-jet-input-error for="name" />
                            </div>
                            <div>
                                <x-jet-label value="Documento de identidad nacional" />
                                <x-jet-input type="number"
                                            wire:model.defer="documento"
                                            placeholder="Ingresa tu número de documento "
                                            class="w-full"/>
                                <x-jet-input-error for="documento" />
                            </div>
                            
                        </div>
                        <p class="my-3 text-sm">
                        <i class="zmdi zmdi-forward"></i>  El comprobante se emitirá a nombre de la persona a continuación, en caso la información brindada no sea verídica el pedido será cancelado.
                        </p>
                        <p class="my-3 text-sm">
                        <i class="zmdi zmdi-forward"></i> El pedido será recogido por la persona a registrada a continuación.
                        </p>

                    @elseif($isPerson == 2)
                        <div class="grid grid-cols-2 gap-4 ">
                            <div>
                                <x-jet-label value="Razón social" />
                                <x-jet-input type="text"
                                            wire:model.defer="empresa"
                                            placeholder="Ingresa tu razón social "
                                            class="w-full"/>
                                <x-jet-input-error for="empresa" />
                            </div>
                            <div>
                                <x-jet-label value="Registro Único de Contribuyente" />
                                <x-jet-input type="number"
                                            wire:model.defer="ruc"
                                            placeholder="Ingrese tu RUC"
                                            class="w-full"/>
                                <x-jet-input-error for="ruc" />
                            </div>
                            
                        </div>
                        <p class="my-3 text-sm">
                            El comprobante se emitirá a nombre de la empresa que registrará a continuación, en caso la información brindada no sea verídica el pedido será cancelado.
                        </p>
                    @else

                        <div class="grid grid-cols-2 gap-4 ">
                            <div>
                                <x-jet-label value="Nombres y Apellidos" />
                                <x-jet-input type="text"
                                            wire:model.defer="name"
                                            placeholder="Ingresa tu nombre completo "
                                            class="w-full"/>
                                <x-jet-input-error for="name" />
                            </div>
                            <div>
                                <x-jet-label value="Documento de identidad nacional" />
                                <x-jet-input type="number"
                                            wire:model.defer="documento"
                                            placeholder="Ingresa tu número de documento "
                                            class="w-full"/>
                                <x-jet-input-error for="documento" />
                            </div>
                            
                        </div>
                        <p class="my-3 text-sm">
                             El comprobante se emitirá a nombre de la persona a continuación, en caso la información brindada no sea verídica el pedido será cancelado.
                        </p>
                    @endif

                   <div class="{{$isPerson != 1 ? '' : 'hidden'}}">
                        <label class=" flex items-center cursor-pointer">
                            <p class="mb-2 text-lg text-gray-700 font-semibold">Persona que recibirá el pedido </p>
                        </label>

                        <div class="grid grid-cols-2 gap-4 mb-3">
                            <div>
                                <x-jet-label value="Nombre completo" />
                                <x-jet-input type="text"
                                            wire:model="delivered_to"
                                            placeholder="Ingresa nombres y apellidos"
                                            class="w-full"/>
                                <x-jet-input-error for="delivered_to" />
                            </div>
                            <div>
                                <x-jet-label value="Documento de identidad nacional" />
                                <x-jet-input type="number"
                                            wire:model="delivered_dni"
                                            placeholder="Ingresa un DNI"
                                            class="w-full"/>
                                <x-jet-input-error for="delivered_dni" />
                            </div>
                        </div>
                    </div>
                        


                      
                
                <label class=" flex items-center cursor-pointer">
                    <p class="mb-2 text-lg text-gray-700 font-semibold">Datos de contacto</p>
                </label>

                <div class="grid grid-cols-2 gap-4 mb-2">
                    <div>
                        <x-jet-label value="Teléfono" />
                        <x-jet-input type="number" value="{{$contact->mobile}}"  class="w-full"  style="background: #dfdfdf;" disabled/>
                    </div>
                    <div>
                        <x-jet-label value="Correo" />
                        <x-jet-input type="text" value="{{Auth::user()->email}}" class="w-full"  style="background: #dfdfdf;" disabled/>
                    </div>
                </div>

                <p class="mt-3 text-sm">El titular de la cuenta es el contacto por defecto, en caso desees editar esta información ve a "Mi perfil" en tu cuenta de usuario. </p>
                


            </div>

            <!-- inicio -->
            <div>
                <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">Envio</p>
                <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4 cursor-pointer">
                    <input wire:model="envio_type" type="radio" value="1" name="envio_type" class="text-blue-600" {{$envio_type == 1 ? 'checked' : ''}} > 
                    <span class="ml-3 text-gray-700">
                        <b>Recojo en tienda:</b>  AA.HH 8 de setiembre, calle Las Mercedes Lote 01 <br>
                        Carretera San Juan de la Virgen, Tumbes.
                    </span>
                    <span class="font-semibold text-gray-700 ml-auto">
                        Gratis
                    </span> 
                </label>

                <div class="bg-white rounded-lg shadow">
                    <label class="px-6 py-4 flex items-center cursor-pointer">
                        <input wire:model="envio_type"  type="radio" value="2" name="envio_type" class="text-blue-600" {{$envio_type == 2 ? 'checked' : ''}}>
                        <b class="ml-3 text-gray-700">
                            Envío a domicilio 
                        </b>
                        <span class="ml-2 text-red-600">(El envío solo es gratuito en Tumbes)</span>
                    </label>
                    <div class="px-6 pb-6 grid grid-cols-2 gap-6  {{$envio_type == 2 ? '' : 'hidden'}}" >
                        {{-- Departamentos --}}
                        <div>
                            <x-jet-label value="Departamento" />
                        
                            <select class="form-control w-full" wire:model="department_id">
                                <option value="" disabled selected>Seleccione un departamento </option>
                                @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}} </option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="department_id" />

                        </div>
                        {{-- Distritos --}}
                        <div>
                            <x-jet-label value="Provincia" />
                            <select class="form-control w-full" wire:model="city_id">
                                <option value="" disabled selected>Seleccione un provincia</option>
                                @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach 
                            </select>
                            <x-jet-input-error for="city_id" />
                        </div>
                        {{-- Distritos --}}
                        <div>
                            <x-jet-label value="Distrito" />
                            <select class="form-control w-full" wire:model="district_id">
                                <option value="" disabled selected>Seleccione un distrito</option>
                                @foreach ($districts as $district)
                                    <option value="{{$district->id}}">{{$district->name}}</option>
                                @endforeach 
                            </select>
                            <x-jet-input-error for="district_id" />
                        </div>
                        <div>
                            <x-jet-label value="Dirección" />
                            <x-jet-input class="w-full" wire:model="address" type="text" />
                            <x-jet-input-error for="address" />
                        </div>
                        <div class="col-span-2">
                            <x-jet-label value="Referencia" />
                            <x-jet-input class="w-full" wire:model="references" type="text" />
                            <x-jet-input-error for="references" />
                        </div>
                    </div>
                </div> 

                <div class="p-1" >
                    <div class="flex items-center">
                        <input  wire:model="isActive" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">
                        <label for="link-checkbox" class="ml-2 mt-2 text-lg font-medium text-gray-900 ">Estoy de acuerdo con los <a href="{{Route('conditions')}}" target="_blank">términos y condiciones</a>.</label>
                    </div>
                    <p class="text-red-600">
                        @if(!$isActive)
                            Tienes que aceptar los términos y condiciones para continuar
                        @endif
                        <x-jet-input-error for="terminos" />
                    </p>
                </div>
            </div>
            <!-- fin -->
        @else
            <div class="items-center">
                <b class="text-lg text-gray-700 mt-4">Tu carrito está vacio</b>
            </div>
        @endif

        <div class="mt-3">
            @if (Cart::getContent()->count())
                <div class="text-center">
                    <x-jet-button
                        wire:loading.attr="disabled"
                        wire:target="create_order"
                        class="btn btn-primary bor1 size-102 bg-purpura  mb-3"
                        wire:click="create_order">
                        &nbsp; Confirmar compra &nbsp;
                       
                    </x-jet-button>
                </div>
            @else
                <div class="text-center">
                    <a href="/" class="btn btn-primary bor1 size-102 bg-purpura  mb-3"> Ir a inicio </a>
                </div>
            @endif
        </div>

    </div>

    <div class="order-1 lg:order-2 lg:col-span-1 xl:col-span-2">
        <div class="bg-white rounded-lg shadow p-6">
            <ul>
                @forelse (Cart::getContent() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-20 w-20 object-cover mr-4" src="{{config('services.trading.url')}}/uploads/{{$item->attributes->image}}" alt="">
                        <article class="flex-1">
                            <h5 class=" ">
                                {{$item->name}}
                            </h5>
                            @if(!is_null($item->attributes->variante))
                                @if($item->attributes->variante != 'DUMMY')
                                    <p style="color: #888;">
                                        {{ Str::limit($item->attributes->variante,25)}}
                                    </p> 
                                @endif
                            @endif
                            <div class="flex">
                                <p>Cant: {{$item->quantity}}</p>
                            </div>
                            <p>S/. {{ number_format($item->price,2)}}</p>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700">
                            No tiene agregado ningún item en el carrito
                        </p>
                    </li>
                @endforelse
            </ul>

            <div class="text-gray-700 mt-4">
                <p class="flex justify-between items-center">
                    Subtotal
                    <span class="font-semibold">  S/. {{  number_format(Cart::getSubTotal(),2)}}</span>
                </p> 
                
                <hr class="my-2">
                <!-- <p class="flex justify-between items-center">
                    Envio
                    <span class="font-semibold">
                        @if ($envio_type == 1 || $shipping_cost == 0)
                                Gratis
                        @else
                            S/. {{ number_format ($shipping_cost,2)  }}
                        @endif
                    </span>
                </p>  -->

                <p class="mt-3 flex justify-between items-center font-semibold">
                    <span class="text-2xl ">Total</span>
                        <span class="text-xl">
                        @if ($envio_type == 1 || $shipping_cost == 0)
                            S/. {{number_format((Cart::getSubTotal()),2)}} 
                        @else
                            S/. {{number_format((Cart::getSubTotal() + $shipping_cost),2)}}
                        @endif
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>