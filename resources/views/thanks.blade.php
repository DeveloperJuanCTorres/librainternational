
<x-app-layout>
    <div class="p-2">
        <img src="{{asset('/images/thanks.png')}}" height="250px" width="250px" class="mt-12 mx-auto" alt=""> 
        <h1 class="text-center mt-3">Gracias por tu compra</h1>
        <h3 class="text-center mb-2">Pedido: ORDEN-{{$transaction->id}}</h3>
        <p class="text-center mb-3"> Comunicate con nosotros para coordinar el envio de tus productos y comprobante de pago</p>
        <div class="text-center mb-3">
            <a href="tel:+51957233959" target="black" class=" size-102"> <i class="zmdi zmdi-phone"></i> +51 957233959 </a>
        </div>
        <div class="text-center mb-2">
            <a href="https://api.whatsapp.com/send?phone=51980377438&text=Hola,%20soy%20{{Auth::user()->name}}%20y%20mi%20pedido%20es:%20ORDEN-{{$transaction->id}}" target="black" class="btn btn-success bor1 size-102"> <i class="zmdi zmdi-whatsapp"></i> WhatsApp </a>
        </div>
        <div class="text-center mb-12">
            <a href="{{ route('orders.index') }}" class="btn btn-primary bor1 size-102">Ver mis Ordenes</a>
        </div>
    </div>
</x-app-layout>