<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;

class VendaController extends Controller
{
    public function listarVendas(){
      $vendas = Venda::all();

      echo "#### Produtos ####<br><br>";

      foreach($vendas as $venda){
        $total = $venda->quantidade * $venda->preco_unitario;
        $total = number_format($total,2,',','.');
        $unitario = number_format($venda->preco_unitario, 2, ',','.');

        echo "- Produto: $venda->produto<br>";
        echo "- Quantidade: $venda->quantidade<br>";
        echo "- Preço Unitário: $unitario<br>";
        echo "- Total: $total<br>";
        echo "===================================<br>";
      }
    }

    public function verVenda($id){
      try{
        $vendas = Venda::findOrFail($id);

      $total = $vendas->quantidade * $vendas->preco_unitario;
      $total = number_format($total,2,',','.');
      $unitario = number_format($vendas->preco_unitario, 2, ',','.');


      echo "#### Produtos ####<br><br>";
      echo "- Produto: $vendas->produto<br>";
      echo "- Quantidade: $vendas->quantidade<br>";
      echo "- Preço Unitário: $unitario<br>";
      echo "- Total: $total<br>";
      } catch(\Exception $e){
        echo "Produto não existe.";
      }
    }

    public function cadastrarVenda(Request $request){
      $venda = new Venda;

      $unitario = number_format($request->preco, 2, ',','.');

      $venda->produto = $request->produto;
      $venda->preco_unitario = $request->preco;
      $venda->quantidade = $request->quantidade;

      $venda->save();

      echo "Registro criado com sucesso!<br>
      <br>Confira os dados abaixo:<br>
      - Produto: $venda->produto<br>
      - Preço Unitário: $unitario<br>
      - Quantidade: $venda->quantidade";
    }

    public function atualizarVenda(Request $request, $id){
      try{
        $venda = Venda::findOrFail($id);

        $prod_ant = $venda->produto;
        $unitario = number_format($request->preco, 2, ',','.');

        $venda->produto = $request->produto;
        $venda->preco_unitario = $request->preco;
        $venda->quantidade = $request->quantidade;

        $venda->save();

        echo "Sucesso!<br><br>O produto $prod_ant correspondente a venda #$id foi substituido com sucesso pelos dados abaixo:<br><br>- Produto: $request->produto<br>- Preço Unitário: $unitario<br>- Quantidade: $request->quantidade";
      } catch(\Exception $e){
        echo "Produto não existe.";
      }
    }

    public function excluirVenda($id){
      try{
        $venda = Venda::findOrFail($id);

        $venda->delete();

        echo "A venda #$id foi excluída com sucesso.";
      }catch(\Exception $e){
        echo "Não foi encontrada venda com a numeração #$id.";
      }
    }
}
