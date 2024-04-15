<div x-data>

    <div class="row">
        <div class="col-md-6 col-lg-7 p-b-30">
            <div class="p-l-25 p-r-30 p-lr-0-lg">
                <div class="wrap-slick3 flex-sb flex-w">
                    <div class="slick3 gallery-lb">
                        <div class="item-slick3"> 
                            <div class="wrap-pic-w pos-relative">
                                <img src="{{config('services.trading.url')}}/uploads/{{$image}}" alt="IMG-PRODUCT"> 	
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        </div>
        <div class="col-md-6 col-lg-5 p-b-30">
            <div class="px-4 px-md-0   pr-md-5 p-t-5 p-lr-0-lg">

                <h4 class="mtext-105 cl2 js-name-detail ">
                    {{$product->name}}
                </h4>
                <span class="fs-18 cl14">
                    @for ($i = 1; $i <= 5; $i++)
                        @if( round($product->reviews->avg('rating')) >= $i)
                            <i class="zmdi zmdi-star"></i>
                        @else
                            <i class="zmdi zmdi-star-outline"></i>
                        @endif
                    @endfor            
                </span> ({{$product->reviews->count()}})<br>

                <h2 class="mtext-106 cl3">
                    S/. {{ number_format($variation->sell_price_inc_tax,2)}}
                </h2>

                <!--<p class="stext-102 cl3 p-t-23">-->
                <!--    <b>Características</b>-->
                <!--    <ul>-->
                <!--        <li class="ml-1">- Marca: {{$product->brand->name}}</li>-->
                <!--        <li class="ml-1">- Categoria: {{$product->category->name}}</li>-->
                <!--        <li class="ml-1">- Unidad de medidad: {{$product->unit->actual_name}}</li>-->
                <!--    </ul>-->
                <!--</p>-->
                
                  <div class="border-detail my-4">
                        <h2 class="mtext-112 cl3 ml-2">
                            {{$product->product_custom_field1}}
                        </h2> 
                    </div>
                    <div class="border-detail mb-3">
                        <h2 class="mtext-112 cl3 ml-2">
                            {{$product->product_custom_field2}}
                        </h2> 
                    </div>
                    <div class="border-detail mb-3">
                        <h2 class="mtext-112 cl3 ml-2">
                            {{$product->product_custom_field3}}
                        </h2> 
                    </div>
                    <div class="border-detail mb-3">
                        
                        <h2 class="mtext-112 cl3 ml-2">
                            {{$product->product_custom_field4}}
                        </h2> 
                    </div>
                </div>
                
                @if($pdf)
                <div class="flex-w flex-m mt-2">
                    <a target="_blank" href="{{config('services.trading.url')}}/uploads/media/{{$pdf->file_name}}" class="fs-17 color-blue">
                        <b> <i class="zmdi zmdi-download mr-1"></i>  Descargar ficha tecnica </b>
                    </a>
                </div>
                @endif
                
                <br>

                @if($is_active)
                    <b>Presentación:</b>
                    <div class="w-60">
                        <select class="form-control" wire:model="variation_id">
                            @foreach($variationes as $variation)
                                <option value="{{$variation->id}}"selected> {{$variation->name}} </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <!-- <p class="mt-4"><b>Stock:</b> 
                    @if($quantity)
                        {{$quantity}}
                    @else
                        {{$product->stock}}
                    @endif
                </p>  -->     

                @if($quantity)
                    <div class="mt-1">
                        <!-- <p class="mt-4"><b>Stock:</b> {{$quantity}}</p>  -->
                        <div class="flex mb-4 mt-3">
                            <div class="mt-1 mr-1">
                                <button class="btn btn-primary btn-num-product-down"
                                    {{$qty > 1? '':'disabled'}}
                                    wire:loading.attr="disabled"
                                    wire:target="decrement"
                                    wire:click="decrement">
                                    <i class="fs-16 zmdi zmdi-minus"></i> 
                                </button>
                                <span class="mx-2">&nbsp; {{$qty}} &nbsp;</span>
                                <button class="btn btn-primary btn-num-product-up"
                                    {{$qty >= $quantity? 'disabled':''}}
                                    wire:loading.attr="disabled"
                                    wire:target="incrementar"
                                    wire:click="incrementar"> 
                                    <i class="fs-16 zmdi zmdi-plus"></i> 
                                </button>
                            </div>

                            <button class="ml-1 btn btn-primary wrap-num-button"
                                {{$qty > $quantity? 'disabled':''}}
                                wire:click="$emit('addItemcart')"
                                wire:loading.attr="disabled"
                                wire:target="addItem">
                                    Agregar
                            </button>
                        </div>
                    </div>
                @else
                    <p class="text-center mt-2">No hay stock en esta presentación</p>
                @endif

                <div class="flex-w flex-m p-t-40 respon7">
                    <div class="flex-m bor9 p-r-10 m-r-11">
                        <a href="javascript:void(0)" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2">
                            Síguenos en: 
                        </a>
                    </div>
                    <a href="https://www.facebook.com/librainternationalperu/" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/libra_international/?hl=es" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Instagram" target="_blank">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a href="https://twitter.com/librainternati3" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter" target="_blank">
                        <i class="zmdi zmdi-twitter"></i>
                    </a>
                </div>

            </div>
        </div> 
    </div>


    @push('script')
        <script>
           Livewire.on('addItemcart', () => {
                Livewire.emitTo('add-cart-item', 'addItem');
                Swal.fire({
                icon: 'success',
                title: 'Agregaste el producto al carrito de compras',
                showConfirmButton: false,
                timer: 2000
                })
            })
        </script>
    @endpush
</div>
