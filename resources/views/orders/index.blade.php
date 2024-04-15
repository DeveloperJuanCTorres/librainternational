<x-app-layout>
    <div class="container py-12">
        <section class="grid lg:grid-cols-6 gap-6 text-white">
            <a href="{{ route('orders.index') . "?status=Earring" }}" class="bg-gray-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4 status-link" >
                <p class="text-center text-2xl">
                    {{$pendiente}}
                </p>
                <p class="uppercase text-center">Pendiente</p>
                <p class="text-center text-2xl mt-2">
                    <i class="zmdi zmdi-time"></i>
                </p>
            </a>

            <a href="{{ route('orders.index') . "?status=ordered" }}" class="bg-blue-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4 status-link">
                <p class="text-center text-2xl">
                    {{$recibido}}
                </p>
                <p class="uppercase text-center">Recibido</p>
                <p class="text-center text-2xl mt-2">
                    <i class="zmdi zmdi-check"></i>
                </p>
            </a>

            <a href="{{ route('orders.index') . "?status=packed" }}" class="bg-yellow-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4 status-link">
                <p class="text-center text-2xl">
                    {{$enviado}}
                </p>
                <p class="uppercase text-center">Empacado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="zmdi zmdi-dropbox"></i>
                </p>
            </a>

            <a href="{{ route('orders.index') . "?status=shipped" }}" class="bg-pink-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4 status-link">
                <p class="text-center text-2xl">
                    {{$transito}}
                </p>
                <p class="uppercase text-center">Enviado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="zmdi zmdi-truck"></i>
                </p>
            </a>

            <a href="{{ route('orders.index') . "?status=delivered" }}" class="bg-green-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4 status-link">
                <p class="text-center text-2xl">
                    {{$entregado}}
                </p>
                <p class="uppercase text-center">Entregado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="zmdi zmdi-markunread-mailbox"></i>
                </p>
            </a>

            <a href="{{ route('orders.index') . "?status=cancelled" }}" class="bg-red-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4 status-link">
                <p class="text-center text-2xl">
                    {{$anulado}}
                </p>
                <p class="uppercase text-center">Cancelado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="zmdi zmdi-close-circle-o"></i>
                </p>
            </a>
        </section>

        @if ($orders->count())
            <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
                <h1 class="text-2xl mb-4">Órdenes recientes</h1>
                <ul>
                    @foreach ($orders as $order)
                        <li>
                            <a href="{{route('orders.show', $order)}}" class="flex items-center py-2 px-4 order-link">
                                <span class="w-12 text-center">
                                    @switch($order->shipping_status)
                                        @case('ordered')
                                            <i class="zmdi zmdi-check text-blue-500 opacity-50"></i>
                                            @break
                                        @case('packed')
                                            <i class="zmdi zmdi-dropbox text-yellow-500 opacity-50"></i>
                                            @break
                                        @case('shipped')
                                            <i class="zmdi zmdi-truck text-pink-500 opacity-50"></i>
                                            @break
                                        @case('delivered')
                                            <i class="zmdi zmdi-markunread-mailbox text-green-500 opacity-50"></i>
                                            @break
                                        @case('cancelled')
                                            <i class="zmdi zmdi-close-circle-o text-red-500 opacity-50"></i>
                                            @break
                                        @default
                                        <i class="zmdi zmdi-time text-gray-500 opacity-50"></i>
                                    @endswitch
                                </span>

                                <span>
                                    N° Orden: {{$order->id}}
                                    <br>
                                    {{$order->created_at->format('d/m/Y')}}
                                </span>

                                <div class="ml-auto">
                                    <span class="font-bold">
                                        @switch($order->shipping_status)
                                            @case('ordered')
                                                Recibido
                                                @break
                                            @case('packed')  
                                                 Empacado
                                                @break
                                            @case('shipped')
                                                Enviado
                                                @break
                                            @case('delivered')
                                                 Entregado
                                                @break
                                            @case('cancelled')
                                                Cancelado
                                                @break
                                            @default
                                                Pendiente
                                        @endswitch
                                    </span>
                                    <br>
                                    <span class="text-sm">
                                       S/. {{ number_format($order->total_before_tax,2)}}
                                    </span>
                                </div>
                                <span class="ml-2">
                                    <i class="zmdi zmdi-arrow-right"></i>
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>
        @else
        <div class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
            <span class="font-bold text-lg">
                No hay ordenes registradas
            </span>
        </div>
        @endif
    </div>

</x-app-layout>