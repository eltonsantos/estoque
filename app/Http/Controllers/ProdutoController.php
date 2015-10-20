<?php
/**
 * Created by PhpStorm.
 * User: eltonsantos
 * Date: 15/10/15
 * Time: 21:29
 */

namespace estoque\Http\Controllers;


use estoque\Produto;
use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller
{
    public function lista(){
        //$produtos = DB::select("SELECT * FROM produtos");
        $produtos = Produto::all();
        return view("produto.listagem")->with("produtos", $produtos);
    }

    public function mostra($id){
        //$resposta = DB::select("SELECT * FROM produtos WHERE id = ?", [$id]);
        $produto = Produto::find($id);
        if(empty($resposta)){
            return "Esse produto não existe";
        }
        return view("produto.detalhes")->with("p", $produto);
    }

    public function novo(){
        return view("produto.formulario");
    }

    public function adiciona(){
        Produto::create(Request::all());
        /*$nome = Request::input("nome");
        $descricao = Request::input("descricao");
        $valor = Request::input("valor");
        $quantidade = Request::input("quantidade");

        DB::table("produtos")->insert(
            [
                "nome" => $nome,
                "descricao" => $descricao,
                "valor" => $valor,
                "quantidade" => $quantidade
            ]
        );*/

        //DB::insert("INSERT INTO produtos (nome, descricao, valor, quantidade) VALUES (?, ?, ?, ?)", array($nome, $descricao, $valor, $quantidade));
        //$produtos = DB::select("SELECT * FROM produtos");
        //return redirect("/produtos")->withInput(Request::only("nome"));
        return redirect()->action("ProdutoController@lista")->withInput(Request::only("nome"));
    }

    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->action("ProdutoController@lista");
    }

    public function listaJson(){
        //$produtos = DB::select("SELECT * FROM produtos");
        $produtos = Produto::all();
        return response()->json($produtos);
    }
}