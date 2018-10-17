<?php 
namespace estoque\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller{
	public function lista(){
        
        $produtos = DB::select('select * from produtos');

        return view('listagem')->with('produtos', $produtos);
    }

    public function mostra(){
        $id = Request::input('id');
        $produto = DB::select('select * from produtos where id = ?', [$id]);
        if(empty($produto)){
            return "<h1>Esse produto não existe</h1>";
        }else{
            return view('detalhes')->with('p', $produto[0]);
        }
    }

    public function novo(){
        return view('formulario');
    }

    public function adiciona(){
        $nome = Request::input('nome');
        $quantidade = Request::input('quantidade');
        $valor = Request::input('valor');
        $descricao = Request::input('descricao');

        DB::insert('insert into produtos (nome, valor, quantidade, descricao) values (?,?,?,?);', array($nome, $valor, $quantidade, $descricao));

        return redirect('/produtos')->withInput();
    }

    public function deleta(){
        $id = Request::input('id');

        DB::delete('delete from produtos where id = ?', [$id]);

        return redirect('/produtos')->withInput();
    }
}