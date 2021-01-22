

<!-- begin theme-panel -->
<div class="theme-panel theme-panel-lg">
	<a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-filter"></i></a>
	<div class="theme-panel-content">
		<form method="POST" action="{{ route('applyFilters') }}">
			@csrf
			<h5>Network</h5>
			<div class="form-group row m-b-15">
				<div class="col-md-9">
					<select class="form-control" name="network" id="network">
						<option>Hotmart</option>
						<option>Clickbank</option>
					</select>
				</div>
			</div>
			<div class="divider"></div>
			<h5>Todos os produtos</h5>
				<div class="custom-control custom-checkbox">
				  <input type="checkbox" class="custom-control-input" id="favoritos" name="favoritos" value="1">
				  <label class="custom-control-label" for="favoritos">Favoritos</label>
				</div>
				<div class="custom-control custom-checkbox">
				  <input type="checkbox" class="custom-control-input" id="estrela" name="estrela" value="1">
				  <label class="custom-control-label" for="estrela">Estrela</label>
				</div>
				<div class="custom-control custom-checkbox">
				  <input type="checkbox" class="custom-control-input" id="lancamento" name="lancamento" value="1">
				  <label class="custom-control-label" for="lancamento">Lançamento</label>
				</div>

			<div class="divider"></div>
			<h5>Tipo de afiliação</h5>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Afiliação por 1 click</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
			  			<input type="checkbox" class="custom-control-input" id="oneclick" name="oneclick" value="1">
			  			<label class="custom-control-label" for="oneclick">Afiliação por 1 click</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Afiliação por aprovação</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
			  			<input type="checkbox" class="custom-control-input" id="aprovacao" name="aprovacao" value="1">
			  			<label class="custom-control-label" for="aprovacao">Afiliação por aprovação</label>
					</div>
				</div>
			</div>

			<div class="divider"></div>
			<h5>Valor do curso</h5>
			<div class="form-group row">
				<!-- <label class="col-lg-4 col-form-label">Custom Range</label> -->
				<div class="col-lg-12">
					<input type="text" id="priceValue" name="priceValue" value="" />
				</div>
			</div>
			<div class="divider"></div>

			<h5>% da comissão</h5>
			<div class="form-group row">
				<!-- <label class="col-lg-4 col-form-label">Custom Range</label> -->
				<div class="col-lg-12">
					<input type="text" id="comissionValue" name="comissionValue" value="" />
				</div>
			</div>
			<div class="divider"></div>
			<h5>Cookies</h5>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Primeiro click</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
			  			<input type="checkbox" class="custom-control-input" id="primeiroclick" name="primeiroclick" value="1">
			  			<label class="custom-control-label" for="primeiroclick">Primeiro click</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Ultimo click</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
			  			<input type="checkbox" class="custom-control-input" id="ultimoclick" name="ultimoclick" value="1">
			  			<label class="custom-control-label" for="ultimoclick">Último click</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="multiclicks" id="multiclicks" value="1" />
						<label class="custom-control-label" for="multiclicks">Multiplos clicks</label>
					</div>
				</div>
				<!-- <div class="col-6 control-label text-inverse f-w-600">Multiplos clicks</div> -->
			</div>
			<div class="divider"></div>
			<h5>Categorias</h5>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Favoritos</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="animais_plantas" id="animais_plantas" value="1"  />
						<label class="custom-control-label" for="animais_plantas">Animais e Plantas</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Estrela</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="apps" id="apps" value="1" />
						<label class="custom-control-label" for="apps">Apps & Software</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="casa_construcao" id="casa_construcao" value="1"  />
						<label class="custom-control-label" for="casa_construcao">Casa e Construção</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="culinaria" id="culinaria" value="1"  />
						<label class="custom-control-label" for="culinaria">Culinaria e Gastronomia</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="desenvolvimento_pessoal" id="desenvolvimento_pessoal" value="1"  />
						<label class="custom-control-label" for="desenvolvimento_pessoal">Desenvolvimento pessoal</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="design" id="design" value="1"  />
						<label class="custom-control-label" for="design">Design</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="direito" id="direito" value="1"  />
						<label class="custom-control-label" for="direito">Direito</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="ecologia" id="ecologia" value="1"  />
						<label class="custom-control-label" for="ecologia">Ecologia e Meio ambiente</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="educacional" id="educacional" value="1"  />
						<label class="custom-control-label" for="educacional">Educacional</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="empreendedorismo_digital" id="empreendedorismo_digital" value="1"  />
						<label class="custom-control-label" for="empreendedorismo_digital">Empreendedorismo digital</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="entreterimento" id="entreterimento" value="1"  />
						<label class="custom-control-label" for="entreterimento">Entreterimento</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="espiritualidade" id="espiritualidade" value="1"  />
						<label class="custom-control-label" for="espiritualidade">Espiritualidade</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="financas" id="financas" value="1"  />
						<label class="custom-control-label" for="financas">Finanças e Investimento</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="hobbies" id="hobbies" value="1"  />
						<label class="custom-control-label" for="hobbies">Hobbies</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="idiomas" id="idiomas" value="1"  />
						<label class="custom-control-label" for="idiomas">Idiomas</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Favoritos</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="internet" id="internet" value="1"  />
						<label class="custom-control-label" for="internet">Internet</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Estrela</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="literatura" id="literatura" value="1" />
						<label class="custom-control-label" for="literatura">Literatura</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="moda" id="moda" value="1"  />
						<label class="custom-control-label" for="moda">Moda e Beleza</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="musica" id="musica" value="1"  />
						<label class="custom-control-label" for="musica">Musica e artes</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="negocios" id="negocios" value="1"  />
						<label class="custom-control-label" for="negocios">Negocios e Carreira</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="outros" id="outros" value="1"  />
						<label class="custom-control-label" for="outros">Outros</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="relacionamento" id="relacionamento" value="1"  />
						<label class="custom-control-label" for="relacionamento">Relacionamentos</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="saude" id="saude" value="1"  />
						<label class="custom-control-label" for="saude">Saude e Esportes</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="sexualidade" id="sexualidade" value="1"  />
						<label class="custom-control-label" for="sexualidade">Sexualidade</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="tecnologia" id="tecnologia" value="1"  />
						<label class="custom-control-label" for="tecnologia">Tecnologia da Informação</label>
					</div>
				</div>
			</div>
			<div class="divider"></div>
			<h5>Formato</h5>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Favoritos</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="software_download" id="software_download" value="1"  />
						<label class="custom-control-label" for="software_download">Software e programas pra baixar</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Estrela</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="imagens" id="imagens" value="1" />
						<label class="custom-control-label" for="imagens">Imagens, Icones, Fotos</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="numero_serie" id="numero_serie" value="1"  />
						<label class="custom-control-label" for="numero_serie">Numero de serie, Cupons de descontos</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="app_celular" id="app_celular" value="1"  />
						<label class="custom-control-label" for="app_celular">Aplicativos para celular</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="templates" id="templates" value="1"  />
						<label class="custom-control-label" for="templates">Templates, Codigos fontes</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="servico" id="servico" value="1"  />
						<label class="custom-control-label" for="servico">Serviço online</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="evento" id="evento" value="1"  />
						<label class="custom-control-label" for="evento">Evento Online</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="screencast" id="screencast" value="1"  />
						<label class="custom-control-label" for="screencast">Screencasts, filmes, clipes</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="ingressos" id="ingressos" value="1"  />
						<label class="custom-control-label" for="ingressos">Ingressos para eventos</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="ebook" id="ebook" value="1"  />
						<label class="custom-control-label" for="ebook">eBooks, Documentos</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="audio" id="audio" value="1"  />
						<label class="custom-control-label" for="audio">Áudios, Músicas, Ringtones</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="curso" id="curso" value="1"  />
						<label class="custom-control-label" for="curso">Cursos Online, Área de Membros, Serviços de Assinatura</label>
					</div>
				</div>
			</div>
			<div class="divider"></div>
			<h5>Idioma</h5>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="ingles" id="ingles" value="1"  />
						<label class="custom-control-label" for="ingles">Inglês</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="frances" id="frances" value="1"  />
						<label class="custom-control-label" for="frances">Françês</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="portugues_pt" id="portugues_pt" value="1"  />
						<label class="custom-control-label" for="portugues_pt">Português (Portugal)</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="portugues_br" id="portugues_br" value="1"  />
						<label class="custom-control-label" for="portugues_br">Português (Brasil)</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="alemao" id="alemao" value="1"  />
						<label class="custom-control-label" for="alemao">Alemão</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="italiano" id="italiano" value="1"  />
						<label class="custom-control-label" for="italiano">Italiano</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="russo" id="russo" value="1"  />
						<label class="custom-control-label" for="russo">Russo</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="arabe" id="arabe" value="1"  />
						<label class="custom-control-label" for="arabe">Árabe</label>
					</div>
				</div>
			</div>
			<div class="row m-t-10">
				<!-- <div class="col-6 control-label text-inverse f-w-600">Lançamento</div> -->
				<div class="col-6 d-flex">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="japones" id="japones" value="1"  />
						<label class="custom-control-label" for="japones">Japonês</label>
					</div>
				</div>
			</div>
			<div class="divider"></div>
			<div class="row m-t-10">
				<div class="col-md-12">
					<button type="submit" class="btn btn-inverse btn-block btn-rounded"><b>Aplicar Filtros</b></a>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- end theme-panel -->
