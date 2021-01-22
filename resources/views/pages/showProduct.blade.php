@extends('layouts.default')

@section('title', 'Blank Page')

@push('css')
    <link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="/assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" />
	<link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="/assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
@endpush

@section('content')
        @if($product)
        <div class="row">
            <div class="col">
                <!-- begin breadcrumb -->
                <ol class="breadcrumb float-xl-left">
	            	<li class="breadcrumb-item"><a href="javascript:;">Todos</a></li>
	            	<li class="breadcrumb-item"><a href="javascript:;">{{ $product->network->origin }}</a></li>
	            	<li class="breadcrumb-item active">{{ $product->subject }}</li>
	            </ol>
                <!-- end breadcrumb -->
            </div>
        </div>
        <div class="row">
            <div class="col">
                
                @switch($product->language)
                    @case('talian')
                        <h1 class="page-header">{{ base64_decode($product->title) }} <i class="flag-icon flag-icon-it"></i> </h1> 
                        @break
                    @case('Russ')
                        <h1 class="page-header">{{ base64_decode($product->title) }} <i class="flag-icon flag-icon-ru"></i> </h1> 
                        @break
                    @case('Português (Portugal)')
                        <h1 class="page-header">{{ base64_decode($product->title) }} <i class="flag-icon flag-icon-pt"></i> </h1> 
                        @break
                    @case('Português (Brasil)')
                        <h1 class="page-header">{{ base64_decode($product->title) }} <i class="flag-icon flag-icon-br"></i> </h1> 
                        @break
                    @case('Português (Brasil)')
                        <h1 class="page-header">{{ base64_decode($product->title) }} <i class="flag-icon flag-icon-br"></i> </h1> 
                        @break
                    @case('Alemã')
                        <h1 class="page-header">{{ base64_decode($product->title) }} <i class="flag-icon flag-icon-de"></i> </h1> 
                        @break
                    @case('Árabe')
                        <h1 class="page-header">{{ base64_decode($product->title) }} <i class="flag-icon flag-icon-sa"></i> </h1> 
                        @break
                    @case('Espanhol')
                        <h1 class="page-header">{{ base64_decode($product->title) }} <i class="flag-icon flag-icon-es"></i> </h1> 
                        @break
                    @case('Francês')
                        <h1 class="page-header">{{ base64_decode($product->title) }} <i class="flag-icon flag-icon-fr"></i> </h1> 
                        @break
                    @case('Japonês')
                        <h1 class="page-header">{{ base64_decode($product->title) }} <i class="flag-icon flag-icon-jp"></i> </h1> 
                        @break
                    @default
                        <h1 class="page-header">{{ base64_decode($product->title) }} <i class="flag-icon flag-icon-us"></i> </h1> 
                @endswitch

            </div>  

        </div>

        <div class="row">
            <div class="col">

	             <!-- begin panel -->
	            <div class="panel panel-inverse">
	            	<div class="panel-heading">
	            		<h4 class="panel-title">ID {{ $product->idWebsite }} | {{ $product->network->origin }} | {{ $product->format }} | {{ $product->subject }} | {{ $product->cookie_duration }} | {{ $product->cookie_type }} <i class="fa fa-rocket" style="padding-left: 8px"></i></h4>
	            		<div class="panel-heading-btn">
	            			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
	            			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
	            			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
	            			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
	            		</div>

	            	</div>
                    <div class="row" style="height:80px;padding: 0;margin: 0;">
                            <div class="col" style="background-color: #343a40">
                                <button type="button" class="btn btn-default pull-right" style="margin-top: 25px;margin-left: 10px">+ Link</button>
                                <button type="button" class="btn btn-default pull-right" style="margin-top: 25px;margin-left: 10px">Google Ads</button>
                            </div>
                        </div>
	            	<div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card border-0 text-white">
	    			            	<img class="card-img" src="/assets/img/gallery/gallery-13.jpg" alt="Card image">
	    			            	<div class="card-img-overlay">
	    			            		<!-- <p class="card-text">Last updated 3 mins ago</p> -->
	    			            	</div>
	    			            </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <h5 style="color: #7b8084;">Venda R${{ $product->maxPrice }}</h5>
                                    </div>
                                    <!-- <div class="col"></div> -->
                                    <div class="col text-right"><h5> <strong style="color: #71a35b;">{{ $product->percentage }}%</strong>|<strong style="color: #c86060">{{ $product->temperatures[0]->value }}º</strong>|<strong style="color: #e4af7a">{{ $product->evaluation }}</strong></h5></div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <h5 style="color:#71a35b">Comissão R${{ $product->comission }}</h5>
                                    </div>
                                    <!-- <div class="col"></div> -->
                                    <div class="col-sm-3 text-right"><h6 style="color:#7b8084">CPA</h6></div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <h5 style="color:#9785bb">Recorrente R$56.3</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
	    				                	<input type="checkbox" class="custom-control-input" name="nomeUnico" id="nomeUnico" value="1"  />
	    				                	<label class="custom-control-label" for="nomeUnico">Nome Único</label>
	    				                </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
	    				                	<input type="checkbox" class="custom-control-input" name="favorito" id="favorito" value="1"  />
	    				                	<label class="custom-control-label" for="favorito">Favorito</label>
	    				                </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="statusAfiliacao" id="statusAfiliacao">
	    				                	<option>Status da afialiação</option>
	    				                	<option>Clickbank</option>
	    				                </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
	    				                	<input type="checkbox" class="custom-control-input" name="midiaPatrocinada" id="midiaPatrocinada" value="1"  />
	    				                	<label class="custom-control-label" for="midiaPatrocinada">Não permitir mídia patrocinada</label>
	    				                </div>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="adsSwitch" name="adsSwitch">
                                            <label class="custom-control-label" for="adsSwitch">Ads Ativo/Inativo</div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="recorrenteSwitch" name="recorrenteSwitch">
                                            <label class="custom-control-label" for="recorrenteSwitch">Recorrente - Recurring $/Rebil</div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top:5px;">
                                    <div class="col">
                                        <input class="form-control" type="number" name="recorrente" id="recorrente" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="lancamentoSwitch" name="lancamentoSwitch">
                                            <label class="custom-control-label" for="lancamentoSwitch">Lançamento</div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top:5px;">
                                    <div class="col">
	    						        <div class="input-group input-daterange">
	    						        	<input type="text" class="form-control" name="start" id="start" placeholder="Inicio" />
	    						        	<span class="input-group-addon">to</span>
	    						        	<input type="text" class="form-control" name="end" id="end" placeholder="Final" />
	    						        </div>
                                    </div>
                                </div>
                                <br>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
	    				                	<input type="checkbox" class="custom-control-input" name="trial" id="trial" value="1"  />
	    				                	<label class="custom-control-label" for="trial">U$ 1 Trial</label>
	    				                </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
	    				                	<input type="checkbox" class="custom-control-input" name="upsell" id="upsell" value="1"  />
	    				                	<label class="custom-control-label" for="upsell">Permitir Upsell</label>
	    				                </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
	    				                	<input type="checkbox" class="custom-control-input" name="toolsPage" id="toolsPage" value="1"  />
	    				                	<label class="custom-control-label" for="toolsPage">Must have affiliate tools page</label>
	    				                </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
	    				                	<input type="checkbox" class="custom-control-input" name="mobileTrafic" id="mobileTrafic" value="1"  />
	    				                	<label class="custom-control-label" for="mobileTrafic">Support for mobile trafic</label>
	    				                </div>
                                    </div>
                                </div>
                                <br>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <h4>Dados do Produtor</h4>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <i class="far fa-envelope fa-lg"></i> joedoe@email.com
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <i class="far fa-user fa-lg"></i> Joe Doe
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <i class="fab fa-whatsapp fa-lg"></i> 3199823711
                                    </div>
                                </div>
                            </div>
                            <div class="col">

                                <div class="row">
                                    <div class="col">
                                        <a href="{{ $product->pageProduct }}">Pagina de vendas</a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
	    							    	<input id="clipboard-paginaVendas" name="clipboard-paginaVendas" type="text" class="form-control" value="{{ $product->pageProduct }}" />
	    							    	<span class="input-group-append">
	    							    		<button class="btn btn-default" type="button" data-clipboard-target="#clipboard-paginaVendas"><i class="fas fa-copy"></i></button>
	    							    	</span>
                                            <span class="input-group-append">
	    							    		<button class="btn btn-default" type="button" ><i class="fas fa-times"></i></button>
	    							    	</span>
	    							    </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ $product->checkout }}">Pagina de checkout</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
	    							    	<input id="clipboard-paginaCheckout" name="clipboard-paginaCheckout" type="text" class="form-control" value="{{ $product->checkout }}" />
	    							    	<span class="input-group-append">
	    							    		<button class="btn btn-default" type="button" data-clipboard-target="#clipboard-paginaCheckout"><i class="fas fa-copy"></i></button>
	    							    	</span>
                                            <span class="input-group-append">
	    							    		<button class="btn btn-default" type="button" ><i class="fas fa-times"></i></button>
	    							    	</span>
	    							    </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ $product->link }}">Pagina do afiliado</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
	    							    	<input id="clipboard-paginaAfiliado" name="clipboard-paginaAfiliado" type="text" class="form-control" value="{{ $product->link }}" />
	    							    	<span class="input-group-append">
	    							    		<button class="btn btn-default" type="button" data-clipboard-target="#clipboard-paginaAfiliado"><i class="fas fa-copy"></i></button>
	    							    	</span>
                                            <span class="input-group-append">
	    							    		<button class="btn btn-default" type="button" ><i class="fas fa-times"></i></button>
	    							    	</span>
	    							    </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <h2>Sobre</h2>
                                    </div>
                                </div>
                                <div class="panel" style="background-color:#dee2e6;">
	    		                	<div class="panel-body">
	    		                		<p>
	    		                		{{ base64_decode($product->about) }}
	    		                		</p>
	    		                	</div>
	    		                </div>
                                <br>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <h2>Anotações <button class="btn btn-default" onclick="displayNewNote();"><i class="fas fa-plus"></i></button></h2> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <form action="{{ route('saveNote') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="idProduto" value="{{ $product->id }}">
                                        <textarea class="form-control form-control-lg" name="note" id="note" rows="5" style="display:none"></textarea>
                                        <br>
                                        <div class="row">
                                            <div class="col text-right">
                                                <button class="btn btn-primary" id="salvarNota" name="salvarNota" type="submit" style="display:none">Salvar</button>
                                                <a href="#" class="btn btn-default" id="cancelarNota" name="cancelarNota" style="display:none" onclick="hideNewNote();">Cancelar</a>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                <br>
                                @foreach($product->notes as $note)
                                    <br>
                                    <div class="alert alert-info fade show"><span class="close" data-dismiss="alert">×</span>{{ $note->value }}</div>
                                @endforeach
                                <div class="row">
                                <div class="col">
                                    <center><button type="button" class="btn btn-primary btn-lg">Salvar alterações</button></center>
                                </div>
                            </div>
                            </div>
                            <!-- <br>
                            <br> -->
                            
                        </div>
	            	</div>
                </div>
                <!-- end panel -->
	        </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script src="/assets/plugins/clipboard/dist/clipboard.min.js"></script>
    <script src="/assets/js/demo/show-products.demo.js"></script>
    <script src="/assets/js/demo/form-plugins.demo.js"></script>
    <script src="/assets/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
    <script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
@endpush