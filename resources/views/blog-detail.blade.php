<x-app-layout>
<!-- Content page -->
<section class="bg0 p-t-52 p-b-20">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-45 p-r-0-lg">
						<!--  -->
						<div class="wrap-pic-w how-pos5-parent">
							<img src="{{config('services.trading.url')}}/uploads/cms/{{$note->feature_image}}" width="100%" alt="{{ Str::limit($note->title,70)}}">
						</div>
						<div class="p-t-32" id="body-blog">
							<span class="flex-w flex-m stext-111 cl2 p-b-19">
								<span>
									<span class="cl4 m-r-5">Fuente:</span> Libra International 
									<span class="cl12 m-l-4 m-r-6">|</span>
								</span>
								<span>
									{{ date('d M Y', strtotime( $note->created_at)) }}
								</span>
							</span>
							<h4 class="ltext-109 cl2">
								{{$note->title}}
							</h4>
							<p class="stext-117 cl6 p-b-26">
								{!! $note->content !!}
							</p>
						</div>
						<div class="flex-w flex-t p-t-16">
							<span class="size-216 stext-116 cl8 p-t-4">
								Tags:
							</span>
							<div class="flex-w size-217">
								@for($i=0; $i< count($tags) ; $i++)
								<a href="/buscar-note?title={{$tags[$i]}}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									{{$tags[$i]}}
								</a>
								@endfor
							</div>
						</div>
						<!--  -->

						<div class="p-t-40">
						
						    @if(Auth::check()) 
								<!-- Add review -->
								<h5 class="mtext-113 cl2 p-b-12">DEJA UN COMENTARIO</h5>
								<form action="{{route('review.blog',$note)}}" method="POST" class="mt-1 mb-5 w-full">
									@csrf
									<div class=" m-b-20">
										<textarea class="stext-111 cl2 plh3 size-124 p-lr-18 p-tb-15" name="comment" placeholder="Comentario..."></textarea>
										
										<x-jet-input-error for="comment"></x-jet-input-error>
									</div>
									<button class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04">
										Enviar comentario
									</button>
								</form>
							@else
								<p class="text-center">Para dejar tu comentario tienes que iniciar sesión</p> 
							@endif 
							
							<!-- Review -->

							@if($note->reviews->isNotEmpty())
								<h5 class="mtext-108 cl2 p-b-15">Comentarios:</h5>
								@foreach($note->reviews as $review)
									<div class="flex-w flex-t">
										<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
											<img src="{{$review->user->profile_photo_url}}" alt="AVATAR">
										</div>
										<div class="size-207">
											<div class="flex-w flex-sb-m p-b-17">
												<span class="p-r-20">
													<span class="mtext-107 cl2 ">{{$review->user->name}}</span>
													<p style="font-size: 14px;">{{$review->created_at->diffForHumans()}}</p>
												</span>
											</div>
											<p class="stext-102 cl6">
												{!! $review->comment !!}
											</p>
										</div>
									</div>
								@endforeach
							@else
								<div class="text-center">
									<b>No hay comentarios</b>
								</div>
							@endif 

							

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