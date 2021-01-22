<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
