@extends('layouts.default')

@section('title', 'Blank Page')

@section('content')
<div class="row">
    <div class="col-md-7 mx-auto">
    <div class="card text-center border-0">
				<div class="card-header">
                <span class="close" data-dismiss="alert">×</span><h4 class="card-title text-left">Novo produto</h4>
				</div>
				<div class="card-body">
					<div class="tab-content p-0 m-0">
						<div class="tab-pane fade active show" id="card-pill-1">
							<h5 class="card-title text-left">Network</h5>
							<div class="row">
                                <div class="col-md-7">
                                    <form action="{{ route('validateNewProduct') }}" method="POST">
                                    @csrf
                                    <select class="form-control" name="network" id="network">
	    				                <option>Hotmart</option>
	    				                <option>Clickbank</option>
                                        <option>Em branco</option>
	    				            </select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <h5 class="card-title text-left">ID do produto</h5>
							<div class="row">
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <input class="form-control" type="number" name="idProduto" id="idProduto">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-default"><i class="fas fa-arrow-circle-down"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <hr>
                                <div class="row">
                                    <div class="col text-right">
                                        <a href="javascript:;" class="btn btn-sm btn-default">Cancelar</a>
							            <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                                    </div>
                                </div>
                            </form>
						</div>
					</div>
				</div>
			</div>
    </div>
</div>
	
@endsection