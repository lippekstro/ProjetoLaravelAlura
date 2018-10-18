<?php 
namespace estoque\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use Validator;
use estoque\Produto;
use estoque\Http\Requests\ProdutoRequest;
use Auth;
use estoque\Categoria;

class ProdutoController extends Controller{

	public function lista(){
        $produtos = Produto::all();

        return view('listagem')->with('produtos', $produtos);
    }

    public function mostra(){
        $params = Request::input('id');
        $produto = Produto::find($params);
        if(empty($produto)){
            return "<h1>Esse produto não existe</h1>";
        }else{
            return view('detalhes')->with('p', $produto);
        }
    }

    public function novo(){
        return view('formulario')->with('categorias', Categoria::all());
    }

    public function adiciona(ProdutoRequest $request){
        $params = $request->all();
        $produto = new Produto($params);
        $produto->save();

        return redirect('/produtos')->withInput();
    }

    public function deleta(){
        $params = Request::input('id');
        $produto = Produto::find($params);
        $produto->delete();

        return redirect('/produtos')->withInput();
    }

    public function mostraAtualiza(){
        $id = Request::input('id');
        $produto = Produto::find($id);

        return view('/formAtualiza')->with('p', $produto)->with('categorias', Categoria::all());
    }

    public function atualiza(ProdutoRequest $request){
        $produto = Produto::find($request->id);
        $produto->fill($request->all());
        $produto->save();

        return redirect('/produtos')->withInput();
    }
}