<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Network;
use Carbon\Carbon;
use App\Temperature;
use App\Keywords;
use App\Ads;
use App\Notes;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::paginate(20);
        $count    = Product::count();
        $data     = ["count" => $count,"products" =>$products];
        return view('pages/listProducts',$data);
    }
    public function setUniqueName($id){

        $product = Product::where('id','=',$id)->first();
        if($product->uniqueName){
            $product->uniqueName = false;
        }else{
            $product->uniqueName = true;
        }
        $product->save();
        return 'ok';
    }
    public function setFavorite($id){
        $product = Product::where('id','=',$id)->first();
        if($product->favorites){
            $product->favorites = false;
        }else{
            $product->favorites = true;
        }
        $product->save();
        return 'ok';
    }

    public function loadProductFromHotmart($id){
        $response = Http::timeout(60)->get('http://localhost:5000/api/v1/getProduct?id='.$id);
        if($response->status() == 200){
            $json = $response->json();
            // dd($json["about"]);
            if(isset($json["error"])){
                echo "<h1>Produto nao encontrado</h1>";
            }else{
                $product  = new Product();
                $product->idWebsite = $json["id"];
                $product->about = $json["about"];
                $product->accessMethod = $json["accessMethod"];
                $product->checkout = $json["checkout"];
                $product->cookie_type = $json["commission"];
                $product->cookie_duration = $json["cookie"];
                $product->evaluation = $json["evaluation"];
                $product->format = $json["format"];
                $product->imgLink = $json["imgLink"];
                $product->language = $json["language"];
                $product->link = $json["link"];
                $product->maxPrice = $json["maxPrice"];
                $product->pageProduct = $json["pageProduct"];
                $product->percentage = $json["percentage"];
                $product->price   = $json["price"];
                $product->subject = $json["subject"];
                $product->title   = $json["title"];
                $temperature = $json["temperature"];
                $data = ["product" => $product, "temperature" => $temperature];
                return view('pages/newProduct')->with($data);
            }
        }
    }
       

    public function setProductPendente(Request $request){
        $data = $request->all();
        if(!isset($data['error'])){
            $p                  = new Product();
            $p->idWebsite       = $data['id'];
            $p->title           = $data['title'];
            $p->imageLink       = $data['imageLink'];
            $p->comission       = $data['price'];
            $p->maxPrice        = $data['maxPrice'];
            $p->about           = $data['about'];
            $p->evaluation      = $data['evaluation'];
            $p->format          = $data['format'];
            $p->language        = $data['language'];
            $p->accessMethod    = $data['accessMethod'];
            $p->link            = $data['link'];
            $p->cookie_duration = $data['cookie'];
            $p->cookie_type     = $data['commission'];
            $p->checkout        = $data['checkout'];
            $p->pageProduct     = $data['pageProduct'];
            $p->subject         = $data['subject'];
            $p->pendente        = true;
            if($data['maxPrice'] != 0){
                $p->percentage = ($data['price']/$data['maxPrice'])*100;
            }else{
                $p->percentage = 0.0;
            }
            $p->save();
        }else{
            $p     = new Product();
            $p->pendente = True;
            $p->save();
        }
    }

    public function applyFilters(Request $request)
    {   
        $queryProducts = Product::query();
        $dataForm     = $request->all();
        
        // Preço
        $priceValues = explode(";",$dataForm['priceValue']);
        $minValue    = floatval($priceValues[0]);
        $maxValue    = floatval($priceValues[1]);
        $queryProducts->whereBetween('maxPrice',[$minValue,$maxValue]);
        
        // Comissao
        $comissionValues = explode(";",$dataForm['comissionValue']);
        $minValue        = floatval($comissionValues[0]);
        $maxValue        = floatval($comissionValues[1]);
        $queryProducts->whereBetween('percentage',[$minValue,$maxValue]);
        $count    = Product::count();
        
        // Tipo de cookies
        if(isset($dataForm['primeiroclick'])){
            $queryProducts->where('cookie_type','=','primeiro clique');
        }
        if(isset($dataForm['ultimoclick'])){
            $queryProducts->where('cookie_type','=','último clique');
        }
        if(isset($dataForm['multiclicks'])){
            $queryProducts->where('cookie_type','=','primeiro e último clique');
        }

        // Categorias
        if(isset($dataForm['animais_plantas'])){
            $queryProducts->where('subject','=','imais e Planta');
            
        }
        if(isset($dataForm['casa_construcao'])){
            $queryProducts->where('subject','=','Casa e Construçã');
        }
        if(isset($dataForm['culinaria'])){
            $queryProducts->where('subject','=','Culinária e Gastronomia');
        }
        if(isset($dataForm['desenvolvimento_pessoal'])){
            $queryProducts->where('subject','=','Desenvolvimento Pessoal');
        }
        if(isset($dataForm['design'])){
            $queryProducts->where('subject','=','Desig');
        }
        if(isset($dataForm['direito'])){
            $queryProducts->where('subject','=','Direito');
        }
        if(isset($dataForm['ecologia'])){
            $queryProducts->where('subject','=','Ecologia e Meio Ambiente');
        }
        if(isset($dataForm['educacional'])){
            $queryProducts->where('subject','=','Educacional');
        }
        if(isset($dataForm['empreendedorismo_digital'])){
            $queryProducts->where('subject','=','Empreendedorismo Digital');
        }
        if(isset($dataForm['entreterimento'])){
            $queryProducts->where('subject','=','Entretenime');
        }
        if(isset($dataForm['espiritualidade'])){
            $queryProducts->where('subject','=','Espiritualidade');
        }
        if(isset($dataForm['financas'])){
            $queryProducts->where('subject','=','Finanças e Investime');
        }
        if(isset($dataForm['hobbies'])){
            $queryProducts->where('subject','=','Hobbie');
        }
        if(isset($dataForm['idioma'])){
            $queryProducts->where('subject','=','Idioma');
        }
        if(isset($dataForm['internet'])){
            $queryProducts->where('subject','=','Interne');
        }
        if(isset($dataForm['literatura'])){
            $queryProducts->where('subject','=','Literatura');
        }
        if(isset($dataForm['moda'])){
            $queryProducts->where('subject','=','Moda e Beleza');
        }
        if(isset($dataForm['tecnologia'])){
            $queryProducts->where('subject','=','Tecnologia da Informaçã');
        }
        if(isset($dataForm['sexualidade'])){
            $queryProducts->where('subject','=','Sexualidade');
        }
        if(isset($dataForm['saude'])){
            $queryProducts->where('subject','=','Saúde e Esporte');
        }
        if(isset($dataForm['outros'])){
            $queryProducts->where('subject','=','Outr');
        }
        if(isset($dataForm['apps'])){
            $queryProducts->where('subject','=','pps & Software');
        }
        if(isset($dataForm['negocios'])){
            $queryProducts->where('subject','=','Negócios e Carreira');
        }
        if(isset($dataForm['musica'])){
            $queryProducts->where('subject','=','Música e Arte');
        }
        // Idiomas
        if(isset($dataForm['italiano'])){
            $queryProducts->where('language','=','talian');
        }
        if(isset($dataForm['russo'])){
            $queryProducts->where('language','=','Russ');
        }
        if(isset($dataForm['portugues_pt'])){
            $queryProducts->where('language','=','Português (Portugal)');
        }
        if(isset($dataForm['portugues_br'])){
            $queryProducts->where('language','=','Português (Brasil)');
        }
        if(isset($dataForm['alemao'])){
            $queryProducts->where('language','=','Alemã');
        }
        if(isset($dataForm['arabe'])){
            $queryProducts->where('language','=','Árabe');
        }
        if(isset($dataForm['espanhol'])){
            $queryProducts->where('language','=','Espanhol');
        }
        if(isset($dataForm['frances'])){
            $queryProducts->where('language','=','Francês');
        }
        if(isset($dataForm['japones'])){
            $queryProducts->where('language','=','Japonês');
        }
        if(isset($dataForm['ingles'])){
            $queryProducts->where('language','=','nglês');
        }

        // Formato
        if(isset($dataForm['software_download'])){
            $queryProducts->where('format','=','Software, Programas para baix');
        }
        if(isset($dataForm['imagens'])){
            $queryProducts->where('format','=','Imagens, Ícones, Fotos');
        }
        if(isset($dataForm['numero_serie'])){
            $queryProducts->where('format','=','Números de Série, Cupons de Descon');
        }
        if(isset($dataForm['app_celular'])){
            $queryProducts->where('format','=','Aplicativos para Celul');
        }
        if(isset($dataForm['templates'])){
            $queryProducts->where('format','=','Templates, Códigos Fonte');
        }
        if(isset($dataForm['servico'])){
            $queryProducts->where('format','=','Serviço Online');
        }
        if(isset($dataForm['evento'])){
            $queryProducts->where('format','=','Evento Online');
        }
        if(isset($dataForm['screencast'])){
            $queryProducts->where('format','=','Screencasts, filmes, clipes');
        }
        if(isset($dataForm['ingressos'])){
            $queryProducts->where('format','=','Ingressos para eventos');
        }
        
        if(isset($dataForm['ebooks'])){
            $queryProducts->where('format','=','eBooks, Documentos');
        }

        if(isset($dataForm['curso'])){
            $queryProducts->where('format','=','Cursos Online, Área de Membros, Serviços de Assinatu');
        }

        if(isset($dataForm['audio'])){
            $queryProducts->where('format','=','Áudios, Músicas, Ringtones');
        }

        if(isset($dataForm['favoritos'])){
            $queryProducts->where('favorites','=',true);
        }
        if(isset($dataForm['estrela'])){
            $queryProducts->where('uniqueName','=',true);
        }

        $filtersCount = count($queryProducts->get());
        $products = $queryProducts->paginate(20);
        $data = ["count" => $count,"products" =>$products,"filtersCount" => $filtersCount];
        return view('pages/listProducts',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/newProductDialog');
    }

    public function newProject($id){
        return view('pages/newProduct');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm   = $request->all();
        $newProduct = new Product();
        if(empty($dataForm['valorComissao'])){
            $newProduct->maxPrice = 0.0;
        }else{
            $newProduct->maxPrice = float($dataForm['valorComissao']);
        }
    
        if(isset($dataForm['recorrenteSwitch'])){
            $newProduct->recurring = true;
        }else{
            $newProduct->recurring = false;
        }
        if(empty($dataForm['recorrente'])){
            $newProduct->recorrente = 0.0;
        }else{
            $newProduct->recorrente = float($dataForm['recorrente']);
        }
        if(!strcmp($dataForm['categoria'],'Categorias')){
            $newProduct->subject = null;
        }else{
            $newProduct->subject = $dataForm['categoria'];
        }
        if (empty($dataForm['format'])){
            $newProduct->format = null;
        }else{
            $newProduct->format = $dataForm['format'];
        }
        if(!strcmp($dataForm['tipoComissao'],'Tipo de comissão')){
            $newProduct->type = null;
        }else{
            $newProduct->type = $dataForm['tipoComissao'];
        }if(strcmp($dataForm['statusAfiliacao'],'Status da afialiação')){
            $newProduct->status_aprovacao = null;
        }else{
            $newProduct->status_aprovacao = $dataForm['statusAfiliacao'];
        }
        // if(empty($dataForm['pais'])){

        if(empty($dataForm['idioma'])){
            $newProduct->languge = null;
        }else{
            $newProduct->language = $dataForm['idioma'];
        }
        if(isset($dataForm['lancamentoSwitch'])){
            $newProduct->lancamento = true;
        }else{
            $newProduct->lancamento = false;
        }
        if(!empty($dataForm['start'])){
            $product->startDate = (new Carbon($dataForm['start']))->format('Y-m-d');  
            $product->endDate   = (new Carbon($dataForm['end']))->format('Y-m-d'); 
        }else{$product->startDate  = null;
            $product->endDate      = null;
        }
        if(isset($dataForm['nomeUnico'])){
            $newProduct->uniqueName = true;
        }else{
            $newProduct->uniqueName = false;
        }
        if(isset($dataForm['favorito'])){
            $newProduct->favorites = true;
        }else{
            $newProduct->favorites = true;
        }
        if(isset($dataForm['midiaPatrocinada'])){
            $newProduct->midiaPatrocinada = true;
        }else{
            $newProduct->midiaPatrocinada = false;
        }
        if(isset($dataForm['adsSwitch'])){
            $newProduct->ativeAds = true;
        }else{
            $newProduct->ativeAds = false;
        }
        if(empty($dataForm['email'])){
            $newProduct->emailProdutor = null;
        }else{
            $newProduct->emailProdutor = $dataForm['email'];
        }
        if(empty($dataForm['telefone'])){
            $newProduct->telProdutor = null;
        }else{
            $newProduct->telProdutor = $dataForm['telefone'];
        }
        if(empty($dataForm['nomeProdutor'])){
            $newProduct->nomeProdutor = null;
        }else{
            $newProduct->nomeProdutor = $dataForm['nomeProdutor'];
        }
        if(empty($dataForm['sobre'])){
            $newProduct->about = null;
        }else{
            $newProduct->about = $dataForm['sobre'];
        }
        if(isset($dataForm['trial'])){
            $newProduct->trial = true;
        }else{
            $newProduct->trial = false;
        }
        if(isset($dataForm['upsell'])){
            $newProduct->upsell = true;
        }else{
            $newProduct->upsell = false;
        }
        if(isset($dataForm['toolsPage'])){
            $newProduct->affiliateToolsPage = true;
        }else{
            $newProduct->affiliateToolsPage = false;
        }
        if(isset($dataForm['mobileTrafic'])){
            $newProduct->mobileTrafic = true;
        }else{
            $newProduct->mobileTrafic = false;
        }
        // if(empty($dataForm['comissaoInicial'])){
            // $newProduct->
        // }
        if(!strcmp($dataForm['duracaoCookie'],'Duração do cookie')){
            $newProduct->cookie_duration = null;
        }else{
            $newProduct->cookie_duration = $dataForm['duracaoCookie'];
        }
        if(!strcmp($dataForm['comissaoCookie'],'Comissão do cookie')){
            $newProduct->cookie_type = null;
        }else{
            $newProduct->cookie_type = $dataForm['comissaoCookie'];
        }
        if(empty($dataForm['notaProduto'])){
            $newProduct->evaluate = null;
        }else{
            $newProduct->evaluate = float($dataForm['notaProduto']);
        }
        return redirect(route('listProducts'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id','=',$id)->first();
        return view('pages/showProduct',compact("product",$product));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id','=',$id)->first();
        // dd($product);
        return view('pages/editProduct',compact('product',$product));
    }

    public function updateProductPreferences(Request $request){
        $dataForm = $request->all();
        $id       = $dataForm['idProduto'];
        $product  = Product::where('id','=',$id)->first();
        // dd($dataForm);
        
        if(isset($dataForm['recorrente'])){
           $product->recorrente = floatval($dataForm['recorrente']); 
        }
        else{
            $product->recorrente = 0.0;
        }
        if($dataForm['start']){
            $product->startDate = (new Carbon($dataForm['start']))->format('Y-m-d');  
            $product->endDate   = (new Carbon($dataForm['end']))->format('Y-m-d'); 
        }
            

        if(isset($dataForm['nomeUnico'])){
            $product->uniqueName = true;
        }else{
            $product->uniqueName = false;
        }

        if(isset($dataForm['favorito'])){
            $product->favorites = true;
        }else{
            $product->favorites = false;
        }

        if(!strcmp($dataForm['statusAfiliacao'],'Status da afialiação')){
            $product->status_aprovacao = null;
        }
        else{
            $product->status_aprovacao = $dataForm['statusAfiliacao'];
        }
        if(isset($dataForm['midiaPatrocinada'])){
            $product->midiaPatrocinada = true;
        }else{
            $product->midiaPatrocinada = false;
        }
        if(isset($dataForm['adsSwitch'])){
            $product->ativeAds = true;
        }else{
            $product->ativeAds = false;
        }
        if(isset($dataForm['recorrenteSwitch'])){
            $product->recurring = true;
        }else{
            $product->recurring = false;
        }
        if(isset($dataForm['lancamentoSwitch'])){
            $product->lancamento = true;
        }else{
            $product->lancamento = false;
        }
        if(isset($dataForm['trial'])){
            $product->trial = true;
        }else{
            $product->trial = false;
        }
        if(isset($dataForm['upsell'])){
            $product->upsell = true;
        }else{
            $product->upsell = false;
        }

        if(isset($dataForm['toolsPage'])){
            $product->affiliateToolsPage = true;
        }else{
            $product->affiliateToolsPage = false;
        }
        
        if(isset($dataForm['mobileTrafic'])){
            $product->mobileTrafic = true;
        }else{
            $product->mobileTrafic = false;
        }
        $product->save();
        return redirect(route('viewProducts',$id));

    }
    public function validateNewProduct(Request $request){
        $dataForm = $request->all();
        $id       = $dataForm['idProduto'];
        $network  = $dataForm['network'];
        $product  = Product::where('idWebsite','=',$id)->first();
        if(!$product){
            $product = new Product();
            $product->idWebsite = $id;
            $product->save();
            $netw = new Network();
            $netw->origin = 'Hotmart';
            $netw->product_id = $product->id;
            $netw->save();        
            return redirect(route('newProduct',$id))->with(compact('product',$product ));
        }else{
            return redirect(route('newProductDialog')."?erro=1");
        }
        
    }

    public function updateAbout(Request $request){
        $dataForm = $request->all();
        $id       = $dataForm['idProdutoEdit'];
        $text     = $dataForm['editAbout'];
        $product  = Product::where('id','=',$id)->first();
        $product->about = base64_encode($text);
        $product->save();
        return redirect(route('viewProducts',$id));
    }

    public function orderByProducts($order){
        $count = Product::count();
        if($order == 1){
            $queryProducts = Product::query();
            $queryProducts->orderBy("title","ASC");
            $products = $queryProducts->paginate(20);
        }else if ($order == 2){
            $queryProducts = Product::query();
            $queryProducts->orderBy("title","DESC");
            $products = $queryProducts->paginate(20);
        }
        $data = ['count' => $count,'products' => $products];
        return view('pages/listProducts')->with($data);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function update(Request $request, $id)
    {
        $dataForm   = $request->all();
        $newProduct = new Product();
        if(empty($dataForm['valorComissao'])){
            $newProduct->maxPrice = 0.0;
        }else{
            $newProduct->maxPrice = float($dataForm['valorComissao']);
        }
    
        if(isset($dataForm['recorrenteSwitch'])){
            $newProduct->recurring = true;
        }else{
            $newProduct->recurring = false;
        }
        if(empty($dataForm['recorrente'])){
            $newProduct->recorrente = 0.0;
        }else{
            $newProduct->recorrente = float($dataForm['recorrente']);
        }
        if(!strcmp($dataForm['categoria'],'Categorias')){
            $newProduct->subject = null;
        }else{
            $newProduct->subject = $dataForm['categoria'];
        }
        if (empty($dataForm['format'])){
            $newProduct->format = null;
        }else{
            $newProduct->format = $dataForm['format'];
        }
        if(!strcmp($dataForm['tipoComissao'],'Tipo de comissão')){
            $newProduct->type = null;
        }else{
            $newProduct->type = $dataForm['tipoComissao'];
        }if(strcmp($dataForm['statusAfiliacao'],'Status da afialiação')){
            $newProduct->status_aprovacao = null;
        }else{
            $newProduct->status_aprovacao = $dataForm['statusAfiliacao'];
        }
        // if(empty($dataForm['pais'])){

        if(empty($dataForm['idioma'])){
            $newProduct->languge = null;
        }else{
            $newProduct->language = $dataForm['idioma'];
        }
        if(isset($dataForm['lancamentoSwitch'])){
            $newProduct->lancamento = true;
        }else{
            $newProduct->lancamento = false;
        }
        if(!empty($dataForm['start'])){
            $product->startDate = (new Carbon($dataForm['start']))->format('Y-m-d');  
            $product->endDate   = (new Carbon($dataForm['end']))->format('Y-m-d'); 
        }else{$product->startDate  = null;
            $product->endDate      = null;
        }
        if(isset($dataForm['nomeUnico'])){
            $newProduct->uniqueName = true;
        }else{
            $newProduct->uniqueName = false;
        }
        if(isset($dataForm['favorito'])){
            $newProduct->favorites = true;
        }else{
            $newProduct->favorites = true;
        }
        if(isset($dataForm['midiaPatrocinada'])){
            $newProduct->midiaPatrocinada = true;
        }else{
            $newProduct->midiaPatrocinada = false;
        }
        if(isset($dataForm['adsSwitch'])){
            $newProduct->ativeAds = true;
        }else{
            $newProduct->ativeAds = false;
        }
        if(empty($dataForm['email'])){
            $newProduct->emailProdutor = null;
        }else{
            $newProduct->emailProdutor = $dataForm['email'];
        }
        if(empty($dataForm['telefone'])){
            $newProduct->telProdutor = null;
        }else{
            $newProduct->telProdutor = $dataForm['telefone'];
        }
        if(empty($dataForm['nomeProdutor'])){
            $newProduct->nomeProdutor = null;
        }else{
            $newProduct->nomeProdutor = $dataForm['nomeProdutor'];
        }
        if(empty($dataForm['sobre'])){
            $newProduct->about = null;
        }else{
            $newProduct->about = $dataForm['sobre'];
        }
        if(isset($dataForm['trial'])){
            $newProduct->trial = true;
        }else{
            $newProduct->trial = false;
        }
        if(isset($dataForm['upsell'])){
            $newProduct->upsell = true;
        }else{
            $newProduct->upsell = false;
        }
        if(isset($dataForm['toolsPage'])){
            $newProduct->affiliateToolsPage = true;
        }else{
            $newProduct->affiliateToolsPage = false;
        }
        if(isset($dataForm['mobileTrafic'])){
            $newProduct->mobileTrafic = true;
        }else{
            $newProduct->mobileTrafic = false;
        }
        // if(empty($dataForm['comissaoInicial'])){
            // $newProduct->
        // }
        if(!strcmp($dataForm['duracaoCookie'],'Duração do cookie')){
            $newProduct->cookie_duration = null;
        }else{
            $newProduct->cookie_duration = $dataForm['duracaoCookie'];
        }
        if(!strcmp($dataForm['comissaoCookie'],'Comissão do cookie')){
            $newProduct->cookie_type = null;
        }else{
            $newProduct->cookie_type = $dataForm['comissaoCookie'];
        }
        if(empty($dataForm['notaProduto'])){
            $newProduct->evaluate = null;
        }else{
            $newProduct->evaluate = float($dataForm['notaProduto']);
        }
        return redirect(route('listProducts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Notes::where('product_id','=',$id)->delete();
        Temperature::where('product_id','=',$id)->delete();
        Keywords::where('product_id','=',$id)->delete();
        Ads::where('product_id','=',$id)->delete();
        Network::where('product_id','=',$id)->delete();
        Product::where('id','=',$id)->delete();
        return redirect(route('listProducts'));
    }
    public function countProducts(Request $request){ 
        $c = Product::where('subject','=','imais e Planta')->count();
        echo "Categoria: Animais e plantas| Excel: 1943| Extraidos: $c<br>";
        $c = Product::where('subject','=','Casa e Construçã')->count();
        echo "Categoria: Casa e Contrução| Excel: 1927| Extraidos: $c<br>";
        $c = Product::where('subject','=','Culinária e Gastronomia')->count();
        echo "Categoria: Culinária e Gastronomia| Excel: 7104| Extraidos: $c<br>";
        $c = Product::where('subject','=','Desenvolvimento Pessoal')->count();
        echo "Categoria: Desenvolvimento Pessoal| Excel: 17812| Extraidos: $c<br>";
        $c = Product::where('subject','=','Desig')->count();
        echo "Categoria: Design| Excel: 3185| Extraidos: $c<br>";
        $c = Product::where('subject','=','Direito')->count();
        echo "Categoria: Direito| Excel: 2673| Extraidos: $c<br>";
        $c = Product::where('subject','=','Ecologia e Meio Ambiente')->count();
        echo "Categoria: Ecologia e Meio Ambiente| Excel: 642| Extraidos: $c<br>";
        $c = Product::where('subject','=','Educacional')->count();
        echo "Categoria: Educacional| Excel: 21533| Extraidos: $c<br>";
        $c = Product::where('subject','=','Empreendedorismo Digital')->count();
        echo "Categoria: Empreendedorismo Digital| Excel: 3607| Extraidos: $c<br>";
        $c = Product::where('subject','=','Entretenime')->count();
        echo "Categoria: Entretenimento| Excel: 1541| Extraidos: $c<br>";
        $c = Product::where('subject','=','Espiritualidade')->count();
        echo "Categoria: Espiritualidade| Excel: 4704| Extraidos: $c<br>";
        $c = Product::where('subject','=','Finanças e Investime')->count();
        echo "Categoria: Finanças e Investimentos| Excel: 9321| Extraidos: $c<br>";
        $c = Product::where('subject','=','Hobbie')->count();
        echo "Categoria: Hobbie| Excel: 1269| Extraidos: $c<br>";
        $c = Product::where('subject','=','Idioma')->count();
        echo "Categoria: Idioma| Excel: 1778| Extraidos: $c<br>";
        $c = Product::where('subject','=','Interne')->count();
        echo "Categoria: Internet| Excel: 4156| Extraidos: $c<br>";
        $c = Product::where('subject','=','Literatura')->count();
        echo "Categoria: Literatura| Excel: 2118| Extraidos: $c<br>";
        $c = Product::where('subject','=','Moda e Beleza')->count();
        echo "Categoria: Moda e Beleza| Excel: 5327| Extraidos: $c<br>";
        $c = Product::where('subject','=','Tecnologia da Informaçã')->count();
        echo "Categoria: Tecnologia da Informação| Excel: 2210| Extraidos: $c<br>";
        $c = Product::where('subject','=','Sexualidade')->count();
        echo "Categoria: Sexualidade| Excel: 631| Extraidos: $c<br>";
        $c = Product::where('subject','=','Saúde e Esporte')->count();
        echo "Categoria: Saúde e Esporte| Excel: 13964| Extraidos: $c<br>";
        $c = Product::where('subject','=','Outr')->count();
        echo "Categoria: Outros| Excel: 3784| Extraidos: $c<br>";
        $c = Product::where('subject','=','pps & Software')->count();
        echo "Categoria: Apps & Software| Excel: 2787| Extraidos: $c<br>";
        $c = Product::where('subject','=','Negócios e Carreira')->count();
        echo "Categoria: Negócios e Carreira| Excel: 16652| Extraidos: $c<br>";
        $c = Product::where('subject','=','Música e Arte')->count();
        echo "Categoria: Música e Arte| Excel: 6129| Extraidos: $c<br>";

     }
 }
