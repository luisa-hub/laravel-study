<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("UserInfo/create");
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
        try{
        $userInfo = new UserInfo();
        $userInfo->Users_id=1;
        $userInfo->status='A';
        $userInfo->dataNasc=$request->dataNasc;
        $userInfo->profileImg=$request->profileImg;
        $userInfo->genero=$request->genero;
        $userInfo->save();

        }
        catch(\Throwable $th){
            return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
        }

        return  view("UserInfo/create")->with("message", ["Criado com sucesso!", "success"]);;
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $userInfo = UserInfo::where('Users_id', $id)->first();
            if(isset($userInfo))
                return view("UserInfo/show")->with("userInfo", $userInfo);
            }
        catch(\Throwable $th) {
            return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
        }
        return view("UserInfo/create")->with("message", ["Id não encontrado", "warning"]);
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
            $userInfo = UserInfo::where('Users_id', $id)->first();// retorna um obj ou null
            // Pergunto se o obj é válido ou null
            if(isset($userInfo) ){
                return view("UserInfo/edit")
                            ->with("userInfo", $userInfo);
            }
            return view("UserInfo/create")->with("message", ["Erro ao encontrar usuário", "warning"]);
       
            }
            catch(\Throwable $th) {
                return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
                
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
            $userInfo = UserInfo::where('Users_id', $id)->first();
    
            // Pergunto se o obj é válido ou null (se ele existe)
            if( isset($userInfo) ){
                $userInfo->dataNasc=$request->dataNasc;
                $userInfo->profileImg=$request->profileImg;
                $userInfo->genero=$request->genero;
                $userInfo->update();
                // Recarregar a view index.
                return view("UserInfo/create")->with("message", ["Sucesso ao atualizar usuário", "success"]);
                
            }
            return view("UserInfo/create")->with("message", ["Usuário não encontrado", "warning"]);
            
            }
    
            catch(\Throwable $th) {
                return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
                return;
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
            //$userInfo = UserInfo::where('Users_id', $id)->first();
            $userInfo = UserInfo::where('Users_id', $id)->first();// Retorna o objeto encontrado ou null, caso ñ encontrado
            if( isset($userInfo) ) {
                $userInfo->delete();
                return view("UserInfo/create")->with("message", ["Removido com sucesso", "success"]);
               
            }
            return view("UserInfo/create")->with("message", ["Não encontrada informações para remoção", "warning"]);
            
    
            }
            catch(\Throwable $th) {
                return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
                
            }
    }
}
