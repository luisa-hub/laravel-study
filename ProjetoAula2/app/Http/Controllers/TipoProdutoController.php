<?php

namespace App\Http\Controllers;

use App\Models\TipoProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TipoProdutoController extends Controller
{
    /**
     * Mostra uma lista do recurso
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$tipoProdutos = TipoProduto::all();
        try{
        $tipoProdutos = DB::select('select * from TIPO_PRODUTOS');
        }
        catch(\Throwable $th) {
            return view("TipoProduto/index")->with("tipoProdutos", [])
                    ->with("message", [$th->getMessage(), 'danger']);
        }
        //print_r($tipoProdutos);
       return view("TipoProduto/index")->with("tipoProdutos", $tipoProdutos);
    }

    
    public function indexMessage($message)
    {
        try{
            $tipoProdutos = DB::select("SELECT tipo_produtos.id,
            tipo_produtos.descricao,
            tipo_produtos.updated_at,
            tipo_produtos.created_at
            FROM tipo_produtos");

        }
        catch(\Throwable $th){
            return view("TipoProduto/index")->with("tipoProdutos", [])->with("message", [$th->getMessage(), "danger"]);

        }

        return view("TipoProduto/index")->with("tipoProdutos", $tipoProdutos)->with("message", $message);
    }

    /**
     * Mostrar um formulário para a criação de um novo recurso
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("TipoProduto/create");
    }

    /**
     * Store a newly created resource in storage.
     *Armazenar as informações do formulário
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try{
        $tipoProduto = new TipoProduto();
        $tipoProduto->descricao = $request->descricao;
        $tipoProduto->save();
        }
        catch(\Throwable $th){
            return $this->indexMessage(([$th->getMessage(), "danger"]));
        }

        return $this->indexMessage((["Tipo de produto cadastrado com sucesso", "success"]));

    }

    /**
     * Display the specified resource.
     *Mostra um recurso em detalhes
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
        $tipoProdutos = DB::select("SELECT tipo_produtos.id,
        tipo_produtos.descricao,
        tipo_produtos.updated_at,
        tipo_produtos.created_at
        FROM tipo_produtos
        WHERE tipo_produtos.id = ?", [$id]);

        if(count($tipoProdutos) > 0)
            return view("TipoProduto/show")->with("tipoProduto", $tipoProdutos[0]);

        return $this->indexMessage(["Tipo de produto não foi encontrado", "warning"]);
        }

        catch(\Throwable $th){
            return $this->indexMessage([$th->getMessage(), 'danger']);
        }
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
        $tipoProduto = TipoProduto::find($id); // retorna um obj ou null
        // Pergunto se o obj é válido ou null
        if( isset($tipoProduto) ){
            return view("TipoProduto/edit")
                        ->with("tipoProduto", $tipoProduto);
        }
        return $this->indexMessage(["O tipo de produto não foi encontrado", "warning"]);
        }
        catch(\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), 'danger']);
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
         
        try{
        //echo "Tipo $request->Tipo_Produtos_id";
        $tipoProduto = TipoProduto::find($id); 

        // Pergunto se o obj é válido ou null (se ele existe)
        if( isset($tipoProduto) ){
            $tipoProduto->descricao = $request->descricao;
            $tipoProduto->update();
            // Recarregar a view index.
            return $this->indexMessage(["Tipo de produto atualizado com sucesso", "success"]);
        }
        return $this->indexMessage(["Tipo de produto não foi encontrado", "warning"]);
        }

        catch(\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), 'danger']);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
        $tipoProduto = TipoProduto::find($id); // Retorna o objeto encontrado ou null, caso ñ encontrado
      
        if( isset($tipoProduto) ) {
            $tipoProduto->delete();
            return $this->indexMessage(["Tipo de produto removido com sucesso", "success"]);
        }
        return $this->indexMessage(["Tipo de Produto não foi encontrado", "warning"]);

        }
        catch(\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), 'danger']);
        }
        
    }
}