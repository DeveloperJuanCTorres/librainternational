<x-app-layout>
<div class="p-tb-50">
    <h1 class="text-center cl2">Términos y Condiciones</h1>
</div>

<div class="container">

    {!! $page->content !!}
</div>
@push('seo')
		<title>{{$seo['title']}}</title>
        <meta name="description" content="{{$seo['description']}}">
		<meta name="keywords" content="{{$seo['keywords']}}">
	@endpush

</x-app-layout>