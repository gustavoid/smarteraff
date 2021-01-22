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
            <h1 class="page-header">Titulo do produto<i class="flag-icon flag-icon-it"></i> </h1>
                
            </div>  

        </div>

        <div class="row">
            <div class="col">

	            <div class="panel panel-inverse">
	            	<div class="panel-heading">
	            		<h4 class="panel-title">ID 18271919 | Hotmart <i class="fa fa-rocket" style="padding-left: 8px"></i></h4>
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
                                        <h5 style="color: #7b8084;">Venda R$</h5>
                                    </div>
                                    <!-- <div class="col"></div> -->
                                    <div class="col text-right"><h5> <strong style="color: #71a35b;">0%</strong>|<strong style="color: #c86060">0º</strong>|<strong style="color: #e4af7a">0</strong></h5></div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <h5 style="color:#71a35b">Comissão R$</h5>
                                    </div>
                                    <!-- <div class="col"></div> -->
                                    <div class="col-sm-3 text-right"><h6 style="color:#7b8084">CPA</h6></div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <h5 style="color:#71a35b">Comissão Incial R$</h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <h5 style="color:#9785bb">Recorrente R$</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <label for="valorProduto">Valor do Produto</label>
                                        <input class="form-control form-control-lg" type="text" name="valorProduto" id="valorProduto" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">   
                                        <label for="valorComissao">Valor da comissão</label>
                                        <input class="form-control form-control-lg" type="text" name="valorComissao" id="valorComissao" />
                                    </div>
                                </div>
                                <br>
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
                                        <input class="form-control" type="text" name="recorrente" id="recorrente" />
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="statusAfiliacao" id="statusAfiliacao">
	    				                	<option>Categoria</option>
	    				                	<option>Clickbank</option>
	    				                </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="format">Formato</label>
                                        <input class="form-control form-control-lg" type="text" name="format" id="format" />
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="tipoComissao" id="tipoComissao">
	    				                	<option>Tipo de comissão</option>
	    				                	<option>Clickbank</option>
	    				                </select>
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
                                        <input class="form-control form-control-lg" type="text" name="idioma" id="idioma" />
                                    </div>
                                </div>
                            </div> 
                            <div class="col">
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
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="email">Email do produtor</label>
                                        <input class="form-control form-control-lg" type="email" name="email" id="email" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="telefone">Whatsapp/Tel. do produtor</label>
                                        <input class="form-control form-control-lg" type="phone" name="telefone" id="telefone" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="nomeProdutor">Nome do produtor</label>
                                        <input class="form-control form-control-lg" type="text" name="nomeProdutor" id="nomeProdutor" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="sobre">Sobre</label>
                                        <textarea class="form-control" id rows="10"></textarea>
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
                                        <label for="comissaoInicial">Comissão inicial - Initial $/conversion</label>
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
                                        <select class="form-control" name="duracaoCookie" id="duracaoCookie">
	    				                	<option>Duração do cookie</option>
	    				                	<option>Clickbank</option>
	    				                </select>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="comissaoCookie" id="comissaoCookie">
	    				                	<option>Comissão do cookie</option>
	    				                	<option>Clickbank</option>
	    				                </select>
                                    </div>
                                </div>
                                <br>
                                
                                <div class="row">
                                    <div class="col">
                                        <label for="notaProduto">Nota do produto</label>
                                        <input class="form-control form-control-lg" type="text" name="notaProduto" id="notaProduto" />
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