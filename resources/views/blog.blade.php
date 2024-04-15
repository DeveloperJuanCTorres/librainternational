<x-app-layout>
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-100" style="background-image: url('images/blog.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Blog
        </h2>
    </section>	
    <!-- Content page -->
	<section class="bg0 p-t-75 pb-5">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-40">
					<div class="p-r-0-lg p-r-45">
						@foreach($notes as $note)
						<!-- item blog -->
						<div class="p-b-63">
							<a href="{{route('blog.show', ['id' => $note->id,'slug' => $note->slug])}}" class="hov-img2 how-pos5-parent">
								<img src="{{config('services.trading.url')}}/uploads/cms/{{$note->feature_image}}" alt="IMG-BLOG">
								<div class="flex-col-c-m size-123 bg9 how-pos5">
									<span class="ltext-107 cl2 txt-center">
										{{ date('d', strtotime( $note->created_at)) }}
									</span>
									<span class="stext-109 cl3 txt-center">
									{{ date('M Y', strtotime( $note->created_at)) }}
									</span>
								</div>
							</a>
							<div class="p-t-32">
								<h4 class="p-b-15">
									<a href="{{route('blog.show', ['id' => $note->id,'slug' => $note->slug])}}" class="ltext-108 cl2 hov-cl1 trans-04">
										{{$note->title}}
									</a>
								</h4>
								<p class="stext-117 cl6">
									{{  Str::limit($note->meta_description, 200)}}
								</p>
								<div class="flex-w flex-sb-m p-t-18">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
										<span>
											<span class="cl4 m-r-5">Fuente:</span> Libra International
										</span>
									</span>
									<a href="{{route('blog.show', ['id' => $note->id,'slug' => $note->slug])}}" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
										Leer más
										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>
							</div>
						</div>
						@endforeach
						<!-- Pagination -->
						<div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
							{!! $notes->links("pagination::bootstrap-4") !!}
						</div>
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="side-menu">
						@livewire('search-note')
						<div class="p-t-40">
							<h4 class="mtext-112 cl2 p-b-33">
								Notas realacionadas
							</h4>
							<ul>
								@foreach($relacionadas as $relaciondo)
								<li class="bor18">
									<a href="{{route('blog.show', ['id' => $relaciondo->id,'slug' => $relaciondo->slug])}}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										{{ Str::limit($relaciondo->title,80)}}
									</a>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>


			</div>
		</div>
	</section>	
	
	@push('seo')
		<title>{{$seo['title']}}</title>
        <meta name="description" content="{{$seo['description']}}">
		<meta name="keywords" content="{{$seo['keywords']}}">
	@endpush
</x-app-layout>