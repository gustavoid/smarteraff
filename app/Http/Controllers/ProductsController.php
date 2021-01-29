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
        return view('pages/listProducts',compact('products',$products));
    }

    public function applyFilters(Request $request)
    {   
        $queryProducts = Product::query();
        $dataForm = $request->all();
        // Preço
        $priceValues = explode(";",$dataForm['priceValue']);
        $minValue    = floatval($priceValues[0]);
        $maxValue    = floatval($priceValues[1]);
        $queryProducts->whereBetween('maxPrice',[$minValue,$maxValue]);
        //comissao
        $comissionValues = explode(";",$dataForm['comissionValue']);
        $minValue        = floatval($comissionValues[0]);
        $maxValue        = floatval($comissionValues[1]);
        $queryProducts->whereBetween('percentage',[$minValue,$maxValue]);

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


        $products = $queryProducts->paginate(20);
        // dd($products);
        return view('pages/listProducts',compact('products',$products));
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
        
        if($dataForm['recorrente']){
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
        } 
        // return view('pages/newProduct',compact('product',$product));
        return redirect(route('newProduct',$id))->with(compact('product',$product ));
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
        if($order == 1){
            $queryProducts = Product::query();
            $queryProducts->orderBy("title","ASC");
            $products = $queryProducts->paginate(20);
            return view('pages/listProducts',compact('products',$products));
        }else if ($order == 2){
            $queryProducts = Product::query();
            $queryProducts->orderBy("title","DESC");
            $products = $queryProducts->paginate(20);
            return view('pages/listProducts',compact('products',$products));
        }
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        dd($c);
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
    }
}
