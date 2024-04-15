<x-app-layout>
    <div class="container py-8">
        <ul>
            @forelse($notes as $note)
                <x-note-list :note="$note" />
            @empty
                <li class="bg-white rounded-lg shadow-2xl">
                    <div class="p-4">
                        <p class="text-lg font-semibold text-gray-700">
                            Ningún producto coincide con esos parámetros
                        </p>
                    </div>
                </li>
            @endforelse
        </ul>
        <div class="mt-4">
            @if(count($notes))
            {{$notes->links("pagination::bootstrap-4")}}
            @endif
        </div>
    </div>

    @push('seo')
		<title>{{$seo['title']}}</title>
        <meta name="description" content="{{$seo['description']}}">
		<meta name="keywords" content="{{$seo['keywords']}}">
	@endpush
	
    @push('header')
		<header class="header-v4">
	@endpush
    @push('buscador')
		<div class="bg-white px-3 py-1 wrap-header-mobile">
             @livewire('search')
        </div>
	@endpush
</x-app-layout>