@extends('layouts.default')

@section('title', 'Blank Page')

@push('css')
    <link href="/assets/plugins/tag-it/css/jquery.tagit.css" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="/assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" />
	<link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="/assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
@endpush

@section('content')

        <div class="row">
            <div class="col">
                <!-- begin breadcrumb -->
                <ol class="breadcrumb float-xl-left">
	            	<li class="breadcrumb-item"><a href="javascript:;">Todos</a></li>
	            	<li class="breadcrumb-item"><a href="javascript:;">Hotmart</a></li>
	            	<li class="breadcrumb-item active">Novo produto</li>
	            </ol>
                <!-- end breadcrumb -->
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if($product->title)
                    <h1 class="page-header">{{ base64_decode($product->title) }}<i class="flag-icon flag-icon-us"></i> </h1> 
                @else
                    <h1 class="page-header">Titulo do produto<i class="flag-icon flag-icon-us"></i> </h1> 
                @endif
            </div>  
        </div>

        <div class="row">
            <div class="col">

	            <div class="panel panel-inverse">
	            	<div class="panel-heading">
	            		<h4 class="panel-title">ID {{ $product->idWebsite }} | Hotmart <i class="fa fa-rocket" style="padding-left: 8px"></i></h4>
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
                                <button type="button" class="btn btn-primary pull-right" style="margin-top: 25px;margin-left: 10px">Salvar</button>
                            </div>
                        </div>
	            	<div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card border-0 text-white">
	    			            	<img class="card-img" src="/assets/img/gallery/gallery-13.jpg" alt="Card image">
	    			            	<div class="card-img-overlay">
	    			            	</div>
	    			            </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        @if($product->maxPrice)
                                            <h5 style="color: #7b8084;">Venda R$ {{ $product->maxPrice }}</h5>
                                        @else
                                            <h5 style="color: #7b8084;">Venda R$ 0.0</h5>
                                        @endif
                                    </div>
                                    <!-- <div class="col"></div> -->

                    
                                        <div class="col text-right"><h5> <strong style="color: #71a35b;">{{ $product->percentage }}%</strong>|<strong style="color: #c86060">{{ $product->temperatures[0]->value }}º</strong>|<strong style="color: #e4af7a">{{ $product->evaluate }}</strong></h5></div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col">
                                            
                                        @if($product->comission)    
                                            <h5 style="color:#71a35b">Comissão R$ {{ $product->comission }}</h5>
                                        @else
                                            <h5 style="color:#71a35b">Comissão R$ 0.0</h5>
                                        @endif
                                    </div>
                                    <!-- <div class="col"></div> -->
                                    <div class="col-sm-3 text-right"><h6 style="color:#7b8084">CPA</h6></div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        
                                        <h5 style="color:#71a35b">Comissão Incial R$ 0.0</h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        @if($product->recorrente)     
                                            <h5 style="color:#9785bb">Recorrente R$ {{ $product->recorrente }}</h5>
                                        @else
                                            <h5 style="color:#9785bb">Recorrente R$ 0.0</h5>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <label for="valorProduto">Valor do Produto</label>
                                        @if($product->maxPrice)
                                            <input class="form-control form-control-lg" type="text" name="valorProduto" id="valorProduto" value="{{ $product->maxPrice }}"/>
                                        @else
                                            <input class="form-control form-control-lg" type="text" name="valorProduto" id="valorProduto" />
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">   
                                        <label for="valorComissao">Valor da comissão</label>
                                        @if($product->comission)
                                            <input class="form-control form-control-lg" type="text" name="valorComissao" id="valorComissao" value="{{ $product->comission }}"/>
                                        @else
                                            <input class="form-control form-control-lg" type="text" name="valorComissao" id="valorComissao" />
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-switch">
                                            @if($product->recurring)
                                                <input type="checkbox" class="custom-control-input" id="recorrenteSwitch" name="recorrenteSwitch" checked>
                                            @else
                                                <input type="checkbox" class="custom-control-input" id="recorrenteSwitch" name="recorrenteSwitch" >
                                            @endif
                                            <label class="custom-control-label" for="recorrenteSwitch">Recorrente - Recurring $/Rebil</div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top:5px;">
                                    <div class="col">
                                        @if($product->recorrente)
                                            <input class="form-control" type="text" name="recorrente" id="recorrente" value="{{ $product->recorrente }}"/>
                                        @else
                                            <input class="form-control" type="text" name="recorrente" id="recorrente" />
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        @switch($product->subject)
                                            @case('Animais e Plantas')
                                                <select class="form-control" name="categoria" id="categoria">
                                                    <option>Animais e Plantas</option>
                                                    <option>Apps & Software</option>
                                                    <option>Casa e Construção</option>
                                                    <option>Culinaria e Gastronomia</option>
                                                    <option>Desenvolvimento pessoal</option>
                                                    <option>Design</option>
                                                    <option>Direito</option>
                                                    <option>Ecologia e Meio ambiente</option>
                                                    <option>Educacional</option>
                                                    <option>Empreendedorismo digital</option>
                                                    <option>Entreterimento</option>
                                                    <option>Espiritualidade</option>
                                                    <option>Finanças e Investimento</option>
                                                    <option>Hobbies</option>
	    				                        </select>
                                            @break
                                        @case('Apps & Software')
                                            <select class="form-control" name="categoria" id="categoria">
                                                    <option>Apps & Software</option>
                                                    <option>Animais e Plantas</option>
                                                    <option>Casa e Construção</option>
                                                    <option>Culinaria e Gastronomia</option>
                                                    <option>Desenvolvimento pessoal</option>
                                                    <option>Design</option>
                                                    <option>Direito</option>
                                                    <option>Ecologia e Meio ambiente</option>
                                                    <option>Educacional</option>
                                                    <option>Empreendedorismo digital</option>
                                                    <option>Entreterimento</option>
                                                    <option>Espiritualidade</option>
                                                    <option>Finanças e Investimento</option>
                                                    <option>Hobbies</option>
	    				                        </select>
                                            @break
                                        @case('Casa e Construção')
                                            <select class="form-control" name="categoria" id="categoria">
                                                    <option>Casa e Construção</option>
                                                    <option>Apps & Software</option>
                                                    <option>Animais e Plantas</option>
                                                    <option>Culinaria e Gastronomia</option>
                                                    <option>Desenvolvimento pessoal</option>
                                                    <option>Design</option>
                                                    <option>Direito</option>
                                                    <option>Ecologia e Meio ambiente</option>
                                                    <option>Educacional</option>
                                                    <option>Empreendedorismo digital</option>
                                                    <option>Entreterimento</option>
                                                    <option>Espiritualidade</option>
                                                    <option>Finanças e Investimento</option>
                                                    <option>Hobbies</option>
	    				                        </select>
                                            @break
                                        @case('Culinaria e Gastronomia')
                                            <select class="form-control" name="categoria" id="categoria">
                                                    <option>Culinaria e Gastronomia</option>
                                                    <option>Casa e Construção</option>
                                                    <option>Apps & Software</option>
                                                    <option>Animais e Plantas</option>
                                                    <option>Desenvolvimento pessoal</option>
                                                    <option>Design</option>
                                                    <option>Direito</option>
                                                    <option>Ecologia e Meio ambiente</option>
                                                    <option>Educacional</option>
                                                    <option>Empreendedorismo digital</option>
                                                    <option>Entreterimento</option>
                                                    <option>Espiritualidade</option>
                                                    <option>Finanças e Investimento</option>
                                                    <option>Hobbies</option>
	    				                        </select>  
                                            @break
                                        @case('Desenvolvimento pessoal')
                                            <select class="form-control" name="categoria" id="categoria">
                                                    <option>Desenvolvimento pessoal</option>
                                                    <option>Culinaria e Gastronomia</option>
                                                    <option>Casa e Construção</option>
                                                    <option>Apps & Software</option>
                                                    <option>Animais e Plantas</option>
                                                    <option>Design</option>
                                                    <option>Direito</option>
                                                    <option>Ecologia e Meio ambiente</option>
                                                    <option>Educacional</option>
                                                    <option>Empreendedorismo digital</option>
                                                    <option>Entreterimento</option>
                                                    <option>Espiritualidade</option>
                                                    <option>Finanças e Investimento</option>
                                                    <option>Hobbies</option>
	    				                        </select>  
                                            @break
                                        @case('Design')
                                            <select class="form-control" name="categoria" id="categoria">
                                                    <option>Design</option>
                                                    <option>Culinaria e Gastronomia</option>
                                                    <option>Casa e Construção</option>
                                                    <option>Apps & Software</option>
                                                    <option>Animais e Plantas</option>
                                                    <option>Desenvolvimento pessoal</option>
                                                    <option>Direito</option>
                                                    <option>Ecologia e Meio ambiente</option>
                                                    <option>Educacional</option>
                                                    <option>Empreendedorismo digital</option>
                                                    <option>Entreterimento</option>
                                                    <option>Espiritualidade</option>
                                                    <option>Finanças e Investimento</option>
                                                    <option>Hobbies</option>
	    				                        </select>  
                                            @break
                                        @case('Direito')
                                            <select class="form-control" name="categoria" id="categoria">
                                                    <option>Direito</option>
                                                    <option>Culinaria e Gastronomia</option>
                                                    <option>Casa e Construção</option>
                                                    <option>Apps & Software</option>
                                                    <option>Animais e Plantas</option>
                                                    <option>Desenvolvimento pessoal</option>
                                                    <option>Design</option>
                                                    <option>Ecologia e Meio ambiente</option>
                                                    <option>Educacional</option>
                                                    <option>Empreendedorismo digital</option>
                                                    <option>Entreterimento</option>
                                                    <option>Espiritualidade</option>
                                                    <option>Finanças e Investimento</option>
                                                    <option>Hobbies</option>
	    				                        </select>  
                                            @break
                                        @case('Ecologia e Meio ambiente')
                                            <select class="form-control" name="categoria" id="categoria">
                                                    <option>Ecologia e Meio ambiente</option>
                                                    <option>Culinaria e Gastronomia</option>
                                                    <option>Casa e Construção</option>
                                                    <option>Apps & Software</option>
                                                    <option>Animais e Plantas</option>
                                                    <option>Desenvolvimento pessoal</option>
                                                    <option>Design</option>
                                                    <option>Direito</option>
                                                    <option>Educacional</option>
                                                    <option>Empreendedorismo digital</option>
                                                    <option>Entreterimento</option>
                                                    <option>Espiritualidade</option>
                                                    <option>Finanças e Investimento</option>
                                                    <option>Hobbies</option>
	    				                        </select>  
                                            @break
                                        @case('Empreendedorismo digital')
                                            <select class="form-control" name="categoria" id="categoria">
                                                    <option>Empreendedorismo digital</option>
                                                    <option>Culinaria e Gastronomia</option>
                                                    <option>Casa e Construção</option>
                                                    <option>Apps & Software</option>
                                                    <option>Animais e Plantas</option>
                                                    <option>Desenvolvimento pessoal</option>
                                                    <option>Educacional</option>
                                                    <option>Design</option>
                                                    <option>Direito</option>
                                                    <option>Ecologia e Meio ambiente</option>
                                                    <option>Entreterimento</option>
                                                    <option>Espiritualidade</option>
                                                    <option>Finanças e Investimento</option>
                                                    <option>Hobbies</option>
	    				                        </select>  
                                            @break
                                        @case('Entreterimento')
                                            <select class="form-control" name="categoria" id="categoria">
                                                    <option>Entreterimento</option>
                                                    <option>Culinaria e Gastronomia</option>
                                                    <option>Casa e Construção</option>
                                                    <option>Apps & Software</option>
                                                    <option>Animais e Plantas</option>
                                                    <option>Desenvolvimento pessoal</option>
                                                    <option>Design</option>
                                                    <option>Direito</option>
                                                    <option>Ecologia e Meio ambiente</option>
                                                    <option>Educacional</option>
                                                    <option>Empreendedorismo digital</option>
                                                    <option>Espiritualidade</option>
                                                    <option>Finanças e Investimento</option>
                                                    <option>Hobbies</option>
	    				                        </select>  
                                            @break
                                        @case('Espiritualidade')
                                            <select class="form-control" name="categoria" id="categoria">
                                                    <option>Espiritualidade</option>
                                                    <option>Culinaria e Gastronomia</option>
                                                    <option>Casa e Construção</option>
                                                    <option>Apps & Software</option>
                                                    <option>Animais e Plantas</option>
                                                    <option>Desenvolvimento pessoal</option>
                                                    <option>Design</option>
                                                    <option>Direito</option>
                                                    <option>Ecologia e Meio ambiente</option>
                                                    <option>Educacional</option>
                                                    <option>Empreendedorismo digital</option>
                                                    <option>Entreterimento</option>
                                                    <option>Finanças e Investimento</option>
                                                    <option>Hobbies</option>
	    				                        </select>  
                                            @break
                                        @case('Finanças e Investimento')
                                            <select class="form-control" name="categoria" id="categoria">
                                                    <option>Finanças e Investimento</option>
                                                    <option>Culinaria e Gastronomia</option>
                                                    <option>Casa e Construção</option>
                                                    <option>Apps & Software</option>
                                                    <option>Animais e Plantas</option>
                                                    <option>Desenvolvimento pessoal</option>
                                                    <option>Design</option>
                                                    <option>Direito</option>
                                                    <option>Ecologia e Meio ambiente</option>
                                                    <option>Educacional</option>
                                                    <option>Empreendedorismo digital</option>
                                                    <option>Entreterimento</option>
                                                    <option>Espiritualidade</option>
                                                    <option>Hobbies</option>
	    				                        </select>  
                                            @break
                                        @case('Hobbies')
                                            <select class="form-control" name="categoria" id="categoria">
                                                    <option>Hobbies</option>
                                                    <option>Culinaria e Gastronomia</option>
                                                    <option>Casa e Construção</option>
                                                    <option>Apps & Software</option>
                                                    <option>Animais e Plantas</option>
                                                    <option>Desenvolvimento pessoal</option>
                                                    <option>Design</option>
                                                    <option>Direito</option>
                                                    <option>Ecologia e Meio ambiente</option>
                                                    <option>Educacional</option>
                                                    <option>Empreendedorismo digital</option>
                                                    <option>Entreterimento</option>
                                                    <option>Espiritualidade</option>
                                                    <option>Finanças e Investimento</option>
	    				                        </select>  
                                            @break
                                            @default
                                            <select class="form-control" name="categoria" id="categoria">
                                                    <option>Categorias</option>
                                                    <option>Animais e Plantas</option>
                                                    <option>Apps & Software</option>
                                                    <option>Culinaria e Gastronomia</option>
                                                    <option>Casa e Construção</option>
                                                    <option>Desenvolvimento pessoal</option>
                                                    <option>Design</option>
                                                    <option>Direito</option>
                                                    <option>Ecologia e Meio ambiente</option>
                                                    <option>Educacional</option>
                                                    <option>Empreendedorismo digital</option>
                                                    <option>Entreterimento</option>
                                                    <option>Espiritualidade</option>
                                                    <option>Finanças e Investimento</option>
                                                    <option>Hobbies</option>
	    				                        </select> 
                                    @endswitch 
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="format">Formato</label>
                                        @if($product->format)
                                            <input class="form-control form-control-lg" type="text" name="format" id="format" value="{{ $product->format }}"/>
                                        @else
                                            <input class="form-control form-control-lg" type="text" name="format" id="format" />
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        @switch($product->type)
                                            @case('CPA')
                                                <select class="form-control" name="tipoComissao" id="tipoComissao">
	    				                        	<option>CPA</option>
                                                    <option>CPL</option>
                                                    <option>EPC</option>
                                                    <option>CPAc</option>
                                                    <option>CPS</option>
	    				                        </select>
                                                @break
                                                @case('CPL')
                                                <select class="form-control" name="tipoComissao" id="tipoComissao">
                                                    <option>CPL</option>
	    				                        	<option>CPA</option>
                                                    <option>EPC</option>
                                                    <option>CPAc</option>
                                                    <option>CPS</option>
	    				                        </select>
                                                @break
                                                @case('EPC')
                                                <select class="form-control" name="tipoComissao" id="tipoComissao">
                                                    <option>EPC</option>
	    				                        	<option>CPA</option>
                                                    <option>CPL</option>
                                                    <option>CPAc</option>
                                                    <option>CPS</option>
	    				                        </select>
                                                @break
                                                @case('CPAc')
                                                <select class="form-control" name="tipoComissao" id="tipoComissao">
                                                    <option>CPAc</option>
	    				                        	<option>CPA</option>
                                                    <option>CPL</option>
                                                    <option>EPC</option>
                                                    <option>CPS</option>
	    				                        </select>
                                                @break
                                                @case('CPS')
                                                <select class="form-control" name="tipoComissao" id="tipoComissao">
                                                    <option>CPS</option>
	    				                        	<option>CPA</option>
                                                    <option>CPL</option>
                                                    <option>EPC</option>
                                                    <option>CPAc</option>
	    				                        </select>
                                                @break
                                                @default
                                                <select class="form-control" name="tipoComissao" id="tipoComissao">
	    				                        	<option>Tipo de comissão</option>
	    				                        	<option>CPA</option>
                                                    <option>CPL</option>
                                                    <option>EPC</option>
                                                    <option>CPAc</option>
                                                    <option>CPS</option>
	    				                        </select>
                                        @endswitch
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        @switch($product->status_aprovacao)
                                        @case('Aprovação 1 clique')
                                            <select class="form-control" name="statusAfiliacao" id="statusAfiliacao">
	    				                    	<option>Aprovação 1 clique</option>
	    				                    	<option>Status da afialiação</option>
                                                <option>Requer aprovação</option>
                                                <option>Aguardando aprovação</option>
                                                <option>Aprovado</option>
	    				                    </select>
                                        @break
                                        @case('Aprovação 1 clique')
                                            <select class="form-control" name="statusAfiliacao" id="statusAfiliacao">
	    				                    	<option>Aprovação 1 clique</option>
                                                <option>Requer aprovação</option>
                                                <option>Aguardando aprovação</option>
                                                <option>Aprovado</option>
	    				                    </select>
                                        @break
                                        @case('Requer aprovação')
                                            <select class="form-control" name="statusAfiliacao" id="statusAfiliacao">
                                                <option>Requer aprovação</option>
	    				                    	<option>Aprovação 1 clique</option>
                                                <option>Aguardando aprovação</option>
                                                <option>Aprovado</option>
	    				                    </select>
                                        @break
                                        @case('Aguardando aprovação')
                                            <select class="form-control" name="statusAfiliacao" id="statusAfiliacao">
                                                <option>Aguardando aprovação</option>
	    				                    	<option>Aprovação 1 clique</option>
                                                <option>Requer aprovação</option>
                                                <option>Aprovado</option>
	    				                    </select>
                                        @break
                                        @case('Aprovado')
                                            <select class="form-control" name="statusAfiliacao" id="statusAfiliacao">
                                                <option>Aprovado</option>
	    				                    	<option>Aprovação 1 clique</option>
                                                <option>Requer aprovação</option>
                                                <option>Aguardando aprovação</option>
	    				                    </select>
                                        @break
                                        @default
                                            <select class="form-control" name="statusAfiliacao" id="statusAfiliacao">
	    				                    	<option>Status da afialiação</option>
                                                <option>Aprovado</option>
	    				                    	<option>Aprovação 1 clique</option>
                                                <option>Requer aprovação</option>
                                                <option>Aguardando aprovação</option>
	    				                    </select>
                                    @endswitch
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="format">Pais</label>
                                        <input class="form-control form-control-lg" type="text" name="pais" id="pais" />
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        
                                        <label for="idioma">Idioma</label>
                                        @if($product->language)
                                            <input class="form-control form-control-lg" type="text" name="idioma" id="idioma" value="{{ $product->language }}"/>
                                        @else
                                            <input class="form-control form-control-lg" type="text" name="idioma" id="idioma"/>
                                        @endif
                                    </div>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="row">
                                        <div class="col">
                                            <div class="custom-control custom-switch">
                                                @if($product->lancamento)
                                                    <input type="checkbox" class="custom-control-input" id="lancamentoSwitch" name="lancamentoSwitch" checked>
                                                @else
                                                    <input type="checkbox" class="custom-control-input" id="lancamentoSwitch" name="lancamentoSwitch" >
                                                @endif
                                                <label class="custom-control-label" for="lancamentoSwitch">Lançamento</div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top:5px;">
                                        <div class="col">
	    					    	        <div class="input-group input-daterange">
                                                @if($product->startDate)
	    					    	        	    <input type="text" class="form-control" name="start" id="start" placeholder="Inicio" value="{{ $product->startDate }}"/>
                                                @else
                                                    <input type="text" class="form-control" name="start" id="start" placeholder="Inicio"/>
                                                @endif
	    					    	        	<span class="input-group-addon">to</span>
                                                @if($product->endDate)
	    					    	        	    <input type="text" class="form-control" name="end" id="end" placeholder="Final" value="{{ $product->endDate }}"/>
                                                @else
                                                    <input type="text" class="form-control" name="end" id="end" placeholder="Final"/>
                                                @endif
	    					    	        </div>
                                        </div>
                                </div>
                                <br>
                                <br>

                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            @if($product->uniqueName)
	    				                	    <input type="checkbox" class="custom-control-input" name="nomeUnico" id="nomeUnico" value="1"  checked/>
                                            @else
                                                <input type="checkbox" class="custom-control-input" name="nomeUnico" id="nomeUnico" value="1"  />
                                            @endif
	    				                	<label class="custom-control-label" for="nomeUnico">Nome Único</label>
	    				                </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            @if($product->favorite)
	    				                	    <input type="checkbox" class="custom-control-input" name="favorito" id="favorito" value="1"  checked/>
                                            @else
                                                <input type="checkbox" class="custom-control-input" name="favorito" id="favorito" value="1" />
                                            @endif
	    				                	<label class="custom-control-label" for="favorito">Favorito</label>
	    				                </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            @if($product->midiaPatrocinada)
	    				                	    <input type="checkbox" class="custom-control-input" name="midiaPatrocinada" id="midiaPatrocinada" value="1"  checked/>
                                            @else
                                                <input type="checkbox" class="custom-control-input" name="midiaPatrocinada" id="midiaPatrocinada" value="1" />
                                            @endif
	    				                	<label class="custom-control-label" for="midiaPatrocinada">Não permitir mídia patrocinada</label>
	    				                </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-switch">
                                            @if($product->adsAtive)
                                                <input type="checkbox" class="custom-control-input" id="adsSwitch" name="adsSwitch" checked>
                                            @else
                                                <input type="checkbox" class="custom-control-input" id="adsSwitch" name="adsSwitch" >
                                            @endif
                                            <label class="custom-control-label" for="adsSwitch">Ads Ativo/Inativo</div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="email">Email do produtor</label>
                                        @if($product->emailProdutor)
                                            <input class="form-control form-control-lg" type="email" name="email" id="email" value="{{ $product->emailProdutor }}"/>
                                        @else
                                            <input class="form-control form-control-lg" type="email" name="email" id="email"/>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="telefone">Whatsapp/Tel. do produtor</label>
                                        @if($product->telProdutor)
                                            <input class="form-control form-control-lg" type="phone" name="telefone" id="telefone" value="{{ $product->telProdutor }}"/>
                                        @else
                                            <input class="form-control form-control-lg" type="phone" name="telefone" id="telefone"/>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="nomeProdutor">Nome do produtor</label>
                                        @if($product->nomeProdutor)
                                            <input class="form-control form-control-lg" type="text" name="nomeProdutor" id="nomeProdutor" value="{{ $product->nomeProdutor }}"/>
                                        @else
                                            <input class="form-control form-control-lg" type="text" name="nomeProdutor" id="nomeProdutor" />
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="sobre">Sobre</label>
                                        @if(!empty($product->about))
                                            <textarea class="form-control" id="sobre" name="sobre" rows="10"> {{ base64_decode($product->about) }}</textarea>
                                        @else
                                            <textarea class="form-control" id="sobre" name="sobre" rows="10" ></textarea>
                                        @endif
                                        <br>
                                        <button type="button" class="btn btn-inverse">Salvar</button>
                                    </div>
                                </div>
                            
                            </div>

                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <h5>Clickbank exclusivo</h5>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            @if($product->trial)
	    				                    	<input type="checkbox" class="custom-control-input" name="trial" id="trial" value="1"  checked/>
                                            @else
                                                <input type="checkbox" class="custom-control-input" name="trial" id="trial" value="1" />
                                            @endif
	    				                	<label class="custom-control-label" for="trial">U$ 1 Trial</label>
	    				                </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            @if($product->upsell)
	    				                	    <input type="checkbox" class="custom-control-input" name="upsell" id="upsell" value="1"  checked/>
                                            @else
                                                <input type="checkbox" class="custom-control-input" name="upsell" id="upsell" value="1"  />
                                            @endif
	    				                	<label class="custom-control-label" for="upsell">Permitir Upsell</label>
	    				                </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            @if($product->affiliateToolsPage)
	    				                	    <input type="checkbox" class="custom-control-input" name="toolsPage" id="toolsPage" value="1"  checked/>
                                            @else
                                                <input type="checkbox" class="custom-control-input" name="toolsPage" id="toolsPage" value="1" />
                                            @endif
	    				                	<label class="custom-control-label" for="toolsPage">Must have affiliate tools page</label>
	    				                </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            @if($product->mobileTrafic)
	    				                	    <input type="checkbox" class="custom-control-input" name="mobileTrafic" id="mobileTrafic" value="1"  checked/>
                                            @else
                                                <input type="checkbox" class="custom-control-input" name="mobileTrafic" id="mobileTrafic" value="1"  />
                                            @endif
	    				                	<label class="custom-control-label" for="mobileTrafic">Support for mobile trafic</label>
	    				                </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="comissaoInicial">Comissão inicial - Initial $/conversion</label>

                                        <!-- Implementar -->
                                        <input class="form-control form-control-lg" type="text" name="comissaoInicial" id="comissaoInicial" />
                                    </div>
                                </div>

                                <br>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <h5>Hotmart exclusivo</h5>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        @switch($product->cookie_duration)
                                        @case('infita')
                                            <select class="form-control" name="duracaoCookie" id="duracaoCookie">
                                                <option>de 30 dias</option>
                                                <option>infinita</option>
                                                <option>de 60 dias</option>
                                                <option>de 90 dias</option>
                                                <option>de 180 dias</option>
	    				                    </select>
                                        @break
                                        @case('de 30 dias')
                                            <select class="form-control" name="duracaoCookie" id="duracaoCookie">
	    				                    	<option>de 30 dias</option>
                                                <option>infinita</option>
                                                <option>de 60 dias</option>
                                                <option>de 90 dias</option>
                                                <option>de 180 dias</option>
	    				                    </select>
                                        @break
                                        @case('de 60 dias')
                                            <select class="form-control" name="duracaoCookie" id="duracaoCookie">
                                                <option>de 60 dias</option>
                                                <option>infinita</option>
                                                <option>de 30 dias</option>
                                                <option>de 90 dias</option>
                                                <option>de 180 dias</option>
	    				                    </select>
                                        @break
                                        @case('de 90 dias')
                                            <select class="form-control" name="duracaoCookie" id="duracaoCookie">
                                                <option>de 90 dias</option>
                                                <option>de 30 dias</option>
                                                <option>infinita</option>
                                                <option>de 60 dias</option>
                                                <option>de 180 dias</option>
	    				                    </select>
                                        @break
                                        @case('de 180 dias')
                                            <select class="form-control" name="duracaoCookie" id="duracaoCookie">
                                                <option>de 180 dias</option> 
                                                <option>de 30 dias</option>
                                                <option>infinita</option>
                                                <option>de 60 dias</option>
                                                <option>de 90 dias</option>
	    				                    </select>
                                        @break
                                        @default
                                            <select class="form-control" name="duracaoCookie" id="duracaoCookie">
	    				                    	<option>Duração do cookie</option>
                                                <option>de 30 dias</option>
                                                <option>infinita</option>
                                                <option>de 60 dias</option>
                                                <option>de 90 dias</option>
                                                <option>de 180 dias</option>
	    				                    </select>
                                    @endswitch
                                    </div>  
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        @switch($product->cookie_type)
                                        @case('último clique')
                                            <select class="form-control" name="comissaoCookie" id="comissaoCookie">
	    				                    	<option>último clique</option>
                                                <option>primeiro clique</option>
                                                <option>primeiro e último clique</option>
	    				                    </select>
                                        @break
                                        @case('primeiro clique')
                                            <select class="form-control" name="comissaoCookie" id="comissaoCookie">
                                                <option>primeiro clique</option>
	    				                    	<option>último clique</option>
                                                <option>primeiro e último clique</option>
	    				                    </select>
                                        @break
                                        @case('primeiro e último clique')
                                            <select class="form-control" name="comissaoCookie" id="comissaoCookie">
                                                <option>primeiro e último clique</option>
	    				                    	<option>último clique</option>
                                                <option>primeiro clique</option>
	    				                    </select>
                                        @break
                                        @default
                                            <select class="form-control" name="comissaoCookie" id="comissaoCookie">
	    				                    	<option>Comissão do cookie</option>
	    				                    	<option>último clique</option>
                                                <option>primeiro clique</option>
                                                <option>primeiro e último clique</option>
	    				                    </select>
                                        @break
                                        @endswitch
                                    </div>
                                </div>
                                <br>
                                
                                <div class="row">
                                    <div class="col">
                                        <label for="notaProduto">Nota do produto</label>
                                        @if($product->evaluate)
                                            <input class="form-control form-control-lg" type="text" name="notaProduto" id="notaProduto" value="{{ $product->evaluate }}"/>
                                        @else
                                            <input class="form-control form-control-lg" type="text" name="notaProduto" id="notaProduto" value="{{ $product->evaluate }}"/>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
	            	</div>
                </div>
	        </div>
        </div>

@endsection

@push('scripts')
    <script src="/assets/plugins/tag-it/js/tag-it.min.js"></script>
    <script src="/assets/js/demo/newProduct.demo.js"></script>
    <script src="/assets/plugins/clipboard/dist/clipboard.min.js"></script>
    <script src="/assets/js/demo/show-products.demo.js"></script>
    <script src="/assets/js/demo/form-plugins.demo.js"></script>
    <script src="/assets/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
    <script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
@endpush