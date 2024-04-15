<div class="flex-1 relative p-l-10 p-r-10" style="border: 1px solid #002E6A; border-radius: 15px;"  x-data>
    
    <form action="{{ route('search.note') }}" autocomplete="off">
        <x-jet-input name="title" wire:model="search" type="text" class="w-full border-none" placeholder="Buscar aquí ..."  />
        <button class="absolute top-0 right-0 w-12 h-full flex items-center justify-center rounded-r-md cl2 ">
            <i class="zmdi zmdi-search" style="font-size: 26px;"></i>
        </button>
    </form>

    <div class="absolute w-full mt-1 {{$open ? '' : 'hidden'}}" @click.away="$wire.open = false"> 
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4 py-3 space-y-1">
                @forelse ($notas as $nota)
                    <a href="{{route('blog.show', ['id' => $nota->id,'slug' => $nota->slug])}}" class="flex mb-2">
                        <div class="ml-4 text-gray-700">
                            <p class="text-lg font-semibold leading-5">{{$nota->title}}</p>
                        </div>
                    </a> 
                    <hr>
                @empty
                    <p class="text-lg leading-5">
                        No existe ningún registro con los parametros especificados
                    </p>
                @endforelse
            </div>
        </div> 
    </div>  
    
</div> 