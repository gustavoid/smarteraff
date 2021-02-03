@extends('layouts.default')

@section('title', 'Gallery V1')

@push('css')
	<link href="/assets/plugins/lightbox2/dist/css/lightbox.css" rel="stylesheet" />
	<link href="/assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="/assets/plugins/ion-rangeslider/css/ion.rangeSlider.min.css" />
@endpush

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Produtos</a></li>
		<li class="breadcrumb-item active">Hotmart</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Produtos Hotmart</h1>
	
	<!-- end page-header -->
	<div class="panel panel-inverse">
		<div class="panel-heading">
			<h2 class="panel-title">Total de {{ $count }} produtos</h2>
			<div class="panel-heading-btn">	
				<div class="btn-group dropup m-r-5 m-b-5">
						<a href="javascript:;" class="btn btn-sm" style="background-color:#37B39F;top:3px;">Ordenação</a>
						<a href="#" data-toggle="dropdown" style="background-color:#37B39F;top:3px;" class="btn btn-sm dropdown-toggle" aria-expanded="false">
							<b class="caret"></b>
						</a>
						<div class="dropdown-menu dropdown-menu-right" >
							<a href="{{ route('orderProducts',1) }}" class="dropdown-item">A-Z</a>
							<a href="{{ route('orderProducts',2) }}" class="dropdown-item">Z-A</a>
							<div class="dropdown-divider"></div>
							<a href="javascript:;" class="dropdown-item">Mais novo</a>
							<a href="javascript:;" class="dropdown-item">Mais antigo</a>
						</div>
				</div>
			</div>
		</div>
		<div class="panel-body">
			@if(isset($filtersCount))
				<h6>{{ $filtersCount }} produtos.</h6>
			@endif
		</div>
	</div>
	<!-- begin #gallery -->
	<div id="gallery" class="gallery">
	
		@foreach($products as $p)
			<!-- begin image -->
			<!-- <a href=""> -->
			<div class="image gallery-group-1">
				<div class="image-inner">
					<a href="{{ route('viewProducts',$p->id) }}">
						<div class="img" style="background-image: url(/assets/img/gallery/gallery-1.jpg)">
						</div>
						
					</a>
					<p class="image-caption">
						{{ base64_decode($p->title) }}
					</p>
					<div class="image-icons">
						<div class="row">
							<div class="col">
								@if($p->uniqueName)
									<i name="{{ $p->id }}" class="fa fa-star fa-lg" style="color: #d4cc0b"></i>
								@else
									<i name="{{ $p->id }}" class="fa fa-star fa-lg"></i>
								@endif
							</div>
						</div>
						<div class="row" style="padding-top:10px">
						<div class="col">
								@if($p->favorites)
									<i name="{{ $p->id }}" class="fa fa-heart fa-lg" style="color: #ce0e14"></i>
								@else
									<i name="{{ $p->id }}" class="fa fa-heart fa-lg"></i>
								@endif
							</div>
						</div>
					</div>
				</div>


				@switch($p->language)
					@case('Japonês')
					<div class="image-info">
					<div class="row">
						<div class="col">
							<h5 class="title">{{ $p->maxPrice }}/<strong style="color: #71a35b;">{{ $p->comission }}</strong> <i class="flag-icon flag-icon-jp"></i>  </h5>  
						</div>
							<div class="col">
								@if(end($p->temperatures))
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">{{ $p->temperatures[0]->value }}º</strong> </h5>
								@else
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">0º</strong>  </h5>
								@endif
							</div>
					</div>
					@break
					@case('Francês')
					<div class="image-info">
					<div class="row">
						<div class="col">
							<h5 class="title">{{ $p->maxPrice }}/<strong style="color: #71a35b;">{{ $p->comission }}</strong> <i class="flag-icon flag-icon-fr"></i> </h5>  
						</div>
							<div class="col">
								@if(end($p->temperatures))
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">{{ $p->temperatures[0]->value }}º</strong> </h5>
								@else
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">0º</strong>  </h5>
								@endif
							</div>
					</div>
					@break
					@case('Espanhol')
					<div class="image-info">
					<div class="row">
						<div class="col">
							<h5 class="title">{{ $p->maxPrice }}/<strong style="color: #71a35b;">{{ $p->comission }}</strong> <i class="flag-icon flag-icon-es"></i> </h5>  
						</div>
							<div class="col">
								@if(end($p->temperatures))
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">{{ $p->temperatures[0]->value }}º</strong> </h5>
								@else
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">0º</strong>  </h5>
								@endif
							</div>
					</div>
					@break
					@case('Árabe')
					<div class="image-info">
					<div class="row">
						<div class="col">
							<h5 class="title">{{ $p->maxPrice }}/<strong style="color: #71a35b;">{{ $p->comission }}</strong> <i class="flag-icon flag-icon-sa"></i> </h5>  
						</div>
							<div class="col">
								@if(end($p->temperatures))
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">{{ $p->temperatures[0]->value }}º</strong> </h5>
								@else
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">0º</strong>  </h5>
								@endif
							</div>
					</div>
					@break
					@case('Alemã')
					<div class="image-info">
					<div class="row">
						<div class="col">
							<h5 class="title">{{ $p->maxPrice }}/<strong style="color: #71a35b;">{{ $p->comission }}</strong> <i class="flag-icon flag-icon-de"></i> </h5>  
						</div>
							<div class="col">
								@if(end($p->temperatures))
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">{{ $p->temperatures[0]->value }}º</strong>  </h5>
								@else
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">0º</strong>  </h5>
								@endif
							</div>
					</div>
					@break
					@case('Português (Brasil)')
					<div class="image-info">
					<div class="row">
						<div class="col">
							<h5 class="title">{{ $p->maxPrice }}/<strong style="color: #71a35b;">{{ $p->comission }}</strong> <i class="flag-icon flag-icon-br"></i> </h5>  
						</div>
							<div class="col">
								@if(end($p->temperatures))
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">{{ $p->temperatures[0]->value }}º</strong> </h5>
								@else
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">0º</strong>  </h5>
								@endif
							</div>
					</div>
					@break
					@case('Português (Portugal)')
					<div class="image-info">
					<div class="row">
						<div class="col">
							<h5 class="title">{{ $p->maxPrice }}/<strong style="color: #71a35b;">{{ $p->comission }}</strong>  </h5>  
						</div>
							<div class="col">
								@if(end($p->temperatures))
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">{{ $p->temperatures[0]->value }}º</strong></h5>
								@else
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">0º</strong>  </h5>
								@endif
							</div>
					</div>
					@break
					@case('Russ')
					<div class="image-info">
					<div class="row">
						<div class="col">
							<h5 class="title">{{ $p->maxPrice }}/<strong style="color: #71a35b;">{{ $p->comission }}</strong> <i class="flag-icon flag-icon-ru"></i> </h5>  
						</div>
							<div class="col">
								@if(end($p->temperatures))
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">{{ $p->temperatures[0]->value }}º</strong></h5>
								@else
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">0º</strong>  </h5>
								@endif
							</div>
					</div>
					@break
					@case('talian')
					<div class="image-info">
					<div class="row">
						<div class="col">
							<h5 class="title">{{ $p->maxPrice }}/<strong style="color: #71a35b;">{{ $p->comission }}</strong> <i class="flag-icon flag-icon-it"></i> </h5>  
						</div>
							<div class="col">
								@if(end($p->temperatures))
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">{{ $p->temperatures[0]->value }}º</strong> </h5>
								@else
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">0º</strong>  </h5>
								@endif
							</div>
					</div>
					@break
					@default
					<div class="image-info">
					<div class="row">
						<div class="col">
							<h5 class="title">{{ $p->maxPrice }}/<strong style="color: #71a35b;">{{ $p->comission }}</strong>  </h5>  
						</div>
							<div class="col">
								@if(end($p->temperatures))
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">{{ $p->temperatures[0]->value }}º</strong> </h5>
								@else
									<h5 class="title">{{ number_format($p->percentage,1) }}%|<strong style="color: #c86060;">0º</strong>  </h5>
								@endif
							</div>
					</div>
					@endswitch
					<div class="desc">
						Hotmart - {{ $p->subject }}
						<br>
						{{ explode(',',$p->format)[0] }}
						<br>
						{{$p->cookie_type}}|{{ $p->cookie_duration }}
					</div>
					<div class="image-footer">
						<i class="fas fa-fire fa-lg" style="color: #f04e23"></i>
						<i class="fas fa-cart-plus fa-lg"></i>
						<i class="fab fa-firefox fa-lg"></i>
					</div>
				</div>
			</div>
			<!-- </a> -->
			<!-- end image -->
		@endforeach
	</div>
	<br>
	<!-- end #gallery -->
	<div class="d-flex justify-content-center">
		{{ $products->links() }}
	</div>

	@include('includes.component.theme-panel')
@endsection

@push('scripts')
	<script src="/assets/plugins/isotope-layout/dist/isotope.pkgd.min.js"></script>
	<script src="/assets/plugins/lightbox2/dist/js/lightbox.min.js"></script>
	<script src="/assets/list/listProducts.js"></script>
	<script src="/assets/js/demo/gallery.demo.js"></script>
	<script src="/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
	<script src="/assets/js/demo/form-plugins.demo.js"></script>
@endpush
